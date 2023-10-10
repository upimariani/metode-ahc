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

				<div class="tm-product-table-container">

					<table id="myTable" class="table table-hover tm-table-small tm-product-table">
						<thead>
							<tr>
								<th scope="col">&nbsp;</th>
								<th scope="col">Transaksi Atas Nama</th>
								<th scope="col">Tanggal Transaksi</th>
								<th scope="col">Total Transaksi</th>
								<th scope="col">Status Transaksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($transaksi as $key => $value) {
							?>
								<tr>
									<th scope="row"><input type="checkbox" /></th>
									<td class="tm-product-name"><?= $value->nama_pelanggan ?></td>
									<td><?= $value->tgl_transaksi ?></td>
									<td>Rp. <?= number_format($value->tot_transaksi)  ?></td>
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
								</tr>
							<?php
							}
							?>

						</tbody>
					</table>
				</div>
				<!-- table container -->
				<form action="<?= base_url('Owner/cTransaksi/cetak') ?>" method="POST">
					<div class="row">

						<div class="col-lg-6">
							<select class="custom-select tm-select-accounts" name="bulan" required>
								<option value="">---Pilih Bulan Penjualan---</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="col-lg-6">
							<select class="custom-select tm-select-accounts" name="tahun" required>
								<option value="">---Pilih Tahun Penjualan---</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
							</select>
						</div>

						<button type="submit" class="btn btn-primary btn-block text-uppercase mt-3">Cetak Laporan</button>
				</form>
			</div>



		</div>
	</div>

</div>
</div>