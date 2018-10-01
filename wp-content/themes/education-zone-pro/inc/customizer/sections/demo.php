<?php
/**
 * Demo Import Options
 *
 * @package Education_Zone_Pro
 */

function education_zone_pro_customize_register_demo( $wp_customize ) {

    $wp_customize->add_section(
        'demo_data_import_setting',
        array(
            'title'      => __( 'Demo Import', 'education-zone-pro' ),
            'capability' => 'edit_theme_options',
            'priority'   => 6,
        )
    );

    $wp_customize->add_setting(
        'demo_data_import',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    if( is_rocdi_activated() ){
        $descritpion = sprintf( __( 'Demo Import setting is moved to addon plugin, "Rara One Click Demo Import". Please import demo content from %1$shere%2$s.', 'education-zone-pro' ), '<a href="' . admin_url( 'themes.php?page=rara-demo-import' ) . '" target="_blank">', '</a>' );
    }else{
        $descritpion = sprintf( __( 'Demo Import setting is moved to addon plugin, "Rara One Click Demo Import". Please install the plugin via %1$sinstaller%2$s and import demo content.', 'education-zone-pro' ), '<a href="' . admin_url( 'themes.php?page=tgmpa-install-plugins' ) . '" target="_blank">', '</a>' );
    }
  
    $wp_customize->add_control( new Education_Zone_Pro_Theme_Info(
        $wp_customize,
        'demo_data_import',
        array(
            'section' => 'demo_data_import_setting',
            'label'   => __( 'Demo Import', 'education-zone-pro' ),
            'description' => $descritpion
        ))
    );
    
}
add_action( 'customize_register', 'education_zone_pro_customize_register_demo' );