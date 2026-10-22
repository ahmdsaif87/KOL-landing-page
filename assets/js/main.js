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

  // ===== HERO MOCKUP SLIDER =====
  const heroSlider = document.getElementById('hero-slider-container');
  if (heroSlider) {
    const track = document.getElementById('hero-slider-track');
    const prevBtn = document.getElementById('hero-slider-prev');
    const nextBtn = document.getElementById('hero-slider-next');
    const dots = heroSlider.querySelectorAll('.hero-dot');
    const slidesCount = dots.length || 4;
    let currentIndex = 0;
    let autoplayTimer = null;

    const updateSlider = (index) => {
      currentIndex = (index + slidesCount) % slidesCount;
      if (track) {
        track.style.transform = `translateX(-${currentIndex * 100}%)`;
      }
      dots.forEach((dot, i) => {
        if (i === currentIndex) {
          dot.classList.remove('w-2', 'bg-slate-300', 'hover:bg-slate-400');
          dot.classList.add('w-7', 'bg-brand');
          dot.setAttribute('aria-current', 'true');
        } else {
          dot.classList.remove('w-7', 'bg-brand');
          dot.classList.add('w-2', 'bg-slate-300', 'hover:bg-slate-400');
          dot.removeAttribute('aria-current');
        }
      });
    };

    const nextSlide = () => updateSlider(currentIndex + 1);
    const prevSlide = () => updateSlider(currentIndex - 1);

    const startAutoplay = () => {
      stopAutoplay();
      autoplayTimer = setInterval(nextSlide, 4500);
    };

    const stopAutoplay = () => {
      if (autoplayTimer) {
        clearInterval(autoplayTimer);
        autoplayTimer = null;
      }
    };

    prevBtn?.addEventListener('click', (e) => {
      e.preventDefault();
      prevSlide();
      startAutoplay();
    });

    nextBtn?.addEventListener('click', (e) => {
      e.preventDefault();
      nextSlide();
      startAutoplay();
    });

    dots.forEach((dot, index) => {
      dot.addEventListener('click', (e) => {
        e.preventDefault();
        updateSlider(index);
        startAutoplay();
      });
    });

    // Pause on hover
    heroSlider.addEventListener('mouseenter', stopAutoplay);
    heroSlider.addEventListener('mouseleave', startAutoplay);

    // Keyboard navigation
    heroSlider.setAttribute('tabindex', '0');
    heroSlider.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        prevSlide();
        startAutoplay();
      } else if (e.key === 'ArrowRight') {
        e.preventDefault();
        nextSlide();
        startAutoplay();
      }
    });

    // Touch Swipe Support (Mobile)
    let touchStartX = 0;
    let touchEndX = 0;
    heroSlider.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
      stopAutoplay();
    }, { passive: true });

    heroSlider.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      const diffX = touchEndX - touchStartX;
      if (Math.abs(diffX) > 40) {
        if (diffX > 0) {
          prevSlide();
        } else {
          nextSlide();
        }
      }
      startAutoplay();
    }, { passive: true });

    // Mulai autoplay
    startAutoplay();
  }

  // ===== FAQ ACCORDION =====
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach((item) => {
    const toggle = item.querySelector('.faq-toggle');
    const content = item.querySelector('.faq-content');
    const icon = item.querySelector('.faq-icon');

    toggle?.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open');

      // Tutup FAQ item lain agar rapi
      faqItems.forEach((other) => {
        if (other !== item && other.classList.contains('is-open')) {
          other.classList.remove('is-open');
          const otherContent = other.querySelector('.faq-content');
          const otherToggle = other.querySelector('.faq-toggle');
          const otherIcon = other.querySelector('.faq-icon');
          if (otherContent) {
            otherContent.style.maxHeight = '0px';
            otherContent.classList.remove('opacity-100');
            otherContent.classList.add('opacity-0');
          }
          otherToggle?.setAttribute('aria-expanded', 'false');
          otherIcon?.classList.remove('rotate-45');
        }
      });

      if (isOpen) {
        item.classList.remove('is-open');
        if (content) {
          content.style.maxHeight = '0px';
          content.classList.remove('opacity-100');
          content.classList.add('opacity-0');
        }
        toggle.setAttribute('aria-expanded', 'false');
        icon?.classList.remove('rotate-45');
      } else {
        item.classList.add('is-open');
        if (content) {
          content.style.maxHeight = (content.scrollHeight + 32) + 'px';
          content.classList.remove('opacity-0');
          content.classList.add('opacity-100');
        }
        toggle.setAttribute('aria-expanded', 'true');
        icon?.classList.add('rotate-45');
      }
    });
  });
})();

