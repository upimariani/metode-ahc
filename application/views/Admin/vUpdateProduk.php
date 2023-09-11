<div class="container tm-mt-big tm-mb-big">
	<div class="row">
		<div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
			<div class="tm-bg-primary-dark tm-block tm-block-h-auto">
				<div class="row">
					<div class="col-12">
						<h2 class="tm-block-title d-inline-block">Update Produk</h2>
					</div>
				</div>
				<div class="row tm-edit-product-row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<?php echo form_open_multipart('Admin/cProduk/update/' . $produk->id_produk); ?>
						<div class="form-group mb-3">
							<label for="name">Nama produk
							</label>
							<input id="name" value="<?= $produk->nama_produk ?>" name="nama" type="text" class="form-control validate" />
							<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="form-group mb-3">
							<label for="description">Deskripsi</label>
							<input id="name" name="deskripsi" value="<?= $produk->deskripsi ?>" type="text" class="form-control validate" />
							<?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="form-group mb-3">
							<label for="description">Harga</label>
							<input id="name" name="harga" value="<?= $produk->harga ?>" type="text" class="form-control validate" />
							<?= form_error('harga', '<small class="text-danger">', '</small>') ?>
						</div>

						<div class="form-group mb-3">
							<label for="description">Stok</label>
							<input type="text" name="stok" value="<?= $produk->stok ?>" class="form-control validate" />
							<?= form_error('stok', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="form-group mb-3">
							<label for="description">Gambar</label><br>
							<img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $produk->gambar) ?>">
							<input type="file" name="gambar" class="form-control validate" />
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