<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

    public function index()
    {
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/header');
        $this->load->view('Pelanggan/vLogin');
        $this->load->view('Pelanggan/Layouts/footer');
    }
}

/* End of file cLogin.php */
