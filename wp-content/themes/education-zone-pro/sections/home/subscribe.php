<?php 
/**
 * 
 * Subscription Section
*/
$bg_type  = get_theme_mod( 'education_zone_pro_bg_type', 'bg-image' );
$bg_image = get_theme_mod( 'education_zone_pro_subscription_background_image' );
$bg_color = get_theme_mod( 'education_zone_pro_subscription_bg_color' );


 if( is_newsletter_activated() && is_active_sidebar( 'newsletter-form' ) ){ ?>
	<section class="subscription" 
	    <?php 
	    if( $bg_type == 'bg-image' && $bg_image ){ 
	    	echo 'style="background: url(' . esc_url( $bg_image ) . '); background-size: cover; background-repeat: no-repeat; background-position: center;"';
	    
	    }elseif( $bg_type == 'bg-color' && $bg_color ){ echo 'style = "background: ' . $bg_color . ' ;"';

	    }else{}
	    
	    ?>>
		<div class="container">
			<?php dynamic_sidebar( 'newsletter-form' ); ?>
		</div>
	</section>
<?php } ?>