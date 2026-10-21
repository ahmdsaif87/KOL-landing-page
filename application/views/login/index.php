    <!-- ===== PORTAL LOGIN ===== -->
    <section class="relative overflow-hidden bg-gradient-to-b from-[#004ac6]/5 via-transparent to-transparent py-16 sm:py-24">
      <div class="mx-auto flex max-w-[1240px] flex-col items-center px-5 sm:px-8 lg:px-16">
        <nav class="flex items-center justify-center gap-2 text-xs font-medium text-[#737686]" aria-label="Breadcrumb">
          <a href="<?= base_url('/') ?>" class="transition hover:text-brand">Beranda</a>
          <span aria-hidden="true">/</span>
          <span class="text-ink">Masuk</span>
        </nav>

        <div class="mt-6 flex max-w-[768px] flex-col items-center gap-3 text-center">
          <span class="inline-flex items-center gap-1 rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand">
            <img src="<?= base_url('assets/icons/badge-bolt.svg') ?>" alt="" class="h-[13.33px] w-[10.67px]">
            Portal KOLAB.ID
          </span>
          <h1 class="pt-1 font-display text-[36px] font-extrabold leading-[44px] tracking-[-0.045em] text-ink sm:text-[48px] sm:leading-[56px]">
            Pilih Portal Anda
          </h1>
          <p class="max-w-[560px] text-base leading-7 tracking-[-0.01em] text-body sm:text-lg">
            Satu akun untuk mengelola campaign dan menganalisis performa KOL. Pilih portal yang ingin Anda buka.
          </p>
        </div>

        <div class="mt-12 grid w-full max-w-[900px] grid-cols-1 gap-6 md:grid-cols-2">
          <a href="<?= html_escape($this->config->item('campaign_url')) ?>"
             class="group flex flex-col rounded-2xl bg-white p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)] ring-1 ring-slate-900/5 transition duration-300 hover:-translate-y-1 hover:shadow-[0px_18px_30px_-12px_rgba(23,43,77,0.25)]">
            <div class="flex size-12 items-center justify-center rounded-xl bg-[#dbe1ff]">
              <img src="<?= base_url('assets/icons/brief-contract.svg') ?>" alt="" class="h-[23.33px] w-[18.67px]">
            </div>
            <h2 class="mt-4 font-display text-[22px] font-bold leading-[30px] tracking-[-0.01em] text-ink">Campaign Management</h2>
            <p class="mt-2 text-base leading-[26px] tracking-[-0.005em] text-body">
              Brief, kontrak digital, review draft, pengiriman sampel, hingga pembayaran kreator dalam satu alur.
            </p>
            <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand">
              Masuk ke Campaign
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="transition group-hover:translate-x-1"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </span>
          </a>

          <a href="<?= html_escape($this->config->item('datahub_url')) ?>"
             class="group flex flex-col rounded-2xl bg-white p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)] ring-1 ring-slate-900/5 transition duration-300 hover:-translate-y-1 hover:shadow-[0px_18px_30px_-12px_rgba(23,43,77,0.25)]">
            <div class="flex size-12 items-center justify-center rounded-xl bg-[#85f8c4]">
              <img src="<?= base_url('assets/icons/analytics-views.svg') ?>" alt="" class="h-[21px] w-5">
            </div>
            <h2 class="mt-4 font-display text-[22px] font-bold leading-[30px] tracking-[-0.01em] text-ink">KOL Datahub</h2>
            <p class="mt-2 text-base leading-[26px] tracking-[-0.005em] text-body">
              Riset kreator, benchmark rate card, dan analisis performa berbasis data postingan terbaru.
            </p>
            <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand">
              Masuk ke Datahub
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="transition group-hover:translate-x-1"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </span>
          </a>
        </div>

        <p class="mt-8 text-center text-sm text-[#737686]">
          Belum punya akun?
          <a href="<?= html_escape($this->config->item('contact_url')) ?>" class="font-semibold text-brand hover:text-accent">Hubungi tim kami</a>
        </p>
      </div>
    </section>
