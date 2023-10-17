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
						<form action="<?= base_url('Marketing/cDiskon/create') ?>" method="POST" class="tm-edit-product-form">
							<div class="form-group mb-3">
								<label for="category">Nama Produk</label>
								<select class="custom-select tm-select-accounts" name="nama" id="category">
									<option value="" selected>Pilih Nama Produk</option>
									<?php
									foreach ($produk as $key => $value) {
										if ($value->id_diskon == NULL) {
									?>
											<option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
									<?php
										}
									}
									?>

								</select>
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>

							<div class="form-group mb-3">
								<label for="description">Nama Diskon</label>
								<input id="name" name="nama_diskon" type="text" class="form-control validate" />
								<?= form_error('nama_diskon', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="description">Besar Diskon</label>
								<input id="name" name="besar" type="number" class="form-control validate" />
								<?= form_error('besar', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="category">Member</label>
								<select class="custom-select tm-select-accounts" name="member" id="category">
									<option value="" selected>Pilih Member</option>
									<option value="1">Supestar</option>
									<option value="2">Golden</option>
									<option value="3">Occasional</option>
									<option value="4">Everyday</option>
									<option value="5">Dormant</option>
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