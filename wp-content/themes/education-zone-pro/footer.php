<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Zone_Pro
 */
    
    /**
     * After Content
     * 
     * @hooked education_zone_pro_content_end - 20
    */
    do_action( 'education_zone_pro_after_content' );
    
    /**
     * Footer
     * 
     * @hooked education_zone_pro_footer_start  - 20
     * @hooked education_zone_pro_footer_top    - 30
     * @hooked education_zone_pro_footer_bottom - 40
     * @hooked education_zone_pro_footer_end    - 50
    */
    do_action( 'education_zone_pro_footer' );
    
    /**
     * After Footer
     * 
     * @hooked education_zone_pro_back_to_top - 15
     * @hooked education_zone_pro_page_end    - 20
    */
    do_action( 'education_zone_pro_after_footer' );
    
    wp_footer(); 
    
?>

</body>
</html>