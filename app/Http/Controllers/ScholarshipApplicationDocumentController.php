<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipApplicationDocument;
use App\Models\ScholarshipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ScholarshipApplicationDocumentController extends Controller
{
    public function index()
    {
        $documents = ScholarshipApplicationDocument::with('application')->latest('id')->get();
        return view('admin.scholarship_application_documents.index', compact('documents'));
    }

    public function create(Request $request)
    {
        $applications = ScholarshipApplication::orderBy('id', 'desc')->get();
        $selectedApplicationId = $request->query('application_id');
        return view('admin.scholarship_application_documents.create', compact('applications', 'selectedApplicationId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'application_id' => 'required|exists:scholarship_applications,id',
            'document_type'  => 'required|in:cnic,transcript,income_certificate,recommendation_letter,photo,other',
            'file'           => 'required|file|max:10240',
        ]);

        $file = $request->file('file');
        $name = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('scholarship_application_documents'), $name);

        ScholarshipApplicationDocument::create([
            'application_id' => $validated['application_id'],
            'document_type'  => $validated['document_type'],
            'file_path'      => 'scholarship_application_documents/' . $name,
            'uploaded_at'    => now(),
        ]);

        return redirect()->route('admin.scholarship-application-documents.index')
            ->with('success', 'Document uploaded successfully.');
    }

    public function edit($id)
    {
        $document     = ScholarshipApplicationDocument::findOrFail($id);
        $applications = ScholarshipApplication::orderBy('id', 'desc')->get();
        return view('admin.scholarship_application_documents.edit', compact('document', 'applications'));
    }

    public function update(Request $request, $id)
    {
        $document = ScholarshipApplicationDocument::findOrFail($id);

        $validated = $request->validate([
            'application_id' => 'required|exists:scholarship_applications,id',
            'document_type'  => 'required|in:cnic,transcript,income_certificate,recommendation_letter,photo,other',
            'file'           => 'nullable|file|max:10240',
        ]);

        $data = [
            'application_id' => $validated['application_id'],
            'document_type'  => $validated['document_type'],
        ];

        if ($request->hasFile('file')) {
            if ($document->file_path && File::exists(public_path($document->file_path))) {
                File::delete(public_path($document->file_path));
            }
            $file = $request->file('file');
            $name = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('scholarship_application_documents'), $name);
            $data['file_path']   = 'scholarship_application_documents/' . $name;
            $data['uploaded_at'] = now();
        }

        $document->update($data);

        return redirect()->route('admin.scholarship-application-documents.index')
            ->with('success', 'Document updated successfully.');
    }

    public function destroy($id)
    {
        $document = ScholarshipApplicationDocument::findOrFail($id);
        if ($document->file_path && File::exists(public_path($document->file_path))) {
            File::delete(public_path($document->file_path));
        }
        $document->delete();

        return redirect()->route('admin.scholarship-application-documents.index')
            ->with('success', 'Document deleted successfully.');
    }
}
