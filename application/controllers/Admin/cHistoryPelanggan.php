<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHistoryPelanggan extends CI_Controller
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
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vHistoryPelanggan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_level_member($member)
	{
		$data = array(

			'history' => $this->mHistoryPelanggan->select(),
			'status' => $member
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vLevelMemberPelanggan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_history($id)
	{
		$data = array(
			'id' => $id,
			'detail_history' => $this->mHistoryPelanggan->detail_history($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vDetailHistory', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function viewAnalisis()
	{
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vViewAnalisis');
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cHistoryPelanggan.php */
