<?php
/**
 * Widget Instagram
 *
 * @package education_zone_pro
 */

// register education_zone_pro_Instagram_Widget widget
function education_zone_pro_register_instagram_widget() {
    register_widget( 'education_zone_pro_Instagram_Widget' );
}
add_action( 'widgets_init', 'education_zone_pro_register_instagram_widget' );
 
/**
 * Adds education_zone_pro_Instagram_Widget widget.
 */
class education_zone_pro_Instagram_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'education_zone_pro_instagram_widget', // Base ID
			__( 'RARA: Instagram', 'education-zone-pro' ), // Name
			array( 'description' => __( 'A Instagram Widget that displays your latest Instagram photos.', 'education-zone-pro' ), ) // Args
		);
	}
	function scrape_insta_user_images( $username ) {
		$insta_source = file_get_contents( 'https://www.instagram.com/'.$username.'/' ); // instagram user url'
		$shards       = explode( 'window._sharedData = ', $insta_source );
		$insta_json   = explode( ';</script>', $shards[1] ); 
		$insta_array  = json_decode( $insta_json[0], TRUE );
        return $insta_array; // this return a lot things print it and see what else you need
    }
    
    /**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */   
	function widget( $args, $instance ) {

		$title    = empty( $instance['title'] ) ? '' : $instance['title'];
		$username = empty( $instance['username'] ) ? '' : $instance['username'];
		$limit    = empty( $instance['number'] ) ? 6 : $instance['number'];
		$size     = empty( $instance['size'] ) ? 'small' : $instance['size'];
		$target   = empty( $instance['target'] ) ? '_blank' : $instance['target'];
		$link     = empty( $instance['link'] ) ? '' : $instance['link'];

		echo $args['before_widget'];

		if ( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];

		if ( $username != '' ) {

			$results_array = $this->scrape_insta_user_images( $username, $limit );
			$is_private = $results_array['entry_data']['ProfilePage'][0]['graphql']['user']['is_private'];

			if ( ! $is_private ) {
				if ( is_wp_error( $results_array ) ) {

				echo wp_kses_post( $results_array->get_error_message() );

			} else {

				// filter for images only?
				if ( $images_only = apply_filters( 'education_zone_pro_images_only', FALSE ) )
					$results_array = array_filter( $results_array, array( $this, 'images_only' ) );

				for ($i=0; $i < $limit; $i++) {     
	            	
	                //new code to get images from json   
					$insta_edges = $results_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][$i];
	                if( isset( $insta_edges ) ){

	                    $latest_array = $insta_edges['node'];

	                    $is_video = $insta_edges['node']['is_video'];

	                    $comments = $latest_array['edge_media_to_comment']['count'];
	                    //caption
	                    $insta_caption = $latest_array['edge_media_to_caption']['edges']['0']['node']['text'];

	                    if( $insta_caption ){
	                    	$caption = $insta_caption;
	                    }else{
	                    	$caption = __( 'Instagram Image', 'education-zone-pro' );
	                    }

	                    // Instagram Url
						$shortcode = $latest_array['shortcode'];

						if( $shortcode ){
							$url_prefix = 'https://www.instagram.com/p/'. $shortcode;
							$instagram_url = $url_prefix.'/?taken-by='.$username;
						}else{
							$instagram_url = 'https://www.instagram.com/'.$username;
						}

						//Post Date

						$timestamp = $latest_array['taken_at_timestamp'];
						$datetimeFormat = 'Y-m-d H:i:s';
						$date = new \DateTime();
						if( isset( $timestamp ) || $timestamp ){
							$date->setTimestamp( $timestamp );
							$date->format($datetimeFormat);
							$post_date = $date->format($datetimeFormat);
						}


	                    
	                    $image_sizes = $latest_array['thumbnail_resources'];

	                    $display_url = $latest_array['display_url'];

	                    if ( $is_video == true ) {
							$type = 'video';
						} else {
							$type = 'image';
						}
					
	                    $instagram[] = array(
							'description' => $caption,
							'link'        => $instagram_url,
							'time'        => $post_date,
							'thumbnail'   => $image_sizes[0]['src'],
							'small'       => $image_sizes[1]['src'],
							'medium'      => $image_sizes[3]['src'],
							'large'       => $image_sizes[4]['src'],
							'original'    => $display_url,
							'type'        => $type
						);

	                }
	            }
	            // filters for custom classes
				$ulclass = apply_filters( 'education_zone_pro_list_class', 'instagram-pics instagram-size-' . $size );
				$imgclass = apply_filters( 'education_zone_pro_img_class', '' );

				?><ul class="<?php echo esc_attr( $ulclass ); ?>"><?php
				if( $instagram ){
					foreach ( $instagram as $item ) {
						echo '<li><a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'" ><img src="'. esc_url( $item[$size] ) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"  class="'. esc_attr( $imgclass ) .'"/></a></li>';
					}
				}else{
					echo __('Please make your instagram account public','education-zone-pro');
				}
				?></ul><?php
			}
			}else{
				echo __('Please make your instagram account public','education-zone-pro');
			}
			
		}
		$linkclass = apply_filters( 'education_zone_pro_link_class', 'clear' );

		if ( $link != '' ) {
			?><p class="<?php echo esc_attr( $linkclass ); ?>"><a href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>"><?php echo esc_html( $link ); ?></a></p><?php
		}

		echo $args['after_widget'];
	}
    
    /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {
		$default = array( 
            'title' 	=> __( 'Instagram', 'education-zone-pro' ), 
            'username' 	=> '', 
            'size' 		=> 'small', 
            'link' 		=> __( 'Follow Me!', 'education-zone-pro' ), 
            'number' 	=> 6, 
            'target' 	=> '_blank' 
        );
        $instance = wp_parse_args( (array) $instance, $default );
		
        $title 		= $instance['title'];
		$username 	= $instance['username'];
		$number 	= $instance['number'];
		$size 		= $instance['size'];
		$target 	= $instance['target'];
		$link 		= $instance['link'];
		?>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'education-zone-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username', 'education-zone-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" />
        </p>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'education-zone-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" min="1" max="20" step="1" value="<?php echo esc_attr( $number ); ?>" />
        </p>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'education-zone-pro' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
				<option value="thumbnail" <?php selected( 'thumbnail', $size ) ?>><?php esc_html_e( 'Thumbnail', 'education-zone-pro' ); ?></option>
				<option value="small" <?php selected( 'small', $size ) ?>><?php esc_html_e( 'Small', 'education-zone-pro' ); ?></option>
				<option value="medium" <?php selected( 'medium', $size ) ?>><?php esc_html_e( 'Medium', 'education-zone-pro' ); ?></option>
				<option value="large" <?php selected( 'large', $size ) ?>><?php esc_html_e( 'Large', 'education-zone-pro' ); ?></option>
				<option value="original" <?php selected( 'original', $size ) ?>><?php esc_html_e( 'Original', 'education-zone-pro' ); ?></option>
			</select>
		</p>
        
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open links in', 'education-zone-pro' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
				<option value="_self" <?php selected( '_self', $target ) ?>><?php esc_html_e( 'Current window (_self)', 'education-zone-pro' ); ?></option>
				<option value="_blank" <?php selected( '_blank', $target ) ?>><?php esc_html_e( 'New window (_blank)', 'education-zone-pro' ); ?></option>
			</select>
		</p>
        
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'education-zone-pro' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
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
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
        $instance['title']    = strip_tags( $new_instance['title'] );
		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
		$instance['number']   = ! absint( $new_instance['number'] ) ? 6 : $new_instance['number'];
		$instance['size']     = ( ( $new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'large' || $new_instance['size'] == 'small' || $new_instance['size'] == 'medium' || $new_instance['size'] == 'original' ) ? $new_instance['size'] : 'small' );
		$instance['target']   = ( ( $new_instance['target'] == '_self' || $new_instance['target'] == '_blank' ) ? $new_instance['target'] : '_blank' );
		$instance['link']     = strip_tags( $new_instance['link'] );
		
        return $instance;
	}

}// class education_zone_pro_Instagram_Widget