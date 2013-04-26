<?php $this->load->view('public/layouts/includes/head'); ?>
<body>
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
    <nav id="main">
        <div id="container">
                    <ul>
                        <li><a href="main.html">Main</a></li>
                        <li><a href="profile.html">My Profile</a></li>
                        <li><a href="blog-posts.html">Blogs</a></li>
                        <li><a href="groups.html">Groups</a></li>
                        <li><a href="photos.html">Photos</a></li>
                        <li><a href="members.html">Members</a></li>
                        <li><a href="games.html">Games</a></li>
                        <li><a href="events.html">Events</a></li>
                    </ul>
        </div><!--container end-->
    </nav>

    <div id="select-nav">
        <div id="container">
            <form>
                 <select ONCHANGE="location = this.options[this.selectedIndex].value;">
                    <option value="main.html">Main</option>
                    <option value="profile.html">Profile</option>
                    <option value="blog.html">Member Blogs</option>
                    <option value="groups.html">Groups</option>
                    <option value="photos.html">Photos</option>
                    <option value="members.html">Members</option>
                    <option value="games.html">Games</option>
                    <option value="events.html">Events</option>
                </select>
            </form>
        </div><!--container end-->
    </div><!--select nav end-->
        
    <div id="outside">
        <div id="container">
        	<?php if(isset($show_sidebar) && $show_sidebar == TRUE) : ?>
            	<div id="main-col">
            <?php else : ?>
            	<div id="main-col-100">
            <?php endif; ?>
            		<!--Display Main Content-->
					<?php $this->load->view($main_content); ?>
				</div><!--main-col end-->

<?php if(isset($show_sidebar) && $show_sidebar == TRUE) : ?>
<!--Sidebar-->
            <aside>
                <div id="notifications-box" class="side-module">
                    <h4>Your Notifications</h4>
                    <a class="noti-friend-requests" href="#">2 Friend Requests</a>
                    <a class="noti-messages" href="#">1 Message</a>
                </div><!--notifications end-->
				<div id="tasks" class="side-module">
					<h4>Profile Completeness</h4>
					<img src="images/bar20.jpg" alt="Profile Completeness" />
					<ul>
					<li class="done"><a href="#">Register</a></li>
					<li><a href="#">Upload a Profile Picture</a></li>
					<li><a href="#">Add Friends</a></li>
					<li><a href="#">Create an Image Gallery</a></li>
					<li><a href="#">About You Section</a></li>
					<li><a href="#">Create a Group</a></li>
					<li><a href="#">Start a Blog</a></li>
					</ul>
				</div><!--tasks end-->
                <div id="latest-members" class="side-module">
                    <div class="heading-left">
                        <h3>Latest Members</h3>
                    </div><!--heading-left-->
                    <div class="heading-line-45"></div><!--heading-line end-->
                    <div class="clr"></div>
                    <ul>
                        <li><a href="#"><img src="images/members/latest/1.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/2.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/3.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/4.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/5.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/6.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/7.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/8.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/9.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/10.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/11.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/12.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/13.jpg" alt="member" /></a></li>
                        <li><a href="#"><img src="images/members/latest/14.jpg" alt="member" /></a></li>
                    </ul>
                        <div class="clr"></div>
                <a class="view-all" href="#">View All Members</a>
                </div><!--members end-->
                <!--Latest Groups-->
                <div id="latest-groups" class="side-module">
                    <h3>Latest Groups</h3>
                    <div class="latest-group">
                        <h4 class="group-title"><a href="#">Boston Party Scene</a></h4>
                        <div class="group-intro">
                            Clubs, bars and events in the Boston area
                        </div><!--intro end-->
                        <div class="group-creator">
                            Created By: Johnny King
                        </div><!--creator end-->
                    </div><!--group end-->

                    <div class="latest-group">
                        <h4 class="group-title"><a href="#">Why Men Suck</a></h4>
                        <div class="group-intro">
                            My experience with men has been pretty bad
                        </div><!--intro end-->
                        <div class="group-creator">
                            Created By: Melissa Fargo
                        </div><!--creator end-->
                    </div><!--group end-->
                     <a class="view-all" href="#">View All Groups</a>
                </div><!--groups end-->
                <div class="clr"></div>

                <!--Search Members-->
                <div id="search-members" class="side-module">
                    <div class="heading-left">
                        <h3>Search Members</h3>
                         </div><!--heading-left-->
                    <div class="heading-line-45"></div><!--heading-line end-->
                    <div class="clr"></div>
                        <form>
                            <label>Gender:</label> <select name="gender">
                                <option value="0">Select</option>
                                <option value="m">Female</option>
                                <option value="f">Male</option>
                            </select><br />
                            <label>City: </label><input type="text" /><br />
                            <label>State:</label><select name="state">
    <option value="0">Select</option>
    <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="HI">Hawaii</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
    <option value="IA">Iowa</option>
    <option value="KS">Kansas</option>
    <option value="KY">Kentucky</option>
    <option value="LA">Louisiana</option>
    <option value="ME">Maine</option>
    <option value="MD">Maryland</option>
    <option value="MA">Massachusetts</option>
    <option value="MI">Michigan</option>
    <option value="MN">Minnesota</option>
    <option value="MS">Mississippi</option>
    <option value="MO">Missouri</option>
    <option value="MT">Montana</option>
    <option value="NE">Nebraska</option>
    <option value="NV">Nevada</option>
    <option value="NH">New Hampshire</option>
    <option value="NJ">New Jersey</option>
    <option value="NM">New Mexico</option>
    <option value="NY">New York</option>
    <option value="NC">North Carolina</option>
    <option value="ND">North Dakota</option>
    <option value="OH">Ohio</option>
    <option value="OK">Oklahoma</option>
    <option value="OR">Oregon</option>
    <option value="PA">Pennsylvania</option>
    <option value="RI">Rhode Island</option>
    <option value="SC">South Carolina</option>
    <option value="SD">South Dakota</option>
    <option value="TN">Tennessee</option>
    <option value="TX">Texas</option>
    <option value="UT">Utah</option>
    <option value="VT">Vermont</option>
    <option value="VA">Virginia</option>
    <option value="WA">Washington</option>
    <option value="WV">West Virginia</option>
    <option value="WI">Wisconsin</option>
    <option value="WY">Wyoming</option>
</select><br />
<input class="small-blue-btn" type="submit" value="Search" />
                        </form>
                </div><!--search members end-->

                <!--Ad-->
                <div id="side-adspot" class="side-module">
                    <img src="images/ad1.jpg" alt="ad" />
                </div><!--adspot end-->

                <!--Latest Posts-->
                <div id="latest-blog-posts" class="side-module">
                    <div class="heading-left">
                        <h3>Latest Blog Posts</h3>
                         </div><!--heading-left-->
                    <div class="heading-line-45"></div><!--heading-line end-->
                    <div class="clr"></div>
                    <div class="latest-blog-post">
                        <h4>Last Night Was Crazy</h4>
                        <a class="post-author" href="#">By: Sal Russo</a>
                        <div class="post-intro">
                            Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Nulla ut velit risus sit 
amet, consectetur 
                        </div><!--intro end-->
                        <a class="read-full" href="#">
                            Read Full Post
                        </a>
                    </div><!--latest blog post end-->
                    <div class="clr"></div>

                    <div class="latest-blog-post">
                        <h4>Why Men Suck</h4>
                        <a class="post-author" href="#">By: Beth Smith</a>
                        <div class="post-intro">
                            Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Nulla ut velit risus sit 
amet, consectetur 
                        </div><!--intro end-->
                        <a class="read-full" href="#">
                            Read Full Post
                        </a>
                    </div><!--latest blog post end-->
                    <div class="clr"></div>
                </div><!--latest blog posts end-->
            </aside><!--sidebar end-->
        <div class="clr"></div>
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