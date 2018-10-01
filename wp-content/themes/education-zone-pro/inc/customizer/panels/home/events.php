<?php
/**
 * Home Page News & Events Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_events( ) {
    
    global $education_zone_pro_option_categories, $education_zone_pro_options_event, $education_zone_pro_option_event_categories;
     
    Kirki::add_section( 'education_zone_pro_news_events_settings', array(
        'title' => __( 'News & Events Section', 'education-zone-pro' ),
        'priority' => 40,
        'panel' => 'education_zone_pro_home_page_settings',
    ) );
    /** News Section */
    /** News Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_news_section_title',
        'label'       => __( 'News Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_news_events_settings',
        'default'     => '',
    ) );  

     /** news Section content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_news_section_content',
        'label'       => __( 'News Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_news_events_settings',
        'default'     => '',
    ) );  
    
    /** News Category */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_news_post_cat',
        'label'       => __( 'Select Category', 'education-zone-pro' ),
        'description' => __( 'Select a category of the News. 2 recent posts that belongs to be selected category will be displayed on the front page.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_news_events_settings',
        'default'     => '',
        'choices'     => $education_zone_pro_option_categories
    ) );

       /**  Readmore */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_news_readmore',
        'label'     => __( 'News Readmore Text', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_news_events_settings',
        'default'   => __( 'View All News', 'education-zone-pro' ),
    ) );

    /**  Link */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_news_readmore_link',
        'label'     => __( 'News Readmore Link', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_news_events_settings',
        'default'   => '',
    ) );
    
    /** News Section Ends */
    
    /** Events Section Title */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'text',
        'settings'    => 'education_zone_pro_events_section_title',
        'label'       => __( 'Events Title', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_news_events_settings',
        'default'     => '',
    ) );  

    /** Events Section content */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'textarea',
        'settings'    => 'education_zone_pro_events_section_content',
        'label'       => __( 'Events Description', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_news_events_settings',
        'default'     => '',
    ) );  
    
    /** Events category */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_event_categories',
        'label'       => __( 'Select Event Category', 'education-zone-pro' ),
        'description' => __( 'Select a category of the Events. 2 recent events that belongs to be selected category will be displayed on the front page.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_news_events_settings',
        'default'     => '',
        'choices'     => education_zone_pro_get_event_category(),
    ) );
    
 
    /** Events Section Ends */

       /**  Readmore */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_events_readmore',
        'label'     => __( 'Events Readmore Text', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_news_events_settings',
        'default'   => __( 'View All Events', 'education-zone-pro' ),
    ) );

    /**  Link */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_events_readmore_link',
        'label'     => __( 'Events Readmore Link', 'education-zone-pro' ),
        'section'   => 'education_zone_pro_news_events_settings',
        'default'   => '',
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_events' );