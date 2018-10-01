<?php
/**
 * Home Page Info Section Options
 *
 * @package education_zone_Pro
 */

function education_zone_pro_customize_register_home_info( ) {
    

    /** Info Section */
    Kirki::add_section( 'education_zone_pro_info_settings', array(
        'title'    => __( 'Info Section', 'education-zone-pro' ),
        'priority' => 20,
        'panel'    => 'education_zone_pro_home_page_settings',
    ) );
    
    /** Select info Type */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_info_type',
        'label'       => __( 'Choose Information Type', 'education-zone-pro' ),
        'description' => __( 'You can make the four sections using page/posts or you can add four custom sections. Choose an options from the dropdown below.', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_info_settings',
        'default'     => 'post',
        'choices'     => array(
            'post'   => __( 'Post/Page', 'education-zone-pro' ),
            'custom' => __( 'Custom', 'education-zone-pro' ),
            )
    ) );
    
    /** Select Post one */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_info_post_one',
        'label'       => __( 'Choose Post/Page One', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_info_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_info_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );

    /** Select Post two */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_info_post_two',
        'label'       => __( 'Choose Post/Page Two', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_info_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_info_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );


    /** Select Post three */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_info_post_three',
        'label'       => __( 'Choose Post/Page Three', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_info_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_info_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );

    /** Select Post four */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_info_post_four',
        'label'       => __( 'Choose Post/Page Four', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_info_settings',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_info_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );

     /** Add Info */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'repeater',
        'settings'    => 'education_zone_pro_info',
        'description' => __( 'Click on Add New Info. Then upload an image, enter title, description and link. Repeat the process to add up-to 4 sections.', 'education-zone-pro' ),
        'label'       => __( 'Add Info', 'education-zone-pro' ),
        'section'     => 'education_zone_pro_info_settings',
        'default'     => '',
        'choices'     => array(     
                        'limit' => '4'
                        ),
        'fields'        => array(
            'thumbnail' => array(
                'type'  => 'image', 
                'label' => __( 'Add Image', 'education-zone-pro' ),                
            ),
            'title'     => array(
                'type'  => 'text',
                'label' => __( 'Title', 'education-zone-pro' ),
            ),
            'content'   => array(
                'type'  => 'textarea',
                'label' => __( 'Content', 'education-zone-pro' ),
            ),
            'link'     => array(
                'type'  => 'text',
                'label' => __( 'Link', 'education-zone-pro' ),
                
            )
        ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_info_type',
                'operator' => '==',
                'value'    => 'custom',
            )            
        ),
        'row_label' => array(
            'type' => 'field', // [default 'text']
            'value' => __( 'Info', 'education-zone-pro' ),
            'field' => 'title',// [only used if type = field, the field-id must exist in fields and be a text field]
        ),
        'sanitize_callback' => 'educaton_zone_pro_sanitize_repeater_setting'  
    ) );

     /** Post Color one */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Background Color First Block', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose background color for info block', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_info_settings',
        'settings' => 'education_zone_pro_post_one_bg_color',
        'type'     => 'color',
        'default'  => '#737495',
       
    ) );

     /** Post Color two */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Background Color Second Block', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose background color for info block', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_info_settings',
        'settings' => 'education_zone_pro_post_two_bg_color',
        'type'     => 'color',
        'default'  => '#68a8ad',
       
    ) );


     /** Post Color three */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Background Color Third Block', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose background color for info block', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_info_settings',
        'settings' => 'education_zone_pro_post_three_bg_color',
        'type'     => 'color',
        'default'  => '#6c8672',
      
    ) );

      /** Post Color four */
    Kirki::add_field( 'education_zone_pro', array(
        'label'    => __( 'Background Color Fourth Block', 'education-zone-pro' ),
        'tooltip'  => __( 'Choose background color for info block', 'education-zone-pro' ),
        'section'  => 'education_zone_pro_info_settings',
        'settings' => 'education_zone_pro_post_four_bg_color',
        'type'     => 'color',
        'default'  => '#f17d80',
        
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_home_info' );