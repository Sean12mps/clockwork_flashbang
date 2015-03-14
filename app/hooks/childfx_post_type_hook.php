<?php 
/*	CUSTOM POST TYPE AND TAXONOMIES
 *	- POST TYPE project
 *	- TAXONOMY brand
 *	- TAXONOMY designer
 *	- TAXONOMY furniture_tag
 *	- POST TYPE product
 */

/*	POST TYPE project
 */
add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

    $labels = array( 
        'name' => _x( 'project', 'project' ),
        'singular_name' => _x( 'project', 'project' ),
        'add_new' => _x( 'Add New', 'project' ),
        'add_new_item' => _x( 'Add New project', 'project' ),
        'edit_item' => _x( 'Edit project', 'project' ),
        'new_item' => _x( 'New project', 'project' ),
        'view_item' => _x( 'View project', 'project' ),
        'search_items' => _x( 'Search project', 'project' ),
        'not_found' => _x( 'No project found', 'project' ),
        'not_found_in_trash' => _x( 'No project found in Trash', 'project' ),
        'parent_item_colon' => _x( 'Parent project:', 'project' ),
        'menu_name' => _x( 'project', 'project' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'project', $args );
}




/*	TAXONOMY furniture_tag
 */
add_action( 'init', 'register_taxonomy_furniture_tag' );

function register_taxonomy_furniture_tag() {

    $labels = array( 
        'name' => _x( 'furniture_tag', 'furniture_tag' ),
        'singular_name' => _x( 'furniture_tags', 'furniture_tag' ),
        'search_items' => _x( 'Search furniture_tag', 'furniture_tag' ),
        'popular_items' => _x( 'Popular furniture_tag', 'furniture_tag' ),
        'all_items' => _x( 'All furniture_tag', 'furniture_tag' ),
        'parent_item' => _x( 'Parent furniture_tags', 'furniture_tag' ),
        'parent_item_colon' => _x( 'Parent furniture_tags:', 'furniture_tag' ),
        'edit_item' => _x( 'Edit furniture_tags', 'furniture_tag' ),
        'update_item' => _x( 'Update furniture_tags', 'furniture_tag' ),
        'add_new_item' => _x( 'Add New furniture_tags', 'furniture_tag' ),
        'new_item_name' => _x( 'New furniture_tags', 'furniture_tag' ),
        'separate_items_with_commas' => _x( 'Separate furniture_tag with commas', 'furniture_tag' ),
        'add_or_remove_items' => _x( 'Add or remove furniture_tag', 'furniture_tag' ),
        'choose_from_most_used' => _x( 'Choose from most used furniture_tag', 'furniture_tag' ),
        'menu_name' => _x( 'furniture_tag', 'furniture_tag' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'furniture_tag', array('furniture_tags'), $args );
}



/*	TAXONOMY brand
 */
add_action( 'init', 'register_taxonomy_brand' );

function register_taxonomy_brand() {

    $labels = array( 
        'name' => _x( 'brand', 'brand' ),
        'singular_name' => _x( 'brands', 'brand' ),
        'search_items' => _x( 'Search brand', 'brand' ),
        'popular_items' => _x( 'Popular brand', 'brand' ),
        'all_items' => _x( 'All brand', 'brand' ),
        'parent_item' => _x( 'Parent brands', 'brand' ),
        'parent_item_colon' => _x( 'Parent brands:', 'brand' ),
        'edit_item' => _x( 'Edit brands', 'brand' ),
        'update_item' => _x( 'Update brands', 'brand' ),
        'add_new_item' => _x( 'Add New brands', 'brand' ),
        'new_item_name' => _x( 'New brands', 'brand' ),
        'separate_items_with_commas' => _x( 'Separate brand with commas', 'brand' ),
        'add_or_remove_items' => _x( 'Add or remove brand', 'brand' ),
        'choose_from_most_used' => _x( 'Choose from most used brand', 'brand' ),
        'menu_name' => _x( 'brand', 'brand' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'brand', array('brands'), $args );
}



/*	TAXONOMY designer
 */
add_action( 'init', 'register_taxonomy_designer' );

function register_taxonomy_designer() {

    $labels = array( 
        'name' => _x( 'designer', 'designer' ),
        'singular_name' => _x( 'designers', 'designer' ),
        'search_items' => _x( 'Search designer', 'designer' ),
        'popular_items' => _x( 'Popular designer', 'designer' ),
        'all_items' => _x( 'All designer', 'designer' ),
        'parent_item' => _x( 'Parent designers', 'designer' ),
        'parent_item_colon' => _x( 'Parent designers:', 'designer' ),
        'edit_item' => _x( 'Edit designers', 'designer' ),
        'update_item' => _x( 'Update designers', 'designer' ),
        'add_new_item' => _x( 'Add New designers', 'designer' ),
        'new_item_name' => _x( 'New designers', 'designer' ),
        'separate_items_with_commas' => _x( 'Separate designer with commas', 'designer' ),
        'add_or_remove_items' => _x( 'Add or remove designer', 'designer' ),
        'choose_from_most_used' => _x( 'Choose from most used designer', 'designer' ),
        'menu_name' => _x( 'designer', 'designer' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'designer', array('designers'), $args );
}



/*	POST TYPE product
 */
add_action( 'init', 'register_cpt_furniture' );

function register_cpt_furniture() {

    $labels = array( 
        'name' => _x( 'furniture', 'furniture' ),
        'singular_name' => _x( 'furniture', 'furniture' ),
        'add_new' => _x( 'Add New', 'furniture' ),
        'add_new_item' => _x( 'Add New furniture', 'furniture' ),
        'edit_item' => _x( 'Edit furniture', 'furniture' ),
        'new_item' => _x( 'New furniture', 'furniture' ),
        'view_item' => _x( 'View furniture', 'furniture' ),
        'search_items' => _x( 'Search furniture', 'furniture' ),
        'not_found' => _x( 'No furniture found', 'furniture' ),
        'not_found_in_trash' => _x( 'No furniture found in Trash', 'furniture' ),
        'parent_item_colon' => _x( 'Parent furniture:', 'furniture' ),
        'menu_name' => _x( 'furniture', 'furniture' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array( 'brand', 'designer', 'furniture_tag' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'furniture', $args );
}