<?php
/**
 * Social Sharing Options
 *
 * @package Education_Zone_Pro
 */
 
function education_zone_pro_customize_register_social_share( ) {
    
    Kirki::add_section( 'education_zone_pro_social_share_settings', array(
        'title'    => __( 'Social Sharing Settings', 'education-zone-pro' ),
        'priority' => 11,
        'panel'    => 'education_zone_pro_social_settings',
    ) );
    
    /** Enable Social Sharing Buttons */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_ed_social_sharing',
        'label'       => __( 'Enable Social Sharing Buttons', 'education-zone-pro' ),
        'tooltip'     => __( 'Enable or disable social sharing buttons on single posts.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_social_share_settings',
        'default'     => '',
    ) );
    
    /** Social Sharing Buttons */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'sortable',
        'settings'    => 'education_zone_pro_social_share',
        'label'       => __( 'Social Sharing Buttons', 'education-zone-pro' ),
        'tooltip'     => __( 'Sort or toggle social sharing buttons.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_social_share_settings',
        'default'     => array( 'facebook', 'twitter', 'linkedin', 'pinterest' ),
        'choices'     => array(
    		'facebook'  => __( 'Facebook', 'education-zone-pro' ),
    		'twitter'   => __( 'Twitter', 'education-zone-pro' ),
    		'linkedin'  => __( 'Linkedin', 'education-zone-pro' ),
    		'pinterest' => __( 'Pinterest', 'education-zone-pro' ),
    		'email'     => __( 'Email', 'education-zone-pro' ),
    		'gplus'     => __( 'Google Plus', 'education-zone-pro' ),
            'stumble'   => __( 'StumbleUpon', 'education-zone-pro' ),
            'reddit'    => __( 'Reddit', 'education-zone-pro' ),            
    	),
    ) );
}
add_action( 'init', 'education_zone_pro_customize_register_social_share' );