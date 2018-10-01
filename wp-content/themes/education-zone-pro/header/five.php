<?php
/**
 * Header Five
 * 
 * @package Education Zone Pro
*/

    $ed_social_link = get_theme_mod( 'education_zone_pro_ed_social_header' ); // From customizer
    $phone          = get_theme_mod( 'education_zone_pro_phone_number' );
    $email          = get_theme_mod( 'education_zone_pro_email' );
    $address        = get_theme_mod( 'education_zone_pro_address' );
    $ed_search_form = get_theme_mod( 'education_zone_pro_ed_search_form', '1' ); // From customizer
    
?>
    <header id="masthead" class="site-header header-five" role="banner" itemscope itemtype="http://schema.org/WPHeader">
       <div class="header-holder">
            <div class="header-top">
                <div class="container">
                    <?php 
                    if( $email || $phone || $address ){ ?>
                             
                        <div class="top-links">
                            <?php if( ! empty( $email ) ) { ?>
                                <span><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                                </span>
                            <?php } if( ! empty( $phone ) ) { ?>
                                <span><i class="fa fa-phone" aria-hidden="true"></i>
                                    <a href="tel:<?php echo preg_replace('/\D/', '', $phone); ?>"><?php echo esc_html( $phone ); ?></a>
                                </span>
                            <?php } if( ! empty( $address ) ) { ?>
                                <span>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo esc_html( $address ); ?>
                                </span>
                            <?php }  ?>
                        </div>

                    <?php } 
                            
                    if( $ed_search_form ){ ?>
                        <div class="form-section">
                        <a href="#" id="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a>
                            <div class="example">                       
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <?php 
                    }
                            
                    if( $ed_social_link ) education_zone_pro_get_social_links(); ?>
            </div>
        </div>
        <div class="header-m">
            <div class="container">
                <div class="site-branding" itemscope itemtype="http://schema.org/Organization">
                    <?php 
                    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                        the_custom_logo();
                    } 
                    ?>
                    <?php if ( is_front_page() ) : ?>
                        <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description" itemprop="description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; 
                    ?>                    
                </div><!-- .site-branding -->
            </div>
        </div>
    </div>
    <div class="sticky-holder"></div>  
    <div class="header-bottom">
        <div class="container">
            <?php education_zone_pro_primary_nav(); ?>
        </div>
    </div>
</header>