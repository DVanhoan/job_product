<footer>
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-4">
          <div class="footer-links">
            <h5 class="lead footer-hdr">SERVICES</h5>
            <ul class="footer-link-list">
              <li><a href="#" class="footer-link">Branding</a></li>
              <li><a href="#" class="footer-link">Design</a></li>
              <li><a href="#" class="footer-link">Marketing</a></li>
              <li><a href="#" class="footer-link">Advertisement</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4 col-md-4">
          <div class="footer-links">
            <h5 class="lead footer-hdr">COMPANY</h5>
            <ul class="footer-link-list">
              <li><a href="#" class="footer-link">About us</a></li>
              <li><a href="#" class="footer-link">Contact</a></li>
              <li><a href="#" class="footer-link">Jobs</a></li>
              <li><a href="#" class="footer-link">Press kit</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4 col-md-4">
          <div class="footer-links">
            <h5 class="lead footer-hdr">LEGAL</h5>
            <ul class="footer-link-list">
              <li><a href="#" class="footer-link">Terms of use</a></li>
              <li><a href="#" class="footer-link">Privacy policy</a></li>
              <li><a href="#" class="footer-link">Cookie policy</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom row">
        <div class="col-md-6">
          <p class="footer-text">ACME Industries Ltd.<br>Providing reliable tech since 1992</p>
        </div>
        <div class="col-md-6 text-right">
          <div class="social-links">
            <a href="https://twitter.com" target="_blank" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="https://youtube.com" target="_blank" class="social-link"><i class="fab fa-youtube"></i></a>
            <a href="https://facebook.com" target="_blank" class="social-link"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

@push('css')
<style>
  .footer-main {
    bottom: 0;
    background-color: #272727;
    padding: 20px 0;
    color: #ddd;
  }
  .footer-links {
    margin-bottom: 20px;
  }
  .footer-hdr {
    font-weight: bold;
    color: #f8f9fa;
  }
  .footer-link-list {
    list-style: none;
    padding: 0;
  }
  .footer-link-list li {
    margin-bottom: 8px;
  }
  .footer-link {
    color: #ccc;
    text-decoration: none;
  }
  .footer-link:hover {
    color: #f8f9fa;
  }
  .footer-bottom {
    border-top: 1px solid #444;
    padding-top: 15px;
    margin-top: 20px;
  }
  .footer-text {
    font-size: 0.9rem;
    color: #bbb;
  }
  .social-links .social-link {
    color: #ddd;
    font-size: 1.2rem;
    margin-left: 15px;
    transition: color 0.3s;
  }
  .social-links .social-link:hover {
    color: #f8f9fa;
  }
</style>
@endpush
