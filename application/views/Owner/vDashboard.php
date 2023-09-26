<div class="container">
	<div class="row">
		<div class="col">
			<p class="text-white mt-5 mb-5">Welcome back, <b>Owner</b></p>
		</div>
	</div>
	<!-- row -->
	<div class="row tm-content-row">
		<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
			<div class="tm-bg-primary-dark tm-block">
				<h2 class="tm-block-title">History Penjualan Per Hari</h2>
				<canvas id="lineChart"></canvas>
			</div>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
			<div class="tm-bg-primary-dark tm-block">
				<h2 class="tm-block-title">Penjualan Produk</h2>
				<canvas id="barChart"></canvas>
			</div>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
			<div class="tm-bg-primary-dark tm-block">
				<h2 class="tm-block-title">Member Pelanggan</h2>
				<canvas id="barChart2"></canvas>
			</div>
		</div>
		<canvas id="pieChart" class="chartjs-render-monitor" width="200" height="10"></canvas>
		<div class="col-lg-12">
			<div class="tm-product-table-container">

				<table id="myTable" class="table table-hover tm-table-small tm-product-table">
					<thead>
						<tr>
							<th scope="col">&nbsp;</th>
							<th scope="col">Nama Pelanggan</th>
							<th scope="col">Alamat</th>

							<th scope="col">Status Member</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($history as $key => $value) {
						?>
							<tr>
								<th scope="row"><input type="checkbox" /></th>
								<td class="tm-product-name"><?= $value->nama_pelanggan ?></td>
								<td><?= $value->alamat ?></td>

								<td><?php if ($value->level_member == '1' || $value->level_member == '0') {
									?>
										<span class="badge badge-danger">Superstar</span>
									<?php
									} else if ($value->level_member == '2') {
									?>
										<span class="badge badge-success">Golden Customer </span>
									<?php
									} else if ($value->level_member == '3') {
									?>
										<span class="badge badge-warning">Occasional Customer </span>
									<?php
									} else if ($value->level_member == '4') {
									?>
										<span class="badge badge-info">Everyday Shopper </span>
									<?php
									} else if ($value->level_member == '5') {
									?>
										<span class="badge badge-primary">Dormant Customer </span>
									<?php
									}
									?>


								</td>
								<td>
									<a href="<?= base_url('Admin/cHistoryPelanggan/detail_history/' . $value->id_pelanggan) ?>" class="tm-product-delete-link">
										<i class="far fa-edit tm-product-delete-icon"></i>
									</a>

								</td>
							</tr>
						<?php
						}
						?>

					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>
<footer class="tm-footer row tm-mt-small">
	<div class="col-12 font-weight-light">
		<p class="text-center text-white mb-0 px-4 small">
			CV. Surya Nedika Isabella
		</p>
	</div>
</footer>

<script src="<?= base_url('asset/product-admin-master/') ?>js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="<?= base_url('asset/product-admin-master/') ?>js/moment.min.js"></script>
<!-- https://momentjs.com/ -->
<script src="<?= base_url('asset/product-admin-master/') ?>js/Chart.min.js"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="<?= base_url('asset/product-admin-master/') ?>js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script src="<?= base_url('asset/product-admin-master/') ?>js/tooplate-scripts.js"></script>
<link href="<?= base_url('asset/') ?>DataTables/datatables.min.css" rel="stylesheet">

<script src="<?= base_url('asset/') ?>DataTables/datatables.min.js"></script>
<script>
	$('#myTable').DataTable({
		select: true
	});
</script>
<script>
	Chart.defaults.global.defaultFontColor = 'white';
	let ctxLine,
		ctxBar,
		ctxPie,
		optionsLine,
		optionsBar,
		optionsPie,
		configLine,
		configBar,
		configPie,
		lineChart;
	barChart, pieChart;
	// DOM is ready
	$(function() {
		if ($("#lineChart").length) {
			ctxLine = document.getElementById("lineChart").getContext("2d");
			optionsLine = {
				scales: {
					yAxes: [{
						scaleLabel: {
							display: true,
							labelString: "Jumlah Transaksi"
						}
					}]
				}
			};
			<?php
			$data_transaksi = $this->db->query("SELECT SUM(tot_transaksi) as tot_transaksi, tgl_transaksi FROM `transaksi` GROUP BY tgl_transaksi")->result();
			foreach ($data_transaksi as $key => $value) {
				$total[] = $value->tot_transaksi;
				$tgl[] = $value->tgl_transaksi;
			}

			?>
			// Set aspect ratio based on window width***
			optionsLine.maintainAspectRatio =
				$(window).width() < width_threshold ? false : true;

			configLine = {
				type: "line",
				data: {
					labels: <?= json_encode($tgl) ?>,
					datasets: [{
							label: "Pendapatan Penjualan Per Hari",
							data: <?= json_encode($total) ?>,
							fill: false,
							borderColor: "rgb(75, 192, 192)",
							cubicInterpolationMode: "monotone",
							pointRadius: 0
						}

					]
				},
				options: optionsLine
			};

			lineChart = new Chart(ctxLine, configLine);
		}
		if ($("#barChart").length) {
			ctxBar = document.getElementById("barChart").getContext("2d");

			optionsBar = {
				responsive: true,
				scales: {
					yAxes: [{
						barPercentage: 0.2,
						ticks: {
							beginAtZero: true
						},
						scaleLabel: {
							display: true,
							labelString: "Produk"
						}
					}]
				}
			};

			optionsBar.maintainAspectRatio =
				$(window).width() < width_threshold ? false : true;

			/**
			 * COLOR CODES
			 * Red: #F7604D
			 * Aqua: #4ED6B8
			 * Green: #A8D582
			 * Yellow: #D7D768
			 * Purple: #9D66CC
			 * Orange: #DB9C3F
			 * Blue: #3889FC
			 */
			<?php
			$data_produk = $this->db->query("SELECT SUM(qty) as qty, nama_produk FROM `detail_transaksi` JOIN produk ON detail_transaksi.id_produk=produk.id_produk GROUP BY produk.id_produk")->result();
			foreach ($data_produk as $key => $value) {
				$qty[] = $value->qty;
				$produk[] = $value->nama_produk;
			}
			?>
			configBar = {
				type: "horizontalBar",
				data: {
					labels: <?= json_encode($produk) ?>,
					datasets: [{
						label: "Jumlah Terjual",
						data: <?= json_encode($qty) ?>,
						backgroundColor: [
							"#F7604D",
							"#4ED6B8",
							"#A8D582",
							"#D7D768",
							"#9D66CC",
							"#DB9C3F",
							"#3889FC"
						],
						borderWidth: 0
					}]
				},
				options: optionsBar
			};

			barChart = new Chart(ctxBar, configBar);
		}
		// drawPieChart(); // Pie Chart
		if ($("#barChart2").length) {
			ctxBar = document.getElementById("barChart2").getContext("2d");

			optionsBar = {
				responsive: true,
				scales: {
					yAxes: [{
						barPercentage: 0.2,
						ticks: {
							beginAtZero: true
						},
						scaleLabel: {
							display: true,
							labelString: "Level Member"
						}
					}]
				}
			};

			optionsBar.maintainAspectRatio =
				$(window).width() < width_threshold ? false : true;

			/**
			 * COLOR CODES
			 * Red: #F7604D
			 * Aqua: #4ED6B8
			 * Green: #A8D582
			 * Yellow: #D7D768
			 * Purple: #9D66CC
			 * Orange: #DB9C3F
			 * Blue: #3889FC
			 */
			<?php
			$data_pelanggan = $this->db->query("SELECT COUNT(id_pelanggan) as jml_member, level_member FROM `pelanggan` GROUP BY level_member")->result();
			foreach ($data_pelanggan as $key => $value) {
				if ($value->level_member == '1' || $value->level_member == '0') {
					$status[] =	'Superstar';
				} else if ($value->level_member == '2') {

					$status[] = 'Golden Customer';
				} else if ($value->level_member == '3') {

					$status[] = 'Occasional Customer';
				} else if ($value->level_member == '4') {

					$status[] = 'Everyday Shopper';
				} else if ($value->level_member == '5') {

					$status[] = 'Dormant Customer';
				}

				$jumlah_level[] = $value->jml_member;
			}
			?>
			configBar = {
				type: "horizontalBar",
				data: {
					labels: <?= json_encode($status) ?>,
					datasets: [{
						label: "Jumlah Level Member",
						data: <?= json_encode($jumlah_level) ?>,
						backgroundColor: [
							"#F7604D",
							"#4ED6B8",
							"#A8D582",
							"#D7D768",
							"#9D66CC",
							"#DB9C3F",
							"#3889FC"
						],
						borderWidth: 0
					}]
				},
				options: optionsBar
			};

			barChart = new Chart(ctxBar, configBar);
		}
		$(window).resize(function() {
			updateLineChart();
			updateBarChart();
		});
	})
</script>


</body>

</html>