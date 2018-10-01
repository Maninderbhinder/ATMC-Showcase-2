<?php
/**
 * Home Page Blog Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_blog( ) {
    
    /** Blog Section */
    Kirki::add_section( 'education_zone_pro_blog_settings', array(
        'title' => __( 'Blog Section', 'education-zone-pro' ),
        'priority' => 80,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    
    /** Show/Hide Blog Date */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'toggle',
        'settings' => 'education_zone_pro_ed_blog_date',
        'label'    => __( 'Show Blog Date', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_blog_settings',
        'default'  => '1',
    ) );
    
    /** Blog Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_blog_section_title',
        'label'       => __( 'Blog Section Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_blog_settings',
        'default'     => '',
    ) );
    
    /** Blog Section Content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_blog_section_content',
        'label'       => __( 'Blog Section Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_blog_settings',
        'default'     => '',
    ) );
    
    /** Blog Section Read More Text */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_blog_section_readmore',
        'label'       => __( 'Blog Section Read More Text', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_blog_settings',
        'default'     => __( 'Read More', 'education-zone-pro' ),
    ) );  

    /**  View All blog Label */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_blog_viewall_label',
        'label'     => __( 'Button Label', 'education-zone-pro' ),
        'description' => __( 'CTA button label to view blog listing page', 'education-zone-pro'),
        'section'   => 'education_zone_pro_blog_settings',
        'default'   => __( 'View All Blog', 'education-zone-pro' ),
    ) );

    /**  View All blog Link  */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_blog_viewall_link',
        'label'     => __( 'Button Link', 'education-zone-pro' ),
        'description' => __( 'CTA button link to view blog listing page', 'education-zone-pro'),
        'section'   => 'education_zone_pro_blog_settings',
        'default'   =>  '',
    ) );
      
    /** Blog Section Ends */
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_blog' );