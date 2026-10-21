<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$offline_title   = isset($offline_title) ? $offline_title : 'Layanan Sedang Mengalami Kendala — KOLAB.ID';
$offline_message = isset($offline_message) ? $offline_message : 'Artikel sedang tidak dapat dimuat. Silakan coba beberapa saat lagi.';
?><!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= html_escape($offline_title) ?></title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="64x64" href="<?= base_url('assets/images/favicon.png') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('dist/output.css') ?>">
</head>
<body class="flex min-h-screen flex-col items-center justify-center bg-mist px-5 font-sans text-body antialiased">
  <a href="<?= base_url('/') ?>" class="flex items-center">
    <img src="<?= base_url('assets/images/kolab-logo.png') ?>" alt="KOLAB.ID" class="h-10 w-[133.33px]" width="133" height="40">
  </a>

  <div class="mt-10 w-full max-w-[640px] rounded-2xl bg-white px-6 py-16 text-center shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
    <div class="mx-auto flex size-16 items-center justify-center rounded-2xl bg-[#fee2e2] text-[#ef4444]">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
    </div>
    <span class="mt-4 inline-block font-display text-4xl font-extrabold leading-none tracking-[-0.03em] text-[#ef4444]">503</span>
    <h1 class="mt-4 font-display text-2xl font-bold leading-8 tracking-[-0.01em] text-ink">Layanan Sementara Tidak Tersedia</h1>
    <p class="mx-auto mt-3 max-w-[460px] text-base leading-[26px] text-body">
      <?= html_escape($offline_message) ?>
    </p>
    <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
      <a href="javascript:location.reload()" class="inline-flex h-11 items-center justify-center rounded-lg bg-accent px-5 text-sm font-semibold text-white shadow-[0px_10px_15px_-3px_rgba(37,99,235,0.2),0px_4px_6px_-4px_rgba(37,99,235,0.2)] hover:bg-blue-700">Muat Ulang Halaman</a>
      <a href="<?= base_url('/') ?>" class="inline-flex h-11 items-center justify-center rounded-lg border border-slate-200 bg-white px-5 text-sm font-semibold text-ink shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] transition hover:border-brand hover:text-brand">Kembali ke Beranda</a>
    </div>
  </div>
</body>
</html>
