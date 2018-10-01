<?php
/**
 * Slider Options Section
 *
 * @package education_zone_pro
 */

function education_zone_pro_customize_register_slider_option( ) {
    
    /** Slider Options */
    Kirki::add_section( 'education_zone_pro_slider_options', array(
        'title' => __( 'Slider Options', 'education-zone-pro' ),
        'priority' => 20,
        'panel' => 'education_zone_pro_slider_settings',
    ) );
    
    /** Enable/Disable Slider */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_ed_slider',
        'label'       => __( 'Enable Home Page Slider', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => '',
    ) );
    
    /** Enable/Disable Slider Auto Transition */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_slider_auto',
        'label'       => __( 'Enable Slider Auto Transition', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => '1',
    ) );

    /** Enable/Disable Slider Loop */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_slider_navigation',
        'label'       => __( 'Enable Slider Navigation', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => '1',
    ) );
    
    /** Enable/Disable stop on hover */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_slider_hover',
        'label'       => __( 'Enable Stop on Hover', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => '1',
    ) );
    
    /** Enable/Disable Slider Loop */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_slider_loop',
        'label'       => __( 'Enable Slider Loop', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => '1',
    ) );

    /** Enable/Disable Slider Caption */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_slider_caption',
        'label'       => __( 'Enable Slider Caption', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => '1',
    ) );

      /** Enable/Disable Slider Caption */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_slider_caption_background',
        'label'       => __( 'Enable Slider Caption Background', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => '1',
    ) );
    
    /** Use Full Size Image */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_slider_full_image',
        'label'       => __( 'Use Full Size Image', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => '',
    ) );
    
    /** Slider Animation */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_slider_animation',
        'label'       => __( 'Choose Slider Animation', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_slider_options',
        'default'     => 'slide',
        'choices'     => array(
            'slide'          => __( 'Slide' , 'education-zone-pro' ),
            'fade'           => __( 'Fade', 'education-zone-pro' ),
            'backSlide'      => __( 'Back Slide', 'education-zone-pro' ),
            'goDown'         => __( 'Go Down', 'education-zone-pro' ),
            'fadeUp'         => __( 'Fade Up', 'education-zone-pro' ),
            'bounceOut'      => __( 'Bounce Out', 'education-zone-pro' ),
            'bounceOutLeft'  => __( 'Bounce Out Left', 'education-zone-pro' ),
            'bounceOutRight' => __( 'Bounce Out Right', 'education-zone-pro' ),
            'bounceOutUp'    => __( 'Bounce Out Up', 'education-zone-pro' ),
            'bounceOutDown'  => __( 'Bounce Out Down', 'education-zone-pro' ),
            'fadeOut'        => __( 'Fade Out', 'education-zone-pro' ),
            'fadeOutLeft'    => __( 'Fade Out Left', 'education-zone-pro' ),
            'fadeOutRight'   => __( 'Fade Out Right', 'education-zone-pro' ),
            'fadeOutUp'      => __( 'Fade Out Up', 'education-zone-pro' ),
            'fadeOutDown'    => __( 'Fade Out Down', 'education-zone-pro' ),
            'flipOutX'       => __( 'Flip OutX', 'education-zone-pro' ),
            'flipOutY'       => __( 'Flip OutY', 'education-zone-pro' ),
            'hinge'          => __( 'Hinge', 'education-zone-pro' ),
            'pulse'          => __( 'Pulse', 'education-zone-pro' ),
            'rollOut'        => __( 'Roll Out', 'education-zone-pro' ),
            'rollOutLeft'    => __( 'Roll Out Left', 'education-zone-pro' ),
            'rollOutRight'   => __( 'Roll Out Right', 'education-zone-pro' ),
            'rollOutUp'      => __( 'Roll Out Up', 'education-zone-pro' ),
            'rollOutDown'    => __( 'Roll Out Down', 'education-zone-pro' ),
            'rotateOut'      => __( 'Rotate Out', 'education-zone-pro' ),
            'rotateOutLeft'  => __( 'Rotate Out Left', 'education-zone-pro' ),
            'rotateOutRight' => __( 'Rotate Out Right', 'education-zone-pro' ),
            'rotateOutUp'    => __( 'Rotate Out Up', 'education-zone-pro' ),
            'rotateOutDown'  => __( 'Rotate Out Down', 'education-zone-pro' ),
            'rubberBand'     => __( 'Rubber Band', 'education-zone-pro' ),
            'shake'          => __( 'Shake', 'education-zone-pro' ),
            'slideOutLeft'   => __( 'Slide Out Left', 'education-zone-pro' ),
            'slideOutRight'  => __( 'Slide Out Right', 'education-zone-pro' ),
            'slideOutUp'     => __( 'Slide Out Up', 'education-zone-pro' ),
            'slideOutDown'   => __( 'Slide Out Down', 'education-zone-pro' ),
            'swing'          => __( 'Swing', 'education-zone-pro' ),
            'tada'           => __( 'Tada', 'education-zone-pro' ),
            'zoomOut'        => __( 'Zoom Out', 'education-zone-pro' ),
            'zoomOutLeft'    => __( 'Zoom Out Left', 'education-zone-pro' ),
            'zoomOutRight'   => __( 'Zoom Out Right', 'education-zone-pro' ),
            'zoomOutUp'      => __( 'Zoom Out Up', 'education-zone-pro' ),
            'zoomOutDown'    => __( 'Zoom Out Down', 'education-zone-pro' ),
        ),
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_slider_option' );