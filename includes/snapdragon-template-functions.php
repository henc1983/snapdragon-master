<?php
/**
 * Template Functions.
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');



if ( ! function_exists( 'snapdragon_page_header' ) ) {
	/**
	 * Display the page header
	 * @since 1.0
	 */
	function snapdragon_page_header() {
		if ( is_front_page() ) {
			return;
		}

		?>
		<header class="entry-header">
			<?php
			snapdragon_post_thumbnail( 'full' );
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_page_content' ) ) {
	/**
	 * Display the post content
	 * @since 1.0
	 */
	function snapdragon_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'snapdragon' ),
						'after'  => '</div>',
					)
				);
			?>
		</div>
		<?php
	}
}



if ( ! function_exists( 'snapdragon_display_comments' ) ) {
	/**
	 * Snapdragon display comments
	 * @since  1.0
	 */
	function snapdragon_display_comments() {
		if ( comments_open() || 0 !== intval( get_comments_number() ) ) :
			comments_template();
		endif;
	}
}