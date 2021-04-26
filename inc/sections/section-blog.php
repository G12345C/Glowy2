<?php
function jewelry_store_customizer_blog( $wp_customize ){

	$option = jewelry_store_reset_data();

	$wp_customize->add_panel( 'blog_panel',
		array(
			'priority'       => 138,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__( 'Home Page: Blog', 'jewelry-store' ),
			'description'    => '',
		)
	);
		$wp_customize->add_section( 'blog_settings' ,
			array(
				'priority'    => 1,
				'title'       => esc_html__( 'Blog Settings', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'blog_panel',
			)
		);
			$wp_customize->add_setting( 'jewelrystore_option[blog_enable]',
				array(
					'sanitize_callback' => 'jewelry_store_sanitize_checkbox',
					'default'           => $option['blog_enable'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[blog_enable]',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Blog Enable', 'jewelry-store'),
					'section'     => 'blog_settings',
					'description' => '',
				)
			);
			$wp_customize->add_setting( 'jewelrystore_option[blog_title]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['blog_title'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[blog_title]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Section Title', 'jewelry-store'),
					'section'     => 'blog_settings',
					'description' => '',
				)
			);
			$wp_customize->add_setting( 'jewelrystore_option[blog_subtitle]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['blog_subtitle'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[blog_subtitle]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Section Subtitle', 'jewelry-store'),
					'section'     => 'blog_settings',
					'description' => '',
				)
			);

			// blog category
			$wp_customize->add_setting( 'jewelrystore_option[blog_cat]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => $option['blog_cat'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( new Jewelry_Store_Category_Control(
				$wp_customize, 'jewelrystore_option[blog_cat]',
				array(
					'label'       => esc_html__('Blog Category', 'jewelry-store'),
					'section'     => 'blog_settings',
					'description' => '',
				)
			) );

			// No. of blog to show
			$wp_customize->add_setting( 'jewelrystore_option[blog_to_show]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => $option['blog_to_show'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[blog_to_show]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('No. of blog to show', 'jewelry-store'),
					'section'     => 'blog_settings',
					'description' => '',
				)
			);

			// order by
            $wp_customize->add_setting( 'jewelrystore_option[blog_orderby]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_select',
                    'default'           => $option['blog_orderby'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[blog_orderby]',
                array(
                    'type'        => 'select',
                    'label'       => esc_html__('Order by', 'jewelry-store'),
                    'section'     => 'blog_settings',
                    'description' => '',
                    'choices' => array(
                    	'default' => esc_html__('Default', 'jewelry-store'),
						'id'      => esc_html__('ID', 'jewelry-store'),
						'author'  => esc_html__('Author', 'jewelry-store'),
						'title'   => esc_html__('Title', 'jewelry-store'),
						'date'    => esc_html__('Date', 'jewelry-store'),
						'comment_count' => esc_html__('Comment Count', 'jewelry-store'),
						'menu_order'    => esc_html__('Order by Page Order', 'jewelry-store'),
						'rand'          => esc_html__('Random order', 'jewelry-store'),
                    	),
                )
            );

            // order
            $wp_customize->add_setting( 'jewelrystore_option[blog_order]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_select',
                    'default'           => $option['blog_order'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[blog_order]',
                array(
                    'type'        => 'select',
                    'label'       => esc_html__('Order', 'jewelry-store'),
                    'section'     => 'blog_settings',
                    'description' => '',
                    'choices' => array(
                    	'desc' => esc_html__('Descending', 'jewelry-store'),
						'asc'      => esc_html__('Ascending', 'jewelry-store'),
                    	),
                )
            );

			// container width
            $wp_customize->add_setting( 'jewelrystore_option[blog_container_width]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_radio',
                    'default'           => $option['blog_container_width'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[blog_container_width]',
                array(
                    'type'        => 'radio',
                    'label'       => esc_html__('Container Width', 'jewelry-store'),
                    'section'     => 'blog_settings',
                    'description' => '',
                    'choices' => array(
                    	'container'=> __('Container','jewelry-store'),
                    	'container-fluid'=> __('Container Full','jewelry-store')
                    	),
                )
            );

            // column layout
            $wp_customize->add_setting( 'jewelrystore_option[blog_column]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_radio',
                    'default'           => $option['blog_column'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[blog_column]',
                array(
                    'type'        => 'radio',
                    'label'       => esc_html__('Column Layout', 'jewelry-store'),
                    'section'     => 'blog_settings',
                    'description' => '',
                    'choices' => array(
                    	2 => __('2 Column','jewelry-store'),
                    	3 => __('3 Column','jewelry-store'),
                    	4 => __('4 Column','jewelry-store'),
                    	),
                )
            );

}
add_action('customize_register','jewelry_store_customizer_blog');