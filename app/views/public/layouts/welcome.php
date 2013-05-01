<?php $this->load->view('public/layouts/includes/head'); ?>
<body id="landing">
    <header>
        <div id="container">
            <div id="logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="socialIGNITER" /></a>
            </div><!--logo end-->
            <!--Header Right Modules-->
            <?php $this->load->view('public/modules/positions/header_right'); ?>
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