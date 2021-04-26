<article id="post-<?php the_ID(); ?>" <?php post_class('blog_post'); ?>>
    <div class="post_content">
        <h3 class="entry-title">
            <a>
                <?php _e( 'Nothing Found', 'jewelry-store' ); ?>
            </a>
        </h3>
        
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'jewelry-store' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

        <?php else : ?>

            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'jewelry-store' ); ?></p>
            <?php
                get_search_form();

        endif; ?>
    </div>
</article>