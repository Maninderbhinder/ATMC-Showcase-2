<?php
/**
 * Header Three
 * 
 * @package Education Zone Pro
*/

?>

<header id="masthead" class="site-header header-three" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	
    <div class="header-top">
        <div class="container">
            <?php 
            if( has_nav_menu( 'secondary' ) ){ ?>
                <div id="mobile-header-2">
                    <a id="responsive-btn" href="#sidr-secondary"><i class="fa fa-bars"></i></a>
                </div> 
                <div class="top-links right">
                    <nav id="secondary-navigation" class="secondary-nav" role="navigation">                  
                        <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'fallback_cb' => false ) ); ?>
                    </nav><!-- #site-navigation -->
                </div>
            <?php 
            } 
            ?>
        </div>
    </div>
<div class="sticky-holder"></div>  
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
            
            <?php education_zone_pro_primary_nav(); ?>
             
        </div>
    </div>
    
</header>