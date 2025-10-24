<?php 
/**
 * Template Part: Dropdown button.
 *
 * @package snapdragon
 */

$item = $args[ 'item' ];
$child_items = $args[ 'children' ];

?>

<div class="dropdown overflow-hidden group" id="dropdown-<?php esc_attr_e( $item->ID ) ?>">
    <button class="toggle button pr-2.5">
        <?php esc_attr_e( $item->title )?>
        <svg class="icon"><use xlink:href="#arrow-svg-icon" /></svg>
    </button>
    <div class="content rounded-md" id="dropdown-content-<?php esc_attr_e( $item->ID ) ?>" aria-labelledby="#dropdown-<?php esc_attr_e( $item->ID ) ?>">
    
        <?php esc_html_e( $child_items ); ?>

    </div>
</div>