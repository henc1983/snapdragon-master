<?php
/**
 * The template part for Blog posts
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<article id="post-<?php esc_attr_e( get_the_ID() ); ?>" <?php post_class(); ?>>
    <?php
	// Shows featured image of post
	do_action( 'snapdragon_loop_post' );
	?>
</article>