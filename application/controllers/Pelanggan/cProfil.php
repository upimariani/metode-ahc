<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProfil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProfile');
	}



	public function index()
	{
		$data = array(
			'profile' => $this->mProfile->profile()
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/headerhome');
		$this->load->view('Pelanggan/vProfil', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'profile' => $this->mProfile->profile()
			);
			$this->load->view('Pelanggan/Layouts/head');
			$this->load->view('Pelanggan/Layouts/headerhome');
			$this->load->view('Pelanggan/vProfil', $data);
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$data = array(
				'nama_pelanggan' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->mProfile->update_profile($id, $data);
			$this->session->set_flashdata('success', 'Anda Berhasil Melakukan Update Profile');
			redirect('Pelanggan/cProfil');
		}
	}
}

/* End of file cProfil.php */
