<?php
/**
 * Router untuk PHP built-in server (development only).
 *
 * Produksi memakai Apache/LiteSpeed + .htaccess. File ini tidak dipakai
 * di produksi dan aman dibiarkan di repo.
 *
 * Jalankan: php -S 127.0.0.1:8087 dev-router.php
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path !== '/' && $path !== '/index.php' && file_exists(__DIR__ . $path) && ! is_dir(__DIR__ . $path)) {
    return FALSE;
}

require __DIR__ . '/index.php';
