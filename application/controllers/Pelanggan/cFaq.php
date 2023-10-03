<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cFaq extends CI_Controller
{

	public function index()
	{
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/headerhome');
		$this->load->view('Pelanggan/vFaq');
		$this->load->view('Pelanggan/Layouts/footer');
	}
}

/* End of file cFaq.php */
