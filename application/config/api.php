<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$api_base = getenv('LANDING_API_BASE');

$config['articles_api_base'] = rtrim(
    $api_base !== false && $api_base !== ''
        ? $api_base
        : 'http://localhost:8000',
    '/'
);

$config['articles_api_connect_timeout'] = 2;
$config['articles_api_timeout'] = 5;
$config['articles_api_max_sitemap_pages'] = 40;
