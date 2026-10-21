<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends MY_Controller
{
    public function index()
    {
        $this->load->library('artikel_api');

        $category = trim((string) $this->input->get('category'));
        $search   = trim((string) $this->input->get('q'));
        $page     = (int) $this->input->get('page');
        $page     = $page > 0 ? $page : 1;
        $per_page = 9;

        try {
            $result = $this->artikel_api->paginate($per_page, $page, $category, $search);
        } catch (Artikel_api_exception $e) {
            $this->render_offline();
            return;
        }

        $total = (int) $result->meta->total;
        $pages = max(1, (int) $result->meta->total_pages);

        if ($page > $pages && $total > 0) {
            $redirect_params = array();
            if ($category !== '') {
                $redirect_params['category'] = $category;
            }
            if ($search !== '') {
                $redirect_params['q'] = $search;
            }
            $redirect_url = ! empty($redirect_params) ? 'artikel?' . http_build_query($redirect_params) : 'artikel';
            redirect($redirect_url);
        }

        if (ENVIRONMENT === 'production') {
            $this->output->cache(10);
        }

        $title = 'Artikel & Insight — KOLAB.ID';
        if ($category !== '' && $search !== '') {
            $title = 'Pencarian "' . $search . '" di ' . $category . ' — KOLAB.ID';
        } elseif ($search !== '') {
            $title = 'Pencarian "' . $search . '" — KOLAB.ID';
        } elseif ($category !== '') {
            $title = 'Artikel ' . $category . ' — KOLAB.ID';
        }
        if ($page > 1) {
            $title .= ' (Halaman ' . $page . ')';
        }

        $canonical_params = array();
        if ($category !== '') {
            $canonical_params['category'] = $category;
        }
        if ($search !== '') {
            $canonical_params['q'] = $search;
        }
        $canonical = ! empty($canonical_params)
            ? base_url('artikel?' . http_build_query($canonical_params))
            : base_url('artikel');

        $data = array(
            'active'           => 'artikel',
            'meta_title'       => $title,
            'meta_description' => 'Panduan, riset, dan praktik terbaik seputar influencer marketing, KOL, dan kampanye digital dari KOLAB.ID.',
            'og_type'          => 'website',
            'og_image'         => base_url('assets/images/hero-mockup.png'),
            'canonical'        => $canonical,
            'artikel'          => $result->data,
            'categories'       => isset($result->meta->categories) ? $result->meta->categories : array(),
            'active_category'  => $category,
            'search'           => $search,
            'page'             => $page,
            'total_pages'      => $pages,
            'total'            => $total,
        );

        $this->load->view('layout/header', $data);
        $this->load->view('artikel/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function detail($slug = NULL)
    {
        $slug = trim((string) $slug);

        if ($slug === '' || ! preg_match('/^[a-z0-9\-]+$/i', $slug)) {
            show_404();
        }

        $this->load->library('artikel_api');

        try {
            $artikel = $this->artikel_api->by_slug($slug);
        } catch (Artikel_api_exception $e) {
            $this->render_offline();
            return;
        }

        if (! $artikel) {
            show_404();
        }

        $related       = $this->artikel_api->related($artikel->slug, 3);
        $cover         = ! empty($artikel->cover_image_url) ? $artikel->cover_image_url : null;
        $author        = ! empty($artikel->author) ? $artikel->author : 'Admin';
        $date_label    = ! empty($artikel->published_at_label) ? $artikel->published_at_label : '';
        $reading_time  = isset($artikel->reading_time) ? (int) $artikel->reading_time : 1;
        $tags          = isset($artikel->tags) && is_array($artikel->tags) ? $artikel->tags : array();
        $published_iso = ! empty($artikel->published_at) ? date('c', strtotime($artikel->published_at)) : date('c');

        if (ENVIRONMENT === 'production') {
            $this->output->cache(10);
        }

        $data = array(
            'active'           => 'artikel',
            'meta_title'       => ! empty($artikel->meta_title) ? $artikel->meta_title : $artikel->title . ' — KOLAB.ID',
            'meta_description' => ! empty($artikel->meta_description) ? $artikel->meta_description : (string) $artikel->excerpt,
            'og_type'          => 'article',
            'og_image'         => $cover ? $cover : base_url('assets/images/hero-mockup.png'),
            'canonical'        => base_url('artikel/' . $artikel->slug),
            'artikel'          => $artikel,
            'cover'            => $cover,
            'content'          => isset($artikel->content) ? $artikel->content : '',
            'tags'             => $tags,
            'date_label'       => $date_label,
            'reading_time'     => $reading_time,
            'related'          => $related,
            'json_ld'          => json_encode(array(
                '@context'         => 'https://schema.org',
                '@type'            => 'Article',
                'headline'         => $artikel->title,
                'description'      => ! empty($artikel->meta_description) ? $artikel->meta_description : (string) $artikel->excerpt,
                'image'            => $cover ? array($cover) : array(base_url('assets/images/hero-mockup.png')),
                'datePublished'    => $published_iso,
                'dateModified'     => $published_iso,
                'author'           => array(
                    '@type' => 'Person',
                    'name'  => $author,
                ),
                'publisher'        => array(
                    '@type' => 'Organization',
                    'name'  => 'KOLAB.ID',
                    'logo'  => array(
                        '@type' => 'ImageObject',
                        'url'   => base_url('assets/images/kolab-logo.png'),
                    ),
                ),
                'mainEntityOfPage' => array(
                    '@type' => 'WebPage',
                    '@id'   => base_url('artikel/' . $artikel->slug),
                ),
            ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        );

        $this->load->view('layout/header', $data);
        $this->load->view('artikel/detail', $data);
        $this->load->view('layout/footer', $data);
    }
}
