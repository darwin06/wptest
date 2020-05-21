<?php

// * Initial Setup
function darwin06_setup()
{
  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
  add_theme_support('title-tag');

  /*
	* set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	*/
  if (!isset($content_width)) {
    $content_width = 1200;
  }

  /*
	* Enable support for Post Thumbnails on posts and pages.
	*/
  add_theme_support('post-thumbnails');

  add_image_size('medium', get_option('medium_size_w'), get_option('medium_size_h'), array('center', 'center'));
  add_image_size('large', get_option('large_size_w'), get_option('large_size_h'), array('center', 'center'));

  //* Register Custom Navigation Walker
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

  // * Register Menus.
  register_nav_menus(array(
    'primary'   =>  __('Primary Menu', 'mytheme'),
    'footer' => __('Footer Menu', 'mytheme')
  ));

  /*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
  add_theme_support('html5', array(
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'search-form'
  ));

  /*
	* Enable support for Post Formats.
	*/
  add_theme_support('post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'audio',
  ));

  // Add theme support for Custom Logo.
  add_theme_support('custom-logo');

  // Add theme support for custom background
  $defaultsBg = array(
    'default-color'          => '#efefef',
    'default-image'          => '',
    'default-repeat'         => 'no-repeat',
    'default-position-x'     => 'center',
    'default-position-y'     => 'top',
    'default-size'           => 'auto',
    'default-attachment'     => 'scroll',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
  );
  add_theme_support('custom-background', $defaultsBg);

  // Add theme support for custom header
  $defaultsHdr = array(
    'default-image'          => '',
    'random-default'         => false,
    'width'                  => 1410,
    'height'                 => 480,
    'flex-height'            => true,
    'flex-width'             => true,
    'default-text-color'     => '',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
    'video'                  => false,
    'video-active-callback'  => 'is_front_page',
  );
  add_theme_support('custom-header', $defaultsHdr);

  // Editor Styles
  add_theme_support('align-wide');
  add_theme_support('editor-styles');
  add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'darwin06_setup');

// Scripts & Styles
function darwin06_scripts()
{
  // Load main stylesheet
  wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '35');
  // Bootstrap JS
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true);
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true);
  // Main JS
  wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery', 'bootstrap-js'), null, true);
}
add_action('wp_enqueue_scripts', 'darwin06_scripts');

// Sidebars
function darwin06_widgets_init()
{
  register_sidebar(array(
    'name' => __('Primary Sidebar', 'mytheme'),
    'id'   => 'primary-sidebar'
  ));
  register_sidebar(array(
    'name' => __('Archive Sidebar', 'mytheme'),
    'id'   => 'archive-sidebar'
  ));
}
add_action('widgets_init', 'darwin06_widgets_init');

// Remove admin bar bump
function darwin06_remove_admin_bar_bump()
{
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'darwin06_remove_admin_bar_bump');

// * Upload SVG files
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function doms_nav_li_classes($classes, $item, $args)
{
  if ($args->theme_location === 'footer') {
    $classes[] = 'nav-item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'doms_nav_li_classes', 10, 4);

function doms_nav_anchor_classes($atts, $item, $args, $depth)
{
  if ($args->theme_location === 'footer') {
    $atts['class'] = 'nav-link';
    $atts['aria_label'] = 'item';
  }

  return $atts;
}
add_filter('nav_menu_link_attributes', 'doms_nav_anchor_classes', 10, 4);

function my_theme_wrapper_start()
{
  if (is_active_sidebar('primary-sidebar')) {
?>
    <div class="col-12 col-md-8 content">
    <?php
  } else {
    ?>
      <div class="col-12 content">
    <?php
  }
}

function my_theme_wrapper_end()
{
  echo '</div>';
}
