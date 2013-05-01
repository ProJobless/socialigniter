<script>
    var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
    var base_url = "<?php echo base_url(); ?>";
</script>
<div id="speakbox">
    <div class="heading-left">
         <h3>Speak Your Mind</h3>
    </div><!--heading-left end-->
    <div class="heading-line-65"></div><!--heading-line end-->
    <div class="clr"></div>
     <form action="<?php echo base_url(); ?>main/add_wall_post" class="speakbox" method="post">
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
            <?php foreach($profiles as $profile) : ?>
                <?php if($profile->user_id == $post->user_id) : ?>
                    <a href="#">
                        <div class="wall-image"><img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $profile->avatar; ?>" alt="member" /></div><!--wall-image-->
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
                            <?php foreach($profiles as $profile) : ?>
                                <?php if($profile->user_id == $comment->user_id) : ?>
                                    <div class="comment-image">
                                        <a href="#">
                                            <img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $profile->avatar; ?>" alt="member" />
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
               