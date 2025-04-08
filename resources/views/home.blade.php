@extends('layouts.post')

@section('content')
<section class="home-page pt-4">
    <div class="container">
        <form action="{{ route('job.index') }}" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <div class="px-4">
                        <div class="rounded-text">
                            <p>Find jobs, vacancy, career online.</p>
                        </div>
                        <div class="home-search-bar">
                            <input type="text" name="q" placeholder="Search Job By Title"
                                class="home-search-input form-control" />
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
    <h2 class="text-center text-dark mb-4">Top Companies</h2>
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
                        <img src="{{ secure_asset($employer->logo) }}" class="img-fluid mx-auto d-block"
                            alt="{{ $employer->title }}" style="max-width: 100px; max-height: 60px" />
                    </a>
                    <a href="{{ route('account.employer', ['id' => $employer->id]) }}">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title  text-dark mb-3 d-flex align-items-center justify-content-center text-center"
                                style="height: 50px;">
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


<section class="container jobs-section py-5">
    <h2 class="text-center text-dark mb-4">Recommended Jobs</h2>
    <div class="row">
        @foreach ($posts as $post)
        @if ($post->company)
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{route('post.show',['job'=>$post->id])}}">
                <div class="card job-card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <div class="job-logo mb-3">
                            <img src="{{ secure_asset($post->company->logo) }}" alt="job listings" class="img-fluid"
                                style="width: 40px" />
                        </div>

                        <h5 class="card-title font-weight-bold">
                            {{ $post->job_title }}
                        </h5>
                        <p class="text-muted">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $post->job_location }}
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
    <div class="d-flex justify-content-center pagination-container">
        @if($posts->count() > 0)
        {{ $posts->links() }}
        @else
        <p>Không có bài viết nào.</p>
        @endif
    </div>

</section>



<section class="container py-4">
    <div class="card mb-4 job-by-category shadow-sm border-0">
        <h2 class="text-center text-dark mb-4">Job By Category</h2>
        <div class="card-body">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-md-4 col-sm-6 mb-2">
                    <div class="hover-shadow p-2 rounded border">
                        <a href="{{ URL::to('search?category_id=' . $category->id) }}"
                            class="text-dark text-decoration-none">
                            {{ $category->category_name }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('job.index') }}" class="btn btn-link text-info">
                    More..
                </a>
            </div>
        </div>
    </div>
</section>



<section class="team-section">
    <div class="container">
        <h2 class="team-title">OUR AMAZING TEAM</h2>
        <div class="row mt-5">
            <div class="col-md-4 team-member">
                <img src="images/members/member2.jpeg" alt="Parveen Anand" class="img-fluid">
                <h4 class="member-name">Nguyễn Tấn Duy</h4>
                <p class="member-position">Member</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-4 team-member">
                <img src="{{ secure_asset('images/members/leader.png') }}" alt="Diana Petersen" class="img-fluid">
                <h4 class="member-name">Dương Văn Hoan</h4>
                <p class="member-position">Team Leader</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-4 team-member">
                <img src="{{ secure_asset('images/members/member1.jpg') }}" alt="Larry Parker" class="img-fluid">
                <h4 class="member-name">A Phiên</h4>
                <p class="member-position">Member</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
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

    .team-section {
        background-color: #f7f8fa;
        padding: 60px 0;
        text-align: center;
    }

    .team-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .team-subtitle {
        color: #888;
        margin-bottom: 40px;
    }

    .team-member {
        margin-bottom: 30px;
    }

    .team-member img {
        border-radius: 50%;
        border: 5px solid #eaeaea;
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .member-name {
        font-weight: bold;
        margin-top: 15px;
    }

    .member-position {
        color: #888;
        margin-bottom: 15px;
    }

    .social-links a {
        color: #555;
        margin: 0 10px;
        font-size: 18px;
    }
</style>
@endsection