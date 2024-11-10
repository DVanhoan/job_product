@extends('layouts.account')

@section('content')
<div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">Edit Company</div>
    <div class="account-bdy p-3">
        <form
            action="{{ route('company.update', ['id' => $company->id]) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif

            @csrf
            @method('put')

            <!-- Select Category -->
            <div class="form-group">
                <label for="">Choose a Company Category</label>
                <select
                    class="form-control"
                    name="category"
                    value="{{ old('category') ?? $company->company_category_id }}"
                    required
                >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Company Title -->
            <div class="form-group">
                <label for="title">Company Title</label>
                <input
                    type="text"
                    placeholder="Company title"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    value="{{ old('title') ?? $company->title }}"
                    required
                />
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Upload Logo -->
            <div class="pb-3">
                <div class="py-3">
                    <p>Company logo</p>
                    <img
                        id="logo_image"
                        src="{{ asset($company->logo) }}"
                        width="80px"
                        alt=""
                    />
                </div>
                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input"
                        name="logo"
                        id="logo_input"
                    />
                    <label class="custom-file-label">Choose logo...</label>
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Upload Cover Image -->
            <div class="pb-3">
                <div class="py-3">
                    <p class="py-2">Company banner/cover</p>
                    <img
                        id="cover_image"
                        src="{{ asset($company->cover_img) }}"
                        width="200px"
                        class="img-fluid"
                        alt=""
                    />
                </div>
                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input"
                        name="cover_img"
                        id="cover_img"
                    />
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
                <label for="website">Company Website Url</label>
                <input
                    type="url"
                    placeholder="https://www.examplecompany.com"
                    class="form-control @error('website') is-invalid @enderror"
                    name="website"
                    value="{{ old('website') ?? $company->website }}"
                    required
                />
                @error('website')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Company Description</label>
                <textarea
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    required
                >
                    {{ old('description') ?? $company->description }}
                </textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="line-divider"></div>
            <div class="mt-3">
                <button type="submit" class="btn primary-btn">
                    Update company
                </button>
                <a
                    href="{{ route('account.authorSection') }}"
                    class="btn primary-outline-btn"
                >
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
