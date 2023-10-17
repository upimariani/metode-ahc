<?php
defined('BASEPATH') or exit('No direct script access allowed');


class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
		$this->load->model('mAnalisis');
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
		// echo 'Bismillah Perhitungan AHC<br>';

		$nama = array();
		$recency = array();
		$frequency = array();
		$monetary = array();
		$data_variabel = $this->mAnalisis->data_variabel();
		foreach ($data_variabel as $key => $value) {
			$nama[] = $value->id_pelanggan;
			$recency[] = $value->recency;
			$frequency[] = $value->frequency;
			$monetary[] = $value->monetary;
		}

		$vr = array();
		$vf = array();
		$vm = array();
		$d = array();
		for ($i = 0; $i < sizeof($nama); $i++) {
			// echo '| ' . $nama[$i];
			// echo '| ' . $recency[$i];
			// echo '| ' . $frequency[$i];
			// echo '| ' . $monetary[$i];
			// echo '<br>';


			if ($recency[$i] <= '30') {
				$vr[] = '4';
			} else if ($recency[$i] >= '60' || $recency[$i] <= '90') {
				$vr[] = '3';
			} else if ($recency[$i] >= '120' || $recency[$i] <= '150') {
				$vr[] = '2';
			} else if ($recency[$i] > '150') {
				$vr[] = '1';
			}

			if ($frequency[$i] >= '10') {
				$vf[] = '4';
			} else if ($frequency[$i] >= '7' && $frequency[$i] <= '9') {
				$vf[] = '3';
			} else if ($frequency[$i] >= '4' && $frequency[$i] <= '6') {
				$vf[] = '2';
			} else if ($frequency[$i] < '4') {
				$vf[] = '1';
			}

			if ($monetary[$i] > '100000000') {
				$vm[] = '4';
			} else if ($monetary[$i] >= '50000000' && $monetary[$i] <= '100000000') {
				$vm[] = '3';
			} else if ($monetary[$i] >= '5000000' && $monetary[$i] <= '50000000') {
				$vm[] = '2';
			} else if ($monetary[$i] < '50000000') {
				$vm[] = '1';
			}

			// echo $vr[$i];
			// echo $vf[$i];
			// echo $vm[$i];
			// echo '<br>';
		}

		$no = 1;
		$nod = array();
		for ($j = 1; $j <= sizeof($vr); $j++) {
			for ($k = 1; $k <= sizeof($vf); $k++) {
				// echo $no++;
				// echo '| B000' . $j . ' | B000' . $k;
				// echo '<br>';
				// echo $vr[$j - 1] . '|' . $vr[$k - 1] . ' + ' . $vf[$j - 1] . '|' . $vf[$k - 1] . ' + ' . $vm[$j - 1] . ' | ' . $vm[$k - 1];
				// echo '<br>';
				//perhitungan rumus euclidean
				$d[] = round(sqrt(pow($vr[$j - 1] - $vr[$k - 1], 2) + pow($vf[$j - 1] - $vf[$k - 1], 2) + pow($vm[$j - 1] - $vm[$k - 1], 2)), 2);
				$nod[] = $j;
				$nod1[] = $k;
			}
		}

		$matriks = array();
		for ($p = 0; $p < sizeof($nod); $p++) {

			// echo $nod[$p] . ' | ';
			// echo $d[$p];

			$matriks[] = array('queue1' => $nod[$p], 'queue2' => $nod1[$p], 'nilai' => $d[$p]);

			// echo '<br>';
		}



		for ($a = 0; $a < sizeof($matriks); $a++) {
			$queue[$a] = $matriks[$a]['queue1'];
			$nilai[$a] = $matriks[$a]['nilai'];
		}
		$queue = array_column($matriks, 'queue1');
		$nilai = array_column($matriks, 'nilai');
		array_multisort($nilai, SORT_ASC, $matriks);

		$member = array();
		for ($z = 0; $z < sizeof($matriks); $z++) {
			if ($matriks[$z]['queue1'] == '1') {
				if ($matriks[$z]['nilai'] <= '1') {
					// echo 'Member 1 : ';
					// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
					// echo '<br>';
					$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '1');
				} else if ($matriks[$z]['nilai'] < 2) {
					// echo 'Member 2 :';
					// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
					// echo '<br>';
					$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '2');
				} else if ($matriks[$z]['nilai'] < 3) {
					// echo 'Member 3: ';
					// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
					// echo '<br>';
					$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '3');
				} else if ($matriks[$z]['nilai'] < 4) {
					// echo 'Member 4: ';
					// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
					// echo '<br>';
					$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '4');
				} else {
					// echo 'Member 5: ';
					// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
					// echo '<br>';
					$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '5');
				}
			}
		}

		// update level member pelanggan
		for ($m = 0; $m < sizeof($member); $m++) {
			$id_pelanggan = $member[$m]['karyawan'];
			$data_member = array(
				'level_member' => $member[$m]['member']
			);
			$this->db->where('id_pelanggan', $id_pelanggan);
			$this->db->update('pelanggan', $data_member);
		}


		// update status transaksi pelanggan
		$data = array(
			'stat_transaksi' => '4'
		);
		$this->mTransaksi->pesanan_diterima($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Anda Berhasil Diterima!!!');
		redirect('Pelanggan/cTransaksi/detail_transaksi/' . $id, 'refresh');
	}
	public function penilaian($id)
	{
		$data = array(
			'isi_penilaian' => $this->input->post('penilaian'),
			'id_transaksi' => $id
		);
		$this->db->insert('penilaian', $data);
		$this->session->set_flashdata('success', 'Penilaian Berhasil Dikirim!');
		redirect('Pelanggan/cTransaksi');
	}

	public function invoice($id_transaksi)
	{
		$data = array(
			'transaksi' => $this->mTransaksi->detail_transaksi_pelanggan($id_transaksi)
		);
		$this->load->view('Pelanggan/vInvoice', $data);
	}
	public function download_invoice($id_transaksi)
	{
		$this->load->library('Pdfgenerator');
		$data['title'] = "Data Random";
		$file_pdf = $data['title'];
		$paper = 'A4';
		$orientation = "landscape";
		$data = array(
			'transaksi' => $this->mTransaksi->detail_transaksi_pelanggan($id_transaksi)
		);
		$html = $this->load->view('Pelanggan/vInvoice', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}

/* End of file cTransaksi.php */
