@extends('layouts.auth')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 px-0">
            <div class="register-poster">
            </div>
        </div>

        <div class="col-sm-12 col-md-6 px-0">
            <div class="register-container">
                <div class="register-header mb-3 text-center">
                    <h3 class=" register-header-title font-weight-bold size-20"> Create your free account</h3>
                </div>
                <div class="register-form px-2 pt-4">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        {{-- fullname --}}
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fas fa-id-badge"></i></span>
                                </div>
                                <input id="name" type="name" placeholder="Full name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{-- email --}}
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="email" type="email" placeholder="E-mail address"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{-- password --}}
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="password_confirmation" type="password" placeholder="Password(Repeat)"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn primary-btn btn-block">Register</button>
                    </form>
                    <div class="text-center mt-4">
                        <p>Already have an account? <a href="/login" class="text-primary">Login now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .register-poster {
        /* fallback */
        background-image: url('{{secure_asset("images/register-bg.png")}}');
        background-image: linear-gradient(to bottom,
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.35)),
        url('{{secure_asset("images/register-bg.png")}}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
@endpush