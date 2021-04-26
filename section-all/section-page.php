<div id="main" class="main main-content">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12 primary p-0">
                <?php
                
                if ( have_posts() ) :                      
                    
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content/post/content', 'pagehome' );
                        
                    endwhile;

                    
                endif;
                ?>                        
            </div><!-- end .col-md-12 -->

        </div>
    </div>
</div><!-- end .jsgroup-blog -->