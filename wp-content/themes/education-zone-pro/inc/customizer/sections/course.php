<?php
/**
 * Course Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_course_page( ) {
    
    Kirki::add_section( 'education_zone_pro_course_page_setting', array(
        'title'      => __( 'Course Page Settings', 'education-zone-pro' ),
        'priority'   => 25,
    ) );
   
    /** course Order */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'radio',
        'settings' => 'education_zone_pro_course_order',
        'label'    => __( 'Course Order', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose course order for course page.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_course_page_setting',
        'default'  => 'date',
        'choices'  => array(
            'date'       => __( 'Post Date', 'education-zone-pro' ),
            'menu_order' => __( 'Menu Order', 'education-zone-pro' ),
        )  
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_course_page' );