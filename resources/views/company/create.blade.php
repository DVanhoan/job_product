@extends('layouts.account')

@section('content')
<div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">Create Company</div>
    <div class="account-bdy p-3">
        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Choose a Company Category</label>
                <select class="form-control" name="category" value="{{ old('category') }}" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <div class="py-3">
                    <p>Company Title</p>
                </div>
                <input type="text" placeholder="Company title"
                    class="form-control @error('password') is-invalid @enderror" name="title" value="{{ old('title') }}"
                    required />
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="pb-3">
                <div class="py-3">
                    <p>Company logo</p>
                    <img id="logo_image" src="{{ secure_asset('images/user-profile.png') }}" width="80px" alt="" />
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="logo" id="logo_input" />
                    <label class="custom-file-label">Choose logo...</label>
                    @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="pb-3">
                <div class="py-3">
                    <p class="py-2">Company banner/cover</p>
                    <img id="cover_image" src="{{ secure_asset('images/companies/banner.jpg') }}" width="200px"
                        class="img-fluid" alt="" />
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="cover_img" id="cover_img" />
                    <label class="custom-file-label" for="cover_img">
                        Choose cover img...
                    </label>
                    @error('cover_img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="py-3">
                    <p>Company Website Url</p>
                    <p class="text-primary">
                        For example : https://www.examplecompany.com
                    </p>
                </div>
                <input type="text" placeholder="Company Website"
                    class="form-control @error('website') is-invalid @enderror" name="website"
                    value="{{ old('website') }}" required />
                @error('website')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="pt-2">
                <p class="mt-3 alert alert-primary">
                    Provide a short paragraph description about your company
                </p>
            </div>
            <div class="form-group">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" required>
{{ old('description') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="line-divider"></div>
            <div class="mt-3">
                <button type="submit" class="btn primary-btn">
                    Create company
                </button>
                <a href="{{ route('account.authorSection') }}" class="btn primary-outline-btn">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endSection

@push('js')
<script>
    document.getElementById('logo_input').onchange = function (event) {
            document.getElementById('logo_image').src = URL.createObjectURL(
                event.target.files[0],
            )
        }

        document.getElementById('cover_img').onchange = function (event) {
            document.getElementById('cover_image').src = URL.createObjectURL(
                event.target.files[0],
            )
        }
</script>
@endpush