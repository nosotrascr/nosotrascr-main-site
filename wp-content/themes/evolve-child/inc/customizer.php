<?php

if (!function_exists('evolve_child_customize_settings_register')) {
    function evolve_child_customize_settings_register ($wp_customize) {

        // 
        $wp_customize->add_setting( 'evlch_main_site_color' , array(
            'default'   => '#ffbf00',
        ) );
        $wp_customize->add_setting('evlch_categories_filter_enable', array(
            'default'   => 0,
        ));
        // Menu
        $wp_customize->add_setting( 'evlch_menu_back_color' , array(
            'default'   => '#f7f7f7',
        ) );
        $wp_customize->add_setting( 'evlch_menu_head_back_color' , array(
            'default'   => '#3c2596',
        ) );
        $wp_customize->add_setting( 'evlch_menu_head_color' , array(
            'default'   => '#ffffff',
        ) );
        $wp_customize->add_setting( 'evlch_menu_search_back_color' , array(
            'default'   => '#d8d8d8',
        ) );
        $wp_customize->add_setting( 'evlch_menu_search_color' , array(
            'default'   => '#212121',
        ) );
        $wp_customize->add_setting( 'evlch_menu_nav_color' , array(
            'default'   => '#212121',
        ) );
        $wp_customize->add_setting( 'evlch_menu_nav_hover_color' , array(
            'default'   => '#212121',
        ) );
        $wp_customize->add_setting( 'evlch_breadcrumb_line_color' , array(
            'default'   => '#F00',
        ) );
        $wp_customize->add_setting( 'evlch_related_news_border_color' , array(
            'default'   => '#DDD',
        ) );
        $wp_customize->add_setting('evlch_sticky_header_enable_nav', array(
            'default'   => 0,
        ));
    }
}

if(!function_exists('evolve_child_customize_sections')) {
    function evolve_child_customize_sections($wp_customize) {
        $menuSectionId = 'evolve_child_nosotras_menu_section';
        $mainMenuSectionId = 'evolve_child_nosotras_main_section';
        $stickyHeaderSectionId = 'evl-header-subsec-sticky-header-tab';

        // Sections
        // NosotrasCR Menus
        $wp_customize->add_section($menuSectionId , array(
            'title'      => __( 'NosotrasCR Menus', 'evolve_child' ),
            'priority'   => 100,
        ) );

        // NosotrasCR Configurations
        $wp_customize->add_section($mainMenuSectionId , array(
            'title'      => __( 'NosotrasCR Configurations', 'evolve_child' ),
            'priority'   => 99,
        ) );

        // Controls for NosotrasCR Configurations
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_main_site_color_control', array(
            'label'      => __( 'Main Site Color', 'evolve_child' ),
            'section'    => $mainMenuSectionId,
            'settings'   => 'evlch_main_site_color',
        ) ) );
        Kirki::add_field( 'evolve_child', [
            'type'        => 'switch',
            'settings'    => 'evlch_categories_filter_enable',
            'label'       => esc_html__( 'Enable Date Filter on Categories', 'kirki' ),
            'section'     => $mainMenuSectionId,
            'default'     => 0,
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'evolve_child' ),
                'off' => esc_html__( 'Disable', 'evolve_child' ),
            ],
        ] );


        // Controls for NosotrasCR Menus
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_back_color_control', array(
            'label'      => __( 'Background Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_back_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_head_back_color_control', array(
            'label'      => __( 'Header Background Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_head_back_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_head_color_control', array(
            'label'      => __( 'Header Font Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_head_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_search_back_color_control', array(
            'label'      => __( 'Search Background Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_search_back_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_search_color_control', array(
            'label'      => __( 'Search Font Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_search_color',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_nav_color_control', array(
            'label'      => __( 'Links color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_nav_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_nav_hover_color_control', array(
            'label'      => __( 'Links Hover Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_nav_hover_color',
        ) ) );

        $breadcrumbSectionId = 'evl-pagetitlebar-tab';

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_breadcrumb_line_color_control', array(
            'label'      => __( 'Color', 'evolve_child' ),
            'section'    => $breadcrumbSectionId,
            'settings'   => 'evlch_breadcrumb_line_color',
            'priority'   => 11,
        )));

        // Sticky header extra controls
        Kirki::add_field( 'evolve_child', [
            'type'        => 'switch',
            'settings'    => 'evlch_sticky_header_enable_nav',
            'label'       => esc_html__( 'Enable Navbar', 'kirki' ),
            'section'     => $stickyHeaderSectionId,
            'default'     => 0,
            'priority'    => 3,
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'evolve_child' ),
                'off' => esc_html__( 'Disable', 'evolve_child' ),
            ],
        ] );

        $relatedNewsSectionId = 'evolve_child_nosotras_related_news_section';

        $wp_customize->add_section($relatedNewsSectionId , array(
            'title'      => __( 'Noticias relacionadas', 'evolve_child' ),
            'priority'   => 102,
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_related_news_border_color_control', array(
            'label'      => __( 'Border Color', 'evolve_child' ),
            'section'    => $relatedNewsSectionId,
            'settings'   => 'evlch_related_news_border_color',
        ) ) );
    }
}
?>