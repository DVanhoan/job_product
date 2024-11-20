@extends('layouts.auth')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 px-0">
                <div class="login-container">
                    <div class="login-header mb-4 text-center">
                        <p class="login-header-title font-weight-bold size-20">
                            Forgot your password?
                        </p>
                        <p class="text-muted">Enter your email to reset your password</p>
                    </div>

                    <div class="login-form px-2 pt-4">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span
                                            class="input-group-text"
                                            id="basic-addon1"
                                        >
                                            <i class="fas fa-envelope"></i>
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

                            <button
                                type="submit"
                                class="btn primary-btn btn-block"
                            >
                                Send reset link
                            </button>
                        </form>

                        <div class="my-3">
                            <p class="text-center">
                                <a class="text-primary" href="{{ route('login') }}">Back to login</a>
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
