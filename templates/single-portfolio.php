<?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
            <div class="pure-g bg-primary" style="">
                  <div class=" pure-u-md-1-3 ">
                        <?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                              the_post_thumbnail( 'large' );
                        }
                        ?>
                  </div>
                  <header class=" pure-u-md-2-3 pl15" style="">
                        <?php
                        $terms = get_the_term_list( get_the_ID(), 'tecnica' );
                        if ( $terms ) {
                              ?>
                              <div class="fr m5">
                                    <?php the_terms( get_the_ID(), 'tecnica', '', '' ); ?>
                              </div>
                              <?php
                        }
                        ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="entry-content pl15">
                              <?php the_content(); ?>
                        </div>
                        <div>
                              nice
                              <?php echo nz_fb_like( get_the_permalink() ); ?>
                        </div>
                  </header>
            </div>
            <?php
            //new gallery
            if ( get_post_gallery() && true ) :
                  $gallery = get_post_gallery( $post, false ); //ids, columns, size, src[]
                  $size = (isset( $gallery[ 'size' ] )) ? $gallery[ 'size' ] : 'large';
                  $ids = explode( ',', $gallery[ 'ids' ] );
                  ?>
                  <div class="gallery">
                        <div class="pure-g">
                              <?php
                              $last = 'portrait';
                              foreach ( $ids as $id ) {
                                    $img = wp_get_attachment_metadata( $id, false );
                                    if ( is_landscape( $img[ 'width' ], $img[ 'height' ] ) && $last != 'landscape' ) {
                                          $last = 'landscape';
                                          $class = 'pure-u-md-2-3';
                                    } else {
                                          $last = 'portrait';
                                          $class = 'pure-u-md-1-3';
                                    }
                                    /* d( ( int ) $id ); */
                                    ?>
                                    <div class="pure-u-1 <?php echo $class; ?>" style="max-height: 250px;">
                                          <?php
                                          //echo wp_get_attachment_link( ( int ) $id, '350-150-thumb', false );
                                          //echo wp_get_attachment_link( ( int ) $id, $size, false );

                                          $upload = wp_upload_dir();
                                          $attachmeta = wp_get_attachment_metadata( $id, true );
                                          $base = dirname( $attachmeta[ 'file' ] );
                                          $attachsize = $attachmeta[ 'sizes' ][ $size ];
                                          $imgsrc = $upload[ 'baseurl' ] . '/' . $base . '/' . $attachsize[ 'file' ];
                                          echo '<a href="' . $imgsrc . '" class="fancybox" data-fancybox-group="gallery">';
                                          echo '<img width="' . $attachsize[ 'width' ] . '" height="' . $attachsize[ 'height' ] . '" alt="' . $attachsize[ 'file' ] . '" class="pure-img" src="' . $imgsrc . '">';
                                          //echo wp_get_attachment_link( ( int ) $id, '350-150-thumb', false );
                                          echo '</a>';
                                          ?>
                                    </div>
                                    <?php
                              }
                              ?>
                        </div>
                  </div>
                  <?php
            endif;
            ?>
            <?php
            if ( get_post_gallery() && false ) :
                  echo get_post_gallery();
            endif;
            ?>
            <footer>
                  <?php wp_link_pages( array( 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'nzpure' ), 'after' => '</p></nav>' ) ); ?>
            </footer>
            <?php comments_template( '/templates/comments.php' ); ?>
      </article>
<?php endwhile; ?>