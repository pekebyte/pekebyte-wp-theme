<?php
/**
 * Custom Post Types for Pekebyte Theme
 *
 * @package Pekebyte
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Portfolio Custom Post Type
 */
function pekebyte_register_portfolio_cpt() {
    $labels = array(
        'name'                  => _x('Portfolio', 'Post Type General Name', 'pekebyte'),
        'singular_name'         => _x('Portfolio Item', 'Post Type Singular Name', 'pekebyte'),
        'menu_name'             => __('Portfolio', 'pekebyte'),
        'name_admin_bar'        => __('Portfolio Item', 'pekebyte'),
        'archives'              => __('Portfolio Archives', 'pekebyte'),
        'attributes'            => __('Portfolio Attributes', 'pekebyte'),
        'parent_item_colon'     => __('Parent Item:', 'pekebyte'),
        'all_items'             => __('All Items', 'pekebyte'),
        'add_new_item'          => __('Add New Item', 'pekebyte'),
        'add_new'               => __('Add New', 'pekebyte'),
        'new_item'              => __('New Item', 'pekebyte'),
        'edit_item'             => __('Edit Item', 'pekebyte'),
        'update_item'           => __('Update Item', 'pekebyte'),
        'view_item'             => __('View Item', 'pekebyte'),
        'view_items'            => __('View Items', 'pekebyte'),
        'search_items'          => __('Search Item', 'pekebyte'),
    );

    $args = array(
        'label'                 => __('Portfolio', 'pekebyte'),
        'description'           => __('Portfolio projects and work samples', 'pekebyte'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'            => array('portfolio_category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'portfolio',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'portfolio'),
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'pekebyte_register_portfolio_cpt', 0);

/**
 * Register Portfolio Category Taxonomy
 */
function pekebyte_register_portfolio_taxonomy() {
    $labels = array(
        'name'                       => _x('Categories', 'Taxonomy General Name', 'pekebyte'),
        'singular_name'              => _x('Category', 'Taxonomy Singular Name', 'pekebyte'),
        'menu_name'                  => __('Categories', 'pekebyte'),
        'all_items'                  => __('All Categories', 'pekebyte'),
        'parent_item'                => __('Parent Category', 'pekebyte'),
        'parent_item_colon'          => __('Parent Category:', 'pekebyte'),
        'new_item_name'              => __('New Category Name', 'pekebyte'),
        'add_new_item'               => __('Add New Category', 'pekebyte'),
        'edit_item'                  => __('Edit Category', 'pekebyte'),
        'update_item'                => __('Update Category', 'pekebyte'),
        'view_item'                  => __('View Category', 'pekebyte'),
        'separate_items_with_commas' => __('Separate categories with commas', 'pekebyte'),
        'add_or_remove_items'        => __('Add or remove categories', 'pekebyte'),
        'choose_from_most_used'      => __('Choose from the most used', 'pekebyte'),
        'popular_items'              => __('Popular Categories', 'pekebyte'),
        'search_items'               => __('Search Categories', 'pekebyte'),
        'not_found'                  => __('Not Found', 'pekebyte'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => array('slug' => 'portfolio-category'),
    );

    register_taxonomy('portfolio_category', array('portfolio'), $args);
}
add_action('init', 'pekebyte_register_portfolio_taxonomy', 0);

/**
 * Register Tutorial Custom Post Type
 */
function pekebyte_register_tutorial_cpt() {
    $labels = array(
        'name'                  => _x('Tutorials', 'Post Type General Name', 'pekebyte'),
        'singular_name'         => _x('Tutorial', 'Post Type Singular Name', 'pekebyte'),
        'menu_name'             => __('Tutorials', 'pekebyte'),
        'name_admin_bar'        => __('Tutorial', 'pekebyte'),
        'archives'              => __('Tutorial Archives', 'pekebyte'),
        'attributes'            => __('Tutorial Attributes', 'pekebyte'),
        'parent_item_colon'     => __('Parent Tutorial:', 'pekebyte'),
        'all_items'             => __('All Tutorials', 'pekebyte'),
        'add_new_item'          => __('Add New Tutorial', 'pekebyte'),
        'add_new'               => __('Add New', 'pekebyte'),
        'new_item'              => __('New Tutorial', 'pekebyte'),
        'edit_item'             => __('Edit Tutorial', 'pekebyte'),
        'update_item'           => __('Update Tutorial', 'pekebyte'),
        'view_item'             => __('View Tutorial', 'pekebyte'),
        'view_items'            => __('View Tutorials', 'pekebyte'),
        'search_items'          => __('Search Tutorial', 'pekebyte'),
    );

    $args = array(
        'label'                 => __('Tutorial', 'pekebyte'),
        'description'           => __('Programming tutorials and educational content', 'pekebyte'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
        'taxonomies'            => array('tutorial_category', 'tutorial_level'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'tutorials',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'tutorials'),
    );

    register_post_type('tutorial', $args);
}
add_action('init', 'pekebyte_register_tutorial_cpt', 0);

/**
 * Register Tutorial Category Taxonomy
 */
function pekebyte_register_tutorial_category() {
    $labels = array(
        'name'                       => _x('Tutorial Categories', 'Taxonomy General Name', 'pekebyte'),
        'singular_name'              => _x('Tutorial Category', 'Taxonomy Singular Name', 'pekebyte'),
        'menu_name'                  => __('Categories', 'pekebyte'),
        'all_items'                  => __('All Categories', 'pekebyte'),
        'parent_item'                => __('Parent Category', 'pekebyte'),
        'parent_item_colon'          => __('Parent Category:', 'pekebyte'),
        'new_item_name'              => __('New Category Name', 'pekebyte'),
        'add_new_item'               => __('Add New Category', 'pekebyte'),
        'edit_item'                  => __('Edit Category', 'pekebyte'),
        'update_item'                => __('Update Category', 'pekebyte'),
        'view_item'                  => __('View Category', 'pekebyte'),
        'separate_items_with_commas' => __('Separate categories with commas', 'pekebyte'),
        'add_or_remove_items'        => __('Add or remove categories', 'pekebyte'),
        'choose_from_most_used'      => __('Choose from the most used', 'pekebyte'),
        'popular_items'              => __('Popular Categories', 'pekebyte'),
        'search_items'               => __('Search Categories', 'pekebyte'),
        'not_found'                  => __('Not Found', 'pekebyte'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => array('slug' => 'tutorial-category'),
    );

    register_taxonomy('tutorial_category', array('tutorial'), $args);
}
add_action('init', 'pekebyte_register_tutorial_category', 0);

/**
 * Register Tutorial Level Taxonomy
 */
function pekebyte_register_tutorial_level() {
    $labels = array(
        'name'                       => _x('Difficulty Levels', 'Taxonomy General Name', 'pekebyte'),
        'singular_name'              => _x('Difficulty Level', 'Taxonomy Singular Name', 'pekebyte'),
        'menu_name'                  => __('Levels', 'pekebyte'),
        'all_items'                  => __('All Levels', 'pekebyte'),
        'parent_item'                => __('Parent Level', 'pekebyte'),
        'parent_item_colon'          => __('Parent Level:', 'pekebyte'),
        'new_item_name'              => __('New Level Name', 'pekebyte'),
        'add_new_item'               => __('Add New Level', 'pekebyte'),
        'edit_item'                  => __('Edit Level', 'pekebyte'),
        'update_item'                => __('Update Level', 'pekebyte'),
        'view_item'                  => __('View Level', 'pekebyte'),
        'separate_items_with_commas' => __('Separate levels with commas', 'pekebyte'),
        'add_or_remove_items'        => __('Add or remove levels', 'pekebyte'),
        'choose_from_most_used'      => __('Choose from the most used', 'pekebyte'),
        'popular_items'              => __('Popular Levels', 'pekebyte'),
        'search_items'               => __('Search Levels', 'pekebyte'),
        'not_found'                  => __('Not Found', 'pekebyte'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => array('slug' => 'tutorial-level'),
    );

    register_taxonomy('tutorial_level', array('tutorial'), $args);
}
add_action('init', 'pekebyte_register_tutorial_level', 0);

/**
 * Flush rewrite rules on theme activation
 */
function pekebyte_rewrite_flush() {
    pekebyte_register_portfolio_cpt();
    pekebyte_register_portfolio_taxonomy();
    pekebyte_register_tutorial_cpt();
    pekebyte_register_tutorial_category();
    pekebyte_register_tutorial_level();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'pekebyte_rewrite_flush');