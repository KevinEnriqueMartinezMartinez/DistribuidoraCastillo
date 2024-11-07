@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-image: url('{{ asset('img/1.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100vh;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="{{asset('img/login.jpg')}}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="d-flex justify-content-center align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-4x me-3" style="color: #ff6219;"></i>
                    <span style="font-size: 75px;" class="h1 fw-bold mb-0">DICALA</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicio de sesion</h5>

                  <div class="form-outline mb-4">
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                    <label class="form-label" for="email">Correo Electronico</label>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                    <div class="form-outline mb-4">
                    <div class="input-group">
                      <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                      <span class="input-group-text" onclick="togglePasswordVisibility()">
                      <i class="fas fa-eye" id="togglePasswordIcon"></i>
                      </span>
                    </div>
                    <label class="form-label" for="password">Contraseña</label>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    {{-- Script para mostrar u ocultar la contraseña --}}
                    <script>
                    function togglePasswordVisibility() {
                      var passwordInput = document.getElementById('password');
                      var togglePasswordIcon = document.getElementById('togglePasswordIcon');
                      if (passwordInput.type === 'password') {
                      passwordInput.type = 'text';
                      togglePasswordIcon.classList.remove('fa-eye');
                      togglePasswordIcon.classList.add('fa-eye-slash');
                      } else {
                      passwordInput.type = 'password';
                      togglePasswordIcon.classList.remove('fa-eye-slash');
                      togglePasswordIcon.classList.add('fa-eye');
                      }
                    }
                    </script>
                    {{-- Fin del script --}}

                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>

                  <div class="pt-1 mb-4 d-grid gap-2">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Inicia Sesion</button>
                  </div>

                  {{--@if (Route::has('password.request'))
                      <a class="small text-muted" href="{{ route('password.request') }}">Forgot your password?</a>
                  @endif --}}

                  {{-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p> --}}
                    <a style="text-align: center; display: block;" class="small text-muted">&copy; Derechos reservados - Estudiantes de Técnico en Ingenieria en Computación </a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection