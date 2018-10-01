<?php
/**
 * Home Page welcome Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_welcome( ) {
    
   // global $education_zone_pro_options_posts;
    
    /** welcome Section */
    Kirki::add_section( 'education_zone_pro_welcome_settings', array(
        'title' => __( 'Welcome Section', 'education-zone-pro' ),
        'priority' => 30,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    /** welcome Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_welcome_section_title',
        'label'       => __( 'Welcome Section Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_welcome_settings',
        'default'     => '',
    ) );  

    /** welcome Section Content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_welcome_section_content',
        'label'       => __( 'Welcome Section Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_welcome_settings',
        'default'     => '',
    ) );   
      
}
add_action( 'init', 'education_zone_pro_customize_register_home_welcome' );