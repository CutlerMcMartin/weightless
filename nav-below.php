<?php $weightless_args = array(
    /* translators: %s: The previous text */
    'prev_text' => sprintf( esc_html__( '%s older', 'weightless' ), '<span class="meta-nav">&larr;</span>' ),
    /* translators: %s: The next text */
    'next_text' => sprintf( esc_html__( 'newer %s', 'weightless' ), '<span class="meta-nav">&rarr;</span>' )
);

the_posts_navigation( $weightless_args );