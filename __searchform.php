<?php
/**
 * Search Form.
 *
 * @package snapdragon
 */

?>

<form role="search" method="get" id="searchform" class="searchform" action="http://snapdragon.localhost/">
    <div class="">
        <label class="screen-reader-text" for="s"><?php esc_attr_e( 'Search:' , 'snapdragon' ) ?></label>
        <input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search for...' , 'snapdragon' ) ?>" autocomplete="off">
        <button type="submit" id="searchsubmit">
            <svg><use xlink:href="#search-svg-icon" /></svg>
        </button>
    </div>
    <article class="">

    </article>
</form>