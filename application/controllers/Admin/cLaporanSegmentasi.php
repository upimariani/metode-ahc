<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanSegmentasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHistoryPelanggan');
	}
	public function index()
	{
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vPeriodeSegementasi');
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_segemntasi($periode)
	{
		if ($periode == '1') {
			$data_periode = $this->mHistoryPelanggan->select_history_old();
		} else {
			$data_periode = $this->mHistoryPelanggan->select();
		}
		$data = array(
			'periode' => $periode,
			'history' => $data_periode,
			'periode' => $periode
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vSegmentasi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cLaporanSegmentasi.php */
