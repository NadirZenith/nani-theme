<header>
      <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>

      <?php if ( !is_archive() ) { ?>
            <?php get_template_part( 'templates/entry-meta' ); ?>
      <?php } ?>
</header>