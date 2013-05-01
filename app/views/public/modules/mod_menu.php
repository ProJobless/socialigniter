 <nav id="main">
        <div id="container">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>main">Main</a></li>
                        <li><a href="<?php echo base_url(); ?>profile">My Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>blog-posts">Blogs</a></li>
                        <li><a href="<?php echo base_url(); ?>groups">Groups</a></li>
                        <li><a href="<?php echo base_url(); ?>photos">Photos</a></li>
                        <li><a href="<?php echo base_url(); ?>members">Members</a></li>
                        <li><a href="<?php echo base_url(); ?>games">Games</a></li>
                        <li><a href="<?php echo base_url(); ?>events">Events</a></li>
                    </ul>
        </div><!--container end-->
    </nav>

    <div id="select-nav">
        <div id="container">
            <form>
                 <select ONCHANGE="location = this.options[this.selectedIndex].value;">
                    <option value="<?php echo base_url(); ?>main">Main</option>
                    <option value="<?php echo base_url(); ?>profile">Profile</option>
                    <option value="<?php echo base_url(); ?>blog">Member Blogs</option>
                    <option value="<?php echo base_url(); ?>groups">Groups</option>
                    <option value="<?php echo base_url(); ?>photos">Photos</option>
                    <option value="<?php echo base_url(); ?>members">Members</option>
                    <option value="<?php echo base_url(); ?>games">Games</option>
                    <option value="<?php echo base_url(); ?>events">Events</option>
                </select>
            </form>
        </div><!--container end-->
    </div><!--select nav end-->