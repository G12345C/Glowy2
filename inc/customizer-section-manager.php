<?php 
function jewelry_store_for_plus( $wp_customize ){
		
		$wp_customize->register_section_type( 'Jewelry_Store_Section_plus' );

		$wp_customize->add_section( new Jewelry_Store_Section_plus( $wp_customize, 'jewelry-store' , array(
			'title'    => esc_html__( 'Go Pro', 'jewelry-store' ),
			'plus_text' => esc_html__( 'Click Here', 'jewelry-store' ),
			'plus_url'  => esc_url('https://www.britetechs.com/jewelry-store-pro-wordpress-theme/','jewelry-store')
		) ) );


		$wp_customize->add_section(
	        'upgrade_with_pro_section',
	        array(
	            'title' 		=> __('Upgrade to Pro','jewelry-store'),
			)
	    );
	    $wp_customize->add_setting(
			'upgrade_with_pro_buttons',
			array(
			   'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)	
		);
		
		$wp_customize->add_control( new Jewelry_Store_Button_Customize_Control( $wp_customize, 'upgrade_with_pro_buttons', array(
			'section' => 'upgrade_with_pro_section',
			'setting' => 'upgrade_with_pro_buttons',
	    ))
	);
}
add_action( 'customize_register', 'jewelry_store_for_plus' );