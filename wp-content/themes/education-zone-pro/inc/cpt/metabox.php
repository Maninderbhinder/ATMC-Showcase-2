<?php
/**
 * Education Zone Pro Meta Box
 * 
 * @package education_zone_Pro
 */

 add_action('add_meta_boxes', 'education_zone_pro_add_sidebar_layout_box');

function education_zone_pro_add_sidebar_layout_box(){    
    
    $screens = array( 'post', 'page', 'event' );
    foreach ( $screens as $screen ){
        add_meta_box(
                 'education_zone_pro_sidebar_layout', // $id
                 __( 'Sidebar Layout', 'education-zone-pro' ), // $title
                 'education_zone_pro_sidebar_layout_callback', // $callback
                 $screen, // $page
                 'normal', // $context
                 'high' // $priority
        );
    }

    // Meta box to add additional details for "Team"
    add_meta_box(
                 'education_zone_pro_team_details', // $id
                 __( 'Additional Info', 'education-zone-pro' ), // $title
                 'education_zone_pro_team_details_callback', // $callback
                 'team', // $post_type
                 'normal', // $context
                 'high'// $priority
    );  

     // Meta box to add additional details for "Events"
    add_meta_box(
                 'education_zone_pro_event_details', // $id
                 __( 'Additional Info', 'education-zone-pro' ), // $title
                 'education_zone_pro_event_details_callback', // $callback
                 'event', // $post_type
                 'normal', // $context
                 'high'// $priority
    ); 

        // Meta box to add additional details for "Testimonial"
    add_meta_box(
                 'education_zone_pro_testimonial_details', // $id
                 __( 'Additional Info', 'education-zone-pro' ), // $title
                 'education_zone_pro_testimonial_details_callback', // $callback
                 'testimonial', // $post_type
                 'normal', // $context
                 'high'// $priority
    ); 
        
}

$education_zone_pro_sidebar_layout = array(         
    'default-sidebar' => array(
                            'value' => 'default-sidebar',
                            'thumbnail' => get_template_directory_uri() . '/images/default-sidebar.png'
                        ),
    'left-sidebar' => array(
                            'value' => 'left-sidebar',
                            'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
                        ),
    'right-sidebar' => array(
                            'value' => 'right-sidebar',
                            'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                        )
    );

function education_zone_pro_sidebar_layout_callback(){
    
    global $post , $education_zone_pro_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'education_zone_pro_sidebar_layout_nonce' ); 
    
    $sidebars = education_zone_pro_get_dynamnic_sidebar( true, true, true );
    $sidebar  = get_post_meta( $post->ID, '_education_zone_pro_sidebar', true );
?>
<table class="form-table page-meta-box">
    <tr>
        <td colspan="4"><em class="f13"><?php _e( 'Choose Sidebar Template', 'education-zone-pro' ); ?></em></td>
    </tr>

    <tr>
        <td>
        <?php  
            foreach( $education_zone_pro_sidebar_layout as $field ){  
                $layout = get_post_meta( $post->ID, '_education_zone_pro_sidebar_layout', true ); ?>

            <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="education_zone_pro_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'default-sidebar' ); }?>/>
                <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                    <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['value'] ); ?>" />
                </label>
            </div>
            <?php } // end foreach 
            ?>
            <div class="clear"></div>
        </td>
    </tr>
    
    <tr>
        <td colspan="3"><em class="f13"><?php esc_html_e('Choose Sidebar', 'education-zone-pro'); ?></em></td>
    </tr>
    
    <tr>
        <td>
            <select name="education_zone_pro_sidebar">
            <?php 
                foreach( $sidebars as $k => $v ){ ?>
                    <option value="<?php echo esc_attr( $k ); ?>" <?php selected( $sidebar, $k ); if( empty( $sidebar ) && $k == 'default-sidebar' ){ echo "selected='selected'";}?> ><?php echo esc_html( $v ); ?></option>
                <?php }
            ?>
            </select>
        </td>    
    </tr>
    
    <tr>
        <td><em class="f13"><?php printf( esc_html__( 'You can set up the sidebar content from %s', 'education-zone-pro' ), '<a href="'. esc_url( admin_url( 'widgets.php' ) ) .'">here</a>' ); ?></em></td>
    </tr>
    
</table>
<?php        
}

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function education_zone_pro_save_sidebar_layout( $post_id ) { 
    
    global $education_zone_pro_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'education_zone_pro_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'education_zone_pro_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if ( !current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif ( !current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }  
    
    // Make sure that it is set.
    if ( ! isset( $_POST['education_zone_pro_sidebar'] ) ) {
        return;
    }
    
    foreach( $education_zone_pro_sidebar_layout as $field ){  
        //Execute this saving function
        $old = get_post_meta( $post_id, '_education_zone_pro_sidebar_layout', true ); 
        $new = sanitize_text_field( $_POST['education_zone_pro_sidebar_layout'] );
        if ( $new && $new != $old ){  
            update_post_meta( $post_id, '_education_zone_pro_sidebar_layout', $new );  
        } elseif( '' == $new && $old ){  
            delete_post_meta( $post_id, '_education_zone_pro_sidebar_layout', $old );  
        } 
    } // end foreach
    
    // Sanitize user input.
    $sidebar = sanitize_text_field( $_POST['education_zone_pro_sidebar'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_education_zone_pro_sidebar', $sidebar );   
}
add_action( 'save_post', 'education_zone_pro_save_sidebar_layout' ); 


/**
 * Callback for Additional Info for Team
*/
function education_zone_pro_team_details_callback(){
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'education_zone_pro_team_details_nonce' );
    
    $designation = get_post_meta( $post->ID, '_education_zone_pro_team_designation', true );
    $facebook    = get_post_meta( $post->ID, '_education_zone_pro_team_facebook', true );
    $twitter     = get_post_meta( $post->ID, '_education_zone_pro_team_twitter', true );
    $youtube     = get_post_meta( $post->ID, '_education_zone_pro_team_youtube', true );
    $gplus       = get_post_meta( $post->ID, '_education_zone_pro_team_gplus', true );
    $linkedin    = get_post_meta( $post->ID, '_education_zone_pro_team_linkedin', true );
    $instagram   = get_post_meta( $post->ID, '_education_zone_pro_team_instagram', true );
    ?>
    
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_team_designation"><?php _e( 'Designation', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_team_designation" name="education_zone_pro_team_designation" value="<?php echo esc_attr( $designation ); ?>" /></div>
    </div>
    
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_team_facebook"><?php _e( 'Facebook', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_team_facebook" name="education_zone_pro_team_facebook" value="<?php echo esc_attr( $facebook ); ?>" /></div>
    </div>
    
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_team_twitter"><?php _e( 'Twitter', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_team_twitter" name="education_zone_pro_team_twitter" value="<?php echo esc_attr( $twitter ); ?>" /></div>
    </div>
    
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_team_youtube"><?php _e( 'Youtube', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_team_youtube" name="education_zone_pro_team_youtube" value="<?php echo esc_attr( $youtube ); ?>" /></div>
    </div>

    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_team_gplus"><?php _e( 'Google Plus', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_team_gplus" name="education_zone_pro_team_gplus" value="<?php echo esc_attr( $gplus ); ?>" /></div>
    </div>
    
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_team_linkedin"><?php _e( 'Linkedin', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_team_linkedin" name="education_zone_pro_team_linkedin" value="<?php echo esc_attr( $linkedin ); ?>" /></div>
    </div>
    
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_team_instagram"><?php _e( 'Instagram', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_team_instagram" name="education_zone_pro_team_instagram" value="<?php echo esc_attr( $instagram ); ?>" /></div>
    </div>
    <?php
}

function education_zone_pro_save_team_details( $post_id ){
    // Check if our nonce is set.
    if ( ! isset( $_POST['education_zone_pro_team_details_nonce'] ) || ! wp_verify_nonce( $_POST['education_zone_pro_team_details_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) return;      
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    }
    
    if ( ! isset( $_POST['education_zone_pro_team_designation'] ) 
        && ! isset( $_POST['education_zone_pro_team_facebook'] ) 
        && ! isset( $_POST['education_zone_pro_team_twitter'] ) 
        && ! isset( $_POST['education_zone_pro_team_youtube'] ) 
        && ! isset( $_POST['education_zone_pro_team_gplus'] ) 
        && ! isset( $_POST['education_zone_pro_team_linkedin'] ) 
        && ! isset( $_POST['education_zone_pro_team_instagram'] ) ) {
        return;
    }
    
    // Sanitize user input.
    $designation = sanitize_text_field( $_POST['education_zone_pro_team_designation'] );    
    $facebook    = esc_url_raw( $_POST['education_zone_pro_team_facebook'] );
    $twitter     = esc_url_raw( $_POST['education_zone_pro_team_twitter'] );
    $youtube     = esc_url_raw( $_POST['education_zone_pro_team_youtube'] );
    $gplus       = esc_url_raw( $_POST['education_zone_pro_team_gplus'] );
    $linkedin    = esc_url_raw( $_POST['education_zone_pro_team_linkedin'] );
    $instagram   = esc_url_raw( $_POST['education_zone_pro_team_instagram'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_education_zone_pro_team_designation', $designation );
    update_post_meta( $post_id, '_education_zone_pro_team_facebook', $facebook );
    update_post_meta( $post_id, '_education_zone_pro_team_twitter', $twitter );
    update_post_meta( $post_id, '_education_zone_pro_team_youtube', $youtube );
    update_post_meta( $post_id, '_education_zone_pro_team_gplus', $gplus );
    update_post_meta( $post_id, '_education_zone_pro_team_linkedin', $linkedin );
    update_post_meta( $post_id, '_education_zone_pro_team_instagram', $instagram );
    

}
add_action( 'save_post', 'education_zone_pro_save_team_details' );

/**
 * Callback for Additional Info for Events
*/
function education_zone_pro_event_details_callback(){
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'education_zone_pro_event_details_nonce' );
    
    $start_date = get_post_meta( $post->ID, '_education_zone_pro_event_start_date', true );
    $end_date   = get_post_meta( $post->ID, '_education_zone_pro_event_end_date', true );
    $time       = get_post_meta( $post->ID, '_education_zone_pro_event_time', true );
    $location   = get_post_meta( $post->ID, '_education_zone_pro_event_location', true );
    $name       = get_post_meta( $post->ID, '_education_zone_pro_event_name', true );
    $phone      = get_post_meta( $post->ID, '_education_zone_pro_event_phone', true );
    $email      = get_post_meta( $post->ID, '_education_zone_pro_event_email', true );
    $website    = get_post_meta( $post->ID, '_education_zone_pro_event_website', true );
   
   ?>
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_event_start_date"><?php _e( 'Start Date', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_event_start_date" class="date-cpt" name="education_zone_pro_event_start_date" value="<?php echo esc_attr( $start_date ); ?>" /></div>
    </div>

    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_event_end_date"><?php _e( 'End Date', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_event_end_date" class="date-cpt" name="education_zone_pro_event_end_date" value="<?php echo esc_attr( $end_date ); ?>" /></div>
    </div>

    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_event_time"><?php _e( 'Time', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_event_time" name="education_zone_pro_event_time" value="<?php echo esc_attr( $time ); ?>" /></div>
    </div>

    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_event_location"><?php _e( 'Location', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_event_location" name="education_zone_pro_event_location" value="<?php echo esc_attr( $location ); ?>" /></div>
    </div>
    
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_event_name"><?php _e( 'Organizer Name', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_event_name" name="education_zone_pro_event_name" value="<?php echo esc_attr( $name ); ?>" /></div>
    </div>

    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_event_phone"><?php _e( 'Organizer Phone', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_event_phone" name="education_zone_pro_event_phone" value="<?php echo esc_attr( $phone ); ?>" /></div>
    </div>

    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_event_email"><?php _e( 'Organizer Email', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_event_email" name="education_zone_pro_event_email" value="<?php echo esc_attr( $email ); ?>" /></div>
    </div>

    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_event_website"><?php _e( 'Organizer Website', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_event_website" name="education_zone_pro_event_website" value="<?php echo esc_attr( $website ); ?>" /></div>
    </div>

    
    <?php
}

function education_zone_pro_save_event_details( $post_id ){
    // Check if our nonce is set.
    if ( ! isset( $_POST['education_zone_pro_event_details_nonce'] ) || ! wp_verify_nonce( $_POST['education_zone_pro_event_details_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) return;      
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    }
    
    if ( ! isset( $_POST['education_zone_pro_event_start_date'] ) 
        && ! isset( $_POST['education_zone_pro_event_end_date'] ) 
        && ! isset( $_POST['education_zone_pro_event_time'] )
        && ! isset( $_POST['education_zone_pro_event_location'] )
        && ! isset( $_POST['education_zone_pro_event_name'] )
        && ! isset( $_POST['education_zone_pro_event_phone'] )
        && ! isset( $_POST['education_zone_pro_event_email'] )
        && ! isset( $_POST['education_zone_pro_event_website'] ) ) {
        return;
    }
    
    // Sanitize user input.
    $start_date = sanitize_text_field( $_POST['education_zone_pro_event_start_date'] ); 
    $end_date   = sanitize_text_field( $_POST['education_zone_pro_event_end_date'] );       
    $time       = sanitize_text_field( $_POST['education_zone_pro_event_time'] );    
    $location   = sanitize_text_field( $_POST['education_zone_pro_event_location'] );    
    $name       = sanitize_text_field( $_POST['education_zone_pro_event_name'] );    
    $phone      = sanitize_text_field( $_POST['education_zone_pro_event_phone'] );    
    $email      = sanitize_text_field( $_POST['education_zone_pro_event_email'] );    
    $website    = sanitize_text_field( $_POST['education_zone_pro_event_website'] );    
 
    // Update the meta field in the database.
    update_post_meta( $post_id, '_education_zone_pro_event_start_date', $start_date );
    update_post_meta( $post_id, '_education_zone_pro_event_end_date', $end_date );
    update_post_meta( $post_id, '_education_zone_pro_event_time', $time );
    update_post_meta( $post_id, '_education_zone_pro_event_location', $location );
    update_post_meta( $post_id, '_education_zone_pro_event_name', $name );
    update_post_meta( $post_id, '_education_zone_pro_event_phone', $phone );
    update_post_meta( $post_id, '_education_zone_pro_event_email', $email );
    update_post_meta( $post_id, '_education_zone_pro_event_website', $website );
    
}
add_action( 'save_post', 'education_zone_pro_save_event_details' );


/**
 * Callback for Additional Info for Testimonials
*/
function education_zone_pro_testimonial_details_callback(){
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'education_zone_pro_testimonial_details_nonce' );
    
    $designation = get_post_meta( $post->ID, '_education_zone_pro_testimonial_designation', true );
   ?>
    
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="education_zone_pro_testimonial_designation"><?php _e( 'Designation', 'education-zone-pro' ); ?></label>
        <div class="below_row_input float-left"><input type="text" id="education_zone_pro_testimonial_designation" name="education_zone_pro_testimonial_designation" value="<?php echo esc_attr( $designation ); ?>" /></div>
    </div>
    
    
    <?php
}

function education_zone_pro_save_testimonial_details( $post_id ){
    // Check if our nonce is set.
    if ( ! isset( $_POST['education_zone_pro_testimonial_details_nonce'] ) || ! wp_verify_nonce( $_POST['education_zone_pro_testimonial_details_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) return;      
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    }
    
    if ( ! isset( $_POST['education_zone_pro_testimonial_designation'] )  ) {
        return;
    }
    
    // Sanitize user input.
    $designation = sanitize_text_field( $_POST['education_zone_pro_testimonial_designation'] );    
   
    // Update the meta field in the database.
    update_post_meta( $post_id, '_education_zone_pro_testimonial_designation', $designation );
    
}
add_action( 'save_post', 'education_zone_pro_save_testimonial_details' );