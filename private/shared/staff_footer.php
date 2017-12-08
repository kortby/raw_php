<footer class="container">
			<div class="text-right">
				<p>&copy; <?php echo date('Y') ?> | MBank</p>
			</div>
	</footer>
	<script src="<?php echo url_for('js/jquery-3.2.1.slim.min.js'); ?>"></script>
	<script src="<?php echo url_for('js/popper.min.js'); ?>"></script>
	<script src="<?php echo url_for('js/bootstrap.min.js'); ?>"></script>
</body>
</html>
<?php db_disconnect($db); ?>