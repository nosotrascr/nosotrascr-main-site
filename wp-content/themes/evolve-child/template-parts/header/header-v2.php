<header class="header-v2 header-wrapper" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    <div class="top-bar py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-12">
					<?php if ( evolve_theme_mod( 'evl_social_links', 0 ) ) {
						evolve_social_media_links();
					}

					if ( is_active_sidebar( 'top-left' ) ) {
						dynamic_sidebar( 'top-left' );
					} ?>
                </div>
                <div class="col-md-6 col-sm-12">
					<?php if ( is_active_sidebar( 'top-right' ) ) {
						dynamic_sidebar( 'top-right' );
					}

					if ( class_exists( 'Woocommerce' ) ) {
						evolve_woocommerce_menu();
					} ?>
                </div>
            </div>
        </div>
    </div>
    <div class="header-pattern">

		<?php if ( get_header_image() ) {
			echo '<div class="custom-header">';
		} ?>

        <div class="header container">
            <div class="row align-items-md-center">
				<div class="col col-md-2 menu-icon">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<div class="col col-md-8">
					<h1 id="website-title" class="text-center">
						<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?></a>
					<h1>
				</div>
			<?php 
			
			// TODO: How to add new layout as part of customization options
			// Code comment just for future reference. 
			// if ( evolve_theme_mod( 'evl_main_menu', false ) !== true ) {
			// 	echo evolve_menu( 'primary-menu', 'navbar-nav mr-auto' );
			// }

			// if ( evolve_theme_mod( 'evl_searchbox', true ) ) {
			// 	evolve_header_search( '2' );
			// } 
			?>

			</div><!-- .row .align-items-center -->
			<div class="row align-items-md-center">
				<div class="col">
					<?php echo evolve_child_menu( 'primary-menu', 'navbar-nav mr-auto' );  ?>
				</div>
			</div>
        </div><!-- .header .container -->

		<?php if ( get_header_image() ) {
			echo '</div><!-- .custom-header -->';
		} ?>

    </div><!-- .header-pattern -->
</header><!-- .header-v2 -->