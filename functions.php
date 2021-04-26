<?php
/**
 * jewelry store functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if( ! function_exists( 'jewelry_store_setup' ) ):
	function jewelry_store_setup() {
		load_theme_textdomain( 'jewelry-store', get_template_directory() . '/languages' );
		
		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );
		
		add_post_type_support( 'page', 'excerpt' );
		
		add_theme_support( 'post-thumbnails' );
		
		register_nav_menus( array(
			'primary'      => esc_html__( 'Primary Menu', 'jewelry-store' ),
			'footer'      => esc_html__( 'Footer Menu', 'jewelry-store' ),
		) );
		
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		add_editor_style( array( 'css/editor-style.css', jewelry_store_fonts_url() ) );

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );
		
		add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 150,
            'flex-height' => true,
            'flex-width'  => true,
        ) );
		
		$args = array(
			'width'        => 1600,
			'flex-width'   => true,
			'default-image' => '',
			'header-text'   => false,
		);
		add_theme_support( 'custom-header', $args );

		add_theme_support( 'custom-background' );
		
		add_theme_support( 'recommend-plugins', array(
			'britetechs-companion' => array(
                'name' => esc_html__( 'Britetechs Companion', 'jewelry-store' ),
                'active_filename' => 'britetechs-companion/britetechs-companion.php',
				'desc' => esc_html__( 'We highly recommend that you install the britetechs companion plugin to gain access to the team and testimonial sections.', 'jewelry-store' ),
            ),
			'contact-form-7' => array(
                'name' => esc_html__( 'Contact Form 7', 'jewelry-store' ),
                'active_filename' => 'contact-form-7/wp-contact-form-7.php',
				'desc' => esc_html__( 'This is also recommended that you install the contact form plugin to show contact form on Contact Page contact section and Contact custom page template.', 'jewelry-store' ),
            ),
        ) );
		
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Widget text support shortcode
		 */
		add_filter('widget_text','do_shortcode');
		
		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );

		if ( class_exists( 'WooCommerce' ) ) {
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
	}
 endif;
 add_action( 'after_setup_theme', 'jewelry_store_setup' );

/**
 * @global int $content_width
 */
function jewelry_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jewelry_store_content_width', 800 );
}
add_action( 'after_setup_theme', 'jewelry_store_content_width', 0 );

if ( ! function_exists( 'jewelry_store_fonts_url' ) ) :
	/**
	 * Register default Google fonts
	 */
	function jewelry_store_fonts_url() {
	    $fonts_url = '';

	    $Lato = _x( 'on', 'Lato font: on or off', 'jewelry-store' );
	    $Playfair_Display = _x( 'on', 'Playfair Display font: on or off', 'jewelry-store' );

	    if ( 'off' !== $Lato && 'off' !== $Playfair_Display ) {
	        $font_families = array();

	        if ( 'off' !== $Lato ) {
	            $font_families[] = 'Lato:200,300,400,500,600,700,800';
	        }

	        if ( 'off' !== $Playfair_Display ) {
	            $font_families[] = 'Playfair+Display:200,300,400,500,600,700,800';
	        }
			
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );

	        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	    }

	    return esc_url_raw( $fonts_url );
	}
endif;

/**
 * Enqueue scripts and styles for the template.
 */
function jewelry_store_scripts() {
	$theme = wp_get_theme( 'jewelry-store' );
    $version = $theme->get( 'Version' );

	$disableGoogleFonts = get_theme_mod('jewelry_store_hide_g_font', 0 );
	if ( $disableGoogleFonts == false ) {
        wp_enqueue_style('google-fonts', jewelry_store_fonts_url(), array(), $version);
    }
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css', array(), $version );

	wp_enqueue_style( 'bootstrap-smartmenu', get_template_directory_uri() .'/assets/css/bootstrap-smartmenus.css', array(), $version );
	
	wp_enqueue_style( 'owl_carousel', get_template_directory_uri() .'/assets/css/owl.carousel.css', array(), $version );
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/css/font-awesome-4.7.0/css/font-awesome.css', array(), $version );
	
	wp_enqueue_style( 'jewelry-store-style', get_template_directory_uri() .'/style.css', array(), $version );

	wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.css', array(), $version );

	wp_enqueue_style( 'jewelry-store-woo', get_template_directory_uri() .'/assets/css/woocommerce.css', array(), $version );

	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), $version, true );

	wp_enqueue_script( 'bootstrap-smartmenu-js', get_template_directory_uri() . '/assets/js/jquery.smartmenus.js', array(), $version, true );

	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.js', array(), $version, true );
	
	wp_enqueue_script( 'materialize-js', get_template_directory_uri() . '/assets/js/materialize.js', array(), $version, true );
	
	wp_enqueue_script( 'owl_carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), $version, true );

	wp_enqueue_script( 'jewelry-store', get_template_directory_uri() . '/assets/js/jewelry-store.js', array(), $version, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	
	$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

	// settings.
    $jewelry_store_settings = array(
        'homeUrl'     => home_url( '/' ),
        'slider_arrow_show' => $option['slider_arrow_show']?$option['slider_arrow_show']:false,
		'slider_pagination_show' => $option['slider_pagination_show']?$option['slider_pagination_show']:false,
		'slider_mouse_drag' => $option['slider_mouse_drag']?$option['slider_mouse_drag']:false,
		'slider_smart_speed' => $option['slider_smart_speed']?$option['slider_smart_speed']:1000,
		'slider_scroll_speed' => $option['slider_scroll_speed']?$option['slider_scroll_speed']:2500,
		'slider_animateIn' => $option['slider_animateIn']?$option['slider_animateIn']:'',
		'slider_animateOut' => $option['slider_animateOut']?$option['slider_animateOut']:'',
		'shop_column' => $option['shop_column']?$option['shop_column']:4,
		'testimonial_column' => $option['testimonial_column']?$option['testimonial_column']:4,
		'team_column' => $option['team_column']?$option['team_column']:4,
		'is_frontpage' => is_front_page(),
    );
	wp_localize_script( 'bootstrap', 'jewelry_store_settings', $jewelry_store_settings );
}
add_action( 'wp_enqueue_scripts', 'jewelry_store_scripts' );

/**
 * reset data file
 */
require get_parent_theme_file_path('/inc/resetdata.php');

/**
 * load template tags file
 */
require get_parent_theme_file_path('/inc/template-tags.php');

/**
 * jewelry store nav walker
 */
require get_parent_theme_file_path('/inc/theme_navwalker.php');

/**
 * jewelry store extra
 */
require get_parent_theme_file_path('/inc/extra.php');


/**
 * jewelry store sanitize
 */
require get_parent_theme_file_path('/inc/sanitize.php');

/**
 * customizer register
 */
require get_parent_theme_file_path('/inc/customizer.php');
require get_parent_theme_file_path('/inc/customizer-selective-refresh.php');

/**
 * welcome page
 */
require get_parent_theme_file_path('/inc/install/class-install-helper.php');
require get_parent_theme_file_path('/inc/install/customizer_recommended_plugin.php');

/**
 * sidebars
 */
require get_parent_theme_file_path('/inc/sidebars.php');

/**
 * breadcrumbs
 */
require get_parent_theme_file_path('/inc/breadcrumbs.php');

/**
 * Woocommerce
 */
if(class_exists('woocommerce')){
	require get_parent_theme_file_path('/woocommerce/functions.php');
	require get_parent_theme_file_path('/woocommerce/hooks.php');
}