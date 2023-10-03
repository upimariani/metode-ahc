<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProduk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProduk');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Sales/Layouts/head');
		$this->load->view('Sales/Layouts/nav');
		$this->load->view('Sales/vProduk', $data);
		$this->load->view('Sales/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('harga', 'Harga produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok produk', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Sales/Layouts/head');
			$this->load->view('Sales/Layouts/nav');
			$this->load->view('Sales/vTambahProduk');
			$this->load->view('Sales/Layouts/footer');
		} else {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'error' => $this->upload->display_errors(),
				);
				$this->load->view('Sales/Layouts/head');
				$this->load->view('Sales/Layouts/nav');
				$this->load->view('Sales/vTambahProduk', $data);
				$this->load->view('Sales/Layouts/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'nama_produk' => $this->input->post('nama'),
					'deskripsi' => $this->input->post('deskripsi'),
					'stok' => $this->input->post('stok'),
					'harga' => $this->input->post('harga'),
					'gambar' => $upload_data['file_name']
				);
				$this->mProduk->insert($data);
				$this->session->set_flashdata('success', 'Data produk Berhasil Ditambahkan!!!');

				redirect('Sales/cProduk', 'refresh');
			}
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('harga', 'Harga produk', 'required');
		$this->form_validation->set_rules('stok', 'Stok produk', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'produk' => $this->mProduk->edit($id)
			);
			$this->load->view('Sales/Layouts/head');
			$this->load->view('Sales/Layouts/nav');
			$this->load->view('Sales/vUpdateProduk', $data);
			// $this->load->view('Sales/Layouts/footer');
		} else {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 50000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'produk' => $this->mProduk->edit($id),
					'error' => $this->upload->display_errors(),
				);
				$this->load->view('Sales/Layouts/head');
				$this->load->view('Sales/Layouts/nav');
				$this->load->view('Sales/vUpdateProduk', $data);
				// $this->load->view('Sales/Layouts/footer');
			} else {

				$upload_data =  $this->upload->data();
				$data = array(
					'nama_produk' => $this->input->post('nama'),
					'deskripsi' => $this->input->post('deskripsi'),
					'stok' => $this->input->post('stok'),
					'harga' => $this->input->post('harga'),
					'gambar' => $upload_data['file_name']
				);
				$this->mProduk->update($id, $data);
				$this->session->set_flashdata('success', 'Data produk Berhasil Diperbaharui!!!');

				redirect('Sales/cProduk', 'refresh');
			}
			$data = array(
				'nama_produk' => $this->input->post('nama'),
				'deskripsi' => $this->input->post('deskripsi'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga')
			);
			$this->mProduk->update($id, $data);
			$this->session->set_flashdata('success', 'Data produk Berhasil Diperbaharui!!!');

			redirect('Sales/cProduk', 'refresh');
		}
	}
	public function delete($id)
	{
		$this->mProduk->delete($id);
		$this->session->set_flashdata('success', 'Data produk Berhasil Dihapus!!!');
		redirect('Sales/cProduk', 'refresh');
	}
}

/* End of file cProduk.php */
