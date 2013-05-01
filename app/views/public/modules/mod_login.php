<?php if($this->session->userdata('logged_in') != true) : ?>
  <div id="login">
 <?php echo form_open('user/login'); ?>
                    <?php
                        $data = array(
                            'name'        => 'email',
                            'value'       => 'Enter Email Address',
                            'id'          => 'login-email',
                            'maxlength'   => '100',
                            'onFocus'     => 'clearText(this)',
                            'onBlur'      => 'learText(this)'
                        );
                    ?>
                    <?php echo form_email($data); ?>

                     <?php
                        $data = array(
                            'name'        => 'password',
                            'value'       => 'Enter Password',
                            'id'          => 'login-password',
                            'maxlength'   => '100',
                            'onFocus'     => 'setBoxToPasswordmode(this)',
                            'onBlur'      => 'resetBox(this)'
                        );
                    ?>
                    <?php echo form_input($data); ?>

                    <?php
                    $data = array(
                        'name'        => 'submit',
                        'class'       => 'small-blue-btn',
                        'value'       => 'Login'
                        );
                    ?>
                    <?php echo form_submit($data); ?>
                    <div class="clr"></div>
                    <div id="login-links">

                        <a href="#">Lost Password?</a>
                        &nbsp;&nbsp; | &nbsp;&nbsp; Remember Me? &nbsp;
                        <input type="checkbox" value="remember" />
                    </div><!--login-links end-->
                <?php echo form_close(); ?>
</div>
<?php else : ?>
    <?php $user_id = $this->session->userdata('user_id'); //make user id a string ?>
    <?php $user_nickname = $this->session->userdata('nickname'); //make user nickname a string ?>
     <div id="logout">
        <div class="logout-left">
                    Welcome, <?php echo $this->session->userdata('first_name'); ?><br />
                    <a class="edit-profile" href="<?php echo base_url(); ?>profile/edit/<?php echo $user_nickname; ?>">Edit Profile</a>
                </div><!--logout-left end-->
                <div class="logout-mid">
                    <img class="logout-image" src="<?php echo base_url(); ?>assets/images/avatars/<?php echo user_avatar($user_id); ?>" alt="Member" />
                </div><!--logout-left end-->
                <div class="logout-right">
 <?php echo form_open('user/logout'); ?>
                    <?php
                    $data = array(
                        'name'        => 'submit',
                        'class'       => 'small-blue-btn',
                        'value'       => 'Logout'
                        );
                    ?>
                    <?php echo form_submit($data); ?>
                </div>
                    <div class="clr"></div>
                <?php echo form_close(); ?>
</div>
<?php endif; ?>