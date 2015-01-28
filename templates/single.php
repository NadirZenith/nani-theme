<?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
            <header>
                  <h1 class="entry-title"><?php the_title(); ?></h1>
                  <?php get_template_part( 'templates/entry-meta' ); ?>
            </header>
            <?php
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                  the_post_thumbnail( 'large' );
            }
            ?>
            <div class="entry-content">
                  <?php the_content(); ?>
            </div>
            <footer>
                  <?php wp_link_pages( array( 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'nzpure' ), 'after' => '</p></nav>' ) ); ?>
            </footer>
            <?php comments_template( '/templates/comments.php' ); ?>
      </article>
<?php endwhile; ?>