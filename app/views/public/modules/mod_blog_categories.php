<?php $categories = get_blog_categories(); ?>
<div id="blog-categories">
<ul>
<?php foreach($categories as $category) : ?>
    <?php
    //Format name for url
    $url_name = str_replace(' ','_',$category->name);
    $url_name = str_replace('&','',$url_name);
    $url_name = str_replace('__','_',$url_name);
    $url_name = urlencode(strtolower($url_name));
    ?>
<li><a href="<?php echo base_url(); ?>blogs/category/<?php echo $url_name; ?>"><?php echo $category->name; ?></a></li>
<?php endforeach; ?>
</ul>
<div class="clr"></div>
</div><!--latest-blogs end-->