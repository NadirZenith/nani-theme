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
                              <div class="pure-g mt15">
                                    <?php
                                    foreach ( $selected as $id ) {
                                          ?>
                                          <div class="pure-u-1 pure-u-md-1-2">
                                                <?php
                                                $upload = wp_upload_dir();
                                                $attachmeta = wp_get_attachment_metadata( $id, true );
                                                $base = dirname( $attachmeta[ 'file' ] );
                                                $attachsize = $attachmeta[ 'sizes' ][ '350-150-thumb' ];
                                                echo '<a href="' . get_permalink() . '">';
                                                echo '<img width="' . $attachsize[ 'width' ] . '" height="' . $attachsize[ 'height' ] . '" alt="' . $attachsize[ 'file' ] . '" class="pure-img" src="' . $upload[ 'baseurl' ] . '/' . $base . '/' . $attachsize[ 'file' ] . '">';
                                                //echo wp_get_attachment_link( ( int ) $id, '350-150-thumb', false );
                                                echo '</a>';
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
