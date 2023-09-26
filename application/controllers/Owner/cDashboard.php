<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHistoryPelanggan');
	}
	public function index()
	{
		$data = array(
			'history' => $this->mHistoryPelanggan->select()
		);
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/nav', $data);
		$this->load->view('Owner/vDashboard');
		// $this->load->view('Owner/Layouts/footer');
	}
}

/* End of file cDashboard.php */
