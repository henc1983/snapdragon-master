<?php
/**
 * Search Form.
 *
 * @package snapdragon
 */

?>

<form id="searchform" method="get" role="search">
  <label for="s" class="screen-reader-text px-1 block text-sm/6 font-medium text-gray-900"><?php esc_attr_e( 'Search' , 'snapdragon' ) ?></label>
    <div class="search-wrapper">
      
      <input autocomplete="off" value="<?php the_search_query(); ?>" id="s" type="text" name="s" placeholder="<?php esc_attr_e( 'Search for...' , 'snapdragon' ) ?>" class="block min-w-[280px] grow py-2.5 px-4 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
      <div class="grid shrink-0 grid-cols-1 focus-within:relative">

        <button type="submit" id="searchsubmit" class="search-submit-button">
            <svg><use xlink:href="#search-svg-icon" /></svg>
        </button>
        
      </div>
  </div>
</form>