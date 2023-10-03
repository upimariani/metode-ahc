<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Invoice Pelanggan</title>
	<link rel="stylesheet" href="<?= base_url('asset/invoice/') ?>style.css" media="all" />
</head>

<body>
	<header class="clearfix">

		<h1>INVOICE CV. Surya Nedika Isabella</h1>

		<div id="project">
			<div><span>Nama </span> <?= $transaksi['transaksi']->nama_pelanggan ?></div>
			<div><span>Alamat</span> <?= $transaksi['transaksi']->alamat ?></div>
			<div><span>DATE</span> <?= $transaksi['transaksi']->tgl_transaksi ?></div>
		</div>
	</header>
	<main>
		<table>
			<thead>
				<tr>
					<th class="column-1">Product</th>
					<th class="column-2"></th>
					<th class="column-3">Price</th>
					<th class="column-4">Quantity</th>
					<th class="column-5">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($transaksi['detail_transaksi'] as $key => $value) {
				?>
					<tr class="table_row">
						<td class="column-1">
							<div>
								<img style="width: 40px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="IMG">
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

				<tr>
					<td colspan="4">SUBTOTAL</td>
					<td class="total">Rp. <?= number_format($transaksi['transaksi']->tot_transaksi) ?></td>
				</tr>
				<tr>
					<td colspan="4">ONGKIR</td>
					<td class="total">Rp. <?= number_format($transaksi['transaksi']->ongkir) ?></td>
				</tr>
				<tr>
					<td colspan="4" class="grand total">GRAND TOTAL</td>
					<td class="grand total">Rp. <?= number_format($transaksi['transaksi']->tot_transaksi + $transaksi['transaksi']->ongkir) ?></td>
				</tr>
			</tbody>
		</table>
		<div id="notices">
			<div>NOTICE:</div>
			<div class="notice"><a href="<?= base_url('Pelanggan/cTransaksi/download_invoice/' . $transaksi['transaksi']->id_transaksi) ?>" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
					Download Invoice
				</a></div>
		</div>
	</main>

</body>

</html>