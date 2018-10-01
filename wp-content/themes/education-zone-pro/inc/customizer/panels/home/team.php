<?php
/**
 * Home Page team Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_team( ) {
    
    global $education_zone_pro_options_team;
    
    /** team Section */
    Kirki::add_section( 'education_zone_pro_team_settings', array(
        'title' => __( 'Team Section', 'education-zone-pro' ),
        'priority' => 60,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    /** team Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_team_title',
        'label'       => __( 'Team Section Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_team_settings',
        'default'     => '',
    ) );

    /** team Section Content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_team_content',
        'label'       => __( 'Section Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_team_settings',
        'default'     => '',
    ) );     
    
    /** team Post One */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_team_post_one',
        'description' => __( 'Choose a team member from the drop down below. To create a team member, go to Dashboard >> Teams >> Add New.', 'education-zone-pro' ),
        'label'       => __( 'Select Team', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_team_settings',
        'default'     => '',
        'choices'     => $education_zone_pro_options_team
    ) );
    
    /** team Post Two */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_team_post_two',
        'label'       => __( 'Select Team', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_team_settings',
        'default'     => '',
        'choices'     => $education_zone_pro_options_team
    ) );
    
    /** team Post Three */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_team_post_three',
        'label'       => __( 'Select Team', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_team_settings',
        'default'     => '',
        'choices'     => $education_zone_pro_options_team
    ) );

    /**  View All Team Label */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_team_viewall_label',
        'label'     => __( 'Button Label', 'education-zone-pro' ),
        'description' => __( 'CTA button label to view team listing page', 'education-zone-pro'),
        'section'   => 'education_zone_pro_team_settings',
        'default'   => __( 'View All Team', 'education-zone-pro' ),
    ) );

    /**  View All Team Link  */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_team_viewall_link',
        'label'     => __( 'Button Link', 'education-zone-pro' ),
        'description' => __( 'CTA button link to view team listing page', 'education-zone-pro'),
        'section'   => 'education_zone_pro_team_settings',
        'default'   =>  '',
    ) );
    
    /** team Section Ends */
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_team' );