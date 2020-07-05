<?php  

if ( ! function_exists( 'evolve_pagination_after' ) ) {
	function evolve_pagination_after() {
		if ( ( ( is_front_page() && ! is_page() ) || is_home() || is_archive() || is_search() ) && evolve_theme_mod( 'evl_nav_links', 'after' ) != "before" || ( evolve_theme_mod( 'evl_nav_links', 'after' ) != "after" && evolve_theme_mod( 'evl_pagination_type', 'infinite' ) == "infinite" ) ) {
			get_template_part( 'template-parts/navigation/navigation', 'index' );
		} elseif ( is_single() && evolve_theme_mod( 'evl_post_links', 'after' ) != "before" ) {
			//get_template_part( 'template-parts/navigation/navigation', 'index' );
		}
	}
}
