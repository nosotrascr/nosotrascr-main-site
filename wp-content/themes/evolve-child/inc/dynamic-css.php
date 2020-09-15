<?php
if(!function_exists('evolve_child_dynamic_css')) {
	function evolve_child_dynamic_css($css_data) {
		$css_data = '';

		$menus_back                  = get_theme_mod('evlch_menu_back_color', '#f7f7f7');
		$m_header_back_color		 = get_theme_mod('evlch_menu_head_back_color', '#3c2596');
		$m_color					 = get_theme_mod('evlch_menu_head_color', '#ffffff');
		$search_back_color			 = get_theme_mod('evlch_menu_search_back_color', '#d8d8d8');
		$search_color				 = get_theme_mod('evlch_menu_search_color', '#212121');
		$menu_nav_color				 = get_theme_mod('evlch_menu_nav_color', '#212121');
		$menu_nav_hover_color		 = get_theme_mod('evlch_menu_nav_hover_color', '#212121');
		$breadcrumb_line_color 		 = get_theme_mod('evlch_breadcrumb_line_color', '#F00');
		$related_news_border_color	 = get_theme_mod('evlch_related_news_border_color', '#DDD');
		$main_site_color       		 = get_theme_mod( 'evlch_main_site_color', '#ffbf00' );
		$pheader_font_color		 	 = get_theme_mod('evlch_pre_header_font_color', '#000000');
		$pheader_links_hover_color 	 = get_theme_mod('evlch_pre_header_links_hover_color', '#ffbf00');

		$css_data .= ".side-menu { background-color: {$menus_back}; }"; 
		$css_data .= ".side-menu .menu-head { color: {$m_color}; background-color: {$m_header_back_color}; } .side-menu h3 { color: {$m_color};}";
		$css_data .= ".side-menu .search-form .icon-search { color: {$search_color}; }";
		$css_data .= ".side-menu .search-form .form-control { color: {$search_color}; background-color: {$search_back_color}; }";
		$css_data .= ".side-menu .search-form .form-control::placeholder { color: {$search_color}; }";
		$css_data .= ".side-menu .search-form .form-control:focus { background-color: {$search_back_color}; }";
		$css_data .= ".side-menu .side-menu-nav a { color: {$menu_nav_color};}";
		$css_data .= ".side-menu .side-menu-nav a:hover { color: {$menu_nav_hover_color}; }";
		$css_data .= ".breadcrumb { border-bottom-color: {$breadcrumb_line_color};}";
		$css_data .= ".related-news { border-top-color: {$related_news_border_color}; border-bottom-color: {$related_news_border_color};}";
		$css_data .= ".main_site_color:after{border-color: {$main_site_color}; }";
		$css_data .= ".main_site_color_font{color: {$main_site_color}; }";
		$css_data .= ".wp-block-separator.partial-color-border:after{color: {$main_site_color}; }";
		$css_data .= ".header-v2 .top-bar, .header-v2 .top-bar .textwidget, .header-v2 .top-bar a { color: {$pheader_font_color}; }";
		$css_data .= ".header-v2 .top-bar a:hover { color: {$pheader_links_hover_color}; }";
		$css_data .= ".force-hover-maincolor:hover{color: {$main_site_color} !important; }";
		return $css_data;
	}
}

?>