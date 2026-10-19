# KOL System — Landing Page

Landing page statis (Vanilla + Tailwind v4). Folder ini **tidak jalan di server** —
isi hasil deploy-nya yang di-copy ke `public_html/`.

## Struktur

```
landing/
├── index.html          # halaman utama
├── src/input.css       # sumber Tailwind (edit di sini, jangan edit dist/)
├── dist/output.css     # hasil build (generated — jangan edit tangan)
├── assets/
│   ├── js/main.js      # navbar toggle + scroll
│   └── images/         # logo, gambar
├── robots.txt          # ikut ter-deploy
├── .htaccess           # ikut ter-deploy (HTTPS redirect + blok dotfile)
└── package.json        # hanya untuk build lokal — TIDAK di-upload
```

## Perintah

```bash
npm install        # sekali saja (butuh Node ≥ 18)
npm run build      # build production → dist/output.css (minified)
npm run dev        # watch mode saat mengembangkan
```

## Deploy → public_html

Copy **hanya** ini ke `public_html/` di server:

| Dari (lokal)         | Ke (server)          |
|----------------------|----------------------|
| `index.html`         | `public_html/index.html` |
| `dist/`              | `public_html/dist/`      |
| `assets/`            | `public_html/assets/`    |
| `robots.txt`         | `public_html/robots.txt` |
| `.htaccess`          | `public_html/.htaccess`  |

**Jangan di-upload:** `node_modules/`, `package.json`, `package-lock.json`, `src/` (opsional — boleh ikut sebagai referensi, tapi tidak dibutuhkan runtime).

Catatan: symlink `public_html/campaigns` dan `public_html/datahub` dibuat di server via terminal, bukan dari folder ini.

## Catatan desain

Starter ini memakai font sistem + token warna placeholder di `src/input.css`
(`@theme`). Font, palet, dan komposisi sebenarnya ditentukan saat ronde arah
desain — lihat `PRODUCT.md` / `DESIGN.md` kalau sudah ada.
