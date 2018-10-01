<?php
/**
 * Education_Zone Template Hooks.
 *
 * @package Education_Zone_Pro 
 */

/**
 * Doctype
 * 
 * @see education_zone_pro_doctype_cb
*/
add_action( 'education_zone_pro_doctype', 'education_zone_pro_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see education_zone_pro_head
*/
add_action( 'education_zone_pro_before_wp_head', 'education_zone_pro_head' );

/**
 * Before Header
 * @see education_zone_pro_fb_page_box - 15
 * @see education_zone_pro_page_start  - 20
*/
add_action( 'education_zone_pro_before_header', 'education_zone_pro_fb_page_box', 15 );
add_action( 'education_zone_pro_before_header', 'education_zone_pro_page_start', 20 );

/**
 * Header
 * 
 * @see education_zone_pro_dynamic_header  - 20
*/
add_action( 'education_zone_pro_header', 'education_zone_pro_dynamic_header', 20 );

/**
 * After Header
 * 
 * @see education_zone_pro_slider - 20 
*/
add_action( 'education_zone_pro_after_header', 'education_zone_pro_slider', 20 );

/**
 * Before Content
 * 
 * @see education_zone_pro_breadcrumb - 15
 * @see education_zone_pro_page_header - 20
*/
add_action( 'education_zone_pro_breadcrumbs', 'education_zone_pro_breadcrumb', 15 );
add_action( 'education_zone_pro_before_content', 'education_zone_pro_page_header', 20 );


/**
 * Content
 * 
 * @see education_zone_pro_content_start
*/
add_action( 'education_zone_pro_content', 'education_zone_pro_content_start' );

/** CONTENT HOOK GOES HERE */
/**
 * Before Page/Post entry content
 * 
 * @see education_zone_pro_page_content_image 
 * @see education_zone_pro_post_content_image 
*/
add_action( 'education_zone_pro_before_page_entry_content', 'education_zone_pro_page_content_image' );
add_action( 'education_zone_pro_before_post_entry_content', 'education_zone_pro_post_content_image' );

/**
 * After post content
 * 
 * @see education_zone_pro_post_author - 10 
 * @see education_zone_pro_tag_share - 15 
 * 
*/
add_action( 'education_zone_pro_after_post_content', 'education_zone_pro_tag_share', 10 );
add_action( 'education_zone_pro_after_post_content', 'education_zone_pro_post_author', 15);

/**
 * education_zone Comment
 * 
 * @see education_zone_pro_get_comment_section 
*/
add_action( 'education_zone_pro_comment', 'education_zone_pro_get_comment_section' );
/**
 * After Content
 * 
 * @see education_zone_pro_content_end 
*/
add_action( 'education_zone_pro_after_content', 'education_zone_pro_content_end' );

/**
 * Footer
 * 
 * @see education_zone_pro_footer_start  - 20
 * @see education_zone_pro_footer_top    - 30
 * @see education_zone_pro_footer_credit - 40
 * @see education_zone_pro_footer_end    - 50
*/
add_action( 'education_zone_pro_footer', 'education_zone_pro_footer_start', 20 );
add_action( 'education_zone_pro_footer', 'education_zone_pro_footer_top', 30 );
add_action( 'education_zone_pro_footer', 'education_zone_pro_footer_credit', 40 );
add_action( 'education_zone_pro_footer', 'education_zone_pro_footer_end', 50 );

/**
 * After Footer
 * 
 * @see education_zone_pro_back_to_top - 15
 * @see education_zone_pro_page_end    - 20
*/
add_action( 'education_zone_pro_after_footer', 'education_zone_pro_back_to_top', 15 );
add_action( 'education_zone_pro_after_footer', 'education_zone_pro_page_end', 20 );