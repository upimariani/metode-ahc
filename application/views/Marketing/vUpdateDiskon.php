<div class="container tm-mt-big tm-mb-big">
	<div class="row">
		<div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
			<div class="tm-bg-primary-dark tm-block tm-block-h-auto">
				<div class="row">
					<div class="col-12">
						<h2 class="tm-block-title d-inline-block">Add Discount</h2>
					</div>
				</div>
				<div class="row tm-edit-product-row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<form action="<?= base_url('Marketing/cDiskon/update/' . $produk->id_produk) ?>" method="POST" class="tm-edit-product-form">
							<div class="form-group mb-3">
								<label for="category">Nama Produk</label>
								<select class="custom-select tm-select-accounts" name="nama" id="category">
									<option value="" selected>Pilih Nama produk</option>
									<?php
									foreach ($data_produk as $key => $value) {
										if ($value->id_diskon == NULL) {
									?>
											<option value="<?= $value->id_produk ?>" <?php if ($value->id_produk == $produk->id_produk) {
																							echo 'selected';
																						} ?>><?= $value->nama_produk ?></option>
									<?php
										}
									}
									?>

								</select>
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="description">Tanggal Diskon</label>
								<input name="tgl" value="<?= $produk->tgl_diskon ?>" type="date" class="form-control validate" />
								<?= form_error('tgl', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="description">Nama Diskon</label>
								<input id="name" name="nama_diskon" value="<?= $produk->nama_diskon ?>" type="text" class="form-control validate" />
								<?= form_error('nama_diskon', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="description">Besar Diskon</label>
								<input id="name" name="besar" value="<?= $produk->diskon ?>" type="number" class="form-control validate" />
								<?= form_error('besar', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="category">Member</label>
								<select class="custom-select tm-select-accounts" name="member" id="category">
									<option value="" selected>Pilih Member</option>
									<option value="1" <?php if ($produk->member == '1') {
															echo 'selected';
														} ?>>Supestar</option>
									<option value="2" <?php if ($produk->member == '2') {
															echo 'selected';
														} ?>>Golden</option>
									<option value="3" <?php if ($produk->member == '3') {
															echo 'selected';
														} ?>>Occasional</option>
									<option value="4" <?php if ($produk->member == '4') {
															echo 'selected';
														} ?>>Everyday</option>
									<option value="5" <?php if ($produk->member == '5') {
															echo 'selected';
														} ?>>Dormant</option>
								</select>
								<?= form_error('member', '<small class="text-danger">', '</small>') ?>
							</div>

					</div>

					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block text-uppercase">Save</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>