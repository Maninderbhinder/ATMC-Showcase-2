<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.12
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel(
	'kirki_demo_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Kirki Demo Panel', 'education-zone-pro' ),
		'description' => esc_attr__( 'Contains sections for all kirki controls.', 'education-zone-pro' ),
	)
);

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = array(
	'background'      => array( esc_attr__( 'Background', 'education-zone-pro' ), '' ),
	'code'            => array( esc_attr__( 'Code', 'education-zone-pro' ), '' ),
	'checkbox'        => array( esc_attr__( 'Checkbox', 'education-zone-pro' ), '' ),
	'color'           => array( esc_attr__( 'Color', 'education-zone-pro' ), '' ),
	'color-palette'   => array( esc_attr__( 'Color Palette', 'education-zone-pro' ), '' ),
	'custom'          => array( esc_attr__( 'Custom', 'education-zone-pro' ), '' ),
	'dashicons'       => array( esc_attr__( 'Dashicons', 'education-zone-pro' ), '' ),
	'date'            => array( esc_attr__( 'Date', 'education-zone-pro' ), '' ),
	'dimension'       => array( esc_attr__( 'Dimension', 'education-zone-pro' ), '' ),
	'dimensions'      => array( esc_attr__( 'Dimensions', 'education-zone-pro' ), '' ),
	'editor'          => array( esc_attr__( 'Editor', 'education-zone-pro' ), '' ),
	'fontawesome'     => array( esc_attr__( 'Font-Awesome', 'education-zone-pro' ), '' ),
	'generic'         => array( esc_attr__( 'Generic', 'education-zone-pro' ), '' ),
	'image'           => array( esc_attr__( 'Image', 'education-zone-pro' ), '' ),
	'multicheck'      => array( esc_attr__( 'Multicheck', 'education-zone-pro' ), '' ),
	'multicolor'      => array( esc_attr__( 'Multicolor', 'education-zone-pro' ), '' ),
	'number'          => array( esc_attr__( 'Number', 'education-zone-pro' ), '' ),
	'palette'         => array( esc_attr__( 'Palette', 'education-zone-pro' ), '' ),
	'preset'          => array( esc_attr__( 'Preset', 'education-zone-pro' ), '' ),
	'radio'           => array( esc_attr__( 'Radio', 'education-zone-pro' ), esc_attr__( 'A plain Radio control.', 'education-zone-pro' ) ),
	'radio-buttonset' => array( esc_attr__( 'Radio Buttonset', 'education-zone-pro' ), esc_attr__( 'Radio-Buttonset controls are essentially radio controls with some fancy styling to make them look cooler.', 'education-zone-pro' ) ),
	'radio-image'     => array( esc_attr__( 'Radio Image', 'education-zone-pro' ), esc_attr__( 'Radio-Image controls are essentially radio controls with some fancy styles to use images', 'education-zone-pro' ) ),
	'repeater'        => array( esc_attr__( 'Repeater', 'education-zone-pro' ), '' ),
	'select'          => array( esc_attr__( 'Select', 'education-zone-pro' ), '' ),
	'slider'          => array( esc_attr__( 'Slider', 'education-zone-pro' ), '' ),
	'sortable'        => array( esc_attr__( 'Sortable', 'education-zone-pro' ), '' ),
	'switch'          => array( esc_attr__( 'Switch', 'education-zone-pro' ), '' ),
	'toggle'          => array( esc_attr__( 'Toggle', 'education-zone-pro' ), '' ),
	'typography'      => array( esc_attr__( 'Typography', 'education-zone-pro' ), '' ),
);
foreach ( $sections as $section_id => $section ) {
	Kirki::add_section(
		str_replace( '-', '_', $section_id ) . '_section', array(
			'title'       => $section[0],
			'description' => $section[1],
			'panel'       => 'kirki_demo_panel',
		)
	);
}

/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function my_config_kirki_add_field( $args ) {
	Kirki::add_field( 'kirki_demo', $args );
}

/**
 * Background Control.
 *
 * @todo Triggers change on load.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'background',
		'settings'    => 'background_setting',
		'label'       => esc_attr__( 'Background Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Background conrols are pretty complex! (but useful if properly used)', 'education-zone-pro' ),
		'section'     => 'background_section',
		'default'     => array(
			'background-color'      => 'rgba(20,20,20,.8)',
			'background-image'      => '',
			'background-repeat'     => 'repeat-all',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
	)
);

/**
 * Code control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/code.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'code',
		'settings'    => 'code_setting',
		'label'       => esc_attr__( 'Code Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description', 'education-zone-pro' ),
		'section'     => 'code_section',
		'default'     => '',
		'choices'     => array(
			'language' => 'css',
			'theme'    => 'monokai',
		),
	)
);

/**
 * Checkbox control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/checkbox.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'checkbox_setting',
		'label'       => esc_attr__( 'Checkbox Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description', 'education-zone-pro' ),
		'section'     => 'checkbox_section',
		'default'     => true,
	)
);

/**
 * Color Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_hex',
		'label'       => __( 'Color Control (hex-only)', 'education-zone-pro' ),
		'description' => esc_attr__( 'This is a color control - without alpha channel.', 'education-zone-pro' ),
		'section'     => 'color_section',
		'default'     => '#0008DC',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_rgba',
		'label'       => __( 'Color Control (with alpha channel)', 'education-zone-pro' ),
		'description' => esc_attr__( 'This is a color control - with alpha channel.', 'education-zone-pro' ),
		'section'     => 'color_section',
		'default'     => '#0088CC',
		'choices'     => array(
			'alpha' => true,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_hue',
		'label'       => __( 'Color Control - hue only.', 'education-zone-pro' ),
		'description' => esc_attr__( 'This is a color control - hue only.', 'education-zone-pro' ),
		'section'     => 'color_section',
		'default'     => 160,
		'mode'        => 'hue',
	)
);

/**
 * DateTime Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'date',
		'settings'    => 'date_setting',
		'label'       => esc_attr__( 'Date Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'This is a date control.', 'education-zone-pro' ),
		'section'     => 'date_section',
		'default'     => '',
	)
);

/**
 * Editor Controls
 */
my_config_kirki_add_field(
	array(
		'type'        => 'editor',
		'settings'    => 'editor_1',
		'label'       => esc_attr__( 'First Editor Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'This is an editor control.', 'education-zone-pro' ),
		'section'     => 'editor_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'editor',
		'settings'    => 'editor_2',
		'label'       => esc_attr__( 'Second Editor Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'This is a 2nd editor control just to check that we do not have issues with multiple instances.', 'education-zone-pro' ),
		'section'     => 'editor_section',
		'default'     => esc_attr__( 'Default Text', 'education-zone-pro' ),
	)
);

/**
 * Color-Palette Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color-palette.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_0',
		'label'       => esc_attr__( 'Color-Palette', 'education-zone-pro' ),
		'description' => esc_attr__( 'This is a color-palette control', 'education-zone-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#888888',
		'choices'     => array(
			'colors' => array( '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ),
			'style'  => 'round',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_4',
		'label'       => esc_attr__( 'Color-Palette', 'education-zone-pro' ),
		'description' => esc_attr__( 'Material Design Colors - all', 'education-zone-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#F44336',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'all' ),
			'size'   => 17,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_1',
		'label'       => esc_attr__( 'Color-Palette', 'education-zone-pro' ),
		'description' => esc_attr__( 'Material Design Colors - primary', 'education-zone-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#000000',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'primary' ),
			'size'   => 25,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_2',
		'label'       => esc_attr__( 'Color-Palette', 'education-zone-pro' ),
		'description' => esc_attr__( 'Material Design Colors - red', 'education-zone-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF1744',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'red' ),
			'size'   => 16,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_3',
		'label'       => esc_attr__( 'Color-Palette', 'education-zone-pro' ),
		'description' => esc_attr__( 'Material Design Colors - A100', 'education-zone-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF80AB',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'A100' ),
			'size'   => 60,
			'style'  => 'round',
		),
	)
);

/**
 * Dashicons control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/dashicons.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dashicons',
		'settings'    => 'dashicons_setting_0',
		'label'       => esc_attr__( 'Dashicons Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Using a custom array of dashicons', 'education-zone-pro' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
		'choices'     => array(
			'menu',
			'admin-site',
			'dashboard',
			'admin-post',
			'admin-media',
			'admin-links',
			'admin-page',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'dashicons',
		'settings'    => 'dashicons_setting_1',
		'label'       => esc_attr__( 'All Dashicons', 'education-zone-pro' ),
		'description' => esc_attr__( 'Showing all dashicons', 'education-zone-pro' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
	)
);

/**
 * Dimension Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dimension',
		'settings'    => 'dimension_0',
		'label'       => esc_attr__( 'Dimension Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description Here.', 'education-zone-pro' ),
		'section'     => 'dimension_section',
		'default'     => '10px',
	)
);

/**
 * Dimensions Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'dimensions_0',
		'label'       => esc_attr__( 'Dimension Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description Here.', 'education-zone-pro' ),
		'section'     => 'dimensions_section',
		'default'     => array(
			'width'  => '100px',
			'height' => '100px',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'dimensions_1',
		'label'       => esc_attr__( 'Dimension Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description Here.', 'education-zone-pro' ),
		'section'     => 'dimensions_section',
		'default'     => array(
			'padding-top'    => '1em',
			'padding-bottom' => '10rem',
			'padding-left'   => '1vh',
			'padding-right'  => '10px',
		),
	)
);

/**
 * Font-Awesome Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'fontawesome',
		'settings'    => 'fontawesome_setting',
		'label'       => esc_attr__( 'Font Awesome Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description Here.', 'education-zone-pro' ),
		'section'     => 'fontawesome_section',
		'default'     => 'bath',
	)
);

/**
 * Generic Controls.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'generic_text_setting',
		'label'       => esc_attr__( 'Text Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description', 'education-zone-pro' ),
		'section'     => 'generic_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'textarea',
		'settings'    => 'generic_textarea_setting',
		'label'       => esc_attr__( 'Textarea Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description', 'education-zone-pro' ),
		'section'     => 'generic_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'generic',
		'settings'    => 'generic_custom_setting',
		'label'       => esc_attr__( 'Custom input Control.', 'education-zone-pro' ),
		'description' => esc_attr__( 'The "generic" control allows you to add any input type you want. In this case we use type="password" and define custom styles.', 'education-zone-pro' ),
		'section'     => 'generic_section',
		'default'     => '',
		'choices'     => array(
			'element'  => 'input',
			'type'     => 'password',
			'style'    => 'background-color:black;color:red;',
			'data-foo' => 'bar',
		),
	)
);

/**
 * Image Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_url',
		'label'       => esc_attr__( 'Image Control (URL)', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description Here.', 'education-zone-pro' ),
		'section'     => 'image_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_id',
		'label'       => esc_attr__( 'Image Control (ID)', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description Here.', 'education-zone-pro' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => array(
			'save_as' => 'id',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_array',
		'label'       => esc_attr__( 'Image Control (array)', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description Here.', 'education-zone-pro' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => array(
			'save_as' => 'array',
		),
	)
);

/**
 * Multicheck Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'multicheck',
		'settings'    => 'multicheck_setting',
		'label'       => esc_attr__( 'Multickeck Control', 'education-zone-pro' ),
		'section'     => 'multicheck_section',
		'default'     => array( 'option-1', 'option-3', 'option-4' ),
		'priority'    => 10,
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'education-zone-pro' ),
			'option-2' => esc_attr__( 'Option 2', 'education-zone-pro' ),
			'option-3' => esc_attr__( 'Option 3', 'education-zone-pro' ),
			'option-4' => esc_attr__( 'Option 4', 'education-zone-pro' ),
			'option-5' => esc_attr__( 'Option 5', 'education-zone-pro' ),
		),
	)
);

/**
 * Multicolor Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'multicolor',
		'settings'    => 'multicolor_setting',
		'label'       => esc_attr__( 'Label', 'education-zone-pro' ),
		'section'     => 'multicolor_section',
		'priority'    => 10,
		'choices'     => array(
			'link'    => esc_attr__( 'Color', 'education-zone-pro' ),
			'hover'   => esc_attr__( 'Hover', 'education-zone-pro' ),
			'active'  => esc_attr__( 'Active', 'education-zone-pro' ),
		),
		'default'     => array(
			'link'    => '#0088cc',
			'hover'   => '#00aaff',
			'active'  => '#00ffff',
		),
	)
);

/**
 * Number Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'number',
		'settings'    => 'number_setting',
		'label'       => esc_attr__( 'Label', 'education-zone-pro' ),
		'section'     => 'number_section',
		'priority'    => 10,
		'choices'     => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1,
		),
	)
);

/**
 * Palette Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'palette',
		'settings'    => 'palette_setting',
		'label'       => esc_attr__( 'Label', 'education-zone-pro' ),
		'section'     => 'palette_section',
		'default'     => 'blue',
		'choices'     => array(
			'a200'  => Kirki_Helper::get_material_design_colors( 'A200' ),
			'blue'  => Kirki_Helper::get_material_design_colors( 'blue' ),
			'green' => array( '#E8F5E9', '#C8E6C9', '#A5D6A7', '#81C784', '#66BB6A', '#4CAF50', '#43A047', '#388E3C', '#2E7D32', '#1B5E20', '#B9F6CA', '#69F0AE', '#00E676', '#00C853' ),
			'bnw'   => array( '#000000', '#ffffff' ),
		),
	)
);

/**
 * Radio Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio',
		'settings'    => 'radio_setting',
		'label'       => esc_attr__( 'Radio Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'The description here.', 'education-zone-pro' ),
		'section'     => 'radio_section',
		'default'     => 'option-3',
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'education-zone-pro' ),
			'option-2' => esc_attr__( 'Option 2', 'education-zone-pro' ),
			'option-3' => esc_attr__( 'Option 3', 'education-zone-pro' ),
			'option-4' => esc_attr__( 'Option 4', 'education-zone-pro' ),
			'option-5' => esc_attr__( 'Option 5', 'education-zone-pro' ),
		),
	)
);

/**
 * Radio-Buttonset Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'radio_buttonset_setting',
		'label'       => esc_attr__( 'Radio-Buttonset Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'The description here.', 'education-zone-pro' ),
		'section'     => 'radio_buttonset_section',
		'default'     => 'option-2',
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'education-zone-pro' ),
			'option-2' => esc_attr__( 'Option 2', 'education-zone-pro' ),
			'option-3' => esc_attr__( 'Option 3', 'education-zone-pro' ),
		),
	)
);

/**
 * Radio-Image Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio-image',
		'settings'    => 'radio_image_setting',
		'label'       => esc_attr__( 'Radio-Image Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'The description here.', 'education-zone-pro' ),
		'section'     => 'radio_image_section',
		'default'     => 'travel',
		'choices'     => array(
			'moto'    => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-moto.png',
			'cossack' => 'https://raw.githubusercontent.com/templatemonster/cossack-wapuula/master/cossack-wapuula.png',
			'travel'  => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-travel.png',
		),
	)
);

/**
 * Select Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'select',
		'settings'    => 'select_setting',
		'label'       => esc_attr__( 'Select Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'The description here.', 'education-zone-pro' ),
		'section'     => 'select_section',
		'default'     => 'option-3',
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'education-zone-pro' ),
			'option-2' => esc_attr__( 'Option 2', 'education-zone-pro' ),
			'option-3' => esc_attr__( 'Option 3', 'education-zone-pro' ),
			'option-4' => esc_attr__( 'Option 4', 'education-zone-pro' ),
			'option-5' => esc_attr__( 'Option 5', 'education-zone-pro' ),
		),
	)
);

/**
 * Slider Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'slider',
		'settings'    => 'slider_setting',
		'label'       => esc_attr__( 'Slider Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'The description here.', 'education-zone-pro' ),
		'section'     => 'slider_section',
		'default'     => '10',
		'choices'     => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
			'suffix' => 'px',
		),
	)
);

/**
 * Sortable control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'sortable',
		'settings'    => 'sortable_setting',
		'label'       => __( 'This is a sortable control.', 'education-zone-pro' ),
		'section'     => 'sortable_section',
		'default'     => array( 'option3', 'option1', 'option4' ),
		'choices'     => array(
			'option1' => esc_attr__( 'Option 1', 'education-zone-pro' ),
			'option2' => esc_attr__( 'Option 2', 'education-zone-pro' ),
			'option3' => esc_attr__( 'Option 3', 'education-zone-pro' ),
			'option4' => esc_attr__( 'Option 4', 'education-zone-pro' ),
			'option5' => esc_attr__( 'Option 5', 'education-zone-pro' ),
			'option6' => esc_attr__( 'Option 6', 'education-zone-pro' ),
		),
	)
);

/**
 * Switch control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_setting',
		'label'       => esc_attr__( 'Switch Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description', 'education-zone-pro' ),
		'section'     => 'switch_section',
		'default'     => true,
	)
);

/**
 * Toggle control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'toggle',
		'settings'    => 'toggle_setting',
		'label'       => esc_attr__( 'Toggle Control', 'education-zone-pro' ),
		'description' => esc_attr__( 'Description', 'education-zone-pro' ),
		'section'     => 'toggle_section',
		'default'     => true,
	)
);

/**
 * Typography Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'typography_setting_0',
		'label'       => esc_attr__( 'Typography Control Label', 'education-zone-pro' ),
		'description' => esc_attr__( 'The full set of options.', 'education-zone-pro' ),
		'section'     => 'typography_section',
		'default'     => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '14px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#333333',
			'text-transform' => 'none',
			'text-align'     => 'left',
		),
		'priority'    => 10,
	)
);