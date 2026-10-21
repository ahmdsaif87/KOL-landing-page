<?php
/**
 * Kartu artikel. Variabel: $item (row artikel dari API).
 */
$href   = base_url('artikel/' . rawurlencode($item->slug));
$cover  = ! empty($item->cover_image_url) ? $item->cover_image_url : null;
$date   = ! empty($item->published_at_label) ? $item->published_at_label : '';
$author = ! empty($item->author) ? $item->author : 'Admin';
?>
<a href="<?= $href ?>" class="group flex flex-col overflow-hidden rounded-2xl bg-white shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)] transition duration-300 hover:-translate-y-1 hover:shadow-[0px_18px_30px_-12px_rgba(23,43,77,0.25)]">
  <div class="block aspect-[16/9] overflow-hidden bg-mist">
    <?php if ($cover): ?>
      <img src="<?= html_escape($cover) ?>" alt="<?= html_escape($item->title) ?>" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
    <?php else: ?>
      <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-[#dbe1ff] via-[#eff4ff] to-[#d3e4fe]">
        <img src="<?= base_url('assets/images/kolab-logo.png') ?>" alt="" class="h-10 opacity-80">
      </div>
    <?php endif; ?>
  </div>
  <div class="flex flex-1 flex-col p-6 sm:p-8">
    <span class="text-[11px] font-bold uppercase leading-[14px] tracking-[0.55px] text-brand"><?= html_escape(! empty($item->category) ? $item->category : 'Artikel') ?></span>
    <h3 class="mt-3 font-display text-[22px] font-bold leading-[30px] tracking-[-0.01em] text-ink transition duration-300 group-hover:text-brand">
      <?= html_escape($item->title) ?>
    </h3>
    <p class="mt-2 line-clamp-3 text-base leading-[26px] tracking-[-0.005em] text-body"><?= html_escape((string) $item->excerpt) ?></p>
    <div class="mt-auto pt-6">
      <div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-2 border-t border-[rgba(195,198,215,0.3)] pt-4 text-[11px] font-semibold uppercase leading-[14px] tracking-[0.44px]">
        <span class="text-brand"><?= html_escape($author) ?></span>
        <span class="text-[#565e74]"><?= html_escape($date) ?></span>
      </div>
    </div>
  </div>
</a>
