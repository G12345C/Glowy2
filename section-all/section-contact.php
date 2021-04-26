<?php 
$option = wp_parse_args(  get_option( 'jewelrystore_option', array() ), jewelry_store_reset_data() );

$containerClass = '';
if($option['contact_container_width']!=''){
    $containerClass = $option['contact_container_width'];
}

if($option['contact_enable']==true){
?>
<div id="contact" class="jsgroup-section jsgroup-contact">
    <div class="">
        <div class="<?php echo esc_attr( $containerClass ); ?>">
            <div class="row jsgroup-header">
                <div class="col-md-12">
                    <?php if( $option['contact_title'] != '' ){ ?>
                    <h2 class="jsgroup-title"><?php echo wp_kses_post($option['contact_title']); ?></h2>
                    <?php } ?>

                    <?php if($option['contact_subtitle']!=''){ ?>
                    <p class="jsgroup-subtitle"><?php echo wp_kses_post($option['contact_subtitle']); ?></p>
                    <?php } ?>
                </div>                    
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="contact-form-wrap">
                      <?php echo do_shortcode( $option['contact_shortcode'] ); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="media">
                      <i class="mr-3 fa fa-map"></i>
                      <div class="media-body">
                        <h5><?php echo esc_html( $option['contact_address_title'] ); ?></h5>
                        <p><?php echo esc_html( $option['contact_address'] ); ?></p>
                      </div>
                    </div>

                    <div class="media">
                      <i class="mr-3 fa fa-phone"></i>
                      <div class="media-body">
                        <h5><?php echo esc_html( $option['contact_phone_title'] ); ?></h5>
                        <p><?php echo esc_html( $option['contact_phone'] ); ?></p>
                      </div>
                    </div>

                    <div class="media">
                      <i class="mr-3 fa fa-envelope"></i>
                      <div class="media-body">
                        <h5><?php echo esc_html( $option['contact_email_title'] ); ?></h5>
                        <p><?php echo esc_html( $option['contact_email'] ); ?></p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end .jsgroup-contact -->
<?php } ?>