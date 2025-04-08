@extends('layouts.app')

@section('layout-holder')
@include('inc.navbar')
<div class="container my-4">
    <div class="employer-layout bg-light p-4 rounded shadow-sm">
        <div class="row mb-4">
            <div class="col-12 text-center position-relative">
                <!-- Banner Image -->
                <div class="company-banner position-relative">
                    <img src="{{ secure_asset($company->cover_img) }}" class="img-fluid rounded" alt="Company Banner" />
                    <!-- Company Logo -->
                    <div class="company-logo position-absolute" style="
                                bottom: -40px;
                                left: 50%;
                                transform: translateX(-50%);
                            ">
                        <img src="{{ secure_asset($company->logo) }}" alt="Company Logo"
                            class="rounded-circle border bg-white p-2 shadow-sm" style="width: 100px" />
                    </div>
                </div>
                <h3 class="font-weight-bold mt-5">
                    {{ $company->title }}
                </h3>
                <p class="text-muted">
                    {{ $company->getCategory->category_name }}
                </p>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="text-center mb-4">
            <div class="">
                @php
                $followStatus = $company->getFollowStatus(auth()->id());
                @endphp

                @if ($followStatus === 'accepted')
                <button class="btn btn-success" disabled>
                    Following
                </button>
                @elseif ($followStatus === 'pending')
                <button class="btn btn-warning" disabled>
                    Pending Approval
                </button>
                @else
                <a href="{{ route('account.follow', ['company_id' => $company->id]) }}" class="btn btn-outline-primary">
                    Follow Us
                </a>
                @endif

                <a href="#" class="btn btn-outline-primary">Chat Us</a>
                <a href="#about" class="btn btn-outline-primary">About</a>
                <a href="#posts" class="btn btn-outline-primary">Open Jobs</a>
            </div>
        </div>

        <!-- About Section -->
        <div class="row" id="about">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="company-description">
                    <p class="py-2">{!! $company->description !!}</p>
                </div>

                <a href="{{ Str::startsWith($company->website, 'http') ? $company->website : 'https://' . $company->website }}"
                    target="_blank" class="btn btn-primary">
                    Visit Website
                </a>
            </div>
        </div>

        <!-- Open Jobs Section -->
        <div class="row mt-5" id="posts">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('inc.footer')
@endsection

@push('css')
<style>
    .company-banner img {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 10px;
    }

    .company-logo img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }

    .btn-outline-primary {
        border-color: #3498da;
        color: #3498da;
        transition:
            background-color 0.3s,
            color 0.3s;
    }

    .btn-outline-primary:hover {
        background-color: #3498da;
        color: #fff;
    }
</style>
@endpush