<?php
add_action( 'init', 'register_szia_recent_work_postype' );

function register_szia_recent_work_postype() {

    $labels = array(
        'name' => __( 'Recent Works','szia'),
        'singular_name' => __( 'Recent Work','szia' ),
        'add_new' => __('Add New','szia'),
        'add_new_item' => __('Add New Recent Work','szia'),
        'edit_item' => __('Edit Recent Work','szia'),
        'new_item' => __('New Recent Work','szia'),
        'view_item' => __('View Recent Work','szia'),
        'search_items' => __('Search Recent Works','szia'),
        'not_found' =>  __('No Recent Works found','szia'),
        'not_found_in_trash' => __('No Recent Work found in Trash','szia'),
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
        'supports' => array('title','editor','thumbnail','post-formats'),
        'rewrite' => array( 'slug' => __('recent-works', 'szia') )
    );

    register_post_type( 'szia-recent-works', $args);
    
}