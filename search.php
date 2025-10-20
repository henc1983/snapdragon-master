<?php
/**
 * The template for displaying search results pages.
 *
 * @package snapdragon
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						/* translators: %s: search term */
						printf( esc_attr__( 'Search Results for: %s', 'snapdragon' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			get_template_part( 'loop' );

		else :

			get_template_part( 'templates/content', 'none' );

		endif;
		?>

		</main>
	</div>

<?php
do_action( 'snapdragon_sidebar' );
get_footer();
