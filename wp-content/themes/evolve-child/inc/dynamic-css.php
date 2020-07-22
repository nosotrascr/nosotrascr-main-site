<?php
if(!function_exists('evolve_child_dynamic_css')) {
	function evolve_child_dynamic_css($css_data) {
		$css_data = '';

		$menus_back                  = get_theme_mod('evlch_menu_back_color', '#f7f7f7');
		$menus_color				 = get_theme_mod('evlch_menu_color', '#212121');
		$m_header_back_color		 = get_theme_mod('evlch_menu_head_back_color', '#3c2596');
		$m_color					 = get_theme_mod('evlch_menu_head_color', '#ffffff');
		$search_back_color			 = get_theme_mod('evlch_menu_search_back_color', '#d8d8d8');
		$search_color				 = get_theme_mod('evlch_menu_search_color', '#212121');
		$menu_nav_color				 = get_theme_mod('evlch_menu_nav_color', '#212121');
		$menu_nav_hover_color		 = get_theme_mod('evlch_menu_nav_hover_color', '#212121');
		$menu_nav_direction 		 = get_theme_mod('evlch_menu_nav_direction', 'column');
		$main_site_color       		 = get_theme_mod( 'evlch_main_site_color', '#ffbf00' );

		$css_data .= ".nav-menu, .side-menu { color: ${menus_color}; background-color: {$menus_back}; }"; 
		$css_data .= ".side-menu .menu-head { color: {$m_color}; background-color: {$m_header_back_color}; } .side-menu h3 { color: {$m_color};}";
		$css_data .= ".nav-menu .search-form .icon-search, .side-menu .search-form .icon-search { color: {$search_color}; }";
		$css_data .= ".nav-menu .search-form .form-control, .side-menu .search-form .form-control { color: {$search_color}; background-color: {$search_back_color}; }";
		$css_data .= ".nav-menu .search-form .form-control::placeholder, .side-menu .search-form .form-control::placeholder { color: {$search_color}; }";
		$css_data .= ".nav-menu .search-form .form-control:focus, .side-menu .search-form .form-control:focus { background-color: {$search_back_color}; }";
		$css_data .= ".side-menu .side-menu-nav a { color: {$menu_nav_color};}";
		$css_data .= ".nav-menu .navbar-nav .nav-item .nav-link, .nav-menu .navbar-nav .nav-item.active .nav-link { color: {$menu_nav_color}; }";
		$css_data .= ".nav-menu .navbar-nav .nav-item .nav-link:hover, .nav-menu .navbar-nav .nav-item.active .nav-link:hover { color: {$menu_nav_hover_color}; }";
		$css_data .= ".nav-menu .navbar-nav { flex-direction: {$menu_nav_direction};}";
		$css_data .= ".main_site_color:after{border-color: {$main_site_color}; }";
		$css_data .= ".main_site_color_font{color: {$main_site_color}; }";

		return $css_data;
	}
}

?>