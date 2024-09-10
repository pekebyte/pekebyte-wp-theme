<?php

/**
 * Theme setup.
 */
function pekebyte_one_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'pekebyte-one' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'pekebyte_one_setup' );

/**
 * Enqueue theme assets.
 */
function pekebyte_one_enqueue_scripts() {
	$theme = wp_get_theme();
	$version = $theme->get( 'Version' );
	$version = time();
	wp_enqueue_style( 'pekebyte-one', pekebyte_one_asset( 'css/app.css' ), array(), $version );
	wp_enqueue_style( 'pekebyte-one-prism', pekebyte_one_asset( 'css/prisma.css' ), array('pekebyte-one'), $version );
	wp_enqueue_script( 'pekebyte-one', pekebyte_one_asset( 'js/app.js' ), array(), $version );
	wp_enqueue_script( 'pekebyte-one-prism', pekebyte_one_asset( 'js/prism.js' ), array('pekebyte-one'), $version );
}

add_action( 'wp_enqueue_scripts', 'pekebyte_one_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function pekebyte_one_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function pekebyte_one_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'pekebyte_one_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function pekebyte_one_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'pekebyte_one_nav_menu_add_submenu_class', 10, 3 );

/**
 * Retrieve the last child category of a post given an post ID
 * 
 * @return WP_Term
 */

 function get_the_last_child_category($post_id) {
	//Get all terms associated with post in taxonomy 'category'
	$terms = get_the_terms($post_id,'category');
	//Get an array of their IDs
	$term_ids = wp_list_pluck($terms,'term_id');
	//Get array of parents - 0 is not a parent
	$parents = array_filter(wp_list_pluck($terms,'parent'));
	//Get array of IDs of terms which are not parents.
	$term_ids_not_parents = array_diff($term_ids,  $parents);
	//Get corresponding term objects
	$terms_not_parents = array_intersect_key($terms,  $term_ids_not_parents);
	//Return the last category that doesn't have a parent
	$cat = $terms_not_parents[count($term_ids_not_parents) - 1];
	return $cat;
 }


/**
 * Retrieve the icon of the post depending on the last category.
 * 
 * @return string
 */

function get_cat_icon($cat) {
	$file = "";
	switch($cat->slug) {
		case "magento":
			$file = pekebyte_one_asset("images/icons/magento.svg");
			break;
		case "wordpress":
			$file = pekebyte_one_asset("images/icons/wordpress.svg");
			break;
		case "php":
			$file = pekebyte_one_asset("images/icons/php.svg");
			break;
		default:
			$file = "";
		break;
	}
	return $file;
}

/**
 * Retrieve the estimated reading time of a post
 * 
 * @return string
 */
function get_the_reading_time($post_id) {
	$content = get_post_field( 'post_content', $post_id );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	
	if ($readingtime == 1) {
	$timer = __('minute');
	} else {
	$timer = __('minutes');
	}
	printf (__('Reading time %d %s'), $readingtime, $timer);
	
}
