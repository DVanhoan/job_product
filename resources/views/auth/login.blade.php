@extends('layouts.auth')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 px-0">
                <div class="login-container">
                    <div class="login-header mb-4 text-center">
                        <p class="login-header-title font-weight-bold size-20">
                            Welcome back to Ehya
                        </p>
                    </div>


                    <div class="login-form px-2 pt-4">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span
                                            class="input-group-text"
                                            id="basic-addon1"
                                        >
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input
                                        id="email"
                                        type="email"
                                        placeholder="E-mail address"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="email"
                                        autofocus
                                    />
                                    @error('email')
                                        <span
                                            class="invalid-feedback"
                                            role="alert"
                                        >
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span
                                            class="input-group-text"
                                            id="basic-addon1"
                                        >
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input
                                        id="password"
                                        type="password"
                                        placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        value="{{ old('password') }}"
                                        required
                                    />
                                    @error('password')
                                        <span
                                            class="invalid-feedback"
                                            role="alert"
                                        >
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <input
                                        type="checkbox"
                                        id="rememberMe"
                                        name="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                    />
                                    <label for="rememberMe" class="mb-0">Remember me</label>
                                </div>
                                <a href="{{ route('password.request') }}" class="secondary-link">
                                    Forgot password?
                                </a>
                            </div>

                            <button
                                type="submit"
                                class="btn primary-btn btn-block"
                            >
                                Login
                            </button>
                        </form>

                        <div class="my-3">
                            <p class="text-center">or</p>
                        </div>

                        <div class="d-flex justify-content-center mb-3 mt-3">
                            <a href="{{ route('login.google') }}" class="btn btn-outline-secondary rounded-circle p-2 d-flex align-items-center justify-content-center mx-2">
                                <img src="{{ asset('images/google.png') }}" alt="Google Login" width="30px">
                            </a>
                            <a href="{{ route('login.github') }}" class="btn btn-outline-secondary rounded-circle p-2 d-flex align-items-center justify-content-center mx-2">
                                <img src="{{ asset('images/github.png') }}" alt="GitHub Login" width="30px">
                            </a>
                        </div>

                        <div class="my-3">
                            <p class="text-center">
                                Don't have an account?
                                <a class="text-primary" href="/register">Register now</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-md-6 px-0">
                <div class="login-poster">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .login-poster {
            background-image: url('{{ asset('images/login-bg.jpg') }}');
            background-image: linear-gradient(
                    to bottom,
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.35)
                ),
                url('{{ asset('images/login-bg.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
@endpush
