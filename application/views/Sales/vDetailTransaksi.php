<div class="container mt-5">
	<div class="row tm-content-row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
			<div class="tm-bg-primary-dark tm-block tm-block-products">
				<?php
				if ($this->session->userdata('success')) {
				?>
					<div class="alert alert-success" role="alert">
						<?= $this->session->userdata('success') ?>
					</div>
				<?php
				}
				?>
				<div class="row">
					<div class="col-lg-6">
						<div class="text-light">
							<h3>Detail Transaksi</h3>
							<p>Tanggal Transaksi : <?= $transaksi['transaksi']->tgl_transaksi ?></p>
							<p>Atas Nama : <?= $transaksi['transaksi']->nama_pelanggan ?></p>
							<p>Subtotal : <strong> Rp. <?= number_format($transaksi['transaksi']->tot_transaksi)  ?></strong></p>
							<p>Ongkos Kirim : <strong> Rp. <?= number_format($transaksi['transaksi']->ongkir)  ?></strong></p>
							<h4 class="text-info">Total Pembayaran : <strong> Rp. <?= number_format($transaksi['transaksi']->ongkir + $transaksi['transaksi']->tot_transaksi)  ?></strong></h4>
							<p>Alamat Pengiriman : <strong><?= $transaksi['transaksi']->pengiriman ?></strong></p>
						</div>
					</div>
					<?php
					if ($transaksi['transaksi']->bukti_pembayaran != '0') {
					?>
						<div class="col-lg-6">
							<div class="text-light mb-3">
								<h4>Bukti Pembayaran</h4>
								<img style="width: 150px;" src="<?= base_url('asset/pembayaran/' . $transaksi['transaksi']->bukti_pembayaran) ?>">
							</div>
						</div>
					<?php
					}
					?>

				</div>


				<div class="tm-product-table-container">

					<table class="table table-hover tm-table-small tm-product-table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($transaksi['detail_transaksi'] as $key => $value) {
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->nama_produk	 ?></td>

									<td>Rp. <?= number_format($value->harga) ?></td>
									<td><?= $value->qty ?></td>*******************************************

									<td>Rp. <?= number_format($value->harga * $value->qty) ?></td>


								</tr>
							<?php
							}
							?>

						</tbody>
					</table>
					<?php
					if ($transaksi['transaksi']->level_member == 2) {
					?>
						<p class="text-light mt-2">*Catatan: <span class="badge badge-warning">Pelanggan ini berhak mendapatkan bonus 2 dus air mineral merk asmi ukuran 240 ml</span></p>

					<?php
					}
					?>
					<?php
					if ($transaksi['transaksi']->level_member == 3) {
					?>
						<p class="text-light mt-2">*Catatan: <span class="badge badge-success">Pelanggan ini berhak mendapatkan bonus 1 dus air mineral merk asmi ukuran 240 ml</span></p>

					<?php
					}
					?>
					<a href="<?= base_url('Sales/cTransaksi') ?>" class="btn btn-danger mt-3">Kembali</a>
					<?php
					if ($transaksi['transaksi']->stat_transaksi == '1') {
					?>
						<a href="<?= base_url('Sales/cTransaksi/konfirmasi/' . $transaksi['transaksi']->id_transaksi) ?>" class="btn btn-info mt-3">Konfirmasi Pembayaran</a>
					<?php
					} else if ($transaksi['transaksi']->stat_transaksi == '2') {
					?>
						<a href="<?= base_url('Sales/cTransaksi/dikirim/' . $transaksi['transaksi']->id_transaksi) ?>" class="btn btn-success mt-3">Pesanan Dikirim</a>
					<?php
					}
					?>


					<button onclick="window.print()" class="btn btn-warning mt-3">Print</button>
				</div>
				<!-- table container -->

			</div>
		</div>

	</div>
</div>
