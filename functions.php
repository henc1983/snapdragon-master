<?php
/**
 * Snapdragon engine room
 *
 * @package snapdragon
 */

defined('ABSPATH') or die('No script kiddies please!');
defined( 'THEME_DIR' ) or define( 'THEME_DIR' , untrailingslashit( get_template_directory() ) );



// Include theme functions
require_once  THEME_DIR . '/includes/snapdragon-functions.php';



// Include template hooks
require_once  THEME_DIR . '/includes/snapdragon-template-functions.php';
require_once  THEME_DIR . '/includes/snapdragon-template-hooks.php';

$my_options = require_once  THEME_DIR . '/includes/helpers/options-class.php';


add_action( 'wp_enqueue_scripts' , 'snapdragon_enqueue_scripts' );

function snapdragon_enqueue_scripts() {
    wp_enqueue_style('my_style', get_template_directory_uri() . '/assets/styles/style.css');
}


add_action( 'after_setup_theme' , 'snapdragon_custom_logo' );

function snapdragon_custom_logo() {
    $default_logo = [
				'height'               => 100,
				'width'                => 400,
				'flex-height'          => true,
				'flex-width'           => true,
				'header-text'          => array( 'site-title', 'site-description' )
			];
			add_theme_support( 'custom-logo' , $default_logo );

}