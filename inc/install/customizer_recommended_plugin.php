<?php
require get_template_directory() . '/inc/customizer-notify/jewelry-store-customizer-notify.php';
$config_customizer = array(
	'recommended_plugins'       => array(
		'britetechs-companion' => array(
			'recommended' => true,
			'description' => sprintf('Install and activate <strong>Britetechs Companion</strong> plugin for taking full advantage of all the features this theme has to offer %s.', 'jewelry-store'),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'jewelry-store' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'jewelry-store' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'jewelry-store' ),
	'activate_button_label'     => esc_html__( 'Activate', 'jewelry-store' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'jewelry-store' ),
);
Jewelry_Store_Customizer_Notify::init( apply_filters( 'jewelry_store_customizer_notify_array', $config_customizer ) );