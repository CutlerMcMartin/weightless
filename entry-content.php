<div class="entry-content">
    
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
    <?php endif; ?>

    <?php the_content(); ?>
    
    <div class="entry-links"><?php wp_link_pages(); ?></div>
</div>