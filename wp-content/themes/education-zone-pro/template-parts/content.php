<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Zone_Pro
 */
$excerpt_char = get_theme_mod( 'education_zone_pro_post_no_of_char', 200 ); //From Customizer
$read_more    = get_theme_mod( 'education_zone_pro_post_read_more', __( 'Read More', 'education-zone-pro' ) ); //From Customizer

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
         do_action( 'education_zone_pro_before_post_entry_content' );
    ?>
    <div class="text-holder">
		<header class="entry-header">
			<?php

			the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php education_zone_pro_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content" itemprop="text">
			<?php
	            if( false === get_post_format() ){
	                if( has_excerpt() ){
	                     the_excerpt();    
	                }else{
	                    echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), $excerpt_char, '...', false, false ) ) ) );  
	                }
	            }else{
	                the_content( sprintf(
	        		/* translators: %s: Name of current post. */
	        		   wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'education-zone-pro' ), array( 'span' => array( 'class' => array() ) ) ),
	        		   the_title( '<span class="screen-reader-text">"', '"</span>', false )
	        		) );    
	            
	            	wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education-zone-pro' ),
						'after'  => '</div>',
					) );
				}
			?>
		</div><!-- .entry-content -->
	
	    <footer class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html( $read_more ); ?></a>
		    <?php education_zone_pro_entry_footer(); ?>
		</footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->
