<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDiskon extends CI_Model
{
	public function select_produk()
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, id_diskon FROM produk LEFT JOIN diskon ON produk.id_produk = diskon.id_produk")->result();
	}
	public function insert($data)
	{
		$this->db->insert('diskon', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('diskon');
		$this->db->join('produk', 'diskon.id_produk = produk.id_produk', 'left');

		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('diskon');
		$this->db->where('id_diskon', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_diskon', $id);
		$this->db->update('diskon', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_diskon', $id);
		$this->db->delete('diskon');
	}
}

/* End of file mDiskon.php */
