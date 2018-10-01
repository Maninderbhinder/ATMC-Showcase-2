<?php
/**
 * Dynamic Styles
 *
 * @package education_zone_pro
 */

function education_zone_pro_dynamic_css(){
    
    $body_font      = get_theme_mod( 'education_zone_pro_body_font', array('font-family'=>'Lato', 'variant'=>'regular') );    
    $body_fonts     = education_zone_pro_get_fonts( $body_font['font-family'], $body_font['variant'] );
    $body_font_size = get_theme_mod( 'education_zone_pro_body_font_size', '18' );
    $body_line_ht   = get_theme_mod( 'education_zone_pro_body_line_height', '28' );
    $body_color     = get_theme_mod( 'education_zone_pro_body_color', '#5d5d5d' );
    
    $hps_title_font      = get_theme_mod( 'education_zone_pro_hps_title_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $hps_title_fonts     = education_zone_pro_get_fonts( $hps_title_font['font-family'], $hps_title_font['variant'] );
    $hps_title_font_size = get_theme_mod( 'education_zone_pro_hps_title_font_size', '38' );
    $hps_title_line_ht   = get_theme_mod( 'education_zone_pro_hps_title_line_height', '42' );
    
    $page_title_font      = get_theme_mod( 'education_zone_pro_page_title_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $page_title_fonts     = education_zone_pro_get_fonts( $page_title_font['font-family'], $page_title_font['variant'] );
    $page_title_font_size = get_theme_mod( 'education_zone_pro_page_title_font_size', '38' );
    $page_title_line_ht   = get_theme_mod( 'education_zone_pro_page_title_line_height', '42' );
    $page_title_color     = get_theme_mod( 'education_zone_pro_page_title_color', '#474b4e' );
    
    $post_title_font      = get_theme_mod( 'education_zone_pro_post_title_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $post_title_fonts     = education_zone_pro_get_fonts( $post_title_font['font-family'], $post_title_font['variant'] );
    $post_title_font_size = get_theme_mod( 'education_zone_pro_post_title_font_size', '29' );
    $post_title_line_ht   = get_theme_mod( 'education_zone_pro_post_title_line_height', '32' );
    $post_title_color     = get_theme_mod( 'education_zone_pro_post_title_color', '#474b4e' );
    
    $h1_font      = get_theme_mod( 'education_zone_pro_h1_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $h1_fonts     = education_zone_pro_get_fonts( $h1_font['font-family'], $h1_font['variant'] );
    $h1_font_size = get_theme_mod( 'education_zone_pro_h1_font_size', '38' );
    $h1_line_ht   = get_theme_mod( 'education_zone_pro_h1_line_height', '42' );
    $h1_color     = get_theme_mod( 'education_zone_pro_h1_color', '#474b4e' );
    
    $h2_font      = get_theme_mod( 'education_zone_pro_h2_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $h2_fonts     = education_zone_pro_get_fonts( $h2_font['font-family'], $h2_font['variant'] );
    $h2_font_size = get_theme_mod( 'education_zone_pro_h2_font_size', '29' );
    $h2_line_ht   = get_theme_mod( 'education_zone_pro_h2_line_height', '32' );
    $h2_color     = get_theme_mod( 'education_zone_pro_h2_color', '#393939' );
    
    $h3_font      = get_theme_mod( 'education_zone_pro_h3_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $h3_fonts     = education_zone_pro_get_fonts( $h3_font['font-family'], $h3_font['variant'] );
    $h3_font_size = get_theme_mod( 'education_zone_pro_h3_font_size', '23' );
    $h3_line_ht   = get_theme_mod( 'education_zone_pro_h3_line_height', '28' );
    $h3_color     = get_theme_mod( 'education_zone_pro_h3_color', '#393939' );
    
    $h4_font      = get_theme_mod( 'education_zone_pro_h4_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $h4_fonts     = education_zone_pro_get_fonts( $h4_font['font-family'], $h4_font['variant'] );
    $h4_font_size = get_theme_mod( 'education_zone_pro_h4_font_size', '21' );
    $h4_line_ht   = get_theme_mod( 'education_zone_pro_h4_line_height', '25' );
    $h4_color     = get_theme_mod( 'education_zone_pro_h4_color', '#393939' );
    
    $h5_font      = get_theme_mod( 'education_zone_pro_h5_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $h5_fonts     = education_zone_pro_get_fonts( $h5_font['font-family'], $h5_font['variant'] );
    $h5_font_size = get_theme_mod( 'education_zone_pro_h5_font_size', '19' );
    $h5_line_ht   = get_theme_mod( 'education_zone_pro_h5_line_height', '22' );
    $h5_color     = get_theme_mod( 'education_zone_pro_h5_color', '#393939' );
    
    $h6_font      = get_theme_mod( 'education_zone_pro_h6_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $h6_fonts     = education_zone_pro_get_fonts( $h6_font['font-family'], $h6_font['variant'] );
    $h6_font_size = get_theme_mod( 'education_zone_pro_h6_font_size', '17' );
    $h6_line_ht   = get_theme_mod( 'education_zone_pro_h6_line_height', '21' );
    $h6_color     = get_theme_mod( 'education_zone_pro_h6_color', '#393939' );
     
    $color_scheme    = get_theme_mod( 'education_zone_pro_color_scheme', '#3b9ad7' );
    $footer_color    = get_theme_mod( 'education_zone_pro_footer_color_scheme', '#1f1f1f' );
    $bg_color        = get_theme_mod( 'education_zone_pro_bg_color', '#ffffff' );
    $body_bg         = get_theme_mod( 'education_zone_pro_body_bg', 'image' );
    $bg_image        = get_theme_mod( 'education_zone_pro_bg_image' );
    $bg_pattern      = get_theme_mod( 'education_zone_pro_bg_pattern', 'nobg' );
    $ed_auth_comment = get_theme_mod( 'education_zone_pro_ed_auth_comments' );
    $info_box_1_bg   = get_theme_mod( 'education_zone_pro_post_one_bg_color', '#737495' );
    $info_box_2_bg   = get_theme_mod( 'education_zone_pro_post_two_bg_color', '#68a8ad' );
    $info_box_3_bg   = get_theme_mod( 'education_zone_pro_post_three_bg_color', '#6c8672' );
    $info_box_4_bg   = get_theme_mod( 'education_zone_pro_post_four_bg_color', '#f17d80' );
     
    $slider_caption_bg = get_theme_mod( 'education_zone_pro_slider_caption_background', '1' );

    $image = '';
    if( $body_bg == 'image' && $bg_image ){
        $image = $bg_image;    
    }elseif( $body_bg == 'pattern' && $bg_pattern != 'nobg' ){
        $image = get_template_directory_uri() . '/images/patterns/' . $bg_pattern . '.png';
    }

    echo "<style type='text/css' media='all'>"; ?>
    
    body{
    	font-size: <?php echo absint( $body_font_size ); ?>px;
    	line-height: <?php echo absint( $body_line_ht ); ?>px;
    	color: <?php echo education_zone_pro_sanitize_hex_color( $body_color ); ?>;
    	font-family: <?php echo $body_fonts['font']; ?>;
        font-weight: <?php echo esc_attr( $body_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $body_fonts['style'] ); ?>;
        background: url(<?php echo esc_url( $image ); ?>) <?php echo education_zone_pro_sanitize_hex_color( $bg_color ); ?>;
    }  

    body,
    button,
    input,
    select,
    textarea{
        font-family: <?php echo $body_fonts['font']; ?>;
    }
    
    a{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;   
    }


    .site-header .site-branding .site-description{
        font-family: <?php echo $body_fonts['font']; ?>; 
    }

    
    /* home page section title style */
    
    .welcome-note .header-part .section-title,
    .featured-courses .header-part .section-title,
    .theme .header-part .section-title,
    .choose-us .header-part .section-title,
    .student-stories .header-part .section-title,
    .latest-events .header-part .section-title,
    .news-category .section-title,
    .team-section .header-part .section-title,
    .photo-gallery .header-part .section-title,
    .page-header .page-title {
        font-size: <?php echo absint( $hps_title_font_size ); ?>px;
    	line-height: <?php echo absint( $hps_title_line_ht ); ?>px;
    	font-family: <?php echo $hps_title_fonts['font']; ?>;
        font-weight: <?php echo esc_attr( $hps_title_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $hps_title_fonts['style'] ); ?>;        
    }

    .welcome-note .header-part .section-title,
    .featured-courses .header-part .section-title,
    .choose-us .header-part .section-title,
    .latest-events .header-part .section-title,
    .news-category .section-title,
    .photo-gallery .header-part .section-title,
    .page-header .page-title{
        color: <?php echo education_zone_pro_sanitize_hex_color( $body_color ); ?>;
    }


    .site-header .apply-btn{border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;}

    .site-header .apply-btn:hover,
    .site-header .apply-btn:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    
    #primary .post .entry-title{
        font-size: <?php echo absint( $post_title_font_size ); ?>px;;
        line-height: <?php echo absint( $post_title_line_ht ); ?>px;
        font-family: <?php echo $post_title_fonts['font']; ?>;
        font-weight: <?php echo esc_attr( $post_title_fonts['weight'] ); ?>;
    }
    
    #secondary .widget-title,
    .widget-area .widget-title,
    #secondary .widget.widget_education_zone_pro_stat_counter_widget .col span,
    .site-footer .widget.widget_education_zone_pro_stat_counter_widget .col span{
        font-family: <?php echo $hps_title_fonts['font']; ?>;
    }
  
    /* H1 content */
    .post .entry-content h1,
    .page .entry-content h1{
        font-family: <?php echo $h1_fonts['font']; ?>;
        font-size: <?php echo absint( $h1_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h1_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h1_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h1_line_ht ); ?>px;
        color: <?php echo education_zone_pro_sanitize_hex_color( $h1_color ); ?>;
    }
    
    /* H2 content */
    .post .entry-content h2,
    .page .entry-content h2{
        font-family: <?php echo $h2_fonts['font']; ?>;
        font-size: <?php echo absint( $h2_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h2_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h2_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h2_line_ht ); ?>px;
        color: <?php echo education_zone_pro_sanitize_hex_color( $h2_color ); ?>;
    }
    
    /* H3 content */
    .post .entry-content h3,
    .page .entry-content h3{
        font-family: <?php echo $h3_fonts['font']; ?>;
        font-size: <?php echo absint( $h3_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h3_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h3_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h3_line_ht ); ?>px;
        color: <?php echo education_zone_pro_sanitize_hex_color( $h3_color ); ?>;
    }
    
    /* H4 content */
    .post .entry-content h4,
    .page .entry-content h4{
        font-family: <?php echo $h4_fonts['font']; ?>;
        font-size: <?php echo absint( $h4_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h4_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h4_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h4_line_ht ); ?>px;
        color: <?php echo education_zone_pro_sanitize_hex_color( $h4_color ); ?>;
    }
    
    /* H5 content */
    .post .entry-content h5,
    .page .entry-content h5{
        font-family: <?php echo $h5_fonts['font']; ?>;
        font-size: <?php echo absint( $h5_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h5_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h5_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h5_line_ht ); ?>px;
        color: <?php echo education_zone_pro_sanitize_hex_color( $h5_color ); ?>;
    }
    
    /* H6 content */
    .post .entry-content h6,
    .page .entry-content h6{
        font-family: <?php echo $h6_fonts['font']; ?>;
        font-size: <?php echo absint( $h6_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h6_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h6_fonts['style'] ); ?>;
        line-height: <?php echo absint( $h6_line_ht ); ?>px;
        color: <?php echo education_zone_pro_sanitize_hex_color( $h6_color ); ?>;
    }
    
    .site-header .header-top,
    .site-header .header-top .secondary-nav ul,
    .site-header .header-bottom,
    .main-navigation ul ul{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .banner .banner-text .text .course-link,
    .featured-courses .learn-more,
    .news-category .more-btn,
    .latest-events .learn-more,
    .featured-courses ul li .image-holder .description .learn-more,
    #primary .read-more, .default-btn{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .welcome-note .col h3{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .featured-courses .learn-more:hover,
    .featured-courses .learn-more:focus,
    .news-category .post .entry-header a:hover,
    .news-category .post .entry-header a:focus,
    .news-category .more-btn:hover,
    .news-category .more-btn:focus,
    .choose-us .col h3 a:hover,
    .choose-us .col h3 a:focus,
    .latest-events .post .entry-header a:hover,
    .latest-events .post .entry-header a:focus,
    .latest-events .learn-more:hover,
    .latest-events .learn-more:focus,
    .latest-events .col-2 .post .entry-meta a:hover,
    .latest-events .col-2 .post .entry-meta a:focus,
    .featured-courses ul li .image-holder .description .learn-more:hover,
    .featured-courses ul li .image-holder .description .learn-more:focus,
    #primary .entry-header a:hover,
    #primary .entry-header a:focus,
    #primary .read-more:hover,
    #primary .read-more:focus,
    .default-btn:hover,
    .default-btn:focus{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .navigation.pagination .page-numbers.current,
    .navigation.pagination .page-numbers:hover,
    .navigation.pagination .page-numbers:focus{
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .theme .theme-description .apply:hover,
    .theme .theme-description .apply:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .team-section{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .team-section .learn-more{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .subscription form input[type="submit"]{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?> !important;
    }
    
    .subscription form input[type="submit"]:hover,
    .subscription form input[type="submit"]:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?> !important;
    }
    
    #secondary .widget ul li a:hover,
    #secondary .widget ul li a:focus{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #secondary .widget.widget_education_zone_pro_twitter_feeds_widget ul li a,
    #secondary .widget.widget_rss ul li a{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #secondary .widget.widget.widget_education_zone_pro_social_links li a:hover,
    #secondary .widget.widget.widget_education_zone_pro_social_links li a:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .widget-area .widget.widget_calendar table caption,
    .widget-area .widget.widget_calendar table td a,
    .widget-area .widget.widget_calendar table thead{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .widget-area .widget .search-form input[type="submit"],
    .page-header form input[type="submit"]{
        background-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .widget-area .widget.widget_tag_cloud a:hover,
    .widget-area .widget.widget_tag_cloud a:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .widget.widget_newsletterwidget form input[type="submit"]{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #primary .post .entry-content .rara_accordian,
    #primary .page .entry-content .rara_accordian{
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #primary .post .entry-content .rara_accordian .rara_accordian_title,
    #primary .page .entry-content .rara_accordian .rara_accordian_title,
    #primary .entry-content .rara_call_to_action_button,
    #primary .entry-content .rara_tab_wrap .rara_tab_group .tab-title.active,
    #primary .entry-content .rara_tab_wrap .rara_tab_group .tab-title:hover,
    #primary .entry-content .rara_tab_wrap .rara_tab_group .tab-title:focus,
    #primary .entry-content .social-shortcode a:hover,
    #primary .entry-content .social-shortcode a:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #primary .entry-content .rara_tab_wrap .rara_tab_group .tab-title,
    #primary .entry-content .social-shortcode a{
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #primary .entry-content .social-shortcode a{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .rara_toggle{
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .rara_toggle .rara_toggle_title{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .template-courses .cat-posts .cat-nav li a:hover,
    .template-courses .cat-posts .cat-nav li a:focus,
    .template-courses .cat-posts .cat-nav li.is-active a{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #primary .post .entry-content .highlight,
    #primary .page .entry-content .highlight{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #primary .post .entry-content table th,
    #primary .page .entry-content table th{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .tags .fa, .cat-links .fa,
    .tags-links .fa{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .tags a:hover,
    .tags-links a:hover,
    .cat-links a:hover,
    .tags a:focus,
    .tags-links a:focus,
    .cat-links a:focus{
        text-decoration: none;
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .comment-form form input[type="submit"]{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .comment-form form input[type="submit"]:hover,
    .comment-form form input[type="submit"]:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        opacity: 0.8; 
    }
    
    .event-details .event-info .text .fa{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .site-footer{
        background: <?php echo education_zone_pro_sanitize_hex_color( $footer_color ); ?>;
    }
    
    .thumb-text li .box-1{
        background: <?php echo education_zone_pro_sanitize_hex_color( $info_box_1_bg ); ?>;
    }
    
    .thumb-text li .box-2{
        background: <?php echo education_zone_pro_sanitize_hex_color( $info_box_2_bg ); ?>;
    }
    
    .thumb-text li .box-3{
        background: <?php echo education_zone_pro_sanitize_hex_color( $info_box_3_bg ); ?>;
    }
    
    .thumb-text li .box-4{
        background: <?php echo education_zone_pro_sanitize_hex_color( $info_box_4_bg ); ?>;
    }
    
    #primary .post .entry-content form input[type="submit"]:hover,
    #primary .page .entry-content form input[type="submit"]:hover,
    #primary .post .entry-content form input[type="submit"]:focus,
    #primary .page .entry-content form input[type="submit"]:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        opacity: 0.8;
    }

    .site-header.header-two .info-box .fa{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .site-header.header-three .main-navigation ul li a:hover,
    .site-header.header-three .main-navigation ul li.current-menu-item a,
    .site-header.header-three .main-navigation ul li a:focus,
    .site-header.header-three .main-navigation ul li:hover > a,
    .site-header.header-four .main-navigation ul li a:hover,
    .site-header.header-four .main-navigation ul li.current-menu-item a,
    .site-header.header-four .main-navigation ul li:hover > a{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .site-header .more-info span a:hover{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        text-decoration: none;
    }

    .site-header.header-five .main-navigation ul li a:hover,
    .site-header.header-five .main-navigation ul li a:focus,
    .site-header.header-five .main-navigation ul li.current-menu-item a,
    .site-header.header-five .main-navigation ul li:hover > a{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .site-header.header-five .header-top{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .site-header.header-six .header-top{
        border-bottom-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .student-stories .btn-holder .learn-more:hover,
    .student-stories .btn-holder .learn-more:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .site-header.header-two .form-section .example form,
    .site-header.header-five .form-section .example,
    .site-header.header-five .form-section .example form{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .site-header.header-two .info-box span a:hover,
    .site-header.header-two .info-box span a:focus{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .template-contact form input[type="submit"]{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        border: 2px solid <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;;
    }

    .template-contact form input[type="submit"]:hover,
    .template-contact form input[type="submit"]:focus{
        background: none;
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;;
    }

    .banner .banner-text .btn-holder .btn-free-inquiry,
    .banner .banner-text .text .course-link{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;;
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;;
    }

    .banner .banner-text .btn-holder .btn-view-service:hover,
    .banner .banner-text .btn-holder .btn-view-service:focus{
        color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;;
    }
    
    <?php if( $slider_caption_bg ){ ?>
            /* Slider caption background style */
            .banner .banner-text .text{
                background: rgba(0, 0, 0, 0.5);
            }
            @media only screen and (max-width:767px){
                .banner .banner-text .text{
                    background: #000;
                    padding-left:0;
                    padding-right:0;
                }
                .banner .banner-text{
                    background: #000;
                }
            }
    <?php } ?>

    <?php if( $ed_auth_comment ){ ?>
        /* Author Comment Style */
        .comment-list .bypostauthor .comment-body{
            background: #f4f4f4;
            border-radius: 3px;
            padding: 10px;
        }
    <?php } ?>

    <?php if( is_woocommerce_activated() ) { ?>
    /* Woo Commerce Style */
    .woocommerce span.onsale{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .woocommerce #respond input#submit,
    .woocommerce a.button,
    .woocommerce button.button,
    .woocommerce input.button,
    .woocommerce a.added_to_cart{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .woocommerce a.button:hover,
    .woocommerce a.button:focus,
    .woocommerce #respond input#submit:hover,
    .woocommerce #respond input#submit:focus,
    .woocommerce button.button:hover,
    .woocommerce button.button:focus,
    .woocommerce input.button:hover,
    .woocommerce input.button:focus,
    .woocommerce a.added_to_cart:hover,
    .woocommerce a.added_to_cart:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }

    .woocommerce #respond input#submit.alt:hover,
    .woocommerce a.button.alt:hover,
    .woocommerce button.button.alt:hover,
    .woocommerce input.button.alt:hover,
    .woocommerce #respond input#submit.alt:focus,
    .woocommerce a.button.alt:focus,
    .woocommerce button.button.alt:focus,
    .woocommerce input.button.alt:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    .woocommerce nav.woocommerce-pagination ul li a:focus,
    .woocommerce nav.woocommerce-pagination ul li a:hover,
    .woocommerce nav.woocommerce-pagination ul li span.current{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        border-color: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #primary .post .entry-content form input[type="submit"],
    #primary .page .entry-content form input[type="submit"]{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
    }
    
    #primary .post .entry-content form input[type="submit"]:hover,
    #primary .page .entry-content form input[type="submit"]:hover,
    #primary .post .entry-content form input[type="submit"]:focus,
    #primary .page .entry-content form input[type="submit"]:focus{
        background: <?php echo education_zone_pro_sanitize_hex_color( $color_scheme ); ?>;
        opacity: 0.8;
    }

    
    <?php } ?>

    
    <?php echo "</style>";  
}

/**
 * Function for sanitizing Hex color 
 */
function education_zone_pro_sanitize_hex_color( $color ){
	if ( '' === $color )
		return '';

    // 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
}
