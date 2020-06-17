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
