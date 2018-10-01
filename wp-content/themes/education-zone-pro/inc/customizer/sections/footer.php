<?php
/**
 * Footer Options
 *
 * @package Education Zone Pro
 */

function education_zone_pro_customize_register_footer( ) {

    Kirki::add_section( 'education_zone_pro_footer_settings', array(
        'title' => __( 'Footer Settings', 'education-zone-pro' ),
        'priority' => 122,
        'capability' => 'edit_theme_options',
    ) );
    
    /** Footer Copyright*/
    Kirki::add_field( 'education_zone_pro', array(
        'type'              => 'text',
        'settings'          => 'education_zone_pro_footer_copyright',
        'label'             => __( 'Footer Copyright', 'education-zone-pro' ),
        'tooltip'           => __( 'You can change footer copyright and use your own custom text from here. Add [the-year],[the-site-link] shortcode to display current Year and Site Title.', 'education-zone-pro' ),
        'section'           => 'education_zone_pro_footer_settings',
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    /** Hide Author Link */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_ed_author_link',
        'label'       => __( 'Hide Author Link', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_footer_settings',
        'default'     => '',
    ) );
    
    /** Hide WordPress Link */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_ed_wp_link',
        'label'       => __( 'Hide WordPress Link', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_footer_settings',
        'default'     => '',
    ) );
}
add_action( 'init', 'education_zone_pro_customize_register_footer' );