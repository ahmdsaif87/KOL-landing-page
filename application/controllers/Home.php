<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function index()
    {
        $latest = array();
        try {
            $this->load->library('artikel_api');
            $latest = $this->artikel_api->latest(3);
            if (ENVIRONMENT === 'production') {
                $this->output->cache(10);
            }
        } catch (Artikel_api_exception $e) {
            $latest = array();
        }

        $data = array(
            'active'           => 'home',
            'meta_title'       => 'KOLAB.ID — Kelola Seluruh Campaign KOL dalam Satu Platform',
            'meta_description' => 'Sistem orkestrasi & analitik influencer marketing enterprise: database kreator, campaign, approval, dan performa dalam satu sistem terintegrasi.',
            'og_type'          => 'website',
            'og_image'         => base_url('assets/images/hero-mockup.png'),
            'canonical'        => base_url('/'),
            'latest'           => $latest,
        );

        $this->load->view('layout/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function sitemap()
    {
        $this->load->library('artikel_api');

        try {
            $articles = $this->artikel_api->all_for_sitemap();
        } catch (Artikel_api_exception $e) {
            $this->output->set_status_header(503);
            $this->output->set_header('Retry-After: 60');
            $this->output
                ->set_content_type('text/plain', 'utf-8')
                ->set_output('Sitemap temporarily unavailable');
            return;
        }

        if (ENVIRONMENT === 'production') {
            $this->output->cache(60);
        }

        $urls = array(
            array('loc' => base_url('/'), 'lastmod' => date('c'), 'priority' => '1.0'),
            array('loc' => base_url('artikel'), 'lastmod' => date('c'), 'priority' => '0.8'),
        );

        foreach ($articles as $row) {
            $lastmod = ! empty($row->published_at) ? date('c', strtotime($row->published_at)) : date('c');
            $urls[] = array(
                'loc'      => base_url('artikel/' . $row->slug),
                'lastmod'  => $lastmod,
                'priority' => '0.6',
            );
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . html_escape($url['loc']) . "</loc>\n";
            $xml .= '    <lastmod>' . $url['lastmod'] . "</lastmod>\n";
            $xml .= '    <priority>' . $url['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        $this->output
            ->set_content_type('application/xml', 'utf-8')
            ->set_output($xml);
    }
}
