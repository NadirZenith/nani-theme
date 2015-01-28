<div class="top-bar">

      <div id="social-area-top">
            <?php
            $socials = array(
                  'facebook' => array(
                        'url' => 'https://www.facebook.com/danieladuarte.pet',
                  )
            );
            ?>
            <?php nz_fa_social_icons( $socials, 'social-icons-top social-icons' ); ?>

            <?php //echo nz_fb_like_iframe( 'https://www.facebook.com/danieladuarte.pet' ); ?>
            <?php echo nz_fb_like_iframe( 'https://www.facebook.com/danieladuarte.pet' ); ?>

      </div>

</div>
<div class="main-menu">
      <nav class="pure-menu pure-menu-open pure-menu-horizontal" role="navigation">

            <a class="pure-menu-heading" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <img src="<?php echo get_template_directory_uri() . "/assets/img/ddexlogo.png" ?>" width="180" title="<?php bloginfo( 'name' ); ?>"/>
            </a>


            <?php
            if ( has_nav_menu( 'primary_navigation' ) ) :
                  wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'walker' => new NzPure_Nav_Walker(), 'menu_class' => 'nav navbar-nav' ) );
            endif;
            ?>


      </nav>
</div>