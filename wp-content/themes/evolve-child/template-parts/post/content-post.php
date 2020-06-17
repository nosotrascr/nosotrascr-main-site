<?php

/*
   Displays Post Content
   ======================================= */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope"
         itemtype="http://schema.org/Article">


	<?php if ( is_single() || is_page() ) {
		?><h3 class="pre-titulo"><?php the_field('pre-titulo'); ?></h3><?php
		if ( get_post_meta( $post->ID, 'evolve_page_title', true ) == "yes" || get_post_meta( $post->ID, 'evolve_page_title', true ) == "" ) {
			the_title( '<h1 class="post-title" itemprop="name">', '</h1>' );
		}
	} else {
		if ( evolve_theme_mod( 'evl_post_layout', 'two' ) != "one" ) {
			$evolve_title = the_title( '', '', false );
			echo '<h2 class="post-title" itemprop="name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
			evolve_truncate( intval( evolve_theme_mod( 'evl_posts_excerpt_title_length', '40' ) ), $evolve_title, true, '...' );
			echo '</a></h2>';
		} else {
			the_title( '<h2 class="post-title" itemprop="name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
	}

	evolve_post_meta( 'header' );

	evolve_featured_image( '1' ); ?>

    <div class="post-content" itemprop="description">

		<?php evolve_featured_image( '2' );

		if ( ! is_page() && ( ! is_single() && ( evolve_theme_mod( 'evl_post_layout', 'two' ) != "one" || ( evolve_theme_mod( 'evl_post_layout', 'two' ) == "one" && evolve_theme_mod( 'evl_excerpt_thumbnail', '0' ) == "1" ) ) ) ) {

		echo '<div class="pre-info">';
    	echo '<span>'. get_the_date() .'</span>';
    	echo '<span>'. get_the_author() .'</span>';
    	echo '</div>';
		the_excerpt(); ?>

    </div><!-- .post-content -->

<?php if ( ! is_page() && ( ( ( evolve_theme_mod( 'evl_post_layout', 'two' ) != "one" || evolve_theme_mod( 'evl_post_layout', 'two' ) == "one" && evolve_theme_mod( 'evl_excerpt_thumbnail', '0' ) == "1" ) && ( comments_open() || get_comments_number() || evolve_get_terms( 'cats' ) || evolve_get_terms( 'tags' ) || ( evolve_theme_mod( 'evl_share_this', 'single' ) == "single_archive" && ! is_home() ) || ( evolve_theme_mod( 'evl_share_this', 'single' ) == "all" ) ) ) ) ) { ?>

    <div class="row post-meta post-meta-footer align-items-top">


		<?php

		evolve_sharethis(); ?>

    </div><!-- .row .post-meta .post-meta-footer .align-items-top -->

<?php } ?>


<?php } else {

	if ( is_search() ) {
		the_excerpt();
	} else {
		the_content();
	}

	evolve_wp_link_pages(); ?>

    </div><!-- .post-content -->

	<?php if ( ! is_page() && ( ( is_single() || ( evolve_theme_mod( 'evl_post_layout', 'two' ) == "one" ) && ( comments_open() || get_comments_number() || evolve_get_terms( 'cats' ) || evolve_get_terms( 'tags' ) || ( evolve_theme_mod( 'evl_share_this', 'single' ) == "single_archive" && ! is_home() ) || ( evolve_theme_mod( 'evl_share_this', 'single' ) == "all" ) ) ) ) ) { ?>

        <div class="row post-meta post-meta-footer align-items-top">

			<?php evolve_post_meta( 'footer' );
			evolve_sharethis(); ?>

        </div><!-- .row .post-meta .post-meta-footer .align-items-top -->

	<?php }
} ?>

</article><!-- .post -->

