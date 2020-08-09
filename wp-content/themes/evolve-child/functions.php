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

if ( ! function_exists( 'evolve_sticky_header_open' ) ) {
	function evolve_sticky_header_open() {
        $hamIcon = '<span class="col-4 ham-icon"><i class="fa fa-bars action-icon" aria-hidden="true"></i></span>';
        
		if ( evolve_theme_mod( 'evl_sticky_header', true ) == false ) {
			return;
		}

		echo '<div class="sticky-header"><div class="container"><div class="row align-items-center">';
		if ( evolve_theme_mod( 'evl_blog_title', '0' ) != '1' && evolve_logo_position() !== 'disable' && '' != ( evolve_theme_mod( 'evl_header_logo', '' ) ) ) {
			echo '<div class="col-auto"><div class="row align-items-center">';
		}
		if ( evolve_logo_position() == "disable" ) {
		} else {
			if ( evolve_theme_mod( 'evl_header_logo', '' ) ) {
				echo $hamIcon . '<div class="' . ( ( evolve_theme_mod( 'evl_blog_title', '0' ) == '1' ) ? 'col-4 text-center px-5' : 'col-auto pr-0' ) . '"><a href="' . home_url() . '"><img src="' . evolve_theme_mod( 'evl_header_logo', '' ) . '" alt="' . get_bloginfo( 'name' ) . '" /></a></div>';
			}
		}
		if ( evolve_theme_mod( 'evl_blog_title', '0' ) == "0" ) {
			echo '<div class="' . ( '' != ( evolve_theme_mod( 'evl_header_logo', '' ) && evolve_logo_position() != "disable" ) ? 'col-auto pr-0' : 'col-auto' ) . '"><a id="sticky-title" href="' . home_url() . '">';
			bloginfo( 'name' );
			echo '</a></div>';
		}
		if ( evolve_theme_mod( 'evl_blog_title', '0' ) != '1' && evolve_logo_position() !== 'disable' && '' != ( evolve_theme_mod( 'evl_header_logo', '' ) ) ) {
			echo '</div></div>';
        }
        if (get_theme_mod('evlch_sticky_header_enable_nav')) {
            if ( has_nav_menu( 'sticky_navigation' ) ) {
                echo '<nav class="navbar navbar-expand-md col' . ( ( ( evolve_logo_position() == 'disable' && evolve_theme_mod( 'evl_blog_title', '0' ) == '1' ) || evolve_theme_mod( 'evl_blog_title', '0' ) == '1' ) ? " pl-0" : "" ) . '">
                                    <div class="navbar-toggler" data-toggle="collapse" data-target="#sticky-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="' . __( "Sticky", "evolve" ) . '">
                                        <span class="navbar-toggler-icon-svg"></span>
                                    </div><div id="sticky-menu" class="collapse navbar-collapse" data-hover="dropdown" data-animations="fadeInUp fadeInDown fadeInDown fadeInDown">';
                wp_nav_menu( array(
                    'theme_location' => 'sticky_navigation',
                    'depth'          => 10,
                    'container'      => false,
                    'menu_class'     => 'navbar-nav mr-auto align-items-center',
                    'fallback_cb'    => 'evolve_custom_menu_walker::fallback',
                    'walker'         => new evolve_custom_menu_walker()
                ) );
                echo '</div></nav>';
            } elseif ( has_nav_menu( 'primary-menu' ) ) {
                echo '<nav class="navbar navbar-expand-md col' . ( ( ( evolve_logo_position() == 'disable' && evolve_theme_mod( 'evl_blog_title', '0' ) == '1' ) || evolve_theme_mod( 'evl_blog_title', '0' ) == '1' ) ? " pl-0" : "" ) . '">
                                    <div class="navbar-toggler" data-toggle="collapse" data-target="#sticky-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="' . __( "Sticky", "evolve" ) . '">
                                        <span class="navbar-toggler-icon-svg"></span>
                                    </div><div id="sticky-menu" class="collapse navbar-collapse" data-hover="dropdown" data-animations="fadeInUp fadeInDown fadeInDown fadeInDown">';
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'depth'          => 10,
                    'container'      => false,
                    'menu_class'     => 'navbar-nav mr-auto align-items-center',
                    'fallback_cb'    => 'evolve_custom_menu_walker::fallback',
                    'walker'         => new evolve_custom_menu_walker()
                ) );
                echo '</div></nav>';
            } else {
                echo '<nav class="navbar navbar-expand-md col' . ( ( ( evolve_logo_position() == 'disable' && evolve_theme_mod( 'evl_blog_title', '0' ) == '1' ) || evolve_theme_mod( 'evl_blog_title', '0' ) == '1' ) ? " pl-0" : "" ) . '">
                                    <div class="navbar-toggler" data-toggle="collapse" data-target="#sticky-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="' . __( "Sticky", "evolve" ) . '">
                                        <span class="navbar-toggler-icon-svg"></span>
                                    </div><div id="sticky-menu" class="collapse navbar-collapse" data-hover="dropdown" data-animations="fadeInUp fadeInDown fadeInDown fadeInDown">';

                wp_page_menu( array(
                    'menu_class' => 'page-nav',
                    'echo'       => '1',
                ) );

                echo '</div></nav>';
            }
        }
		if ( evolve_theme_mod( 'evl_searchbox_sticky_header', '1' ) == "1" ) {
			evolve_header_search( 'sticky' );
		}

		echo '</div></div></div><!-- .sticky-header --><div class="header-height">';
	}
}

add_action( 'evolve_header_area', 'evolve_sticky_header_open', 20 );

if ( ! function_exists( 'post_class_custom' ) ) {
    function post_class_custom( $class = '', $post_id = null ) {
        // Separates classes with a single space, collates classes for post DIV.
        echo 'class="main_site_color ' . join( ' ', get_post_class( $class, $post_id ) ) . '"';
    }
}



function evolve_child_register_my_menu() {
	register_nav_menu('hamburger-menu-1',__( 'Hamburger-menu' ));
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

/**
 * Simple filter posts if there is a post_date param
 */
if ( ! function_exists( 'categories_date_filter' ) ) {
    function categories_date_filter( $query ) {
        if ( !is_admin() && $query->is_main_query() ) {
            $post_date_str = $_GET['post_date'];
            $category = $_GET['cat'];

            if ($category && $post_date_str) {
                $post_date = strtotime($post_date_str);
                $query->set('date_query', array(
                    'year' => date('Y', $post_date),
                    'month' => date('n', $post_date),
                    'day' => date('j', $post_date)
                ));
                $query->set('cat', $category);
            }
        }
        return $query;
    }
}
add_action('pre_get_posts', 'categories_date_filter');