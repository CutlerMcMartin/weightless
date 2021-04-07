<?php $weightless_args = array(
    'prev_text' => sprintf( esc_html__( '%s older', 'weightless' ), '<span class="meta-nav">&larr;</span>' ),
    'next_text' => sprintf( esc_html__( 'newer %s', 'weightless' ), '<span class="meta-nav">&rarr;</span>' )
);

the_posts_navigation( $weightless_args ); ?>