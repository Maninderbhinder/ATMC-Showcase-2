jQuery(document).ready(function($) {
	/* Move widgets to their respective sections */
	wp.customize.section( 'sidebar-widgets-stat-counter' ).panel( 'education_zone_pro_home_page_settings' );
	wp.customize.section( 'sidebar-widgets-stat-counter' ).priority( '40' );
    
    /* Move widgets to their respective sections */
	wp.customize.section( 'sidebar-widgets-newsletter-form' ).panel( 'education_zone_pro_home_page_settings' );
	wp.customize.section( 'sidebar-widgets-newsletter-form' ).priority( '100' );   
    
});