<?php 
/* ==========================================================================
  GLOBAL
========================================================================== */
// theme support
add_theme_support('menus');
add_theme_support('post-thumbnails');

// add image size
set_post_thumbnail_size( 230, 248 ); // default Post Thumbnail dimensions
update_option('thumbnail_crop', 1);
add_image_size('bg-desktop', 1680, 1050, true);
add_image_size('bg-tablet', 768, 480, true);
add_image_size('bg-phone', 480, 300, true);

// Register Navigation Menus
function custom_navigation_menus() {

 $locations = array(
    'header_menu' => __( 'Header Menu', THEME_NAME ),
    'footer_menu' => __( 'Footer Menu', THEME_NAME ),
 );
 register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'custom_navigation_menus' );

// Register Sidebar
function custom_sidebars() {

 $blog = array(
    'id'            => 'blog_sidebar',
    'name'          => __( 'Blog Sidebar', THEME_NAME ),
    'class'         => 'blog-sidebar',
 );
 $subpage = array(
    'id'            => 'subpage_sidebar',
    'name'          => __( 'Subpage Sidebar', THEME_NAME ),
    'class'         => 'subpage-sidebar',
 );
 register_sidebar( $blog );
 register_sidebar( $subpage );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'custom_sidebars' );

// Disable the Wordpress Admin Bar for all but admins.
if (!current_user_can('administrator')):
show_admin_bar(false);
endif;

function prevent_admin_access() {
  if (strpos(strtolower($_SERVER['REQUEST_URI']), '/wp-admin') !== false && !current_user_can('administrator')) {
      wp_redirect( home_url() );
  }
}; ?>