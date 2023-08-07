<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
    public function data_variabel()
    {
        return $this->db->query("SELECT COUNT(transaksi.id_transaksi) as frequency, DATEDIFF('" . date('Y-m-d') . "', MAX(tgl_transaksi)) as recency, SUM(tot_transaksi) as monetary, transaksi.id_pelanggan, nama_pelanggan FROM `transaksi` RIGHT JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan GROUP BY transaksi.id_pelanggan;")->result();
    }
}

/* End of file mAnalisis.php */
