<?php
/**
 * Team Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_team_page( ) {
    
    Kirki::add_section( 'education_zone_pro_team_page_setting', array(
        'title'      => __( 'Team Page Settings', 'education-zone-pro' ),
        'priority'   => 25,
    ) );
   
    /** Team Order */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'radio',
        'settings' => 'education_zone_pro_team_order',
        'label'    => __( 'Team Order', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose team order for team page.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_team_page_setting',
        'default'  => 'date',
        'choices'  => array(
            'date'       => __( 'Post Date', 'education-zone-pro' ),
            'menu_order' => __( 'Menu Order', 'education-zone-pro' ),
        )  
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_team_page' );