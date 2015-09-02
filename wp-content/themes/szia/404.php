<?php
get_header('alt');
global $smof_data;
$pagetitle = 'Blog';
$postspage = get_option('page_for_posts');

if (!empty($postspage) or $postspage = (int) $postspage != 0) {

    $blogpage = get_page($postspage);

    $pagetitle = $blogpage->post_title;

    if (has_post_thumbnail($blogpage->ID)) {

        $attach_id = get_post_thumbnail_id($blogpage->ID);

        $bgimg = wp_get_attachment_image_src($attach_id, 'full');

    }

}

?>



<div id="banner_blog" class="parallax_bg"

<?php

if (isset($attach_id) && !empty($attach_id)) {

    echo " style='background-image:url({$bgimg[0]});'";

}

?>>
    
    <div class="big_title border"><h1><?php _e('404 Page not found!','szia'); ?></h1></div>        

</div>
<div id="content_wrapper">
    <section id="blog">
        <div class="container">
            <div class="twelve columns">
                
            </div>
        </div>
    </section>
</div>

<?php

get_footer();

?>