

<footer>
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-4 col-md-6">
                <div class="footer-mark">
                    <div class="brand-seal">PB</div>
                    <div>
                        <div class="name">Pir Bahar Shah</div>
                        <div class="sub">College for Women</div>
                    </div>
                </div>
                <p>
                    A Government graduate college for women in Sheikhupura, dedicated to academic excellence, character building, and empowering young women to lead.
                </p>
                <div class="social-row mt-4">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
                <h6>Explore</h6>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Academics</a></li>
                    <li><a href="#">Admissions</a></li>
                    <li><a href="#">Faculty</a></li>
                    <li><a href="#">News</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
                <h6>Programs</h6>
                <ul>
                    <li><a href="#">FSc Pre-Medical</a></li>
                    <li><a href="#">FSc Pre-Engineering</a></li>
                    <li><a href="#">FA / ICS</a></li>
                    <li><a href="#">BS Programs</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6">
                <h6>Get in Touch</h6>
                <p style="font-family:'Fraunces',serif; font-size:1.4rem; font-style:italic; color:var(--ivory); margin-bottom: 8px;">+92 56 0000000</p>
                <p style="margin-bottom: 18px;">info@gpbsgcw.edu.pk</p>
                <p style="font-size: .88rem; line-height: 1.7;">
                    Govt. Pir Bahar Shah Graduate College for Women,<br>
                    Sheikhupura, Punjab, Pakistan.
                </p>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-between flex-wrap gap-3">
            <div>© 2026 Govt. Pir Bahar Shah Graduate College for Women. All rights reserved.</div>
            <div>
                <a href="#">Privacy</a> &nbsp;·&nbsp;
                <a href="#">Terms</a> &nbsp;·&nbsp;
                <a href="#">Sitemap</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Reveal-on-scroll
    const revealEls = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('in-view');
                revealObserver.unobserve(e.target);
            }
        });
    }, { threshold: .14 });
    revealEls.forEach(el => revealObserver.observe(el));

    // Animated counters
    const statCells = document.querySelectorAll('[data-stat]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                const numEl = entry.target.querySelector('.num');
                const target = parseInt(numEl.dataset.target, 10);
                const plus = numEl.querySelector('.plus');
                let current = 0;
                const duration = 1800;
                const startTime = performance.now();
                const tick = (now) => {
                    const t = Math.min((now - startTime) / duration, 1);
                    const eased = 1 - Math.pow(1 - t, 3);
                    current = Math.round(eased * target);
                    numEl.firstChild.textContent = current.toLocaleString();
                    if (t < 1) requestAnimationFrame(tick);
                };
                requestAnimationFrame(tick);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: .4 });
    statCells.forEach(c => counterObserver.observe(c));
</script>
</body>
</html>

