<?php 
$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

$containerClass = '';
if($option['blog_container_width']!=''){
    $containerClass = $option['blog_container_width'];
}

$columnLayoutClass = '';
if($option['blog_column']==4){
    $columnLayoutClass = 'col-lg-3 col-md-6 col-sm-6';
}else if($option['blog_column']==3){
    $columnLayoutClass = 'col-lg-4 col-md-6 col-sm-6';
}else{
    $columnLayoutClass = 'col-lg-6 col-md-6 col-sm-6';
}

if($option['blog_enable']==true){
?>
<div id="blog" class="jsgroup-section jsgroup-blog">
    <div class="">
        <div class="<?php echo esc_attr( $containerClass ); ?>">
            <div class="row jsgroup-header">
                <div class="col-md-12">
                    <?php if( $option['blog_title'] != '' ){ ?>
                    <h2 class="jsgroup-title"><?php echo wp_kses_post($option['blog_title']); ?></h2>
                    <?php } ?>

                    <?php if($option['blog_subtitle']!=''){ ?>
                    <p class="jsgroup-subtitle"><?php echo wp_kses_post($option['blog_subtitle']); ?></p>
                    <?php } ?>
                </div>                  
            </div>
            <div class="row">

                <?php
                $args = array(
                    'posts_per_page' => $option['blog_to_show'],
                    'suppress_filters' => 0,
                );
                if ( $option['blog_cat'] > 0 ) {
                                $args['category__in'] = array( $option['blog_cat'] );
                            }
                            
                if ( $option['blog_orderby'] && $option['blog_orderby'] != 'default' ) {
                    $args['orderby'] = $option['blog_orderby'];
                }

                if ( $option['blog_order']) {
                    $args['order'] = $option['blog_order'];
                }

                $query = new WP_Query( $args );
                ?>
                
                <?php if ( $query->have_posts() ) : ?>
                
                <?php /* Start the Loop */ ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="<?php echo esc_attr( $columnLayoutClass ); ?>">
                     <div class="jsblog-wrap">
                        <div class="jsblog-inner">

                            <?php if( has_post_thumbnail() ): ?>
                            <div class="jsblog-image-area">
                                <a class="jsblog-image" href="<?php the_permalink(); ?>">
                                <?php 
                                the_post_thumbnail('large');
                                ?>
                                </a>
                            </div>
                            <?php else: ?>
                            <div class="jsblog-image-area text-center">
                                <h4><?php _e('No Image','jewelry-store'); ?></h4>
                            </div>
                            <?php endif; ?>

                            <div class="jsblog-content">
                                <div class="jsblog-author-image">
                                    <?php 
                                    $author_avatar_size = apply_filters( 'jewelry_store_author_avatar_size', 50 );
                                    printf( '<a href="%3$s">%1$s<span class="screen-reader-text">%2$s</span></a>',
                                        get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
                                        _x( 'Author', 'Used before post author name.', 'jewelry-store' ),
                                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
                                    );
                                    ?>
                                </div>
                                <a class="jsblog-title" href="<?php the_permalink(); ?>">
                                    <?php the_title('<h3>','</h3>'); ?>
                                </a>
                                <div class="jsblog-date"><?php the_date( get_option('date_format') ); ?></div>
                                <div class="blog-content">
                                    <?php
                                        the_excerpt();
                                    ?>                                    
                                </div>                                
                            </div>
                        </div>
                    </div>                      
                </div><!-- end .col-md-4 -->
                <?php endwhile; ?>
                
                <?php else : ?>
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div><!-- end .jsgroup-blog -->
<?php } ?>