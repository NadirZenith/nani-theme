<?php

/**
 * Clean up the_excerpt()
 */
function nzpure_excerpt_more() {
      return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', 'nzpure' ) . '</a>';
}

add_filter( 'excerpt_more', 'nzpure_excerpt_more' );

add_filter( 'comment_form_default_fields', 'url_filtered' );

function url_filtered( $fields ) {
      if ( isset( $fields[ 'url' ] ) )
            unset( $fields[ 'url' ] );
      return $fields;
}
