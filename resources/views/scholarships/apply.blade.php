@extends('includes.main')
@section('content')

<!-- ════════════════ HERO ════════════════ -->
<section class="hero hero-about">
    <div class="hero-grid"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <div class="reveal in-view">
                    <div class="hero-eyebrow">
                        <a href="{{ route('scholarships.show', $scholarship->slug) }}" style="color:inherit;text-decoration:none;">{{ $scholarship->name }}</a>
                    </div>
                    <h1 class="hero-title">Scholarship <span class="gold-line">application.</span></h1>
                    <p class="hero-sub">Complete the form below to apply. Fields marked <span class="accent">*</span> are required.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="welcome">
    <div class="container">

        @include('scholarships._flash')

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('scholarships.apply', $scholarship->slug) }}" method="POST" enctype="multipart/form-data"
              class="reveal" style="max-width:920px;">
            @csrf

            <h5 class="mb-3 mt-2" style="font-family:'Fraunces',serif;">Applicant details</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">First name <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last name <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Father's name</label>
                    <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">CNIC / B-Form</label>
                    <input type="text" name="cnic" value="{{ old('cnic') }}" class="form-control" placeholder="35202-XXXXXXX-X">
                </div>
            </div>

            <h5 class="mb-3 mt-4" style="font-family:'Fraunces',serif;">Academic information</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Program <span class="text-danger">*</span></label>
                    <select name="program_id" class="form-select" required>
                        <option value="">— Select program —</option>
                        @foreach($programs as $p)
                            <option value="{{ $p->id }}" {{ old('program_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Current semester</label>
                    <input type="number" name="current_semester" value="{{ old('current_semester') }}" class="form-control" min="1" max="20">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Current CGPA</label>
                    <input type="number" step="0.01" name="current_cgpa" value="{{ old('current_cgpa') }}" class="form-control" min="0" max="4">
                </div>
            </div>

            <h5 class="mb-3 mt-4" style="font-family:'Fraunces',serif;">Financial information</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Family monthly income (Rs.)</label>
                    <input type="number" step="0.01" name="family_monthly_income" value="{{ old('family_monthly_income') }}" class="form-control" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Father's occupation</label>
                    <input type="text" name="father_occupation" value="{{ old('father_occupation') }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Number of dependents</label>
                    <input type="number" name="number_of_dependents" value="{{ old('number_of_dependents') }}" class="form-control" min="0" max="50">
                </div>
                <div class="col-12">
                    <label class="form-label">Other scholarships currently held</label>
                    <input type="text" name="other_scholarships" value="{{ old('other_scholarships') }}" class="form-control" placeholder="e.g. None, or name of scholarship">
                </div>
            </div>

            <h5 class="mb-3 mt-4" style="font-family:'Fraunces',serif;">Your statement</h5>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Why are you applying? <span class="text-danger">*</span></label>
                    <textarea name="reason_for_applying" rows="4" class="form-control" required
                              placeholder="Tell us about your circumstances and goals (min. 20 characters).">{{ old('reason_for_applying') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Achievements (optional)</label>
                    <textarea name="achievements" rows="3" class="form-control"
                              placeholder="Academic, co-curricular, or sports achievements.">{{ old('achievements') }}</textarea>
                </div>
            </div>

            <h5 class="mb-3 mt-4" style="font-family:'Fraunces',serif;">Supporting documents <small class="text-muted">(optional, PDF/JPG/PNG, max 10MB each)</small></h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">CNIC / B-Form</label>
                    <input type="file" name="doc_cnic" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Transcript / Result card</label>
                    <input type="file" name="doc_transcript" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Income certificate</label>
                    <input type="file" name="doc_income" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Photograph</label>
                    <input type="file" name="doc_photo" class="form-control" accept=".jpg,.jpeg,.png">
                </div>
            </div>

            <div class="mt-4 d-flex gap-3">
                <button type="submit" class="btn btn-dark btn-lg">Submit Application</button>
                <a href="{{ route('scholarships.show', $scholarship->slug) }}" class="btn btn-outline-secondary btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</section>

@endsection
