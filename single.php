<?php
/**
 * Single Post template
 * @package snapdragon
 */

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php 
        while ( have_posts() ) :
            the_post();
            
            do_action( 'snapdragon_single_post_before' );

            get_template_part( 'templates/content', 'single' );

            do_action( 'snapdragon_single_post_after' );
        endwhile;
    ?>

    </main>
</div>

<?php
do_action( 'snapdragon_sidebar' );
get_footer();