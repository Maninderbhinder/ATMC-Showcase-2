<?php
/**
 * Home Page Search Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_search( ) {
    
    global $education_zone_pro_options_posts;
    
    /** Search Section */
    Kirki::add_section( 'education_zone_pro_subscription_settings', array(
        'title' => __( 'Newsletter Section', 'education-zone-pro' ),
        'priority' => 95,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );

        /** Select Background Type */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_bg_type',
        'label'       => __( 'Choose Background Type', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_subscription_settings',
        'default'     => 'bg-image',
        'choices'     => array(
            'bg-image'  => __( 'Background Image', 'education-zone-pro' ),
            'bg-color'  => __( 'Background Color', 'education-zone-pro' ),
            )
    ) );
      
    /** Background Image */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'image',
        'settings'    => 'education_zone_pro_subscription_background_image',
        'label'       => __( 'Background Image', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_subscription_settings',
        'default'     => '',
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_bg_type',
                'operator' => '==',
                'value'    => 'bg-image',
            )            
        )

     ) );    
    
    /** Search Background Color */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'color',
        'settings'    => 'education_zone_pro_subscription_bg_color',
        'label'       => __( 'Background Color', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_subscription_settings',
        'default'     => '',
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_bg_type',
                'operator' => '==',
                'value'    => 'bg-color',
            )            
        )

    ) );
    
    
    /** Search Section Ends */
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_search' );