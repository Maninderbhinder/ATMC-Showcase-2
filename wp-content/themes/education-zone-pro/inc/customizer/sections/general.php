<?php
/**
 * General Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_general( ) {
	
    Kirki::add_config( 'education_zone_pro', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
        'disable_output'=> true,
    ) );
    
    Kirki::add_section( 'education_zone_pro_general_settings', array(
        'priority'   => 22,
        'capability' => 'edit_theme_options',
        'title'      => __( 'General Settings', 'education-zone-pro' ),
    ) );
    
    /** Admin Bar */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'toggle',
        'settings' => 'education_zone_pro_ed_adminbar',
        'label'    => __( 'Disable Admin Bar', 'education-zone-pro' ),
        'tooltip'  => __( 'Enable to disable Admin Bar in frontend when logged in.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_general_settings',
        'default'  => '',
    ) );
        
    /** Lightbox */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'toggle',
        'settings' => 'education_zone_pro_ed_lightbox',
        'label'    => __( 'Enable Lightbox', 'education-zone-pro' ),
        'tooltip'  => __( 'A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_general_settings',
        'default'  => '',
    ) );
    
    /** Ajax Quick Search */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'toggle',
        'settings' => 'education_zone_pro_ed_ajax_search',
        'label'    => __( 'Enable Ajax Quick Search', 'education-zone-pro' ),
        'tooltip'  => __( 'Enable to display search results appearing instantly below the search form.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_general_settings',
        'default'  => '',
    ) );

    
    /** Pagination Type */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'radio',
        'settings' => 'education_zone_pro_pagination_type',
        'label'    => __( 'Pagination Type', 'education-zone-pro' ),
        'tooltip'  => __( 'Select pagination type.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_general_settings',
        'default'  => 'default',
        'choices'  => array(
            'default'         => __( 'Default (Next / Previous)', 'education-zone-pro' ),
            'numbered'        => __( 'Numbered (1 2 3 4...)', 'education-zone-pro' ),
            'load_more'       => __( 'AJAX (Load More Button)', 'education-zone-pro' ),
            'infinite_scroll' => __( 'AJAX (Auto Infinite Scroll)', 'education-zone-pro' ),
        )  
    ) );

    /** Load More Label*/
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'text',
        'settings' => 'education_zone_pro_load_more_label',
        'label'    => __( 'Load More Label', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_general_settings',
        'default'  => __( 'Load More Posts', 'education-zone-pro' ),
        'required' => array(
            array(
                'setting'  => 'education_zone_pro_pagination_type',
                'operator' => '==',
                'value'    => 'load_more',
            )            
        )
    ) );
    
    /** Loading Label*/
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'text',
        'settings' => 'education_zone_pro_loading_label',
        'label'    => __( 'Loading Label', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_general_settings',
        'default'  => __( 'Loading...', 'education-zone-pro' ),
        'required' => array(
            array(
                'setting'  => 'education_zone_pro_pagination_type',
                'operator' => '==',
                'value'    => 'load_more',
            )            
        )
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_general' );