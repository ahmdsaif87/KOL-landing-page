<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terjadi Kesalahan — KOLAB.ID</title>
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="/dist/output.css">
</head>
<body class="flex min-h-screen flex-col items-center justify-center bg-mist px-5 font-sans text-body antialiased">
  <div class="w-full max-w-[640px] rounded-2xl bg-white px-6 py-12 text-center shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
    <h1 class="font-display text-2xl font-bold leading-8 tracking-[-0.01em] text-ink"><?= html_escape($heading) ?></h1>
    <p class="mx-auto mt-3 max-w-[460px] text-base leading-[26px] text-body"><?= html_escape($message) ?></p>
    <div class="mt-8">
      <a href="/" class="inline-flex h-11 items-center justify-center rounded-lg bg-accent px-5 text-sm font-semibold text-white hover:bg-blue-700">Kembali ke Beranda</a>
    </div>
  </div>
</body>
</html>
