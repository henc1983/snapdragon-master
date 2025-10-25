<?php 
/**
 * Template Part: Dropdown button.
 *
 * @package snapdragon
 */

$item = $args[ 'item' ];
$content = $args[ 'content' ];
$class = isset($item->btn_class) ? $item->btn_class : '';
?>

<div class="dropdown overflow-hidden group" id="dropdown-<?php esc_attr_e( $item->ID ) ?>">
    <button class="toggle button <?php esc_attr_e( $class ) ?>">
        <svg class="pointer-events-none"><use xlink:href="#<?php esc_html_e( $item->icon ) ?>-svg-icon" /></svg>
        <span class="pointer-events-none"><?php esc_attr_e( $item->title )?></span>
        <svg class="icon pointer-events-none"><use xlink:href="#arrow-svg-icon" /></svg>
    </button>
    <div class="content rounded-md" id="dropdown-content-<?php esc_attr_e( $item->ID ) ?>" aria-labelledby="#dropdown-<?php esc_attr_e( $item->ID ) ?>">
    
        <?php print( $content ); ?>

    </div>
</div>