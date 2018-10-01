<?php
/**
 * Post Typography Options 
 *
 * @package Education_zone
 */

function education_zone_pro_customize_register_typography_post( ) {
    
    /** Post Title Settings */
    Kirki::add_section( 'education_zone_pro_post_title_setting', array(
        'title'      => __( 'Post Title Settings', 'education-zone-pro' ),
        'priority'   => 16,
        'capability' => 'edit_theme_options',
        'panel'      => 'education_zone_pro_typography_section'
    ) );
    
    /** Post Title Font */
    Kirki::add_field( 'education_zone_pro', array(
    	'type'        => 'typography',
    	'settings'    => 'education_zone_pro_post_title_font',
    	'label'       => __( 'Post Title Font', 'education-zone-pro' ),
        'tooltip'     => __( 'Setting for Post Title in Blog/Archive Page.', 'education-zone-pro' ),
    	'section'     => 'education_zone_pro_post_title_setting',
    	'default'     => array(
    		'font-family' => 'Lato',
    		'variant'     => '700',
    	),
    ) );
    
    /** Post Title Font Size */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_post_title_font_size',
        'label'    => __( 'Post Title Font Size', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_post_title_setting',
        'default'  => '29',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 15,
                        'max'  => 60,
                        'step' => 1,
                    )
    ) );
    
    /** Post Title Line Height */
    Kirki::add_field( 'education_zone_pro', array(    
        'settings' => 'education_zone_pro_post_title_line_height',
        'label'    => __( 'Post Title Line Height', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_post_title_setting',
        'default'  => '32',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 70,
                        'step' => 1,
                    )
    ) );
    
    
}
add_action( 'init', 'education_zone_pro_customize_register_typography_post' );