<?php
/**
 * Home Page courses Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_courses( ) {
    
    global $education_zone_pro_options_courses;
    
    /** courses Section */
    Kirki::add_section( 'education_zone_pro_courses_settings', array(
        'title' => __( 'Courses Section', 'education-zone-pro' ),
        'priority' => 40,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    /** courses Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_courses_section_title',
        'label'       => __( 'Courses Section Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_courses_settings',
        'default'     => '',
    ) );  

     /** courses Section content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_courses_section_content',
        'label'       => __( 'Section Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_courses_settings',
        'default'     => '',
    ) );  
    
    /** courses Post One */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_courses_post_one',
        'description' => __( 'Select courses from the dropdown. To create a new course, go to Dashboard >> Courses >> Add New.', 'education-zone-pro' ),
        'label'       => __( 'Select Course One', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_courses_settings',
        'default'     => '',
        'choices'     => $education_zone_pro_options_courses
    ) );
    
    /** courses Post Two */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_courses_post_two',
        'label'       => __( 'Select Course Two', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_courses_settings',
        'default'     => '',
        'choices'     => $education_zone_pro_options_courses
    ) );
    
    /** courses Post Three */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_courses_post_three',
        'label'       => __( 'Select Course Three', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_courses_settings',
        'default'     => '',
        'choices'     => $education_zone_pro_options_courses
    ) );
    
    /** courses Post Four */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_courses_post_four',
        'label'       => __( 'Select Course Four', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_courses_settings',
        'default'     => '',
        'choices'     => $education_zone_pro_options_courses
    ) );
    /** courses Section Ends */

       /**  Readmore */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_courses_readmore',
        'label'     => __( 'Readmore Text', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_courses_settings',
        'default'   => __( 'Learn More', 'education-zone-pro' ),
    ) );


    /**  View All Courses Label */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_courses_viewall_label',
        'label'     => __( 'Button Label', 'education-zone-pro' ),
        'description' => __( 'CTA button label to view courses listing page', 'education-zone-pro'),
        'section'   => 'education_zone_pro_courses_settings',
        'default'   => __( 'View All Courses', 'education-zone-pro' ),
    ) );

    /**  View All Courses Link  */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_courses_viewall_link',
        'label'     => __( 'Button Link', 'education-zone-pro' ),
        'description' => __( 'CTA button link to view courses listing page', 'education-zone-pro'),
        'section'   => 'education_zone_pro_courses_settings',
        'default'   =>  '',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_courses' );