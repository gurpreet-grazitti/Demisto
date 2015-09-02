<?phpglobal $smof_data;?><!DOCTYPE html><!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]--><!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]--><!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>>    <!--<![endif]-->    <head>        <meta charset="<?php bloginfo('charset'); ?>" />        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">        <title><?php wp_title('|', true, 'right'); ?></title>        <link rel="profile" href="http://gmpg.org/xfn/11" />        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />				<link rel="icon" href="<?php bloginfo('url'); ?>/favicon.ico" type="image/x-icon" /><link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" type="image/x-icon" />        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>        <!--[if lt IE 9]>        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>        <![endif]-->        <?php wp_head(); ?>    </head>    <body <?php body_class()?>>        <?php if($smof_data['szia_preloader_status'] == 1){?>        <div id="preloader">            <div id="status">&nbsp;</div>        </div>                 <?php }?>        <!-- TOP HEADER BAR / Start                =========================================== -->        <header>                       <?php                         $primary_menu_items = szia_nav_menu_items();            if(isset($primary_menu_items) and !empty($primary_menu_items)){            ?>                        <nav>                <a class="logo_nav" href="<?php echo "#{$primary_menu_items[0][2]}"?>">                <?php                $logo = '';                                if(isset($smof_data['szia_sitelogo']) && !empty($smof_data['szia_sitelogo'])){                    $logo = $smof_data['szia_sitelogo'];                }                                ?>                                        <img style="margin-top: 30px;" alt="" src="<?php echo $logo;?>"/>                                </a>                <!-- nav menu -->                <ul class="clearfix primary_nav">                    <?php foreach($primary_menu_items as $menu){?>                                        <li>                        <?php                         $classes = '';                        $href = "#{$menu[2]}";                        if(!empty($menu[3])){                            $classes = implode(' ', $menu[3]);                            if(in_array('external',$menu[3])){                                $href = get_permalink($menu[0]);                            }                                                    }?>                        <a class="<?php echo $classes?>" href="<?php echo $href?>">                            <?php echo $menu[1]?></a></li>                    <?php }?>                </ul>                                <a href="#" class="pull"></a>            </nav>            <?php            }            ?>        </header>        <!-- TOP HEADER BAR / End        =========================================== -->