<?php
/**
 * selective refresh
 */
function jewelry_store_customizer_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }
	
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title',
		'render_callback' => 'jewelry_store_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'jewelry_store_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'jewelry_store_customizer_partials', 199 );


function jewelry_store_selective_refresh_render_section_content( $partial, $container_context = array() ) {
    $tpl = 'section-all/'.$partial->id.'.php';
    $GLOBALS['jewelry_store_is_selective_refresh'] = true;
    $file = jewelry_store_load_section( $tpl );
    if ( $file ) {
        include $file;
    }
}

function jewelry_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

function jewelry_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}