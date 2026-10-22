<?php
$active          = isset($active) ? $active : '';
$meta_title      = isset($meta_title) ? $meta_title : 'KOLAB.ID';
$meta_description = isset($meta_description) ? $meta_description : '';
$og_type         = isset($og_type) ? $og_type : 'website';
$og_image        = isset($og_image) ? $og_image : base_url('assets/images/hero-mockup.png');
$canonical       = isset($canonical) ? $canonical : current_url();
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth scroll-pt-24">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= html_escape($meta_title) ?></title>
  <meta name="description" content="<?= html_escape($meta_description) ?>">
  <meta property="og:title" content="<?= html_escape($meta_title) ?>">
  <meta property="og:description" content="<?= html_escape($meta_description) ?>">
  <meta property="og:type" content="<?= html_escape($og_type) ?>">
  <meta property="og:image" content="<?= html_escape($og_image) ?>">
  <meta property="og:url" content="<?= html_escape($canonical) ?>">
  <link rel="canonical" href="<?= html_escape($canonical) ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="64x64" href="<?= base_url('assets/images/favicon.png') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
  <link rel="apple-touch-icon" href="<?= base_url('assets/images/favicon.png') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('dist/output.css') ?>">
<?php if (! empty($json_ld)): ?>
  <script type="application/ld+json"><?= $json_ld ?></script>
<?php endif; ?>
</head>

<body class="bg-white font-sans text-body antialiased">
  <a href="#konten" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:rounded-md focus:bg-accent focus:px-4 focus:py-2 focus:text-white">
    Lewati ke konten utama
  </a>

  <!-- ===== HEADER ===== -->
  <header id="nav" class="sticky top-0 z-50 w-full bg-white/90 shadow-[0px_1px_8px_0px_rgba(0,0,0,0.04)] backdrop-blur-[6px]">
    <div class="mx-auto flex h-20 max-w-[1240px] items-center justify-between px-5 sm:px-8 lg:px-16">
      <a href="<?= base_url('/') ?>" class="flex items-center">
        <img src="<?= base_url('assets/images/kolab-logo.png') ?>" alt="KOLAB.ID" class="h-8 w-[106.66px]" width="107" height="32">
      </a>

      <nav class="hidden items-center gap-6 md:flex" aria-label="Navigasi utama">
        <a href="<?= base_url('/#about') ?>" class="text-sm font-medium tracking-[0.14px] text-body hover:text-ink">Tentang Kami</a>
        <a href="<?= base_url('/#fitur') ?>" class="text-sm font-medium tracking-[0.14px] text-body hover:text-ink">Fitur</a>
        <a href="<?= base_url('/#plugin') ?>" class="text-sm font-medium tracking-[0.14px] text-body hover:text-ink">Plugin Analitik</a>
        <a href="<?= base_url('/#how-it-works') ?>" class="text-sm font-medium tracking-[0.14px] text-body hover:text-ink">Cara Kerja</a>
        <a href="<?= base_url('artikel') ?>" class="text-sm tracking-[0.14px] <?= $active === 'artikel' ? 'font-semibold text-brand' : 'font-medium text-body hover:text-ink' ?>"<?= $active === 'artikel' ? ' aria-current="page"' : '' ?>>Artikel</a>
        <a href="<?= base_url('/#faq') ?>" class="text-sm font-medium tracking-[0.14px] text-body hover:text-ink">FAQ</a>
        <a href="<?= base_url('/#demo') ?>" class="text-sm font-medium tracking-[0.14px] text-body hover:text-ink">Demo</a>
      </nav>

      <a href="<?= base_url('/#demo') ?>" class="hidden h-11 items-center justify-center rounded-lg bg-black px-6 text-sm font-medium tracking-[0.14px] text-white drop-shadow-[0px_1px_1.5px_rgba(15,23,42,0.04)] hover:bg-slate-800 md:flex">
        Hubungi Kami
      </a>

      <button id="nav-toggle" type="button" class="rounded-md p-2 text-body hover:bg-slate-100 md:hidden"
              aria-controls="nav-menu" aria-expanded="false" aria-label="Buka menu">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
          <path d="M4 7h16M4 12h16M4 17h16"/>
        </svg>
      </button>
    </div>

    <!-- Menu mobile -->
    <nav id="nav-menu" class="hidden border-t border-slate-900/5 bg-white px-5 pb-5 pt-3 md:hidden" aria-label="Navigasi mobile">
      <div class="flex flex-col gap-4 text-sm font-medium text-body">
        <a href="<?= base_url('/#about') ?>" class="hover:text-ink">Tentang Kami</a>
        <a href="<?= base_url('/#fitur') ?>" class="hover:text-ink">Fitur</a>
        <a href="<?= base_url('/#plugin') ?>" class="hover:text-ink">Plugin Analitik</a>
        <a href="<?= base_url('/#how-it-works') ?>" class="hover:text-ink">Cara Kerja</a>
        <a href="<?= base_url('artikel') ?>" class="<?= $active === 'artikel' ? 'font-semibold text-brand' : 'hover:text-ink' ?>"<?= $active === 'artikel' ? ' aria-current="page"' : '' ?>>Artikel</a>
        <a href="<?= base_url('/#faq') ?>" class="hover:text-ink">FAQ</a>
        <a href="<?= base_url('/#demo') ?>" class="hover:text-ink">Demo</a>
        <a href="<?= base_url('/#demo') ?>" class="inline-flex h-11 w-fit items-center justify-center rounded-lg bg-black px-6 text-white">Hubungi Kami</a>
      </div>
    </nav>
  </header>

  <main id="konten">
