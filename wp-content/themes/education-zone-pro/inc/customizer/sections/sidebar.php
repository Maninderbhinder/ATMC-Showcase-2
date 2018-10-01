<?php
/**
 * Sidebar Options
 *
 * @package Education Zone Pro
 */

function education_zone_pro_customize_register_sidebar( ) {

    Kirki::add_section( 'education_zone_pro_sidebar_settings', array(
        'title'       => __( 'Sidebar Settings', 'education-zone-pro' ),
        'priority'    => 34,
        'capability'  => 'edit_theme_options',
        'description' => __( 'Add custom sidebars. You need to save the changes and reload the customizer to use the sidebars in the dropdowns below.
You can add content to the sidebars in Appearance / Widgets.', 'education-zone-pro' ),
    ) );
    
    /** Custom Sidebars */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'repeater',
        'settings'    => 'education_zone_pro_sidebar',
        'label'       => __( 'Add Sidebars', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_sidebar_settings',
        'default'     => '',
        'fields'     => array(
            'name'     => array(
                'type'  => 'text',
                'label' => __( 'Name', 'education-zone-pro' ),
                'description'  => __( 'Example: Homepage Sidebar', 'education-zone-pro' ),
            ),
        ),
        'row_label' => array(
            'type' => 'field',
            'value' => __( 'sidebar', 'education-zone-pro' ),
            'field' => 'name'
        ),
        'sanitize_callback' => 'educaton_zone_pro_sanitize_repeater_setting'        
    ) );
    
    /** Blog Page */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_blog_page_sidebar',
        'label'    => __( 'Blog Page Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the blog page.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true ),
    ) );
    
    /** Single Page */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_single_page_sidebar',
        'label'    => __( 'Single Page Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the single pages. If a page has a custom sidebar set, it will override this.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true ),
    ) );
    
    /** Single Post */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_single_post_sidebar',
        'label'    => __( 'Single Post Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the single posts. If a post has a custom sidebar set, it will override this.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true ),
    ) );

    /** Single Event Post */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_single_event_sidebar',
        'label'    => __( 'Single Event Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the single Event posts. If a event has a custom sidebar set, it will override this.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true ),
    ) );
    
    /** Archive Page */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_archive_page_sidebar',
        'label'    => __( 'Archive Page Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the archives. Specific archive sidebars will override this setting (see below).', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true ),
    ) );
    
    /** Category Archive Page */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_cat_archive_page_sidebar',
        'label'    => __( 'Category Archive Page Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the category archives.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'default-sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true, true ),
    ) );
    
    /** Tag Archive Page */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_tag_archive_page_sidebar',
        'label'    => __( 'Tag Archive Page Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the tag archives.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'default-sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true, true ),
    ) );
    
    /** Date Archive Page */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_date_archive_page_sidebar',
        'label'    => __( 'Date Archive Page Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the date archives.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'default-sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true, true ),
    ) );
    
    /** Author Archive Page */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_author_archive_page_sidebar',
        'label'    => __( 'Author Archive Page Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the author archives.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'default-sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true, true ),
    ) );
    
    /** Search Page */
    Kirki::add_field( 'education_zone_pro', array(
        'type'     => 'select',
        'settings' => 'education_zone_pro_search_page_sidebar',
        'label'    => __( 'Search Page Sidebar', 'education-zone-pro' ),
        'tooltip'  => __( 'Select a sidebar for the search results.', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => education_zone_pro_get_dynamnic_sidebar( true, true ),
    ) );
}
add_action( 'init', 'education_zone_pro_customize_register_sidebar' );