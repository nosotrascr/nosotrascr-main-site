<?php  

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	global $css_data;

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

	// Dynamic CSS Definitions
	require get_theme_file_path( '/inc/dynamic-css.php' );
	wp_add_inline_style( 'evolvechild-style', evolve_child_dynamic_css( $css_data ) );
}

if (! function_exists('evolve_child_enqueue_scripts')) {
	function evolve_child_enqueue_scripts() {
		wp_enqueue_script('evolve-child', get_stylesheet_directory_uri() . '/assets/js/nosotras_menus.js', array('jquery'));
	}
}
add_action('wp_enqueue_scripts', 'evolve_child_enqueue_scripts');

require get_stylesheet_directory() . '/functions/evolve_breadcrumbs.php';
require get_stylesheet_directory() . '/functions/evolve_pagination_after.php';

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
        $menu .= '<nav class="navbar navbar-expand-md main-menu mt-3 mt-md-0 order-3 col-sm-11 col-md-12">';
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

if ( ! function_exists( 'evolve_posts_loop_open' ) ) {
    function evolve_posts_loop_open() {
        if ( ( is_home() || is_archive() || is_search() ) ) {
            if ( evolve_theme_mod( 'evl_post_layout', 'two' ) != "one" ) {
                if ( evolve_theme_mod( 'evl_grid_layout', 'card' ) != "card" ) {
                    echo '<div class="posts card-columns">';
                } else {
                    echo '<div class="left-content col-lg-3"><h3>Últimas noticias</h3></div>';
                    echo '<div class="posts card-deck col-lg-9 right-content">';
                }
            } else {
                echo '<div class="posts">';
            }
        }
    }
}

if ( ! function_exists( 'post_class_custom' ) ) {
    function post_class_custom( $class = '', $post_id = null ) {
        // Separates classes with a single space, collates classes for post DIV.
        echo 'class="main_site_color ' . join( ' ', get_post_class( $class, $post_id ) ) . '"';
    }
}



function evolve_child_register_my_menu() {
	register_nav_menu('hamburger-menu-1',__( 'Hamburger-menu-1' ));
	register_nav_menu('hamburger-menu-2',__( 'Hamburger-menu-2' ));
}
add_action( 'init', 'evolve_child_register_my_menu' );

function evolve_child_customize_register($wp_customize) {
	evolve_child_customize_settings_register($wp_customize);
	evolve_child_customize_sections($wp_customize);
}
add_action( 'customize_register', 'evolve_child_customize_register' );

require get_theme_file_path('/inc/customizer.php');


if ( ! function_exists( 'evolve_custom_footer' ) ) {
    function evolve_custom_footer() {
        $evolve_home_url = esc_url( "https://theme4press.com/" );
        $image_url = get_theme_file_uri() . '/assets/images/logo_mini.png';
        $html = '<div class="row"><div class="col custom-footer">'. '<div class="footer-logo"><img src="'.$image_url.'" /></div>' . "<p>Los comentarios realizados en nuestras páginas de redes sociales son responsabilidad exclusiva de sus autores, nosotrascr.com no se responsabiliza por su contenido.</p>";
        $html .= '<p>© 2020 nosotrascr.com - Todos los derechos reservados.</p>';
        $html .= '<a href="'.get_site_url().'" class="terms_of_use">Condiciones de uso</a>'; 
        $html .= '</div></div>';
        echo $html;
    }
}

if ( ! function_exists( 'evolve_primary_container_open' ) ) {
    function evolve_primary_container_open() {
        if ( ( is_home() && ! is_front_page() ) || ( is_front_page() && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) != 'above' ) ) {
            echo '<div id="primary" class="main_site_color ' . evolve_layout_class( $type = 1 ) . '">';
        } elseif ( is_404() ) {
            echo '<div id="primary" class="main_site_color col mb-5">';
        } elseif ( ( function_exists( 'is_buddypress' ) && is_buddypress() ) || ( class_exists( 'bbPress' ) && is_bbpress() ) ) {
            echo '<div id="primary" class="main_site_color ' . evolve_layout_class( $type = 2 ) . '">';
        } elseif ( ( is_home() && ! is_front_page() ) || is_front_page() && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) == 'above' ) {
        } else {
            echo '<div id="primary" class="main_site_color ' . evolve_layout_class( $type = 1 ) . '">';
        }
    }
}
