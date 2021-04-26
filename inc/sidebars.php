<?php
function jewelry_store_widgets_register(){
	
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'jewelry-store' ),
		'id'            => 'sidebar-1',
		'description'   => 'This sidebar contents will be show on blog archive pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div><!-- .widget -->',
		'before_title'  => '<div class="widget_title_area"><h3 class="widget_title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Page Sidebar', 'jewelry-store' ),
		'id'            => 'sidebar-page',
		'description'   => 'This sidebar contents will be show on default pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div><!-- .widget -->',
		'before_title'  => '<div class="widget_title_area"><h3 class="widget_title">',
		'after_title'   => '</h3></div>',
	) );

	for ( $i = 1; $i<= 4; $i++ ) {
		register_sidebar( array(
			'name'          => sprintf( __('Footer %s', 'jewelry-store'), $i ),
			'id'            => 'footer-' . $i,
			'description'   => 'This sidebar contents will be show on footer '.$i.' column area',
			'before_widget' => '<div id="%1$s" class="widget %2$s p-0">',
			'after_widget'  => '</div><!-- .widget -->',
			'before_title'  => '<h3 class="widget_title wow animated slideInLeft">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'jewelry-store' ),
		'id'            => 'woocommerce',
		'description'   => 'This sidebar contents will be show on woocommerce pages.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div><!-- .widget -->',
		'before_title'  => '<div class="widget_title_area"><h3 class="widget_title">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'jewelry_store_widgets_register' );