<?php 
/**
 * Template Part: Nav Dropdown.
 *
 * @package snapdragon
 */

$item = $args[ 'item' ];
$child_items = $args[ 'children' ];

?>

<li class="nav-list-item">

    <div class="dropdown nav-item overflow-hidden group" id="dropdown-<?php esc_attr_e( $item->ID ) ?>">
        <button class="toggle nav-link pr-2.5">
            <?php esc_attr_e( $item->title )?>
            <svg class="icon"><use xlink:href="#arrow-svg-icon" /></svg>
        </button>
        <div class="content rounded-md" id="dropdown-content-<?php esc_attr_e( $item->ID ) ?>" aria-labelledby="#dropdown-<?php esc_attr_e( $item->ID ) ?>">
            <ul class="flex flex-col">
                <?php 
                    foreach( $child_items as $child_item) :
                        get_template_part( 'template-parts/components/nav' , 'link' , [ 'item'=>$child_item , 'class'=>'dropdown-item rounded-md' ] );
                    endforeach;
                ?>
            </ul>
        </div>
    </div>

</li>