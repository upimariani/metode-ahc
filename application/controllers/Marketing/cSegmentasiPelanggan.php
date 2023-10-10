<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSegmentasiPelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHistoryPelanggan');
		$this->load->model('mAnalisis');
	}
	public function index()
	{
		$data = array(
			'history' => $this->mHistoryPelanggan->select()
		);
		$this->load->view('Marketing/Layouts/head');
		$this->load->view('Marketing/Layouts/nav');
		$this->load->view('Marketing/vHistoryPelanggan', $data);
		$this->load->view('Marketing/Layouts/footer');
	}
}

/* End of file cSegmentasiPelanggan.php */
