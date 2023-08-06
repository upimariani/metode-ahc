<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
    }

    public function index()
    {
        $data = array(
            'transaksi' => $this->mTransaksi->transaksi_pelanggan()
        );
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/header');
        $this->load->view('Pelanggan/vPesananSaya', $data);
        $this->load->view('Pelanggan/Layouts/footer');
    }
    public function detail_transaksi($id_transaksi)
    {
        $data = array(
            'transaksi' => $this->mTransaksi->detail_transaksi_pelanggan($id_transaksi)
        );
        $this->load->view('Pelanggan/Layouts/head');
        $this->load->view('Pelanggan/Layouts/header');
        $this->load->view('Pelanggan/vDetailTransaksi', $data);
        $this->load->view('Pelanggan/Layouts/footer');
    }
    public function bayar($id)
    {
        $config['upload_path']          = './asset/pembayaran';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {

            $data = array(
                'transaksi' => $this->mTransaksi->detail_transaksi_pelanggan($id),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Pelanggan/Layouts/head');
            $this->load->view('Pelanggan/Layouts/header');
            $this->load->view('Pelanggan/vDetailTransaksi', $data);
            $this->load->view('Pelanggan/Layouts/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'stat_transaksi' => '1',
                'stat_pembayaran' => '1',
                'bukti_pembayaran' => $upload_data['file_name']
            );
            $this->mTransaksi->bayar($id, $data);
            $this->session->set_flashdata('success', 'Anda berhasil melakukan pembayaran!!!');
            redirect('Pelanggan/cTransaksi/detail_transaksi/' . $id, 'refresh');
        }
    }
    public function pesanan_diterima($id)
    {
        //--------------analisis simpan disinii-------------
        $data = array(
            'stat_transaksi' => '4'
        );
        $this->mTransaksi->pesanan_diterima($id, $data);
        $this->session->set_flashdata('success', 'Pesanan Anda Berhasil Diterima!!!');
        redirect('Pelanggan/cTransaksi/detail_transaksi/' . $id, 'refresh');
    }
}

/* End of file cTransaksi.php */
