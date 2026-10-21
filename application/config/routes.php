<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['artikel'] = 'artikel/index';
$route['artikel/(:any)'] = 'artikel/detail/$1';
$route['login'] = 'login/index';
$route['sitemap.xml'] = 'home/sitemap';
