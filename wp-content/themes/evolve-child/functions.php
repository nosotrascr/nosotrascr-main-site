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