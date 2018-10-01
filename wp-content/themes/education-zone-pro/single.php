<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Education_Zone_Pro
 */

get_header();
?>

	<div id="primary" class="content-area">
	    <main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

            //Add and Increase Post View Count
            education_zone_pro_set_views( get_the_ID() );

			get_template_part( 'template-parts/content', 'single' );

            do_action( 'education_zone_pro_after_post_content' ) ;

			the_post_navigation();

		    /**
             * education_zone Comment
             * 
             * @hooked education_zone_pro_get_comment_section 
            */
            do_action( 'education_zone_pro_comment' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
