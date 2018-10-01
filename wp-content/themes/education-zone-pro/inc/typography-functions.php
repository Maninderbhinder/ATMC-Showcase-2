<?php
/**
 * Typography Related Functions
 *
 * @package Education_zone_pro
 */
 
/**
 * Function return google fonts url
 * 
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
*/
function education_zone_pro_fonts_url() {
    $fonts_url = '';
    
    $body_font    = get_theme_mod( 'education_zone_pro_body_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_body_font = education_zone_pro_is_google_font( $body_font['font-family'] );
    
    //Setting for the Section Title of Home Page Section
    $home_section_font    = get_theme_mod( 'education_zone_pro_hps_title_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $ig_home_section_font = education_zone_pro_is_google_font( $home_section_font['font-family'] );
    
    //Setting for Page title above breadcrumb
    $page_title_font    = get_theme_mod( 'education_zone_pro_page_title_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_page_title_font = education_zone_pro_is_google_font( $page_title_font['font-family'] );
    
    //Setting for Post Title in Blog/Archive Page.
    $post_title_font    = get_theme_mod( 'education_zone_pro_post_title_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_post_title_font = education_zone_pro_is_google_font( $post_title_font['font-family'] );
    
    $h1_font         = get_theme_mod( 'education_zone_pro_h1_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_h1_font      = education_zone_pro_is_google_font( $h1_font['font-family'] );
    $h2_font         = get_theme_mod( 'education_zone_pro_h2_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_h2_font      = education_zone_pro_is_google_font( $h2_font['font-family'] );
    $h3_font         = get_theme_mod( 'education_zone_pro_h3_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_h3_font      = education_zone_pro_is_google_font( $h3_font['font-family'] );
    $h4_font         = get_theme_mod( 'education_zone_pro_h4_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_h4_font      = education_zone_pro_is_google_font( $h4_font['font-family'] );
    $h5_font         = get_theme_mod( 'education_zone_pro_h5_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_h5_font      = education_zone_pro_is_google_font( $h5_font['font-family'] );
    $h6_font         = get_theme_mod( 'education_zone_pro_h6_font', array('font-family'=>'Lato', 'variant'=>'regular') );
    $ig_h6_font      = education_zone_pro_is_google_font( $h6_font['font-family'] );
    
   /* $wg_title_font   = get_theme_mod( 'education_zone_pro_widget_title_font', array('font-family'=>'Lato', 'variant'=>'700') );
    $ig_wgtitle_font = education_zone_pro_is_google_font( $wg_title_font['font-family'] );
    */
    $subsets = array();
    $body_subsets              = ( ! empty( $body_font['subset'] ) && $ig_body_font ) ? $body_font['subset'] : array();
    $home_section_subsets      = ( ! empty( $home_section_font['subset'] ) && $ig_home_section_font ) ? $home_section_font['subset'] : array();
    $page_title_subsets        = ( ! empty( $page_title_font['subset'] ) && $ig_page_title_font ) ? $page_title_font['subset'] : array();    
    $post_title_subsets        = ( ! empty ( $post_title_font['subset'] ) && $ig_post_title_font ) ? $post_title_font['subset'] : array();    
    
    $h1_subsets         = ( ! empty( $h1_font['subset'] ) && $ig_h1_font ) ? $h1_font['subset'] : array();
    $h2_subsets         = ( ! empty( $h2_font['subset'] ) && $ig_h2_font ) ? $h2_font['subset'] : array();
    $h3_subsets         = ( ! empty( $h3_font['subset'] ) && $ig_h3_font ) ? $h3_font['subset'] : array();
    $h4_subsets         = ( ! empty( $h4_font['subset'] ) && $ig_h4_font ) ? $h4_font['subset'] : array();
    $h5_subsets         = ( ! empty( $h5_font['subset'] ) && $ig_h5_font ) ? $h5_font['subset'] : array();
    $h6_subsets         = ( ! empty( $h6_font['subset'] ) && $ig_h6_font ) ? $h6_font['subset'] : array();
    //$wg_title_subsets   = ( ! empty( $wg_title_font['subset'] ) && $ig_wgtitle_font ) ? $wg_title_font['subset'] : array();
    
    $subsets = array_unique( array_merge( $body_subsets, $home_section_subsets, $page_title_subsets, $post_title_subsets, $h1_subsets, $h2_subsets, $h3_subsets, $h4_subsets, $h5_subsets, $h6_subsets/*, $wg_title_subsets*/ ) );
    $subsets = implode( ',', $subsets );
    
    /* Translators: If there are characters in your language that are not
    * supported by respective fonts, translate this to 'off'. Do not translate
    * into your own language.
    */
    $body              = _x( 'on', 'Body Font: on or off', 'education-zone-pro' );
    $home_section      = _x( 'on', 'Home Section Title Font: on or off', 'education-zone-pro' );
    $page_title        = _x( 'on', 'Page Title above breadcrumb Font: on or off', 'education-zone-pro' );
    $post_title        = _x( 'on', 'Archive page Post Title Font: on or off', 'education-zone-pro' );    
    $h1                = _x( 'on', 'H1 Content Font: on or off', 'education-zone-pro' );
    $h2                = _x( 'on', 'H2 Content Font: on or off', 'education-zone-pro' );
    $h3                = _x( 'on', 'H3 Content Font: on or off', 'education-zone-pro' );
    $h4                = _x( 'on', 'H4 Content Font: on or off', 'education-zone-pro' );
    $h5                = _x( 'on', 'H5 Content Font: on or off', 'education-zone-pro' );
    $h6                = _x( 'on', 'H6 Content Font: on or off', 'education-zone-pro' );
    $wg_title          = _x( 'on', 'Widget Title Font: on or off', 'education-zone-pro' );
    
    if ( 'off' !== $body || 'off' !== $home_section || 'off' !== $page_title || 'off' !== $post_title || 'off' !== $h1 || 'off' !== $h2 || 'off' !== $h3 || 'off' !== $h4 || 'off' !== $h5 || 'off' !== $h6 || 'off' !== $wg_title ) {
        
        $font_families = array();
     
        if ( 'off' !== $body && $ig_body_font ) {
            if( ! empty( $body_font['variant'] ) ){
                $b_var = ':' . education_zone_pro_check_varient( $body_font['font-family'], $body_font['variant'] );
            }else{
                $b_var = '';    
            }            
            $font_families[] = $body_font['font-family'] . $b_var;
        }
         
        if ( 'off' !== $home_section && $ig_home_section_font ) {
            if( ! empty( $home_section_font['variant'] ) ){
                $home_section_var = ':' . education_zone_pro_check_varient( $home_section_font['font-family'], $home_section_font['variant'] );    
            }else{
                $home_section_var = '';
            }
            $font_families[] = $home_section_font['font-family'] . $home_section_var;
        }
        
        if ( 'off' !== $page_title && $ig_page_title_font ) {
            if( ! empty( $page_title_font['variant'] ) ){
                $page_title_var = ':' . education_zone_pro_check_varient( $page_title_font['font-family'], $page_title_font['variant'] );    
            }else{
                $page_title_var = '';
            }
            $font_families[] = $page_title_font['font-family'] . $page_title_var;
        }
        
        if ( 'off' !== $post_title && $ig_post_title_font ) {
            if( ! empty( $post_title_font['variant'] ) ){
                $post_title_var = ':' . education_zone_pro_check_varient( $post_title_font['font-family'], $post_title_font['variant'] );    
            }else{
                $post_title_var = '';
            }
            $font_families[] = $post_title_font['font-family'] . $post_title_var;
        }
        
        if ( 'off' !== $h1 && $ig_h1_font ) {
            if( ! empty( $h1_font['variant'] ) ){
                $h1_var = ':' . education_zone_pro_check_varient( $h1_font['font-family'], $h1_font['variant'] );    
            }else{
                $h1_var = '';
            }
            $font_families[] = $h1_font['font-family'] . $h1_var;
        }
        
        if ( 'off' !== $h2 && $ig_h2_font ) {
            if( ! empty( $h2_font['variant'] ) ){
                $h2_var = ':' . education_zone_pro_check_varient( $h2_font['font-family'], $h2_font['variant'] );    
            }else{
                $h2_var = '';
            }
            $font_families[] = $h2_font['font-family'] . $h2_var;
        }
        
        if ( 'off' !== $h3 && $ig_h3_font ) {
            if( ! empty( $h3_font['variant'] ) ){
                $h3_var = ':' . education_zone_pro_check_varient( $h3_font['font-family'], $h3_font['variant'] );    
            }else{
                $h3_var = '';
            }
            $font_families[] = $h3_font['font-family'] . $h3_var;
        }
        
        if ( 'off' !== $h4 && $ig_h4_font ) {
            if( ! empty( $h4_font['variant'] ) ){
                $h4_var = ':' . education_zone_pro_check_varient( $h4_font['font-family'], $h4_font['variant'] );    
            }else{
                $h4_var = '';
            }
            $font_families[] = $h4_font['font-family'] . $h4_var;
        }
        
        if ( 'off' !== $h5 && $ig_h5_font ) {
            if( ! empty( $h5_font['variant'] ) ){
                $h5_var = ':' . education_zone_pro_check_varient( $h5_font['font-family'], $h5_font['variant'] );    
            }else{
                $h5_var = '';
            }
            $font_families[] = $h5_font['font-family'] . $h5_var;
        }
        
        if ( 'off' !== $h6 && $ig_h6_font ) {
            if( ! empty( $h6_font['variant'] ) ){
                $h6_var = ':' . education_zone_pro_check_varient( $h6_font['font-family'], $h6_font['variant'] );    
            }else{
                $h6_var = '';
            }
            $font_families[] = $h6_font['font-family'] . $h6_var;
        }
        
      /*  if ( 'off' !== $wg_title && $ig_wgtitle_font ) {
            if( ! empty( $wg_title_font['variant'] ) ){
                $wg_title_var = ':' . education_zone_pro_check_varient( $wg_title_font['font-family'], $wg_title_font['variant'] );    
            }else{
                $wg_title_var = '';
            }
            $font_families[] = $wg_title_font['font-family'] . $wg_title_var;
        }
        */
        $font_families = array_diff( array_unique( $font_families ), array('') );
        
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( $subsets ),
        );
        
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
     
    return esc_url_raw( $fonts_url );
}

/**
 * Get Google Fonts from Kirki 
*/
function education_zone_pro_get_google_fonts(){
    $fonts = include wp_normalize_path( get_template_directory() . '/inc/kirki/modules/webfonts/webfonts.php' );
    $google_fonts = array();
    if ( is_array( $fonts ) ) {
        foreach ( $fonts['items'] as $font ) {
            $google_fonts[ $font['family'] ] = array(
                'variants' => $font['variants'],
            );
        }
    }    
    return $google_fonts;
}

/**
 * Checks for matched varients in google fonts for typography fields
*/
function education_zone_pro_check_varient( $font_family = 'serif' , $font_variants = 'regular' ){
    $variant = '';
    $google_fonts  = education_zone_pro_get_google_fonts(); //Google Fonts
    $websafe_fonts = education_zone_pro_get_websafe_font(); //Standard Web Safe Fonts
    
    if( array_key_exists( $font_family, $google_fonts ) ){
        $variants = $google_fonts[ $font_family ][ 'variants' ];
    
        if( in_array( $font_variants, $variants ) ){
            $variant = $font_variants;
        }else{
            $variant = 'regular';
        }
        
    }else{ //Standard Web Safe Fonts
        if( array_key_exists( $font_family, $websafe_fonts ) ){
            $variants = $websafe_fonts[ $font_family ][ 'variants' ];
            if( in_array( $font_variants, $variants ) ){
                $variant = $font_variants;
            }else{
                $variant = 'regular';
            }    
        }
    }
    return $variant;
}

/**
 * Returns font weight and font style to use in dynamic styles.
*/
function education_zone_pro_get_css_variant( $font_variant ){
    $v_array = array(
        '100'       => array(
            'weight'    => '100',
            'style'     => 'normal'
            ),
        '100italic' => array(
            'weight'    => '100',
            'style'     => 'italic'
            ),
        '200'       => array(
            'weight'    => '200',
            'style'     => 'normal'
            ),
        '200italic' => array(
            'weight'    => '200',
            'style'     => 'italic'
            ),
        '300'       => array(
            'weight'    => '300',
            'style'     => 'normal'
            ),
        '300italic' => array(
            'weight'    => '300',
            'style'     => 'italic'
            ),
        'regular'   => array(
            'weight'    => '400',
            'style'     => 'normal'
            ),
        'italic'    => array(
            'weight'    => '400',
            'style'     => 'italic'
            ),
        '500'       => array(
            'weight'    => '500',
            'style'     => 'normal'
            ),
        '500italic' => array(
            'weight'    => '500',
            'style'     => 'italic'
            ),
        '600'       => array(
            'weight'    => '600',
            'style'     => 'normal'
            ),
        '600italic' => array(
            'weight'    => '600',
            'style'     => 'italic'
            ),
        '700'       => array(
            'weight'    => '700',
            'style'     => 'normal'
            ),
        '700italic' => array(
            'weight'    => '700',
            'style'     => 'italic'
            ),
        '800'       => array(
            'weight'    => '800',
            'style'     => 'normal'
            ),
        '800italic' => array(
            'weight'    => '800',
            'style'     => 'italic'
            ),
        '900'       => array(
            'weight'    => '900',
            'style'     => 'normal'
            ),
        '900italic' => array(
            'weight'    => '900',
            'style'     => 'italic'
            ),
    );
    
    if( array_key_exists( $font_variant, $v_array ) ){
        return $v_array[ $font_variant ];
    }
} 

/**
 * Filter function to change the value of Standard Web safe Fonts
*/
function education_zone_pro_filter_websafe_font(){
    $standard_fonts = array(
        'serif' => array(
            'label' => _x( 'Serif', 'font style', 'education-zone-pro' ),
            'stack' => 'serif',
        ),
        'sans-serif' => array(
            'label'  => _x( 'Sans Serif', 'font style', 'education-zone-pro' ),
            'stack'  => 'sans-serif',
        ),
        'monospace' => array(
            'label' => _x( 'Monospace', 'font style', 'education-zone-pro' ),
            'stack' => 'monospace',
        ),
    );
    return $standard_fonts;
}
add_filter( 'kirki/fonts/standard_fonts', 'education_zone_pro_filter_websafe_font' );

/**
 * Function listing WebSafe Fonts and its attributes
*/
function education_zone_pro_get_websafe_font(){
    $standard_fonts = array(
        'serif' => array(
            'variants' => array( 'regular', 'italic', '700', '700italic' ),
            'fonts' => '"Times New Roman", Times, serif',
        ),
        'sans-serif' => array(
            'variants'  => array( 'regular', 'italic', '700', '700italic' ),
            'fonts'  => 'Arial, Helvetica, sans-serif',
        ),
        'monospace' => array(
            'variants' => array( 'regular', 'italic', '700', '700italic' ),
            'fonts' => '"Courier New", Courier, monospace',
        ),
    );
    return $standard_fonts;
}

/**
 * Function to check if it's a google font
*/
function education_zone_pro_is_google_font( $font ){
    $return = false;
    $websafe_fonts = education_zone_pro_get_websafe_font();
    if( $font ){
        if( array_key_exists( $font, $websafe_fonts ) ){
            //Web Safe Font
            $return = false;
        }else{
            //Google Font
            $return = true;
        }
    }
    return $return; 
}

/**
 * Function to get valid font, weight and style
*/
function education_zone_pro_get_fonts( $font_family, $font_variant ){
    
    $fonts = array();
    $websafe_fonts = education_zone_pro_get_websafe_font(); //Web Safe Font
    
    if( $font_family ){
        if( education_zone_pro_is_google_font( $font_family ) ){
            $fonts['font'] = esc_attr( $font_family ); //Google Font
            if( $font_variant ){
                $weight_style    = education_zone_pro_get_css_variant( education_zone_pro_check_varient( $font_family, $font_variant ) );
                $fonts['weight'] = $weight_style['weight'];
                $fonts['style']  = $weight_style['style'];
            }else{
                $fonts['weight'] = '400';
                $fonts['style']  = 'normal';
            }
        }else{
            if( array_key_exists( $font_family, $websafe_fonts ) ){
                $fonts['font'] = $websafe_fonts[ $font_family ]['fonts']; //Web Safe Font
                if( $font_variant ){
                    $weight_style    = education_zone_pro_get_css_variant( education_zone_pro_check_varient( $font_family, $font_variant ) );
                    $fonts['weight'] = $weight_style['weight'];
                    $fonts['style']  = $weight_style['style'];
                }else{
                    $fonts['weight'] = '400';
                    $fonts['style']  = 'normal';
                }
            }
        }   
    }else{
        $fonts['font']   = '"Times New Roman", Times, serif';
        $fonts['weight'] = '400';
        $fonts['style']  = 'normal';
    }
    
    return $fonts;
}