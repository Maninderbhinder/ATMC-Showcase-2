<?php
/**
 * Post Meta Options
 *
 * @package Education Zone Pro 
 */

function education_zone_pro_customize_register_postmeta( ) {

    Kirki::add_section( 'education_zone_pro_post_meta_settings', array(
        'title' => __( 'Post Meta Settings', 'education-zone-pro' ),
        'priority' => 29,
        'capability' => 'edit_theme_options',
    ));
    
    /** No. of Character */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'No. of Character of Post Excerpt', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_post_meta_settings',
        'settings'  => 'education_zone_pro_post_no_of_char',
        'type'      => 'slider',
        'default'   => 200,
        'priority'  => 30,
        'choices'   => array(
            'min'   => 50,
            'max'   => 500,
            'step'  => 10
        ),
    ) );
    
    /** Read More Text */
    Kirki::add_field( 'education_zone_pro', array(
        'label'     => __( 'Post Read More Text', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_post_meta_settings',
        'settings'  => 'education_zone_pro_post_read_more',
        'type'      => 'text',
        'priority'  => 40,
        'default'   => __( 'Read More', 'education-zone-pro' ),
    ) );
}
add_action( 'init', 'education_zone_pro_customize_register_postmeta' );

function education_zone_pro_customize_register_custom_control_postmeta( $wp_customize ) {

    /** Post Meta */
    $wp_customize->add_setting(
        'education_zone_pro_post_meta',
        array(
            'default'           => array( 'date', 'author', 'comment' ),
            'sanitize_callback' => 'education_zone_pro_sanitize_select'
        )
    );
    
    $wp_customize->add_control(
        new Rara_Controls_Select_Control(
            $wp_customize,
            'education_zone_pro_post_meta',
            array(
                'label'       => __( 'Post Meta', 'education-zone-pro' ),
                'description' => __( 'You can rearrange the order you want.', 'education-zone-pro' ),
                'section'     => 'education_zone_pro_post_meta_settings',
                'priority'    => 10,
                'multiple'    => 3,
                'choices'  => array(
                    'date'    => __( 'Date', 'education-zone-pro' ),
                    'author'  => __( 'Author', 'education-zone-pro' ),
                    'comment' => __( 'Comment', 'education-zone-pro' ),
                ),  
            )
        )
    );

    /** Categories and Tags */
    $wp_customize->add_setting(
        'education_zone_pro_cat_tag',
        array(
            'default'           => array( 'cat', 'tag' ),
            'sanitize_callback' => 'education_zone_pro_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Rara_Controls_Select_Control(
            $wp_customize,
            'education_zone_pro_cat_tag',
            array(
                'label'       => __( 'Categories and Tags', 'education-zone-pro' ),
                'description' => __( 'You can rearrange the order you want.', 'education-zone-pro' ),
                'section'     => 'education_zone_pro_post_meta_settings',
                'priority'    => 20,
                'multiple'    => 2,
                'choices'   => array(
                    'cat'   => __( 'Categories', 'education-zone-pro' ),
                    'tag'   => __( 'Tags', 'education-zone-pro' ),
                ),                  
            )
        )
    );
}
add_action( 'customize_register', 'education_zone_pro_customize_register_custom_control_postmeta' );