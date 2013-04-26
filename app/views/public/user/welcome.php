<!--Display Errors-->
<?php echo validation_errors('<p class="error">'); ?>
            <div id="welcome-text">
                <h1>Meet New People & Share New Ideas</h1>
                <h3>Network with other people with similar goals<br /> and open up a new world of possibilities!</h3>
            </div><!--welcome-text end-->
           <div id="welcome-form">
                <h1 class="gray">Join Free!</h1>
                <p>Start Meeting New People Now</p>
                <?php echo form_open(base_url()); ?>
                    <?php echo form_hidden('reg_id', $randomcode); ?>
                    <?php echo form_label('First Name', 'first_name'); ?>
                    <?php echo form_input('first_name',set_value('first_name')); ?>
                    <br />
                    <?php echo form_label('Last Name', 'last_name'); ?>
                    <?php echo form_input('last_name',set_value('last_name')); ?>
                    <br />
                    <?php echo form_label('Gender', 'gender:'); ?>
                    <?php echo form_radio('gender', 'male'); ?> Male
                    <?php echo form_radio('gender', 'female'); ?> Female
                    <br />
                    <?php echo form_label('Date of Birth:', 'birthdate'); ?>
                    <?php echo form_date('birthdate'); ?>
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
                    <br />
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