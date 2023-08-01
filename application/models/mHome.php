<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
    public function katalog()
    {
        $this->db->select('produk.id_produk, nama_produk, diskon, harga, gambar, deskripsi, stok');
        $this->db->from('produk');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mHome.php */
