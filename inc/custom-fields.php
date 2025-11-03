<?php
/**
 * Custom Fields Configuration (ACF)
 * Install Advanced Custom Fields Pro to use these fields
 * Or manually create them in the ACF interface
 *
 * @package Pekebyte
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register ACF field groups programmatically
 * This requires ACF Pro to be installed
 */
if (function_exists('acf_add_local_field_group')) :

    /**
     * Portfolio Fields
     */
    acf_add_local_field_group(array(
        'key' => 'group_portfolio_fields',
        'title' => 'Portfolio Fields',
        'fields' => array(
            array(
                'key' => 'field_portfolio_technologies',
                'label' => 'Technologies',
                'name' => 'portfolio_technologies',
                'type' => 'repeater',
                'instructions' => 'Add technologies used in this project',
                'required' => 0,
                'sub_fields' => array(
                    array(
                        'key' => 'field_technology',
                        'label' => 'Technology',
                        'name' => 'technology',
                        'type' => 'text',
                        'required' => 1,
                    ),
                ),
                'button_label' => 'Add Technology',
            ),
            array(
                'key' => 'field_portfolio_features',
                'label' => 'Features',
                'name' => 'portfolio_features',
                'type' => 'repeater',
                'instructions' => 'Add key features of this project',
                'required' => 0,
                'sub_fields' => array(
                    array(
                        'key' => 'field_feature',
                        'label' => 'Feature',
                        'name' => 'feature',
                        'type' => 'text',
                        'required' => 1,
                    ),
                ),
                'button_label' => 'Add Feature',
            ),
            array(
                'key' => 'field_portfolio_demo_url',
                'label' => 'Demo URL',
                'name' => 'portfolio_demo_url',
                'type' => 'url',
                'instructions' => 'Link to live demo',
                'required' => 0,
            ),
            array(
                'key' => 'field_portfolio_github_url',
                'label' => 'GitHub URL',
                'name' => 'portfolio_github_url',
                'type' => 'url',
                'instructions' => 'Link to GitHub repository',
                'required' => 0,
            ),
            array(
                'key' => 'field_portfolio_gallery',
                'label' => 'Project Gallery',
                'name' => 'portfolio_gallery',
                'type' => 'gallery',
                'instructions' => 'Add additional images for this project',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
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

    /**
     * Tutorial Fields
     */
    acf_add_local_field_group(array(
        'key' => 'group_tutorial_fields',
        'title' => 'Tutorial Fields',
        'fields' => array(
            array(
                'key' => 'field_tutorial_video_id',
                'label' => 'YouTube Video ID',
                'name' => 'tutorial_video_id',
                'type' => 'text',
                'instructions' => 'Enter the YouTube video ID (e.g., dpw9EHDh2bM)',
                'required' => 0,
                'placeholder' => 'dpw9EHDh2bM',
            ),
            array(
                'key' => 'field_tutorial_duration',
                'label' => 'Duration',
                'name' => 'tutorial_duration',
                'type' => 'text',
                'instructions' => 'Enter the tutorial duration (e.g., 15 min)',
                'required' => 0,
                'placeholder' => '15 min',
            ),
            array(
                'key' => 'field_tutorial_topics',
                'label' => 'Topics Covered',
                'name' => 'tutorial_topics',
                'type' => 'repeater',
                'instructions' => 'Add topics covered in this tutorial',
                'required' => 0,
                'sub_fields' => array(
                    array(
                        'key' => 'field_topic',
                        'label' => 'Topic',
                        'name' => 'topic',
                        'type' => 'text',
                        'required' => 1,
                    ),
                ),
                'button_label' => 'Add Topic',
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

endif;