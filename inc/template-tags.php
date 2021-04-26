<?php
function jewelry_soter_body_classes( $classes ) {

	$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

		if($option['section_title_layout']=='layout2'){
			$classes = array_merge( $classes, array( 'section_title_layout2' ) );
		}

		if($option['site_layout']=='boxed'){
			return array_merge( $classes, array( 'boxed' ) );
		}else{
			return $classes;
		}
    
}
add_filter( 'body_class', 'jewelry_soter_body_classes');

if ( ! function_exists( 'jewelry_store_logo' ) ) {
	function jewelry_store_logo(){
		$class = array();
		$html = '';
		
		if ( function_exists( 'has_custom_logo' ) ) {
			if ( has_custom_logo()) {
				$html .= get_custom_logo();
			}else{
				if ( is_front_page() && !is_home() ) {
					$html .= '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
				}else{
					$html .= '<p class="site-title">' . get_bloginfo('name') . '</p>';
				}
				
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) {
					$html .= '<p class="site-description">'.$description.'</p>';
				}
			}
		}
		echo '<a class="site-logo '.esc_attr( join( ' ', $class ) ).'" href="' . esc_url(home_url('/')) . '" rel="home">';
				echo wp_kses_post( $html );
		echo '</a>';
	}
}

if ( ! function_exists( 'jewelry_store_load_section' ) ) {
	function jewelry_store_load_section( $Section_Id ){
		
		do_action('jewelry_store_before_section_' . $Section_Id);
        do_action('jewelry_store_before_section_part', $Section_Id);

        get_template_part('section-all/section', $Section_Id );

        do_action('jewelry_store_after_section_part', $Section_Id);
        do_action('jewelry_store_after_section_' . $Section_Id);
	}
}

add_action('wp_head','jewelry_store_primary_color');
function jewelry_store_primary_color(){
	
	$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );
	$color = $option['theme_color'];	
	echo '<style id="jewelry-store-color">';
			jewelry_store_set_color($color);
	echo '</style>';
}

function jewelry_store_set_color( $color = '#EDCA79' ){

	$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

	list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");

	list($sliderOverlayr, $sliderOverlayg, $sliderOverlayb) = sscanf($option['slider_overlay_color'], "#%02x%02x%02x");
	list($subhOverlayr, $subhOverlayg, $subhOverlayb) = sscanf($option['subheader_overlay_color'], "#%02x%02x%02x");
	?>
	:root{
	--theme-primary-color: <?php echo $color; ?>;
	--r: <?php echo $r; ?>;
	--g: <?php echo $g; ?>;
	--b: <?php echo $b; ?>;
	}
	.jsgroup-callout{
		background-color: rgba(<?php echo $r; ?>, <?php echo $g; ?>, <?php echo $b; ?>, 0.5);
	}
	.main-slider .slideitem::after{
		background-color: rgba(<?php echo $sliderOverlayr; ?>,<?php echo $sliderOverlayg; ?>,<?php echo $sliderOverlayb; ?>,<?php echo $option['slider_overlay_color_opacity']; ?>);
	}
	.jsgroup-page-header .overlay {
	    background-color: rgba(<?php echo $subhOverlayr; ?>,<?php echo $subhOverlayg; ?>,<?php echo $subhOverlayb; ?>,<?php echo $option['subheader_overlay_color_opacity']; ?>);
	}
	caption,
	.top-header.bg_primary,
	.site-footer.bg_primary,
	.site-nav .header_right li a:hover,
	.site-nav.navbar-light .navbar-nav .current-menu-item > a,
	.site-nav.navbar-light .navbar-nav .current-menu-item > a:hover,
	.site-nav.navbar-light .navbar-nav .current-menu-item > a:focus,
	.site-nav.navbar-light .navbar-nav .current-menu-ancestor > a,
	.site-nav.navbar-light .navbar-nav .current-menu-ancestor > a:hover,
	.site-nav.navbar-light .navbar-nav .current-menu-ancestor > a:focus,
	.site-nav.navbar-light .navbar-nav .current_page_item > a,
	.main-slider .slideitem .slider-caption .sliderBtn,
	.main-slider .owl-nav .owl-prev,
	.main-slider .owl-nav .owl-next,
	.main-slider .owl-dots .owl-dot.active,
	.jsservice:hover,
	.js-btn.js-primary:hover,
	.product-slider .owl-nav .owl-prev,
	.product-slider .owl-nav .owl-next,
	.product-slider .owl-dots .owl-dot.active,
	.jsgroup-testimonial.layout2 .jstesti-content,
	.jsgroup-testimonial .owl-dots .owl-dot.active,
	.jsgroup-team.layout2 .jsteam-content,
	.jsteam-wrap .jsteam-thumb .jsteam-overlay ul.widget-social li a,
	.jsgroup-team .owl-nav .owl-prev,
	.jsgroup-team .owl-nav .owl-next,
	.jsgroup-contact i.mr-3,
	.jsgroup-gallery.layout2 .gallery-overlay,
	.jsgallery-wrap a.gallery-preview:hover, 
	.jsgallery-wrap a.gallery-preview:focus,
	.project-category-tabs .nav-item .nav-link::after,
	.jsgroup-contactpage ul.contact-social li a,
	.widget_title:after,
	.widget ul.widget-social li a,
	.widget .tagcloud a:hover,
	.widget .tagcloud a:focus,
	.back_to_top,
	button,
	input[type=submit],
	input[type=reset],
	.main-content .blog_post .post_content .more-link,
	.theme-contact-section,
	.about-featured-image:before,
	.about-featured-image:after,
	.jsblog-wrap .more-link{
	  background-color: <?php echo $color; ?>;
	}

	.site-nav.header-fixed-top .site-logo .site-title,
	.site-nav .header_tagline,
	.site-nav .header_right li + li a,
	.site-nav.navbar-light .navbar-nav .menu-item > a:hover,
	.site-nav.navbar-light .navbar-nav .menu-item > a:focus,
	.site-nav.navbar-light .navbar-nav .menu-item:not(.current-menu-item):not(.current-menu-ancestor) a:hover,
	.site-nav.navbar-light .navbar-nav .menu-item:not(.current-menu-item):not(.current-menu-ancestor) a:focus,
	.site-nav.navbar-light.header-fixed-top .navbar-nav .menu-item:not(.current-menu-item):not(.current-menu-ancestor) a:hover,
	.site-nav.navbar-light.header-fixed-top .navbar-nav .menu-item:not(.current-menu-item):not(.current-menu-ancestor) a:focus,
	.site-nav ul.sub-menu,
	.site-nav.navbar-light .navbar-nav ul.sub-menu a:hover,
	.site-nav.navbar-light .navbar-nav ul.sub-menu a:focus,
	.site-nav.navbar-light .navbar-nav ul.sub-menu .current-menu-ancestor a,
	.site-nav.navbar-light .navbar-nav ul.sub-menu .current-menu-item a,
	.site-nav.navbar-light .navbar-nav .page_item > a:hover,
	.site-nav.navbar-light .navbar-nav .page_item > a:focus,
	.site-nav.navbar-light .navbar-nav ul.children .current_page_ancestor a,
	.site-nav.navbar-light .navbar-nav ul.children .current_page_item a,
	.jsgroup-section .jsgroup-header .jsgroup-title span,
	.jsservice .jsservice-inner .icon .service-icon,
	.js-btn.js-primary,
	.js-btn.js-secondary:hover,
	.jsproduct-wrap a:hover,
	.jsproduct-wrap .jsproduct-footer .jsproduct_price,
	.jstesti-wrap .jstesti-pos,
	.jstesti-wrap:after,
	.jsteam-wrap .jsteam-thumb .jsteam-overlay ul.widget-social li a:hover,
	.jsteam-wrap .jsteam-content .jsteam-pos,
	.jstesti-wrap .jstesti-title:hover,
	.jstesti-wrap .jstesti-title:focus,
	.js-gallery-title a:hover,
	.js-gallery-title a:focus,
	.jsteam-wrap .jsteam-content .jsteam-title:hover,
	.jsteam-wrap .jsteam-content .jsteam-title:focus,
	.jsgroup-page-header .breadcrumbs li a:hover,
	.jsgroup-page-header .breadcrumbs li a:focus,
	.jsgroup-about-section .about-page-title span,
	.jsblog-wrap a:hover,
	.project-category-tabs .nav-item.show .nav-link, 
	.project-category-tabs .nav-link.active, 
	.project-category-tabs .nav-link:hover,
	.jsgroup-contactpage ul.contact-social li a:hover,
	.jsgroup-googlemap .google-map-overlay .google-map-overlay-inner ul li i,
	.widget ul.widget-social li a:hover,
	.widget ul.widget-contact label,
	.widget_archive li:before, 
	.widget_meta li:before, 
	.widget_pages li:before, 
	.widget_nav_menu li:before, 
	.widget_recent_entries li:before, 
	.widget_recent_comments li:before, 
	.widget_categories li:before,
	.widget ul li a:hover,
	.widget ol li a:hover,
	.widget a:hover,
	.widget a:focus,
	.site-footer a:hover,
	.site-footer.jsgroup-section .section-overlay a:hover,
	.site-footer.jsgroup-section .section-overlay a:focus,
	.site-footer .footer-menu ul.sub-menu,
	.site-footer .footer-menu ul.sub-menu .menu-item a,
	.main-content .blog_post .post_content .entry-title a:hover, 
	.main-content .blog_post .post_content .entry-title a:focus,
	.main-content .blog_post .post_content .entry-footer span a:hover, 
	.main-content .blog_post .post_content .entry-footer span a:focus,
	.main-content .blog_post a:hover:not(.button,.elementor-button),
	.main-content .blog_post a:focus:not(.button,.elementor-button),
	.main-content .author-block a,
	.post_author i,
	.main-content .post_content a:not(.button,.elementor-button),
	.nav-links .page-numbers.current,
	.comment-metadata a.comment-edit-link,
	.theme-contact-area i,
	.jsgroup-about-section a,
	.comments-area a:hover,
	.comments-area a:focus{
	  color: <?php echo $color; ?>;
	}

	@media (max-width: 992px){
	  .site-nav ul.sub-menu {
	    color: <?php echo $color; ?>;
	  }
	}
	@media(min-width: 992px){
	  .site-nav ul.sub-menu{
	    border-bottom: 3px solid <?php echo $color; ?> !important;
	  }
	}
	@media (max-width: 575.98px) {
		.site-header .navbar-toggler {
		    background-color: <?php echo $color; ?>;
		}
	}
	@media (min-width: 576px) and (max-width: 767.98px) {
		.site-header .navbar-toggler {
		    background-color: <?php echo $color; ?>;
		  }
	}
	@media (min-width: 768px) and (max-width: 991.98px) {
		.site-header .navbar-toggler {
		    background-color: <?php echo $color; ?>;
		  }
	}

	.main-slider .owl-dots .owl-dot,
	.main-slider.layout3 .caption-content,
	.jsgroup-section .jsgroup-header:after,
	.js-btn.js-primary,
	.jsproduct-wrap:hover,
	.product-slider .owl-dots .owl-dot,
	.jstesti-wrap .jstesti-thumb,
	.jsgroup-testimonial .owl-dots .owl-dot,
	.widget .tagcloud a:hover,
	.widget .tagcloud a:focus,
	.site-footer,
	button,
	input[type=submit],
	input[type=reset],
	.main-content .blog_post .blog_image,
	.wp-block-quote:not(.is-large):not(.is-style-large),
	.comment-metadata a.comment-edit-link,
	.contact-form-wrap{
		border-color: <?php echo $color; ?>;
	}

	.jsblog-wrap .more-link:hover {
	  box-shadow: 0 1px 1px <?php echo $color; ?>; 
	}

	<?php	
	$b_fontsize = $option['p_fontsize'];
	$m_fontsize = $option['m_fontsize'];
	$h1_fontsize = $option['h1_fontsize'];
	$h2_fontsize = $option['h2_fontsize'];
	$h3_fontsize = $option['h3_fontsize'];
	$h4_fontsize = $option['h4_fontsize'];
	$h5_fontsize = $option['h5_fontsize'];
	$h6_fontsize = $option['h6_fontsize'];
	$st_fontsize = $option['section_title_fontsize'];
	$sd_fontsize = $option['section_desc_fontsize'];

	$page_background_color = get_theme_mod('page_bg_color','#E5E5E5');
	?>
	body{
		<?php if($b_fontsize){ ?>
		font-size: <?php echo $b_fontsize; ?>px !important;
		<?php } ?>
	}
	.navbar-nav > li > a,
	.sub-menu > li > a{
		<?php if($m_fontsize){ ?>
		font-size: <?php echo $m_fontsize; ?>px !important;
		<?php } ?>
	}
	h1{
		<?php if($h1_fontsize){ ?>
		font-size: <?php echo $h1_fontsize; ?>px !important;
		<?php } ?> 
	}
	h2{
		<?php if($h2_fontsize){ ?>
		font-size: <?php echo $h2_fontsize; ?>px !important;
		<?php } ?> 
	}
	h3{
		<?php if($h3_fontsize){ ?>
		font-size: <?php echo $h3_fontsize; ?>px !important;
		<?php } ?> 
	}
	h4{
		<?php if($h4_fontsize){ ?>
		font-size: <?php echo $h4_fontsize; ?>px !important;
		<?php } ?> 
	}
	h5{
		<?php if($h5_fontsize){ ?>
		font-size: <?php echo $h5_fontsize; ?>px !important;
		<?php } ?> 
	}
	h6{
		<?php if($h6_fontsize){ ?>
		font-size: <?php echo $h6_fontsize; ?>px !important;
		<?php } ?> 
	}
	.jsgroup-section .jsgroup-header .jsgroup-title{
		<?php if($st_fontsize){ ?>
		font-size: <?php echo $st_fontsize; ?>px !important;
		<?php } ?>
	}
	.jsgroup-section .jsgroup-header .jsgroup-subtitle{
		<?php if($sd_fontsize){ ?>
		font-size: <?php echo $sd_fontsize; ?>px !important;
		<?php } ?>
	}
	<?php
}


/**
 * Flush out the transients
 */
function jewelry_store_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'jewelry_store_categories' );
}
add_action( 'edit_category', 'jewelry_store_category_transient_flusher' );
add_action( 'save_post',     'jewelry_store_category_transient_flusher' );

function jewelry_store_categorized_blog() {
	$category_count = get_transient( 'jewelry_store_categories' );

	if ( false === $category_count ) {
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );


		$category_count = count( $categories );

		set_transient( 'jewelry_store_categories', $category_count );
	}

	
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}

if ( ! function_exists( 'jewelry_store_author_detail' ) ) :

function jewelry_store_author_detail(){
	
?>
<div class="author-block clearfix">

	<?php echo get_avatar( get_the_author_meta( 'ID') , 100 ); ?>

	<div class="media-body">

		<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" class="author_title">
			<h3><?php the_author(); ?></h3>
		</a>

		<p><?php the_author_meta( 'description' ); ?></p>

	</div>
		
</div>

<?php 

}

endif;

if ( ! function_exists( 'jewelry_store_menu_cart_icon' ) ) {
	/*
	* Menu Cart Icon Support
	*/
	if(class_exists('woocommerce')){
    	add_filter( 'wp_nav_menu_items', 'jewelry_store_menu_cart_icon', 15, 2 );
	}
	
    function jewelry_store_menu_cart_icon( $nav, $args ) {

    	if(!class_exists('woocommerce')){
    		return;
    	}

    	global $woocommerce;
        $option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

        if ( isset($option['navigation_menu_cart_icon']) && 'primary' === $args->theme_location && $option['navigation_menu_cart_icon'] == true ) {
        	$cart_value = sprintf ( __( '<span class="cart-value">%d</span>', 'jewelry-store'), WC()->cart->get_cart_contents_count() );
        	$menuitem = sprintf('<li class="menu-item menu-cart-icon"><a class="cart-total" href="%1$s" title="%2$s"><i class="fa fa-shopping-cart"></i>%3$s</a></li>',
        		esc_url( wc_get_cart_url() ),
        		esc_attr('View cart', 'jewelry-store'),
        		$cart_value
        	);
            return $nav . $menuitem;
        }

        return $nav;
    }
}