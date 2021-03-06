<?php
function jewelry_store_breadcrumbs(){

	if ( function_exists('yoast_breadcrumb') ) {
	  yoast_breadcrumb();
	}else{

		$showOnHome	= esc_html__('1','jewelry-store');

		$delimiter 	= '';

		$home 		= esc_html__('Home','jewelry-store');

		$showCurrent= esc_html__('1','jewelry-store');

		$before		= '<li class="active">';
		
		$after 		= '</li>';
	 
		global $post;
		$homeLink = home_url();

		if ( is_home() || is_front_page() ) {
	 
		if ($showOnHome == 1) echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>';
	 
		} else {
	 
	    echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>';
	 
	    if ( is_category() ) {

			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . ' ');
			echo $before . esc_html__('Archive by category','jewelry-store').' "' . esc_html(single_cat_title('', false)) . '"' .$after;
			
		} elseif ( is_search() ) {

			echo $before . esc_html__('Search results for ','jewelry-store').' "' . esc_html(get_search_query()) . '"' . $after;
		
		} elseif ( is_day() ) {

			echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
			echo '<a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_html(get_the_time('F')) . '</a> ';
			echo $before . esc_html(get_the_time('d')) . $after;

		} elseif ( is_month() ) {

			echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ' . esc_attr($delimiter);
			echo $before . esc_html(get_the_time('F')) . $after;

		} elseif ( is_year() ) {

			echo $before . esc_html(get_the_time('Y')) . $after;

		} elseif ( is_single() && !is_attachment() ) {

			if ( get_post_type() != 'post' ) {

				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<li><a href="' . esc_url($homeLink) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
				if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . $before . esc_html(get_the_title()) . $after;
			
			} else {

				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, '' . esc_attr($delimiter) . '');
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
				echo $before . $cats . $after;
				if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;

			}
	 
	    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

			if ( class_exists( 'WooCommerce' ) ) {

				if ( is_shop() ) {

					echo $before . woocommerce_page_title( false ) . $after;

				}else{
					if(get_post_type() == 'product'){
		                $terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
		                if($terms) {
		                	echo '<li>';
		                    the_terms( get_the_ID() , 'product_cat' , '' , ' </li><li>' );
		                    echo ' ' . $delimiter . '<i class="fa fa-angle-double-right"></i> ' . '<span class="current">' . get_the_title() . '</span>';
		                }else{
		                    echo '<span class="current">' . get_the_title() . '</span>';
		                }
		            }
				}			

			} else {

				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			}	

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {

			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); 
			if(!empty($cat)){
			$cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . '');
			}
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
	 
	    } elseif ( is_page() && !$post->post_parent ) {

			if ($showCurrent == 1) echo $before . esc_html(get_the_title()) . $after;

		} elseif ( is_page() && $post->post_parent ) {

			$parent_id  = $post->post_parent;
			$breadcrumbs = array();

			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a>' . '';
				$parent_id  = $page->post_parent;
			}
			
			$breadcrumbs = array_reverse($breadcrumbs);

			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo ' ' . esc_attr($delimiter) . '';
			}

			if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . $before . esc_html(get_the_title()) . $after;
	 
	    } elseif ( is_tag() ) {

			echo $before . esc_html__('Posts tagged ','jewelry-store').' "' . single_tag_title('', false) . '"' . $after;
		
		} elseif ( is_author() ) {

			global $author;
			$userdata = get_userdata($author);
			echo $before . esc_html__('Article posted by ','jewelry-store').'' . $userdata->display_name . $after;
		
		} elseif ( is_404() ) {

			echo $before . esc_html__('Error 404 ','jewelry-store'). $after;

	    }
		
	    if ( get_query_var('paged') ) {

			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
			echo ' ( ' . esc_html__('Page','jewelry-store') . '' . esc_html(get_query_var('paged')). ' )';
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
	    
	    }
	 
	    echo '</li>';
	 
	  }

	}

}