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
    <div class="big_title border"><h1><?php echo $pagetitle ?></h1></div>        
</div>

<div id="content_wrapper">
    <section id="blog">
        <div class="container">
            <div class="nine columns alpha">
                <?php if (have_posts()):while (have_posts()):the_post(); ?>
                        <article>
                            <?php 
                            get_template_part('content', get_post_format()); ?>                            
                            <?php the_excerpt() ?>
                            <a href="<?php the_permalink() ?>" class="button_thin">Read More</a>
                            <div class="blogmetas">
                                <ul>
                                    <li>
                                        <a href="<?php echo get_the_author_meta('user_url') ?>">
                                            <img alt="" class="avatar" src="<?php echo get_template_directory_uri() ?>/images/blog_author.png">
                                            <?php
                                            $first_name = get_the_author_meta('first_name');
                                            if (!empty($first_name))
                                                echo $first_name;
                                            else
                                                echo get_the_author_meta('user_login');
                                            ?>

                                        </a>
                                    </li>
                                    <li><img alt="post-date" src="<?php echo get_template_directory_uri() ?>/images/blog_date.png"> <?php echo get_the_date(get_option('date_format')) ?></li>
                                    <li>        
                                        <img alt="" src="<?php echo get_template_directory_uri()?>/images/blog_comments.png"> <?php
                comments_popup_link(__('0', 'szia'), __('1', 'szia'), __('%', 'szia'), '', __('Comments off', 'szia'));
                ?>
                                        
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                    <div class="paging_blog">                        
                        <?php next_posts_link(__('Older Entries', 'szia')); ?>
                        <?php previous_posts_link(__('Newer Entries', 'szia')); ?>
                    </div>
                    <?php
                endif;
                ?>
            </div><!--.nine-->
            
            <div class="three columns omega">
                <aside id="sidebar">
                    <?php
                    if(is_active_sidebar('blog')){
                        dynamic_sidebar('blog');
                    }
                    ?>
                </aside>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
?>