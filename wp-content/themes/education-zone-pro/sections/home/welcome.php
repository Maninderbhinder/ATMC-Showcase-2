<?php
/**
 * Welcome Section
*/  

$title       = get_theme_mod( 'education_zone_pro_welcome_section_title' );
$description = get_theme_mod( 'education_zone_pro_welcome_section_content' );

?>
<section class="welcome-note">    
    <div class="container">
        <?php 
        if( $title || $description ){ ?>
        	<header class="header-part">
        		<?php 
                if( $title ) echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>';
        		      
                if($description) echo wpautop( wp_kses_post( $description ) );
        		?>
        	</header>
        <?php } 

        if( is_active_sidebar( 'stat-counter' ) ){ ?>
            <div class="row">
               <?php  dynamic_sidebar( 'stat-counter' ); ?>
            </div>
        <?php } 
        ?>
    </div>
</section>