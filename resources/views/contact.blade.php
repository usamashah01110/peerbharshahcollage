@extends('includes.main')

@section('content')

{{-- Hero Banner --}}
<div style="position: relative; height: 280px; overflow: hidden;">
    <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1400&q=80"
         class="w-100 h-100"
         style="object-fit: cover; object-position: center; filter: brightness(0.35);"
         alt="Contact Banner">
    <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(180,30,30,0.7) 0%, rgba(220,80,80,0.45) 100%);"></div>
    <div style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px;">
        <div style="width: 48px; height: 2px; background: #ffcccc; margin-bottom: 4px;"></div>
        <h1 style="color: white; font-size: 2.8rem; font-weight: 700; margin: 0; letter-spacing: 6px;">CONTACT</h1>
        <div style="width: 50px; height: 2px; background: #ffcccc;"></div>
        <p style="color: #ffcccc; font-size: 0.85rem; margin: 6px 0 0;">Home &rsaquo; Contact</p>
    </div>
</div>

{{-- Main Content --}}
<div class="container py-5">

    {{-- General Contact Information --}}
    <h3 class="text-center fw-bold mb-2">General Contact Information</h3>
    <hr style="width: 60px; border: 2px solid #c0392b; opacity:1; margin: 0 auto 2rem;">

    {{-- Contact Cards Row --}}
    <div class="row g-4 mb-5">

        {{-- Address Card --}}
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center" style="border-radius: 12px;">
                <div style="width: 55px; height: 55px; background: #fdecea; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#c0392b" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                </div>
                <h5 class="fw-bold mb-2">Address</h5>
                <p class="text-muted small mb-0">
                    Govt. pir bahar shah,<br>
                    gratuated college for women <br>
                    Sheikhupura, Pakistan
                </p>
            </div>
        </div>

        {{-- Contact Card --}}
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center" style="border-radius: 12px;">
                <div style="width: 55px; height: 55px; background: #fdecea; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#c0392b" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/>
                    </svg>
                </div>
                <h5 class="fw-bold mb-2">Contact</h5>
                <p class="text-muted small mb-0">
                    Mobile: <strong style="color:#c0392b;">056 3783273</strong><br>
                    Mail: <a href="mailto:info@gcwskp.edu.pk" style="color:#c0392b;">info@gcwskp.edu.pk</a>
                </p>
            </div>
        </div>

        {{-- Hours Card --}}
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center" style="border-radius: 12px;">
                <div style="width: 55px; height: 55px; background: #fdecea; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#c0392b" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                    </svg>
                </div>
                <h5 class="fw-bold mb-2">Hour of Operation</h5>
                <p class="text-muted small mb-0">
                    Monday - Saturday:<br>
                    <strong>07:00 AM - 02:00 PM</strong>
                </p>
            </div>
        </div>

    </div>

    {{-- Image + Map Section --}}
    <div class="row g-4 mb-5">

        {{-- College Image --}}
        <div class="col-md-6">
            <div style="overflow: hidden; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.12); height: 300px;">
                <img src="/images/college.jpg"
                     class="w-100 h-100"
                     onerror="this.src='https://images.unsplash.com/photo-1562774053-701939374585?w=700&q=80'"
                     alt="College Building"
                     style="
                         object-fit: cover;
                         object-position: center;
                         transition: transform 0.5s ease;
                         display: block;
                         width: 100%;
                         height: 100%;
                     "
                     onmouseover="this.style.transform='scale(1.08)'"
                     onmouseout="this.style.transform='scale(1)'">
            </div>
        </div>

        {{-- Google Map --}}
        <div class="col-md-6">
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.12); height: 300px;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3392.5!2d73.9897!3d31.7167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzHCsDQzJzAwLjEiTiA3M8KwNTknMjIuOSJF!5e0!3m2!1sen!2spk!4v1234567890"
                    width="100%"
                    height="300"
                    style="border:0; display:block;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>

    </div>

    {{-- Contact Form --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 12px;">
                <h5 class="fw-bold text-center mb-1">Send us a Message</h5>
                <hr style="width: 50px; border: 2px solid #c0392b; opacity:1; margin: 0 auto 1.5rem;">
                <form action="/contact/send" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Message</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="Write your message here..." required></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit"
                                    class="btn px-5 py-2"
                                    style="background: #c0392b; color: white; border-radius: 8px; font-weight: 600;">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection