
<article <?php post_class(); ?>>
      <div class="entry-summary pure-g">
            <?php
            if ( has_post_thumbnail() ) {
                  ?>
                  <div class="pure-u-1 pure-u-md-2-3 ">
                        <a href="<?php the_permalink(); ?>">
                              <?php
                              the_post_thumbnail();
                              ?>
                        </a>
                  </div>
                  <div class="pure-u-1 pure-u-md-1-3 pl15">
                        <?php get_template_part( 'templates/entry-header' ); ?>
                        <?php the_excerpt(); ?>
                        <?php
                        if ( get_post_gallery() ) :
                              $gallery = get_post_gallery( $post, false );
                              $ids = explode( ',', $gallery[ 'ids' ] );
                              $selected = array_slice( $ids, 0, 2 );
                              ?>
                              <div class="pure-g">
                                    <?php
                                    foreach ( $selected as $id ) {
                                          /* d( ( int ) $id ); */
                                          ?>
                                          <div class="pure-u-1 pure-u-md-1-2">
                                                <?php
                                                echo wp_get_attachment_link( ( int ) $id, '350-150-thumb', false );
                                                ?>
                                          </div>
                                          <?php
                                    }
                                    ?>
                              </div>
                              <?php
                        endif;
                        ?>
                  </div>
                  <?php
            } else {
                  ?>
                  <div class="pure-u-1 pl15">
                        <?php the_excerpt(); ?>

                  </div>
                  <?php
            }
            ?>
      </div>
</article>
