<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDiskon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDiskon');
		$this->load->model('mProduk');
	}


	public function index()
	{
		$data = array(
			'diskon' => $this->mDiskon->select()
		);
		$this->load->view('Marketing/Layouts/head');
		$this->load->view('Marketing/Layouts/nav');
		$this->load->view('Marketing/vDiskon', $data);
		$this->load->view('Marketing/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Tiket', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Tiket', 'required');
		$this->form_validation->set_rules('nama_diskon', 'Nama Diskon', 'required');
		$this->form_validation->set_rules('besar', 'Besar Tiket', 'required');
		$this->form_validation->set_rules('member', 'Member', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'produk' => $this->mDiskon->select_produk()
			);
			$this->load->view('Marketing/Layouts/head');
			$this->load->view('Marketing/Layouts/nav');
			$this->load->view('Marketing/vTambahDiskon', $data);
			$this->load->view('Marketing/Layouts/footer');
		} else {
			$data = array(
				'id_produk' => $this->input->post('nama'),
				'tgl_diskon' => $this->input->post('tgl'),
				'diskon' => $this->input->post('besar'),
				'nama_diskon' => $this->input->post('nama_diskon'),
				'member' => $this->input->post('member')
			);
			$this->mDiskon->insert($data);
			$this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan!!!');
			redirect('Marketing/cDiskon');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Tiket', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Tiket', 'required');
		$this->form_validation->set_rules('nama_diskon', 'Nama Diskon', 'required');
		$this->form_validation->set_rules('besar', 'Besar Tiket', 'required');
		$this->form_validation->set_rules('member', 'Member', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'produk' => $this->mDiskon->edit($id),
				'data_produk' => $this->mProduk->select()
			);
			$this->load->view('Marketing/Layouts/head');
			$this->load->view('Marketing/Layouts/nav');
			$this->load->view('Marketing/vUpdateDiskon', $data);
			$this->load->view('Marketing/Layouts/footer');
		} else {
			$data = array(
				'id_produk' => $this->input->post('nama'),
				'tgl_diskon' => $this->input->post('tgl'),
				'diskon' => $this->input->post('besar'),
				'nama_diskon' => $this->input->post('nama_diskon'),
				'member' => $this->input->post('member')
			);
			$this->mDiskon->update($id, $data);
			$this->session->set_flashdata('success', 'Data Diskon Berhasil Diperbaharui!!!');
			redirect('Marketing/cDiskon');
		}
	}
	public function delete($id)
	{
		$this->mDiskon->delete($id);
		$this->session->set_flashdata('success', 'Data Diskon Berhasil Dihapus!!!');
		redirect('Marketing/cDiskon');
	}
}

/* End of file cDiskon.php */
