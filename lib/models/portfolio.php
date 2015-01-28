<?php

$portfolios = new CPT( array(
      'post_type_name' => 'portfolio',
      'singular' => 'Portfolio',
      'plural' => 'Portfolios',
      'slug' => 'portfolio'
          ), array(
      'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'custom-fields', 'comments' ),
      'has_archive' => TRUE
          )
);


add_action( 'after_setup_theme', 'register_portfolio_image_sizes' );

function register_portfolio_image_sizes() {
      /*
       */
      add_theme_support( 'post-thumbnails', array( 'portfolio' ) );
      add_image_size( '350-150-thumb', 350, 150, true ); //archive
      /*
        add_image_size( '1024-600-single', 1024, 600, array( 'center', 'center' ) ); //single
        add_image_size( '1024-1024-single-true', 1024, 1024 ); //single
       */
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
      return array_merge( $sizes, array(
            '350-150-thumb' => __( '350 * 150- -gallery cropped Size' )
                ) );
      /* '1024-600-single' => __( '1024 * 600 -Single Size' ), */
}

function remove_shortcode_from_portfolio( $content ) {
      if ( is_singular( 'portfolio' ) ) {
            $content = strip_shortcodes( $content );
      }
      return $content;
}

add_filter( 'the_content', 'remove_shortcode_from_portfolio' );
