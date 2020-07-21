<?php

if (!function_exists('evolve_child_customize_settings_register')) {
    function evolve_child_customize_settings_register ($wp_customize) {
        // Menu
        $wp_customize->add_setting( 'evlch_menu_back_color' , array(
            'default'   => '#f7f7f7',
        ) );
        $wp_customize->add_setting( 'evlch_menu_color' , array(
            'default'   => '#212121',
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
        $wp_customize->add_setting( 'evlch_menu_nav_direction' , array(
            'default'   => 'column',
        ) );
        $wp_customize->add_setting( 'evlch_breadcrumb_line_color' , array(
            'default'   => '#F00',
        ) );
        $wp_customize->add_setting( 'evlch_related_news_border_color' , array(
            'default'   => '#DDD',
        ) );
    }
}

if(!function_exists('evolve_child_customize_sections')) {
    function evolve_child_customize_sections($wp_customize) {
        $menuSectionId = 'evolve_child_nosotras_menu_section';

        $wp_customize->add_section($menuSectionId , array(
            'title'      => __( 'NosotrasCR Menus', 'evolve_child' ),
            'priority'   => 100,
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_back_color_control', array(
            'label'      => __( 'Background Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_back_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_color_control', array(
            'label'      => __( 'Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_color_control', array(
            'label'      => __( 'Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_head_back_color_control', array(
            'label'      => __( 'Mobile Header Background Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_head_back_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_head_color_control', array(
            'label'      => __( 'Mobile Header Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_head_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_search_back_color_control', array(
            'label'      => __( 'Search Background Color', 'evolve_child' ),
            'section'    => $menuSectionId,
            'settings'   => 'evlch_menu_search_back_color',
        ) ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_menu_search_color_control', array(
            'label'      => __( 'Search Color', 'evolve_child' ),
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
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'evlch_menu_nav_direction_control',
                array(
                    'label'          => __( 'Navbar direction', 'evolve_child' ),
                    'section'        => $menuSectionId,
                    'settings'       => 'evlch_menu_nav_direction',
                    'type'           => 'radio',
                    'choices'        => array(
                        'column'   => __( 'Horizontal' ),
                        'row'  => __( 'Vertical' )
                    )
                )
            )
        );

        $breadcrumbSectionId = 'evl-pagetitlebar-tab';

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evlch_breadcrumb_line_color_control', array(
            'label'      => __( 'Color', 'evolve_child' ),
            'section'    => $breadcrumbSectionId,
            'settings'   => 'evlch_breadcrumb_line_color',
            'priority'   => 11,
        )));


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