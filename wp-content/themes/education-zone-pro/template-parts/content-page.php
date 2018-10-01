<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Zone
 */

//$sidebar_layout = education_zone_pro_sidebar_layout();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php do_action( 'education_zone_pro_before_page_entry_content' ); ?>
    
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education-zone-pro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php education_zone_pro_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
