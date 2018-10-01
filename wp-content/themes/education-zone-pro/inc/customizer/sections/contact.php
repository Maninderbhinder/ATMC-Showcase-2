<?php
/**
 * Contcat form Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_contact_form( ) {
    
    Kirki::add_section( 'education_zone_pro_contact_form_setting', array(
        'title'      => __( 'Contact Page Settings', 'education-zone-pro' ),
        'priority'   => 25,
    ) );
   
    if ( education_zone_pro_is_cf7_activated() ) {   
         /** contact form */
        Kirki::add_field( 'education_zone_pro', array(
            'type'        => 'textarea',
            'settings'    => 'education_zone_pro_contact_form',
            'label'       => __( 'Contact Form', 'education-zone-pro' ),
            'tooltip'     => __( 'Enter the Contact Form Shortcode. Ex. [contact-form-7 id="186" title="Google contact"]', 'education-zone-pro' ),
            'section'     => 'education_zone_pro_contact_form_setting',
            'default'     => '',
        ) );
    }

    /** map */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_contact_map',
        'label'       => __( 'Google Map', 'education-zone-pro' ),
        'tooltip'     => __( 'Enter the Google Map Embed Code', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_contact_form_setting',
        'default'     => '',
        'sanitize_callback' => 'wp_kses_stripslashes',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_contact_form' );