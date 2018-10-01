<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Zone_Pro
 */

    /**
     * Doctype Hook
     * 
     * @hooked education_zone_pro_doctype_cb
    */
    do_action( 'education_zone_pro_doctype' );
?>
<head itemscope itemtype="http://schema.org/WebSite">
<?php 
    
    /**
     * Before wp_head
     * 
     * @hooked education_zone_pro_head
    */
    do_action( 'education_zone_pro_before_wp_head' );
    
    wp_head(); 
?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php    
    /**
     * Before Header
     * 
     * @hooked education_zone_pro_page_start  - 20
    */
    do_action( 'education_zone_pro_before_header' );
    
    /**
     * education_zone_pro Header
     * 
     * @hooked education_zone_pro_dynamic_header  - 20
    */
    do_action( 'education_zone_pro_header' );
    
    /**
     * After Header
     * 
     * @hooked education_zone_pro_slider - 20 
    */
    do_action( 'education_zone_pro_after_header' );
    
    /**
     * Before Content
     * 
     * @hooked education_zone_pro_breadcrumb - 20
    */
    do_action( 'education_zone_pro_before_content' );
    
    /**
     * education_zone_pro Content
     * 
     * @hooked education_zone_pro_content_start
    */
    do_action( 'education_zone_pro_content' );