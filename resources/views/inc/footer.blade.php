<section class="bg-dark py-5">
    <footer class="container mx-auto row px-5">
        {{-- Logo và giới thiệu --}}
        <div class="col-12 col-md-4 mb-4 text-center text-md-start">
            <img
                src="{{ asset('Logo.svg') }}"
                alt="logo"
                class="invert img-fluid mx-auto d-block d-md-inline-block"
            />
            <p class="text-muted mt-3">
                Build a modern and creative website with crealand
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

        {{-- Cột Product --}}
        <div class="col-6 col-md-2 mb-4">
            <h5 class="text-light">Product</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="/" class="text-muted">Landingpage</a></li>
                <li><a href="/" class="text-muted">Features</a></li>
                <li><a href="/" class="text-muted">Documentation</a></li>
                <li><a href="/" class="text-muted">Referral Program</a></li>
                <li><a href="/" class="text-muted">Pricing</a></li>
            </ul>
        </div>

        {{-- Cột Services --}}
        <div class="col-6 col-md-2 mb-4">
            <h5 class="text-light">Services</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="/" class="text-muted">Documentation</a></li>
                <li><a href="/" class="text-muted">Design</a></li>
                <li><a href="/" class="text-muted">Themes</a></li>
                <li><a href="/" class="text-muted">Illustrations</a></li>
                <li><a href="/" class="text-muted">UI Kit</a></li>
            </ul>
        </div>

        {{-- Cột Company --}}
        <div class="col-6 col-md-2 mb-4">
            <h5 class="text-light">Company</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="/" class="text-muted">About</a></li>
                <li><a href="/" class="text-muted">Terms</a></li>
                <li><a href="/" class="text-muted">Privacy Policy</a></li>
                <li><a href="/" class="text-muted">Careers</a></li>
            </ul>
        </div>

        {{-- Cột More --}}
        <div class="col-6 col-md-2 mb-4">
            <h5 class="text-light">More</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="/" class="text-muted">Documentation</a></li>
                <li><a href="/" class="text-muted">License</a></li>
                <li><a href="/" class="text-muted">Changelog</a></li>
            </ul>
        </div>

        {{-- Dòng bản quyền --}}
        <div class="col-12 text-center mt-5">
            <div
                class="bg-primary text-white p-3 rounded-circle d-inline-block"
            >
                <i class="fas fa-heart fa-lg"></i>
            </div>
            <p class="mt-3 font-weight-bold text-muted">
                Copyright © 2023. Crafted with love.
            </p>
        </div>
    </footer>
</section>


<!-- Nút cuộn lên đầu trang -->
<button onclick="scrollToTop()" id="scrollToTopBtn" class="scroll-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
