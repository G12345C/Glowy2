<?php $option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() ); ?>

<?php do_action( 'jewelry_store_before_site_end' ); ?>

</div><!-- end .site -->

<?php 

$column = absint( $option['footer_column_layout'] );
$max_cols = 12;
$layouts = 12;
if ( $column > 1 ){
    $default = "12";
    switch ( $column ) {
        case 4:
            $default = '3+3+3+3';
            break;
        case 3:
            $default = '4+4+4';
            break;
        case 2:
            $default = '6+6';
            break;
    }
    $layouts = sanitize_text_field( isset($option['footer_custom_'.$column.'_columns'])?$option['footer_custom_'.$column.'_columns']:$default );
}

$layouts = explode( '+', $layouts );
foreach ( $layouts as $k => $v ) {
    $v = absint( trim( $v ) );
    $v =  $v >= $max_cols ? $max_cols : $v;
    $layouts[ $k ] = $v;
}

$have_widgets = false;

for ( $count = 0; $count < $column; $count++ ) {
    $slidebar_id = 'footer-' . ( $count + 1 );
    if ( is_active_sidebar( $slidebar_id ) ) {
        $have_widgets = true;
    }
}

$class = '';
if($option['footer_back_image']){
    $class = 'jsgroup-section has_bg_image';
}
if($option['footer_layout']!=''){
    $class .= ' ' .$option['footer_layout'];
}
$class = trim($class);

$footerwidget_containerClass = '';
if($option['footerwidget_container_width']!=''){
    $footerwidget_containerClass = $option['footerwidget_container_width'];
}

$footercopyright_containerClass = '';
if($option['footercopyright_container_width']!=''){
    $footercopyright_containerClass = $option['footercopyright_container_width'];
}
?>
<div id="site-footer" class="site-footer <?php echo esc_attr($class); ?>" role="site-footer">

        <?php if($option['footer_back_image']){ ?>
        <div class="jsgroup-bg">
            <img src="<?php echo esc_url($option['footer_back_image']); ?>">
        </div>
        <div class="section-overlay">
        <?php } ?>

        <?php if ( $column > 0 && $have_widgets ) { ?>
		<div class="footer-columns">
            <div class="<?php echo esc_attr( $footerwidget_containerClass ); ?>">
                <div class="row">
                    <?php
                     for ( $count = 0; $count < $column; $count++ ) {
                     $col = isset( $layouts[ $count ] ) ? $layouts[ $count ] : '';
                     $slidebar_id = 'footer-' . ( $count + 1 );
                     if ( $col ) {
                    ?>
                    <div id="jewelry-store-footer-<?php echo esc_attr( $count + 1 ) ?>" class="col-lg-<?php echo esc_attr( $col ); ?> col-md-6 col-sm-6">
                        <?php dynamic_sidebar( $slidebar_id ); ?>
                    </div>
                    <?php 
                        }
                    } 
                    ?>
                </div>
            </div>
		</div>
		<div class="clearfix"></div>
        <?php } ?>

        <?php if (has_nav_menu('footer')) { ?>
		<div class="footer-menu">
            <div class="<?php echo esc_attr( $footerwidget_containerClass ); ?>">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php 
                            wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-menu',
                            'container' => 'ul',
                            ) ); 
                          ?>
                    </div>
                </div>
            </div>
		</div>
		<div class="clearfix"></div>
        <?php } ?>
        
		<div class="footer-copyright">
            <div class="<?php echo esc_attr( $footercopyright_containerClass ); ?>">
                <div class="row">
                    <div class="col-md-12 copy-border">
                        <p class="copyright-text"><?php echo wp_kses_post( $option['footer_copyright_text'] ); ?></p>
                    </div>
                </div>
            </div>
		</div><!-- end .footer-copyright -->

      <?php if($option['footer_back_image']){ ?>
      </div>
      <?php } ?>
      
	</div><!-- end .site-footer -->

    <?php if( $option['back_to_top_show'] == true ){ ?>

    <?php 
    $backtotop_class = '';
    $backtotop_style = isset($option['back_to_top_style']) ? $option['back_to_top_style'] : '';
    $backtotop_align = isset($option['back_to_top_align']) ? $option['back_to_top_align'] : '';

    if(!empty($backtotop_style)){
        $backtotop_class .= $backtotop_style;
    }

    if(!empty($backtotop_align)){
        $backtotop_class .= ' '.$backtotop_align;
    }

    $backtotop_class = trim( $backtotop_class );
    ?>
    <a class="back_to_top <?php echo esc_attr( $backtotop_class ); ?>" href="#" title="<?php _e('Back To Top','jewelry-store'); ?>">
        <i class="fa fa-angle-up"></i>
    </a>
    <?php } ?>
    
    <?php wp_footer(); ?>
  </body>
</html>