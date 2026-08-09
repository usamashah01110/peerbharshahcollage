<?php

namespace App\Http\Controllers;

use App\Models\ApplicationDocument;
use App\Models\AdmissionApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApplicationDocumentController extends Controller
{
    public function index()
    {
        $documents = ApplicationDocument::with('application')->latest('id')->get();
        return view('admin.application_documents.index', compact('documents'));
    }

    public function create(Request $request)
    {
        $applications = AdmissionApplication::orderBy('id', 'desc')->get();
        $selectedApplicationId = $request->query('application_id');
        return view('admin.application_documents.create', compact('applications', 'selectedApplicationId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'application_id' => 'required|exists:admission_applications,id',
            'document_type'  => 'required|in:cnic,photo,matric_certificate,fsc_certificate,transcript,character_certificate,domicile,other',
            'file'           => 'required|file|max:10240',
        ]);

        $file = $request->file('file');
        $name = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('application_documents'), $name);

        ApplicationDocument::create([
            'application_id' => $validated['application_id'],
            'document_type'  => $validated['document_type'],
            'file_path'      => 'application_documents/' . $name,
            'file_size_kb'   => (int) round($file->getSize() / 1024),
            'mime_type'      => $file->getClientMimeType(),
            'uploaded_at'    => now(),
        ]);

        return redirect()->route('admin.application-documents.index')
            ->with('success', 'Document uploaded successfully.');
    }

    public function edit($id)
    {
        $document     = ApplicationDocument::findOrFail($id);
        $applications = AdmissionApplication::orderBy('id', 'desc')->get();
        return view('admin.application_documents.edit', compact('document', 'applications'));
    }

    public function update(Request $request, $id)
    {
        $document = ApplicationDocument::findOrFail($id);

        $validated = $request->validate([
            'application_id' => 'required|exists:admission_applications,id',
            'document_type'  => 'required|in:cnic,photo,matric_certificate,fsc_certificate,transcript,character_certificate,domicile,other',
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
            $file->move(public_path('application_documents'), $name);

            $data['file_path']    = 'application_documents/' . $name;
            $data['file_size_kb'] = (int) round($file->getSize() / 1024);
            $data['mime_type']    = $file->getClientMimeType();
            $data['uploaded_at']  = now();
        }

        $document->update($data);

        return redirect()->route('admin.application-documents.index')
            ->with('success', 'Document updated successfully.');
    }

    public function destroy($id)
    {
        $document = ApplicationDocument::findOrFail($id);
        if ($document->file_path && File::exists(public_path($document->file_path))) {
            File::delete(public_path($document->file_path));
        }
        $document->delete();

        return redirect()->route('admin.application-documents.index')
            ->with('success', 'Document deleted successfully.');
    }
}
