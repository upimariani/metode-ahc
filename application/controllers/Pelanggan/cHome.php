<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHome');
	}


	public function index()
	{
		$data = array(
			'produk' => $this->mHome->katalog(),
			'penilaian' => $this->mHome->penilaian()
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/headerhome');
		$this->load->view('Pelanggan/vHome', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function addtocart()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty'),
			'stok' => $this->input->post('stok'),
			'picture' => $this->input->post('picture')
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Produk berhasil masuk keranjang');
		redirect('Pelanggan/cHome');
	}
}

/* End of file cHome.php */
