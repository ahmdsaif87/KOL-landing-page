  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="border-t border-[rgba(226,232,240,0.6)] bg-white pb-16 pt-24">
    <div class="mx-auto max-w-[1240px] px-5 sm:px-8 lg:px-16">
      <div class="grid grid-cols-1 gap-10 pb-16 sm:grid-cols-2 lg:grid-cols-5">
        <!-- Brand -->
        <div class="flex flex-col gap-4 sm:col-span-2">
          <div class="flex items-center gap-2">
            <img src="<?= base_url('assets/images/kolab-logo.png') ?>" alt="KOLAB.ID" class="h-10 w-[133.33px]" width="133" height="40">
          </div>
          <p class="max-w-[384px] text-sm leading-5 text-body">
            Sistem Orkestrasi &amp; Analitik Influencer Marketing Enterprise yang ada di Indonesia. Mentransformasi kampanye KOL berbasis intuisi menjadi keputusan berorientasi ROI presisi tinggi.
          </p>
        </div>

        <!-- Kolom Produk & Platform -->
        <div class="flex flex-col gap-2">
          <h3 class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-ink">Produk &amp; Platform</h3>
          <nav class="flex flex-col gap-1" aria-label="Produk dan platform">
            <a href="<?= base_url('/#fitur') ?>" class="text-sm leading-5 text-body hover:text-ink">Mesin Pencari KOL</a>
            <a href="<?= base_url('/#fitur') ?>" class="text-sm leading-5 text-body hover:text-ink">AI Autentisitas Audiens</a>
            <a href="<?= base_url('/#fitur') ?>" class="text-sm leading-5 text-body hover:text-ink">Pelacak Live Campaign</a>
            <a href="<?= base_url('/#fitur') ?>" class="text-sm leading-5 text-body hover:text-ink">Pembayaran Otomatis</a>
            <a href="<?= base_url('/#plugin') ?>" class="text-sm leading-5 text-body hover:text-ink">API &amp; Integrasi</a>
          </nav>
        </div>

        <!-- Kolom Solusi Industri -->
        <div class="flex flex-col gap-2">
          <h3 class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-ink">Solusi Industri</h3>
          <nav class="flex flex-col gap-1" aria-label="Solusi industri">
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">FMCG &amp; Produk Konsumen</a>
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Kecantikan &amp; Perawatan Diri</a>
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Fintech &amp; Perbankan</a>
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Agensi &amp; Jaringan Kreator</a>
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Kustomisasi Enterprise</a>
          </nav>
        </div>

        <!-- Kolom Perusahaan -->
        <div class="flex flex-col gap-2">
          <h3 class="text-xs font-semibold uppercase leading-4 tracking-[0.05em] text-ink">Perusahaan</h3>
          <nav class="flex flex-col gap-1" aria-label="Perusahaan">
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Kisah Sukses Klien</a>
            <a href="<?= base_url('artikel') ?>" class="text-sm leading-5 text-body hover:text-ink">Artikel &amp; Insight</a>
            <a href="<?= base_url('/#faq') ?>" class="text-sm leading-5 text-body hover:text-ink">FAQ</a>
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Tolok Ukur Kreator Indonesia</a>
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Konsultasi Strategi</a>
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Portal Mitra Agensi</a>
            <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-body hover:text-ink">Kebijakan Privasi</a>
          </nav>
        </div>
      </div>

      <!-- Bottom bar -->
      <div class="flex flex-col items-start justify-between gap-4 border-t border-[rgba(226,232,240,0.6)] pt-6 sm:flex-row sm:items-center">
        <p class="text-sm leading-5 text-[#737686]">© <span id="year"><?= date('Y') ?></span> PT Kolaborasi Kreasi Nusantara (KOLAB.ID). Hak Cipta Dilindungi Undang-Undang.</p>
        <nav class="flex flex-wrap gap-6" aria-label="Tautan legal">
          <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-[#737686] hover:text-ink">Syarat &amp; Ketentuan</a>
          <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-[#737686] hover:text-ink">Pusat Privasi Data</a>
          <a href="<?= base_url('/#demo') ?>" class="text-sm leading-5 text-[#737686] hover:text-ink">Status Sistem</a>
        </nav>
      </div>
    </div>
  </footer>

  <script src="<?= base_url('assets/js/main.js') ?>" defer></script>
</body>
</html>
