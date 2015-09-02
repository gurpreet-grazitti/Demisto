<?php
get_header('alt');
global $post;
$attach_id = get_post_thumbnail_id($post->ID);
if(!empty($attach_id)){
    $bgimg = wp_get_attachment_image_src($attach_id,'full');
    $bgimg = $bgimg[0];    
}
?>

<div id="banner_inner" class="parallax_bg" 
     <?php 
     if(isset($bgimg))
     echo "style=\"background:url($bgimg)\""?>>
	<div class="big_title border"><h1><?php the_title();?></h1></div>
</div>
<div id="content_wrapper">    
    <section id="shortcodes">
        <div class="container">
            <?php
            if(have_posts()):while (have_posts()): the_post();            
                    the_content();
            endwhile; endif;
            ?>
            
        </div>
    </section>    
</div>

<?php
get_footer();
?>