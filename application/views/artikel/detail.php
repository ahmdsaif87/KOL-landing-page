    <!-- ===== ARTIKEL DETAIL ===== -->
    <section class="bg-white py-16 sm:py-20">
      <div class="mx-auto max-w-[1240px] px-5 sm:px-8 lg:px-16">
        <div class="mx-auto max-w-3xl">
          <a href="<?= base_url('artikel') ?>" class="inline-flex h-11 items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition hover:border-brand hover:text-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
            Semua Artikel
          </a>
        </div>

        <article class="mt-8">
          <div class="mx-auto max-w-3xl">
            <div class="flex flex-wrap items-center gap-2">
              <?php if (! empty($artikel->category)): ?>
                <?php foreach (array_filter(array_map('trim', explode(',', $artikel->category))) as $cat): ?>
                  <a href="<?= base_url('artikel?category=' . rawurlencode($cat)) ?>"
                     class="rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand hover:bg-[#dbe1ff]"><?= html_escape($cat) ?></a>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>

            <h1 class="mt-5 font-display text-3xl font-extrabold leading-[1.2] tracking-[-0.03em] text-ink sm:text-[44px] sm:leading-[1.15]"><?= html_escape($artikel->title) ?></h1>

            <div class="mt-6 flex flex-wrap items-center gap-x-3 gap-y-2 border-y border-[rgba(195,198,215,0.3)] py-4 text-sm text-[#737686]">
              <span class="font-semibold text-body"><?= html_escape(! empty($artikel->author) ? $artikel->author : 'Admin') ?></span>
              <span aria-hidden="true">&middot;</span>
              <time datetime="<?= html_escape(! empty($artikel->published_at) ? $artikel->published_at : '') ?>"><?= html_escape($date_label) ?></time>
            </div>

            <?php if ($cover): ?>
              <div class="mt-8 overflow-hidden rounded-2xl bg-mist shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
                <img src="<?= html_escape($cover) ?>" alt="<?= html_escape($artikel->title) ?>" class="h-auto w-full object-cover">
              </div>
            <?php endif; ?>

            <?php if (! empty($artikel->excerpt)): ?>
              <p class="mt-8 border-l-4 border-brand/30 pl-5 text-lg font-medium leading-8 text-body"><?= html_escape($artikel->excerpt) ?></p>
            <?php endif; ?>

            <div class="article-content mt-8">
              <?= $content ?>
            </div>

            <?php if (! empty($tags)): ?>
              <div class="mt-10 flex flex-wrap gap-2 border-t border-[rgba(195,198,215,0.3)] pt-6">
                <?php foreach ($tags as $tag): ?>
                  <span class="rounded-full bg-[#e5eeff] px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.44px] text-brand"><?= html_escape($tag) ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </article>

        <?php if (! empty($related)): ?>
          <div class="mt-16 border-t border-[rgba(195,198,215,0.3)] pt-12">
            <div class="flex flex-col items-center gap-3 text-center">
              <span class="rounded-full bg-[#e5eeff] px-3.5 py-1 text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand">Artikel Lainnya</span>
              <h2 class="pt-1 font-display text-3xl font-bold leading-[44px] tracking-[-0.02em] text-ink sm:text-[36px]">Lanjutkan Membaca</h2>
            </div>
            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
              <?php foreach ($related as $item): ?>
                <?php $this->load->view('partials/article_card', array('item' => $item)); ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
