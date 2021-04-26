<?php
$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

$navbar_class = '';

$logo_position = $option['navigation_layout']?$option['navigation_layout']:'left';

$logo_wrap_class = 'col-lg-3 no-padding';
$nav_wrap_class = 'col-lg-9 no-padding';
$menu_class = 'm-right-auto';

if($logo_position=='right'){
  $nav_wrap_class .= ' order-lg-first';
  $logo_wrap_class .= ' text-lg-right';
}elseif( $logo_position=='center' ){
  $nav_wrap_class = 'col-lg-12 no-padding';
  $logo_wrap_class = 'col-lg-12 no-padding text-lg-center';
  $menu_class = 'mx-auto text-center';
}

$is_transparent_nav = $option['navigation_transparent']?$option['navigation_transparent']:false;
if($is_transparent_nav){
  $navbar_class .= ' navbar-header-wrap';
}

$is_header_sticky = $option['navigation_sticky']?$option['navigation_sticky']:false;
if($is_header_sticky){
  $navbar_class .= ' header-sticky';
}

$header_bg_image = get_header_image();
if( !empty($header_bg_image)){
  $navbar_class .= ' navbar_bg_image';
}

$containerClass = '';
if($option['navigation_container_width']!=''){
    $containerClass = $option['navigation_container_width'];
}
?>
<nav class="site-nav navbar navbar-expand-lg navbar-light <?php echo esc_attr( $navbar_class ); ?>" style="background-image: url(<?php header_image(); ?>);">
  <div class="<?php echo esc_attr( $containerClass ); ?>">
      <div class="row">
        <div class="<?php echo esc_attr( $logo_wrap_class ); ?>">
          <?php 
          // theme logo here
          jewelry_store_logo();
          ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="<?php echo esc_attr( $nav_wrap_class ); ?>">
          <?php if ( has_nav_menu( 'primary' ) ) : ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php 
              wp_nav_menu( array(
              'theme_location' => 'primary',
              'menu_class' => 'nav navbar-nav ' . $menu_class, // "mx-auto text-center" for center
              'container' => 'ul',
              ) );
            ?>
          </div>
          <?php else: ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php 
              wp_nav_menu( array(
              'theme_location' => 'primary',
              'menu_class' => 'nav navbar-nav ' . $menu_class, // "mx-auto text-center" for center
              'container' => 'ul',
              ) );
            ?>
          </div>
          <?php endif; ?>
        </div>
      </div>                 
  </div>
</nav>