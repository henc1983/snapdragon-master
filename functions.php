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

require_once  THEME_DIR . '/includes/helpers/options-class.php';