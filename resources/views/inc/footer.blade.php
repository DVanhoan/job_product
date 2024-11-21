<section class="bg-dark py-5">
    <footer class="container mx-auto d-flex flex-wrap justify-content-between align-items-start px-5">

        <div class="col-12 col-md-3 text-center text-md-start mb-4">
            <img src="{{ asset('Logo.svg') }}" alt="logo" class="invert img-fluid mb-3" />
            <p class="text-muted">
                Ehya is a job board and job site for job seekers and employers.
            </p>
            <ul class="list-inline mt-4">
                <li class="list-inline-item">
                    <a href="https://twitter.com/" target="_blank" class="text-secondary">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.youtube.com/" target="_blank" class="text-secondary">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.instagram.com/" target="_blank" class="text-secondary">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/" target="_blank" class="text-secondary">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://t.me/" target="_blank" class="text-secondary">
                        <i class="fab fa-telegram fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>


        <div class="col-12 col-sm-6 col-md-2 text-center text-md-start mb-4">
            <h5 class="text-light">Search for jobs</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by location</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by category</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by company</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by keyword</a></li>
                <li><a href="{{ route('job.index') }}" class="text-muted">Job by salary</a></li>
            </ul>
        </div>

        <div class="col-12 col-sm-6 col-md-2 text-center text-md-start mb-4">
            <h5 class="text-light">For employers</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="{{ route('post.create') }}" class="text-muted">Create job</a></li>
                <li><a href="{{ route('account.authorSection') }}" class="text-muted">Manage job</a></li>
                <li><a href="{{ route('jobApplication.index') }}" class="text-muted">Job applications</a></li>
                <li><a href="{{ route('savedJob.index') }}" class="text-muted">Manage candidates</a></li>
                <li><a href="{{ route('company.store') }}" class="text-muted">Manage company</a></li>
            </ul>
        </div>

        <div class="col-12 col-sm-6 col-md-2 text-center text-md-start mb-4">
            <h5 class="text-light">About</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="/" class="text-muted">About us</a></li>
                <li><a href="/" class="text-muted">What we do</a></li>
                <li><a href="/" class="text-muted">Our team</a></li>
                <li><a href="/" class="text-muted">Contact</a></li>
            </ul>
        </div>
    </footer>


</section>


<button onclick="scrollToTop()" id="scrollToTopBtn" class="scroll-to-top">
    <i class="fas fa-arrow-up"></i>
</button>


<style>
    footer {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
}

footer .col-md-3 img {
    max-width: 150px;
}

footer h5 {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

footer ul {
    padding-left: 0;
    list-style: none;
}

footer ul li {
    margin-bottom: 0.5rem;
}

footer ul li a {
    color: #6c757d;
    transition: color 0.3s;
}

footer ul li a:hover {
    color: #fff;
}

footer .list-inline-item a {
    transition: color 0.3s;
}

footer .list-inline-item a:hover {
    color: #fff;
}

.scroll-to-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: #08036e;
    color: #fff;
    border: none;
    border-radius: 50%;
    padding: 0.75rem 1rem;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: background 0.3s;
}

.scroll-to-top:hover {
    background: #574bff;
}

</style>
