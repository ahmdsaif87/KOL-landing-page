<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
| Database sengaja TIDAK di-autoload. Hanya controller yang butuh artikel
| yang memuat model (dan koneksi DB) — halaman statis tetap ringan.
*/
$autoload['packages'] = array();
$autoload['libraries'] = array();
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'text');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array();
