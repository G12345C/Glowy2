<?php
/*
 * Template Name: Page Full Width
 */

get_header(); ?>

<?php get_template_part('section-all/section-breadcrumb'); ?>
    
    <div id="main" class="main main-content">
        <div class="">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 primary">
                        <?php
                        
                        if ( have_posts() ) :                      
                            
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content/post/content', 'page' );
                                
                            endwhile;
                            
                            the_posts_pagination( array(
                                    'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                                    'next_text' => '<i class="fa fa-angle-double-right"></i>',
                                ) );
                        
                        else :
                            
                            get_template_part( 'template-parts/content/post/content', 'none' );
                            
                        endif;
                        ?>                        
                    </div><!-- end .col-md-12 -->                
                                            
                </div>
            </div>
        </div>
    </div><!-- end .jsgroup-blog -->
    
</div><!-- end .site -->
	
<?php get_footer(); ?>