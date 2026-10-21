<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    /**
     * Tampilkan halaman offline 503 yang ramah ketika service API artikel tidak dapat dihubungi.
     * Tidak boleh menyimpan output cache.
     *
     * @param string $message
     * @param string $title
     * @return void
     */
    protected function render_offline($message = 'Artikel sedang tidak dapat dimuat. Silakan coba beberapa saat lagi.', $title = 'Layanan Sedang Mengalami Kendala — KOLAB.ID')
    {
        $this->output->set_status_header(503);
        $this->output->set_header('Retry-After: 60');

        $data = array(
            'offline_title'   => $title,
            'offline_message' => $message,
        );

        $this->load->view('errors/offline', $data);
    }
}
