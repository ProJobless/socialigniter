<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Welcome to Social Igniter!</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/register.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/site.js"></script>
</head>
<body id="landing">
    <header>
        <div id="container">
            <div id="logo">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="socialIGNITER" />
            </div><!--logo end-->
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
            </div><!--login end-->
        </div><!--container end-->
    </header>
    <div class="clr"></div>
    <div id="welcome-image-wrap">
        <div id="container">
            <div id="welcome-text">
                <h1>Meet New People & Share New Ideas</h1>
                <h3>Network with other people with similar goals<br /> and open up a new world of possibilities!</h3>
            </div><!--welcome-text end-->
           <div id="welcome-form">
            <h1 class="gray">Join Free!</h1>
            <p>Start Meeting New People Now</p>
                <?php echo form_open('user/register/1'); ?>
                    <?php echo form_hidden('register_id', $randomcode); ?>

                    <?php echo form_label('First Name', 'first_name'); ?>
                    <?php echo form_input('first_name'); ?>
                    <br />
                    <?php echo form_label('Last Name', 'last_name'); ?>
                    <?php echo form_input('last_name'); ?>
                    <br />
                    <?php echo form_label('Gender', 'gender:'); ?>
                    <?php echo form_radio('gender', 'male'); ?> Male
                    <?php echo form_radio('gender', 'female'); ?> Female
                    <br />
                    <?php echo form_label('Date of Birth:', 'birthdate'); ?>
                    <?php echo form_date('birthdate'); ?>
                    <br />
                    <?php echo form_label('Zipcode:', 'zipcode'); ?>
                    <?php echo form_input('zipcode'); ?>
                    <br />
                    <?php echo form_label('Email:', 'email'); ?>
                    <?php echo form_email('email'); ?>
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
        </div><!--container end-->
        <div class="clr"></div>
        </div><!--container end-->
        <footer>
            <div id="container">
            <div id="footer-left">
                <nav>
                    <ul>
                        <li><a href="#">Main</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Groups</a></li>
                        <li><a href="#">Photos</a></li>
                        <li><a href="#">Members</a></li>
                        <li><a href="#">Terms</a></li>
                    </ul>
                </nav>
            </div><!--footer left end-->
            <div id="footer-right">
               <p> Copyright &copy; 2013, Social Igniter</p>
            </div><!--footer right end-->
            </div><!--welcome-image-wrap end-->
        </footer>
</body>
</html>