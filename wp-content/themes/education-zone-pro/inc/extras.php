<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Education_Zone_pro
 */
if ( ! function_exists( 'education_zone_pro_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function education_zone_pro_posted_on() {
    
    $post_meta = get_theme_mod( 'education_zone_pro_post_meta', array( 'date', 'author', 'comment' ) );
    
    if( $post_meta ){
        echo '<div class="entry-meta">';
    
        foreach( $post_meta as $meta ){
            education_zone_pro_post_meta( $meta );        
        }   
        
        echo '</div>'; // WPCS: XSS OK.
    }
    
}
endif;

if( ! function_exists( 'education_zone_pro_post_meta' ) ) :
/**
 * Post meta function 
*/
function education_zone_pro_post_meta( $meta ){
    
    switch( $meta ){
        case 'date': //Date
        
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );

        $posted_on = sprintf(
            esc_html_x( '%s', 'post date', 'education-zone-pro' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );
        
        echo '<span class="posted-on"><i class="fa fa-calendar-o"></i>' . $posted_on . '</span>';
        
        break;
        
        case 'author': //Author
        
        $byline = sprintf(
            esc_html_x( '%s', 'post author', 'education-zone-pro' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );
        
        echo '<span class="byline"> <i class="fa fa-user"></i>' . $byline . '</span>';
        
        break;
        
        case 'comment': //Comment
        
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link"><i class="fa fa-comment-o"></i>';
            comments_popup_link( esc_html__( 'Leave a comment', 'education-zone-pro' ), esc_html__( '1 Comment', 'education-zone-pro' ), esc_html__( '% Comments', 'education-zone-pro' ) );
            echo '</span>';
        }
        
        break;
    }
}
endif;

if( ! function_exists( 'education_zone_pro_cat_tag' ) ) :
/**
 * Categories and Tags
*/
function education_zone_pro_cat_tag(){
    
    $cat_tag = get_theme_mod( 'education_zone_pro_cat_tag', array( 'cat', 'tag' ) );
    
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() && $cat_tag ) {
        echo '<div class="tags-block">';
            foreach( $cat_tag as $c ){
                education_zone_pro_tax( $c );
            }            
        echo '</div>';      
    }
}
endif;

if( ! function_exists( 'education_zone_pro_tax' ) ) :
/**
 * List Cat and Tags
*/
function education_zone_pro_tax( $tax ){
    switch( $tax ){
        
        case 'cat':
        
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'education-zone-pro' ) );       
        
        if ( $categories_list && education_zone_pro_categorized_blog() ) {
            printf( '<span class="cat-links"><span class="fa fa-folder-open"></span>' . esc_html__( 'Categories: %1$s', 'education-zone-pro' ) . '</span>', $categories_list ); // WPCS: XSS OK.
        }
        
        break;
        
        case 'tag':
        
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'education-zone-pro' ) );
        if ( $tags_list ) {
            printf( '<span class="tags-links"><span class="fa fa-tags"></span>' . esc_html__( 'Tags: %1$s', 'education-zone-pro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
        
        break;
    }    
}
endif;

if( ! function_exists( 'education_zone_pro_get_social_share' ) ):
/**
 * Get list of social sharing icons
 * http://www.sharelinkgenerator.com/
 * 
*/
function education_zone_pro_get_social_share( $share ){
    global $post;
    
    switch( $share ){
        case 'facebook':
        echo '<li><a href="' . esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'twitter':
        echo '<li><a href="' . esc_url( 'https://twitter.com/home?status=' . get_the_title( $post->ID ) ) . '&nbsp;' . get_the_permalink( $post->ID ) . '" rel="nofollow" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'linkedin':
        echo '<li><a href="' . esc_url( 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'pinterest':
        echo '<li><a href="' . esc_url( 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink( $post->ID ) . '&description=' . get_the_title( $post->ID )  ) . '" rel="nofollow" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'email':
        echo '<li><a href="' . esc_url( 'mailto:?Subject=' . get_the_title( $post->ID ) . '&Body=' . get_the_permalink( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'gplus':
        echo '<li><a href="' . esc_url( 'https://plus.google.com/share?url=' . get_the_permalink( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'stumble':
        echo '<li><a href="' . esc_url( 'http://www.stumbleupon.com/submit?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'reddit':
        echo '<li><a href="' . esc_url( 'http://www.reddit.com/submit?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-reddit" aria-hidden="true"></i></a></li>';
        
        break;                
    }
}
endif;

if ( ! function_exists( 'education_zone_pro_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function education_zone_pro_entry_footer() {
    edit_post_link(
        sprintf(
            /* translators: %s: Name of current post */
            esc_html__( 'Edit %s', 'education-zone-pro' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ),
        '<span class="edit-link">',
        '</span>'
    );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function education_zone_pro_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'education_zone_pro_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'education_zone_pro_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so education_zone_pro_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so education_zone_pro_categorized_blog should return false.
        return false;
    }
}

if( ! function_exists( 'education_zone_pro_excerpt' ) ):  
/**
 * education_zone_pro_excerpt can truncate a string up to a number of characters while preserving whole words and HTML tags
 *
 * @param string $text String to truncate.
 * @param integer $length Length of returned string, including ellipsis.
 * @param string $ending Ending to be appended to the trimmed string.
 * @param boolean $exact If false, $text will not be cut mid-word
 * @param boolean $considerHtml If true, HTML tags would be handled correctly
 *
 * @return string Trimmed string.
 * 
 * @link http://alanwhipple.com/2011/05/25/php-truncate-string-preserving-html-tags-words/
 */
function education_zone_pro_excerpt($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
    $text = strip_shortcodes( $text );
    $text = education_zone_pro_strip_single( 'img', $text );
    $text = education_zone_pro_strip_single( 'a', $text );
    $text = education_zone_pro_strip_single( 'b', $text );
    $text = education_zone_pro_strip_single( 'i', $text );
    
    if ($considerHtml) {
        // if the plain text is shorter than the maximum length, return the whole text
        if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        // splits all html-tags to scanable lines
        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
        $total_length = strlen($ending);
        $open_tags = array();
        $truncate = '';
        foreach ($lines as $line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                    // do nothing
                // if tag is a closing tag
                } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                    // delete tag from $open_tags list
                    $pos = array_search($tag_matchings[1], $open_tags);
                    if ($pos !== false) {
                    unset($open_tags[$pos]);
                    }
                // if tag is an opening tag
                } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                    // add tag to the beginning of $open_tags list
                    array_unshift($open_tags, strtolower($tag_matchings[1]));
                }
                // add html-tag to $truncate'd text
                $truncate .= $line_matchings[1];
            }
            // calculate the length of the plain text part of the line; handle entities as one character
            $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length+$content_length> $length) {
                // the number of characters which are left
                $left = $length - $total_length;
                $entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($entities[0] as $entity) {
                        if ($entity[1]+1-$entities_length <= $left) {
                            $left--;
                            $entities_length += strlen($entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
            }
            // if the maximum length is reached, get off the loop
            if($total_length>= $length) {
                break;
            }
        }
    } else {
        if (strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = substr($text, 0, $length - strlen($ending));
        }
    }
    // if the words shouldn't be cut in the middle...
    if (!$exact) {
        // ...search the last occurance of a space...
        $spacepos = strrpos($truncate, ' ');
        if (isset($spacepos)) {
            // ...and cut the text in this position
            $truncate = substr($truncate, 0, $spacepos);
        }
    }
    // add the defined ending to the text
    $truncate .= $ending;
    if($considerHtml) {
        // close all unclosed html-tags
        foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
    }
    return $truncate;
}
endif; // End function_exists

/**
 * Strip specific tags from string
 * @link http://www.altafweb.com/2011/12/remove-specific-tag-from-php-string.html
*/
function education_zone_pro_strip_single( $tag, $string ){
    $string = preg_replace('/<'.$tag.'[^>]*>/i', '', $string);
    $string = preg_replace('/<\/'.$tag.'>/i', '', $string);
    return $string;
}

/**
 * Function to list Custom Pattern
*/
function education_zone_pro_get_patterns(){
    $patterns = array();
    $patterns['nobg'] = get_template_directory_uri() . '/images/patterns_thumb/' . 'nobg.png';
    for( $i=0; $i<38; $i++ ){
        $patterns['pattern'.$i] = get_template_directory_uri() . '/images/patterns_thumb/' . 'pattern' . $i .'.png';
    }
    for( $j=1; $j<26; $j++ ){
        $patterns['hbg'.$j] = get_template_directory_uri() . '/images/patterns_thumb/' . 'hbg' . $j . '.png';
    }
    return $patterns;
}

/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
 
 function education_zone_pro_theme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
    <?php endif; ?>
    
    <footer class="comment-meta">
    
        <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b>', 'education-zone-pro' ), get_comment_author_link() ); ?>
        </div>
        <?php if ( $comment->comment_approved == '0' ) : ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'education-zone-pro' ); ?></em>
            <br />
        <?php endif; ?>
    
        <div class="comment-metadata commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_date(); ?>">
            <?php
                /* translators: 1: date, 2: time */
                printf( __( '%s', 'education-zone-pro' ), get_comment_date() ); ?></time></a><?php edit_comment_link( __( '(Edit)', 'education-zone-pro' ), '  ', '' );
            ?>
        </div>
    </footer>
    
    <div class="comment-content"><?php comment_text(); ?></div>

    <div class="reply">
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; 
}



/**
 * Function to list dynamic sidebar
*/
function education_zone_pro_get_dynamnic_sidebar( $nosidebar = false, $sidebar = false, $default = false ){
    $sidebar_arr = array();
    $sidebars = get_theme_mod( 'education_zone_pro_sidebar' );
    
    if( $default ) $sidebar_arr['default-sidebar'] = __( 'Default Sidebar', 'education-zone-pro' );
    if( $sidebar ) $sidebar_arr['sidebar'] = __( 'Sidebar', 'education-zone-pro' );
    
    if( $sidebars ){
        foreach( $sidebars as $sidebar ){
            $id = $sidebar['name'] ? sanitize_title( $sidebar['name'] ) : 'rara-sidebar-one';
            $sidebar_arr[$id] = $sidebar['name'];
        }
    }
    
    if( $nosidebar ) $sidebar_arr['no-sidebar'] = __( 'No Sidebar', 'education-zone-pro' );
    
    return $sidebar_arr;
}

if( ! function_exists( 'education_zone_pro_social_icons' ) ) :
/**
 * Function to populate list of social Icons
*/
function education_zone_pro_social_icons(){
    $social_icons = array();
    
    $social_icons['dribbble']      = __( 'Dribbble', 'education-zone-pro' );
    $social_icons['facebook']      = __( 'Facebook', 'education-zone-pro' );
    $social_icons['foursquare']    = __( 'Foursquare', 'education-zone-pro' );
    $social_icons['flickr']        = __( 'Flickr', 'education-zone-pro' );
    $social_icons['google-plus']   = __( 'Google Plus', 'education-zone-pro' );
    $social_icons['instagram']     = __( 'Instagram', 'education-zone-pro' );
    $social_icons['linkedin']      = __( 'LinkedIn', 'education-zone-pro' );
    $social_icons['pinterest']     = __( 'Pinterest', 'education-zone-pro' );
    $social_icons['reddit']        = __( 'Reddit', 'education-zone-pro' );
    $social_icons['skype']         = __( 'Skype', 'education-zone-pro' );
    $social_icons['stumbleupon']   = __( 'StumbleUpon', 'education-zone-pro' );
    $social_icons['tumblr']        = __( 'Tumblr', 'education-zone-pro' );
    $social_icons['twitter']       = __( 'Twitter', 'education-zone-pro' );
    $social_icons['vimeo']         = __( 'Vimeo', 'education-zone-pro' );
    $social_icons['youtube']       = __( 'YouTube', 'education-zone-pro' );
    $social_icons['odnoklassniki'] = __( 'OK', 'education-zone-pro' );
    $social_icons['vk']            = __( 'VK', 'education-zone-pro' );
    $social_icons['xing']          = __( 'Xing', 'education-zone-pro' );
    
    return $social_icons;
}
endif;

if( ! function_exists( 'education_zone_pro_get_social_links' ) ) :
/**
 * Callback for Social Links  
*/
function education_zone_pro_get_social_links( $contact = false ){
     
    $socials = get_theme_mod( 'education_zone_pro_social', array(
            array(
                'icon' => 'facebook',
                'link' => 'https://facebook.com',
            ),
            array(
                'icon' => 'twitter',
                'link' => 'https://twitter.com',
            ),
        ) );
    
    if( $socials ){ ?>
        <ul class="social-networks">
        <?php 
        foreach( $socials as $social ){
            if( $social['link'] ){ 
                $parse_url = wp_parse_url( $social['link'] );
                if( $parse_url && ( $parse_url['host'] === 'plus.google.com' ) )
                $social['link'] = str_replace( '%20', '+', $social['link'] ); ?>
                <li><a href="<?php echo esc_url( $social['link'] ); ?>" <?php if( $social['icon'] != 'skype' ) echo 'target="_blank"'; ?> title="<?php echo esc_attr( $social['icon'] ); ?>"><span class="fa fa-<?php echo esc_attr( $social['icon'] );?>"></span></a></li>
            <?php 
            }             
        } ?>
        </ul>
        <?php
    }
}
endif;
/**
 *  Custom Pagination
*/
function education_zone_pro_pagination(){
    
    $pagination = get_theme_mod( 'education_zone_pro_pagination_type', 'default' );
    
    switch( $pagination ){
        case 'default': // Default Pagination
        
        the_posts_navigation();
        
        break;
        
        case 'numbered': // Numbered Pagination
        
        the_posts_pagination( array(
            'prev_text'          => __( '&lt;', 'education-zone-pro' ),
            'next_text'          => __( '&gt', 'education-zone-pro' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'education-zone-pro' ) . ' </span>',
         ) );
        
        break;
        
        case 'load_more': // Load More Button
        case 'infinite_scroll': // Auto Infinite Scroll
        
        echo '<div class="pagination"></div>';
        
        break;
        
        default:
        
        the_posts_navigation();
        
        break;
    }
       
}

if( ! function_exists( 'education_zone_pro_sidebar' ) ) :
/**
 * Function to retrive page specific sidebar and corresponding body class
 * 
 * @param boolean $sidebar
 * @param boolean $class
 * 
 * @return string dynamic sidebar id / classname
*/
function education_zone_pro_sidebar( $sidebar = false, $class = false ){
    
    global $post;
    $return = false;
    
    if( ( is_front_page() && is_home() ) || is_home() ){
        //blog/home page 
        $blog_sidebar = get_theme_mod( 'education_zone_pro_blog_page_sidebar', 'sidebar' );
        $layout       = get_theme_mod( 'education_zone_pro_layout_style', 'right-sidebar' ); //Default Layout Style for Styling Settings
        
        if( is_active_sidebar( $blog_sidebar ) ){            
            if( $sidebar ) $return = $blog_sidebar; //With Sidebar
            if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; 
            if( $class && $layout == 'left-sidebar' )  $return = 'leftsidebar';
        }else{
            if( $sidebar ) $return = false; //Fullwidth
            if( $class ) $return = 'full-width';
        }        
    }
    
    if( is_archive() ){
        //archive page
        $archive_sidebar = get_theme_mod( 'education_zone_pro_archive_page_sidebar', 'sidebar' );
        $cat_sidebar     = get_theme_mod( 'education_zone_pro_cat_archive_page_sidebar', 'default-sidebar' );
        $tag_sidebar     = get_theme_mod( 'education_zone_pro_tag_archive_page_sidebar', 'default-sidebar' );
        $date_sidebar    = get_theme_mod( 'education_zone_pro_date_archive_page_sidebar', 'default-sidebar' );
        $author_sidebar  = get_theme_mod( 'education_zone_pro_author_archive_page_sidebar', 'default-sidebar' );
        $layout          = get_theme_mod( 'education_zone_pro_layout_style', 'right-sidebar' );
        
        if( is_category() ){
            
            if( $cat_sidebar == 'no-sidebar' || ( $cat_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( $cat_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $cat_sidebar ) ){
                if( $sidebar ) $return = $cat_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
                
        }elseif( is_tag() ){
            
            if( $tag_sidebar == 'no-sidebar' || ( $tag_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( ( $tag_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $tag_sidebar ) ){
                if( $sidebar ) $return = $tag_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';              
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
            
        }elseif( is_author() ){
            
            if( $author_sidebar == 'no-sidebar' || ( $author_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( ( $author_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $author_sidebar ) ){
                if( $sidebar ) $return = $author_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
            
        }elseif( is_date() ){
            
            if( $date_sidebar == 'no-sidebar' || ( $date_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( ( $date_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $date_sidebar ) ){
                if( $sidebar ) $return = $date_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }                         
            
        }else{
            if( $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }                      
        }
        
    }
    
    if( is_singular() ){
        $post_sidebar = get_theme_mod( 'education_zone_pro_single_post_sidebar', 'sidebar' );
        $page_sidebar = get_theme_mod( 'education_zone_pro_single_page_sidebar', 'sidebar' );
        $layout       = get_theme_mod( 'education_zone_pro_layout_style', 'right-sidebar' );
        
        if( get_post_meta( $post->ID, '_education_zone_pro_sidebar', true ) ){
            $single_sidebar = get_post_meta( $post->ID, '_education_zone_pro_sidebar', true );
        }else{
            $single_sidebar = 'default-sidebar';
        }

        if( get_post_meta( $post->ID, '_education_zone_pro_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_education_zone_pro_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        if( is_page() ){
            
            if( is_page_template( 'templates/template-home.php' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }else{
                if( ( $single_sidebar == 'no-sidebar' ) || ( ( $single_sidebar == 'default-sidebar' ) && ( $page_sidebar == 'no-sidebar' ) ) ){
                    if( $sidebar ) $return = false; //Fullwidth
                    if( $class ) $return = 'full-width';
                }elseif( $single_sidebar == 'default-sidebar' && $page_sidebar != 'no-sidebar' && is_active_sidebar( $page_sidebar ) ){
                    if( $sidebar ) $return = $page_sidebar;
                    if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                    if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
                }elseif( is_active_sidebar( $single_sidebar ) ){
                    if( $sidebar ) $return = $single_sidebar;
                    if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                    if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
                }else{
                    if( $sidebar ) $return = false; //Fullwidth
                    if( $class ) $return = 'full-width';
                }
            }
        }elseif( is_single() ){
            
            if( ( $single_sidebar == 'no-sidebar' ) || ( ( $single_sidebar == 'default-sidebar' ) && ( $post_sidebar == 'no-sidebar' ) ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( $single_sidebar == 'default-sidebar' && $post_sidebar != 'no-sidebar' && is_active_sidebar( $post_sidebar ) ){
                if( $sidebar ) $return = $post_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $single_sidebar ) ){
                if( $sidebar ) $return = $single_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
        }
    }

    if( is_singular( 'event' ) ){
        $event_sidebar = get_theme_mod( 'education_zone_pro_single_event_sidebar', 'sidebar' );
        $layout       = get_theme_mod( 'education_zone_pro_layout_style', 'right-sidebar' );
        
        if( get_post_meta( $post->ID, '_education_zone_pro_sidebar', true ) ){
            $single_sidebar = get_post_meta( $post->ID, '_education_zone_pro_sidebar', true );
        }else{
            $single_sidebar = 'default-sidebar';
        }

        if( get_post_meta( $post->ID, '_education_zone_pro_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_education_zone_pro_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
            
        if( ( $single_sidebar == 'no-sidebar' ) || ( ( $single_sidebar == 'default-sidebar' ) && ( $event_sidebar == 'no-sidebar' ) ) ){
            if( $sidebar ) $return = false; //Fullwidth
            if( $class ) $return = 'full-width';
        }elseif( $single_sidebar == 'default-sidebar' && $event_sidebar != 'no-sidebar' && is_active_sidebar( $event_sidebar ) ){
            if( $sidebar ) $return = $event_sidebar;
            if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
            if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
        }elseif( is_active_sidebar( $single_sidebar ) ){
            if( $sidebar ) $return = $single_sidebar;
            if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
            if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
        }else{
            if( $sidebar ) $return = false; //Fullwidth
            if( $class ) $return = 'full-width';
        }        
    }
    
    if( is_search() ){
        $search_sidebar = get_theme_mod( 'education_zone_pro_search_page_sidebar', 'sidebar' );
        $layout         = get_theme_mod( 'education_zone_pro_layout_style', 'right-sidebar' );
        
        if( $search_sidebar != 'no-sidebar' && is_active_sidebar( $search_sidebar ) ){
            if( $sidebar ) $return = $search_sidebar;
            if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
            if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
        }else{
            if( $sidebar ) $return = false; //Fullwidth
            if( $class ) $return = 'full-width';
        }
        
    }
    
    return $return;        
}
endif;

/**
 * Function to get the post view count 
 */
function education_zone_pro_get_views( $post_id ){
    $count_key = '_education_zone_pro_view_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if( $count == '' ){        
        return __( "0 View", 'education-zone-pro' );
    }elseif($count<=1){
        return $count. __(' View', 'education-zone-pro' );
    }else{
        return $count. __(' Views', 'education-zone-pro' );    
    }    
}

/**
 * Function to add the post view count 
 */
function education_zone_pro_set_views( $post_id ) {
    $count_key = '_education_zone_pro_view_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '1' );
    }else{
        $count++;
        update_post_meta( $post_id, $count_key, $count );
    }
}

/**
 * Query Jetpack activation
*/
function is_jetpack_activated( $gallery = false ){
    if( $gallery ){
        return ( class_exists( 'jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) ) ? true : false;
    }else{
        return class_exists( 'jetpack' ) ? true : false;
    }           
} 

/**
* options list for all posts and pages
*/
function education_zone_pro_choose_post_page( $choose_page = false ) {
   
   $choose_page_post = array();
   if( $choose_page == false ){
    $choose_page_post = array( 'post' );
    $label  = __( 'Choose Post', 'education-zone-pro' );;
   }
   else{
    $choose_page_post = array( 'post','page' );
    $label = __( 'Choose Post/Page', 'education-zone-pro' );;
   }
   /* Option list of all post/page */    
    $education_zone_pro_options_post_page = array();
    $education_zone_pro_options_post_page_obj = get_posts( array(
        'posts_per_page'=> -1,
        'post_type'=>$choose_page_post 
        )
    );
    $education_zone_pro_options_post_page[''] = esc_html( $label );
    foreach ( $education_zone_pro_options_post_page_obj as $education_zone_pro_post_page ) {
        $education_zone_pro_options_post_page[$education_zone_pro_post_page->ID] = $education_zone_pro_post_page->post_title;
        
    }
    return $education_zone_pro_options_post_page;

}
/* Option list of all event categories */
function education_zone_pro_get_event_category(){

    $education_zone_pro_option_event_categories = array();
    $education_zone_pro_event_category_lists = get_terms( 'event-category', array(
        'hide_empty' => false ) );
    $education_zone_pro_option_event_categories[''] = __( 'Choose Event Category', 'education-zone-pro' );
    
    if( $education_zone_pro_event_category_lists ):
        foreach( $education_zone_pro_event_category_lists as $education_zone_pro_event_category ){
            $education_zone_pro_option_event_categories[$education_zone_pro_event_category->term_id] = $education_zone_pro_event_category->name;
        }
    endif;
    
    return $education_zone_pro_option_event_categories;
}

if( ! function_exists( 'education_zone_pro_truncate' ) ):  
/**
 * Return Striptags from the content.
 */
function education_zone_pro_truncate( $content, $letter_count ) {
	
    $striped_content = strip_shortcodes( $content );
    $striped_content = strip_tags( $striped_content );
    $excerpt         = mb_substr( $striped_content, 0, $letter_count );
    
    if( $striped_content > $excerpt ){
        $excerpt .= '...';
    }
    
    return $excerpt;

}
endif; // End function_exists

if( ! function_exists( 'education_zone_pro_primary_nav' ) ) :
/**
 * Primary Navigation
*/
function education_zone_pro_primary_nav(){ ?>
    <div id="mobile-header">
        <a id="responsive-menu-button" href="#sidr-main"><i class="fa fa-bars"></i></a>
    </div>    
    <nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    </nav><!-- #site-navigation -->
    <?php    
}
endif;

/**
 * Query Contact Form 7
 */
function education_zone_pro_is_cf7_activated() {
    return class_exists( 'WPCF7' ) ? true : false;
}

/**
 * Query Contact Form 7
 */
function is_newsletter_activated() {
    return class_exists( 'Newsletter' ) ? true : false;
}

/**
 * Query if Rara One Click Demo Import id activate
*/
function is_rocdi_activated(){
    return class_exists( 'RDDI_init' ) ? true : false;
}

if( ! function_exists( 'education_zone_pro_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function education_zone_pro_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;