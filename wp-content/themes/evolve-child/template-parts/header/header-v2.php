<header class="header-v2 header-wrapper" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<div class="top-bar py-2">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-6">
					<?php if (evolve_theme_mod('evl_social_links', 0)) {
						evolve_social_media_links();
					}

					if (is_active_sidebar('top-left')) {
						dynamic_sidebar('top-left');
					} ?>
				</div>
				<div class="col-6">
					<?php if (is_active_sidebar('top-right')) {
						dynamic_sidebar('top-right');
					}

					if (class_exists('Woocommerce')) {
						evolve_woocommerce_menu();
					} ?>
				</div>
			</div>
		</div>
	</div>
	<div class="header-pattern">

		<?php if (get_header_image()) {
			echo '<div class="custom-header">';
		} ?>

		<div class="header container">
			<div class="row align-items-md-center">
				<div class="col-12 col-md-2 text-center mb-2 navbar-menu">
					<span class="ham-icon">
						<i class="fa fa-bars action-icon" aria-hidden="true"></i>
					</span>
				</div>
				<div class="col-12 col-md-8">
					<h1 id="website-title" class="text-center">
						<a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a>
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
				<?php
				$searchEnable = evolve_theme_mod('evl_searchbox', true);
				?>
			</div><!-- .row .align-items-center -->
			<div class="row align-items-md-center ">
				<div class="d-none d-md-block <?php echo $searchEnable ? 'col-8' : 'col centered-nav' ?>">
					<?php echo evolve_child_menu('primary-menu', 'navbar-nav mr-auto');  ?>
				</div>
				<?php if ($searchEnable) { ?>
					<div class="col-4">
						<?php evolve_header_search('2'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="nav-menu container d-none">
				<div class="row mb-3">
					<div class="col col-md-1 navbar-close">
						<span class="menu-close-icon">
							<i class="fa fa-times action-icon" aria-hidden="true"></i>
						</span>
					</div>
					<div class="col col-md-11">
						<?php evolve_header_search(''); ?>
					</div>
				</div>
				<div class="row">
					<div class="col col-md-6">
						<?php echo evolve_child_menu('hamburger-menu-1', 'navbar-nav mr-auto');  ?>
					</div>

					<div class="col col-md-6">
						<?php echo evolve_child_menu('hamburger-menu-2', 'navbar-nav mr-auto');  ?>
					</div>
				</div>
			</div>
		</div><!-- .header .container -->

		<?php if (get_header_image()) {
			echo '</div><!-- .custom-header -->';
		} ?>

	</div><!-- .header-pattern -->
	
	<!-- Side Menu -->
	<div class="side-menu d-block d-md-none">
		<div class="container px-0">
			<div class="row mx-0 py-2 menu-head ">
				<div class="col-10">
					<h3><?php bloginfo('name') ?></h3>
				</div>
				<div class="col-2 navbar-close">
					<span class="menu-close-icon">
						<i class="fa fa-times action-icon float-right" aria-hidden="true"></i>
					</span>
				</div>
			</div>
			<div class="row mx-0 py-3 menu-nav">
				<div class="col-12 mb-3">
					<?php evolve_header_search(''); ?>
				</div>
				<div class="col-12 col-md-6">
					<?php 
						echo wp_nav_menu(array(
							'menu_class' => 'side-menu-nav mb-0',
							'theme_location' => 'hamburger-menu-1'
						));
					?>
				</div>

				<div class="col-12 col-md-6">
					<?php 
						echo wp_nav_menu(array(
							'menu_class' => 'side-menu-nav mb-0',
							'theme_location' => 'hamburger-menu-2'
						));
					?>
				</div>
			</div>
		</div>
	</div><!-- Side Menu -->
</header><!-- .header-v2 -->