<?php
/**
 * Event Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_event_page( ) {
    
    Kirki::add_section( 'education_zone_pro_event_page_setting', array(
        'title'      => __( 'Event Page Settings', 'education-zone-pro' ),
        'priority'   => 25,
    ) );
   
    /** event Order */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'radio',
        'settings' => 'education_zone_pro_event_order',
        'label'    => __( 'Event Order', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose event order for event page.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_event_page_setting',
        'default'  => 'date',
        'choices'  => array(
            'date'       => __( 'Post Date', 'education-zone-pro' ),
            'menu_order' => __( 'Menu Order', 'education-zone-pro' ),
        )  
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_event_page' );