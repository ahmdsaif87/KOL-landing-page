<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_api_exception extends Exception {}

class Artikel_api
{
    /**
     * @var CI_Controller
     */
    protected $ci;

    /**
     * @var string
     */
    protected $api_base;

    /**
     * @var int
     */
    protected $connect_timeout;

    /**
     * @var int
     */
    protected $timeout;

    /**
     * @var int
     */
    protected $max_sitemap_pages;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->config->load('api', TRUE, TRUE);

        $api_config = $this->ci->config->item('api');
        $base = isset($api_config['articles_api_base']) ? $api_config['articles_api_base'] : 'http://localhost:8000';

        $this->api_base          = rtrim($base, '/');
        $this->connect_timeout   = isset($api_config['articles_api_connect_timeout']) ? (int) $api_config['articles_api_connect_timeout'] : 2;
        $this->timeout           = isset($api_config['articles_api_timeout']) ? (int) $api_config['articles_api_timeout'] : 5;
        $this->max_sitemap_pages = isset($api_config['articles_api_max_sitemap_pages']) ? (int) $api_config['articles_api_max_sitemap_pages'] : 40;
    }

    /**
     * Eksekusi HTTP GET request via cURL ke API feed.
     *
     * @param string $path
     * @param array $query
     * @param bool $allow_404
     * @return object|null
     * @throws Artikel_api_exception
     */
    protected function request($path, array $query = array(), $allow_404 = false)
    {
        $url = $this->api_base . '/' . ltrim($path, '/');
        if (! empty($query)) {
            $url .= '?' . http_build_query($query);
        }

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => $this->connect_timeout,
            CURLOPT_TIMEOUT        => $this->timeout,
            CURLOPT_HTTPHEADER     => array('Accept: application/json'),
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 3,
        ));

        $response  = curl_exec($ch);
        $curl_err  = curl_error($ch);
        $curl_code = curl_errno($ch);
        $http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($curl_code !== 0) {
            throw new Artikel_api_exception("Koneksi API gagal: {$curl_err}", $curl_code);
        }

        if ($http_code === 404 && $allow_404) {
            return null;
        }

        if ($http_code < 200 || $http_code >= 300) {
            throw new Artikel_api_exception("API merespons status HTTP {$http_code}", $http_code);
        }

        $decoded = json_decode($response, false);
        if (json_last_error() !== JSON_ERROR_NONE || ! is_object($decoded)) {
            throw new Artikel_api_exception('Respons API bukan JSON yang valid');
        }

        if (empty($decoded->success) || $decoded->success !== true) {
            $msg = isset($decoded->message) ? $decoded->message : 'Operasi API tidak berhasil';
            throw new Artikel_api_exception($msg);
        }

        return $decoded;
    }

    /**
     * Ambil artikel terbaru untuk homepage.
     *
     * @param int $limit
     * @return array
     * @throws Artikel_api_exception
     */
    public function latest($limit = 3)
    {
        $res = $this->request('articles/feed', array('limit' => (int) $limit));
        return (isset($res->data) && is_array($res->data)) ? $res->data : array();
    }

    /**
     * Ambil artikel terpaginasi dengan filter kategori dan search opsional.
     *
     * @param int $limit
     * @param int $page
     * @param string $category
     * @param string $search
     * @return object
     * @throws Artikel_api_exception
     */
    public function paginate($limit, $page, $category = '', $search = '')
    {
        $query = array(
            'limit' => max(1, (int) $limit),
            'page'  => max(1, (int) $page),
        );

        if ($category !== '') {
            $query['category'] = $category;
        }

        if ($search !== '') {
            $query['q'] = $search;
        }

        $res = $this->request('articles/feed', $query);

        $data = (isset($res->data) && is_array($res->data)) ? $res->data : array();
        $meta = isset($res->meta) && is_object($res->meta) ? $res->meta : (object) array(
            'page'        => $query['page'],
            'per_page'    => $query['limit'],
            'total'       => count($data),
            'total_pages' => 1,
            'categories'  => array(),
        );

        return (object) array(
            'data' => $data,
            'meta' => $meta,
        );
    }

    /**
     * Ambil artikel spesifik berdasarkan slug.
     *
     * @param string $slug
     * @return object|null
     * @throws Artikel_api_exception
     */
    public function by_slug($slug)
    {
        $slug = trim((string) $slug);
        if ($slug === '' || ! preg_match('/^[a-z0-9\-]+$/i', $slug)) {
            return null;
        }

        $res = $this->request('articles/feed/' . rawurlencode($slug), array(), true);
        if ($res === null || empty($res->data) || ! is_object($res->data)) {
            return null;
        }

        return $res->data;
    }

    /**
     * Ambil artikel terkait (exclude slug saat ini).
     *
     * @param string $slug
     * @param int $limit
     * @return array
     */
    public function related($slug, $limit = 3)
    {
        try {
            $res = $this->request('articles/feed', array('limit' => max(4, (int) $limit + 1)));
            $rows = (isset($res->data) && is_array($res->data)) ? $res->data : array();
        } catch (Artikel_api_exception $e) {
            return array();
        }

        $filtered = array();
        foreach ($rows as $item) {
            if (isset($item->slug) && $item->slug === $slug) {
                continue;
            }
            $filtered[] = $item;
            if (count($filtered) >= $limit) {
                break;
            }
        }

        return $filtered;
    }

    /**
     * Ambil seluruh artikel publik untuk sitemap XML.
     *
     * @return array
     * @throws Artikel_api_exception
     */
    public function all_for_sitemap()
    {
        $first_page = $this->request('articles/feed', array('limit' => 50, 'page' => 1));
        $articles   = (isset($first_page->data) && is_array($first_page->data)) ? $first_page->data : array();

        $total_pages = 1;
        if (isset($first_page->meta->total_pages)) {
            $total_pages = min((int) $first_page->meta->total_pages, $this->max_sitemap_pages);
        }

        for ($p = 2; $p <= $total_pages; $p++) {
            $next = $this->request('articles/feed', array('limit' => 50, 'page' => $p));
            if (isset($next->data) && is_array($next->data)) {
                $articles = array_merge($articles, $next->data);
            }
        }

        return $articles;
    }
}
