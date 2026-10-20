# KOL System — Landing Page

Landing page statis (Vanilla + Tailwind v4). Folder ini **tidak jalan di server** —
isi hasil deploy-nya yang di-copy ke `public_html/`.

## Struktur

```
landing/
├── index.html          # halaman utama
├── artikel.html        # listing + detail artikel
├── src/input.css       # sumber Tailwind (edit di sini, jangan edit dist/)
├── dist/output.css     # hasil build (generated — jangan edit tangan)
├── assets/
│   ├── js/main.js      # navbar toggle + scroll
│   ├── js/articles.js  # fetch & render artikel dari API KOL System
│   └── images/         # logo, gambar
├── robots.txt          # ikut ter-deploy
├── .htaccess           # ikut ter-deploy (HTTPS redirect, blok dotfile, URL artikel)
└── package.json        # hanya untuk build lokal — TIDAK di-upload
```

## Perintah

```bash
npm install        # sekali saja (butuh Node ≥ 18)
npm run dev        # watch Tailwind + preview server di http://localhost:8087 (auto-reload)
npm run css:watch  # watch Tailwind saja (tanpa server)
npm run preview    # server statis saja di http://localhost:8087
npm run build      # build production → dist/output.css (minified)
```

> Port preview (8087) hanya untuk lokal. Tidak ada hubungannya dengan deploy —
> `package.json` dan `node_modules/` tidak ikut di-upload ke `public_html/`.

## Deploy → public_html

Copy **hanya** ini ke `public_html/` di server:

| Dari (lokal)         | Ke (server)          |
|----------------------|----------------------|
| `index.html`         | `public_html/index.html` |
| `artikel.html`       | `public_html/artikel.html` |
| `dist/`              | `public_html/dist/`      |
| `assets/`            | `public_html/assets/`    |
| `robots.txt`         | `public_html/robots.txt` |
| `.htaccess`          | `public_html/.htaccess`  |

**Jangan di-upload:** `node_modules/`, `package.json`, `package-lock.json`, `src/` (opsional — boleh ikut sebagai referensi, tapi tidak dibutuhkan runtime).

Catatan: symlink `public_html/campaigns` dan `public_html/datahub` dibuat di server via terminal, bukan dari folder ini.

## Artikel

Artikel dikelola di KOL System (`/campaigns/administrator/articles`) dan dibaca
langsung oleh landing page melalui API publik:

- `GET /campaigns/articles/feed?limit=6&page=1&category=Insight&q=keyword`
- `GET /campaigns/articles/feed/{slug}`

Hanya artikel berstatus **PUBLISHED** dengan `published_at` yang sudah lewat
yang ditampilkan. URL artikel di landing page: `/artikel/{slug}` (di-rewrite oleh
`.htaccess` ke `artikel.html?slug={slug}`).

Base API diatur lewat atribut `data-api-base` pada `<html>` di `index.html` dan
`artikel.html`. Default produksi: `/campaigns`. Untuk uji lokal dengan server
statis (`npm run preview`), set override sebelum `articles.js` dimuat (sesuaikan
dengan URL instalasi KOL System di lokal):

```html
<script>window.KOL_ARTICLES_API_BASE = 'http://localhost/kol-system';</script>
```

## Catatan desain

Starter ini memakai font sistem + token warna placeholder di `src/input.css`
(`@theme`). Font, palet, dan komposisi sebenarnya ditentukan saat ronde arah
desain — lihat `PRODUCT.md` / `DESIGN.md` kalau sudah ada.
