<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education Zone Pro
 */

get_header(); 

    $sections = get_theme_mod( 'education_zone_pro_sort_homepage', array( 'info', 'welcome', 'courses', 'events', 'CTA', 'choose', 'team', 'testimonials', 'blog', 'gallery', 'subscribe' ) );
  
    foreach( $sections as $section ){
     
            get_template_part( 'sections/home/' . esc_attr( $section ) );    
                  
    }

get_footer();