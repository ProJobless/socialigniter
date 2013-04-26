<?php $this->load->view('public/layouts/includes/head'); ?>
<body id="landing">
    <header>
        <div id="container">
            <div id="logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="socialIGNITER" /></a>
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
            <!--Display Main Content-->
			<?php $this->load->view($main_content); ?>
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