<?php 
/**
 * Exta Info Section
*/

$title        = get_theme_mod( 'education_zone_pro_CTA_section_title' );
$description  = get_theme_mod( 'education_zone_pro_CTA_content' );
$button_one   = get_theme_mod( 'education_zone_pro_CTA_button_text_one' );
$btn_one_link = get_theme_mod( 'education_zone_pro_CTA_button_link_one' ); 
$button_two   = get_theme_mod( 'education_zone_pro_CTA_button_text_two' );
$btn_two_link = get_theme_mod( 'education_zone_pro_CTA_button_link_two' );
$bg_image     = get_theme_mod( 'education_zone_pro_background_cta_image' );

if( $title || $description || $button_one || $btn_one_link || $button_two || $btn_two_link || $bg_image ){ ?>
<section id="cta_section" class="theme" <?php if( $bg_image ) echo 'style="background: url(' . $bg_image . '); background-size: cover; background-repeat: no-repeat; background-position: center;"'; ?>>
	<div class="theme-description">
		<div class="container">
		<?php if( $title || $description ){ ?>
			<header class="header-part">
				<?php 
	            if( $title ) echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>';
				      
	            if( $description ) echo wpautop( wp_kses_post( $description ) );
				?>
			</header>
	    <?php } ?>
	    
		<?php 
	    
	        if( $button_one && $btn_one_link ) echo '<a href="' . esc_url( $btn_one_link ) . '" class="apply" target="_blank">' . esc_html( $button_one ) . '</a>';
	        if( $button_two && $btn_two_link ) echo '<a href="' . esc_url( $btn_two_link ) . '" class="apply" target="_blank">' . esc_html( $button_two ) . '</a>'; 
		         
		?>
	    </div>
	</div>
</section>
<?php 
}