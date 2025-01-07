<?php

/**
||-> CPT - [mt_job]
*/
function mt_jobs_cpt() {

    register_post_type('mt_job', array(
                        'label' => __('Jobs','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'job', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-money',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Jobs','modeltheme'),
                            'singular_name' => __('Job','modeltheme'),
                            'menu_name' => __('MT Jobs','modeltheme'),
                            'add_new' => __('Add Job','modeltheme'),
                            'add_new_item' => __('Add New Job','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Job','modeltheme'),
                            'new_item' => __('New Job','modeltheme'),
                            'view' => __('View Job','modeltheme'),
                            'view_item' => __('View Job','modeltheme'),
                            'search_items' => __('Search Jobs','modeltheme'),
                            'not_found' => __('No Jobs Found','modeltheme'),
                            'not_found_in_trash' => __('No Jobs Found in Trash','modeltheme'),
                            'parent' => __('Parent Job','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'mt_jobs_cpt');

/**
||-> TAX - [mt_job_type]
||-> CPT - [mt_job]
*/
function mt_job_type_taxonomy() {
    
    $labels = array(
        'name'                       => _x( 'Job Types', 'Taxonomy General Name', 'modeltheme' ),
        'singular_name'              => _x( 'Job', 'Taxonomy Singular Name', 'modeltheme' ),
        'menu_name'                  => __( 'Job Types', 'modeltheme' ),
        'all_items'                  => __( 'All Items', 'modeltheme' ),
        'parent_item'                => __( 'Parent Item', 'modeltheme' ),
        'parent_item_colon'          => __( 'Parent Item:', 'modeltheme' ),
        'new_item_name'              => __( 'New Item Name', 'modeltheme' ),
        'add_new_item'               => __( 'Add New Item', 'modeltheme' ),
        'edit_item'                  => __( 'Edit Item', 'modeltheme' ),
        'update_item'                => __( 'Update Item', 'modeltheme' ),
        'view_item'                  => __( 'View Item', 'modeltheme' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'modeltheme' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'modeltheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'modeltheme' ),
        'popular_items'              => __( 'Popular Items', 'modeltheme' ),
        'search_items'               => __( 'Search Items', 'modeltheme' ),
        'not_found'                  => __( 'Not Found', 'modeltheme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'mt_job_type', array( 'mt_job' ), $args );
}
add_action( 'init', 'mt_job_type_taxonomy' );



/**

||-> CPT - [testimonial]

*/
function smartowl_testimonial_custom_post() {

    register_post_type('mt_testimonial', array(
                        'label' => __('Testimonials','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'testimonial', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-format-status',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Testimonials','modeltheme'),
                            'singular_name' => __('Testimonial','modeltheme'),
                            'menu_name' => __('MT Testimonials','modeltheme'),
                            'add_new' => __('Add Testimonial','modeltheme'),
                            'add_new_item' => __('Add New Testimonial','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Testimonial','modeltheme'),
                            'new_item' => __('New Testimonial','modeltheme'),
                            'view' => __('View Testimonial','modeltheme'),
                            'view_item' => __('View Testimonial','modeltheme'),
                            'search_items' => __('Search Testimonials','modeltheme'),
                            'not_found' => __('No Testimonials Found','modeltheme'),
                            'not_found_in_trash' => __('No Testimonials Found in Trash','modeltheme'),
                            'parent' => __('Parent Testimonial','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'smartowl_testimonial_custom_post');





/**

||-> CPT - [client]

*/
function connection_client_custom_post() {

    register_post_type('Clients', array(
                        'label' => __('Clients','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'client', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-businessman',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Clients','modeltheme'),
                            'singular_name' => __('Client','modeltheme'),
                            'menu_name' => __('MT Clients','modeltheme'),
                            'add_new' => __('Add Client','modeltheme'),
                            'add_new_item' => __('Add New Client','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Client','modeltheme'),
                            'new_item' => __('New Client','modeltheme'),
                            'view' => __('View Client','modeltheme'),
                            'view_item' => __('View Client','modeltheme'),
                            'search_items' => __('Search Clients','modeltheme'),
                            'not_found' => __('No Clients Found','modeltheme'),
                            'not_found_in_trash' => __('No Clients Found in Trash','modeltheme'),
                            'parent' => __('Parent Client','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'connection_client_custom_post');


/**

||-> CPT - [member]

*/
// function smartowl_members_custom_post() {

//     register_post_type('member', array(
//                         'label' => __('Members','modeltheme'),
//                         'description' => '',
//                         'public' => true,
//                         'show_ui' => true,
//                         'show_in_menu' => true,
//                         'capability_type' => 'post',
//                         'map_meta_cap' => true,
//                         'hierarchical' => false,
//                         'rewrite' => array('slug' => 'member', 'with_front' => true),
//                         'query_var' => true,
//                         'menu_position' => '1',
//                         'menu_icon' => 'dashicons-businessman',
//                         'supports' => array('title','editor','thumbnail','author','excerpt'),
//                         'labels' => array (
//                             'name' => __('Members','modeltheme'),
//                             'singular_name' => __('Member','modeltheme'),
//                             'menu_name' => __('MT Members','modeltheme'),
//                             'add_new' => __('Add Member','modeltheme'),
//                             'add_new_item' => __('Add New Member','modeltheme'),
//                             'edit' => __('Edit','modeltheme'),
//                             'edit_item' => __('Edit Member','modeltheme'),
//                             'new_item' => __('New Member','modeltheme'),
//                             'view' => __('View Member','modeltheme'),
//                             'view_item' => __('View Member','modeltheme'),
//                             'search_items' => __('Search Members','modeltheme'),
//                             'not_found' => __('No Members Found','modeltheme'),
//                             'not_found_in_trash' => __('No Members Found in Trash','modeltheme'),
//                             'parent' => __('Parent Member','modeltheme'),
//                             )
//                         ) 
//                     ); 
// }
// add_action('init', 'smartowl_members_custom_post');


/**

||-> CPT - [member] category


*/
// function smartowl_members_category_custom_post() {
    
//     $labels = array(
//         'name'                       => _x( 'Categories', 'Taxonomy General Name', 'modeltheme' ),
//         'singular_name'              => _x( 'Members', 'Taxonomy Singular Name', 'modeltheme' ),
//         'menu_name'                  => __( 'Members Categories', 'modeltheme' ),
//         'all_items'                  => __( 'All Items', 'modeltheme' ),
//         'parent_item'                => __( 'Parent Item', 'modeltheme' ),
//         'parent_item_colon'          => __( 'Parent Item:', 'modeltheme' ),
//         'new_item_name'              => __( 'New Item Name', 'modeltheme' ),
//         'add_new_item'               => __( 'Add New Item', 'modeltheme' ),
//         'edit_item'                  => __( 'Edit Item', 'modeltheme' ),
//         'update_item'                => __( 'Update Item', 'modeltheme' ),
//         'view_item'                  => __( 'View Item', 'modeltheme' ),
//         'separate_items_with_commas' => __( 'Separate items with commas', 'modeltheme' ),
//         'add_or_remove_items'        => __( 'Add or remove items', 'modeltheme' ),
//         'choose_from_most_used'      => __( 'Choose from the most used', 'modeltheme' ),
//         'popular_items'              => __( 'Popular Items', 'modeltheme' ),
//         'search_items'               => __( 'Search Items', 'modeltheme' ),
//         'not_found'                  => __( 'Not Found', 'modeltheme' ),
//     );
//     $args = array(
//         'labels'                     => $labels,
//         'hierarchical'               => true,
//         'public'                     => true,
//         'show_ui'                    => true,
//         'show_admin_column'          => true,
//         'show_in_nav_menus'          => true,
//         'show_tagcloud'              => true,
//     );
//     register_taxonomy( 'mt-member-category', array( 'member' ), $args );
// }
// add_action( 'init', 'smartowl_members_category_custom_post' );







// function modeltheme_events_cpt() {

//     register_post_type('mt_event', array(
//                         'label' => __('Events','modeltheme'),
//                         'description' => '',
//                         'public' => true,
//                         'show_ui' => true,
//                         'show_in_menu' => true,
//                         'capability_type' => 'post',
//                         'map_meta_cap' => true,
//                         'hierarchical' => false,
//                         'rewrite' => array('slug' => 'events', 'with_front' => true),
//                         'query_var' => true,
//                         'menu_position' => '1',
//                         'menu_icon' => 'dashicons-calendar-alt',
//                         'supports' => array('title','editor','thumbnail','author','excerpt','comments'),
//                         'labels' => array (
//                             'name' => __('Events','modeltheme'),
//                             'singular_name' => __('Event','modeltheme'),
//                             'menu_name' => __('MT Events','modeltheme'),
//                             'add_new' => __('Add Event','modeltheme'),
//                             'add_new_item' => __('Add New Event','modeltheme'),
//                             'edit' => __('Edit','modeltheme'),
//                             'edit_item' => __('Edit Event','modeltheme'),
//                             'new_item' => __('New Event','modeltheme'),
//                             'view' => __('View Event','modeltheme'),
//                             'view_item' => __('View Event','modeltheme'),
//                             'search_items' => __('Search Events','modeltheme'),
//                             'not_found' => __('No Events Found','modeltheme'),
//                             'not_found_in_trash' => __('No Events Found in Trash','modeltheme'),
//                             'parent' => __('Parent Event','modeltheme'),
//                             )
//                         ) 
//                     ); 
// }
// add_action('init', 'modeltheme_events_cpt');

// ?>