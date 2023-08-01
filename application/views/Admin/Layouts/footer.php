<footer class="tm-footer row tm-mt-small">
	<div class="col-12 font-weight-light">
		<p class="text-center text-white mb-0 px-4 small">
			CV. Surya Nedika Isabella
		</p>
	</div>
</footer>

<script src="<?= base_url('asset/product-admin-master/') ?>js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="<?= base_url('asset/product-admin-master/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/product-admin-master/') ?>js/moment.min.js"></script>
<script src="<?= base_url('asset/chart/js_chart.js') ?>"></script>
<!-- https://getbootstrap.com/ -->
<script>
	$(function() {
		$(".tm-product-name").on("click", function() {
			window.location.href = "edit-product.html";
		});
	});
</script>

</body>

</html>