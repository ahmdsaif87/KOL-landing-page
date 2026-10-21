<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
| Bisa dioverride lewat environment LANDING_BASE_URL.
| Contoh: LANDING_BASE_URL=https://domain.com/
*/
$base_url = getenv('LANDING_BASE_URL');
if ($base_url !== false && $base_url !== '') {
    $config['base_url'] = rtrim($base_url, '/') . '/';
} elseif (! empty($_SERVER['HTTP_HOST'])) {
    $scheme = (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $script = isset($_SERVER['SCRIPT_NAME']) ? str_replace('\\', '/', $_SERVER['SCRIPT_NAME']) : '';
    $dir = rtrim(dirname($script), '/\\');
    $config['base_url'] = $scheme . '://' . $_SERVER['HTTP_HOST'] . ($dir !== '' ? $dir : '') . '/';
} else {
    $config['base_url'] = 'http://localhost:8087/';
}
$config['index_page'] = '';
$config['uri_protocol'] = 'REQUEST_URI';
$config['url_suffix'] = '';

/*
|--------------------------------------------------------------------------
| Identitas situs
|--------------------------------------------------------------------------
*/
$config['site_name'] = 'KOLAB.ID';
$config['site_tagline'] = 'Kelola Seluruh Campaign KOL dalam Satu Platform';

/*
|--------------------------------------------------------------------------
| CDN (upload / aset bersama)
|--------------------------------------------------------------------------
| Cover artikel disimpan di shared-uploads/articles dan disajikan dari
| subdomain cdn. Kosongkan untuk memakai base_url.
*/
$cdn_url = getenv('LANDING_CDN_URL');
$config['cdn_url'] = $cdn_url !== false && $cdn_url !== '' ? rtrim($cdn_url, '/') : '';

/*
|--------------------------------------------------------------------------
| Application URL portal (tombol login)
|--------------------------------------------------------------------------
*/
$config['campaign_url'] = getenv('LANDING_CAMPAIGN_URL') ?: 'https://app.kolab.id';
$config['datahub_url']  = getenv('LANDING_DATAHUB_URL') ?: 'https://datahub.kolab.id';
$config['contact_url']  = getenv('LANDING_CONTACT_URL') ?: 'mailto:hello@kolab.id';

/*
|--------------------------------------------------------------------------
| Defaults
|--------------------------------------------------------------------------
*/
$config['language'] = 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

/*
|--------------------------------------------------------------------------
| Logging & cache
|--------------------------------------------------------------------------
*/
$config['log_threshold'] = (ENVIRONMENT === 'production') ? 1 : 1;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = TRUE;

/*
|--------------------------------------------------------------------------
| Encryption & session
|--------------------------------------------------------------------------
| Ganti encryption_key di produksi lewat environment LANDING_ENCRYPTION_KEY.
*/
$config['encryption_key'] = getenv('LANDING_ENCRYPTION_KEY') ?: 'landing-dev-only-change-me-32chars!!';

$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'kolab_landing_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = sys_get_temp_dir();
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

$config['cookie_prefix'] = 'kolab_';
$config['cookie_domain'] = '';
$config['cookie_path'] = '/';
$config['cookie_secure'] = (ENVIRONMENT === 'production');
$config['cookie_httponly'] = TRUE;
$config['cookie_samesite'] = 'Lax';

/*
|--------------------------------------------------------------------------
| Security
|--------------------------------------------------------------------------
*/
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_token';
$config['csrf_cookie_name'] = 'csrf_cookie';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();
$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| Output & misc
|--------------------------------------------------------------------------
*/
$config['compress_output'] = FALSE;
$config['time_reference'] = 'Asia/Jakarta';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';
