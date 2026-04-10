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

<section >
  <div class="container hero-content">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-xl-6">
        <div class="auth-card">
          <h1 class="hero-title text-center" style="color: var(--text-dark);">Sign In</h1>
          <br>

          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input id="password" type="password" name="password" required class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row align-items-center mb-4">
              <div class="col-sm-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
              </div>
              <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: var(--crimson);">Forgot password?</a>
              </div>
            </div>

            <button type="submit" class="btn btn-crimson">Sign In</button>

            <div class="auth-footer">
              New here? <a href="{{ route('register') }}">Create an account</a> and join our college community.
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>