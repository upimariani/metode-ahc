<body id="reportsPage">
	<nav class="navbar navbar-expand-xl">
		<div class="container h-100">
			<a class="navbar-brand" href="index.html">
				<?php
				if ($this->session->userdata('id') != '') {
				?>
					<h1 class="tm-site-title mb-0">Admin</h1>
				<?php
				} else {
				?>
					<h1 class="tm-site-title mb-0">User</h1>
				<?php
				}
				?>

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
							<a class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDashboard') {
													echo 'active';
												}  ?>" href="<?= base_url('Admin/cDashboard') ?>">
								<i class="fas fa-tachometer-alt"></i> Dashboard
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cProduk') {
													echo 'active';
												}  ?>" href="<?= base_url('Admin/cProduk') ?>">
								<i class="fas fa-tag"></i> Produk
							</a>
						</li>


						<li class="nav-item">
							<a class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cUser') {
													echo 'active';
												}  ?>" href="<?= base_url('Admin/cUser') ?>">
								<i class=" fas fa-user-shield"></i> User
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cHistoryPelanggan') {
													echo 'active';
												}  ?>" href="<?= base_url('Admin/cHistoryPelanggan') ?>">
								<i class=" fas fa-users"></i> History Pelanggan
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
								<b>Login</b>
							</a>
						<?php
						}
						?>

					</li>
				</ul>
			</div>
		</div>
	</nav>
