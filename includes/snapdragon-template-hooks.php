<?php
/**
 * Template hooks.
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');



/**
 * Pages
 *
 * @see  snapdragon_page_header()
 * @see  snapdragon_page_content()
 * @see  snapdragon_display_comments()
 */
add_action( 'snapdragon_page' , 'snapdragon_page_header' , 10 );
add_action( 'snapdragon_page' , 'snapdragon_page_content' , 20 );
add_action( 'snapdragon_page_after' , 'snapdragon_display_comments' , 10 );



/**
 * Posts and Single Posts
 *
 * @see  snapdragon_post_header()
 * @see  snapdragon_post_content()
 * @see  snapdragon_edit_post_link()
 * @see  snapdragon_post_taxonomy()
 * @see  snapdragon_post_nav()
 * @see  snapdragon_display_comments()
 * @see  storefront_post_meta()
 */

add_action( 'snapdragon_loop_post' , 'snapdragon_post_header' , 10 );
add_action( 'snapdragon_loop_post' , 'snapdragon_post_content' , 30 );
add_action( 'snapdragon_loop_post' , 'snapdragon_post_taxonomy' , 40 );
add_action( 'snapdragon_loop_after' , 'snapdragon_paging_nav' , 10 );

add_action( 'snapdragon_single_post' , 'snapdragon_post_header' , 10 );
add_action( 'snapdragon_single_post' , 'snapdragon_post_content' , 30 );

add_action( 'snapdragon_single_post_bottom' , 'snapdragon_edit_post_link' , 5 );
add_action( 'snapdragon_single_post_bottom' , 'snapdragon_post_taxonomy' , 5 );
add_action( 'snapdragon_single_post_bottom' , 'snapdragon_post_nav' , 10 );
add_action( 'snapdragon_single_post_bottom' , 'snapdragon_display_comments' , 20 );

add_action( 'storefront_post_header_before' , 'storefront_post_meta', 10 );
add_action( 'storefront_post_content_before' , 'storefront_post_thumbnail', 10 );