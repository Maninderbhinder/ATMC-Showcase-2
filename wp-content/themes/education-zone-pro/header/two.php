<?php
/**
 * Header Two
 * 
 * @package education_zone_pro
*/

    $ed_social_link = get_theme_mod( 'education_zone_pro_ed_social_header' ); // From customizer
    $phone          = get_theme_mod( 'education_zone_pro_phone_number' );
    $email          = get_theme_mod( 'education_zone_pro_email' );
    $address        = get_theme_mod( 'education_zone_pro_address' );
    $ed_search_form = get_theme_mod( 'education_zone_pro_ed_search_form', '1' ); // From customizer
    $cta_lebel      = get_theme_mod( 'education_zone_pro_cta_label', __( 'Apply Now', 'education-zone-pro' ) );
    $cta_links      = get_theme_mod( 'education_zone_pro_cta_link' );
?>

<header id="masthead" class="site-header header-two" role="banner" itemscope itemtype="http://schema.org/WPHeader">
    
    <div class="header-holder">
        <?php 
        if( has_nav_menu( 'secondary' ) || $ed_social_link ){ ?>
            <div class="header-top">
                <div class="container">
                    <div class="top-links">
                        <?php 
                        if( has_nav_menu( 'secondary' ) ){ ?>
                            <div id="mobile-header-2">
                                <a id="responsive-btn" href="#sidr-secondary"><i class="fa fa-bars"></i></a>
                            </div>
                            <nav id="secondary-navigation" class="secondary-nav" role="navigation">                  
                                <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'fallback_cb' => false ) ); ?>
                            </nav><!-- #site-navigation -->
                        <?php 
                        } ?>
                    </div>
                    <?php if( $ed_social_link ) education_zone_pro_get_social_links(); ?>
                </div>
            </div>
        <?php 
        } ?>
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
                <?php if( $cta_lebel && $cta_links ): ?>
                <a href="<?php echo esc_url( $cta_links ); ?>" class="apply-btn"><?php echo esc_html( $cta_lebel ); ?></a>
                <?php
                endif; 
                if( $address ){ ?>
                    <div class="info-box">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span><?php echo esc_html( $address ); ?></span>
                    </div>

                <?php
                } 
                if( $email || $phone ){ ?>
                    <div class="info-box"> 
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span><a href="tel:<?php echo preg_replace('/\D/', '', $phone); ?>"><?php echo esc_html( $phone ); ?></a>
                            <a href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                        </span>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <div class="sticky-holder"></div>  
    <div class="header-bottom">
        <div class="container">
            <?php 
            education_zone_pro_primary_nav();
            
            if( $ed_search_form ){ ?>
                <div class="form-section">
                <a href="#" id="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div class="example">                       
                        <?php get_search_form(); ?>
                    </div>
                </div>
             <?php 
            } ?>
        </div>
    </div>
    
</header>