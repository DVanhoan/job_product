@extends('layouts.post')

@section('content')
    {{-- header --}}
    <section class="home-page pt-4">
        <div class="container">
            <form action="{{ route('job.index', [], true) }}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="px-4">
                            <div class="rounded-text">
                                <p>Find jobs, vacancy, career online.</p>
                            </div>
                            <div class="home-search-bar">
                                <input
                                    type="text"
                                    name="q"
                                    placeholder="Search Job By Title"
                                    class="home-search-input form-control"
                                />
                                <button type="submit" class="secondary-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="py-5 px-5 text-center">
                            <div class="text-light">
                                <h4>
                                    A dream doesn't become reality through
                                    magic, it takes sweat, determination and
                                    hard work.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="container py-4">
        <h2 class="text-center text-dark mb-4">Các Công Ty Hàng Đầu</h2>
        <div class="row">
            @if ($topEmployers->isEmpty())
                <div class="col-12">
                    <p class="text-center text-muted">No employers found.</p>
                </div>
            @else
                @foreach ($topEmployers as $employer)
                    <div class="col-6 col-md-4 col-lg-2 mb-4 d-flex align-items-stretch">
                        <a href="{{ route('account.employer', ['id' => $employer->id]) }}">
                        <div class="card text-center company-card shadow-sm w-100">
                            <a href="{{ route('account.employer', ['id' => $employer->id]) }}" class="p-3">
                                <img
                                    src="{{ asset($employer->logo) }}"
                                    class="img-fluid mx-auto d-block"
                                    alt="{{ $employer->name }}"
                                    style="max-width: 100px; max-height: 60px"
                                />
                            </a>
                            <a href="{{ route('account.employer', ['id' => $employer->id]) }}">
                                <div class="card-body d-flex flex-column align-items-center">
                                <h5 class="card-title  text-dark mb-3 d-flex align-items-center justify-content-center text-center" style="height: 50px;">
                                    {{ $employer->title }}
                                </h5>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    {{-- jobs list --}}
    <section class="container jobs-section py-5">
        <h2 class="text-center text-dark mb-4">Việc Làm Gợi Ý</h2>
        <div class="row">
            @foreach ($posts as $post)
                @if ($post->company)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{route('post.show',['job'=>$post->id])}}">
                        <div class="card job-card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <div class="job-logo mb-3">
                                    <img
                                        src="{{ asset($post->company->logo) }}"
                                        alt="job listings"
                                        class="img-fluid"
                                        style="width: 40px"
                                    />
                                </div>
                                <h5 class="card-title font-weight-bold">
                                    {{ $post->job_title }}
                                </h5>
                                <p class="text-muted">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $post->location }}
                                </p>
                                <p class="job-description text-muted">
                                    {{ Str::limit($post->description, 100) }}
                                </p>
                                <span class="badge badge-pill badge-primary">
                                    {{ $post->employment_type }}
                                </span>
                                <span class="text-muted small float-right">
                                    Apply Before:
                                    {{ Str::limit($post->deadline, 10, '') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="text-center">
            <a
                class="btn btn-primary show-all-btn"
                href="{{ route('job.index') }}"
            >
                Show all jobs
            </a>
        </div>
    </section>

    <section class="container py-4">
        <div class="card mb-4 job-by-category">
            <div class="card-header">
                <p class="font-weight-bold">
                    <i class="fab fa-typo3"></i>
                    Jobs By Category
                </p>
            </div>
            <div class="card-body">
                <div class="jobs-category mb-3 mt-0">
                    @foreach ($categories as $category)
                        <div class="hover-shadow p-1">
                            <a
                                href="{{ URL::to('search?category_id=' . $category->id) }}"
                                class="text-muted"
                            >
                                {{ $category->category_name }}
                            </a>
                        </div>
                    @endforeach

                    <a class="p-1 text-info" href="{{ route('job.index') }}">
                        More..
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .job-card {
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .job-card:hover {
            transform: scale(1.02);
        }

        .company-card {
            border-radius: 10px;
            transition: transform 0.2s;
        }

        .company-card:hover {
            transform: scale(1.02);
        }

        .job-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f4f4;
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
        .badge-primary {
            background-color: #6f42c1;
            color: #fff;
        }


    </style>
@endsection
