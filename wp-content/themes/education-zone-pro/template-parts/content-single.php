<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_zone_pro
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php 
         do_action( 'education_zone_pro_before_page_entry_content' );
    ?>
    
	<header class="entry-header">
		<?php
			
		the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
			
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php education_zone_pro_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php
            the_content( sprintf(
        		/* translators: %s: Name of current post. */
        		wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'education-zone-pro' ), array( 'span' => array( 'class' => array() ) ) ),
        		the_title( '<span class="screen-reader-text">"', '"</span>', false )
        	) );
                
            wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education-zone-pro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php 
            education_zone_pro_entry_footer();
        ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
