<?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
            <div class="pure-g">
                  <div class=" pure-u-md-1-3">

                        <?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                              the_post_thumbnail( 'large' );
                        }
                        ?>
                  </div>
                  <header class=" pure-u-md-2-3 pl15">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <div class="entry-content pl15">
                              <?php the_content(); ?>
                        </div>
                  </header>
            </div>
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
            <footer>
                  <?php wp_link_pages( array( 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'nzpure' ), 'after' => '</p></nav>' ) ); ?>
            </footer>
            <?php comments_template( '/templates/comments.php' ); ?>
      </article>
<?php endwhile; ?>
