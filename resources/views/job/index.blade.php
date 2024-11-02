@extends('layouts.job')
@section('content')
<section class="job-section">
    <section class="search-bar mt-2 px-0">
        <div class="py-4">
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <form>
                <div class="row m-1">
                  <div class="col-md-12 input-group">
                    <input
                      type="text"
                      name="q"
                      class="form-control"
                      placeholder="Search By Job Title"
                      v-model="jobTitle"
                    />
                    <span class="input-group-append">
                      <button class="btn btn-success pt-1">
                        <span class="icon-search"></span> Search Jobs
                      </button>
                    </span>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-sm-12 col-md-6 offset-md-3 small text-center my-2">
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <router-link to="/">All Jobs</router-link>
                </div>
                <div class="col-sm-6 col-md-3">
                  <router-link to="/jobs-by-organization"
                    >By Organisation</router-link
                  >
                </div>
                <div class="col-sm-6 col-md-3">
                  <router-link to="/jobs-by-category">By Job Category</router-link>
                </div>
                <div class="col-sm-6 col-md-3">
                  <router-link to="/jobs-by-title">By Job Title</router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <div class="job-component">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-sm-12 col-md-5 col-xl-4">
                <div class="card p-0 m-0">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center small mb-0">
                            <i class="fas fa-search mr-1"></i>
                            <strong>Refine Your Job Search</strong>
                        </div>
                        <a href="#" class="job-filter d-md-none d-none" data-toggle="collapse" data-target="#accordion" aria-expanded="true" aria-controls="accordion">
                            <i class="icon icon-list"></i> Filter
                        </a>
                    </div>
                </div>
                <div id="accordion">
                    <!-- Job Categories -->
                    <div class="card border-top-0">
                        <div class="card-body p-3">
                            <div class="pb-0">
                                <div class="card-title mb-1">Job Categories</div>
                                <div class="card-body p-0">
                                    <form method="GET" action="{{ route('job.index') }}">
                                        <select name="category_id" class="form-control" onchange="this.form.submit()">
                                            <option disabled selected value>-- select an option --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-3">
                            <!-- Job Level -->
                            <div class="pb-0">
                                <div class="card-title mb-1">Job Level</div>
                                <div class="card-body p-0">
                                    <form method="GET" action="{{ route('job.index') }}">
                                        <select name="job_level" class="form-control" onchange="this.form.submit()">
                                            <option disabled selected value>-- select an option --</option>
                                            <option value="Senior level" {{ request('job_level') == 'Senior level' ? 'selected' : '' }}>Senior level</option>
                                            <option value="Mid level" {{ request('job_level') == 'Mid level' ? 'selected' : '' }}>Mid level</option>
                                            <option value="Top level" {{ request('job_level') == 'Top level' ? 'selected' : '' }}>Top level</option>
                                            <option value="Entry level" {{ request('job_level') == 'Entry level' ? 'selected' : '' }}>Entry level</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-3">
                            <!-- Education Level -->
                            <div class="pb-0">
                                <div class="card-title mb-1">Education</div>
                                <div class="card-body p-0">
                                    <form method="GET" action="{{ route('job.index') }}">
                                        <select name="education_level" class="form-control" onchange="this.form.submit()">
                                            <option disabled selected value>-- select an option --</option>
                                            <option value="Bachelors" {{ request('education_level') == 'Bachelors' ? 'selected' : '' }}>Bachelors</option>
                                            <option value="High School" {{ request('education_level') == 'High School' ? 'selected' : '' }}>High School</option>
                                            <option value="Master" {{ request('education_level') == 'Master' ? 'selected' : '' }}>Master</option>
                                            <option value="SEE Mid School" {{ request('education_level') == 'SEE Mid School' ? 'selected' : '' }}>SEE Mid School</option>
                                            <option value="Other" {{ request('education_level') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-3">
                            <!-- Employment Type -->
                            <div class="pb-0">
                                <div class="card-title mb-1">Employment Type</div>
                                <div class="card-body p-0">
                                    <form method="GET" action="{{ route('job.index') }}">
                                        <select name="employment_type" class="form-control" onchange="this.form.submit()">
                                            <option disabled selected value>-- select an option --</option>
                                            <option value="Full Time" {{ request('employment_type') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                                            <option value="Part Time" {{ request('employment_type') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                                            <option value="Freelance" {{ request('employment_type') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                            <option value="Internship" {{ request('employment_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                                            <option value="Trainneship" {{ request('employment_type') == 'Trainneship' ? 'selected' : '' }}>Trainneship</option>
                                            <option value="Volunteer" {{ request('employment_type') == 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Results -->
            <div class="col-sm-12 col-md-7 col-xl-8">
                @if($posts->isEmpty())
                    <div>
                        <p class="card-header">No Results</p>
                        <div class="card-body bg-white text-center">
                            <div class="card-text">
                                <img src="images/search-not-found.png" alt="search-not-found-clip">
                                <h4>No Jobs found <br>
                                    <span class="text-muted font-size-12px">Please search for another keyword.</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card mt-md-0 mt-3">
                        <div class="card-body row p-3">
                            <div class="col-6">
                                <h1 class="h6">Showing {{ $posts->firstItem() }} - {{ $posts->lastItem() }} job of {{ $posts->total() }}</h1>
                            </div>
                        </div>
                    </div>

                    <!-- Jobs Listing -->
                    <div class="posts">
                        @foreach($posts as $post)
                            <div class="card mt-3 hover-shadow">
                                <div class="card-body">
                                    <div class="row align-items-center text-center text-lg-left">
                                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 pt-2 mx-auto">
                                            <img class="border p-2 img-fluid" src="/{{ $post->company->logo }}" width="100px">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pl-0 pl-md-2 pb-2">
                                            <h5 class="secondary-link font-weight-bold">
                                                <a href="/job/{{ $post->id }}-{{ $post->job_title }}" target="_blank">
                                                    {{ $post->job_title }}
                                                </a>
                                            </h5>
                                            <h6 class="mt-2">
                                                <a href="/employer/{{ $post->company->id }}-{{ $post->company->title }}" target="_blank" class="text-dark">
                                                    {{ $post->company->title }}
                                                </a>
                                            </h6>
                                            <div class="small my-1">
                                                <span>Address: </span>
                                                <span>{{ $post->job_location }}</span>
                                            </div>
                                            <div class="small">
                                                <span class="text-muted">Key Skills:</span>
                                                <span class="text-info">{{ $post->skills }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer py-2">
                                    <div class="d-inline">
                                        <span class="text-muted"><i class="fas fa-clock"></i> Apply Before: {{ \Illuminate\Support\Str::limit($post->deadline, 10, '') }}</span>
                                    </div>
                                    <div class="d-inline float-right">
                                        <span class="text-muted mr-2"><i class="fas fa-eye mr-1"></i> Views: {{ $post->views }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="my-4 text-center small">
                        <div class="d-block py-2 text-muted">
                            {{ $posts->total() }} Total Jobs found with matching search
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
