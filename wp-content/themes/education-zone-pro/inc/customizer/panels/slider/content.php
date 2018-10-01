<?php
/**
 * Slider Content Section Options
 *
 * @package education_zone_pro
 */

function education_zone_pro_customize_register_slider_content() {
    
    global $education_zone_pro_option_categories;
    
    /** Slider Contents */
    Kirki::add_section( 'header_image', array(
        'title' => __( 'Slider / Banner Contents', 'education-zone-pro' ),
        'priority' => 30,
        'panel' => 'education_zone_pro_slider_settings',
    ) );
    
    /** Select Slider Type */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_slider_type',
        'description'=> __( 'You can make slider using Page/Post, category of posts or custom. Select static banner to use custom header in your site. Choose one options from the dropdown below.', 'education-zone-pro' ),
        'label'       => __( 'Choose Slider / Banner Type', 'education-zone-pro' ),
        'section'     => 'header_image',
        'default'     => 'post',
        'choices'     => array(
                'post' => __( 'Post/Page', 'education-zone-pro' ),
                'cat' => __( 'Category', 'education-zone-pro' ),
                'custom' => __( 'Custom', 'education-zone-pro' ),
                'static_banner' => __( 'Static Banner', 'education-zone-pro' ),
        ),
        'priority' => 5,
    ) );
    
    /** Select Post One */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_slider_post_one',
        'label'       => __( 'Choose Post/Page One', 'education-zone-pro' ),
        'section'     => 'header_image',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );
    
    /** Select Post Two */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_slider_post_two',
        'label'       => __( 'Choose Post/Page Two', 'education-zone-pro' ),
        'section'     => 'header_image',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );
    /** Select Post Three */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_slider_post_three',
        'label'       => __( 'Choose Post/Page Three', 'education-zone-pro' ),
        'section'     => 'header_image',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );
    
    /** Select Post Four */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_slider_post_four',
        'label'       => __( 'Choose Post/Page Four', 'education-zone-pro' ),
        'section'     => 'header_image',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );
    
    /** Select Post Five */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_slider_post_five',
        'label'       => __( 'Choose Post/Page Five', 'education-zone-pro' ),
        'section'     => 'header_image',
        'default'     => '',
        'choices'     => education_zone_pro_choose_post_page( true ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )            
        )
    ) );
    
    /** Select Category */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'select',
        'settings'    => 'education_zone_pro_slider_cat',
        'label'       => __( 'Choose Slider Category', 'education-zone-pro' ),
        'description' => __( 'You can choose a category of posts to display the post that belongs to that category.', 'education-zone-pro' ),
        'section'     => 'header_image',
        'default'     => '',
        'choices'     => $education_zone_pro_option_categories,
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_slider_type',
                'operator' => '==',
                'value'    => 'cat',
            )            
        )
    ) );
    
    /** Add Slides */
    Kirki::add_field( 'education_zone_pro', array(
        'type'        => 'repeater',
        'settings'    => 'education_zone_pro_slider_slides',
        'label'       => __( 'Add Sliders', 'education-zone-pro' ),
        'description' => __( 'Click Add New Slides. Then upload image, enter title, description and link for each slides.', 'education-zone-pro' ),
        'section'     => 'header_image',
        'default'     => '',
        'fields'     => array(
            'thumbnail' => array(
                'type'  => 'image', 
                'label' => __( 'Add Image', 'education-zone-pro' ),                
            ),
            'title'     => array(
                'type'  => 'text',
                'label' => __( 'Title', 'education-zone-pro' ),
            ),
            'link'     => array(
                'type'  => 'text',
                'label' => __( 'Link', 'education-zone-pro' ),
                
            )
        ),
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_slider_type',
                'operator' => '==',
                'value'    => 'custom',
            )            
        ),
        'row_label' => array(
            'type' => 'field', // [default 'text']
            'value' => __( 'slides', 'education-zone-pro' ),
            'field' => 'title',// [only used if type = field, the field-id must exist in fields and be a text field]
        ),
        'sanitize_callback' => 'educaton_zone_pro_sanitize_repeater_setting'  
    ) );
    
    /** Slider Readmore */
    Kirki::add_field( 'education_zone_pro', array(
        'type'      => 'text',
        'settings'  => 'education_zone_pro_slider_readmore',
        'label'     => __( 'Readmore Text', 'education-zone-pro' ),
        'section'   => 'header_image',
        'default'   => __( 'Learn More', 'education-zone-pro' ),
        'transport' => 'postMessage',
        'required'  => array(
            array(
                'setting'  => 'education_zone_pro_slider_type',
                'operator' => '!=',
                'value'    => 'static_banner',
            )      
        )
    ) );
    
}
add_action( 'init', 'education_zone_pro_customize_register_slider_content' );

function education_zone_pro_slider_static_banner_content( $wp_customize ){
    $wp_customize->get_section( 'header_image' )->panel    = 'education_zone_pro_slider_settings';
    $wp_customize->get_section( 'header_image' )->title    = __( 'Slider / Banner Contents', 'education-zone-pro' );
    $wp_customize->get_section( 'header_image' )->priority = 10;
    $wp_customize->get_control( 'header_image' )->active_callback = 'education_zone_pro_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback = 'education_zone_pro_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'education_zone_pro_banner_ac';
    $wp_customize->get_section( 'header_image' )->description = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport = 'refresh';

    /** Banner title */
    $wp_customize->add_setting(
        'education_zone_pro_banner_title',
        array(
            'default'           => __( 'Better Education for a Better World', 'education-zone-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'education_zone_pro_banner_title',
        array(
            'section'         => 'header_image',
            'label'           => __( 'Banner Title', 'education-zone-pro' ),
            'active_callback' => 'education_zone_pro_banner_ac'
        )
    );

    // banner title selective refresh
    $wp_customize->selective_refresh->add_partial( 'education_zone_pro_banner_title', array(
        'selector'            => '.banner .banner-text h2.title',
        'render_callback'     => 'education_zone_pro_banner_title_selective_refresh',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
    ) );

    /** Banner description */
    $wp_customize->add_setting(
        'education_zone_pro_banner_description',
        array(
            'default'           => __( 'Maecenas perspiciatis eleifend mollitia esse etiam rem harum? Sunt incididunt, sollicitudin earum anim quidem laoreet nibh, facilisis eiusmod!', 'education-zone-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'education_zone_pro_banner_description',
        array(
            'section'         => 'header_image',
            'label'           => __( 'Banner Description', 'education-zone-pro' ),
            'active_callback' => 'education_zone_pro_banner_ac'
        )
    );

    // Banner description selective refresh
    $wp_customize->selective_refresh->add_partial( 'education_zone_pro_banner_description', array(
        'selector'            => '.banner .banner-text p.wow',
        'render_callback'     => 'education_zone_pro_banner_description_selective_refresh',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
    ) );

    /** Banner link one label */
    $wp_customize->add_setting(
        'education_zone_pro_banner_link_one_label',
        array(
            'default'           => __( 'Get Started Now', 'education-zone-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'education_zone_pro_banner_link_one_label',
        array(
            'section'         => 'header_image',
            'label'           => __( 'Link One Label', 'education-zone-pro' ),
            'active_callback' => 'education_zone_pro_banner_ac'
        )
    );

    // Selective refresh for banner link one label
    $wp_customize->selective_refresh->add_partial( 'education_zone_pro_banner_link_one_label', array(
        'selector'            => '.banner .banner-text .btn-holder a.btn-free-inquiry',
        'render_callback'     => 'education_zone_pro_banner_link_one_label_selective_refresh',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
    ) );

    /** Banner link one url */
    $wp_customize->add_setting(
        'education_zone_pro_banner_link_one_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'education_zone_pro_banner_link_one_url',
        array(
            'section'         => 'header_image',
            'label'           => __( 'Link One Url', 'education-zone-pro' ),
            'type'            => 'url',
            'active_callback' => 'education_zone_pro_banner_ac'
        )
    );

    /** Banner link two label */
    $wp_customize->add_setting(
        'education_zone_pro_banner_link_two_label',
        array(
            'default'           => __( 'Enquiry', 'education-zone-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'education_zone_pro_banner_link_two_label',
        array(
            'section'         => 'header_image',
            'label'           => __( 'Link Two Label', 'education-zone-pro' ),
            'active_callback' => 'education_zone_pro_banner_ac'
        )
    );

    // Selective refresh for banner link two label.
    $wp_customize->selective_refresh->add_partial( 'education_zone_pro_banner_link_two_label', array(
        'selector'            => '.banner .btn-holder a.btn-view-service',
        'render_callback'     => 'education_zone_pro_banner_link_two_label_selective_refresh',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
    ) );

    /** Banner link two url */
    $wp_customize->add_setting(
        'education_zone_pro_banner_link_two_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'education_zone_pro_banner_link_two_url',
        array(
            'section'         => 'header_image',
            'label'           => __( 'Link Two Url', 'education-zone-pro' ),
            'type'            => 'url',
            'active_callback' => 'education_zone_pro_banner_ac'
        )
    );

    // Banner description selective refresh
    $wp_customize->selective_refresh->add_partial( 'education_zone_pro_slider_readmore', array(
        'selector'            => '.banner .banner-text a.course-link',
        'render_callback'     => 'education_zone_pro_slider_readmore_selective_refresh',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
    ) );   
}
add_action( 'customize_register', 'education_zone_pro_slider_static_banner_content' );

/**
 * Partial refresh functions for banner title
 */
function education_zone_pro_banner_title_selective_refresh(){
    $banner_title =  get_theme_mod( 'education_zone_pro_banner_title', __( 'Better Education for a Better World', 'education-zone-pro' ) );

    if( ! empty( $banner_title ) ){
        return $banner_title;
    }

    return false;
}

/**
 * Partial refresh functions for banner description
 */
function education_zone_pro_banner_description_selective_refresh(){
    $banner_description =  get_theme_mod( 'education_zone_pro_banner_description', __( 'Maecenas perspiciatis eleifend mollitia esse etiam rem harum? Sunt incididunt, sollicitudin earum anim quidem laoreet nibh, facilisis eiusmod!', 'education-zone-pro' ) );

    if( ! empty( $banner_description ) ){
        return $banner_description;
    }

    return false;
}

/**
 * Partial refresh functions for banner link one label
 */
function education_zone_pro_banner_link_one_label_selective_refresh(){
    $link_one_label =  get_theme_mod( 'education_zone_pro_banner_link_one_label', __( 'Get Started Now', 'education-zone-pro' ) );

    if( ! empty( $link_one_label ) ){
        return $link_one_label;
    }

    return false;
}

/**
 * Partial refresh functions for banner link two label
 */
function education_zone_pro_banner_link_two_label_selective_refresh(){
    $link_two_label =  get_theme_mod( 'education_zone_pro_banner_link_two_label', __( 'Enquiry', 'education-zone-pro' ) );

    if( ! empty( $link_two_label ) ){
        return $link_two_label;
    }

    return false;
}

/**
 * Partial refresh functions for banner readmore label
 */
function education_zone_pro_slider_readmore_selective_refresh(){
    $slider_readmore_label =  get_theme_mod( 'education_zone_pro_slider_readmore', __( 'Learn More', 'education-zone-pro' ) );

    if( ! empty( $slider_readmore_label ) ){
        return $slider_readmore_label;
    }

    return false;
}
/**
 * Active Callback
 */
function education_zone_pro_banner_ac( $control ){
    $banner      = $control->manager->get_setting( 'education_zone_pro_slider_type' )->value();
    $control_id  = $control->id;
    
    // static banner controls
    if ( $control_id == 'header_image' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'header_video' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'external_header_video' && $banner == 'static_banner' ) return true;

    // banner title and description controls
    if ( $control_id == 'education_zone_pro_banner_title' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'education_zone_pro_banner_description' && $banner == 'static_banner' ) return true;

    // Link button controls
    if ( $control_id == 'education_zone_pro_banner_link_one_label' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'education_zone_pro_banner_link_one_url' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'education_zone_pro_banner_link_two_label' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'education_zone_pro_banner_link_two_url' && $banner == 'static_banner' ) return true;

    return false;
}
