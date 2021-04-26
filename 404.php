<?php get_header(); ?>

<?php get_template_part('section-all/section-breadcrumb'); ?>

<div id="main" class="main main-content">
	<div class="container">		
		<div class="row">
			<div class="col-md-12 error-page text-center">
				<h2 class="wow animated fadeInDown"><?php _e('404','jewelry-store'); ?></h2>
				<h4 class="wow animated fadeInLeft"><?php _e('Oops! Page not found','jewelry-store'); ?></h4>
				<p class="wow animated fadeInUp"><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','jewelry-store'); ?></p>
				<a class="js-btn js-primary animated slideInLeft" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home Page','jewelry-store'); ?></a>
			</div>
		</div>				
	</div>
</div><!-- .site-content -->
	
<?php get_footer(); ?>