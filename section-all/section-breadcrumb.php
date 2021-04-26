<?php
$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

$class = '';
if($option['subheader_layout']!=''){
    $class = $option['subheader_layout'];
}

$containerClass = '';
if($option['subheader_container_width']!=''){
    $containerClass = $option['subheader_container_width'];
}

$columnClass1 = 'col-lg-12 col-md-12 col-sm-12 text-'.$option['subheader_text_align'];
$columnClass2 = 'col-lg-12 col-md-12 col-sm-12 text-'.$option['subheader_text_align'];
if($option['subheader_layout']=='layout2'){
	$columnClass1 = 'col-lg-6 col-md-6 col-sm-12 text-left';
	$columnClass2 = 'col-lg-6 col-md-6 col-sm-12 text-right';
}

$bg = '';
if($option['subheader_bg_image']){
	$bg = 'background-image:url('.esc_url( $option['subheader_bg_image'] ).');';
	$class .= ' has_bg_image';
}
$class = trim($class);
?>
<div class="jsgroup-page-header <?php echo esc_attr( $class ); ?>" style="<?php echo esc_attr( $bg ); ?>">
    <div class="<?php echo esc_attr( $containerClass ); ?>">

    	<?php if($option['subheader_bg_image']){ ?>
    	<div class="overlay"></div>
    	<?php } ?>
        <div class="row">
            <div class="<?php echo esc_attr( $columnClass1 ); ?>">
                <h1 class="page-title"><?php 
						if ( is_day() ) : 
						
							printf( __( 'Daily Archives: %s', 'jewelry-store' ), get_the_date() );
						
						elseif ( is_month() ) :
						
							printf( __( 'Monthly Archives: %s', 'jewelry-store' ), (get_the_date( 'F Y' ) ));
							
						elseif ( is_year() ) :
						
							printf( __( 'Yearly Archives: %s', 'jewelry-store' ), (get_the_date( 'Y' ) ) );
							
						elseif ( is_category() ) :
						
							printf( __( 'Category Archives: %s', 'jewelry-store' ), (single_cat_title( '', false ) ));

						elseif ( is_tag() ) :
						
							printf( __( 'Tag Archives: %s', 'jewelry-store' ), (single_tag_title( '', false ) ));
							
						elseif ( is_404() ) :

							printf( __( 'Error 404', 'jewelry-store' ));
							
						elseif ( is_author() ) :
						
							printf( __( 'Author: %s', 'jewelry-store' ), (get_the_author( '', false ) ));

						elseif ( is_archive() ):		
							
							printf( __( '%s', 'jewelry-store' ), (get_the_archive_title( '', false ) ));

						else :
								the_title();
						endif;
					?></h1>
            </div>
            <div class="<?php echo esc_attr( $columnClass2 ); ?>">
                <ul class="breadcrumbs">
                    <?php 
                    if ( function_exists('jewelry_store_breadcrumbs') ) {
                    	jewelry_store_breadcrumbs();
                	}
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!-- end .jsgroup-page-header -->