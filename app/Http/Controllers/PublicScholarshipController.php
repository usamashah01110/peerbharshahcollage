<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use App\Models\Program;
use App\Models\Scholarship;
use App\Models\ScholarshipApplication;
use App\Models\ScholarshipApplicationDocument;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicScholarshipController extends Controller
{
    /**
     * Public listing of scholarships. Open ones (accepting applications now)
     * are highlighted; others are shown for information.
     */
    public function index()
    {
        $scholarships = Scholarship::whereIn('status', ['open', 'closed'])
            ->orderByRaw("FIELD(status, 'open', 'closed')")
            ->orderByDesc('application_close_date')
            ->get();

        $open  = $scholarships->filter(fn ($s) => $this->isOpen($s))->values();
        $other = $scholarships->reject(fn ($s) => $this->isOpen($s))->values();

        return view('scholarships.index', compact('open', 'other'));
    }

    public function show(string $slug)
    {
        $scholarship = Scholarship::where('slug', $slug)->firstOrFail();
        $programs    = $this->resolvePrograms($scholarship);

        return view('scholarships.show', [
            'scholarship' => $scholarship,
            'programs'    => $programs,
            'isOpen'      => $this->isOpen($scholarship),
        ]);
    }

    public function applyForm(string $slug)
    {
        $scholarship = Scholarship::where('slug', $slug)->firstOrFail();

        if (! $this->isOpen($scholarship)) {
            return redirect()->route('scholarships.show', $scholarship->slug)
                ->with('error', 'Applications for this scholarship are not currently open.');
        }

        $programs = Program::where('is_active', true)->orderBy('name')->get();

        return view('scholarships.apply', compact('scholarship', 'programs'));
    }

    public function apply(Request $request, string $slug)
    {
        $scholarship = Scholarship::where('slug', $slug)->firstOrFail();

        if (! $this->isOpen($scholarship)) {
            return redirect()->route('scholarships.show', $scholarship->slug)
                ->with('error', 'Applications for this scholarship are not currently open.');
        }

        $validated = $request->validate([
            'first_name'            => 'required|string|max:80',
            'last_name'             => 'required|string|max:80',
            'father_name'           => 'nullable|string|max:150',
            'email'                 => 'required|email|max:150',
            'phone'                 => 'nullable|string|max:20',
            'cnic'                  => 'nullable|string|max:20',
            'program_id'            => 'required|exists:programs,id',
            'current_semester'      => 'nullable|integer|min:1|max:20',
            'current_cgpa'          => 'nullable|numeric|min:0|max:4',
            'family_monthly_income' => 'nullable|numeric|min:0',
            'father_occupation'     => 'nullable|string|max:150',
            'number_of_dependents'  => 'nullable|integer|min:0|max:50',
            'other_scholarships'    => 'nullable|string|max:255',
            'reason_for_applying'   => 'required|string|min:20',
            'achievements'          => 'nullable|string',
            'doc_cnic'              => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'doc_transcript'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'doc_income'            => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'doc_photo'             => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
        ]);

        $session = AcademicSession::where('is_current', true)->first()
            ?? AcademicSession::orderByDesc('id')->first();

        if (! $session) {
            return back()->withInput()
                ->with('error', 'No academic session is configured yet. Please contact the college office.');
        }

        try {
            $application = DB::transaction(function () use ($validated, $scholarship, $session, $request) {
                // Find-or-create the applicant as a Student record.
                $student = Student::where('email', $validated['email'])->first();

                if (! $student) {
                    $student = Student::create([
                        'registration_number'  => $this->uniqueRegistrationNumber(),
                        'first_name'            => $validated['first_name'],
                        'last_name'             => $validated['last_name'],
                        'father_name'           => $validated['father_name'] ?? null,
                        'email'                 => $validated['email'],
                        'phone'                 => $validated['phone'] ?? null,
                        'cnic'                  => $validated['cnic'] ?: null,
                        'gender'                => 'female',
                        'program_id'            => $validated['program_id'],
                        'admission_session_id'  => $session->id,
                        'current_semester'      => $validated['current_semester'] ?? null,
                        'enrollment_date'       => now()->toDateString(),
                        'status'                => 'active',
                    ]);
                }

                // Prevent duplicate applications (DB also enforces this).
                $exists = ScholarshipApplication::where('scholarship_id', $scholarship->id)
                    ->where('student_id', $student->id)
                    ->exists();

                if ($exists) {
                    throw new \RuntimeException('duplicate');
                }

                $application = ScholarshipApplication::create([
                    'application_number'    => $this->uniqueApplicationNumber($scholarship->id),
                    'scholarship_id'        => $scholarship->id,
                    'student_id'            => $student->id,
                    'family_monthly_income' => $validated['family_monthly_income'] ?? null,
                    'father_occupation'     => $validated['father_occupation'] ?? null,
                    'number_of_dependents'  => $validated['number_of_dependents'] ?? null,
                    'other_scholarships'    => $validated['other_scholarships'] ?? null,
                    'current_cgpa'          => $validated['current_cgpa'] ?? null,
                    'current_semester'      => $validated['current_semester'] ?? null,
                    'reason_for_applying'   => $validated['reason_for_applying'],
                    'achievements'          => $validated['achievements'] ?? null,
                    'status'                => 'submitted',
                    'submitted_at'          => now(),
                ]);

                $this->storeDocuments($request, $application);

                return $application;
            });
        } catch (\RuntimeException $e) {
            if ($e->getMessage() === 'duplicate') {
                return back()->withInput()
                    ->with('error', 'An application for this scholarship already exists for this email address.');
            }
            throw $e;
        }

        return redirect()->route('scholarships.show', $scholarship->slug)
            ->with('success', 'Your application has been submitted successfully. Your application number is '
                . $application->application_number . '. The college office will review it and contact you.');
    }

    /**
     * Map the saved file inputs to scholarship_application_documents rows,
     * reusing the same public path convention as the admin controller.
     */
    private function storeDocuments(Request $request, ScholarshipApplication $application): void
    {
        $map = [
            'doc_cnic'       => 'cnic',
            'doc_transcript' => 'transcript',
            'doc_income'     => 'income_certificate',
            'doc_photo'      => 'photo',
        ];

        foreach ($map as $input => $type) {
            if (! $request->hasFile($input)) {
                continue;
            }

            $file = $request->file($input);
            $name = time() . '_' . Str::random(6) . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('scholarship_application_documents'), $name);

            ScholarshipApplicationDocument::create([
                'application_id' => $application->id,
                'document_type'  => $type,
                'file_path'      => 'scholarship_application_documents/' . $name,
                'uploaded_at'    => now(),
            ]);
        }
    }

    private function isOpen(Scholarship $s): bool
    {
        if ($s->status !== 'open') {
            return false;
        }

        $now = now();

        if ($s->application_open_date && $now->lt($s->application_open_date)) {
            return false;
        }

        if ($s->application_close_date && $now->gt($s->application_close_date)) {
            return false;
        }

        return true;
    }

    private function resolvePrograms(Scholarship $scholarship)
    {
        $ids = $scholarship->eligible_program_ids;

        if (empty($ids) || ! is_array($ids)) {
            return collect();
        }

        return Program::whereIn('id', $ids)->orderBy('name')->get();
    }

    private function uniqueRegistrationNumber(): string
    {
        do {
            $candidate = 'APP-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5));
        } while (Student::where('registration_number', $candidate)->exists());

        return $candidate;
    }

    private function uniqueApplicationNumber(int $scholarshipId): string
    {
        do {
            $candidate = 'SCH' . $scholarshipId . '-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5));
        } while (ScholarshipApplication::where('application_number', $candidate)->exists());

        return $candidate;
    }
}
