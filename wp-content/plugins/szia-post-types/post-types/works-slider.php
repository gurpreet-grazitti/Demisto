<?php
add_action( 'init', 'register_szia_work_slider_postype' );

function register_szia_work_slider_postype() {

    $labels = array(
        'name' => __( 'Work Sliders','szia'),
        'singular_name' => __( 'Work Slider','szia' ),
        'add_new' => __('Add New','szia'),
        'add_new_item' => __('Add New Work Slider','szia'),
        'edit_item' => __('Edit Work Slider','szia'),
        'new_item' => __('New Work Slider','szia'),
        'view_item' => __('View Work Slider','szia'),
        'search_items' => __('Search Work Sliders','szia'),
        'not_found' =>  __('No Work Sliders found','szia'),
        'not_found_in_trash' => __('No Work Slider found in Trash','szia'),
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
        'rewrite' => array( 'slug' => __('work-slider', 'szia') )
    );

    register_post_type( 'szia-work-slider', $args);
    
}