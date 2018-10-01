<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Zone_Pro
 */
$excerpt_char = get_theme_mod( 'education_zone_pro_post_no_of_char', 200 );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php if(has_post_thumbnail()){ ?>
        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
          <?php the_post_thumbnail('education-zone-pro-search-result'); ?>
        </a>
    <?php } ?>
    
    <div class="text">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php education_zone_pro_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content" itemprop="headline">
			<?php 
	            if( has_excerpt() ){
	                the_excerpt();        
	            }else{
	                echo wpautop( wp_kses_post( force_balance_tags( education_zone_pro_excerpt( get_the_content(), $excerpt_char, '...', false, false ) ) ) );        
	            }
	        ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'education-zone-pro' ); ?></a>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
