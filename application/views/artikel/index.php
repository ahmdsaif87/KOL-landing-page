    <!-- ===== HERO ===== -->
    <section id="articles-hero" class="relative overflow-hidden bg-gradient-to-b from-[#004ac6]/5 via-transparent to-transparent pb-16 pt-12 sm:pb-20 sm:pt-16">
      <div class="mx-auto flex max-w-[1240px] flex-col items-center px-5 sm:px-8 lg:px-16">
        <nav class="flex items-center justify-center gap-2 text-xs font-medium text-[#737686]" aria-label="Breadcrumb">
          <a href="<?= base_url('/') ?>" class="transition hover:text-brand">Beranda</a>
          <span aria-hidden="true">/</span>
          <span class="text-ink">Artikel</span>
          <?php if ($active_category !== ''): ?>
            <span aria-hidden="true">/</span>
            <span class="text-ink"><?= html_escape($active_category) ?></span>
          <?php endif; ?>
        </nav>

        <div class="mt-6 flex max-w-[768px] flex-col items-center gap-3 text-center">
          <span class="inline-flex items-center gap-1 rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand">
            <img src="<?= base_url('assets/icons/badge-bolt.svg') ?>" alt="" class="h-[13.33px] w-[10.67px]">
            Artikel &amp; Insight
          </span>
          <h1 class="pt-1 font-display text-[36px] font-extrabold leading-[44px] tracking-[-0.045em] text-ink sm:text-[48px] sm:leading-[56px] md:text-[56px] md:leading-[64px] md:tracking-[-0.03em]">
            <?= $active_category !== '' ? html_escape($active_category) : 'Ide, Riset, dan' ?><br class="hidden sm:block">
            <?= $active_category !== '' ? 'Insight untuk Campaign Anda' : 'Praktik Terbaik KOL' ?>
          </h1>
          <p class="max-w-[640px] text-base leading-7 tracking-[-0.01em] text-body sm:text-lg">
            Pelajari cara membangun kampanye influencer yang lebih terukur, transparan, dan berdampak.
          </p>
        </div>
      </div>
    </section>

    <!-- ===== ARTIKEL CONTENT ===== -->
    <section id="articles-content" class="bg-mist py-20">
      <div class="mx-auto max-w-[1240px] px-5 sm:px-8 lg:px-16">
        <div class="flex flex-col items-center gap-4">
          <span class="text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-[#737686]">Jelajahi Topik</span>

          <!-- Form Pencarian -->
          <form id="article-search-form" action="<?= base_url('artikel') ?>" method="get" class="relative w-full max-w-[460px]">
            <?php if ($active_category !== ''): ?>
              <input type="hidden" name="category" value="<?= html_escape($active_category) ?>">
            <?php endif; ?>
            <div class="relative flex items-center">
              <input type="text" id="article-search-input" name="q" value="<?= html_escape(! empty($search) ? $search : '') ?>"
                     placeholder="Cari artikel berdasarkan judul atau kategori..."
                     autocomplete="off"
                     class="h-12 w-full rounded-full border border-slate-200 bg-white pl-5 pr-11 text-sm text-ink placeholder:text-[#94a3b8] shadow-[0px_2px_4px_0px_rgba(0,0,0,0.04)] transition focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
              <button type="button" id="article-search-clear"
                      class="absolute inset-y-0 right-0 my-auto mr-3 flex h-7 w-7 items-center justify-center rounded-full text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 <?= empty($search) ? 'hidden' : '' ?>"
                      title="Hapus pencarian" aria-label="Hapus pencarian">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <line x1="18" y1="6" x2="6" y2="18"/>
                  <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
              </button>
            </div>
          </form>

          <div id="article-categories" class="flex flex-wrap justify-center gap-2 pt-1">
            <?php
              $all_url = ! empty($search) ? base_url('artikel?q=' . rawurlencode($search)) : base_url('artikel');
            ?>
            <a href="<?= $all_url ?>"
               class="<?= $active_category === '' ? 'rounded-full bg-brand px-4 py-2 text-xs font-semibold text-white shadow-[0px_10px_15px_-3px_rgba(37,99,235,0.2),0px_4px_6px_-4px_rgba(37,99,235,0.2)]' : 'rounded-full bg-white px-4 py-2 text-xs font-semibold text-body shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] ring-1 ring-slate-200 transition hover:text-brand hover:ring-brand/30' ?>"
               <?= $active_category === '' ? 'aria-current="page"' : '' ?>>Semua</a>
            <?php foreach ($categories as $category): ?>
              <?php
                $cat_url = base_url('artikel?category=' . rawurlencode($category) . (! empty($search) ? '&q=' . rawurlencode($search) : ''));
              ?>
              <a href="<?= $cat_url ?>"
                 class="<?= $active_category === $category ? 'rounded-full bg-brand px-4 py-2 text-xs font-semibold text-white shadow-[0px_10px_15px_-3px_rgba(37,99,235,0.2),0px_4px_6px_-4px_rgba(37,99,235,0.2)]' : 'rounded-full bg-white px-4 py-2 text-xs font-semibold text-body shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] ring-1 ring-slate-200 transition hover:text-brand hover:ring-brand/30' ?>"
                 <?= $active_category === $category ? 'aria-current="page"' : '' ?>><?= html_escape($category) ?></a>
            <?php endforeach; ?>
          </div>
        </div>

        <?php if (! empty($artikel)): ?>
          <div id="articles-list" class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($artikel as $item): ?>
              <?php $this->load->view('partials/article_card', array('item' => $item)); ?>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div id="articles-empty" class="mt-10">
            <div class="col-span-full mx-auto w-full max-w-[768px] rounded-2xl bg-white px-6 py-16 text-center shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
              <div class="mx-auto flex size-14 items-center justify-center rounded-2xl bg-[#dbe1ff] text-brand">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5V5a2 2 0 0 1 2-2h13v18H6a2 2 0 0 1-2-2Z"/><path d="M8 7h7M8 11h7M8 15h4"/></svg>
              </div>
              <h3 class="mt-5 font-display text-xl font-bold leading-7 tracking-[-0.01em] text-ink">Belum ada artikel</h3>
              <p class="mx-auto mt-2 max-w-[420px] text-sm leading-[22.75px] text-body">
                <?= ! empty($search)
                    ? 'Tidak ditemukan artikel yang sesuai dengan pencarian "' . html_escape($search) . '". Coba cari dengan kata kunci lain.'
                    : ($active_category !== '' ? 'Belum ada artikel pada kategori ini. Coba pilih topik lain.' : 'Artikel baru akan segera hadir. Silakan kembali lagi nanti.') ?>
              </p>
              <?php if (! empty($search) || $active_category !== ''): ?>
                <a href="<?= base_url('artikel') ?>" class="mt-5 inline-flex h-10 items-center justify-center rounded-lg bg-accent px-5 text-xs font-semibold text-white shadow transition hover:bg-blue-700">Lihat Semua Artikel</a>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($total_pages > 1): ?>
          <?php
            $query_params = array();
            if ($active_category !== '') {
                $query_params['category'] = $active_category;
            }
            if (! empty($search)) {
                $query_params['q'] = $search;
            }
            $query_params['page'] = '';
            $query_base = '?' . http_build_query($query_params);
            $prev_url   = base_url('artikel' . $query_base . max(1, $page - 1));
            $next_url   = base_url('artikel' . $query_base . min($total_pages, $page + 1));
          ?>
          <div id="articles-pagination" class="mt-12 flex items-center justify-center gap-4">
            <?php if ($page > 1): ?>
              <a href="<?= $prev_url ?>" rel="prev" class="inline-flex h-11 items-center justify-center rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition hover:border-brand hover:text-brand">Sebelumnya</a>
            <?php else: ?>
              <span aria-disabled="true" class="pointer-events-none inline-flex h-11 items-center justify-center rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink opacity-40 shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)]">Sebelumnya</span>
            <?php endif; ?>

            <span class="px-2 text-sm text-[#737686]">Halaman <strong class="font-semibold text-ink"><?= (int) $page ?></strong> dari <?= (int) $total_pages ?></span>

            <?php if ($page < $total_pages): ?>
              <a href="<?= $next_url ?>" rel="next" class="inline-flex h-11 items-center justify-center rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition hover:border-brand hover:text-brand">Berikutnya</a>
            <?php else: ?>
              <span aria-disabled="true" class="pointer-events-none inline-flex h-11 items-center justify-center rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink opacity-40 shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)]">Berikutnya</span>
            <?php endif; ?>
          </div>
        <?php endif; ?>
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

    <script>
      (function() {
        var searchInput = document.getElementById('article-search-input');
        var clearBtn = document.getElementById('article-search-clear');
        var hadInitialValue = <?= !empty($search) ? 'true' : 'false' ?>;

        if (!searchInput || !clearBtn) return;

        function toggleClearBtn() {
          if (searchInput.value.trim().length > 0) {
            clearBtn.classList.remove('hidden');
          } else {
            clearBtn.classList.add('hidden');
          }
        }

        searchInput.addEventListener('input', toggleClearBtn);
        searchInput.addEventListener('change', toggleClearBtn);

        clearBtn.addEventListener('click', function(e) {
          e.preventDefault();
          searchInput.value = '';
          toggleClearBtn();

          if (hadInitialValue) {
            var category = "<?= html_escape($active_category) ?>";
            var redirectUrl = "<?= base_url('artikel') ?>" + (category ? "?category=" + encodeURIComponent(category) : "");
            window.location.href = redirectUrl;
          } else {
            searchInput.focus();
          }
        });
      })();
    </script>
