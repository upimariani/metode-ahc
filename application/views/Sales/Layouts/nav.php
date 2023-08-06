<body id="reportsPage">
	<nav class="navbar navbar-expand-xl">
		<div class="container h-100">
			<a class="navbar-brand" href="index.html">
				<h1 class="tm-site-title mb-0">Sales</h1>
			</a>
			<button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars tm-nav-icon"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">


				<ul class="navbar-nav mx-auto h-100">
					<?php
					if ($this->session->userdata('id') != '') {
					?>
						<li class="nav-item">
							<a class="nav-link <?php if ($this->uri->segment(1) == 'Sales' && $this->uri->segment(2) == 'cDashboard') {
													echo 'active';
												}  ?>" href="<?= base_url('Sales/cDashboard') ?>">
								<i class="fas fa-tachometer-alt"></i> Dashboard
								<span class="sr-only">(current)</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link <?php if ($this->uri->segment(1) == 'Sales' && $this->uri->segment(2) == 'cTransaksi') {
													echo 'active';
												}  ?>" href="<?= base_url('Sales/cTransaksi') ?>">
								<i class="fas fa-shopping-cart"></i> Transaksi Pelanggan
							</a>
						</li>



					<?php
					}
					?>
				</ul>

				<ul class="navbar-nav">
					<li class="nav-item">
						<?php
						if ($this->session->userdata('id') != '') {
						?>
							<a class="nav-link d-block" href="<?= base_url('Admin/cLogin/logout') ?>">
								Admin, <b>Logout</b>
							</a>
						<?php
						} else {
						?>
							<a class="nav-link d-block" href="<?= base_url('Admin/cLogin') ?>">
								Admin, <b>Login</b>
							</a>
						<?php
						}
						?>

					</li>
				</ul>
			</div>
		</div>
	</nav>