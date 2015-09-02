<?php file_exists('../../../../wp-load.php') ? require_once('../../../../wp-load.php') : require_once('../../../../../wp-load.php'); ?>

<?php
$version = get_bloginfo('version'); 

?>


<!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <head>



        <meta charset="<?php bloginfo('charset'); ?>" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title></title>


        <script type="text/javascript" src="<?php echo includes_url('js/jquery/jquery.js') ?>"></script>

        <script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>

        <script type="text/javascript">

            jQuery(document).ready(function() {

                jQuery('#insert').attr("disabled", true);

                jQuery('#insert').addClass("disabled");

                jQuery('#select_shortcode').change(function() {

                    if (jQuery(this).val() == '') {

                        jQuery('#insert').attr("disabled", true);

                        jQuery('#insert').addClass("disabled");

                    } else {

                        jQuery('#insert').removeAttr("disabled");

                        jQuery('#insert').removeClass("disabled");

                    }

                });

            });



            function returnShortcodeValue() {

                var out;



                switch (jQuery('#select_shortcode').val())

                {

                    case "slider":

                        out = "[slider]" +
                                "[fslide imgsrc='#' imgalt='Slide']" +
                                "Faucibus ante gravida sed. Sed ultrices pellentesque purus," +
                                " vulputate volutpat ipsum hendrerit[/fslide]" +
                                "[fslide imgsrc='#' imgalt='Slide']" +
                                "In pellentesque lorem condimentum dui conse. " +
                                "Vivamus semper, mi sed congue semper.[/fslide]" +
                                "[fslide imgsrc='#' imgalt='Slide']" +
                                "In pellentesque lorem condimentum dui conse. " +
                                "Vivamus semper, mi sed congue semper, " +
                                "ultrices pellentesque purus, " +
                                "vulputate volutpat ipsum hendrerit " +
                                "[/fslide]" +
                                "[/slider]";

                        break;

                    case "about-slider":

                        out = "[slider id='about_slider']" +
                                "[about-slide imgsrc='#' imgalt='Slide']" +
                                "[about-slide imgsrc='#' imgalt='Slide']" +
                                "[about-slide imgsrc='#' imgalt='Slide']" +
                                "[/slider]";
                        break;

                    case "button":

                        out = "[button href='#']Button[/button]";

                        break;

                    case "button-big":

                        out = "[button-big href='#']Button[/button-big]";

                        break;

                    case "button-big-solid":

                        out = "[button-big-solid href='#']Button[/button-big-solid]";

                        break;


                    case "accordion":

                        out = "[accordion title=\"Accordion #1\"]Tab content goes here[/accordion][accordion title=\"Accordion #2\"]Tab content goes here[/accordion][accordion title=\"Accordion #3\"]Tab content goes here[/accordion]<br />";

                        break;

                    case "tabs":

                        out = "[tabgroup][tab title=\"Tab1\"]Tab content goes here[/tab][tab title=\"Tab2\"]Tab content goes here[/tab][tab title=\"Tab3\"]Tab content goes here[/tab][/tabgroup]";

                        break;

                    case "toggle":

                        out = "[toggle title=\"Toggle #1\"]<p>Your content here...</p>[/toggle][toggle title=\"Toggle #2\"]<p>Your content here...</p>[/toggle][toggle title=\"Toggle #3\"]<p>Your content here...</p>[/toggle]<br />";

                        break;

                    case "title":

                        out = "[title]Title Example[/title]<br />";

                        break;

                    case "break":

                        out = "[break/]<br />";

                        break;

                    case "totop":

                        out = "[dividertop]<br />";

                        break;

                    case "dropcap_with_bg":

                        out = "[dropcap_with_bg]A[/dropcap_with_bg]";

                        break;

                    case "dropcap":

                        out = "[dropcap]A[/dropcap]";

                        break;

                    case "blockquote":

                        out = "[blockquote]Lorem ipsum dolor sit amet....[/blockquote]<br />";

                        break;

                    case "gmap":

                        out = "[gmap elem='map' lat='-34.397' lng='150.644' zoom='8' height='350' title='']";

                        break;

                        // Columns



                    case "two-omega-centered":

                        out = "[col2oc class='two columns omega align_center']Lorem ipsum dolor sit amet....[/col2oc]";

                        break;

                    case "two-alpha-centered":

                        out = "[col2ac class='two columns alpha align_center']Lorem ipsum dolor sit amet....[/col2ac]";

                        break;


                    case "two-centered":

                        out = "[col2c class='two columns align_center']Lorem ipsum dolor sit amet....[/col2c]";

                        break;

                    case "two-omega":

                        out = "[col2o class='two columns omega']Lorem ipsum dolor sit amet....[/col2o]";

                        break;

                    case "two-alpha":

                        out = "[col2a class='two columns alpha']Lorem ipsum dolor sit amet....[/col2a]";

                        break;


                    case "two":

                        out = "[col2 class='two columns']Lorem ipsum dolor sit amet....[/col2]";

                        break;



                    case "one-third-omega-centered":

                        out = "[col4oc class='one-third columns omega align_center']Lorem ipsum dolor sit amet....[/col4oc]";

                        break;

                    case "one-third-alpha-centered":

                        out = "[col4ac class='one-third columns alpha align_center']Lorem ipsum dolor sit amet....[/col4ac]";

                        break;


                    case "one-third-centered":

                        out = "[col4c class='one-third columns align_center']Lorem ipsum dolor sit amet....[/col4c]";

                        break;

                    case "one-third-omega":

                        out = "[col4o class='one-third columns omega']Lorem ipsum dolor sit amet....[/col4o]";

                        break;

                    case "one-third-alpha":

                        out = "[col4a class='one-third columns alpha']Lorem ipsum dolor sit amet....[/col4a]";

                        break;


                    case "one-third":

                        out = "[col4 class='one-third columns']Lorem ipsum dolor sit amet....[/col4]";

                        break;


                    case "two-thirds-omega-centered":

                        out = "[col6oc class='two-thirds columns omega align_center']Lorem ipsum dolor sit amet....[/col6oc]";

                        break;

                    case "two-thirds-alpha-centered":

                        out = "[col6ac class='two-thirds columns alpha align_center']Lorem ipsum dolor sit amet....[/col6ac]";

                        break;


                    case "two-thirds-centered":

                        out = "[col6c class='two-thirds columns align_center']Lorem ipsum dolor sit amet....[/col6c]";

                        break;

                    case "two-thirds-omega":

                        out = "[col6o class='two-thirds columns omega']Lorem ipsum dolor sit amet....[/col6o]";

                        break;

                    case "two-thirds-alpha":

                        out = "[col6a class='two-thirds columns alpha']Lorem ipsum dolor sit amet....[/col6a]";

                        break;


                    case "two-thirds":

                        out = "[col6 class='two-thirds columns']Lorem ipsum dolor sit amet....[/col6]";

                        break;






                    case "seven-omega-centered":

                        out = "[col7oc class='seven columns omega align_center']Lorem ipsum dolor sit amet....[/col7oc]";

                        break;

                    case "seven-alpha-centered":

                        out = "[col7ac class='seven columns alpha align_center']Lorem ipsum dolor sit amet....[/col7ac]";

                        break;

                    case "seven-centered":

                        out = "[col7c class='seven columns align_center']Lorem ipsum dolor sit amet....[/col7c]";

                        break;

                    case "seven-omega":

                        out = "[col7o class='seven columns omega']Lorem ipsum dolor sit amet....[/col7o]";

                        break;

                    case "seven-alpha":

                        out = "[col7a class='seven columns alpha']Lorem ipsum dolor sit amet....[/col7a]";

                        break;

                    case "seven":

                        out = "[col7 class='seven columns']Lorem ipsum dolor sit amet....[/col]";

                        break;




                    case "twelve":

                        out = "[col12 class='twelve columns']Lorem ipsum dolor sit amet....[/col12]";

                        break;

                    case "twelve-centered":

                        out = "[col12c class='twelve columns align_center']Lorem ipsum dolor sit amet....[/col12c]";

                        break;

                    case "twelve-alpha-omega":

                        out = "[col12ao class='twelve columns alpha omega']Lorem ipsum dolor sit amet....[/col12ao]";

                        break;

                    case "twelve-alpha-omega-centered":

                        out = "[col12aoc class='twelve columns alpha omega align_center']Lorem ipsum dolor sit amet....[/col12aoc]";

                        break;

                        /*
                         * Titles
                         * 
                         */

                    case 'heading1':

                        out = "[heading size='1' class='']Heading 1[/heading]";

                        break;

                    case 'heading2':

                        out = "[heading size='2' class='']Heading 2[/heading]";

                        break;

                    case 'heading3':

                        out = "[heading size='3' class='']Heading 3[/heading]";

                        break;

                    case 'heading4':

                        out = "[heading size='4' class='']Heading 4[/heading]";

                        break;

                    case 'heading5':

                        out = "[heading size='5' class='']Heading 5[/heading]";

                        break;

                        /*
                         * List Style Case
                         * 
                         */
                        case 'list-unordered-custom':
                            
                            out = '[unordered-custom-list class="social-icons"][/unordered-custom-list]';
                            
                        break;

                    case 'list-ordered':

                        out = '[ordered-list"]' +
                                '[li]Nemo enim ipsam voluptatem quia voluptas.[/li]' +
                                '[li]Sit aspernatur aut odit aut fugit.[/li]' +
                                '[li]Sed quia consequuntur magni dolores.[/li]' +
                                '[/ordered-list]';

                        break;

                    case 'list-unordered':

                        out = '[unordered-list]' +
                                '[li]Nemo enim ipsam voluptatem quia voluptas.[/li]' +
                                '[li]Sit aspernatur aut odit aut fugit.[/li]' +
                                '[li]Sed quia consequuntur magni dolores.[/li]' +
                                '[/unordered-list]';

                        break;


                    case 'tooltip':

                        out = "[tooltip hovertext='On your mouse tip']Tooltip[/tooltip]";

                        break;

                        /*
                         * Social links
                         * 
                         */
                    case 'amazon':

                        out = "[li class='amazon'][a class='' href='#']amazon[/a][/li]";

                        break;

                    case 'behance':

                        out = "[li class='behance'][a class='' href='#']behance[/a][/li]";

                        break;

                    case 'blogger':

                        out = "[li class='blogger'][a class='' href='#']blogger[/a][/li]";

                        break;
                        
                    case 'deviantart':

                        out = "[li class='deviantart'][a class='' href='#']deviantart[/a][/li]";

                        break;

                    case 'dribbble':

                        out = "[li class='dribbble'][a class='' href='#']dribbble[/a][/li]";

                        break;

                    case 'dropbox':

                        out = "[li class='dropbox'][a class='' href='#']dropbox[/a][/li]";

                        break;


                    case 'evernote':

                        out = "[li class='evernote'][a class='' href='#']evernote[/a][/li]";

                        break;

                    case 'facebook':

                        out = "[li class='facebook'][a class='' href='#']facebook[/a][/li]";

                        break;

                    case 'forrst':

                        out = "[li class='forrst'][a class='' href='#']forrst[/a][/li]";

                        break;

                    case 'github':

                        out = "[li class='github'][a class='' href='#']github[/a][/li]";

                        break;

                    case 'googleplus':

                        out = "[li class='googleplus'][a class='' href='#']googleplus[/a][/li]";

                        break;

                    case 'jolicloud':

                        out = "[li class='jolicloud'][a class='' href='#']jolicloud[/a][/li]";

                        break;

                    case 'last-fm':

                        out = "[li class='last-fm'][a class='' href='#']last-fm[/a][/li]";

                        break;
                    case 'linkedin':

                        out = "[li class='linkedin'][a class='' href='#']linkedin[/a][/li]";

                        break;
                    case 'picasa':

                        out = "[li class='picasa'][a class='' href='#']picasa[/a][/li]";

                        break;
                    case 'rss':

                        out = "[li class='rss'][a class='' href='#']rss[/a][/li]";

                        break;
                    case 'skype':

                        out = "[li class='skype'][a class='' href='#']skype[/a][/li]";

                        break;
                    case 'spotify':

                        out = "[li class='spotify'][a class='' href='#']spotify[/a][/li]";

                        break;
                    case 'stumbleupon':

                        out = "[li class='stumbleupon'][a class='' href='#']stumbleupon[/a][/li]";

                        break;
                    case 'tumblr':

                        out = "[li class='tumblr'][a class='' href='#']tumblr[/a][/li]";

                        break;
                    case 'twitter':

                        out = "[li class='twitter'][a class='' href='#']twitter[/a][/li]";

                        break;
                    case 'vimeo':

                        out = "[li class='vimeo'][a class='' href='#']vimeo[/a][/li]";

                        break;
                    case 'wordpress':

                        out = "[li class='wordpress'][a class='' href='#']wordpress[/a][/li]";

                        break;
                    case 'xing':

                        out = "[li class='xing'][a class='' href='#']xing[/a][/li]";

                        break;
                        
                    case 'yahoo':

                        out = "[li class='yahoo'][a class='' href='#']yahoo[/a][/li]";

                        break;
                        
                    case 'youtube':

                        out = "[li class='youtube'][a class='' href='#']youtube[/a][/li]";

                        break;

                    case 'hr':
                        
                        out = "[hr class='ruler']";
                        
                        break;


                        /*
                         * video
                         *                          
                         */

                    case 'video':
                        
                        out = "[video url='#' width='940' height='529']";
                        
                        break;


                        /*
                         * 
                         * Team
                         */

                    case 'team':
                        
                        out = "[team show='5' title='Meet the team']";
                        
                        break;

                    case 'work-slider':
                        
                        out = "[work-slider]";
                        
                        break;

                    case 'work-showcase':
                        
                        out = "[work-showcase]";
                        
                        break;

                    case 'testimonials':
                            
                        out = "[testimonials]";
                        
                        break;
                     
                    case 'clients':
                    
                        out = "[clients]";
                    
                        break;
                    
                    case 'latest-blog':
                    
                        out = '[latest-blog-timeline show="<?php echo get_option('posts_per_page')?>"]';
                        break;
                    
                    default:

                        out = '';

                }



              <?php if($version<3.9 ):?>
        
            window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.editorId, 'mceInsertContent', false, out);

            window.tinyMCE.activeEditor.execCommand('mceRepaint');

            tinyMCEPopup.close();


<?php else : ?>

            parent.tinyMCE.execCommand('mceInsertContent', false,out);
            parent.tinyMCE.activeEditor.windowManager.close();


<?php endif; ?>

            }

        </script>

    </head>

    <body>



        <fieldset>

            <legend>Select a Shortcode</legend>

            <div>

                <select id="select_shortcode">
                    <option value="">Select</option>
                    <optgroup label="Social Icons">                        
                        <option value="amazon">amazon</option>
                        <option value="behance">behance</option>
                        <option value="blogger">blogger</option>
                        <option value="deviantart">deviantart</option>
                        <option value="dribbble">dribbble</option>
                        <option value="dropbox">dropbox</option>
                        <option value="evernote">evernote</option>
                        <option value="facebook">facebook</option>
                        <option value="forrst">forrst</option>
                        <option value="github">github</option>
                        <option value="googleplus">googleplus</option>
                        <option value="jolicloud">jolicloud</option>
                        <option value="last-fm">last-fm</option>
                        <option value="linkedin">linkedin</option>
                        <option value="picasa">picasa</option>
                        <option value="rss">rss</option>
                        <option value="skype">skype</option>
                        <option value="spotify">spotify</option>
                        <option value="stumbleupon">stumbleupon</option>
                        <option value="tumblr">tumblr</option>
                        <option value="twitter">twitter</option>
                        <option value="vimeo">vimeo</option>
                        <option value="wordpress">wordpress</option>
                        <option value="xing">xing</option>
                        <option value="yahoo">yahoo</option>
                        <option value="youtube">youtube</option>
                    </optgroup>
                    <optgroup label="Blockquotes">
                        <option value="blockquote">Blockquote</option>                        
                    </optgroup>
                    <optgroup label="Buttons">			
                        <option value="button">Button</option>
                        <option value="button-big">Button Big</option>
                        <option value="button-big-solid">Button Big Solid</option>  
                    </optgroup>
                    <optgroup label="Heading">
                        <option value="heading1">Heading 1</option>
                        <option value="heading2">Heading 2</option>
                        <option value="heading3">Heading 3</option>
                        <option value="heading4">Heading 4</option>
                        <option value="heading5">Heading 5</option>
                    </optgroup>
                    <optgroup label="Columns">                                                             
                        <option value="twelve">Full</option>
                        <option value="twelve-centered">Full Centered</option>
                        <option value="twelve-alpha-omega">Full Alpha Omega</option>
                        <option value="twelve-alpha-omega-centered">Full Alpha Omega Centered</option>
                        <option value="seven">2/4</option>
                        <option value="seven-alpha">2/4 First</option>
                        <option value="seven-omega">2/4 Last</option>                                                                
                        <option value="seven-centered">2/4 Centered</option>
                        <option value="seven-alpha-centered">2/4 First Centered</option>
                        <option value="seven-omega-centered">2/4 Last Centered</option>                                                                                          
                        <option value="two-thirds">1/2</option>
                        <option value="two-thirds-alpha">1/2 First</option>
                        <option value="two-thirds-omega">1/2 Last</option>
                        <option value="two-thirds-centered">1/2 Centered</option>
                        <option value="two-thirds-alpha-centered">1/2 First Centered</option>
                        <option value="two-thirds-omega-centered">1/2 Last Centered</option>
                        <option value="one-third">1/3</option>
                        <option value="one-third-alpha">1/3 First</option>
                        <option value="one-third-omega">1/3 Last</option>
                        <option value="one-third-centered">1/3 Centered</option>
                        <option value="one-third-alpha-centered">1/3 First Centered</option>
                        <option value="one-third-omega-centered">1/3 Last Centered</option>
                        <option value="two">1/4</option>
                        <option value="two-alpha">1/4 First</option>
                        <option value="two-omega">1/4 Last</option>
                        <option value="two-centered">1/4 Centered</option>
                        <option value="two-alpha-centered">1/4 First Centered</option>
                        <option value="two-omega-centered">1/4 Last Centered</option>
                    </optgroup>
                    <optgroup label="Toggle Elements">
                        <option value="accordion">Accordion</option>
                        <option value="tabs">Tabs</option>  
                        <option value="toggle">Toggle</option>
                    </optgroup>	                    
                    <optgroup label="Sliders">
                        <option value="slider">Slider</option>
                        <option value="about-slider">About Us Slider</option>
                        <option value="work-slider">Work Slider</option>
                    </optgroup>
                    <optgroup label="Lists">                        
                        <option value="list-unordered-custom">Custom Unordered</option>
                        <option value="list-unordered">Unordered</option>
                        <option value="list-ordered">Ordered</option>                        
                    </optgroup>
                    <optgroup label="Styling Elements">
                        <option value="hr">Horizontal Rule</option>
                        <option value="break">Line Break</option>
                    </optgroup>			
                    <optgroup label="Extra">                        
                        <option value="latest-blog">Latest Blog Timeline</option>
                        <option value="video">Video</option>
                        <option value="tooltip">Tooltip</option>
                        <option value="team">Team</option>
                        <option value="clients">Clients</option>
                        <option value="work-showcase">Work Showcase</option>
                        <option value="testimonials">Testimonials</option>                        
                    </optgroup>
                </select>

            </div>

        </fieldset>



        <div>

         <?php if($version<3.9) :?>
        
        <input type="submit" value="Add" onclick="returnShortcodeValue()" id="insert" /> 
        <input type="button" value="Close" onclick="tinyMCEPopup.close()" id="cancel" />

<?php else : ?>
        <input type="submit" value="Add" onclick="returnShortcodeValue()" id="insert" />
        <input type="button" value="Close" onclick="parent.tinyMCE.activeEditor.windowManager.close()" id="cancel" />
<?php endif ; ?>

        </div>



    </body>

</html>