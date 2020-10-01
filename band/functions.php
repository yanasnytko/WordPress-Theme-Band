<?php

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// STYLES
function band_styles_scripts()
{
  wp_register_style('band-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('band-style');

  wp_register_style('band-googlefont', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900');
  wp_enqueue_style('band-googlefont');

  wp_register_style('band-font', get_template_directory_uri() . '/fonts/font-awesome.min.css');
  wp_enqueue_style('band-font');

  //register js
  wp_register_script(
    'band-plugins',
    get_template_directory_uri() . '/js/plugins.js',
    array('jquery')
  );
  wp_register_script(
    'band-app',
    get_template_directory_uri() . '/js/app.js',
    array('jquery', 'band-plugins')
  );
  //Enque js
  wp_enqueue_script('band-plugins');
  wp_enqueue_script('band-app');

  // IE9
  wp_register_script(
    'ie-support-html5',
    get_template_directory_uri() . '/js/ie-support/html5.js',
    array('jquery', 'band-plugins', 'band-app')
  );
  wp_script_add_data('ie-support-html5', 'conditional', 'lt IE 9');

  wp_register_script(
    'ie-support-respond',
    get_template_directory_uri() . '/js/ie-support/respond.js',
    array('jquery', 'band-plugins', 'band-app', 'ie-support-html5')
  );
  wp_script_add_data('ie-support-respond', 'conditional', 'lt IE 9');
}
add_action('wp_enqueue_scripts', 'band_styles_scripts');

// INITIALISATION : Nav + Discography + Gallery
function on_band_init()
{
  //on enregistre le menu
  register_nav_menu('header_menu', 'Header Menu');

  // Register Custom Post Type
  $labels = array(
    'name'                  => _x('Albums', 'Post Type General Name', 'band'),
    'singular_name'         => _x('Album', 'Post Type Singular Name', 'band'),
    'menu_name'             => __('Albums', 'band'),
    'name_admin_bar'        => __('Album', 'band'),
    'archives'              => __('Album Archives', 'band'),
    'attributes'            => __('Album Attributes', 'band'),
    'parent_item_colon'     => __('Parent Album:', 'band'),
    'all_items'             => __('All Albums', 'band'),
    'add_new_item'          => __('Add New Album', 'band'),
    'add_new'               => __('Add New', 'band'),
    'new_item'              => __('New Album', 'band'),
    'edit_item'             => __('Edit Album', 'band'),
    'update_item'           => __('Update Album', 'band'),
    'view_item'             => __('View Album', 'band'),
    'view_items'            => __('View Albums', 'band'),
    'search_items'          => __('Search Album', 'band'),
    'not_found'             => __('Not found', 'band'),
    'not_found_in_trash'    => __('Not found in Trash', 'band'),
    'featured_image'        => __('Featured Image', 'band'),
    'set_featured_image'    => __('Set featured image', 'band'),
    'remove_featured_image' => __('Remove featured image', 'band'),
    'use_featured_image'    => __('Use as featured image', 'band'),
    'insert_into_item'      => __('Insert into album', 'band'),
    'uploaded_to_this_item' => __('Uploaded to this album', 'band'),
    'items_list'            => __('Albums list', 'band'),
    'items_list_navigation' => __('Albums list navigation', 'band'),
    'filter_items_list'     => __('Filter albums list', 'band'),
  );

  $args = array(
    'label'                 => __('Album', 'band'),
    'description'           => __('Discography of Band', 'band'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'menu_icon'             => 'dashicons-format-audio',
  );
  register_post_type('album', $args);

  //on enregistre les catégories pour la galerie
  $labels = array(
    'name'                  => _x('Media categories', 'band'),
    'singular_name'         => _x('Media category', 'band'),
    'search_items'          => __('Search Media categories', 'band'),
    'all_items'             => __('All Media categories', 'band'),
    'parent_item'           => __('Parent Media category', 'band'),
    'parent_item_colon'     => __('Parent Media category:', 'band'),
    'edit_item'             => __('Edit Media category', 'band'),
    'update_item'           => __('Update Media category', 'band'),
    'add_new_item'          => __('Add New Media category', 'band'),
    'new_item_name'         => __('New Media category Name', 'band'),
    'menu_name'             => __('Media categories', 'band'),
  );

  $args = array(
    'labels'                => $labels,
    'hierarchical'          => true,
    'query_var'             => true,
    'rewrite'               => true,
    'show_admin_column'     => true,
    'show_ui'               => true,
    'update_count_callback' => '_update_generic_term_count',
  );
  register_taxonomy('media_category', 'attachment', $args);
  register_taxonomy_for_object_type('media_category', 'attachment');

  // ACF Page d'option
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
      'page_title' => 'Theme General Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
    ));
    acf_add_options_sub_page(array(
      'page_title' => 'Theme Header Settings',
      'menu_title' => 'Header',
      'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title' => 'Theme Footer Settings',
      'menu_title' => 'Footer',
      'parent_slug' => 'theme-general-settings',
    ));
  }
}
//on ajoute une action pour détecter l’initialisation
add_action('init', 'on_band_init');

// RESPONSIVE
function band_menu_responsive($menu, $args)
{
  // we check that we have the right menu
  if ('header_menu' == $args->theme_location) {
    //we add the button
    $button = '<button type="button" class="toggle-menu"><i class="fa fabars"></i></button>';
    $menu = preg_replace('/(<nav(.*?)>)/', '${1}' . $button, $menu);
  }
  return $menu;
}
add_action('wp_nav_menu', 'band_menu_responsive', 9, 2);