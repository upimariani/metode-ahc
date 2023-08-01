<div class="container tm-mt-big tm-mb-big">
	<div class="row">
		<div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
			<div class="tm-bg-primary-dark tm-block tm-block-h-auto">
				<div class="row">
					<div class="col-12">
						<h2 class="tm-block-title d-inline-block">Update User</h2>
					</div>
				</div>
				<div class="row tm-edit-product-row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<form action="<?= base_url('Admin/cUser/update/' . $user->id_user) ?>" method="POST" class="tm-edit-product-form">
							<div class="form-group mb-3">
								<label for="name">Nama User
								</label>
								<input id="name" name="nama" value="<?= $user->nama_user ?>" type="text" class="form-control validate" />
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="description">Alamat</label>
								<input id="name" name="alamat" value="<?= $user->alamat ?>" type="text" class="form-control validate" />
								<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="description">No Telepon</label>
								<input id="name" name="no_hp" value="<?= $user->no_hp ?>" type="text" class="form-control validate" />
								<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="description">Username</label>
								<input id="name" name="username" value="<?= $user->username ?>" type="text" class="form-control validate" />
								<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="description">Password</label>
								<input id="name" name="password" value="<?= $user->password ?>" type="text" class="form-control validate" />
								<?= form_error('password', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group mb-3">
								<label for="category">Level User</label>
								<select class="custom-select tm-select-accounts" name="level_user" id="category">
									<option value="" selected>Pilih Level User</option>
									<option value="1" <?php if ($user->level_user == '1') {
															echo 'selected';
														} ?>>Admin</option>
									<option value="2" <?php if ($user->level_user == '2') {
															echo 'selected';
														} ?>>Owner</option>
									<option value="3" <?php if ($user->level_user == '3') {
															echo 'selected';
														} ?>>Sales</option>
									<option value="4" <?php if ($user->level_user == '4') {
															echo 'selected';
														} ?>>Marketing</option>
								</select>
								<?= form_error('level_user', '<small class="text-danger">', '</small>') ?>
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