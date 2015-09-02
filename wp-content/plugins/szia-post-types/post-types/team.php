<?php
add_action('init', 'register_szia_team_postype');

function register_szia_team_postype() {

    $labels = array(
        'name' => __('Members', 'szia'),
        'singular_name' => __('Member', 'szia'),
        'add_new' => __('Add Member', 'szia'),
        'add_new_item' => __('Add New Member', 'szia'),
        'edit_item' => __('Edit Member', 'szia'),
        'new_item' => __('New Member', 'szia'),
        'view_item' => __('View Member', 'szia'),
        'search_items' => __('Search Members', 'szia'),
        'not_found' => __('No Members found', 'szia'),
        'not_found_in_trash' => __('No Member found in Trash', 'szia'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail','page-attributes'),
        'rewrite' => array('slug' => 'team')
    );

    register_post_type('szia-team', $args);
}

add_action('admin_init', 'add_szia_team_meta_field');

function add_szia_team_meta_field() {
    add_meta_box('szia_team_meta_fields', __('Manage Social links and Member Role', 'szia'), 'team_metabox_cb', 'szia-team', 'normal', 'core');
}

function team_metabox_cb() {
    global $post;
    echo '<input type="hidden" name="szia-team-nonce" id="szia-team-nonce" value="' . wp_create_nonce('szia-team-nonce') . '" />';
    ?>
    <style type="text/css">
        .team_social_links tr td:first-child{
            width:25%;
            text-align: right;
        }
        .team_social_links tr td:last-child{
            width:75%;
            text-align: left;
        }
        .team_social_links tr td:last-child input{
            width:244px;
        }
        .team_social_links tr td:last-child input,
        .team_social_links tr td:last-child textarea{
            margin-left:10px;
        }
    </style>
    <table cellspacing="0" cellpadding="0" border="0" class="team_social_links">
        
        <?php
        $team_social_links = get_post_meta($post->ID, 'team-metas', true);
        if (!empty($team_social_links)) {
            $team_social_links = json_decode($team_social_links, true);
        }
        ?>
        <tr>
            <td>Role</td>
            <td><input type="text" name="member-role" value="<?php echo isset($team_social_links["member-role"]) ? urldecode($team_social_links["member-role"]) : '' ?>" /></td>
        </tr>
        <tr><td>facebook</td><td><textarea name="member-facebook" rows="3" cols="40"><?php echo isset($team_social_links["member-facebook"]) ? urldecode($team_social_links["member-facebook"]) : '' ?></textarea></td></tr>
        <tr><td>twitter</td><td><textarea name="member-twitter" rows="3" cols="40"><?php echo isset($team_social_links["member-twitter"]) ? urldecode($team_social_links["member-twitter"]) : '' ?></textarea></td></tr>
        <tr><td>linkedin</td><td><textarea name="member-linkedin" rows="3" cols="40"><?php echo isset($team_social_links["member-linkedin"]) ? urldecode($team_social_links["member-linkedin"]) : '' ?></textarea></td></tr>
        <tr><td>dribbble</td><td><textarea name="member-dribbble" rows="3" cols="40"><?php echo isset($team_social_links["member-dribbble"]) ? urldecode($team_social_links["member-dribbble"]) : '' ?></textarea></td></tr>
        <tr><td>blogger</td><td><textarea name="member-blogger" rows="3" cols="40"><?php echo isset($team_social_links["member-blogger"]) ? urldecode($team_social_links["member-blogger"]) : '' ?></textarea></td></tr>        
        <tr><td>amazon</td><td><textarea name="member-amazon" rows="3" cols="40"><?php echo isset($team_social_links["member-amazon"]) ? urldecode($team_social_links["member-amazon"]) : '' ?></textarea></td></tr>
        <tr><td>behance</td><td><textarea name="member-behance" rows="3" cols="40"><?php echo isset($team_social_links["member-behance"]) ? urldecode($team_social_links["member-behance"]) : '' ?></textarea></td></tr>        
        <tr><td>deviantart</td><td><textarea name="member-deviantart" rows="3" cols="40"><?php echo isset($team_social_links["member-deviantart"]) ? urldecode($team_social_links["member-deviantart"]) : '' ?></textarea></td></tr>        
        <tr><td>dropbox</td><td><textarea name="member-dropbox" rows="3" cols="40"><?php echo isset($team_social_links["member-dropbox"]) ? urldecode($team_social_links["member-dropbox"]) : '' ?></textarea></td></tr>
        <tr><td>evernote</td><td><textarea name="member-evernote" rows="3" cols="40"><?php echo isset($team_social_links["member-evernote"]) ? urldecode($team_social_links["member-evernote"]) : '' ?></textarea></td></tr>        
        <tr><td>forrst</td><td><textarea name="member-forrst" rows="3" cols="40"><?php echo isset($team_social_links["member-forrst"]) ? urldecode($team_social_links["member-forrst"]) : '' ?></textarea></td></tr>
        <tr><td>googleplus</td><td><textarea name="member-googleplus" rows="3" cols="40"><?php echo isset($team_social_links["member-googleplus"]) ? urldecode($team_social_links["member-googleplus"]) : '' ?></textarea></td></tr>
        <tr><td>picasa</td><td><textarea name="member-picasa" rows="3" cols="40"><?php echo isset($team_social_links["member-picasa"]) ? urldecode($team_social_links["member-picasa"]) : '' ?></textarea></td></tr>
        <tr><td>pintrest</td><td><textarea name="member-pintrest" rows="3" cols="40"><?php echo isset($team_social_links["member-pintrest"]) ? urldecode($team_social_links["member-pintrest"]) : '' ?></textarea></td></tr>
        <tr><td>github</td><td><textarea name="member-github" rows="3" cols="40"><?php echo isset($team_social_links["member-github"]) ? urldecode($team_social_links["member-github"]) : '' ?></textarea></td></tr>        
        <tr><td>jolicloud</td><td><textarea name="member-jolicloud" rows="3" cols="40"><?php echo isset($team_social_links["member-jolicloud"]) ? urldecode($team_social_links["member-jolicloud"]) : '' ?></textarea></td></tr>
        <tr><td>last-fm</td><td><textarea name="member-last-fm" rows="3" cols="40"><?php echo isset($team_social_links["member-last-fm"]) ? urldecode($team_social_links["member-last-fm"]) : '' ?></textarea></td></tr>               
        <tr><td>rss</td><td><textarea name="member-rss" rows="3" cols="40"><?php echo isset($team_social_links["member-rss"]) ? urldecode($team_social_links["member-rss"]) : '' ?></textarea></td></tr>
        <tr><td>skype</td><td><textarea name="member-skype" rows="3" cols="40"><?php echo isset($team_social_links["member-skype"]) ? urldecode($team_social_links["member-skype"]) : '' ?></textarea></td></tr>
        <tr><td>spotify</td><td><textarea name="member-spotify" rows="3" cols="40"><?php echo isset($team_social_links["member-spotify"]) ? urldecode($team_social_links["member-spotify"]) : '' ?></textarea></td></tr>
        <tr><td>stumbleupon</td><td><textarea name="member-stumbleupon" rows="3" cols="40"><?php echo isset($team_social_links["member-stumbleupon"]) ? urldecode($team_social_links["member-stumbleupon"]) : '' ?></textarea></td></tr>
        <tr><td>tumblr</td><td><textarea name="member-tumblr" rows="3" cols="40"><?php echo isset($team_social_links["member-tumblr"]) ? urldecode($team_social_links["member-tumblr"]) : '' ?></textarea></td></tr>        
        <tr><td>vimeo</td><td><textarea name="member-vimeo" rows="3" cols="40"><?php echo isset($team_social_links["member-vimeo"]) ? urldecode($team_social_links["member-vimeo"]) : '' ?></textarea></td></tr>
        <tr><td>wordpress</td><td><textarea name="member-wordpress" rows="3" cols="40"><?php echo isset($team_social_links["member-wordpress"]) ? urldecode($team_social_links["member-wordpress"]) : '' ?></textarea></td></tr>
        <tr><td>xing</td><td><textarea name="member-xing" rows="3" cols="40"><?php echo isset($team_social_links["member-xing"]) ? urldecode($team_social_links["member-xing"]) : '' ?></textarea></td></tr>
        <tr><td>yahoo</td><td><textarea name="member-yahoo" rows="3" cols="40"><?php echo isset($team_social_links["member-yahoo"]) ? urldecode($team_social_links["member-yahoo"]) : '' ?></textarea></td></tr>
        <tr><td>youtube</td><td><textarea name="member-youtube" rows="3" cols="40"><?php echo isset($team_social_links["member-youtube"]) ? urldecode($team_social_links["member-youtube"]) : '' ?></textarea></td></tr>

    </table>
    <?php
}

add_action('save_post', 'save_team_meta');

function save_team_meta() {

    global $post;

    if (!isset($_POST['szia-team-nonce']))
        return false;

    if (!wp_verify_nonce($_POST['szia-team-nonce'], 'szia-team-nonce')) {
        return $post->ID;
    }

    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;
    
    $team_metas = array();
    
    foreach($_POST as $key=>$field){        
        if(strpos($key,'member-') !== FALSE){            
            $team_metas[$key] = !empty($field)? urlencode($field) : '' ;
        }        
    }    
    update_post_meta($post->ID, 'team-metas', json_encode($team_metas));
}