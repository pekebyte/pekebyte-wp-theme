<?php
/**
 * PekeByte Theme Functions
 *
 * @package PekeByte
 */

// Theme Setup
function pekebyte_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

  register_nav_menus(array(
    'primary' => __('Primary Menu', 'pekebyte'),
    'footer' => __('Footer Menu', 'pekebyte'),
  ));

  add_image_size('portfolio-thumb', 600, 400, true);
  add_image_size('tutorial-thumb', 400, 300, true);
}
add_action('after_setup_theme', 'pekebyte_setup');

// Enqueue Scripts and Styles
function pekebyte_scripts() {
  wp_enqueue_style('pekebyte-style', get_stylesheet_uri(), array(), '1.0.0');
  wp_enqueue_style('pekebyte-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', array(), null);
  wp_enqueue_script('pekebyte-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
  
  wp_localize_script('pekebyte-scripts', 'pekebyteAjax', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('pekebyte_nonce')
  ));
}
add_action('wp_enqueue_scripts', 'pekebyte_scripts');

// Register Custom Post Type: Portfolio
function pekebyte_register_portfolio_cpt() {
  $labels = array(
    'name' => _x('Portfolio', 'Post Type General Name', 'pekebyte'),
    'singular_name' => _x('Portfolio Item', 'Post Type Singular Name', 'pekebyte'),
    'menu_name' => __('Portfolio', 'pekebyte'),
    'all_items' => __('All Items', 'pekebyte'),
    'add_new_item' => __('Add New Item', 'pekebyte'),
  );

  $args = array(
    'label' => __('Portfolio', 'pekebyte'),
    'labels' => $labels,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'public' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-portfolio',
    'has_archive' => true,
    'rewrite' => array('slug' => 'portfolio'),
  );

  register_post_type('portfolio', $args);
}
add_action('init', 'pekebyte_register_portfolio_cpt', 0);

// Register Custom Post Type: Tutorial
function pekebyte_register_tutorial_cpt() {
  $labels = array(
    'name' => _x('Tutorials', 'Post Type General Name', 'pekebyte'),
    'singular_name' => _x('Tutorial', 'Post Type Singular Name', 'pekebyte'),
    'menu_name' => __('Tutorials', 'pekebyte'),
    'all_items' => __('All Tutorials', 'pekebyte'),
    'add_new_item' => __('Add New Tutorial', 'pekebyte'),
  );

  $args = array(
    'label' => __('Tutorial', 'pekebyte'),
    'labels' => $labels,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
    'public' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'has_archive' => true,
    'rewrite' => array('slug' => 'tutorials'),
  );

  register_post_type('tutorial', $args);
}
add_action('init', 'pekebyte_register_tutorial_cpt', 0);

// Register Taxonomies
function pekebyte_register_taxonomies() {
  register_taxonomy('portfolio_category', 'portfolio', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => __('Portfolio Categories', 'pekebyte'),
      'singular_name' => __('Portfolio Category', 'pekebyte'),
    ),
    'show_ui' => true,
    'show_admin_column' => true,
    'rewrite' => array('slug' => 'portfolio-category'),
  ));

  register_taxonomy('tutorial_category', 'tutorial', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => __('Tutorial Categories', 'pekebyte'),
      'singular_name' => __('Tutorial Category', 'pekebyte'),
    ),
    'show_ui' => true,
    'show_admin_column' => true,
    'rewrite' => array('slug' => 'tutorial-category'),
  ));

  register_taxonomy('technology', array('portfolio', 'tutorial'), array(
    'hierarchical' => false,
    'labels' => array(
      'name' => __('Technologies', 'pekebyte'),
      'singular_name' => __('Technology', 'pekebyte'),
    ),
    'show_ui' => true,
    'show_admin_column' => true,
    'rewrite' => array('slug' => 'technology'),
  ));
}
add_action('init', 'pekebyte_register_taxonomies', 0);

// ACF Custom Fields Configuration
function pekebyte_acf_fields() {
  if (function_exists('acf_add_local_field_group')) {
    
    // Portfolio Fields
    acf_add_local_field_group(array(
      'key' => 'group_portfolio',
      'title' => 'Portfolio Details',
      'fields' => array(
        array(
          'key' => 'field_client',
          'label' => 'Client',
          'name' => 'client',
          'type' => 'text',
        ),
        array(
          'key' => 'field_project_url',
          'label' => 'Project URL',
          'name' => 'project_url',
          'type' => 'url',
        ),
        array(
          'key' => 'field_github_url',
          'label' => 'GitHub URL',
          'name' => 'github_url',
          'type' => 'url',
        ),
        array(
          'key' => 'field_media_gallery',
          'label' => 'Media Gallery',
          'name' => 'media_gallery',
          'type' => 'repeater',
          'sub_fields' => array(
            array(
              'key' => 'field_media_type',
              'label' => 'Media Type',
              'name' => 'media_type',
              'type' => 'select',
              'choices' => array(
                'image' => 'Image',
                'video' => 'Video (YouTube)',
              ),
            ),
            array(
              'key' => 'field_media_image',
              'label' => 'Image',
              'name' => 'media_image',
              'type' => 'image',
              'conditional_logic' => array(
                array(
                  array(
                    'field' => 'field_media_type',
                    'operator' => '==',
                    'value' => 'image',
                  ),
                ),
              ),
            ),
            array(
              'key' => 'field_media_video',
              'label' => 'YouTube Video ID',
              'name' => 'media_video',
              'type' => 'text',
              'conditional_logic' => array(
                array(
                  array(
                    'field' => 'field_media_type',
                    'operator' => '==',
                    'value' => 'video',
                  ),
                ),
              ),
            ),
          ),
        ),
        array(
          'key' => 'field_technologies',
          'label' => 'Technologies Used',
          'name' => 'technologies_used',
          'type' => 'text',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'portfolio',
          ),
        ),
      ),
    ));

    // Tutorial Fields
    acf_add_local_field_group(array(
      'key' => 'group_tutorial',
      'title' => 'Tutorial Details',
      'fields' => array(
        array(
          'key' => 'field_difficulty',
          'label' => 'Difficulty Level',
          'name' => 'difficulty',
          'type' => 'select',
          'choices' => array(
            'beginner' => 'Beginner',
            'intermediate' => 'Intermediate',
            'advanced' => 'Advanced',
          ),
        ),
        array(
          'key' => 'field_duration',
          'label' => 'Duration',
          'name' => 'duration',
          'type' => 'text',
        ),
        array(
          'key' => 'field_video_url',
          'label' => 'Video URL',
          'name' => 'video_url',
          'type' => 'url',
        ),
        array(
          'key' => 'field_github_repo',
          'label' => 'GitHub Repository',
          'name' => 'github_repo',
          'type' => 'url',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'tutorial',
          ),
        ),
      ),
    ));

    // About Page Fields
    acf_add_local_field_group(array(
      'key' => 'group_about',
      'title' => 'About Page Content',
      'fields' => array(
        array(
          'key' => 'field_skills',
          'label' => 'Skills',
          'name' => 'skills',
          'type' => 'repeater',
          'sub_fields' => array(
            array(
              'key' => 'field_skill_name',
              'label' => 'Skill Name',
              'name' => 'skill_name',
              'type' => 'text',
            ),
            array(
              'key' => 'field_skill_level',
              'label' => 'Skill Level',
              'name' => 'skill_level',
              'type' => 'number',
              'min' => 0,
              'max' => 100,
            ),
          ),
        ),
        array(
          'key' => 'field_certifications',
          'label' => 'Certifications',
          'name' => 'certifications',
          'type' => 'repeater',
          'sub_fields' => array(
            array(
              'key' => 'field_cert_title',
              'label' => 'Title',
              'name' => 'cert_title',
              'type' => 'text',
            ),
            array(
              'key' => 'field_cert_org',
              'label' => 'Organization',
              'name' => 'cert_org',
              'type' => 'text',
            ),
            array(
              'key' => 'field_cert_year',
              'label' => 'Year',
              'name' => 'cert_year',
              'type' => 'text',
            ),
          ),
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-about.php',
          ),
        ),
      ),
    ));
  }
}
add_action('acf/init', 'pekebyte_acf_fields');

// Contact Form Handler
function pekebyte_handle_contact_form() {
  check_ajax_referer('pekebyte_nonce', 'nonce');

  $name = sanitize_text_field($_POST['name']);
  $email = sanitize_email($_POST['email']);
  $message = sanitize_textarea_field($_POST['message']);

  $to = get_option('admin_email');
  $subject = 'Contact Form: ' . $name;
  $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

  if (wp_mail($to, $subject, $body)) {
    wp_send_json_success(array('message' => __('Message sent!', 'pekebyte')));
  } else {
    wp_send_json_error(array('message' => __('Failed to send.', 'pekebyte')));
  }
}
add_action('wp_ajax_contact_form', 'pekebyte_handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'pekebyte_handle_contact_form');

// Theme Customizer
function pekebyte_customize_register($wp_customize) {
  $wp_customize->add_section('pekebyte_social', array(
    'title' => __('Social Media Links', 'pekebyte'),
    'priority' => 30,
  ));

  $social_networks = array('github', 'linkedin', 'twitter', 'youtube');
  
  foreach ($social_networks as $network) {
    $wp_customize->add_setting('pekebyte_' . $network, array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('pekebyte_' . $network, array(
      'label' => ucfirst($network) . ' URL',
      'section' => 'pekebyte_social',
      'type' => 'url',
    ));
  }
}
add_action('customize_register', 'pekebyte_customize_register');

// Flush rewrite rules
function pekebyte_rewrite_flush() {
  pekebyte_register_portfolio_cpt();
  pekebyte_register_tutorial_cpt();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'pekebyte_rewrite_flush');
