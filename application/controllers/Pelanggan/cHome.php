<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

    public function index()
    {
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/headerhome');
        $this->load->view('Pelanggan/vHome');
        $this->load->view('Pelanggan/Layouts/footer');
    }
}

/* End of file cHome.php */
