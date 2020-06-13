<?php  

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'evolve-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();

    wp_enqueue_style( 'evolve-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false );
    wp_enqueue_style( 'evolve-fw', get_template_directory_uri() . '/assets/css/fw-all.min.css', array(), '', 'all' );

    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'evolvechild-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

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
			echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
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
function evolve_child_menu($location = false, $class = false)
{

    if (!$location) {
        return;
    }

    $args = array(
        'theme_location' => $location,
        'depth'          => 10,
        'container'      => false,
        'echo'           => '0',
        'menu_class'     => $class,
        'fallback_cb'    => 'evolve_custom_menu_walker::fallback',
        'walker'         => new evolve_custom_menu_walker()
    );

    $menu = '';

    if (evolve_theme_mod('evl_header_type', 'none') == "h1") {
        $menu .= '<nav class="navbar navbar-expand-md main-menu mt-3 mt-md-0 order-3 col-sm-11' . (evolve_theme_mod('evl_searchbox', true) ? ' col-md-8' : ' col-md-12') . '">';
    } else {
        $menu .= '<nav class="navbar navbar-expand-md main-menu mr-auto col-12 col-sm">';
    }

    $menu .= '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="' . __("Primary", "evolve") . '">
                                    ' . evolve_get_svg('menu') . '
                                    </button>
                                <div id="primary-menu" class="collapse navbar-collapse" data-hover="dropdown" data-animations="fadeInUp fadeInDown fadeInDown fadeInDown">';

    if (has_nav_menu('primary-menu')) {

        $menu .= wp_nav_menu($args);
    } else {

        $menu .= wp_page_menu(array(
            'menu_class' => 'page-nav',
            'echo'       => '0',
        ));
    }

    $menu .= '</div></nav>';

    return $menu;
}