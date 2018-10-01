<?php
/**
 * Home Page testimonial Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_testimonial( ) {
    
    
    /** Testimonial Section */
    Kirki::add_section( 'education_zone_pro_testimonial_settings', array(
        'title' => __( 'Testimonials Section', 'education-zone-pro' ),
        'priority' => 70,
        'description' => __( 'You need to create a page with Testimonials Page template assigned to it. Then go to Dashboard >> Testimonials >> Add New and add testimonials. The testimonials will be displayed on the front page. Enter the following content to display them on the front page.', 'education-zone-pro' ),
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    /** Testimonial Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_testimonial_section_title',
        'label'       => __( 'Testimonial Section Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_testimonial_settings',
        'default'     => '',
    ) );

    /** Testimonial Section content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_testimonial_section_content',
        'label'       => __( 'Testimonial Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_testimonial_settings',
        'default'     => '',
    ) ); 
    /* Number of testimonial to display */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_testimonial_number',
        'label'    => __( 'Testimonial Number', 'education-zone-pro' ),
        'description' => __( 'Selected number of testimonials will display in the slider section.', 'education-zone-pro'),
        'section'  => 'education_zone_pro_testimonial_settings',
        'default'  => '3',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 1,
                        'max'  => 10,
                        'step' => 1,
                    )
    ) );  

    /* Slider Speed */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings'    => 'education_zone_pro_testimonial_speed',
        'label'       => __( 'Slider Speed', 'education-zone-pro' ),
        'description' => __( 'Control testimonial slider speed ( In Milliseconds ).', 'education-zone-pro'),
        'section'     => 'education_zone_pro_testimonial_settings',
        'default'     => 1000,
        'type'        => 'slider',
        'choices'     => array(
            'min'         => 500,
            'max'         => 2500,
            'step'        => 500,
        )
    ) );  

    /** Enable/Disable Slider Auto Transition */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_testimonial_slider_auto',
        'label'       => __( 'Enable Slider Auto Transition', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_testimonial_settings',
        'default'     => '1',
    ) ); 
    
    /** Background Image */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'image',
        'settings'    => 'education_zone_pro_testimonial_background_image',
        'label'       => __( 'Background Image', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_testimonial_settings',
        'default'     => ''

     ) );

    /**  View All Testimonial Label */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_testimonial_viewall_label',
        'label'     => __( 'Button Label', 'education-zone-pro' ),
        'description' => __( 'CTA button label to view testimonial listing page', 'education-zone-pro'),
        'section'   => 'education_zone_pro_testimonial_settings',
        'default'   => __( 'View All Testimonial', 'education-zone-pro' ),
    ) );

    /**  View All Testimonial Link  */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_testimonial_viewall_link',
        'label'     => __( 'Button Link', 'education-zone-pro' ),
        'description' => __( 'CTA button link to view testimonial listing page', 'education-zone-pro'),
        'section'   => 'education_zone_pro_testimonial_settings',
        'default'   =>  '',
    ) );
    
    /** testimonial Section Ends */   
}
add_action( 'init', 'education_zone_pro_customize_register_home_testimonial' );