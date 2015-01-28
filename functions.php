<?php

/**
 * pure includes
 *
 * The $nzpure_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 */
$nzpure_includes = array(
      'lib/init.php', // Initial theme setup and constants
      //optional libs
      'lib/wp-custom-post-type-class/src/CPT.php', // Custom post types class
      'lib/custom-metadata/custom_metadata.php', // Custom metadata class
      'lib/models/common.php', // rewrite assets urls
      'lib/roots-rewrites/roots-rewrites.php', // rewrite assets urls
      'lib/soil/soil.php', // Soil clean up
      'lib/social/facebook-config.php', // facebook
      'lib/social/social-icons-list.php', // social icons list
      //
      'lib/utils.php', // Utility functions
      'lib/wrapper.php', // Theme wrapper class
      'lib/sidebar.php', // Sidebar class
      'lib/config.php', // Configuration
      'lib/activation.php', // Theme activation
      'lib/titles.php', // Page titles
      'lib/nav.php', // Custom nav modifications
      'lib/gallery.php', // Custom [gallery] modifications
      'lib/scripts.php', // Scripts and stylesheets
      'lib/extras.php', // Custom functions
);

foreach ( $nzpure_includes as $file ) {
      if ( !$filepath = locate_template( $file ) ) {
            trigger_error( sprintf( __( 'Error locating %s for inclusion', 'nzpure' ), $file ), E_USER_ERROR );
      }

      require_once $filepath;
}
unset( $file, $filepath );
