<div id="login-page">
	<h1>Login</h1>
	<p>Use this form to log in</p>
<?php echo form_open('user/login'); ?>
	<?php echo form_label('Email Address'); ?>
	<?php echo form_input('email','Email Address'); ?><br /><br />
	<?php echo form_label('Password'); ?>
	<?php echo form_password('password','Password'); ?><br />
	<?php
	$data = array(
			'name' => 'login-submit',
			'value' => 'Login',
			'class' => 'med-blue-btn'
		);
	?>
	<br />
	<?php echo form_submit($data); ?>
<?php echo form_close(); ?>
</div><!--login page end-->