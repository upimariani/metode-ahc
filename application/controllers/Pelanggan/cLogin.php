<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLogin');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/Layouts/head');
			$this->load->view('Pelanggan/Layouts/header');
			$this->load->view('Pelanggan/vLogin');
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = $this->mLogin->login_pelangan($username, $password);
			if ($data) {
				$id_pelanggan = $data->id_pelanggan;
				$nama = $data->nama_pelanggan;
				$level_member = $data->level_member;


				$array = array(
					'id_pelanggan' => $id_pelanggan,
					'nama' => $nama,
					'member' => $level_member
				);
				$this->session->set_userdata($array);

				redirect('Pelanggan/cHome');
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');

				redirect('Pelanggan/cLogin');
			}
		}
	}
	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/Layouts/head');
			$this->load->view('Pelanggan/Layouts/header');
			$this->load->view('Pelanggan/vregister');
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$data = array(
				'nama_pelanggan' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_member' => '5',
				'no_tlp' => $this->input->post('no_telp')
			);
			$this->mLogin->registrasi($data);
			$this->session->set_flashdata('success', 'Anda Berhasil Registrasi! Silahkan Melakukan Login');
			redirect('Pelanggan/cLogin');
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('id_pelanggan');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('member');
		$this->session->set_flashdata('success', 'Anda Berahasil Logout!');
		redirect('Pelanggan/cLogin');
	}
}

/* End of file cLogin.php */
