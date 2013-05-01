<?php $reg_id = $this->input->get('reg_id'); ?>
<?php $avatar_name = $this->session->flashdata('avatar_name'); ?>

<div id="register-avatar">
	<?php if($this->session->flashdata('avatar_errors')) : ?>
    <?php echo $this->session->flashdata('avatar_errors'); ?>
<?php endif; ?>
	<!--Upload Form-->
	<?php echo form_open_multipart('user/upload_avatar'); ?>
	<div class="avatar-left">
		<h2>Upload an Avatar</h2>
		<p>Add a profile picture of yourself</p>
		<p>Browse for a picture on your computer</p>
		<?php echo form_hidden('reg_id', $reg_id); ?>
		<?php
			$data = array(
				'name' => 'userfile',
				'id'   => 'avatar-btn',
				'size' => 20
			);
		?>
		<?php echo form_upload($data); ?>
		<input name="submit-avatar" class="submit-avatar" type="submit" value="Upload Image" />
		<?php echo form_close(); ?>
	</div><!--avatar-left end-->
	<div class="avatar-mid">
		<?php if($avatar_name) : ?>
    		<img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $avatar_name; ?>" width="173" alt="Avatar" />
		<?php else : ?>
			<img src="<?php echo base_url(); ?>assets/images/avatars/no-avatar.jpg" alt="Avatar" width="173" />
		<?php endif; ?>
		
	</div><!--avatar-mid end-->

	<div class="avatar-right">
		<img src="<?php echo base_url(); ?>assets/images/avatar-page.jpg" alt="Avatars" />
	</div><!--avatar-right end-->
	<div class="clr"></div>

	<!--Regular Form-->
	<?php echo form_open('register_avatar'); ?>
	<?php echo form_hidden('reg_id', $reg_id); ?>
	<?php echo form_hidden('avatar_name', $avatar_name); ?>
	<div id="avatar-submit-btn">
	<input name="submit-next" class="med-blue-btn" type="submit" value="Next" />
</div>
	<?php echo form_close(); ?>

</div><!--avatar reg end-->