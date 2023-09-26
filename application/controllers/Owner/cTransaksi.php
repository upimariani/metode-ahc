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
			'transaksi' => $this->mTransaksi->transaksi_sales()
		);
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/nav');
		$this->load->view('Owner/vTransaksiPelanggan', $data);
		$this->load->view('Owner/Layouts/footer');
	}
	public function cetak()
	{
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);

		$pdf->Cell(200, 40, 'LAPORAN PENJUALAN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Atas Nama', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Total Transaksi', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;

		$data = $this->mTransaksi->transaksi_sales();
		foreach ($data as $key => $value) {
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->nama_pelanggan, 1, 0);
			$pdf->Cell(50, 6, $value->tgl_transaksi, 1, 0);
			$pdf->Cell(50, 6, 'Rp.' . number_format($value->tot_transaksi), 1, 1);
		}
		$pdf->Output();
	}
}

/* End of file cTransaksi.php */
