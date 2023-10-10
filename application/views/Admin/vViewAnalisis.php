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

				<div style="color: white;" class="tm-product-table-container">
					<table id="myTable" class="table table-hover tm-table-small tm-product-table">
						<thead>
							<tr>
								<th scope="col">Id Pelanggan</th>
								<th scope="col">Recency</th>
								<th scope="col">Frequency</th>
								<th scope="col">Monetary</th>
								<th scope="col">Nilai Euclidean</th>
								<th scope="col">Cluster</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$nama = array();
							$recency = array();
							$frequency = array();
							$monetary = array();
							$data_variabel = $this->mAnalisis->data_variabel();
							foreach ($data_variabel as $key => $value) {
								$member_level[] = $value->level_member;
								$nama[] = $value->id_pelanggan;
								$recency[] = $value->recency;
								$frequency[] = $value->frequency;
								$monetary[] = $value->monetary;
							}

							$vr = array();
							$vf = array();
							$vm = array();
							$d = array();
							for ($i = 0; $i < sizeof($nama); $i++) {
								// echo '| ' . $nama[$i];
								// echo '| ' . $recency[$i];
								// echo '| ' . $frequency[$i];
								// echo '| ' . $monetary[$i];


								if ($recency[$i] <= '30') {
									$vr[] = '4';
									// echo $vr[$i];
								} else if ($recency[$i] >= '60' || $recency[$i] <= '90') {
									$vr[] = '3';
									// echo $vr[$i];
								} else if ($recency[$i] >= '120' || $recency[$i] <= '150') {
									$vr[] = '2';
									// echo $vr[$i];
								} else if ($recency[$i] > '150') {
									$vr[] = '1';
									// echo $vr[$i];
								}

								if ($frequency[$i] > '10') {
									$vf[] = '4';
								} else if ($frequency[$i] >= '7' && $frequency[$i] <= '9') {
									$vf[] = '3';
								} else if ($frequency[$i] >= '4' && $frequency[$i] <= '6') {
									$vf[] = '2';
								} else if ($frequency[$i] < '4') {
									$vf[] = '1';
								}

								if ($monetary[$i] > '100000000') {
									$vm[] = '4';
								} else if ($monetary[$i] >= '50000000' && $monetary[$i] <= '100000000') {
									$vm[] = '3';
								} else if ($monetary[$i] >= '5000000' && $monetary[$i] <= '50000000') {
									$vm[] = '2';
								} else if ($monetary[$i] < '50000000') {
									$vm[] = '1';
								}
							}

							$no = 1;
							$nod = array();
							for ($j = 1; $j <= sizeof($vr); $j++) {
								for ($k = 1; $k <= sizeof($vf); $k++) {
									// echo $no++;
									// echo '| B000' . $j . ' | B000' . $k;
									// echo '<br>';
									// echo $vr[$j - 1] . '|' . $vr[$k - 1] . ' + ' . $vf[$j - 1] . '|' . $vf[$k - 1] . ' + ' . $vm[$j - 1] . ' | ' . $vm[$k - 1];
									// echo '<br>';
									//perhitungan rumus euclidean
									$d[] = round(sqrt(pow($vr[$j - 1] - $vr[$k - 1], 2) + pow($vf[$j - 1] - $vf[$k - 1], 2) + pow($vm[$j - 1] - $vm[$k - 1], 2)), 2);
									$nod[] = $j;
									$nod1[] = $k;
								}
							}

							$matriks = array();
							for ($p = 0; $p < sizeof($nod); $p++) {

								// echo $nod[$p] . ' | ';
								// echo $d[$p];

								$matriks[] = array('queue1' => $nod[$p], 'queue2' => $nod1[$p], 'nilai' => $d[$p]);

								// echo '<br>';
							}



							for ($a = 0; $a < sizeof($matriks); $a++) {
								$queue[$a] = $matriks[$a]['queue1'];
								$nilai[$a] = $matriks[$a]['nilai'];
							}
							$queue = array_column($matriks, 'queue1');
							$nilai = array_column($matriks, 'nilai');
							array_multisort($nilai, SORT_ASC, $matriks);

							$member = array();
							for ($z = 0; $z < sizeof($matriks); $z++) {
								if ($matriks[$z]['queue1'] == '1') {
									if ($matriks[$z]['nilai'] <= '1') {
										// echo 'Member 1 : ';
										// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
										// echo '<br>';
										$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '1');
									} else if ($matriks[$z]['nilai'] < 2) {
										// echo 'Member 2 :';
										// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
										// echo '<br>';
										$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '2');
									} else if ($matriks[$z]['nilai'] < 3) {
										// echo 'Member 3: ';
										// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
										// echo '<br>';
										$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '3');
									} else if ($matriks[$z]['nilai'] < 4) {
										// echo 'Member 4: ';
										// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
										// echo '<br>';
										$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '4');
									} else {
										// echo 'Member 5: ';
										// echo $matriks[$z]['queue1'] . ' ' . $matriks[$z]['queue2'] . ' ' . $matriks[$z]['nilai'];
										// echo '<br>';
										$member[] = array('karyawan' => $matriks[$z]['queue2'], 'member' => '5');
									}
								}
							}
							?>
							<?php
							for ($i = 0; $i < sizeof($nama); $i++) {
							?>
								<tr>
									<td><?= $nama[$i] ?></td>
									<td><?= $recency[$i] ?><br> Bobot Variabel: <?= $vr[$i] ?></td>
									<td><?= $frequency[$i] ?><br> Bobot Variabel: <?= $vf[$i] ?></td>
									<td>Rp. <?= number_format($monetary[$i]) ?> <br>Bobot Variabel: <?= $vm[$i] ?></td>
									<td><?= $d[$i] ?></td>
									<td><?= $member_level[$i] ?></td>
								</tr>

							<?php
							}
							?>

						</tbody>
					</table>

				</div>

			</div>
		</div>

	</div>
</div>