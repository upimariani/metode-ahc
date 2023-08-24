<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCart extends CI_Controller
{

	public function index()
	{
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vCart');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Pelanggan/cCart');
	}
	public function update_cart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'  => $items['rowid'],
				'qty'    => $this->input->post($i . '[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('Pelanggan/cCart');
	}
	public function checkout()
	{
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'tgl_transaksi' => date('Y-m-d'),
			'tot_transaksi' => $this->input->post('subtotal'),
			'stat_transaksi' => '0',
			'bukti_pembayaran' => '0',
			'pengiriman' => $this->input->post('alamat') . ' Kota.' . $this->input->post('kota') . ' Provinsi.' . $this->input->post('provinsi') . ' Expedisi.' . $this->input->post('expedisi') . ' Paket.' . $this->input->post('paket'),
			'ongkir' => $this->input->post('ongkir')
		);
		$this->db->insert('transaksi', $data);

		$id_transaksi = $this->db->query("SELECT MAX(id_transaksi) as id FROM `transaksi`;")->row();

		foreach ($this->cart->contents() as $key => $value) {
			$detail = array(
				'id_transaksi' => $id_transaksi->id,
				'id_produk' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('detail_transaksi', $detail);
		}
		$this->cart->destroy();
		redirect('Pelanggan/cHome');
	}
}

/* End of file cCart.php */
