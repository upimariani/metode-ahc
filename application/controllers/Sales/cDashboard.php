<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Sales/Layouts/head');
		$this->load->view('Sales/Layouts/nav');
		$this->load->view('Sales/vDashboard');
		$this->load->view('Sales/Layouts/footer');
	}
}

/* End of file cDashboard.php */
