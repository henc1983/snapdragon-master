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
 */
add_action( 'snapdragon_page' , 'snapdragon_page_header' , 10 );
add_action( 'snapdragon_page' , 'snapdragon_page_content' , 20 );
add_action( 'snapdragon_page_after' , 'snapdragon_display_comments' , 10 );