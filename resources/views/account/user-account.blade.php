@extends('layouts.account')

@section('content')
<div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">User Account</div>
    <div class="account-bdy border py-4">
        <div class="container d-flex justify-content-center">
            <div class="card user-card shadow-sm" style="width: 100%; max-width: 750px; border-radius: 10px">
                <div class="row g-0">

                    <div
                        class="col-sm-4 bg-c-lite-green user-profile text-center d-flex flex-column justify-content-center align-items-center p-4">
                        <div class="profile-img-container">
                            <img id="profileImg"
                                src="{{ secure_asset(auth()->user()->avatar ?? 'images/user-profile.png') }}"
                                alt="User Profile Image" />
                            <div class="edit-icon-overlay" onclick="document.getElementById('profileInput').click()">
                                <i class="fas fa-edit"></i>
                            </div>
                            <form id="profileForm" class="d-none" action="{{ route('account.updateProfileImage') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="profileInput" name="profile_image" accept="image/*"
                                    class="d-none" />
                            </form>
                        </div>
                        <div class="user-info mt-3 text-center">
                            <h6 class="f-w-600">
                                {{ auth()->user()->name }}
                            </h6>
                            <p class="text-muted">
                                {{ auth()->user()->hasRole('user') ? 'User' : 'Author (Job Lister)' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-8 p-4">
                        <h6 class="f-w-600 mb-3">Information</h6>
                        <div class="row">
                            <div class="col-6">
                                <p class="f-w-600">Email</p>
                                <h6 class="text-muted">
                                    {{ auth()->user()->email }}
                                </h6>
                            </div>
                            <div class="col-6">
                                <p class="f-w-600">Phone</p>
                                <h6 class="text-muted">Not set</h6>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mt-4 w-100"
                            onclick="document.getElementById('profileForm').submit()">
                            Update Profile Image
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .profile-img-container {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
        border: 4px solid white;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .edit-icon-overlay {
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        position: absolute;
        border-radius: 50%;
        transition: background 0.3s;
    }

    .edit-icon-overlay:hover {
        background: rgba(0, 0, 0, 0.7);
    }

    .profile-img-container:hover .edit-icon-overlay {
        display: flex;
    }

    .user-profile {
        padding: 20px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.9);
    }

    .user-info {
        font-weight: 600;
    }

    .card {
        border-radius: 10px;
    }
</style>
@endpush