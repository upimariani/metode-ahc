<div class="container mt-5">
	<div class="row tm-content-row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 tm-block-col">
			<div class="tm-bg-primary-dark tm-block">
				<h2 class="tm-block-title">Jumlah Pelanggan per Level Member </h2>
				<canvas id="barChart2"></canvas>
			</div>
		</div>
	</div>
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

					<table class="table table-hover tm-table-small tm-product-table">
						<thead>
							<tr>
								<th scope="col">&nbsp;</th>
								<th scope="col">Nama Produk</th>
								<th scope="col">Nama Diskon</th>
								<th scope="col">Tanggal Diskon</th>
								<th scope="col">Diskon</th>
								<th scope="col">Member</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($diskon as $key => $value) {
							?>
								<tr>
									<th scope="row"><input type="checkbox" /></th>
									<td class="tm-product-name"><?= $value->nama_produk ?></td>
									<td><?= $value->nama_diskon ?></td>
									<td><?= $value->tgl_diskon ?></td>
									<td><?= $value->diskon ?> %</td>
									<td><?php if ($value->member == '1') {
										?>
											<span class="badge badge-success">Supestar</span>
										<?php
										} else if ($value->member == '2') {
										?>
											<span class="badge badge-warning">Golden </span>
										<?php
										} else if ($value->member == '3') {
										?>
											<span class="badge badge-danger">Occasional</span>
										<?php
										} else if ($value->member == '4') {
										?>
											<span class="badge badge-info">Everyday</span>
										<?php
										} else if ($value->member == '5') {
										?>
											<span class="badge badge-primary">Dormant </span>
										<?php
										}
										?>

									</td>
									<td>
										<a href="<?= base_url('Marketing/cDiskon/delete/' . $value->id_diskon) ?>" class="tm-product-delete-link">
											<i class="far fa-trash-alt tm-product-delete-icon"></i>
										</a>
										<a href="<?= base_url('Marketing/cDiskon/update/' . $value->id_diskon) ?>" class="tm-product-delete-link">
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
				<!-- table container -->
				<a href="<?= base_url('Marketing/cDiskon/create') ?>" class="btn btn-primary btn-block text-uppercase mb-3">Add new discount</a>

			</div>
		</div>
		<canvas id="lineChart"></canvas>
		<canvas id="pieChart" class="chartjs-render-monitor" width="200" height="10"></canvas>
		<canvas id="barChart"></canvas>
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