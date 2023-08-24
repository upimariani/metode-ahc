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
							<h3>Detail History Pelanggan</h3>
							<?php
							$pelanggan = $this->db->query("SELECT * FROM `pelanggan` WHERE id_pelanggan='" . $id . "'")->row();
							?>
							<p>Nama Pelanggan : <?= $pelanggan->nama_pelanggan ?></p>
						</div>
					</div>
				</div>
				<div class="tm-product-table-container">
					<table class="table table-hover tm-table-small tm-product-table">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal Transaksi</th>
								<th>Pengiriman</th>
								<th>Status Transaksi</th>
								<th>Total Transaksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$total = 0;
							foreach ($detail_history as $key => $value) {
								$total += $value->tot_transaksi;
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->tgl_transaksi	 ?></td>
									<td><?= $value->pengiriman ?></td>
									<td><?php if ($value->stat_transaksi == '0') {
										?>
											<span class="badge badge-danger">Belum Bayar</span>
										<?php
										} else if ($value->stat_transaksi == '1') {
										?>
											<span class="badge badge-warning">Menunggu Konfirmasi </span>
										<?php
										} else if ($value->stat_transaksi == '2') {
										?>
											<span class="badge badge-info">Pesanan Diproses </span>
										<?php
										} else if ($value->stat_transaksi == '3') {
										?>
											<span class="badge badge-primary">Pesanan Dikirim </span>
										<?php
										} else {
										?>
											<span class="badge badge-success">Selesai </span>
										<?php
										}
										?>
									</td>
									<td>Rp. <?= number_format($value->tot_transaksi) ?></td>
								</tr>
							<?php
							}
							?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td>Total: </td>
								<td>Rp. <?= number_format($total)  ?></td>
							</tr>
						</tbody>
					</table>
					<a href="<?= base_url('Admin/cHistoryPelanggan') ?>" class="btn btn-danger mt-3">Kembali</a>
					<button onclick="window.print()" class="btn btn-warning mt-3">Print</button>
				</div>
				<!-- table container -->
			</div>
		</div>
	</div>
</div>