<?php $this->load->view('public/layouts/includes/head'); ?>
<body>
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
        <?php $this->load->view('public/modules/mod_menu'); ?>
    <div id="outside">
        <div id="container">

        	<?php if(@$mod_right == 1): ?>
            	<div id="main-col">
            <?php else : ?>
            	<div id="main-col-100">
            <?php endif; ?>
            		<!--Display Main Content-->
					<?php $this->load->view($main_content); ?>
				</div><!--main-col end-->
               <?php if(@$mod_right == 1): ?>
                    <!--Right Modules-->
                    <?php $this->load->view('public/modules/positions/right'); ?>
                <?php endif; ?>
        </div><!--container end-->
    </div><!--outside end-->
        <footer>
            <div id="container">
            <div id="footer-left">
                <nav>
                    <ul>
                        <li><a href="main.html">Main</a></li>
                        <li><a href="blog-posts.html">Blogs</a></li>
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
        </footer>
</body>
</html>