<?php $this->load->view('public/layouts/includes/head'); ?>
<body id="main">
    <header>
        <div id="container">
            <div id="logo">
                 <a href="<?php echo base_url(); ?>"<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="socialIGNITER" /></a>
            </div><!--logo end-->
            <div id="login">
                <form>
                    <input type="text" value="Email Address">
                    <input type="password" value="Password">
                    <input class="small-blue-btn" type="submit" value="Login">
                    <div class="clr"></div>
                    <div id="login-links">
                        <a href="#">Create Account</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#">Lost Password?</a>
                        &nbsp;&nbsp; <span>| &nbsp;&nbsp; Remember Me? &nbsp;
                        <input type="checkbox" value="remember" /></span>
                    </div><!--login-links end-->
                </form>
            </div><!--login end-->
        </div><!--container end-->
    </header>
    <div class="clr"></div>
    <div id="outside">
        <div id="container">
            <div id="main-col-100">
               <!--Display Main Content-->
               <?php $this->load->view($main_content); ?>
            </div><!--main-col-100 end-->
        <div class="clr"></div>
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