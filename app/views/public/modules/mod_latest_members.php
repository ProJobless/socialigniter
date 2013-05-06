<div id="latest-members">
                    <ul>
                        <?php $latest_users = get_latest_users(); ?>
                        <?php foreach($latest_users as $latest_user) : ?>
                             <li><a href="<?php echo base_url(); ?>profile/view/<?php echo $latest_user->nickname; ?>"><img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $latest_user->avatar; ?>" alt="member" /></a></li>
                        <?php endforeach; ?>
                        
                    </ul>
                        <div class="clr"></div>
                <a class="view-all" href="#">View All Members</a>
                </div><!--members end-->