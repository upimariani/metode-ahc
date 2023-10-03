<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1" style="background-image: url(<?= base_url('asset/4.png'); ?>">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Air Mineral
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								CV. Surya Nedika Isabella
							</h2>
						</div>

					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(<?= base_url('asset/5.png') ?>);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Air Mineral
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								CV. Surya Nedika Isabella
							</h2>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img style="width: 250px; height: 350px;" src="<?= base_url('asset/4.png') ?>" alt="IMG-BANNER">

					<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Efata
							</span>

							<span class="block1-info stext-102 trans-04">
								Spring 2018
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img style="width: 250px; height: 350px;" src="<?= base_url('asset/5.png') ?>" alt="IMG-BANNER">

					<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Asmi
							</span>

							<span class="block1-info stext-102 trans-04">
								Spring 2018
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img style="width: 250px; height: 350px;" src="<?= base_url('asset/6.png') ?>" alt="IMG-BANNER">

					<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Arta
							</span>

							<span class="block1-info stext-102 trans-04">
								New Trend
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5 mb-5">
				Product Overview
			</h3>
		</div>



		<div class="row isotope-grid">
			<?php
			foreach ($produk as $key => $value) {
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<form action="<?= base_url('Pelanggan/cHome/addtocart') ?>" method="POST">
						<input type="hidden" name="id" value="<?= $value->id_produk ?>">
						<input type="hidden" name="name" value="<?= $value->nama_produk ?>">

						<input type="hidden" name="qty" value="1">
						<input type="hidden" name="stok" value="<?= $value->stok ?>">
						<input type="hidden" name="picture" value="<?= $value->gambar ?>">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img style="width: 150px; height: 350px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="IMG-PRODUCT">
							</div>
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<p class="stext-110 cl4 trans-04 js-name-b2 p-b-6">
										<?= $value->nama_produk ?>
									</p>
									<small class="stext-90 cl4 trans-04 js-name-b2 p-b-6"><?= $value->deskripsi ?></small>
									<small class="stext-90 cl4 trans-04 js-name-b2 p-b-6">Stok : <?php if ($value->stok != '0') {
																									?>
											<span class="badge badge-success"><?= $value->stok ?></span>
										<?php
																									} else {
										?>
											<span class="badge badge-danger">Habis!</span>
										<?php
																									} ?></small>
									<span class="stext-105 cl3">
										<?php
										if ($value->member == $this->session->userdata('member') && $value->member != NULL) {
										?>
											Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga))  ?>
											<input type="hidden" name="price" value="<?= $value->harga - ($value->diskon / 100 * $value->harga) ?>">
										<?php
										} else {
										?>
											Rp. <?= number_format($value->harga)  ?>
											<input type="hidden" name="price" value="<?= $value->harga ?>">
										<?php
										}
										?>


										<?php
										if ($value->member == $this->session->userdata('member') && $value->member != NULL) {
										?>
											<del> Rp. <?= number_format($value->harga)  ?></del>
										<?php
										}
										?>
										<?php
										if ($this->session->userdata('id_pelanggan') != '' && $value->stok != '0') {
										?>
											<button type="submit" class="mt-3 flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
												Add To Cart
											</button>
										<?php
										}
										?>

									</span>

								</div>


							</div>
						</div>
					</form>
				</div>
			<?php
			}
			?>



		</div>


	</div>
</section>