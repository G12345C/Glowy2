<?php 
function jewelry_store_fontsize(){
	$font_size = array(''=>'--select--');
	for( $i=9; $i<=100; $i++ ){		
		$font_size[$i] = $i;		
	}	
	return $font_size;
}

function jewelry_store_typography_setting( $wp_customize ){
	$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );
	
	$wp_customize->add_panel( 'typography_panel', array(
		'priority'       => 155,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography', 'jewelry-store'),
	) );

		$wp_customize->add_section( 'p_section' , array(
			'title'      => __('General Content', 'jewelry-store'),
			'panel'  => 'typography_panel',
			'priority'       => 1,
		) );

			$wp_customize->add_setting( 'jewelrystore_option[p_fontsize]' , array(
				'default'    => $option['p_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[p_fontsize]' , array(
				'label' => __('Font Size (px)','jewelry-store' ),
				'description' => '',
				'section' => 'p_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );

		$wp_customize->add_section( 'm_section' , array(
			'title'      => __('Menu', 'jewelry-store'),
			'panel'  => 'typography_panel',
			'priority'       => 2,
		) );

			$wp_customize->add_setting( 'jewelrystore_option[m_fontsize]' , array(
				'default'    => $option['m_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[m_fontsize]' , array(
				'label' => __('Font Size (px)','jewelry-store' ),
				'description' => '',
				'section' => 'm_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );

		$wp_customize->add_section( 'h_section' , array(
			'title'      => __('Heading', 'jewelry-store'),
			'panel'  => 'typography_panel',
			'priority'       => 3,
		) );

			$wp_customize->add_setting( 'jewelrystore_option[h1_fontsize]' , array(
				'default'    => $option['h1_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[h1_fontsize]' , array(
				'label' => __('Heading h1 (px)','jewelry-store' ),
				'description' => '',
				'section' => 'h_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );

			$wp_customize->add_setting( 'jewelrystore_option[h2_fontsize]' , array(
				'default'    => $option['h2_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[h2_fontsize]' , array(
				'label' => __('Heading h2 (px)','jewelry-store' ),
				'description' => '',
				'section' => 'h_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );

			$wp_customize->add_setting( 'jewelrystore_option[h3_fontsize]' , array(
				'default'    => $option['h3_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[h3_fontsize]' , array(
				'label' => __('Heading h3 (px)','jewelry-store' ),
				'description' => '',
				'section' => 'h_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );

			$wp_customize->add_setting( 'jewelrystore_option[h4_fontsize]' , array(
				'default'    => $option['h4_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[h4_fontsize]' , array(
				'label' => __('Heading h5 (px)','jewelry-store' ),
				'description' => '',
				'section' => 'h_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );

			$wp_customize->add_setting( 'jewelrystore_option[h5_fontsize]' , array(
				'default'    => $option['h5_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[h5_fontsize]' , array(
				'label' => __('Heading h5 (px)','jewelry-store' ),
				'description' => '',
				'section' => 'h_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );
			
			$wp_customize->add_setting( 'jewelrystore_option[h6_fontsize]' , array(
				'default'    => $option['h6_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[h6_fontsize]' , array(
				'label' => __('Heading h6 (px)','jewelry-store' ),
				'description' => '',
				'section' => 'h_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );

		$wp_customize->add_section( 'sections_section' , array(
			'title'      => __('Section', 'jewelry-store'),
			'panel'  => 'typography_panel',
			'priority'       => 4,
		) );

			// layout
            $wp_customize->add_setting( 'jewelrystore_option[section_title_layout]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_select',
                    'default'           => $option['section_title_layout'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[section_title_layout]',
                array(
                    'type'        => 'select',
                    'label'       => esc_html__('Title Layout', 'jewelry-store'),
                    'section'     => 'sections_section',
                    'description' => esc_html__('Please select layout for sections.', 'jewelry-store'),
                    'choices' => array(
                    	'layout1'=> __('Layout 1','jewelry-store'),
                    	),
                )
            );

			$wp_customize->add_setting( 'jewelrystore_option[section_title_fontsize]' , array(
				'default'    => $option['section_title_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[section_title_fontsize]' , array(
				'label' => __('Title font size (px)','jewelry-store' ),
				'description' => '',
				'section' => 'sections_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );

			$wp_customize->add_setting( 'jewelrystore_option[section_desc_fontsize]' , array(
				'default'    => $option['section_desc_fontsize'],
				'sanitize_callback' => 'jewelry_store_sanitize_select',
				'type'=>'option'
			));
			$wp_customize->add_control('jewelrystore_option[section_desc_fontsize]' , array(
				'label' => __('Subtitle font size (px)','jewelry-store' ),
				'description' => '',
				'section' => 'sections_section',
				'type'=>'select',
				'choices' => jewelry_store_fontsize(),
			) );
}
add_action( 'customize_register', 'jewelry_store_typography_setting' );