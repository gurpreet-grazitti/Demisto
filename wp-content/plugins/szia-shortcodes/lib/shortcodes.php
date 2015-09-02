<?php
//google map

add_shortcode('gmap', 'get_gmap');

function get_gmap($atts = array()) {

    //[gmap lat='23.746854' lng='90.418446' zoom='16' title='Smart Data Soft']

    $defaults = array(
        'elem' => 'map',
        'lat' => '-34.397',
        'lng' => '150.644',
        'zoom' => '8',
        'height' => '350',
        'title' => ''
    );

    extract(shortcode_atts($defaults, $atts));

    ob_start();
    ?>

    <style type="text/css">

        #<?php echo $elem ?>{

            width:100%;
            height:<?php echo $height + 10; ?>px;
            margin-bottom:10px;

        }

    </style>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

    <script type="text/javascript">

        var themap;

        function initialize() {

            var mapOptions = {
                zoom: parseInt('<?php echo $zoom; ?>'),
                center: new google.maps.LatLng(parseFloat('<?php echo $lat; ?>'), parseFloat('<?php echo $lng; ?>')),
                mapTypeId: google.maps.MapTypeId.ROADMAP

            };

            themap = new google.maps.Map(document.getElementById('<?php echo $elem ?>'),
                    mapOptions);



            new google.maps.Marker({
                position: mapOptions.center,
                map: themap,
                title: '<?php echo $title ?>'

            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <div class="gmap-wrap">
        <div class="gmap" id="<?php echo $elem ?>"></div>
    </div>

    <?php
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
}

//break

function shortcode_break($atts, $content = null) {

    return '<div class="break clearfix">&nbsp;</div>';
}

add_shortcode('break', 'shortcode_break');

//sellya list shortcodes

function remove_li_shortcode_directives($content) {
    $content = preg_replace('/\]/', '>', preg_replace('/\[/', '<', $content));

    return $content;
}

function shortcode_list_checkbox($atts, $content = null) {

    return '<ul class="list_style" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_checkbox', 'shortcode_list_checkbox');

function shortcode_list_cross($atts, $content = null) {

    return '<ul class="list_style style2" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_cross', 'shortcode_list_cross');

function shortcode_list_rarrow($atts, $content = null) {

    return '<ul class="list_style style3" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_rarrow', 'shortcode_list_rarrow');

function shortcode_list_circle($atts, $content = null) {

    return '<ul class="list_style style4" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_circle', 'shortcode_list_circle');

function shortcode_list_checkbox2($atts, $content = null) {

    return '<ul class="list_style style5" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_checkbox2', 'shortcode_list_checkbox2');

function shortcode_list_cross2($atts, $content = null) {

    return '<ul class="list_style style6" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_cross2', 'shortcode_list_cross2');

function shortcode_list_rarrow2($atts, $content = null) {

    return '<ul class="list_style style7" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_rarrow2', 'shortcode_list_rarrow2');

function shortcode_list_circle2($atts, $content = null) {

    return '<ul class="list_style style8" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_circle2', 'shortcode_list_circle2');

function shortcode_list_green_checkbox($atts, $content = null) {

    return '<ul class="list_style style9" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_checkbox3', 'shortcode_list_green_checkbox');

function shortcode_list_cross3($atts, $content = null) {

    return '<ul class="list_style style10" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_cross3', 'shortcode_list_cross3');

function shortcode_list_rarrow3($atts, $content = null) {

    return '<ul class="list_style style11" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_rarrow3', 'shortcode_list_rarrow3');

function shortcode_list_circle3($atts, $content = null) {

    return '<ul class="list_style style12" >' . remove_li_shortcode_directives($content) . '</ul>';
}

add_shortcode('list_circle3', 'shortcode_list_circle3');

//dropcaps

function shortcode_dropcap_with_bg($atts, $content = null) {

    $content = strip_tags($content);

    if (!empty($content)) {

        ob_start();

        $para = $content;
        $firstchar = substr($para, 0, 1);
        $rest = substr($para, 1, strlen($para) - 1);

        echo "<span class=\"drop_word with-bg\">{$firstchar}</span>";


        $contents = ob_get_contents();
        ob_end_clean();

        return do_shortcode($contents);
    }
    return;
}

add_shortcode('dropcap_with_bg', 'shortcode_dropcap_with_bg');

function shortcode_dropcap($atts, $content = null) {

    $content = strip_tags($content);

    if (!empty($content)) {
        ob_start();


        $para = $content;
        $firstchar = substr($para, 0, 1);
        $rest = substr($para, 1, strlen($para) - 1);

        echo "<span class=\"drop_word\">{$firstchar}</span>";


        $contents = ob_get_contents();
        ob_end_clean();

        return do_shortcode($contents);
    }
    return;
}

add_shortcode('dropcap', 'shortcode_dropcap');

//sellya blockquotes

function shortcode_blockquote($atts, $content = null) {

    return '<blockquote>' . $content . '</blockquote>';
}

add_shortcode('blockquote', 'shortcode_blockquote');

//sellya testimonial quote

function shortcode_testmonial_quote($atts, $content = null) {

    $defaults = array(
        'name' => 'Name'
    );

    extract(shortcode_atts($defaults, $atts));

    return "<div class='testimonial-quote'><p>$content</p><h6 class='name'>$name</h6></div>";
}

add_shortcode('testimonial_quote', 'shortcode_testmonial_quote');

//szia buttons



function shortcode_button($atts, $content) {

    $defaults = array(
        'href' => '#',
    );

    extract(shortcode_atts($defaults, $atts));
    $class = 'button';

    return "<a class='{$class}' href='$href'>$content</a>";
}

add_shortcode('button', 'shortcode_button');

function shortcode_button_big($atts, $content) {

    $defaults = array(
        'href' => '#',
    );

    extract(shortcode_atts($defaults, $atts));
    $class = 'button_big';

    return "<a class='{$class}' href='$href'>$content</a>";
}

add_shortcode('button-big', 'shortcode_button_big');

function shortcode_button_big_solid($atts, $content) {

    $defaults = array(
        'href' => '#',
    );

    extract(shortcode_atts($defaults, $atts));
    $class = 'button_big solid';

    return "<a class='{$class}' href='$href'>$content</a>";
}

add_shortcode('button-big-solid', 'shortcode_button_big_solid');



add_filter('widget_text', 'do_shortcode');

//accordion


function shortcode_accordion($atts, $contents) {

    $defaults = array('title' => '');
    extract(shortcode_atts($defaults, $atts));
    ob_start();
    ?>

    <span class="acc-trigger"><a href="#"><?php echo $title; ?></a></span>
    <div class="acc-container">
        <div class="content">
            <p>
                <?php echo $contents; ?>
            </p>
        </div>
    </div>

    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode('accordion', 'shortcode_accordion');

//toggle


function shortcode_toggle($atts, $contents) {

    $defaults = array('title' => '');

    extract(shortcode_atts($defaults, $atts));

    ob_start();
    ?>
    <span class="toggle-trigger"><a href="#"><?php echo $title; ?></a></span>
    <div class="toggle-container">
        <div class="content">
            <p>
                <?php echo $contents; ?>
            </p>
        </div>
    </div>        
    <?php
    $content = ob_get_contents();

    ob_end_clean();

    return $content;
}

add_shortcode('toggle', 'shortcode_toggle');

// ui-tabs

function szia_tabgroup($atts, $contents) {

    $GLOBALS['tab_counter'] = 1;
    $GLOBALS['tabcontent'] = $GLOBALS['tablink'] = '';
    
    do_shortcode($contents);

    $GLOBALS['tablink'] = "<ul class='tabs-nav'>{$GLOBALS['tablink']}</ul>";
    $GLOBALS['tabcontent'] = "<div class='tabs-container'>{$GLOBALS['tabcontent']}</div>";
    return $GLOBALS['tablink'] . $GLOBALS['tabcontent'];
}

add_shortcode('tabgroup', 'szia_tabgroup');

function szia_tab($atts, $contents) {

    extract(shortcode_atts(array(
        'title' => ''
                    ), $atts));

    $GLOBALS['tablink'] .= "<li><a href='#tab-{$GLOBALS['tab_counter']}'>{$title}</a></li>";
    $GLOBALS['tabcontent'] .= "<div id='tab-" . $GLOBALS['tab_counter'] . "' class='tab-content'><p>$contents</p></div>";
    $GLOBALS['tab_counter']++;
    
}

add_shortcode('tab', 'szia_tab');

function box_area_cb($atts = array(), $content) {

    extract(shortcode_atts(array(
        'style' => ''
                    ), $atts));

    return '<div class="box_area_wrap"><div style="' . $style . '" class="box_area">' . do_shortcode($content) . '</div></div>';
}

add_shortcode('box-area', 'box_area_cb');



/*
 * Columns
 */

function cb_col($atts = array(), $content) {

    extract(shortcode_atts(array(
        'class' => ''
                    ), $atts));

    return '<div class="' . $class . '">' . do_shortcode($content) . '</div>';
}

add_shortcode('col2oc', 'cb_col');
add_shortcode('col2ac', 'cb_col');
add_shortcode('col2c', 'cb_col');
add_shortcode('col2o', 'cb_col');
add_shortcode('col2a', 'cb_col');
add_shortcode('col2', 'cb_col');

add_shortcode('col4oc', 'cb_col');
add_shortcode('col4ac', 'cb_col');
add_shortcode('col4c', 'cb_col');
add_shortcode('col4o', 'cb_col');
add_shortcode('col4a', 'cb_col');
add_shortcode('col4', 'cb_col');

add_shortcode('col6oc', 'cb_col');
add_shortcode('col6ac', 'cb_col');
add_shortcode('col6c', 'cb_col');
add_shortcode('col6o', 'cb_col');
add_shortcode('col6a', 'cb_col');
add_shortcode('col6', 'cb_col');

add_shortcode('col7oc', 'cb_col');
add_shortcode('col7ac', 'cb_col');
add_shortcode('col7c', 'cb_col');
add_shortcode('col7o', 'cb_col');
add_shortcode('col7a', 'cb_col');
add_shortcode('col7', 'cb_col');

add_shortcode('col12aoc', 'cb_col');
add_shortcode('col12ao', 'cb_col');
add_shortcode('col12', 'cb_col');
add_shortcode('col12c', 'cb_col');





/*
 * List Styles
 */

function unordered_list_cb($atts = array(), $content) {
    return "<ul class='unordered-list'>" . do_shortcode($content) . "</ul>";
}

add_shortcode('unordered-list', 'unordered_list_cb');

function ordered_list_cb($atts = array(), $content) {
    return "<ol class='ordered_list'>" . do_shortcode($content) . "</ol>";
}

function unordered_custom_list_cb($atts, $content) {
    extract(shortcode_atts(array(
        'class' => '',
                    ), $atts));
    return "<ul class='{$class}'>" . do_shortcode($content) . "</ul>";
}

add_shortcode('unordered-custom-list', 'unordered_custom_list_cb');

add_shortcode('ordered-list', 'ordered_list_cb');

function li_cb($atts = array(), $content) {
    extract(shortcode_atts(array(
        'class' => '',
                    ), $atts));

    return "<li class='{$class}'>" . do_shortcode($content) . "</li>";
}

add_shortcode('li', 'li_cb');

function a_cb($atts = array(), $content) {
    extract(shortcode_atts(array(
        'class' => '',
        'href' => '#'
                    ), $atts));

    return "<a class='{$class}' href='{$href}'>{$content}</a>";
}

add_shortcode('a', 'a_cb');

/*
 * horizontal rule
 * 
 */

function hr_cb($atts) {
    extract(shortcode_atts(array(
        'class' => '',
                    ), $atts));
    return "<hr class='{$class}' />";
}

add_shortcode('hr', 'hr_cb');


/*
 * Tooltip
 * 
 */

function tooltip_cb($atts = array(), $content) {

    extract(shortcode_atts(array(
        'hovertext' => '',
                    ), $atts));

    return "<a href='#' class='tooltip' title='{$hovertext}'>{$content}</a>";
}

add_shortcode('tooltip', 'tooltip_cb');


/*
 * Table Shortcode
 */

function table_cb($atts = array(), $content) {

    extract(shortcode_atts(array(
        'style' => '',
                    ), $atts));

    return '<table style="' . $style . '" class="rest-table" cellspacing="0" cellpadding="0">' . do_shortcode($content) . "</table>";
}

add_shortcode('table', 'table_cb');

function tr_cb($atts = array(), $content) {

    return "<tr>" . do_shortcode($content) . "</tr>";
}

add_shortcode('tr', 'tr_cb');

function th_cb($atts = array(), $content) {

    extract(shortcode_atts(array(
        'bg' => '',
        'textcolor' => '#ffffff',
        'textalign' => 'left'
                    ), $atts));


    return "<th style='background:{$bg};color:{$textcolor};text-align:{$textalign}'>{$content}</th>";
}

add_shortcode('th', 'th_cb');

function td_cb($atts = array(), $content) {

    extract(shortcode_atts(array(
        'bg' => '',
        'textcolor' => '#756d6a',
        'textalign' => 'left'
                    ), $atts));

    return "<td style='background:{$bg};color:{$textcolor};text-align:{$textalign}'>{$content}</td>";
}

add_shortcode('td', 'td_cb');

function heading_cb($atts, $content) {

    extract(shortcode_atts(array(
        'size' => '1',
        'class' => ''
                    ), $atts));

    return "<h{$size} class='{$class}'>{$content}</h{$size}>";
}

add_shortcode('heading', 'heading_cb');

function get_team_cb($atts) {

    extract(shortcode_atts(array(
        'showposts' => '4',
                    ), $atts));

    ob_start();

    $teamloop = new WP_Query("post_type=team&showposts={$showposts}");
    if ($teamloop->have_posts()): while ($teamloop->have_posts()):$teamloop->the_post();
            ?>

            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="about_area">
                    <div class="about_blog_area meet_the_team_area">              
                        <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail('full'); ?> 
                        </a>
                    </div>
                    <div class="about_posts_title">
                        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        <p><?php
                            $terms = wp_get_post_terms(get_the_ID(), 'teamrole', array("fields" => "names"));
                            foreach ($terms as $count => $name):
                                if ($count > 0)
                                    echo ', ';
                                echo $name;
                            endforeach;
                            ?></p>
                    </div>

                </div>
            </div>
            <?php
        endwhile;
    endif;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode('get-team', 'get_team_cb');

function skillmeter_cb($atts, $content) {

    extract(shortcode_atts(array(
        'progress' => '0%',
                    ), $atts));

    ob_start();
    ?>

    <div class="skillmeter">
        <h4><?php echo $content ?></h4>
        <div class="progress-bar">
            <span class="progress" style="width:<?php echo $progress ?>;"></span>
        </div>                
    </div>      
    <?php
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
}

add_shortcode('skillmeter', 'skillmeter_cb');


/*
 * Slider
 * 
 */

function slider_cb($atts = array(), $content) {
    extract(shortcode_atts(array(
        'id' => 'page_slider',
                    ), $atts));

    return '<div id="' . $id . '"><ul class="slides">' . do_shortcode($content) . '</ul></div>';
}

add_shortcode('slider', 'slider_cb');

function slide_cb($atts = array(), $content) {

    extract(shortcode_atts(array(
        'imgsrc' => '',
        'imgalt' => ''
                    ), $atts));

    return "<li><p class=\"flex-caption\">{$content}</p><img alt='{$imgalt}' src='{$imgsrc}' /></li>";
}

add_shortcode('slide', 'slide_cb');

function about_slide_cb($atts, $content) {

    extract(shortcode_atts(array(
        'imgsrc' => '',
        'imgalt' => ''
                    ), $atts));

    return "<li><img alt='{$imgalt}' src='{$imgsrc}' /></li>";
}

add_shortcode('about-slide', 'about_slide_cb');

/*
 * Video
 * 
 */

function video_cb($atts) {
    extract(shortcode_atts(array(
        'url' => '',
        'width' => '',
        'height' => ''
                    ), $atts));

    return "<div class=\"res-video-w\"><div class=\"res-video-h\">
        <iframe src=\"{$url}\" width=\"{$width}\" height=\"{height}\"></iframe></div></div>";
}

add_shortcode('video', 'video_cb');


/*
 * 
 * Team
 */

function team_cb($atts) {
    extract(shortcode_atts(array(
        'show' => '5',
        'title' => 'Meet the team'
                    ), $atts));

    ob_start();
    ?>
	<?php
$page = get_posts( array( 'name' => 'add-dbot' ) );

if ( $page )
{
    echo $page[0]->post_content;
}
?>
	
	
    <div class="row">
        <article class="column twelve">
            <div style="text-align:center" class="head_line"><h4><?php echo $title;?></h4></div>
            <?php
            $teamq = new WP_Query("post_type=szia-team&showposts={$show}&orderby=menu_order&order=ASC");
            $i = 0;

            if ($teamq->have_posts()): while ($teamq->have_posts()): $teamq->the_post();
                    $i++;

                    $team_metas = get_post_meta(get_the_ID(), 'team-metas', true);
                    if (!empty($team_metas)) {
                        $team_metas = json_decode($team_metas, true);
                    }
                    $addclass = '';
                    if ($i == 1)
                        $addclass = "alpha";

                    elseif ($i == $teamq->post_count)
                        $addclass = 'omega'
                        ?>

                    <div class="two columns <?php echo $addclass ?>">
                        <?php
                        if (has_post_thumbnail())
                            the_post_thumbnail(array(220, 220));
                        else
                            echo '<img alt = "" src = "' . get_template_directory_uri() . '/images/team_1.jpg"/>';
                        ?>
						
						
						
                        <div class = "team_details">
                        
							<ul style="text-align:center; width:100%" class="social-icons about">
                            <?php
                            $counter = 0;
                            foreach ($team_metas as $key => $meta):

                                if ($key != 'member-role' and !empty($meta)) {
                                    $counter++;
                                    if ($counter > 5)
                                        break;

                                    $class = explode('member-', $key);
                                    $class = $class[1];
                                    $meta = urldecode($meta);

                                    echo "<li class='{$class}'><a href='{$meta}'>$class</a></li>";
                                }

                            endforeach;
                            ?>

                        </ul>
							<h2><?php the_title() ?></h2>
														
                            <h5><?php echo!empty($team_metas['member-role']) ? urldecode($team_metas['member-role']) : ''; ?>
							</h5>
							
							<span><?php the_content() ?></span>
                        </div>
                        
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>

        </article>
    </div>
	<?php
$page = get_posts( array( 'name' => 'backed-by' ) );

if ( $page )
{
    echo $page[0]->post_content;
}
?>
    <?php
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

add_shortcode('team', 'team_cb');

function work_slider_cb($atts = array()) {

    ob_start();
    ?>
    <div id="work_slider" class="flexslider">
        <?php
        $work_slider_query = new WP_Query('post_type=szia-work-slider&posts_per_page=-1');
        if ($work_slider_query->have_posts()):
            ?>
            <ul class="slides">
                <?php while ($work_slider_query->have_posts()): $work_slider_query->the_post(); ?>
                    <?php
                    
                    switch(get_post_format()){
                        case 'video':
                            echo '<li><iframe src="'.get_post_meta(get_the_ID(), "szia-work-slider-video-link", true).'" width="700" height="394"></iframe></li>';
                            break;
                        case 'gallery':
                            
                            ?>
                <li>
                            <ul class="galleries">
                                <?php 
                                $galleries = get_post_meta(get_the_ID(),"szia-work-slider-gallery",true);
                                if(!empty($galleries)){
                                    $galleries = explode(',',$galleries);
                                    $counter = 0;
                                    foreach($galleries as $attachid){
                                        if(++$counter > 4) break;
                                        $bigimage = wp_get_attachment_image_src((int)$attachid, 'full');
                                        $smallimage = wp_get_attachment_image_src((int)$attachid, 'medium');
                                        ?>
                                        <li><a class="magnify" href="<?php echo $bigimage[0]?>"><img src="<?php echo $smallimage[0]?>" alt="Image" /></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                </li>
                            <?php
                            break;
                        default:                            
                            if (has_post_thumbnail()) {
                            ?>
                                <li>
                                    <?php the_post_thumbnail('full') ?>
                                    <div class="flex-caption"><span></span>
                                        <div class="work_desc">
                                            <h4><?php the_title() ?></h4>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }                            
                            break;
                        
                    }
                    
                endwhile;
                ?>
            </ul>
            <?php
        endif;
        wp_reset_query();
        ?>
    </div>
    <?php
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

add_shortcode('work-slider', 'work_slider_cb');

function work_showcase_cb($atts = array()) {
    ob_start();
    ?>
    <?php
    $work_showcase = new WP_Query('post_type=szia-recent-works&posts_per_page=-1');
    if ($work_showcase->have_posts()):
        ?>
        <ul id="work_showcase">
            <?php while ($work_showcase->have_posts()): $work_showcase->the_post(); ?>
                <li>                
                    <?php
                    the_post_thumbnail('large');
                    if (get_post_format() == 'video') {
                        $src = get_post_meta(get_the_ID(), "szia-recent-works-video-link", true);
                        $video_class = 'popup-vimeo';
                    } else {
                        $attach_id = get_post_thumbnail_id();
                        $img = wp_get_attachment_image_src($attach_id, 'full');
                        $src = $img[0];
                    }
                    ?>
                    <div class="work_info">
                        <h5><?php the_title() ?></h5>
                        <a href="<?php echo $src ?>" class="plus <?php echo isset($video_class) ? $video_class : '' ?>">+</a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php
    endif;
    wp_reset_query();
    ?>
    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode('work-showcase', 'work_showcase_cb');

function testimonials_cb() {
    global $smof_data;
    $skin = isset($smof_data['szia_skin']) ? $smof_data['szia_skin'] : '';

    ob_start();
    ?>    
    <div class="container">
        <div class="twelve columns">
            <div class="title">
                <span class="quote"><img alt="" src="<?php echo get_template_directory_uri() ?>/css/<?php echo $skin; ?>/images/quote.png"/></span>
                <hr/>
                <?php
                $test_query = new WP_Query('post_type=szia-tesimonial&posts_per_page=-1');
                if ($test_query->have_posts()) {
                    ?>
                    <ul class="testimonial_slide">
                        <?php while ($test_query->have_posts()): $test_query->the_post(); ?>
                            <li>
                                <h4><?php echo preg_replace('/<[\/]*p>/', '', get_the_content()) ?></h4>
                                <span class="author"><?php the_title() ?></span>
                            </li>

                        <?php endwhile; ?>
                    </ul>

                    <div id="pager2" class="testimonial_pager"></div>
                <?php } wp_reset_query(); ?>
            </div>
        </div>             
    </div>    
    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode('testimonials', 'testimonials_cb');

function clients_cb($atts) {
    ob_start();
    global $smof_data;

    if (isset($smof_data['szia_client_options'])) {
        $clients = $smof_data['szia_client_options'];
        if (!empty($clients)) {
            ?>
            <div class="row">
                <div class="twelve columns alpha omega">
                    <ul class="partner_logos">
                        <?php foreach ($clients as $client): ?>                    
                            <li>
                                <a href="<?php echo!empty($client['link']) ? $client['link'] : '#' ?>"
                                   class="tooltip" title="<?php echo $client['title'] ?>">
                                    <img alt="<?php echo $client['title'] ?>" src="<?php echo $client['url'] ?>"/>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }
}

add_shortcode('clients', 'clients_cb');

$GLOBALS['timeline'] = 0;


function lbt_cb($atts = array()) {
    
    global $post;
    $GLOBALS['timeline']++;
    
    extract(shortcode_atts(array(
        'show' => '10',
                    ), $atts));
    $posts = get_posts(array(
        'posts_per_page' => $show
    ));
    if (empty($posts))
        return;
    ob_start();
    ?>
    <div id="timeline" class='timeline'>
        <ul id="dates">
            <?php
            foreach ($posts as $key => $post):
                setup_postdata($post);
                $class = "";
                if ($key < 1)
                    $class = "selected";

                ?>
            <li><a href="#<?php echo $post->post_name?>" class="<?php echo $class ?>"><?php echo get_the_date(); ?></a></li>
        <?php 
        wp_reset_postdata();
            endforeach; ?>
        </ul>
        <ul id="issues">
            <?php foreach ($posts as $key => $post):
                setup_postdata($post);
                $class = "";
                if ($key < 1)
                    $class = "selected";

                ?>
            <li id="#<?php echo $post->post_name?>" class="<?php echo $class ?>">
                <?php the_post_thumbnail('medium')?>
                <h3><a href='<?php the_permalink()?>'><?php the_title();?></a></h3>
                <?php the_content()?>
            </li>
                <?php 
                wp_reset_postdata();
                endforeach;                
                ?>
        </ul>
        <div id="grad_top"></div>
        <div id="grad_bottom"></div>
        <a href="#" id="next">+</a>
        <a href="#" id="prev">-</a>
    </div>
    <?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode('latest-blog-timeline', 'lbt_cb');
