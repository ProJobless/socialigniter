<h2>Activation</h2>
<?php if (isset($error)) : ?>
	 	<p class="error_big"><?php echo $error; ?></p>
	 <?php endif; ?>

<?php if (isset($success)) : ?>
	 	<p class="success_big"><?php echo $success; ?></p>
<?php endif; ?>