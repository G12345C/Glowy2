<?php
if ( ! function_exists( 'jewelry_store_get_media_url' ) ) {
    function jewelry_store_get_media_url($media = array(), $size = 'full' )
    {
        $media = wp_parse_args( $media, array('url' => '', 'id' => ''));
        $url = '';
        if ($media['id'] != '') {
            if ( strpos( get_post_mime_type( $media['id'] ), 'image' ) !== false ) {
                $image = wp_get_attachment_image_src( $media['id'],  $size );
                if ( $image ){
                    $url = $image[0];
                }
            } else {
                $url = wp_get_attachment_url( $media['id'] );
            }
        }

        if ($url == '' && $media['url'] != '') {
            $id = attachment_url_to_postid( $media['url'] );
            if ( $id ) {
                if ( strpos( get_post_mime_type( $id ), 'image' ) !== false ) {
                    $image = wp_get_attachment_image_src( $id,  $size );
                    if ( $image ){
                        $url = $image[0];
                    }
                } else {
                    $url = wp_get_attachment_url( $id );
                }
            } else {
                $url = $media['url'];
            }
        }
        return $url;
    }
}


if ( ! function_exists( 'jewelry_store_custom_excerpt_length' ) ) :
/**
 * Custom excerpt length
 */
function jewelry_store_custom_excerpt_length( $length ) {
	
	if( is_admin() ){
		return $length;
	}
	return 30;
}
add_filter( 'excerpt_length', 'jewelry_store_custom_excerpt_length', 999 );
endif;


if ( ! function_exists( 'jewelry_store_new_excerpt_more' ) ) :
/**
 * Remove […]
 */
function jewelry_store_new_excerpt_more( $more ) {
	
	if( is_admin() ){
		return $more;
	}
	
	$textagign = 'center';	
	return sprintf(
		' ... <div class="text-'.esc_attr( $textagign ).'"><a class="more-link" href="%s">%1s <i class="fa fa-angle-double-right"></i></a></div>',
		esc_url( get_the_permalink() ),
		__('Read More','jewelry-store')
		);
}
add_filter('excerpt_more', 'jewelry_store_new_excerpt_more');
endif;