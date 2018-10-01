<?php
/**
 * Home Page Gallery Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_gallery( ) {
    
    global $education_zone_pro_options_posts;
    
    /** Gallery Section */
    Kirki::add_section( 'education_zone_pro_gallery_settings', array(
        'title' => __( 'Gallery Section', 'education-zone-pro' ),
        'priority' => 90,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    
    /** Gallery Post */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_gallery_post',
        'description' => __( 'To create a gallery, create a post or page. Add a gallery in the text editor by clicking on Add Media. Select the created post or page from the dropdown below.', 'education-zone-pro' ),
        'label'       => __( 'Select Gallery Post/Page', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_gallery_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true )
    ) );

    /** Enable/Disable Gallery as Slider */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'toggle',
        'settings'    => 'education_zone_pro_gallery_as_slider',
        'label'       => __( 'Gallery as slider?', 'education-zone-pro' ),
        'tooltip'     => __( 'Enable to make slider gallery same as in free theme.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_gallery_settings',
        'default'     => '',
    ) );
    
    /** Gallery Section Ends */
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_gallery' );