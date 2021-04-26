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
        if ( is_sticky() && is_home() && ! is_paged() ) : ?>
            <span class="sticky-post"><?php _e( 'Featured', 'jewelry-store' ); ?></span>
        <?php endif;
        
        if ( is_single() ) {
            the_title( '<h3 class="entry-title">', '</h3>' );
        }elseif ( is_front_page() && is_home() ) {
            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        } else {
            the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
        }
        ?>
        
        <?php
            /* translators: %s: Name of current post */
            the_content( sprintf(
                __( 'Read More <i class="fa fa-angle-double-right"></i>', 'jewelry-store' ),
                get_the_title()
            ) );

            wp_link_pages( array(
                'before'      => '<div class="page-links">' . __( 'Pages:', 'jewelry-store' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ) );
            ?>

        <div class="entry-footer">
            <span class="post_author"><i class="fa fa-user"></i>  <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author_link(); ?></a></span>
            <span class="post_author"><i class="fa fa-clock-o"></i>  <?php the_time( get_option('date_format') ); ?></span>

            <?php 
            $separate_meta = __( ', ', 'jewelry-store' );
            $categories_list = get_the_category_list( $separate_meta );
            if( ( $categories_list ) ){
            ?>
            <span class="post_author"><i class="fa fa-file-text-o"></i>  <?php echo $categories_list; ?></span>
            <?php } ?>

            <?php 
            $separate_meta = __( ', ', 'jewelry-store' );
            $tags_list = get_the_tag_list( ' ', $separate_meta, '' );
            if( ( $tags_list ) ){
            ?>
            <span class="post_author"><i class="fa fa-tag"></i>  <?php echo $tags_list; ?></span>
            <?php } ?>
        </div>
    </div>
</article>