<section class="bg-dark py-5">
    <footer class="container mx-auto row px-5">

        <div class="col-12 col-md-4 mb-4 text-center text-md-start">
            <img
                src="{{ asset('Logo.svg') }}"
                alt="logo"
                class="invert img-fluid mx-auto d-block d-md-inline-block"
            />
            <p class="text-muted mt-3">
                Ehya is a job board and job site for job seekers and employers.
            </p>
            <ul class="list-inline mt-4">
                <li class="list-inline-item">
                    <a href="/" class="text-secondary">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="/" class="text-secondary">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="/" class="text-secondary">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="/" class="text-secondary">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="/" class="text-secondary">
                        <i class="fab fa-telegram fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>


        <div class="col-6 col-md-2 mb-4">
            <h5 class="text-light">Search for jobs</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by location</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by category</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by company</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by keyword</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by salary</a></li>
            </ul>
        </div>


        <div class="col-6 col-md-2 mb-4">
            <h5 class="text-light">For employers</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="{{ route('post.create') }}" class="text-muted">Create job</a></li>
                <li><a href="{{ route('account.authorSection') }}" class="text-muted">Manage job</a></li>
                <li><a href="{{ route('jobApplication.index') }}" class="text-muted">Job applications</a></li>
                <li><a href="{{ route('savedJob.index') }}" class="text-muted">Manage candidates</a></li>
                <li><a href="{{ route('company.store') }}" class="text-muted">Manage company</a></li>
            </ul>
        </div>


        <div class="col-6 col-md-2 mb-4">
            <h5 class="text-light">About</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="/" class="text-muted">About us</a></li>
                <li><a href="/" class="text-muted">What we do</a></li>
                <li><a href="/" class="text-muted">Our team</a></li>
                <li><a href="/" class="text-muted">Contact</a></li>
            </ul>
        </div>


        <div class="col-12 text-center mt-5">
            <div class="bg-primary text-white p-3 rounded-circle d-inline-block">
                <i class="fas fa-heart fa-lg"></i>
            </div>
            <p class="mt-3 font-weight-bold text-muted">
                Copyright © 2023. All rights reserved
            </p>
        </div>
    </footer>
</section>


<button onclick="scrollToTop()" id="scrollToTopBtn" class="scroll-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
