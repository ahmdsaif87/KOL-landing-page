# KOLAB.ID — Landing Page (CodeIgniter 3)

Landing page + blog KOLAB.ID. Server-side rendered (SSR) dengan CodeIgniter 3, mengonsumsi
data artikel secara terpusat melalui REST API Campaign (`/articles/feed`)
(**read-only** — landing tidak memiliki akses langsung ke database).

## Stack

| Bagian | Teknologi |
| --- | --- |
| Backend | CodeIgniter 3.1.8, PHP 7.2+ |
| Data Source | Campaign REST API (`LANDING_API_BASE`) |
| CSS | Tailwind CSS v4 (build lokal, hasil di `dist/output.css`) |
| JS | `assets/js/main.js` (navigasi responsif mobile) |
| Web server | Apache / LiteSpeed (butuh `mod_rewrite`) |

Tidak ada Node/Python di server produksi. Tailwind hanya dipakai saat build aset statis.

## Struktur

```
landing/
├── index.php                 # front controller CI3
├── .htaccess                 # rewrite + proteksi folder
├── application/
│   ├── config/               # config, api, routes, autoload
│   ├── controllers/          # Home, Artikel, Login
│   ├── core/                 # MY_Controller (reusable offline 503 handler)
│   ├── libraries/            # Artikel_api (cURL client API)
│   ├── views/
│   │   ├── layout/           # header.php, footer.php
│   │   ├── home/index.php
│   │   ├── artikel/          # index.php (list), detail.php
│   │   ├── login/index.php
│   │   ├── partials/article_card.php
│   │   └── errors/           # offline.php (503), html/
│   ├── cache/                # output cache (harus writable)
│   └── logs/                 # log CI (harus writable)
├── assets/                   # gambar, ikon, main.js
├── dist/output.css           # hasil build Tailwind
├── src/input.css             # sumber Tailwind
├── system/                   # framework CI3
├── dev-router.php            # hanya untuk php -S (dev)
├── robots.txt
└── package.json
```

## Route

| URL | Controller | Keterangan |
| --- | --- | --- |
| `/` | `Home::index` | 3 artikel terbaru |
| `/artikel` | `Artikel::index` | list + filter kategori + pagination |
| `/artikel?category=Riset&page=2` | `Artikel::index` | list terfilter |
| `/artikel/{slug}` | `Artikel::detail` | detail artikel + related + counter views |
| `/login` | `Login::index` | pilihan portal aplikasi |
| `/sitemap.xml` | `Home::sitemap` | sitemap XML dinamis |

## Setup Lokal

1. **Pastikan API Campaign berjalan**

   Secara default, feed artikel diambil dari `http://localhost:8000` atau sub domain nanti setelah di hosting. Pastikan service Campaign berjalan pada port tersebut:
   - Endpoint listing: `GET http://localhost:8000/articles/feed`
   - Endpoint detail: `GET http://localhost:8000/articles/feed/{slug}`

2. **Konfigurasi environment** (opsional; default menyesuaikan localhost)

   ```bash
   export LANDING_API_BASE=http://localhost:8000
   export LANDING_BASE_URL=http://localhost:8087/
   export LANDING_CDN_URL=https://cdn.domain.com
   export LANDING_CAMPAIGN_URL=https://app.domain.com
   export LANDING_DATAHUB_URL=https://datahub.domain.com
   ```

   `base_url` otomatis mengikuti `HTTP_HOST` bila `LANDING_BASE_URL` kosong.

3. **Jalankan development server**

   ```bash
   php -S 127.0.0.1:8087 dev-router.php
   ```

   `dev-router.php` hanya untuk server bawaan PHP. Produksi memakai Apache/LiteSpeed + `.htaccess`.

4. **Build CSS** (hanya jika mengubah tampilan/class Tailwind)

   ```bash
   npm install
   npm run build
   ```

## Deploy ke cPanel / Hosting

Aplikasi ini siap di-upload langsung ke `public_html/` (atau document root subdomain).

1. Upload seluruh isi folder `landing/` ke docroot. Folder `node_modules/` dan `src/` tidak perlu di-upload.
2. Set document root domain ke folder tersebut (bukan ke `application/`).
3. Pastikan `.htaccess` ikut ter-upload.
4. Permission folder runtime:

   ```bash
   chmod 775 application/cache application/logs
   ```

5. Set environment di `.htaccess` atau host server:

   ```apache
   SetEnv CI_ENV production
   SetEnv LANDING_BASE_URL https://domain.com/
   SetEnv LANDING_API_BASE https://app.domain.com
   SetEnv LANDING_CAMPAIGN_URL https://app.domain.com
   SetEnv LANDING_DATAHUB_URL https://datahub.domain.com
   ```

6. Ganti `Sitemap:` di `robots.txt` sesuai domain produksi.

## Cache & Ketahanan Offline (Resilience)

- Home, list, dan detail artikel menggunakan output cache selama 10 menit; sitemap 60 menit.
- Cache disimpan di `application/cache/` dan otomatis membedakan query string (`?category=`, `?page=`).
- **Resilience**: Jika API Campaign mengalami gangguan atau offline, aplikasi merespons dengan HTTP status **503 (Service Unavailable)** beserta tampilan ramah pengguna, dan **tidak mencache** respons error tersebut.
- Hapus isi `application/cache/` saat ingin membersihkan cache secara instan.

## Catatan Keamanan

- Landing **tidak memiliki koneksi database**, sehingga tidak ada risiko kebocoran kredensial DB pada aplikasi landing.
- Request ke API dibatasi timeout cURL yang pendek (connect: 2s, total: 5s) agar proses SSR tidak menggantung saat service luar lambat.
- `application/`, `system/`, dan berkas konfigurasi dilindungi `.htaccess`.
