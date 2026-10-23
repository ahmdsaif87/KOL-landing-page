    <!-- ===== HERO / ABOUT US ===== -->
    <section id="about" class="scroll-mt-24 relative overflow-hidden bg-gradient-to-b from-[#004ac6]/5 via-transparent to-transparent pb-28 pt-12">
      <div class="mx-auto flex max-w-[1240px] flex-col items-center px-5 sm:px-8 lg:px-16">
        <div class="inline-flex items-center gap-1 rounded-full bg-mist px-4 py-1.5 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
          <img src="<?= base_url('assets/icons/badge-bolt.svg') ?>" alt="" class="h-[13.33px] w-[10.67px]">
          <span class="text-center text-[11px] font-semibold uppercase leading-[14px] tracking-[0.55px] text-brand">
            Ekosistem Influencer Marketing Terintegrasi
          </span>
        </div>

        <h1 class="mt-6 max-w-[1130px] text-center font-display text-[36px] font-extrabold leading-[44px] tracking-[-0.045em] text-ink sm:text-[48px] sm:leading-[56px] md:text-[64px] md:leading-[72px] md:tracking-[-0.03em]">
          Kelola Seluruh Campaign KOL<br class="hidden sm:block"> dalam Satu Platform
        </h1>

        <p class="mt-5 max-w-[720px] text-center text-base leading-[26px] tracking-[-0.01em] text-body sm:text-lg sm:leading-[29.25px]">
          Sistem kami menawarkan pengelolaan database kreator,<br class="hidden sm:block">
          campaign, approval, dan performa dalam satu ekosistem yang terintegrasi.
        </p>

        <!-- Mockup Carousel Container -->
        <div class="group relative mt-12 w-full max-w-[1020px]" id="hero-slider-container" aria-roledescription="carousel" aria-label="Tampilan Antarmuka KOLAB.ID">
          <!-- Mockup wrapper with permanent elegant shadow (borderless, no hover shift) -->
          <div class="relative overflow-hidden rounded-xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.15)]">
            <!-- Slider Track -->
            <div id="hero-slider-track" class="flex transition-transform duration-500 ease-out will-change-transform">
              <!-- Slide 1 -->
              <div class="w-full flex-shrink-0" role="group" aria-roledescription="slide" aria-label="1 dari 4: Dashboard Utama">
                <img src="<?= base_url('assets/images/hero-mockup.png') ?>"
                     alt="Tampilan dashboard campaign KOLAB.ID"
                     class="block h-auto w-full select-none"
                     width="1440" height="818">
              </div>
              <!-- Slide 2 -->
              <div class="w-full flex-shrink-0" role="group" aria-roledescription="slide" aria-label="2 dari 4: Manajemen Campaign & KOL">
                <img src="<?= base_url('assets/images/hero-mockup-2.png') ?>"
                     alt="Manajemen Campaign & KOL KOLAB.ID"
                     class="block h-auto w-full select-none"
                     width="1440" height="818" loading="lazy">
              </div>
              <!-- Slide 3 -->
              <div class="w-full flex-shrink-0" role="group" aria-roledescription="slide" aria-label="3 dari 4: Monitoring Performa Campaign">
                <img src="<?= base_url('assets/images/hero-mockup-3.png') ?>"
                     alt="Monitoring Performa Campaign KOLAB.ID"
                     class="block h-auto w-full select-none"
                     width="1440" height="818" loading="lazy">
              </div>
              <!-- Slide 4 -->
              <div class="w-full flex-shrink-0" role="group" aria-roledescription="slide" aria-label="4 dari 4: Laporan & Analytics KOL">
                <img src="<?= base_url('assets/images/hero-mockup-4.png') ?>"
                     alt="Laporan & Analytics KOL KOLAB.ID"
                     class="block h-auto w-full select-none"
                     width="1440" height="818" loading="lazy">
              </div>
            </div>

            <!-- Navigation Arrows (Floating) -->
            <button type="button" id="hero-slider-prev" aria-label="Slide sebelumnya"
                    class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 flex h-9 w-9 sm:h-11 sm:w-11 items-center justify-center rounded-full bg-white/90 text-ink shadow-md backdrop-blur-md transition-all duration-200 hover:bg-white hover:scale-105 active:scale-95 opacity-80 sm:opacity-0 group-hover:opacity-100 focus:opacity-100 focus:outline-none z-10 cursor-pointer">
              <svg class="h-4 w-4 sm:h-5 sm:w-5 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
              </svg>
            </button>
            <button type="button" id="hero-slider-next" aria-label="Slide berikutnya"
                    class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 flex h-9 w-9 sm:h-11 sm:w-11 items-center justify-center rounded-full bg-white/90 text-ink shadow-md backdrop-blur-md transition-all duration-200 hover:bg-white hover:scale-105 active:scale-95 opacity-80 sm:opacity-0 group-hover:opacity-100 focus:opacity-100 focus:outline-none z-10 cursor-pointer">
              <svg class="h-4 w-4 sm:h-5 sm:w-5 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </button>
          </div>

          <!-- Pagination Indicator Dots -->
          <div class="mt-5 flex items-center justify-center gap-2" id="hero-slider-dots">
            <button type="button" data-index="0" aria-label="Lihat slide 1" class="hero-dot h-2 w-7 rounded-full bg-brand transition-all duration-300 cursor-pointer"></button>
            <button type="button" data-index="1" aria-label="Lihat slide 2" class="hero-dot h-2 w-2 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300 cursor-pointer"></button>
            <button type="button" data-index="2" aria-label="Lihat slide 3" class="hero-dot h-2 w-2 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300 cursor-pointer"></button>
            <button type="button" data-index="3" aria-label="Lihat slide 4" class="hero-dot h-2 w-2 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300 cursor-pointer"></button>
          </div>
        </div>

        <div class="mt-10">
          <a href="#demo" class="inline-flex h-12 items-center justify-center gap-1 rounded-lg bg-accent px-7 text-sm font-medium tracking-[0.14px] text-white shadow-[0px_10px_15px_-3px_rgba(37,99,235,0.2),0px_4px_6px_-4px_rgba(37,99,235,0.2)] hover:bg-blue-700">
            Jadwalkan Demo
            <img src="<?= base_url('assets/icons/arrow-right.svg') ?>" alt="" class="h-3 w-3">
          </a>
        </div>
      </div>
    </section>

    <!-- ===== FITUR UNGGULAN ===== -->
    <section id="fitur" class="scroll-mt-24 bg-mist py-20">
      <div class="mx-auto flex max-w-[1240px] flex-col items-center gap-16 px-5 sm:px-8 lg:px-16">
        <div class="flex max-w-[768px] flex-col items-center gap-3 text-center">
          <span class="rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand">
            Fitur
          </span>
          <h2 class="pt-1 font-display text-3xl font-bold leading-[44px] tracking-[-0.02em] text-ink sm:text-[36px]">
            Fitur Unggulan
          </h2>
          <p class="text-base leading-7 tracking-[-0.01em] text-body sm:text-lg">
            Tinggalkan spreadsheet manual. Kolaborasi antar<br class="hidden sm:block">
            brand, agensi, dan talent manager berlangsung dalam alur kerja yang presisi.
          </p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-8 md:grid-cols-2">
          <article class="flex flex-col justify-between rounded-2xl bg-white p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <div>
              <div class="flex size-12 items-center justify-center rounded-xl bg-[#dbe1ff]">
                <img src="<?= base_url('assets/icons/brief-contract.svg') ?>" alt="" class="h-[23.33px] w-[18.67px]">
              </div>
              <h3 class="mt-4 font-display text-[22px] font-bold leading-[30px] tracking-[-0.01em] text-ink">
                Pembuatan Brief Terstruktur &amp; Kontrak Digital
              </h3>
              <p class="mt-2 text-base leading-[26px] tracking-[-0.005em] text-body">
                Buat campaign brief interaktif dengan template yang bisa disesuaikan. Klausul hak cipta materi iklan, masa eksklusivitas kategori, dan tanda tangan digital.
              </p>
            </div>
            <div class="mt-6 flex items-center justify-between border-t border-[rgba(195,198,215,0.3)] pt-4">
              <span class="flex items-center gap-1 text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-brand">
                <img src="<?= base_url('assets/icons/legal.svg') ?>" alt="" class="h-[13.33px] w-[10.67px]">
                Sesuai Standar Hukum
              </span>
              <span class="text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-[#565e74]">E-Signature Digital</span>
            </div>
          </article>

          <article class="flex flex-col justify-between rounded-2xl bg-white p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <div>
              <div class="flex size-12 items-center justify-center rounded-xl bg-[#dae2fd]">
                <img src="<?= base_url('assets/icons/draft-review.svg') ?>" alt="" class="h-[19.83px] w-[24.5px]">
              </div>
              <h3 class="mt-4 font-display text-[22px] font-bold leading-[30px] tracking-[-0.01em] text-ink">
                Review Draft
              </h3>
              <p class="mt-2 text-base leading-[26px] tracking-[-0.005em] text-body">
                Kreator mengunggah draft video langsung ke portal. Tim brand dapat memberikan feedback, menghindari revisi berulang tanpa arah.
              </p>
            </div>
            <div class="mt-6 flex items-center justify-between border-t border-[rgba(195,198,215,0.3)] pt-4">
              <span class="flex items-center gap-1 text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-green">
                <img src="<?= base_url('assets/icons/timestamp.svg') ?>" alt="" class="h-[13.33px] w-[9.33px]">
                Detik &amp; Frame Presisi
              </span>
              <span class="text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-[#565e74]">Bebas Miskomunikasi</span>
            </div>
          </article>

          <article class="flex flex-col justify-between rounded-2xl bg-white p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <div>
              <div class="flex size-12 items-center justify-center rounded-xl bg-[#d3e4fe]">
                <img src="<?= base_url('assets/icons/shipment.svg') ?>" alt="" class="size-[23.33px]">
              </div>
              <h3 class="mt-4 font-display text-[22px] font-bold leading-[30px] tracking-[-0.01em] text-ink">
                Pelacakan Pengiriman Sampel Produk
              </h3>
              <p class="mt-2 text-base leading-[26px] tracking-[-0.005em] text-body">
                Lacak status paket produk dari gudang hingga diterima di tangan influencer, lengkap dengan notifikasi otomatis untuk jadwal shooting.
              </p>
            </div>
            <div class="mt-6 flex items-center justify-between border-t border-[rgba(195,198,215,0.3)] pt-4">
              <span class="flex items-center gap-1 text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-brand">
                <img src="<?= base_url('assets/icons/resi.svg') ?>" alt="" class="h-3 w-[13.33px]">
                Auto-Sync Resi Kurir
              </span>
              <span class="text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-[#565e74]">J&amp;T, SiCepat &amp; JNE</span>
            </div>
          </article>

          <article class="flex flex-col justify-between rounded-2xl bg-white p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <div>
              <div class="flex size-12 items-center justify-center rounded-xl bg-[#85f8c4]">
                <img src="<?= base_url('assets/icons/payout.svg') ?>" alt="" class="h-[18.67px] w-[25.67px]">
              </div>
              <h3 class="mt-4 font-display text-[22px] font-bold leading-[30px] tracking-[-0.01em] text-ink">
                Pembayaran Otomatis &amp; Bukti Potong Pajak
              </h3>
              <p class="mt-2 text-base leading-[26px] tracking-[-0.005em] text-body">
                Otomatisasi kalkulasi honorarium, bagi hasil agensi, dan pemotongan PPh 21/23 secara taat pajak. Sistem merilis pembayaran instan ke rekening kreator saat bukti tayang diverifikasi valid.
              </p>
            </div>
            <div class="mt-6 flex items-center justify-between border-t border-[rgba(195,198,215,0.3)] pt-4">
              <span class="flex items-center gap-1 text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-green">
                <img src="<?= base_url('assets/icons/tax.svg') ?>" alt="" class="size-[13.33px]">
                PPh 21/23 Auto Bukpot
              </span>
              <span class="text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-[#565e74]">Multi-Bank Escrow</span>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ===== PLUGIN ANALITIK MENDALAM ===== -->
    <section id="plugin" class="scroll-mt-24 bg-white py-20">
      <div class="mx-auto flex max-w-[1240px] flex-col items-center gap-16 px-5 sm:px-8 lg:px-16">
        <div class="flex max-w-[768px] flex-col items-center gap-3 text-center">
          <span class="rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-green">
            Plugin Analitik Mendalam
          </span>
          <h2 class="pt-1 font-display text-3xl font-bold leading-[44px] tracking-[-0.02em] text-ink sm:text-[36px]">
            Riset KOL Berbasis Data, Bukan Sekadar<br class="hidden sm:block"> Feeling
          </h2>
          <p class="text-base leading-7 tracking-[-0.01em] text-body sm:text-lg">
            Ekstrak metrik valid langsung dari data postingan terbaru tanpa manipulasi angka<br class="hidden sm:block">
            screenshot atau klaim sepihak.
          </p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <article class="flex flex-col rounded-2xl bg-white p-6 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] ring-1 ring-slate-900/5">
            <div class="flex size-10 items-center justify-center rounded-lg bg-[#dbe1ff]">
              <img src="<?= base_url('assets/icons/analytics-views.svg') ?>" alt="" class="h-[21px] w-5">
            </div>
            <h4 class="mt-2.5 font-display text-lg font-bold leading-[26px] tracking-[-0.005em] text-ink">
              Rata-Rata Views 30 Postingan
            </h4>
            <p class="mt-1.5 text-sm leading-[22.75px] text-body">
              Algoritma scraping membaca 30 konten terakhir secara kontinu untuk memfilter konten viral anomali dan mendapatkan estimasi views organik sesungguhnya.
            </p>
          </article>

          <article class="flex flex-col rounded-2xl bg-white p-6 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] ring-1 ring-slate-900/5">
            <div class="flex size-10 items-center justify-center rounded-lg bg-[#85f8c4]">
              <img src="<?= base_url('assets/icons/card-generator.svg') ?>" alt="" class="size-5">
            </div>
            <h4 class="mt-2.5 font-display text-lg font-bold leading-[26px] tracking-[-0.005em] text-ink">
              Generator Performance Card dengan 1 Klik
            </h4>
            <p class="mt-1.5 text-sm leading-[22.75px] text-body">
              Bisa ekspor Performance Card anda dalam format PDF.
            </p>
          </article>

          <article class="flex flex-col rounded-2xl bg-white p-6 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] ring-1 ring-slate-900/5">
            <div class="flex size-10 items-center justify-center rounded-lg bg-[#d3e4fe]">
              <img src="<?= base_url('assets/icons/comment-ai.svg') ?>" alt="" class="size-5">
            </div>
            <h4 class="mt-2.5 font-display text-lg font-bold leading-[26px] tracking-[-0.005em] text-ink">
              AI Analisis Komentar Audiens
            </h4>
            <p class="mt-1.5 text-sm leading-[22.75px] text-body">
              Filter otomatis komentar bot/spam, deteksi kecocokan brand, dan ukur sentimen riil audiens terhadap produk sponsor sebelumnya.
            </p>
          </article>

          <article class="flex flex-col rounded-2xl bg-white p-6 drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] ring-1 ring-slate-900/5">
            <div class="flex size-10 items-center justify-center rounded-lg bg-[#dae2fd]">
              <img src="<?= base_url('assets/icons/rate-card.svg') ?>" alt="" class="size-[18px]">
            </div>
            <h4 class="mt-2.5 font-display text-lg font-bold leading-[26px] tracking-[-0.005em] text-ink">
              Tolok Ukur Rate Card &amp; CPV
            </h4>
            <p class="mt-1.5 text-sm leading-[22.75px] text-body">
              Ketahui secara akurat apakah rate card yang diajukan kreator tergolong wajar, terjangkau, atau terlalu mahal jika dibandingkan rata-rata industri.
            </p>
          </article>
        </div>
      </div>
    </section>

    <!-- ===== CARA KERJA ===== -->
    <section id="how-it-works" class="scroll-mt-24 bg-mist py-20">
      <div class="mx-auto flex max-w-[1240px] flex-col items-center gap-16 px-5 sm:px-8 lg:px-16">
        <div class="flex max-w-[768px] flex-col items-center gap-3 text-center">
          <span class="rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand">
            Cara Kerja
          </span>
          <h2 class="pt-1 font-display text-3xl font-bold leading-[44px] tracking-[-0.02em] text-ink sm:text-[36px]">
            Alur Campaign Terintegrasi dalam 4 Langkah
          </h2>
          <p class="text-base leading-7 tracking-[-0.01em] text-body sm:text-lg">
            Dari seleksi profil hingga laporan akhir, semua tersinkronisasi tanpa dependensi<br class="hidden sm:block">
            spreadsheet terpisah.
          </p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <article class="flex flex-col justify-between rounded-2xl bg-white p-6 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <div>
              <div class="flex items-center justify-between">
                <span class="font-display text-5xl font-extrabold leading-[56px] tracking-[-0.025em] text-[rgba(0,74,198,0.2)]">01</span>
                <span class="flex size-8 items-center justify-center rounded-full bg-[#dbe1ff]">
                  <img src="<?= base_url('assets/icons/step-discover.svg') ?>" alt="" class="size-[13.5px]">
                </span>
              </div>
              <h3 class="mt-2 font-display text-lg font-bold leading-[26px] tracking-[-0.005em] text-ink">
                Pencarian &amp; Validasi
              </h3>
              <p class="mt-1.5 text-sm leading-[22.75px] text-body">
                Cari kreator relevan, buat Performance Card instan, dan benchmark ER serta views historis secara akurat.
              </p>
            </div>
            <div class="mt-6 border-t border-[rgba(195,198,215,0.3)] pt-[19px]">
              <span class="text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-brand">Verifikasi AI Scraping</span>
            </div>
          </article>

          <article class="flex flex-col justify-between rounded-2xl bg-white p-6 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <div>
              <div class="flex items-center justify-between">
                <span class="font-display text-5xl font-extrabold leading-[56px] tracking-[-0.025em] text-[rgba(0,74,198,0.2)]">02</span>
                <span class="flex size-8 items-center justify-center rounded-full bg-[#dae2fd]">
                  <img src="<?= base_url('assets/icons/step-brief.svg') ?>" alt="" class="h-[15px] w-[13.5px]">
                </span>
              </div>
              <h3 class="mt-2 font-display text-lg font-bold leading-[26px] tracking-[-0.005em] text-ink">
                Briefing &amp; Kontrak
              </h3>
              <p class="mt-1.5 text-sm leading-[22.75px] text-body">
                Kirim brief campaign terstandardisasi dan kunci kesepakatan secara sah melalui kontrak digital legal.
              </p>
            </div>
            <div class="mt-6 border-t border-[rgba(195,198,215,0.3)] pt-[19px]">
              <span class="text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-[#565e74]">Perjanjian Legal 1 Klik</span>
            </div>
          </article>

          <article class="flex flex-col justify-between rounded-2xl bg-white p-6 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <div>
              <div class="flex items-center justify-between">
                <span class="font-display text-5xl font-extrabold leading-[56px] tracking-[-0.025em] text-[rgba(0,74,198,0.2)]">03</span>
                <span class="flex size-8 items-center justify-center rounded-full bg-[#d3e4fe]">
                  <img src="<?= base_url('assets/icons/step-review.svg') ?>" alt="" class="size-[15px]">
                </span>
              </div>
              <h3 class="mt-2 font-display text-lg font-bold leading-[26px] tracking-[-0.005em] text-ink">
                Review &amp; Lacak Sampel
              </h3>
              <p class="mt-1.5 text-sm leading-[22.75px] text-body">
                Pantau pengiriman sampel produk dengan nomor resi terintegrasi, dan beri catatan review draft video berbasis timestamp.
              </p>
            </div>
            <div class="mt-6 border-t border-[rgba(195,198,215,0.3)] pt-[19px]">
              <span class="text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-green">Kurir Real-Time + Pin Timestamp</span>
            </div>
          </article>

          <article class="flex flex-col justify-between rounded-2xl bg-white p-6 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <div>
              <div class="flex items-center justify-between">
                <span class="font-display text-5xl font-extrabold leading-[56px] tracking-[-0.025em] text-[rgba(0,98,67,0.3)]">04</span>
                <span class="flex size-8 items-center justify-center rounded-full bg-[#85f8c4]">
                  <img src="<?= base_url('assets/icons/step-payout.svg') ?>" alt="" class="h-[13.5px] w-[14.25px]">
                </span>
              </div>
              <h3 class="mt-2 font-display text-lg font-bold leading-[26px] tracking-[-0.005em] text-ink">
                Pembayaran &amp; Laporan
              </h3>
              <p class="mt-1.5 text-sm leading-[22.75px] text-body">
                Pembayaran aman dicairkan otomatis setelah deliverables tayang, disertai dashboard ROI terkonsolidasi &amp; bukti potong pajak.
              </p>
            </div>
            <div class="mt-6 border-t border-[rgba(195,198,215,0.3)] pt-[19px]">
              <span class="text-[11px] font-semibold leading-[14px] tracking-[0.44px] text-green">Pajak Otomatis &amp; Laporan ROI</span>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ===== ARTIKEL ===== -->
    <section id="artikel" class="scroll-mt-24 bg-white py-20">
      <div class="mx-auto flex max-w-[1240px] flex-col items-center gap-12 px-5 sm:px-8 lg:px-16">
        <div class="flex max-w-[768px] flex-col items-center gap-3 text-center">
          <span class="rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand">
            Artikel &amp; Insight
          </span>
          <h2 class="pt-1 font-display text-3xl font-bold leading-[44px] tracking-[-0.02em] text-ink sm:text-[36px]">
            Wawasan Terbaru Seputar KOL &amp; Campaign
          </h2>
          <p class="text-base leading-7 tracking-[-0.01em] text-body sm:text-lg">
            Panduan, riset, dan praktik terbaik untuk mengelola kampanye KOL yang lebih terukur.
          </p>
        </div>

        <?php if (! empty($latest)): ?>
          <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-3">
            <?php foreach ($latest as $item): ?>
              <?php $this->load->view('partials/article_card', array('item' => $item)); ?>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div class="mx-auto w-full max-w-[768px] rounded-2xl bg-white px-6 py-16 text-center shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
            <h3 class="font-display text-xl font-bold leading-7 tracking-[-0.01em] text-ink">Belum ada artikel</h3>
            <p class="mx-auto mt-2 max-w-[420px] text-sm leading-[22.75px] text-body">Artikel baru akan segera hadir. Silakan kembali lagi nanti.</p>
          </div>
        <?php endif; ?>

        <a href="<?= base_url('artikel') ?>" class="inline-flex h-11 w-fit items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition hover:border-brand hover:text-brand">
          Lihat Semua Artikel
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
      </div>
    </section>

    <!-- ===== CTA BANNER ===== -->
    <section id="demo" class="scroll-mt-24 bg-white px-5 py-16 sm:px-8 lg:px-[84px]">
      <div class="relative mx-auto max-w-[1280px] overflow-hidden rounded-2xl bg-navy p-8 shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)] sm:p-16">
        <div class="pointer-events-none absolute left-1/2 top-[-96px] h-[300px] w-[600px] max-w-full -translate-x-1/2 rounded-full bg-[rgba(0,74,198,0.25)] blur-[32px]"></div>

        <div class="relative mx-auto flex max-w-[768px] flex-col items-center text-center">
          <span class="rounded-full bg-white/10 px-3.5 py-1 text-[11px] font-semibold uppercase leading-[14px] tracking-[0.55px] text-[#dbe1ff]">
            Akses Enterprise Siap Pakai
          </span>

          <h2 class="mt-4 font-display text-3xl font-bold leading-[44px] tracking-[-0.02em] text-white sm:text-[36px]">
            Siap Mengorkestrasi Campaign KOL Anda<br class="hidden sm:block"> dengan Standar Enterprise?
          </h2>

          <p class="mt-4 max-w-[672px] text-base leading-7 tracking-[-0.01em] text-[#cbd5e1] sm:text-lg">
            Bergabunglah dengan kami di KOLAB.ID untuk kampanye yang lebih terukur, cepat, dan transparan.
          </p>

          <div class="mt-8 flex flex-col items-center gap-4 sm:flex-row">
            <a href="<?= base_url('login') ?>" class="inline-flex h-14 items-center justify-center gap-2 rounded-lg bg-accent px-8 font-display text-base font-bold leading-6 text-white shadow-[0px_10px_15px_-3px_rgba(37,99,235,0.3),0px_4px_6px_-4px_rgba(37,99,235,0.3)] hover:bg-blue-700">
              Jadwalkan Live Demo (30 Menit)
              <img src="<?= base_url('assets/icons/calendar.svg') ?>" alt="" class="h-[15px] w-[13.5px]">
            </a>
            <a href="<?= base_url('login') ?>" class="inline-flex h-14 items-center justify-center gap-2 rounded-lg border border-white/15 px-8 font-display text-base font-semibold leading-6 text-white shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] hover:bg-white/10">
              <img src="<?= base_url('assets/icons/headset.svg') ?>" alt="" class="size-[15px]">
              Hubungi Tim Enterprise
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== FAQ (GOT QUESTIONS?) ===== -->
    <section id="faq" class="scroll-mt-24 bg-mist py-20 sm:py-28">
      <div class="mx-auto max-w-[920px] px-5 sm:px-8">
        <h2 class="text-center font-display text-3xl font-extrabold tracking-tight text-ink sm:text-4xl md:text-5xl">
          Got Questions?
        </h2>

        <div class="mt-8 flex flex-col gap-3 sm:mt-12 sm:gap-3.5" id="faq-accordion">
          <!-- FAQ 1 -->
          <div class="faq-item group overflow-hidden rounded-xl bg-navy shadow-[0_2px_12px_-2px_rgba(0,0,0,0.2)] transition-all duration-200 hover:bg-[#283b54]">
            <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between px-5 py-3.5 text-left select-none sm:px-6 sm:py-4" aria-expanded="false" aria-controls="faq-ans-1">
              <span class="font-display text-sm font-semibold text-white sm:text-base">
                Apa itu KOLAB.ID?
              </span>
              <span class="faq-icon ml-3 flex h-5 w-5 flex-shrink-0 items-center justify-center text-white transition-transform duration-300 ease-out">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </span>
            </button>
            <div id="faq-ans-1" class="faq-content max-h-0 overflow-hidden opacity-0 transition-[max-height,opacity] duration-300 ease-in-out">
              <div class="border-t border-white/15 px-5 pt-2.5 pb-4 text-xs leading-relaxed text-white/90 sm:px-6 sm:text-sm sm:leading-6">
                KOLAB.ID adalah platform orkestrasi &amp; analitik influencer marketing terintegrasi untuk brand, agensi, dan content creator. Platform ini mengotomatisasi seluruh alur kerja kampanye: mulai dari kurasi talent berbasis analitik AI, penerbitan brief interaktif &amp; e-kontrak sah secara hukum, pelacakan sampel produk real-time, approval draft video berbasis timestamp, hingga otomatisasi kalkulasi pembayaran dan bukti potong pajak PPh 21/23.
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="faq-item group overflow-hidden rounded-xl bg-navy shadow-[0_2px_12px_-2px_rgba(0,0,0,0.2)] transition-all duration-200 hover:bg-[#283b54]">
            <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between px-5 py-3.5 text-left select-none sm:px-6 sm:py-4" aria-expanded="false" aria-controls="faq-ans-2">
              <span class="font-display text-sm font-semibold text-white sm:text-base">
                Untuk siapa platform KOLAB.ID ditujukan?
              </span>
              <span class="faq-icon ml-3 flex h-5 w-5 flex-shrink-0 items-center justify-center text-white transition-transform duration-300 ease-out">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </span>
            </button>
            <div id="faq-ans-2" class="faq-content max-h-0 overflow-hidden opacity-0 transition-[max-height,opacity] duration-300 ease-in-out">
              <div class="border-t border-white/15 px-5 pt-2.5 pb-4 text-xs leading-relaxed text-white/90 sm:px-6 sm:text-sm sm:leading-6">
                KOLAB.ID dirancang secara komprehensif untuk tiga ekosistem utama:
                <ul class="mt-2 list-disc space-y-1 pl-4 text-white/90">
                  <li><strong class="font-semibold text-white">Brand &amp; Perusahaan:</strong> Mengelola ratusan campaign KOL secara terpusat, memantau pengiriman barang sampel, dan menganalisis ROI secara akurat tanpa spreadsheet terpisah.</li>
                  <li><strong class="font-semibold text-white">Agensi &amp; Talent Management:</strong> Mengkoordinasikan banyak talent dan klien dalam satu ruang kerja kolaboratif dengan hak akses yang fleksibel.</li>
                  <li><strong class="font-semibold text-white">KOL &amp; Kreator Konten:</strong> Memperoleh brief kerja terstruktur, perlindungan kontrak kerja digital yang legal, serta kepastian pencairan honorarium tepat waktu.</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="faq-item group overflow-hidden rounded-xl bg-navy shadow-[0_2px_12px_-2px_rgba(0,0,0,0.2)] transition-all duration-200 hover:bg-[#283b54]">
            <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between px-5 py-3.5 text-left select-none sm:px-6 sm:py-4" aria-expanded="false" aria-controls="faq-ans-3">
              <span class="font-display text-sm font-semibold text-white sm:text-base">
                Bagaimana cara brand membuat dan mengelola campaign di KOLAB.ID?
              </span>
              <span class="faq-icon ml-3 flex h-5 w-5 flex-shrink-0 items-center justify-center text-white transition-transform duration-300 ease-out">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </span>
            </button>
            <div id="faq-ans-3" class="faq-content max-h-0 overflow-hidden opacity-0 transition-[max-height,opacity] duration-300 ease-in-out">
              <div class="border-t border-white/15 px-5 pt-2.5 pb-4 text-xs leading-relaxed text-white/90 sm:px-6 sm:text-sm sm:leading-6">
                Brand dapat memulai campaign dengan menentukan objektif kampanye, platform target (Instagram, TikTok, YouTube), kriteria kategori produk, tier KOL, serta deliverables konten yang dibutuhkan. Brand dapat mengundang KOL secara eksklusif atau membuka lowongan campaign publik, memonitor alur review draft konten, hingga menerima laporan performa secara terpusat.
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="faq-item group overflow-hidden rounded-xl bg-navy shadow-[0_2px_12px_-2px_rgba(0,0,0,0.2)] transition-all duration-200 hover:bg-[#283b54]">
            <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between px-5 py-3.5 text-left select-none sm:px-6 sm:py-4" aria-expanded="false" aria-controls="faq-ans-4">
              <span class="font-display text-sm font-semibold text-white sm:text-base">
                Bagaimana cara KOL/Influencer bergabung dalam sebuah campaign?
              </span>
              <span class="faq-icon ml-3 flex h-5 w-5 flex-shrink-0 items-center justify-center text-white transition-transform duration-300 ease-out">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </span>
            </button>
            <div id="faq-ans-4" class="faq-content max-h-0 overflow-hidden opacity-0 transition-[max-height,opacity] duration-300 ease-in-out">
              <div class="border-t border-white/15 px-5 pt-2.5 pb-4 text-xs leading-relaxed text-white/90 sm:px-6 sm:text-sm sm:leading-6">
                Kreator dapat membuat profil di portal KOLAB.ID, menghubungkan akun media sosial untuk diverifikasi oleh sistem, dan mengisi preferensi kategori serta rate card. Setelah terdaftar, kreator akan menerima undangan kerja sama langsung dari brand ternama atau dapat mendaftar langsung pada campaign terbuka yang sesuai dengan niche mereka.
              </div>
            </div>
          </div>

          <!-- FAQ 5 -->
          <div class="faq-item group overflow-hidden rounded-xl bg-navy shadow-[0_2px_12px_-2px_rgba(0,0,0,0.2)] transition-all duration-200 hover:bg-[#283b54]">
            <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between px-5 py-3.5 text-left select-none sm:px-6 sm:py-4" aria-expanded="false" aria-controls="faq-ans-5">
              <span class="font-display text-sm font-semibold text-white sm:text-base">
                Bagaimana sistem review draft konten dan revisi video bekerja?
              </span>
              <span class="faq-icon ml-3 flex h-5 w-5 flex-shrink-0 items-center justify-center text-white transition-transform duration-300 ease-out">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </span>
            </button>
            <div id="faq-ans-5" class="faq-content max-h-0 overflow-hidden opacity-0 transition-[max-height,opacity] duration-300 ease-in-out">
              <div class="border-t border-white/15 px-5 pt-2.5 pb-4 text-xs leading-relaxed text-white/90 sm:px-6 sm:text-sm sm:leading-6">
                KOL dapat mengunggah draft video langsung ke portal sebelum dipublikasikan. Tim brand dapat memutar video dan menyematkan catatan feedback pada detik dan frame tertentu (timestamp-pinned review). Ini menghindari revisi berulang tanpa kejelasan, memastikan kepatuhan terhadap brief, dan mempercepat persetujuan final.
              </div>
            </div>
          </div>

          <!-- FAQ 6 -->
          <div class="faq-item group overflow-hidden rounded-xl bg-navy shadow-[0_2px_12px_-2px_rgba(0,0,0,0.2)] transition-all duration-200 hover:bg-[#283b54]">
            <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between px-5 py-3.5 text-left select-none sm:px-6 sm:py-4" aria-expanded="false" aria-controls="faq-ans-6">
              <span class="font-display text-sm font-semibold text-white sm:text-base">
                Bagaimana proses pengiriman dan pelacakan sampel produk ke KOL?
              </span>
              <span class="faq-icon ml-3 flex h-5 w-5 flex-shrink-0 items-center justify-center text-white transition-transform duration-300 ease-out">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </span>
            </button>
            <div id="faq-ans-6" class="faq-content max-h-0 overflow-hidden opacity-0 transition-[max-height,opacity] duration-300 ease-in-out">
              <div class="border-t border-white/15 px-5 pt-2.5 pb-4 text-xs leading-relaxed text-white/90 sm:px-6 sm:text-sm sm:leading-6">
                Sistem terintegrasi langsung dengan kurir pengiriman terkemuka seperti J&amp;T, SiCepat, dan JNE. Tim brand cukup menginput nomor resi atau mencetak label pengiriman otomatis, dan status pengiriman produk sampel akan ter-update secara otomatis sampai paket diterima oleh kreator, lengkap dengan reminder jadwal produksi konten.
              </div>
            </div>
          </div>

          <!-- FAQ 7 -->
          <div class="faq-item group overflow-hidden rounded-xl bg-navy shadow-[0_2px_12px_-2px_rgba(0,0,0,0.2)] transition-all duration-200 hover:bg-[#283b54]">
            <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between px-5 py-3.5 text-left select-none sm:px-6 sm:py-4" aria-expanded="false" aria-controls="faq-ans-7">
              <span class="font-display text-sm font-semibold text-white sm:text-base">
                Apakah performa postingan dan analitik metrik dapat dipantau secara real-time?
              </span>
              <span class="faq-icon ml-3 flex h-5 w-5 flex-shrink-0 items-center justify-center text-white transition-transform duration-300 ease-out">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </span>
            </button>
            <div id="faq-ans-7" class="faq-content max-h-0 overflow-hidden opacity-0 transition-[max-height,opacity] duration-300 ease-in-out">
              <div class="border-t border-white/15 px-5 pt-2.5 pb-4 text-xs leading-relaxed text-white/90 sm:px-6 sm:text-sm sm:leading-6">
                Tentu saja. Dengan modul Plugin Analitik berbasis scraping dan kecerdasan buatan, Anda dapat memantau capaian views organik, rasio interaksi (engagement rate), sentimen riil komentar audiens, hingga benchmark CPV (Cost Per View). Anda juga dapat mengekspor Performance Card dan laporan akhir campaign ke dalam format PDF dengan satu klik.
              </div>
            </div>
          </div>

          <!-- FAQ 8 -->
          <div class="faq-item group overflow-hidden rounded-xl bg-navy shadow-[0_2px_12px_-2px_rgba(0,0,0,0.2)] transition-all duration-200 hover:bg-[#283b54]">
            <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between px-5 py-3.5 text-left select-none sm:px-6 sm:py-4" aria-expanded="false" aria-controls="faq-ans-8">
              <span class="font-display text-sm font-semibold text-white sm:text-base">
                Bagaimana sistem pembayaran honorarium dan pemotongan pajak dikelola?
              </span>
              <span class="faq-icon ml-3 flex h-5 w-5 flex-shrink-0 items-center justify-center text-white transition-transform duration-300 ease-out">
                <svg class="h-4 w-4 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </span>
            </button>
            <div id="faq-ans-8" class="faq-content max-h-0 overflow-hidden opacity-0 transition-[max-height,opacity] duration-300 ease-in-out">
              <div class="border-t border-white/15 px-5 pt-2.5 pb-4 text-xs leading-relaxed text-white/90 sm:px-6 sm:text-sm sm:leading-6">
                Pembayaran dikelola melalui rekening escrow multi-bank yang aman. Begitu link postingan diverifikasi telah tayang sesuai kesepakatan kontrak, dana akan dicairkan otomatis ke rekening kreator. Sistem juga secara otomatis mengkalkulasi potongan pajak resmi (PPh 21 untuk individu atau PPh 23 untuk agensi/badan hukum) dan menghasilkan bukti potong pajak sah untuk kemudahan pelaporan SPT tahunan.
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
