<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form action="<?= base_url('Pelanggan/cLogin') ?>" method="POST">
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						LOGIN
					</h4>
					<?php if ($this->session->userdata('error')) {
					?>
						<div class="alert alert-danger" role="alert">
							<?= $this->session->userdata('error') ?>
						</div>
					<?php
					} ?>
					<?php
					if ($this->session->userdata('success')) {
					?>
						<div class="alert alert-success" role="alert">
							<?= $this->session->userdata('success') ?>
						</div>
					<?php
					}
					?>

					<?= form_error('username', '<small class="text-danger">', '</small>') ?>
					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Your Username">
						<img class="how-pos4 pointer-none" src="<?= base_url('asset/cozastore-master/') ?>images/icons/icon-email.png" alt="ICON">

					</div>
					<?= form_error('password', '<small class="text-danger">', '</small>') ?>
					<div class="bor8 m-b-30">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password">
					</div>
					<div class="m-b-30">
						Apakah Anda Belum Memiliki Akun? <a href="<?= base_url('Pelanggan/cLogin/register') ?>" class="text-info">Register Disini</a>
					</div>
					<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						Submit
					</button>

				</form>
			</div>


		</div>
	</div>
</section>