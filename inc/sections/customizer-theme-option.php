<?php
function jewelry_store_customizer_theme_option( $wp_customize ){
    
	require get_template_directory() . '/inc/customizer-controls.php';

	$option = jewelry_store_reset_data();

	$wp_customize->add_panel( 'theme_option',
		array(
			'priority'       => 130,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Theme Options', 'jewelry-store' ),
			'description'    => '',
		)
	);

		$wp_customize->add_section( 'header_topbar_section' ,
			array(
				'priority'    => 1,
				'title'       => esc_html__( 'Header Top Bar', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'theme_option',
			)
		);

			$wp_customize->add_setting( 'jewelrystore_option[header_topbar_show]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_checkbox',
                    'default'           => $option['header_topbar_show'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[header_topbar_show]',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Enable Header Top Bar?', 'jewelry-store'),
                    'section'     => 'header_topbar_section',
                    'description' => '',
                )
            );

            // container width
            $wp_customize->add_setting( 'jewelrystore_option[header_container_width]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_radio',
                    'default'           => $option['header_container_width'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[header_container_width]',
                array(
                    'type'        => 'radio',
                    'label'       => esc_html__('Container Width', 'jewelry-store'),
                    'section'     => 'header_topbar_section',
                    'description' => '',
                    'choices' => array(
                    	'container'=> __('Container','jewelry-store'),
                    	'container-fluid'=> __('Container Full','jewelry-store')
                    	),
                )
            );

            // header layout
            $wp_customize->add_setting( 'jewelrystore_option[header_layout]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_select',
                    'default'           => $option['header_layout'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[header_layout]',
                array(
                    'type'        => 'select',
                    'label'       => esc_html__('Layout', 'jewelry-store'),
                    'section'     => 'header_topbar_section',
                    'description' => '',
                    'choices' => array(
                    	''=> __('--Select Layout--','jewelry-store'),
                    	'bg_light'=> __('Layout 1 ( Light )','jewelry-store'),
                        'bg_dark'=> __('Layout 2 ( Dark )','jewelry-store'),
                        'bg_primary'=> __('Layout 3 ( Primary )','jewelry-store'),
                    	),
                )
            );

            $wp_customize->add_setting( 'jewelrystore_option[header_phone]',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default'           => $option['header_phone'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[header_phone]',
                array(
                    'type'        => 'text',
                    'label'       => esc_html__('Phone', 'jewelry-store'),
                    'section'     => 'header_topbar_section',
                    'description' => '',
                )
            );
            $wp_customize->add_setting( 'jewelrystore_option[header_email]',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default'           => $option['header_email'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[header_email]',
                array(
                    'type'        => 'text',
                    'label'       => esc_html__('Email Address', 'jewelry-store'),
                    'section'     => 'header_topbar_section',
                    'description' => '',
                )
            );
            $wp_customize->add_setting( 'jewelrystore_option[facebook_link]',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default'           => $option['facebook_link'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[facebook_link]',
                array(
                    'type'        => 'text',
                    'label'       => esc_html__('Facebook Link URL', 'jewelry-store'),
                    'section'     => 'header_topbar_section',
                    'description' => '',
                )
            );
            $wp_customize->add_setting( 'jewelrystore_option[twitter_link]',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default'           => $option['twitter_link'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[twitter_link]',
                array(
                    'type'        => 'text',
                    'label'       => esc_html__('Twitter Link URL', 'jewelry-store'),
                    'section'     => 'header_topbar_section',
                    'description' => '',
                )
            );
            $wp_customize->add_setting( 'jewelrystore_option[linkedin_link]',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default'           => $option['linkedin_link'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[linkedin_link]',
                array(
                    'type'        => 'text',
                    'label'       => esc_html__('LinkedIn Link URL', 'jewelry-store'),
                    'section'     => 'header_topbar_section',
                    'description' => '',
                )
            );

        $wp_customize->add_section( 'navigation_section' ,
			array(
				'priority'    => 2,
				'title'       => esc_html__( 'Navigation', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'theme_option',
			)
		);

			// container width
            $wp_customize->add_setting( 'jewelrystore_option[navigation_container_width]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_radio',
                    'default'           => $option['navigation_container_width'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[navigation_container_width]',
                array(
                    'type'        => 'radio',
                    'label'       => esc_html__('Container Width', 'jewelry-store'),
                    'section'     => 'navigation_section',
                    'description' => '',
                    'choices' => array(
                    	'container'=> __('Container','jewelry-store'),
                    	'container-fluid'=> __('Container Full','jewelry-store')
                    	),
                )
            );

            // transparent
            $wp_customize->add_setting( 'jewelrystore_option[navigation_transparent]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_checkbox',
                    'default'           => $option['navigation_transparent'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[navigation_transparent]',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Enable Transparent Navigation', 'jewelry-store'),
                    'section'     => 'navigation_section',
                    'description' => '',
                )
            );

            // sticky
            $wp_customize->add_setting( 'jewelrystore_option[navigation_sticky]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_checkbox',
                    'default'           => $option['navigation_sticky'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[navigation_sticky]',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Enable Navigation Sticky', 'jewelry-store'),
                    'section'     => 'navigation_section',
                    'description' => '',
                )
            );

            // layout position
            $wp_customize->add_setting( 'jewelrystore_option[navigation_layout]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_select',
                    'default'           => $option['navigation_layout'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[navigation_layout]',
                array(
                    'type'        => 'select',
                    'label'       => esc_html__('Layout', 'jewelry-store'),
                    'section'     => 'navigation_section',
                    'description' => '',
                    'choices' => array(
                    	'left'=> __('Layout 1 ( Logo Left )','jewelry-store'),
                        'center'=> __('Layout 2 ( Logo Center )','jewelry-store'),
                        'right'=> __('Layout 3 ( Logo Right )','jewelry-store'),
                    	),
                )
            );
			
        $wp_customize->add_section( 'subheader_section' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Subheader', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'theme_option',
			)
		);
			$wp_customize->add_setting( 'jewelrystore_option[subheader_text_align]',
				array(
					'sanitize_callback' => 'jewelry_store_sanitize_select',
					'default' => $option['subheader_text_align'],
					'transport' => 'postMessage',
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[subheader_text_align]',
				array(
					'label'       => esc_html__('Subheader text align', 'jewelry-store'),
					'section'     => 'subheader_section',
					'type'        => 'select',
					'choices'     => array(
						'center' => __('Center', 'jewelry-store'),
						'left' => __('Left', 'jewelry-store'),
						'right' => __('Right', 'jewelry-store'),
					),
				)
			);
            // layout
            $wp_customize->add_setting( 'jewelrystore_option[subheader_layout]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_select',
                    'default'           => $option['subheader_layout'],
                    'transport'         => 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[subheader_layout]',
                array(
                    'type'        => 'select',
                    'label'       => esc_html__('Layout', 'jewelry-store'),
                    'section'     => 'subheader_section',
                    'description' => '',
                    'choices' => array(
                        'layout1'=> __('Layout 1','jewelry-store'),
                        'layout2'=> __('Layout 2','jewelry-store'),
                        ),
                )
            );
			// container width
            $wp_customize->add_setting( 'jewelrystore_option[subheader_container_width]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_radio',
                    'default'           => $option['subheader_container_width'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[subheader_container_width]',
                array(
                    'type'        => 'radio',
                    'label'       => esc_html__('Container Width', 'jewelry-store'),
                    'section'     => 'subheader_section',
                    'description' => '',
                    'choices' => array(
                    	'container'=> __('Container','jewelry-store'),
                    	'container-fluid'=> __('Container Full','jewelry-store')
                    	),
                )
            );
            $wp_customize->add_setting( 'jewelrystore_option[subheader_overlay_color]',
                array(
                    'sanitize_callback' => 'sanitize_hex_color',
                    'default'           => $option['subheader_overlay_color'],
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jewelrystore_option[subheader_overlay_color]',
                array(
                    'label'       => esc_html__('Overlay Color', 'jewelry-store'),
                    'section'     => 'subheader_section',
                    'description' => '',
                )
            ) );

            $wp_customize->add_setting( 'jewelrystore_option[subheader_overlay_color_opacity]',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default'           => $option['subheader_overlay_color_opacity'],
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[subheader_overlay_color_opacity]',
                array(
                    'type' => 'number',
                    'label'       => esc_html__('Overlay Color Opacity', 'jewelry-store'),
                    'section'     => 'subheader_section',
                    'description' => '',
                    'input_attrs' => array(
                        'min' => '0', 'step' => '0.1', 'max' => '1',
                      ),
                )
            );
			$wp_customize->add_setting( 'jewelrystore_option[subheader_bg_image]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => $option['subheader_bg_image'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'jewelrystore_option[subheader_bg_image]',
				array(
					'label' 		=> esc_html__('Background image', 'jewelry-store'),
					'section' 		=> 'subheader_section',
					'settings'   	 => 'jewelrystore_option[subheader_bg_image]',
					'description' => '',
				)
			));

		$wp_customize->add_section( 'footer_widget_section' ,
			array(
				'priority'    => 4,
				'title'       => esc_html__( 'Footer Widgets', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'theme_option',
			)
		);
			$wp_customize->add_setting( 'jewelrystore_option[footer_column_layout]',
				array(
					'sanitize_callback' => 'jewelry_store_sanitize_select',
					'default'           => $option['footer_column_layout'],
					'transport' => 'postMessage',
					'type' => 'option',
				)
			);

			$wp_customize->add_control( 'jewelrystore_option[footer_column_layout]',
				array(
					'type'        => 'select',
					'label'       => esc_html__('Layout', 'jewelry-store'),
					'section'     => 'footer_widget_section',
					'default' => '0',
					'description' => esc_html__('Number footer columns to display.', 'jewelry-store'),
					'choices' => array(
						'4' => 4,
						'3' => 3,
						'2' => 2,
						'1' => 1,
						'0' => esc_html__('Disable footer widgets', 'jewelry-store'),
					)
				)
			);
			for ( $i = 1; $i<=4; $i ++ ) {
				$df = 12;
				if ( $i > 1 ) {
					$_n = 12/$i;
					$df = array();
					for ( $j = 0; $j < $i; $j++ ) {
						$df[ $j ] = $_n;
					}
					$df = join( '+', $df );
				}
				$wp_customize->add_setting('jewelrystore_option[footer_custom_'.$i.'_columns]',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => $df,
						'transport' => 'postMessage',
						'type' => 'option',
					)
				);
				$wp_customize->add_control('jewelrystore_option[footer_custom_'.$i.'_columns]',
					array(
						'label' => $i == 1 ? __('Custom footer 1 column width', 'jewelry-store') : sprintf( __('Custom footer %s columns width', 'jewelry-store'), $i ),
						'section' => 'footer_widget_section',
						'description' => esc_html__('Enter int numbers and sum of them must smaller or equal 12, separated by "+"', 'jewelry-store'),
					)
				);
			}

			// Footer Widget container width
            $wp_customize->add_setting( 'jewelrystore_option[footerwidget_container_width]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_radio',
                    'default'           => $option['footerwidget_container_width'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[footerwidget_container_width]',
                array(
                    'type'        => 'radio',
                    'label'       => esc_html__('Container Width', 'jewelry-store'),
                    'section'     => 'footer_widget_section',
                    'description' => '',
                    'choices' => array(
                    	'container'=> __('Container','jewelry-store'),
                    	'container-fluid'=> __('Container Full','jewelry-store')
                    	),
                )
            );

		$wp_customize->add_section( 'footer_copyright' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Footer Copyright', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'theme_option',
			)
		);
			$wp_customize->add_setting( 'jewelrystore_option[footer_copyright_text]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['footer_copyright_text'],
					'transport' => 'postMessage',
					'type' => 'option',
				)
			);

			$wp_customize->add_control( 'jewelrystore_option[footer_copyright_text]',
				array(
					'type'        => 'textarea',
					'label'       => esc_html__('Copyright Text', 'jewelry-store'),
					'section'     => 'footer_copyright',
					'description' => '',
				)
			);

			// Footer Widget container width
            $wp_customize->add_setting( 'jewelrystore_option[footercopyright_container_width]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_radio',
                    'default'           => $option['footercopyright_container_width'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[footercopyright_container_width]',
                array(
                    'type'        => 'radio',
                    'label'       => esc_html__('Container Width', 'jewelry-store'),
                    'section'     => 'footer_copyright',
                    'description' => '',
                    'choices' => array(
                    	'container'=> __('Container','jewelry-store'),
                    	'container-fluid'=> __('Container Full','jewelry-store')
                    	),
                )
            );

		$wp_customize->add_section( 'footer_back_image_section' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Footer Background', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'theme_option',
			)
		);

			// footer layout
            $wp_customize->add_setting( 'jewelrystore_option[footer_layout]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_select',
                    'default'           => $option['footer_layout'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[footer_layout]',
                array(
                    'type'        => 'select',
                    'label'       => esc_html__('Layout', 'jewelry-store'),
                    'section'     => 'footer_back_image_section',
                    'description' => '',
                    'choices' => array(
                    	''=> __('--Select Layout--','jewelry-store'),
                    	'bg_light'=> __('Layout 1 ( Light )','jewelry-store'),
                        'bg_dark'=> __('Layout 2 ( Dark )','jewelry-store'),
                        'bg_primary'=> __('Layout 3 ( Primary )','jewelry-store'),
                    	),
                )
            );

			$wp_customize->add_setting( 'jewelrystore_option[footer_back_image]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => $option['footer_back_image'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'jewelrystore_option[footer_back_image]',
				array(
					'label' 		=> esc_html__('Background Image', 'jewelry-store'),
					'section' 		=> 'footer_back_image_section',
					'settings'   	 => 'jewelrystore_option[footer_back_image]',
					'description' => '',
				)
			));

		$wp_customize->add_section( 'back_to_top_section' ,
			array(
				'priority'    => 7,
				'title'       => esc_html__( 'Footer back to top button', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'theme_option',
			)
		);
			$wp_customize->add_setting( 'jewelrystore_option[back_to_top_show]',
				array(
					'sanitize_callback' => 'jewelry_store_sanitize_checkbox',
					'default'           => $option['back_to_top_show'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[back_to_top_show]',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Enable back to top button?', 'jewelry-store'),
					'section'     => 'back_to_top_section',
					'description' => '',
				)
			);
			$wp_customize->add_setting( 'jewelrystore_option[back_to_top_style]',
				array(
					'sanitize_callback' => 'jewelry_store_sanitize_select',
					'default'           => $option['back_to_top_style'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[back_to_top_style]',
				array(
					'type'        => 'select',
					'label'       => esc_html__('Back to top button style', 'jewelry-store'),
					'section'     => 'back_to_top_section',
					'description' => '',
					'choices' => array(
						'' => __('-- Select Style --','jewelry-store'),
						'square' => __('Square','jewelry-store'),
						'rounded' => __('Rounded','jewelry-store'),
						),
				)
			);
			$wp_customize->add_setting( 'jewelrystore_option[back_to_top_align]',
				array(
					'sanitize_callback' => 'jewelry_store_sanitize_select',
					'default'           => $option['back_to_top_align'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[back_to_top_align]',
				array(
					'type'        => 'select',
					'label'       => esc_html__('Back to top button position', 'jewelry-store'),
					'section'     => 'back_to_top_section',
					'description' => '',
					'choices' => array(
						'' => __('-- Select Position --','jewelry-store'),
						'bottom_left' => __('Botoom Left','jewelry-store'),
						'bottom_right' => __('Bottom Right','jewelry-store'),
						),
				)
			);

        $wp_customize->add_section( 'site_layout_section' , array(
            'priority'    => 0,
            'title'      => __('Site Layout', 'jewelry-store' ),
            'description' => '',
            'panel'  => 'theme_option',
        ) );

            // site layout
            $wp_customize->add_setting( 'jewelrystore_option[site_layout]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_select',
                    'default'           => $option['site_layout'],
                    'transport'         => 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[site_layout]',
                array(
                    'type'        => 'select',
                    'label'       => esc_html__('Layout', 'jewelry-store'),
                    'section'     => 'site_layout_section',
                    'description' => '',
                    'choices' => array(
                        'wide'=> __('Wide','jewelry-store'),
                        'boxed'=> __('Boxed','jewelry-store')
                        ),
                )
            );
}
add_action('customize_register','jewelry_store_customizer_theme_option');