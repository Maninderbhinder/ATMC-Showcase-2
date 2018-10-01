<?php
/**
 * Sort Home Page Section Options
 *
 * @package Education_Zone_Pro
 */

function education_zone_pro_customize_register_home_sort( ) {
    
    /** Sort Home Page Section */
    Kirki::add_section( 'education_zone_pro_sort_home_section', array(
        'title' => __( 'Sort Home Page Sections', 'education-zone-pro' ),
        'priority' => 110,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'sortable',
        'settings'    => 'education_zone_pro_sort_homepage',
        'label'       => __( 'Sort Sections', 'education-zone-pro' ),
        'description' => __( 'Drag and drop different sections to change their order or placement on the front page. Click on the "eye" to hide a section.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_sort_home_section',
        'default'     => array( 'info', 'welcome', 'courses', 'events', 'CTA', 'choose', 'team', 'testimonials', 'blog', 'gallery', 'subscribe' ),
        'choices'     => array(
    		'info'        => esc_attr__( 'Info Section', 'education-zone-pro' ),
    		'welcome'     => esc_attr__( 'Welcome Section', 'education-zone-pro' ),
    		'courses'     => esc_attr__( 'Courses Section', 'education-zone-pro' ),
            'events'      => esc_attr__( 'News & Events Section', 'education-zone-pro' ),
    		'CTA'         => esc_attr__( 'CTA Section', 'education-zone-pro' ),
            'choose'      => esc_attr__( 'Choose Section', 'education-zone-pro' ),
            'team'        => esc_attr__( 'Team Section', 'education-zone-pro' ),
            'testimonials'=> esc_attr__( 'Testimonials Section', 'education-zone-pro' ),
            'blog'        => esc_attr__( 'Blog Section', 'education-zone-pro' ),
            'gallery'     => esc_attr__( 'Gallery Section', 'education-zone-pro' ),
            'subscribe'   => esc_attr__( 'Subscribe Section', 'education-zone-pro' ),
    	),        
    ) );
    /** Home Page Settings Ends */
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_sort' );