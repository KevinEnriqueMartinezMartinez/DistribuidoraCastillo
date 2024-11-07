@extends('layouts.master')

@section('content')
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{ __('Registrar Usuario') }}</p>
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <!-- Aquí va el formulario de Laravel -->
                                <form action="{{ route('register') }}" method="POST" class="mx-1 mx-md-4">
                                    @csrf

                                    <!-- Campo Nombre -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                                            <label class="form-label" for="name">{{ __('Nombre') }}</label>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Campo Apellido -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus />
                                            <label class="form-label" for="apellido">{{ __('Apellido') }}</label>
                                            @error('apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Campo Email -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                            <label class="form-label" for="email">{{ __('Correo Electronico') }}</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Campo Password -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <div class="input-group">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                                                <span class="input-group-text" onclick="togglePasswordVisibility()">
                                                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                                </span>
                                            </div>

                                            <label class="form-label" for="password">{{ __('Contraseña') }}</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Campo Confirmar Password -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <div class="input-group">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
                                                <span class="input-group-text" onclick="togglePasswordConfirmVisibility()">
                                                    <i class="fas fa-eye" id="togglePasswordIconConfirm"></i>
                                                </span>
                                            </div>
                                            <label class="form-label" for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                                        </div>
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

                                    {{-- Script para mostrar u ocultar la contraseña a confirmar --}}
                                    <script>
                                        function togglePasswordConfirmVisibility() {
                                            var passwordInput = document.getElementById('password-confirm');
                                            var togglePasswordIconConfirm = document.getElementById('togglePasswordIconConfirm');
                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                togglePasswordIconConfirm.classList.remove('fa-eye');
                                                togglePasswordIconConfirm.classList.add('fa-eye-slash');
                                            } else {
                                                passwordInput.type = 'password';
                                                togglePasswordIconConfirm.classList.remove('fa-eye-slash');
                                                togglePasswordIconConfirm.classList.add('fa-eye');
                                            }
                                        }
                                    </script>
                                    {{-- Fin del script --}}
                                    {{-- Asignar Rol al Usuario --}}
                                    <div>
                                        <label for="rol">Rol</label>
                                        <select name="rol" id="rol" class="form-select" required style="color: black;">
                                            <option value="">Seleccione un rol</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" style="color: black;">{{ $role->nombre }}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                    {{-- Fin de asignar rol al usuario --}}
                                    <!-- Botón de Registro -->
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg">{{ __('Registrar Usuario') }}</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Imagen decorativa -->
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img style="border-radius: 20px;" src="{{asset('img/usuarios.jpeg')}}" class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection