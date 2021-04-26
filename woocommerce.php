<?php get_header(); ?>

    <?php get_template_part('section-all/section-breadcrumb'); ?>
    
    <div id="main" class="main main-content woocommerce_content">
        <div class="">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-<?php if(!is_active_sidebar('woocommerce')){ echo '12'; }else{ echo '8'; } ?> primary">
                        <article class="blog_post">
                            <div class="post_content">
                                <?php woocommerce_content(); ?>
                            </div>
                        </article>                   
                    </div><!-- end .col-md-8 -->

                    <?php get_sidebar('woocommerce'); ?>       
                                            
                </div>
            </div>
        </div>
    </div><!-- end .jsgroup-blog -->
    
</div><!-- end .site -->

<?php get_footer(); ?>