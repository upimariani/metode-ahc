<div class="container mt-5">
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

					<table id="myTable" class="table table-hover tm-table-small tm-product-table">
						<thead>
							<tr>
								<th scope="col">&nbsp;</th>
								<th scope="col">Nama Pelanggan</th>
								<th scope="col">Alamat</th>
								<th scope="col">Recency</th>
								<th scope="col">Frequecy</th>
								<th scope="col">Monetary</th>
								<th scope="col">Status Member</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($history as $key => $value) {
								if ($value->level_member == $status) {

							?>
									<tr>
										<th scope="row"><input type="checkbox" /></th>
										<td class="tm-product-name"><?= $value->nama_pelanggan ?></td>
										<td><?= $value->alamat ?></td>


										<td>
											<?php
											if ($value->recency <= '30') {
												echo '4';
												// echo $vr[$i];
											} else if ($value->recency >= '60' || $value->recency <= '90') {
												echo '3';
												// echo $vr[$i];
											} else if ($recency[$i] >= '120' || $recency[$i] <= '150') {
												echo '2';
												// echo $vr[$i];
											} else if ($recency[$i] > '150') {
												echo '1';
												// echo $vr[$i];
											}
											?>
										</td>
										<td><?php if ($value->frequency > '10') {
												echo  '4';
											} else if ($value->frequency >= '7' && $value->frequency <= '9') {
												echo  '3';
											} else if ($value->frequency >= '4' && $value->frequency <= '6') {
												echo  '2';
											} else if ($value->frequency < '4') {
												echo  '1';
											} ?></td>
										<td><?php if ($value->monetary > '100000000') {
												echo '4';
											} else if ($value->monetary >= '50000000' && $value->monetary <= '100000000') {
												echo '3';
											} else if ($value->monetary >= '5000000' && $value->monetary <= '50000000') {
												echo '2';
											} else if ($value->monetary < '50000000') {
												echo '1';
											} ?></td>
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
							}
							?>

						</tbody>
					</table>
				</div>

			</div>
		</div>

	</div>
</div>