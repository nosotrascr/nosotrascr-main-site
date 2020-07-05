<?php

if ( ! function_exists( 'evolve_breadcrumbs' ) ) {
	function evolve_breadcrumbs() {

		global $post;

		if ( ( class_exists( 'bbPress' ) && is_bbpress() ) || evolve_theme_mod( 'evl_breadcrumbs', '1' ) != "1" || ( is_front_page() && is_page() ) || ( ( is_single() || is_page() || is_home() ) && get_post_meta( evolve_get_post_id(), 'evolve_page_breadcrumb', true ) == "no" ) ) {
			return;
		}

		echo '<nav aria-label="' . __( "Breadcrumb", "evolve" ) . '"><ol class="breadcrumb">';
		$params['link_none'] = '';
		$separator           = '';
		if ( is_category() ) {
			$thisCat = get_category( get_query_var( 'cat' ), false );
			if ( $thisCat->parent != 0 ) {
				$cats = get_category_parents( $thisCat->parent, true );
				$cats = explode( '</a>/', $cats );
				foreach ( $cats as $key => $cat ) {
					if ( $cat ) {
						echo '<li class="breadcrumb-item">' . $cat . '</a></li>';
					}
				}
			}
			echo '<li class="breadcrumb-item active">' . $thisCat->name . '</li>';
		}
		if ( is_tax() ) {
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo '<li class="breadcrumb-item active">' . $term->name . '</li>';
		}
		if ( is_home() ) {
			$title = esc_html( get_the_title( get_option( 'page_for_posts', true ) ) );
			echo '<li class="breadcrumb-item active">' . $title . '</li>';
		}
		if ( is_page() && ! is_front_page() ) {
			$parents   = array();
			$parent_id = $post->post_parent;
			while ( $parent_id ) :
				$page_ID = get_post( $parent_id );
				if ( $params["link_none"] ) {
					$parents[] = get_the_title( $page_ID->ID );
				} else {
					$parents[] = '<li class="breadcrumb-item"><a href="' . get_permalink( $page_ID->ID ) . '" title="' . get_the_title( $page_ID->ID ) . '">' . get_the_title( $page_ID->ID ) . '</a></li>' . $separator;
				}
				$parent_id = $page_ID->post_parent;
			endwhile;
			$parents = array_reverse( $parents );
			echo join( ' ', $parents );
			echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
		}
		if ( is_single() && ! is_attachment() && ! evolve_is_post_type() ) {
			$cat_1_line   = '';
			$cat_1_ids    = array();
			$categories_1 = get_the_category( $post->ID );
			if ( $categories_1 && ! empty( $categories_1 ) && ! is_wp_error( $categories_1 ) ):
				foreach ( $categories_1 as $cat_1 ):
					$cat_1_ids[] = $cat_1->term_id;
				endforeach;
				$cat_1_line = implode( ',', $cat_1_ids );
			endif;
			$args       = array(
				'include' => $cat_1_line,
				'orderby' => 'id'
			);
			$categories = get_categories( $args );
			if ( $categories && ! empty( $categories ) && ! is_wp_error( $categories ) ) :
				foreach ( $categories as $cat ) :
					$cats[] = '<li class="breadcrumb-item"><a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a></li>';
				endforeach;
				echo join( ' ', $cats );
			endif;
			/* Uncomment to Enable post title in breadcrumb
			// echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
			*/
		}
		if ( is_tag() ) {
			echo '<li class="breadcrumb-item active">' . "Tag: " . single_tag_title( '', false ) . '</li>';
		}
		if ( is_404() ) {
			echo '<li class="breadcrumb-item active">' . __( "404 - Page not Found", 'evolve' ) . '</li>';
		}
		if ( is_search() ) {
			echo '<li class="breadcrumb-item active">' . __( "Search", 'evolve' ) . '</li>';
		}
		if ( is_day() ) {
			echo '<li class="breadcrumb-item"><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
			echo '<li class="breadcrumb-item"><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li>';
			echo '<li class="breadcrumb-item active">' . get_the_time( 'd' ) . '</li>';
		}
		if ( is_month() ) {
			echo '<li class="breadcrumb-item"><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
			echo '<li class="breadcrumb-item active">' . get_the_time( 'F' ) . '</li>';
		}
		if ( is_year() ) {
			echo '<li class="breadcrumb-item active">' . get_the_time( 'Y' ) . '</li>';
		}
		if ( is_attachment() ) {
			if ( ! empty( $post->post_parent ) ) {
				echo '<li class="breadcrumb-item"><a href="' . get_permalink( $post->post_parent ) . '">' . get_the_title( $post->post_parent ) . '</a></li>';
			}
			echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
		}
		if ( evolve_is_post_type() ) {
			$parents   = array();
			$parent_id = $post->post_parent;
			while ( $parent_id ) :
				$page_ID = get_post( $parent_id );
				if ( $params["link_none"] ) {
					$parents[] = get_the_title( $page_ID->ID );
				} else {
					$parents[] = '<li class="breadcrumb-item"><a href="' . get_permalink( $page_ID->ID ) . '" title="' . get_the_title( $page_ID->ID ) . '">' . get_the_title( $page_ID->ID ) . '</a></li>' . $separator;
				}
				$parent_id = $page_ID->post_parent;
			endwhile;
			$parents = array_reverse( $parents );
			echo join( ' ', $parents );
			echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';

		}
		echo '</ul></nav>';
	}
}
