<div id="blog-posts">
<h2>Member Blog Posts</h2>
<a id="create-blog-post" class="main-button" href="<?php echo base_url(); ?>blogs/new_post">Create A Blog Post</a>
<br />
<div class="clr"></div>
<?php if(empty($posts)) : ?>
    There are no posts in this category
<?php endif; ?>
<?php foreach($posts as $post) : ?>
    <div id="blog-post">
        <h3><a href="<?php echo base_url(); ?>blogs/post/<?php echo $post->post_id; ?>"><?php echo $post->title; ?></a></h3>
        <a class="post-author" href="<?php echo base_url(); ?>profile/view/<?php echo $post->nickname; ?>">By: <?php echo $post->first_name . ' ' . $post->last_name; ?></a>
    <div class="post-date"><?php echo date('F j, Y', strtotime($post->create_date));?></div>
        <div class="author-image"><a href="<?php echo base_url(); ?>profile/view/<?php echo $post->nickname; ?>"><img src="<?php echo base_url(); ?>assets/images/avatars/<?php echo $post->avatar; ?>" alt="author image" /></a></div>
<div class="post-intro">
<?php if(!empty($post->main_image)) : ?>
    <img class="main-image border" src="<?php echo base_url(); ?>assets/images/blog/<?php echo $post->main_image; ?>" alt="blog image" />
<?php endif; ?>
<?php echo $post->body; ?>
</div><!--intro end-->
<a class="read-full" href="<?php echo base_url(); ?>blogs/post/<?php echo $post->post_id; ?>">
    Read Full Post
</a>
</div><!--blog post end-->
<?php endforeach; ?>
</div><!--blog-posts end-->