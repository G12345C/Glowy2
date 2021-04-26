<article id="post-<?php the_ID(); ?>" <?php post_class('blog_post'); ?>>

    <?php if ( '' !== get_the_post_thumbnail() ) : ?>
    <div class="blog_image">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'full' ); ?>
        </a>
    </div>
    <?php endif; ?>

    <div class="post_content">
        <?php
        
        if ( is_single() || is_page() ) {
            the_title( '<h3 class="entry-title">', '</h3>' );
        }elseif ( is_front_page() && is_home() ) {
            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        } else {
            the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
        }
        ?>
        
        <?php
            the_content();
        ?>

        <?php 
        // Edit post link.
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers. */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'jewelry-store' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )
        );
        ?>
    </div>
</article>