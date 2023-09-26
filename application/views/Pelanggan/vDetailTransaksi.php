<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Detail Pesanan Saya
		</span>
	</div>

	<?php
	if ($this->session->userdata('success')) {
	?>
		<div class="alert alert-success" role="alert">
			<?= $this->session->userdata('success') ?>
		</div>
	<?php
	}
	?>
</div>


<!-- Shoping Cart -->
<div class="container">
	<div class="row">
		<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
			<div class="m-l-25 m-r--38 m-lr-0-xl">
				<div class="wrap-table-shopping-cart">
					<table class="table-shopping-cart">
						<tr class="table_head">
							<th class="column-1">Product</th>
							<th class="column-2"></th>
							<th class="column-3">Price</th>
							<th class="column-4">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
						<?php
						foreach ($transaksi['detail_transaksi'] as $key => $value) {
						?>
							<tr class="table_row">
								<td class="column-1">
									<div>
										<img style="width: 50px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="IMG">
									</div>
								</td>
								<td class="column-2"><?= $value->nama_produk ?></td>
								<td class="column-3">Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga))  ?></td>
								<td class="column-4">
									<?= $value->qty ?>
								</td>
								<td class="column-5">Rp. <?= number_format(($value->harga - ($value->diskon / 100 * $value->harga)) * $value->qty)  ?></td>
							</tr>
						<?php
						}
						?>
					</table>
				</div>

				<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
					<a href="<?= base_url('Pelanggan/cTransaksi') ?>" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
						Kembali
					</a>
					<?php
					if ($transaksi['transaksi']->isi_penilaian == null && $transaksi['transaksi']->stat_transaksi == '4') {
					?>
						<form action="<?= base_url('Pelanggan/cTransaksi/penilaian/' . $transaksi['transaksi']->id_transaksi) ?>" method="POST">
							<div class="bor8 m-b-30">
								<h3>Tuliskan Penilaian Anda...</h3>
								<textarea rows="7" class="form-control" name="penilaian" required></textarea>
								<button type="submit" class="btn btn-success mt-3">Kirim</button>
							</div>
						</form>
					<?php
					}
					?>
				</div>

			</div>
		</div>

		<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
			<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
				<h4 class="mtext-109 cl2 p-b-30">
					Pembayaran
				</h4>

				<div class="flex-w flex-t bor12 p-b-13">
					<div class="size-208">
						<span class="stext-110 cl2">
							Total:
						</span>
					</div>

					<div class="size-209">
						<span class="mtext-110 cl2">
							Rp. <?= number_format($transaksi['transaksi']->tot_transaksi + $transaksi['transaksi']->ongkir) ?>
						</span>
					</div>
				</div>

				<div class="flex-w flex-t bor12 p-t-15 p-b-30">
					<div class="size-208 w-full-ssm">
						<span class="stext-110 cl2">
							Bukti Payment :
						</span>
					</div>

					<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
						<?php
						if ($transaksi['transaksi']->stat_pembayaran == '1') {
						?>
							<img class="mb-5" style="width: 150px;" src="<?= base_url('asset/pembayaran/' . $transaksi['transaksi']->bukti_pembayaran) ?>"><br>
						<?php
						} else {
						?>
							<?php echo form_open_multipart('Pelanggan/cTransaksi/bayar/' . $transaksi['transaksi']->id_transaksi); ?>
							<div class="p-t-15">
								<small>Bank BRI<br>
									A.n. CV. Surya Nedika Isabella<br>
									No. Rekening. 01190-009278-19-02
								</small>
							</div>


							<div class="bor8 m-b-30">
								<input type="file" class="stext-111 cl2 plh3 size-70 p-lr-28 p-tb-5" name="gambar" required>

							</div>
							<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Kirim
							</button>
							</form>
						<?php
						}
						?>


					</div>

				</div>
				<?php
				if ($transaksi['transaksi']->stat_transaksi == '3') {
				?>
					<a href="<?= base_url('Pelanggan/cTransaksi/pesanan_diterima/' . $transaksi['transaksi']->id_transaksi) ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Pesanan Telah Diterima
					</a>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>