<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanSegmentasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHistoryPelanggan');
	}
	public function index()
	{
		$data = array(
			'history' => $this->mHistoryPelanggan->select()
		);
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/nav');
		$this->load->view('Owner/vSegmentasi', $data);
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

		$pdf->Cell(200, 40, 'LAPORAN SEGMENTASI PELANGGAN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Atas Nama', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Alamat', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Level Member', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;

		$data = $this->mHistoryPelanggan->select();
		foreach ($data as $key => $value) {
			if ($value->level_member == '1') {
				$status = 'Superstar';
			} else if ($value->level_member == '2') {
				$status = 'Golden Customer';
			} else if ($value->level_member == '3') {
				$status = 'Occasional Customer';
			} else if ($value->level_member == '4') {
				$status = 'Everyday Shopper';
			} else if ($value->level_member == '5') {
				$status = 'Dormant Customer';
			}
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->nama_pelanggan, 1, 0);
			$pdf->Cell(70, 6, $value->alamat, 1, 0);
			$pdf->Cell(50, 6, $status, 1, 1);
		}
		$pdf->Output();
	}
}
 
 /* End of file cLaporanSegementasi.php */
