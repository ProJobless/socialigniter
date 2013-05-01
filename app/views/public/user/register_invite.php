<?php if($this->session->flashdata('images_folder')) : ?>
    <?php echo '<p class="error">' .$this->session->flashdata('images_folder') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('images_avatars_folder')) : ?>
    <?php echo '<p class="error">' .$this->session->flashdata('images_avatars_folder') . '</p>'; ?>
<?php endif; ?>
<h2>Invite Friends</h2>
<p>Invite all of your friends to Social Igniter. Send invites to Gmail contacts, Facebook friends and Yahoo contacts.</p>
<a class="skip" href="<?php echo base_url(); ?>register_activation">Skip For Now</a>