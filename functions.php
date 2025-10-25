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



$snapdragon = require_once THEME_DIR . '/includes/class-snapdragon.php';


// Include template hooks
require_once  THEME_DIR . '/includes/snapdragon-template-functions.php';
require_once  THEME_DIR . '/includes/snapdragon-template-hooks.php';

echo'<pre>';
var_dump($snapdragon->translates);
echo'</pre>';