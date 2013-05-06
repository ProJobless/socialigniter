 <!--Profile <!--Top-->
                <div id="profile-top">
                    <div class="top-left">
                        <img class="border" width="235" src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $user_fields->avatar; ?>" alt="Member" />
                    </div><!--top-left-->
                    <div class="top-right">
                        <div class="profile-social">
                        	<?php if(!empty($profile_fields->facebook)) : ?>
                            	<a href="<?php echo prep_url($profile_fields->facebook); ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/facebook.png" alt="Facebook" /></a> &nbsp;
                            <?php endif; ?>
                            <?php if(!empty($profile_fields->twitter)) : ?>
                            	<a href="<?php echo prep_url('http://www.twitter.com/'.$profile_fields->twitter); ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/twitter.png" alt="Twitter" /></a> &nbsp;
                            <?php endif; ?>
                            <!--<a href="#" target="_blank"><img src="<?php echo base_url(); ?>assets/images/google.png" alt="Google" /></a> &nbsp;-->
                        </div><!--social end-->
                        <h2><?php echo $user_fields->first_name . ' ' . $user_fields->last_name; ?></h2>
                        <div class="online-status">
                            <?php echo $status; ?>
                        </div><!--online status end-->
                        <ul>
                            <li><strong>Lives In:</strong> <?php echo $profile_fields->where_live; ?></li>
                            <li><strong>Is From:</strong> <?php echo $profile_fields->where_from; ?></li>
                            <li><strong>Age: </strong><?php echo get_age($user_fields->birthdate); ?></li>
                            <li><strong>Relationship Status:</strong> <?php echo $profile_fields->relationship_status; ?></li>
                        </ul>
                        <a href="<?php echo base_url(); ?>message/send/<?php echo $user_fields->id; ?>" id="send-message">
                            Send Message
                        </a>
                    </div><!--top-right-->
                    <div class="clr"></div>
                </div><!--profile-top end-->

                <div id="profile-mid">
                    
                    <div class="clr"></div>
                    <div id="tabs">
                        <a class="tab1" href="#">Latest Posts</a> 
                        <a class="tab2" href="#">About <?php echo $user_fields->first_name; ?></a>
                    </div><!--tabs-border-->
                    <div class="clr"></div>
                    <!--Profile Blog Area-->
                    <div id="profile-blog">
                        <!--Blog Post-->
                        <div class="profile-blog-post">
                            <h3><a href="#">Hello Social Igniter!</a></h3>
                            <div class="date">
                                Written on: March 12, 2013
                            </div><!--date end-->
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut velit risus, eget blandit lacus. 
Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas
adipiscing elit.
                            <a href="#" class="read-more">
                                Read More
                            </a>
                        </div><!--blog post end-->

                        <div class="profile-blog-post">
                            <h3><a href="#">This Is Another Post</a></h3>
                            <div class="date">
                                Written on: March 16, 2013
                            </div><!--date end-->
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut velit risus, eget blandit lacus. 
Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas
adipiscing elit.
                            <a href="#" class="read-more">
                                Read More
                            </a>
                        </div><!--blog post end-->
                    </div><!--blog end-->


                    <div id="profile-about">
                        <br />
                        <div class="about-me">
                            <h3>About Me</h3>
                             <?php if(!empty($profile_fields->about_me)): ?><?php echo $profile_fields->about_me; ?><?php endif; ?>
                         </div><!--about me end-->
                        <br />
                        <div class="member-info">
                            <h3>More About Me</h3>
                            <ul>
                               <?php if(!empty($profile_fields->music)): ?> <li><strong>Favorite Music:</strong> <?php echo $profile_fields->music; ?></li><?php endif; ?>
                               <?php if(!empty($profile_fields->movies)): ?> <li><strong>Favorite Movies: </strong><?php echo $profile_fields->movies; ?></li><?php endif; ?>
                               <?php if(!empty($profile_fields->occupation)): ?> <li><strong>Occupation:</strong> <?php echo $profile_fields->occupation; ?></li><?php endif; ?>
                            </ul>
                        </div><!--member-info end-->
                        <br />
                        <div class="contact-info">
                            <h3>Contact Info</h3>
                            <ul>
                               <?php if(!empty($profile_fields->website)): ?> <li><strong>Website: </strong><a href="<?php echo $profile_fields->website; ?>"><?php echo $profile_fields->website; ?></a></li><?php endif; ?>
                                <?php if(!empty($user_fields->email)): ?><li><strong>Email: </strong><a href="#"><?php echo $user_fields->email; ?></a></li><?php endif; ?>
                                <?php if(!empty($profile_fields->mobile_phone)): ?><li><strong>Mobile Phone: </strong><?php echo $profile_fields->mobile_phone; ?></li><?php endif; ?>
                                <?php if(!empty($profile_fields->facebook)): ?><li><strong>Facebook: </strong><a href="<?php echo prep_url($profile_fields->facebook); ?>" target="_blank"><?php echo $profile_fields->facebook; ?></a></li><?php endif; ?>
                                <?php if(!empty($profile_fields->twitter)): ?><li><strong>Twitter: </strong><a href="https://www.twitter.com/<?php echo $profile_fields->twitter; ?>">https://www.twitter.com/<?php echo $profile_fields->twitter; ?></a></li><?php endif; ?>
                               <!-- <li><strong>Google+: </strong><a href="#">https://www.googleplus.com/lauren-smith</a></li>-->
                            </ul>
                        </div><!--contact-info end-->
                        <br />
                    </div><!--profile-about end-->

                </div><!--profile-mid end-->
                <br />

                <!--Speakbox-->
                <div id="speakbox">
    <div class="heading-left">
         <h3>Speak Your Mind</h3>
    </div><!--heading-left end-->
    <div class="heading-line-65"></div><!--heading-line end-->
    <div class="clr"></div>
     <form action="<?php echo base_url(); ?>main/add_wall_post/<?php echo $user_fields->id; ?>" class="speakbox" method="post">
         <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
         <textarea name="post_body" id="speakbox"></textarea>
         <br>
         <input id="speaksubmit" class="med-blue-btn postit" type="submit" value="Post It">
    </form>
</div><!--speakbox end-->
<div class="clr"></div>
<!--Wall-->
<div id="wall">
    <?php foreach($wall_posts as $post) : ?>
        <!--Wall Post-->
        <div class="wall-post">
            <img class="post-arrow" src="<?php echo base_url(); ?>assets/images/post_arrow.png" />
            <?php foreach($users as $user) : ?>
                <?php if($user->id == $post->user_id) : ?>
                    <a href="#">
                        <div class="wall-image"><img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $user->avatar; ?>" alt="member" /></div><!--wall-image-->
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="wall-content">
                <h5><a href="#"><?php echo $post->first_name . ' ' . $post->last_name; ?></a> Says:</h5>
                <p><?php echo $post->body; ?></p>
            </div><!--wall-content end-->
            <div class="clr"></div>
            <!--Like Box-->
            <div class="like-this">
                <?php echo $post->likes; ?> People like this | 
                <a href="#" class="like-link">Like</a>
            </div><!--like-this end-->
            <!--Comments-->
            <div class="wall-comments">
                <?php foreach($wall_post_comments as $comment) : ?>
                    <?php if($comment->post_id == $post->id) : ?>
                        <div class="wall-comment">
                            <?php foreach($users as $user) : ?>
                                <?php if($user->id == $comment->user_id) : ?>
                                    <div class="comment-image">
                                        <a href="#">
                                            <img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $user->avatar; ?>" alt="member" />
                                        </a>
                                    </div><!--comment-image end-->
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="comment-content">
                                <?php echo $comment->comment_body; ?> <span class="comment-name"> <a href="#"> - <?php echo $comment->first_name . ' ' .$comment->last_name; ?></a></span>
                            </div><!--comment-content end-->
                        </div><!--wall-comment end-->
                        <div class="clr"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <!--Comment Form-->
                <div class="comment-form">
                    <form action="<?php base_url(); ?>main/add_wall_post_comment" method="post" id="form-<?php echo $post->id; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
                        <input type="hidden" name="post_id" value="<?php echo $post->id; ?>" />
                        <input type="text" name="comment_body" />
                        <input type="submit" name="submit-<?php echo $post->id; ?>" class="small-blue-btn" value="Post" />
                    </form>
                </div><!--comment form end-->
                </div><!--wall comments end-->
                </div><!--wall post end-->
                <div class="clr"></div>
            
                <?php endforeach; ?>
                <a id="show-more-posts" href="#">
                    Show More Posts
                </a>
</div><!--wall end-->

                    <div class="clr"></div>