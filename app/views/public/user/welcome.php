<div id="welcome-page">
<!--Display Errors-->
<?php if (validation_errors()) : ?>
<div id="errors">
<?php echo validation_errors('<p class="error">'); ?>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('access_denied')) : ?>
    <?php echo '<p class="error-right">' .$this->session->flashdata('access_denied') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('no_register')) : ?>
    <?php echo '<p class="error">' .$this->session->flashdata('no_register') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('fail_login')) : ?>
    <?php echo '<p class="error-right">' .$this->session->flashdata('fail_login') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('logged_out')) : ?>
    <?php echo '<p class="success-right">' .$this->session->flashdata('logged_out') . '</p>'; ?>
<?php endif; ?>
            <div id="welcome-text">
                <h1>Meet New People & Share New Ideas</h1>
                <h3>Network with other people with similar goals<br /> and open up a new world of possibilities!</h3>
            </div><!--welcome-text end-->
           <div id="welcome-form">
                <h1 class="gray">Join Free!</h1>
                <p>Start Meeting New People Now</p>
                <?php echo form_open(base_url()); ?>
                    <?php echo form_label('First Name', 'first_name'); ?>
                    <?php echo form_input('first_name',set_value('first_name')); ?>
                    <br />
                    <?php echo form_label('Last Name', 'last_name'); ?>
                    <?php echo form_input('last_name',set_value('last_name')); ?>
                    <br />
                     <?php 
                     $data = array(
                        'name'        => 'nickname',
                        'class'       => 'light-value',
                        'value'       => '...used in profile link',
                        'onFocus'     => 'clearText(this)',
                        'onBlur'      => 'learText(this)'
                        );
                    ?>
                    <?php echo form_label('Nickname', 'nickname'); ?>
                    <?php echo form_input($data); ?> <a href="#" title="This will be used as your profile id">[?]</a>
                    <br />
                    <?php echo form_label('Gender', 'gender:'); ?>
                    <?php echo form_radio('gender', 'male'); ?> Male
                    <?php echo form_radio('gender', 'female'); ?> Female
                    <br />
                    <?php echo form_label('Date of Birth:', 'birthdate'); ?>
                    <?php echo form_date('birthdate'); ?> <a href="#" title="You must be atleast 13 to register">[?]</a>
                    <br />
                    <?php echo form_label('Zipcode:', 'zipcode'); ?>
                    <?php echo form_input('zipcode',set_value('zipcode')); ?>
                    <br />
                    <?php echo form_label('Email:', 'email'); ?>
                    <?php echo form_email('email',set_value('email')); ?>
                    <br />
                    <?php echo form_label('Password', 'password'); ?>
                    <?php echo form_password('password'); ?>
                    <br />
                    <?php echo form_label('Confirm', 'password2'); ?>
                    <?php echo form_password('password2'); ?>
                  
                    <?php
                    $data = array(
                        'name'        => 'submit',
                        'class'       => 'big-blue-btn',
                        'value'       => 'Sign Up'
                        );
                    ?>
                    <?php echo form_submit($data); ?>
                <?php echo form_close(); ?>

           </div><!--welcome-form end-->
       </div><!--welcome page end-->