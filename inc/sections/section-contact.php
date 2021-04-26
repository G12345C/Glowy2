<?php
function jewelry_store_customizer_contact( $wp_customize ){

	$option = jewelry_store_reset_data();

	$wp_customize->add_panel( 'contact_panel',
		array(
			'priority'       => 139,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__( 'Home Page: Contact', 'jewelry-store' ),
			'description'    => '',
		)
	);
		$wp_customize->add_section( 'contact_settings' ,
			array(
				'priority'    => 1,
				'title'       => esc_html__( 'Contact Settings', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'contact_panel',
			)
		);
			$wp_customize->add_setting( 'jewelrystore_option[contact_enable]',
				array(
					'sanitize_callback' => 'jewelry_store_sanitize_checkbox',
					'default'           => $option['contact_enable'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_enable]',
				array(
					'type'        => 'checkbox',
					'label'       => esc_html__('Contact Enable', 'jewelry-store'),
					'section'     => 'contact_settings',
					'description' => '',
				)
			);
			$wp_customize->add_setting( 'jewelrystore_option[contact_title]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_title'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_title]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Section Title', 'jewelry-store'),
					'section'     => 'contact_settings',
					'description' => '',
				)
			);
			$wp_customize->add_setting( 'jewelrystore_option[contact_subtitle]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_subtitle'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_subtitle]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Section Subtitle', 'jewelry-store'),
					'section'     => 'contact_settings',
					'description' => '',
				)
			);

			// Service container width setting =============================================================
            $wp_customize->add_setting( 'jewelrystore_option[contact_container_width]',
                array(
                    'sanitize_callback' => 'jewelry_store_sanitize_radio',
                    'default'           => $option['contact_container_width'],
                    'transport'			=> 'postMessage',
                    'type' => 'option',
                )
            );
            $wp_customize->add_control( 'jewelrystore_option[contact_container_width]',
                array(
                    'type'        => 'radio',
                    'label'       => esc_html__('Container Width', 'jewelry-store'),
                    'section'     => 'contact_settings',
                    'description' => '',
                    'choices' => array(
                    	'container'=> __('Container','jewelry-store'),
                    	'container-fluid'=> __('Container Full','jewelry-store')
                    	),
                )
            );

		$wp_customize->add_section( 'contact_form' ,
			array(
				'priority'    => 2,
				'title'       => esc_html__( 'Contact Form', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'contact_panel',
			)
		);

			$wp_customize->add_setting( 'jewelrystore_option[contact_shortcode]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_shortcode'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_shortcode]',
				array(
					'type'        => 'textarea',
					'label'       => esc_html__('Contact Form 7 Shortcode', 'jewelry-store'),
					'section'     => 'contact_form',
					'description' => '',
				)
			);

		$wp_customize->add_section( 'contact_info' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Contact Informations', 'jewelry-store' ),
				'description' => '',
				'panel'       => 'contact_panel',
			)
		);

			$wp_customize->add_setting( 'jewelrystore_option[contact_address_title]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_address_title'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_address_title]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Address Title', 'jewelry-store'),
					'section'     => 'contact_info',
					'description' => '',
				)
			);

			$wp_customize->add_setting( 'jewelrystore_option[contact_address]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_address'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_address]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Address', 'jewelry-store'),
					'section'     => 'contact_info',
					'description' => '',
				)
			);

			$wp_customize->add_setting( 'jewelrystore_option[contact_phone_title]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_phone_title'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_phone_title]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Phone Title', 'jewelry-store'),
					'section'     => 'contact_info',
					'description' => '',
				)
			);

			$wp_customize->add_setting( 'jewelrystore_option[contact_phone]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_phone'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_phone]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Phone', 'jewelry-store'),
					'section'     => 'contact_info',
					'description' => '',
				)
			);

			$wp_customize->add_setting( 'jewelrystore_option[contact_email_title]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_email_title'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_email_title]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Email Title', 'jewelry-store'),
					'section'     => 'contact_info',
					'description' => '',
				)
			);

			$wp_customize->add_setting( 'jewelrystore_option[contact_email]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => $option['contact_email'],
					'type' => 'option',
				)
			);
			$wp_customize->add_control( 'jewelrystore_option[contact_email]',
				array(
					'type'        => 'text',
					'label'       => esc_html__('Email', 'jewelry-store'),
					'section'     => 'contact_info',
					'description' => '',
				)
			);
}
add_action('customize_register','jewelry_store_customizer_contact');