<?php 
/**
 * This Template File For Header
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jewelry-store
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <?php 
      if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
      }else{
        do_action( 'wp_body_open' );
      }
    ?>

    <?php do_action( 'jewelry_store_before_site_start' ); ?>

    <div id="page" class="site" role="site">

        <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'jewelry-store' ); ?></a>

        <header class="site-header">
            <?php

              get_template_part('template-parts/header/section','topheader');

            ?>
        </header>

        <?php get_template_part('template-parts/header/section','navigation'); ?>