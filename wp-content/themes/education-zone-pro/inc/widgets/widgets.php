<?php
/**
 * Education Zone Pro functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package education_zone_Pro 
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function education_zone_pro_widgets_init() {
	
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'education-zone-pro' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'education-zone-pro' ),
        ),
        'stat-counter'=> array(
            'name'        => __( 'Stat Counter Widget Section', 'education-zone-pro' ),
            'id'          => 'stat-counter', 
            'description' => __( 'To add a stats counter, click on Add A Widget. Select RARA: Stat Counter Widget. Give a title and add a number. Repeat the process to add more stats counter.', 'education-zone-pro' ),
        ), 
        'newsletter-form'=> array(
            'name'        => __( 'Newsletter Widget Section', 'education-zone-pro' ),
            'id'          => 'newsletter-form', 
            'description' => __( 'You need to install and activate the recommended Newsletter plugin. Then click on Add a Widget and select Newsletter widget. Fill in the details.', 'education-zone-pro' ),
        ), 
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'education-zone-pro' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets.', 'education-zone-pro' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'education-zone-pro' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets.', 'education-zone-pro' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'education-zone-pro' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets.', 'education-zone-pro' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => $sidebar['name'],
    		'id'            => $sidebar['id'],
    		'description'   => $sidebar['description'],
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>',
    	) );
    }
    
    /** Dynamic sidebars */
    $dynamic_sidebars = education_zone_pro_get_dynamnic_sidebar(); 
    
    //if( $dynamic_sidebars ){
        foreach( $dynamic_sidebars as $k => $v ){
            register_sidebar( array(
        		'name'          => esc_html( $v ),
        		'id'            => esc_attr( $k ),
        		'description'   => '',
        		'before_widget' => '<section id="%1$s" class="widget %2$s">',
        		'after_widget'  => '</section>',
        		'before_title'  => '<h2 class="widget-title">',
        		'after_title'   => '</h2>',
        	) );
        }
    //}
    
}
add_action( 'widgets_init', 'education_zone_pro_widgets_init' );

/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/widgets/widget-recent-post.php';

/**
 * Author Post Widget
 */
require get_template_directory() . '/inc/widgets/widget-author-post.php';

/**
 * Category Post Widget
 */
require get_template_directory() . '/inc/widgets/widget-cat-post.php';

/**
 * Facebook Page Widget
 */
require get_template_directory() . '/inc/widgets/widget-facebook-page.php';

/**
 * Featured Post Widget
 */
require get_template_directory() . '/inc/widgets/widget-featured-post.php';

/**
 * Flickr Widget
 */
require get_template_directory() . '/inc/widgets/widget-flickr.php';

/**
 * Instagram Widget
 */
require get_template_directory() . '/inc/widgets/widget-instagram.php';

/**
 * Popular Post Widget
 */
require get_template_directory() . '/inc/widgets/widget-popular-post.php';

/**
 * Social Link Widget
 */
require get_template_directory() . '/inc/widgets/widget-social-links.php';

/**
 * Twitter Widget
 */
require get_template_directory() . '/inc/widgets/widget-twitter-feeds.php';

/**
 * Stat Counter Widget
 */
require get_template_directory() . '/inc/widgets/widget-stat-counter.php';