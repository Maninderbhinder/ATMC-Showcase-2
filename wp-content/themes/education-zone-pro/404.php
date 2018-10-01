<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Education_Zone_Pro
 */

get_header(); ?>

	
	<span><?php esc_html_e( '404!', 'education-zone-pro' ); ?></span>

    <h1><?php esc_html_e( 'The requested page cannot be found', 'education-zone-pro' ); ?></h1>
	
    <p><?php esc_html_e( 'We\'re really sorry! Something went wrong trying to display the page, Please try one of these instead', 'education-zone-pro' ); ?></p>
	
    <?php get_search_form(); ?>
	
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="homepage"><?php esc_html_e( 'Back to homepage', 'education-zone-pro' ); ?></a>

<?php
get_footer();
