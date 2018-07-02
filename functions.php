<?php

/*
  =============================================================================
   Setup Theme
  =============================================================================
*/
function maggie_setup_theme() {
  add_theme_support('post-thumbnails'); // allows to use feature image
  register_nav_menu('primary', __('Primary Menu', 'custom'));
}

add_action('after_setup_theme', 'maggie_setup_theme');

/*
  =============================================================================
   Enqueue Scripts
  =============================================================================
*/
function maggie_enqueue_scripts() {
  wp_register_style('custom_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
  wp_register_style('custom_hamburger', get_template_directory_uri() . '/assets/css/hamburger.min.css');
  wp_register_style('custom_animations', get_template_directory_uri() . '/assets/css/animations.min.css');
  wp_register_style('custom_fontawesome', 'https://use.fontawesome.com/releases/v5.0.12/css/all.css');
  wp_register_style('custom_aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
  wp_register_style('custom_style', get_template_directory_uri() . '/assets/css/style.css');

  wp_enqueue_style('custom_bootstrap');
  wp_enqueue_style('custom_hamburger');
  wp_enqueue_style('custom_animations');
  wp_enqueue_style('custom_fontawesome');
  wp_enqueue_style('custom_aos');
  wp_enqueue_style('custom_style');

  wp_register_script('custom_aos_script', 'https://unpkg.com/aos@2.3.1/dist/aos.js', null, null, true);
  wp_register_script('custom_script', get_template_directory_uri() . '/assets/js/custom.js', array(), false, true);

  wp_enqueue_script('jquery');
  wp_enqueue_script('custom_aos_script');
  wp_enqueue_script('custom_script');
}

add_action('wp_enqueue_scripts', 'maggie_enqueue_scripts');

/*
  =============================================================================
   Widgets Init
  =============================================================================
*/
function maggie_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Main Sidebar', 'custom' ),
      'id'            => 'custom_sidebar',
      'description'   => __( 'Sidebar for Custom Theme', 'custom' ),
      'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
    ));
}

add_action('widgets_init', 'maggie_widgets_init');

/*
  =============================================================================
   Custom Post Types
  =============================================================================
*/
function maggie_custom_post_type () {
  $portfolio_labels = array(
    'name'                => 'Portfolio',
    'singular_name'       => 'Portfolio',
    'add_new'             => 'Add Item',
    'all_items'           => 'All Items',
    'add_new_item'        => 'Add Item',
    'edit_item'           => 'Edit Item',
    'new_item'            => 'New Item',
    'view_item'           => 'View Item',
    'search_item'         => 'Search Item',
    'not_found'           => 'No Items found',
    'not_found_in_trash'  => 'No items found in trash',
    'parent_item_colon'   => 'Parent item'
  );
  $portfolio_args = array(
    'labels'              => $portfolio_labels,
    'public'              => true,
    'has_archive'         => true,
    'publicly_queryable'  => true,
    'query_var'           => true,
    'rewrite'             => true,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'supports'             => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions'
    ),
    'taxonomies'          => array('category', 'post_tag'),
    'menu_position'       => 5,
    'exclude_from_search' => false
  );

  register_post_type('portfolio', $portfolio_args);

  $experiments_labels = array(
    'name'                => 'Experiments',
    'singular_name'       => 'Experiments',
    'add_new'             => 'Add Item',
    'all_items'           => 'All Items',
    'add_new_item'        => 'Add Item',
    'edit_item'           => 'Edit Item',
    'new_item'            => 'New Item',
    'view_item'           => 'View Item',
    'search_item'         => 'Search Item',
    'not_found'           => 'No Items found',
    'not_found_in_trash'  => 'No items found in trash',
    'parent_item_colon'   => 'Parent item'
  );
  $experiments_args = array(
    'labels'              => $experiments_labels,
    'public'              => true,
    'has_archive'         => true,
    'publicly_queryable'  => true,
    'query_var'           => true,
    'rewrite'             => true,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'supports'             => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions'
    ),
    'taxonomies'          => array('category', 'post_tag'),
    'menu_position'       => 5,
    'exclude_from_search' => false
  );
  register_post_type('experiments', $experiments_args);

  $social_labels = array(
    'name'                => 'Social',
    'singular_name'       => 'Social',
    'add_new'             => 'Add Item',
    'all_items'           => 'All Items',
    'add_new_item'        => 'Add Item',
    'edit_item'           => 'Edit Item',
    'new_item'            => 'New Item',
    'view_item'           => 'View Item',
    'search_item'         => 'Search Item',
    'not_found'           => 'No Items found',
    'not_found_in_trash'  => 'No items found in trash',
    'parent_item_colon'   => 'Parent item'
  );
  $social_args = array(
    'labels'              => $social_labels,
    'public'              => true,
    'has_archive'         => true,
    'publicly_queryable'  => true,
    'query_var'           => true,
    'rewrite'             => true,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'supports'             => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions'
    ),
    'menu_position'       => 5,
    'exclude_from_search' => false
  );

  register_post_type('social', $social_args);
}

add_action('init', 'maggie_custom_post_type');

/*
  =============================================================================
   Custom Settings
  =============================================================================
*/

/*
 * Register settings
 */
function maggie_register_settings()
{
    register_setting(
        'general',
        'custom_options_creator_name'
    );
    add_settings_section(
        'site-guide',
        'Site created by',
        '__return_false',
        'general'
    );
    add_settings_field(
        'creator_name',
        'Creator Name',
        'custom_options_creator_name',
        'general',
        'site-guide'
    );
}

/*
 * Print settings field content
 */
function custom_options_creator_name()
{
  echo '<input type="text" name="custom_options_creator_name" value="'.get_option('custom_options_creator_name').'" />';
}

add_action('admin_init', 'maggie_register_settings');

?>
