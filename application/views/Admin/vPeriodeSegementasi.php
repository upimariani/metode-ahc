<div class="container mt-5">
	<div class="row tm-content-row">
		<div class="col-sm-6 col-md-12 col-lg-6 tm-block-col">
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
					<table class="table table-hover ">
						<thead>
							<tr>
								<th scope="col">&nbsp;</th>
								<th scope="col">Periode Analisis</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td>2022</td>
								<td><a href="<?= base_url('Admin/cLaporanSegmentasi/detail_segemntasi/1') ?>" class="btn btn-primary">Detail Analisis</a></td>
							</tr>
							<tr>
								<td>2.</td>
								<td>2023</td>
								<td><a href="<?= base_url('Admin/cLaporanSegmentasi/detail_segemntasi/2') ?>" class="btn btn-primary">Detail Analisis</a></td>
							</tr>


						</tbody>
					</table>
				</div>

			</div>
		</div>

	</div>
</div>