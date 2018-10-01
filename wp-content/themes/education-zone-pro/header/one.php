<?php
/**
 * Header One
 * 
 * @package Education Zone Pro
*/
?>
<header id="masthead" class="site-header header-one" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        
        <?php
            if( has_nav_menu( 'secondary' ) ):
                $menu_name  = 'secondary';
                $locations  = get_nav_menu_locations();
                $menu_id    = $locations[ $menu_name ] ;
                $menu       =  wp_get_nav_menu_object($menu_id);
                $menu_title = $menu->name;
            endif;
            $phone      = get_theme_mod( 'education_zone_pro_phone_number' );
            $email      = get_theme_mod( 'education_zone_pro_email' );
            $ed_search_form = get_theme_mod( 'education_zone_pro_ed_search_form', '1' ); // From customizer

        ?>
        <div class="header-holder">
        <?php if( $phone || $email || has_nav_menu( 'secondary' ) ) { ?>
            <div class="header-top">
                <div class="container">
                    
                    <?php if( $email || $phone ){ ?>
                    <div class="top-links">
                        <?php if( ! empty( $email ) ){ ?>
                        <span><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo esc_html( $email ); ?></a></span>
                        <?php } if( ! empty( $phone ) ){ ?>
                        <span><i class="fa fa-phone"></i><a href="tel:<?php echo preg_replace('/\D/', '', $phone); ?>"><?php echo esc_html( $phone ); ?></a></span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    
                    <?php 
                    if( has_nav_menu( 'secondary' ) ){ ?>
                        <div id="mobile-header-2">
                            <a id="responsive-btn" href="#sidr-secondary"><i class="fa fa-bars"></i></a>
                        </div>
                        <nav id="secondary-navigation" class="secondary-nav" role="navigation" >       
                            <a href="javascript:void(0);"><?php echo esc_html( $menu_title ); ?></a>             
                            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'fallback_cb' => false ) ); ?>
                        </nav><!-- #site-navigation -->
                    <?php 
                    } ?>
                    
                </div>
            </div>
            <?php } ?>
            
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
                   <?php if( $ed_search_form ){ ?>
                        <div class="form-section">
                            <div class="example">                       
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div> 
        <div class="sticky-holder"></div>  
        <div class="header-bottom">
            <div class="container">
                <?php education_zone_pro_primary_nav(); ?>
            </div>
        </div>
        
    </header><!-- #masthead -->