<?php
$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

$headerClass = '';
if($option['header_layout']!=''){
    $headerClass = $option['header_layout'];
}

$containerClass = '';
if($option['header_container_width']!=''){
    $containerClass = $option['header_container_width'];
}

if($option['header_topbar_show']==true){ ?>
<div class="top-header <?php echo esc_attr( $headerClass ); ?>">
    <div class="<?php echo esc_attr( $containerClass ); ?>">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-6">
                <div class="header-contact text-lg-left text-sm-center text-center">
                    <ul>
                        <?php if( !empty($option['header_phone']) ){ ?>
                        <li><i class="fa fa-phone"></i> <a href="<?php echo esc_attr( 'tel:' . $option['header_phone'] ); ?>"><?php echo esc_html( $option['header_phone'] ); ?></a></li>
                        <?php } ?>

                        <?php if( !empty($option['header_email']) ){ ?>
                        <li><i class="fa fa-envelope"></i> <a href="<?php echo esc_attr( 'mailto:' . sanitize_email( $option['header_email'] ) ); ?>"><?php echo esc_html( $option['header_email'] ); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="social_media text-lg-right text-sm-center text-center">
                    <ul class="social">
                        <?php if( $option['facebook_link'] != '' ){ ?>
                        <li><a href="<?php echo esc_url( $option['facebook_link'] ); ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php } ?>

                        <?php if( $option['twitter_link'] != '' ){ ?>
                        <li><a href="<?php echo esc_url( $option['twitter_link'] ); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php } ?>

                        <?php if( $option['linkedin_link'] != '' ){ ?>
                        <li><a href="<?php echo esc_url( $option['linkedin_link'] ); ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>