<?php 
/**
 * The sidebar containing the woocommerce widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
 
if ( ! is_active_sidebar( 'woocommerce' ) ) {
	return;
}
?>
<div class="col-md-4 secondary sidebar">
	<?php dynamic_sidebar( 'woocommerce' ); ?>
</div><!-- .secondary -->