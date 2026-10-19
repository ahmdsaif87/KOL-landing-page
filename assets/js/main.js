// Navbar — toggle menu mobile + bayangan saat scroll + tahun footer.
(function () {
  const nav = document.getElementById('nav');
  const toggle = document.getElementById('nav-toggle');
  const menu = document.getElementById('nav-menu');

  // Toggle menu mobile
  toggle?.addEventListener('click', () => {
    const isHidden = menu.classList.toggle('hidden');
    toggle.setAttribute('aria-expanded', String(!isHidden));
  });

  // Tutup menu mobile saat salah satu link diklik
  menu?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      menu.classList.add('hidden');
      toggle?.setAttribute('aria-expanded', 'false');
    });
  });

  // Smooth scroll offset untuk navigasi navbar agar konten tidak tertutup
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (!href || href === '#') return;

      // Skip link aksesibilitas konten utama
      if (href === '#konten') return;

      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();

        // Untuk link About Us / logo ke puncak halaman
        if (href === '#about') {
          window.scrollTo({ top: 0, behavior: 'smooth' });
          if (history.pushState) history.pushState(null, '', href);
          return;
        }

        const navHeight = nav ? nav.offsetHeight : 80;
        const targetTop = target.getBoundingClientRect().top + window.pageYOffset;
        // Posisikan section tepat di bawah navbar
        const offsetPosition = Math.max(0, targetTop - navHeight);

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });

        if (history.pushState) {
          history.pushState(null, '', href);
        }
      }
    });
  });

  // Bayangan halus saat halaman di-scroll
  const onScroll = () => nav?.classList.toggle('shadow-sm', window.scrollY > 8);
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // Tahun berjalan di footer
  const year = document.getElementById('year');
  if (year) year.textContent = String(new Date().getFullYear());
})();
