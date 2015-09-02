<?php
add_action( 'init', 'register_szia_testimonial_postype' );

function register_szia_testimonial_postype() {

    $labels = array(
        'name' => __( 'Testimonial','szia'),
        'singular_name' => __( 'Testimonial','szia' ),
        'add_new' => __('Add New','szia'),
        'add_new_item' => __('Add New Testimonial','szia'),
        'edit_item' => __('Edit Testimonial','szia'),
        'new_item' => __('New Testimonial','szia'),
        'view_item' => __('View Testimonial','szia'),
        'search_items' => __('Search Testimonial','szia'),
        'not_found' =>  __('No Testimonial found','szia'),
        'not_found_in_trash' => __('No Testimonial found in Trash','szia'),
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
        'supports' => array('title','editor', 'thumbnail'),
        'rewrite' => array( 'slug' => __('tesimonial', 'szia') )
    );

    register_post_type( 'szia-tesimonial', $args);
    
}