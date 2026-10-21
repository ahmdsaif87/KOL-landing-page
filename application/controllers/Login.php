<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data = array(
            'active'           => 'login',
            'meta_title'       => 'Masuk — KOLAB.ID',
            'meta_description' => 'Pilih portal KOLAB.ID: Campaign Management atau KOL Datahub.',
            'og_type'          => 'website',
            'og_image'         => base_url('assets/images/hero-mockup.png'),
            'canonical'        => base_url('login'),
        );

        $this->load->view('layout/header', $data);
        $this->load->view('login/index', $data);
        $this->load->view('layout/footer', $data);
    }
}
