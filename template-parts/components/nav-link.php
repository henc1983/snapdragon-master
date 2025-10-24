<?php 
/**
 * Template Part: Nav Link.
 *
 * @package snapdragon
 */
$item = $args['item'];
$class = isset($args['class']) ? $args['class'] : '';

?>

<li class="nav-list-item">
    <a target="_self" id="nav-link-<?php esc_attr_e( $item->ID ) ?>" class="nav-link <?php esc_attr_e( $class ) ?>" href="<?php esc_attr_e( esc_url( $item->url ) ) ?>">
        <?php esc_attr_e( $item->title )?>
    </a>
</li>