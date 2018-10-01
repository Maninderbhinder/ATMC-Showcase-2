<?php
/**
 * Template Name: Contact Page
 *
 * @package Education Zone Pro
 */

get_header();

$contact_form = get_theme_mod( 'education_zone_pro_contact_form' );
$google_map   = get_theme_mod( 'education_zone_pro_contact_map' );

  while ( have_posts() ) : the_post();
   the_content();
?>
	
	<div class="template-contact">
	    <div class="row">
	    	
	    	<div class="col"> 
	    	    
	    	    <?php 
                if( education_zone_pro_is_cf7_activated() && $contact_form ) {	
                    echo '<div class="contact-form">';
                    echo do_shortcode( wp_kses_post( $contact_form ) );
                    echo '</div>';
                }
                ?>
	  
	    	</div>
            
            <div class="col">
                <?php 
                if( $google_map ){ ?>

	            	<div class="map-section">
				       <?php 
				       $allowed = array(
                			'iframe' => array(
		                	'src' => array()
		                	)
		                ); 

                       echo wp_kses( $google_map , $allowed ); ?>

			        </div>
		        <?php 
		        } ?>
            </div>  
	     
	    </div>		  
    </div>
        
<?php 
 endwhile;

get_footer(); ?>