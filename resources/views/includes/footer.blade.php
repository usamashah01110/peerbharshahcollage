<footer>
  <div class="container">
    <div class="row g-5">
      <!-- About col -->
      <div class="col-lg-4 col-md-6">
        <div class="d-flex align-items-center gap-2 mb-3">
          <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="46" height="46">
            <circle cx="50" cy="50" r="48" fill="#8b1a2e" stroke="#c9a84c" stroke-width="2.5"/>
            <text x="50" y="38" text-anchor="middle" font-family="serif" font-size="8" fill="#c9a84c" font-weight="bold">GOVT.</text>
            <text x="50" y="48" text-anchor="middle" font-family="serif" font-size="7" fill="#fff">GRADUATE</text>
            <text x="50" y="57" text-anchor="middle" font-family="serif" font-size="7" fill="#fff">COLLEGE FOR</text>
            <text x="50" y="66" text-anchor="middle" font-family="serif" font-size="7" fill="#fff">WOMEN</text>
            <text x="50" y="77" text-anchor="middle" font-family="serif" font-size="6.5" fill="#c9a84c">✦ 1968 ✦</text>
          </svg>
          <div>
            <div class="footer-logo-text">Govt. Graduate College for Women</div>
            <div class="footer-logo-text" style="font-size:.85rem;">Sheikhupura</div>
            <div class="footer-sub">Since 1968</div>
          </div>
        </div>
        <p class="tagline">Discover Your True Potential at Government Graduate College for Girls, Sheikhupura, Pakistan</p>
        <div class="social-icons mt-3">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <!-- Get in Touch -->
      <div class="col-lg-2 col-md-6">
        <h6>Get in Touch</h6>
        <div class="contact-info">
          <strong>056 3783273</strong>
          Govt. Graduate College For Girls, Sheikhupura,<br>
          Bhang Road,<br>Sheikhupura, Pakistan
        </div>
        <a href="#" class="btn-view-all d-inline-block mt-3" style="font-size:.75rem;padding:7px 16px;">Get Directions</a>
      </div>

      <!-- About Links -->
      <div class="col-lg-2 col-md-4">
        <h6>About</h6>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Admissions</a></li>
          <li><a href="#">Student Life</a></li>
        </ul>
      </div>

      <!-- Links -->
      <div class="col-lg-2 col-md-4">
        <h6>Links</h6>
        <ul>
          <li><a href="#">Faculty &amp; Staff</a></li>
          <li><a href="#">BS Courses</a></li>
          <li><a href="#">Intermediate Programs</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    © 2025 Govt. Graduate College for Girls, Sheikhupura. All Rights Reserved.
  </div>
</footer>

<!-- Back to top -->
<a href="#" class="back-to-top" title="Back to Top"><i class="bi bi-arrow-up"></i></a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Smooth back-to-top
  document.querySelector('.back-to-top').addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // Animate stats on scroll
  const statNums = document.querySelectorAll('.stat-item .number');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.3 });

  statNums.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity .6s ease, transform .6s ease';
    observer.observe(el);
  });
</script>
</body>
</html>