<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://raratheme.com', // Site where EDD is hosted
		'item_name'      => 'Education Zone Pro', // Name of theme
		'theme_slug'     => 'education-zone-pro', // Theme slug
		'version'        => '2.2.6', // The current version of this theme
		'author'         => 'Rara Theme', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'education-zone-pro' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'education-zone-pro' ),
		'license-key'               => __( 'License Key', 'education-zone-pro' ),
		'license-action'            => __( 'License Action', 'education-zone-pro' ),
		'deactivate-license'        => __( 'Deactivate License', 'education-zone-pro' ),
		'activate-license'          => __( 'Activate License', 'education-zone-pro' ),
		'status-unknown'            => __( 'License status is unknown.', 'education-zone-pro' ),
		'renew'                     => __( 'Renew?', 'education-zone-pro' ),
		'unlimited'                 => __( 'unlimited', 'education-zone-pro' ),
		'license-key-is-active'     => __( 'License key is active.', 'education-zone-pro' ),
		'expires%s'                 => __( 'Expires %s.', 'education-zone-pro' ),
		'expires-never'             => __( 'Lifetime License.', 'education-zone-pro' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'education-zone-pro' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'education-zone-pro' ),
		'license-key-expired'       => __( 'License key has expired.', 'education-zone-pro' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'education-zone-pro' ),
		'license-is-inactive'       => __( 'License is inactive.', 'education-zone-pro' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'education-zone-pro' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'education-zone-pro' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'education-zone-pro' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'education-zone-pro' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'education-zone-pro' ),
	)

);
