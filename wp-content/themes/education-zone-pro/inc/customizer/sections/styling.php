<?php
/**
 * Styling Options
 *
 * @package Education Zone Pro
 */

function education_zone_pro_customize_register_styling( ) {

    Kirki::add_section( 'education_zone_pro_styling_settings', array(
        'priority'   => 32,
        'capability' => 'edit_theme_options',
        'title'      => __( 'Styling Settings', 'education-zone-pro' ),
    ) );
    
    /** Layout Style */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Layout Style', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose the default sidebar position for your site. The position of the sidebar for individual posts can be set in the post editor.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_styling_settings',
        'settings' => 'education_zone_pro_layout_style',
        'type'     => 'radio-image',
        'default'  => 'right-sidebar',
        'choices'  => array(
            'left-sidebar' => get_template_directory_uri() . '/images/left-sidebar.png',
            'right-sidebar' => get_template_directory_uri() . '/images/right-sidebar.png',
        )
    ) );
    
    /** Color Scheme */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Color Scheme', 'education-zone-pro' ),
        'tooltip'  => __( 'The theme comes with unlimited color schemes for your theme styling.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_styling_settings',
        'settings' => 'education_zone_pro_color_scheme',
        'type'     => 'color',
        'default'  => '#3b9ad7',
    ) );
    
    /** footer Color Scheme */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Footer Color Scheme', 'education-zone-pro' ),
        'tooltip'  => __( 'Footer color scheme for your footer styling. Please choose dark based color.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_styling_settings',
        'settings' => 'education_zone_pro_footer_color_scheme',
        'type'     => 'color',
        'default'  => '#1f1f1f',
    ) );
    
    /** Background Color */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Background Color', 'education-zone-pro' ),
        'tooltip'  => __( 'Pick a color for site background.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_styling_settings',
        'settings' => 'education_zone_pro_bg_color',
        'type'     => 'color',
        'default'  => '#ffffff',
    ) );
    
    /** Body Background */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Body Background', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose body background as image or pattern.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_styling_settings',
        'settings' => 'education_zone_pro_body_bg',
        'type'     => 'radio-buttonset',
        'default'  => 'image',
        'choices'  => array(
            'image'   => __( 'Image', 'education-zone-pro' ),
            'pattern' => __( 'Pattern', 'education-zone-pro' ),
        ),
    ) );
    
    /** Background Image */
    Kirki::add_field( 'education_zone_pro', array(
        'label'           => __( 'Background Image', 'education-zone-pro' ),
        'tooltip'         => __( 'Upload your own custom background image or pattern.', 'education-zone-pro' ),
        'section'         => 'education_zone_pro_styling_settings',
        'settings'        => 'education_zone_pro_bg_image',
        'type'            => 'image',
        'default'         => '',
        'active_callback' => array(
            array(
                'setting'  => 'education_zone_pro_body_bg',
                'operator' => '==',
                'value'    => 'image',
            )
        )
    ) );
    
    /** Background Pattern */
    Kirki::add_field( 'education_zone_pro', array(
        'label'           => __( 'Background Pattern', 'education-zone-pro' ),
        'tooltip'         => __( 'Choose from any of 63 awesome background patterns for your site background.', 'education-zone-pro' ),
        'section'         => 'education_zone_pro_styling_settings',
        'settings'        => 'education_zone_pro_bg_pattern',
        'type'            => 'radio-image',
        'default'         => 'nobg',
        'choices'         => education_zone_pro_get_patterns(),
        'active_callback' => array(
            array(
                'setting'  => 'education_zone_pro_body_bg',
                'operator' => '==',
                'value'    => 'pattern',
            )
        )
    ) );
}
add_action( 'init', 'education_zone_pro_customize_register_styling' );