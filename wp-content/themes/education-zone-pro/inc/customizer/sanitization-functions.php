<?php
/**
 * Sanitization Functions
 *
 * @package education_zone
 */

function education_zone_pro_sanitize_email( $email ){
    
	$email = sanitize_email( $email );    	
	
    // If $email is a valid email, return it; otherwise, return the default.	
    return ( !empty( $email ) ? $email : '' );    
}

function education_zone_pro_sanitize_iframe( $iframe ){
    $allow_tag = array(
                    'iframe'=>array(
                        'src'=>array(),
                        'width'=>array(),
                        'height'=>array()
                    )
                );
    return wp_kses( $iframe, $allow_tag );
}

function education_zone_pro_sanitize_select( $value ){
    
    if ( is_array( $value ) ) {
        foreach ( $value as $key => $subvalue ) {
            $value[ $key ] = esc_attr( $subvalue );
        }
        return $value;
    }
    return esc_attr( $value );

}

function educaton_zone_pro_sanitize_repeater_setting( $value ) {
            
    if ( ! is_array( $value ) ) {
		$value = json_decode( urldecode( $value ) );
	}
	$sanitized = ( empty( $value ) || ! is_array( $value ) ) ? array() : $value;

	// Make sure that every row is an array, not an object.
	foreach ( $sanitized as $key => $_value ) {
		if ( empty( $_value ) ) {
			unset( $sanitized[ $key ] );
		} else {
			$sanitized[ $key ] = (array) $_value;
		}
	}

	// Reindex array.
	$sanitized = array_values( $sanitized );

	return $sanitized;
    
}