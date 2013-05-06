 <div id="single-blog-post">
                        <h3><a href="blog-post.html"><?php echo $post->title; ?></a></h3>
                        <a class="post-author" href="<?php echo base_url(); ?>profile/view/<?php echo $post->nickname; ?>">By: <?php echo $post->first_name .' '.$post->last_name; ?></a>
                        <div class="post-date">Created On: <?php echo date('F j, Y', strtotime($post->create_date));?></div>
                        <div class="avatar-image"><a href="<?php echo base_url(); ?>profile/view/<?php echo $post->nickname; ?>"><img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $post->avatar; ?>" /></a></div>
                        <div class="post-body">
                            <?php echo $post->body; ?>
                        </div><!--bodyend-->
                        <br />
                        <!--TURN ON WHEN WE GO LIVE
                        <div class='shareaholic-canvas' data-shareaholic-widgets='share_buttons'></div>
                        -->

                        <!--Comment Form-->
                        <div id="comment-form">
                <?php echo form_open('blogs/add_comment/'.$post->post_id); ?>
                    <h3>Leave A Comment</h3>
                    <?php if($this->session->flashdata('comment_added')) : ?>
                        <?php echo '<p class="success">' .$this->session->flashdata('comment_added') . '</p>'; ?>
                    <?php endif; ?>
                    <?php $logged_in = $this->session->userdata('logged_in'); ?>
                     <?php echo form_label('Name', 'name'); ?><br />
                    <?php if(empty($logged_in)) : ?>
                        <?php echo form_input('name',set_value('name')); ?>
                    <?php else: ?>
                        <?php echo form_input('name',$this->session->userdata('first_name').' '. $this->session->userdata('last_name')); ?>
                    <?php endif; ?>
                     <br />
                    <?php echo form_label('Email', 'email'); ?><br />
                    <?php echo form_email('email',set_value('email')); ?>
                    <br />
                   
                    <?php echo form_label('Website', 'website'); ?><br />
                   <?php echo form_input('website',set_value('website')); ?>   
                    <br />
                    <?php echo form_label('Comment', 'comment'); ?><br />
                    <?php echo form_textarea('comment',set_value('comment')); ?>
                  <br />
                  <div class="clr"></div>
                    <?php
                    $data = array(
                        'name'        => 'submit',
                        'class'       => 'med-blue-btn',
                        'value'       => 'Submit'
                        );
                    ?>
                    <?php echo form_submit($data); ?>
             <?php echo form_close(); ?>
                        </div>
                        
                        <!--Comments-->
                        <div id="comments">
                            <h3>Comments</h3>
                        <?php if(!empty($comments)) : ?>
                             <?php foreach($comments as $comment) : ?>
                            <?php if(empty($comment->user_id)): ?>
                                <?php $avatar = 'no-avatar.jpg'; ?>
                            <?php else : ?>
                                <?php $avatar = $comment->avatar; ?>
                            <?php endif; ?>
                            <div class="comment">
                                <img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $avatar; ?>" alt="member" />
                                <div class="comment-right">
                                    <p class="name"><?php echo $comment->name; ?> Says:</p>
                                     <?php echo $comment->comment; ?>
                                </div><!--comment right end-->
                            </div><!--comment end-->
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>There are no comments for this post yet</p>
                        <?php endif; ?>
                       
                        </div><!--comments end-->
                </div><!--blog-post end-->