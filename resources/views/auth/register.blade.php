<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Govt. Graduate College for Women, Sheikhupura</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Source+Sans+3:wght@300;400;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('style.css') }}"/>
</head>
<body>

<section>
  <div class="container hero-content">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-xl-6">
        <div class="auth-card">
          <h1 class="hero-title text-center" style="color: var(--text-dark);">Register</h1>
          <br>

          <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Username --}}
            <div class="mb-3">
              <label for="name" class="form-label">Username</label>
              <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Enter your username">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="form-control @error('email') is-invalid @enderror"
                placeholder="name@example.com">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input id="password" type="password" name="password" required
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Enter your password">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input id="password_confirmation" type="password" name="password_confirmation" required
                class="form-control"
                placeholder="Re-enter your password">
            </div>

            <button type="submit" class="btn w-100" style="background-color: var(--crimson); color: white;">
              Register
            </button>

            <p class="text-center mt-3" style="font-size: 0.9rem;">
              Already have an account?
              <a href="{{ route('login') }}" class="text-decoration-none" style="color: var(--crimson);">Sign In</a>
            </p>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>