<?php 
function jewelry_store_reset_data(){
	$default_data =  array(
		'site_layout' => 'wide',

		'header_topbar_show' => true,
		'header_container_width' => 'container',
		'header_layout' => 'bg_light',
		'header_phone' => '',
		'header_email' => '',
		'facebook_link' => '',
		'twitter_link' => '',
		'linkedin_link' => '',

		'navigation_container_width' => 'container',
		'navigation_transparent' => false,
		'navigation_sticky' => false,
		'navigation_layout' => 'left',
		'navigation_menu_cart_icon' => true,

		'back_to_top_show' => true,
		'back_to_top_style' => 'square', // rounded
		'back_to_top_align' => 'bottom_right', // bottom_left

		'subheader_text_align' => 'center',
		'subheader_container_width' => 'container',
		'subheader_layout' => 'layout1',
		'subheader_overlay_color' => '',
		'subheader_overlay_color_opacity' => 0.6,
		'subheader_bg_image' => '',

		'footer_column_layout' => 4,
		'footerwidget_container_width' => 'container',
		'footer_layout' => 'bg_dark',
		'footer_copyright_text' => '',
		'footercopyright_container_width' => 'container', // fluid
		'footer_back_image' => '',

		'theme_color' => '#bf9728',

		'slider_enable' => true,
		'slider_arrow_show' => true,
		'slider_pagination_show' => true,
		'slider_mouse_drag' => true,
		'slider_smart_speed' => 1000,
		'slider_scroll_speed' => 2500,
		'slider_animateIn' => '',
		'slider_animateOut' => '',
		'slider_images' => '',
		'slider_overlay_color' => '',
		'slider_overlay_color_opacity' => 0.5,
		'slider_container_width' => 'container',
		'slider_layout' => 'layout1',

		'service_enable' => true,
		'service_layout' => 'layout1',
		'service_title' => '',
		'service_subtitle' => '',
		'service_contents' => '',
		'service_container_width' => 'container',
		'service_column' => 4,

		'shop_enable' => true,
		'shop_title' => '',
		'shop_subtitle' => '',
		'shop_container_width' => 'container',
		'shop_column' => 4,

		'portfolio_enable' => true,
		'portfolio_layout' => 'layout1',
		'portfolio_title' => '',
		'portfolio_subtitle' => '',
		'portfolio_to_show' => 4,
		'portfolio_container_width' => 'container',
		'portfolio_column' => 4,

		'callout_enable' => true,
		'callout_title' => '',
		'callout_subtitle' => '',
		'callout_btn_text1' => '',
		'callout_btn_link1' => '#',
		'callout_btn_target1' => false,
		'callout_btn_text2' => '',
		'callout_btn_link2' => '#',
		'callout_btn_target2' => false,
		'callout_bg_image' => '',
		'callout_container_width' => 'container',

		'testimonial_enable' => true,
		'testimonial_layout' => 'layout1',
		'testimonial_title' => '',
		'testimonial_subtitle' => '',
		'testimonial_contents' => '',
		'testimonial_bg_image' => '',
		'testimonial_container_width' => 'container',
		'testimonial_column' => 2,

		'team_enable' => true,
		'team_layout' => 'layout1',
		'team_title' => '',
		'team_subtitle' => '',
		'team_contents' => '',
		'team_container_width' => 'container',
		'team_column' => 4,

		'blog_enable' => true,
		'blog_title' => '',
		'blog_subtitle' => '',
		'blog_to_show' => 3,
		'blog_cat' => 1,
		'blog_orderby' => '',
		'blog_order' => '',
		'blog_container_width' => 'container',
		'blog_column' => 4,

		'contact_enable' => true,
		'contact_title' => '',
		'contact_subtitle' => '',
		'contact_shortcode' => '',
		'contact_address_title' => '',
		'contact_address' => '',
		'contact_phone_title' => '',
		'contact_phone' => '',
		'contact_email_title' => '',
		'contact_email' => '',
		'contact_container_width' => 'container',
		

		'p_fontsize' => '',
		'm_fontsize' => '',
		'h1_fontsize' => '',
		'h2_fontsize' => '',
		'h3_fontsize' => '',
		'h4_fontsize' => '',
		'h5_fontsize' => '',
		'h6_fontsize' => '',
		'section_title_fontsize' => '',
		'section_title_layout' => 'layout1',
		'section_desc_fontsize' => '',

		'customizer_notify_show' => '',
		'customizer_notify_show_recommended_plugins' => '',
	);

	$default_data = apply_filters('jewelry_store_reset_data',$default_data);

	return $default_data;
}