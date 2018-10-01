<?php
/**
 * Stat Counter Widget
 *
 * @package education_zone_pro
 */

// register education_zone_pro_Stat_Counter_Widget widget
function education_zone_pro_register_stat_counter_widget(){
    register_widget( 'education_zone_pro_Stat_Counter_Widget' );
}
add_action('widgets_init', 'education_zone_pro_register_stat_counter_widget');
 
 /**
 * Adds education_zone_pro_Stat_Counter_Widget widget.
 */
class education_zone_pro_Stat_Counter_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
			'education_zone_pro_stat_counter_widget', // Base ID
			__( 'RARA: Stat Counter Widget', 'education-zone-pro' ), // Name
			array( 'description' => __( 'Widget for stat counter.', 'education-zone-pro' ), ) // Args
		);
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        
        $title        = ! empty( $instance['title'] ) ? $instance['title'] : '' ;		
        $counter      = ! empty( $instance['counter'] ) ? $instance['counter'] : '';
        $ed_seperator = ! empty( $instance['ed_seperator'] ) ? $instance['ed_seperator'] : '';
        
        echo $args['before_widget']; 
        $ran = rand(1,100); $ran++;
        $seperator_class = $ed_seperator ? 'no-seperator' : '';
        ?>
        
            <div class="col">
				
                <div class="text">
					<?php 
                        if( $counter ) { $delay = ($ran/1000)*100;?>
                          <strong class="hs-counter hs-counter<?php echo $ran;?> wow fadeInDown" data-wow-duration="<?php echo $delay/100; echo 's';?>" data-wow-delay="<?php echo $delay.'s'?>">
                              <div class="hs-counter-count <?php echo esc_attr( $seperator_class ); ?> odometer odometer<?php echo $ran;?>" data-count="<?php echo absint( $counter ); ?>">
                                  99
                              </div>
                          </strong>
                    <?php } 
                         
    					if( $title ) echo '<span class="stat-title">' . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . '</span>'; 
                    ?>                    
				</div>
                
			</div>        
        
        <?php
         echo
            '<script>
                jQuery( document ).ready(function($) {
                    $(".odometer'.$ran.'").waypoint(function() {
                       setTimeout(function() {
                          $(".odometer'.$ran.'").html($(".odometer'.$ran.'").data("count"));
                        }, 500);
                      }, {
                        offset: 800,
                        triggerOnce: true
                    });
                });
            </script>';       
        echo $args['after_widget'];
    }

    /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title        = ! empty( $instance['title'] ) ? $instance['title'] : '' ;		
        $counter      = ! empty( $instance['counter'] ) ? $instance['counter'] : '';
        $ed_seperator = ! empty( $instance['ed_seperator'] ) ? $instance['ed_seperator'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'education-zone-pro' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />            
		</p>
        
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter' ) ); ?>"><?php esc_html_e( 'Counter', 'education-zone-pro' ); ?></label>
			<input name="<?php echo esc_attr( $this->get_field_name( 'counter' ) ); ?>" type="text" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>" value="<?php echo esc_attr( $counter ); ?>" />			
		</p>

         <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'ed_seperator' ) ); ?>"><?php esc_html_e( 'Hide Seperator', 'education-zone-pro' ); ?></label>
            <input name="<?php echo esc_attr( $this->get_field_name( 'ed_seperator' ) ); ?>" type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>" value="1" <?php checked( '1', $ed_seperator ); ?> />         
        </p>
                        
        <?php
	}
    
    /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
        $instance['title']        = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '' ;
        $instance['counter']      = ! empty( $new_instance['counter'] ) ? sanitize_text_field( $new_instance['counter'] ) : '';
        $instance['ed_seperator'] = ! empty( $new_instance['ed_seperator'] ) ? sanitize_text_field( $new_instance['ed_seperator'] ) : '';
        
        return $instance;
	}
    
}  // class education_zone_pro_Stat_Counter_Widget 