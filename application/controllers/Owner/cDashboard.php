<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/nav');
		$this->load->view('Owner/vDashboard');
		$this->load->view('Owner/Layouts/footer');
	}
}

/* End of file cDashboard.php */
