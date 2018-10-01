<?php

/**
 * Customizer Typography Control
 *
 * Taken from Kirki.
 *
 * @package   theme-slug
 * @copyright Copyright (c) 2016, Nose Graze Ltd.
 * @license   GPL2+
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

class Rara_Typography_Control extends WP_Customize_Control {

	public $tooltip = '';
	public $js_vars = array();
	public $output = array();
	public $option_type = 'theme_mod';
	public $type = 'rara-typography';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		} else {
			$this->json['default'] = $this->setting->default;
		}
		$this->json['js_vars'] = $this->js_vars;
		$this->json['output']  = $this->output;
		$this->json['value']   = $this->value();
		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();
		$this->json['tooltip'] = $this->tooltip;
		$this->json['id']      = $this->id;
		$this->json['l10n']    = apply_filters( 'rara-typography-control/il8n/strings', array(
			'on'                 => esc_attr__( 'ON', 'education-zone-pro' ),
			'off'                => esc_attr__( 'OFF', 'education-zone-pro' ),
			'all'                => esc_attr__( 'All', 'education-zone-pro' ),
			'cyrillic'           => esc_attr__( 'Cyrillic', 'education-zone-pro' ),
			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'education-zone-pro' ),
			'devanagari'         => esc_attr__( 'Devanagari', 'education-zone-pro' ),
			'greek'              => esc_attr__( 'Greek', 'education-zone-pro' ),
			'greek-ext'          => esc_attr__( 'Greek Extended', 'education-zone-pro' ),
			'khmer'              => esc_attr__( 'Khmer', 'education-zone-pro' ),
			'latin'              => esc_attr__( 'Latin', 'education-zone-pro' ),
			'latin-ext'          => esc_attr__( 'Latin Extended', 'education-zone-pro' ),
			'vietnamese'         => esc_attr__( 'Vietnamese', 'education-zone-pro' ),
			'hebrew'             => esc_attr__( 'Hebrew', 'education-zone-pro' ),
			'arabic'             => esc_attr__( 'Arabic', 'education-zone-pro' ),
			'bengali'            => esc_attr__( 'Bengali', 'education-zone-pro' ),
			'gujarati'           => esc_attr__( 'Gujarati', 'education-zone-pro' ),
			'tamil'              => esc_attr__( 'Tamil', 'education-zone-pro' ),
			'telugu'             => esc_attr__( 'Telugu', 'education-zone-pro' ),
			'thai'               => esc_attr__( 'Thai', 'education-zone-pro' ),
			'serif'              => _x( 'Serif', 'font style', 'education-zone-pro' ),
			'sans-serif'         => _x( 'Sans Serif', 'font style', 'education-zone-pro' ),
			'monospace'          => _x( 'Monospace', 'font style', 'education-zone-pro' ),
			'font-family'        => esc_attr__( 'Font Family', 'education-zone-pro' ),
			'font-size'          => esc_attr__( 'Font Size', 'education-zone-pro' ),
			'font-weight'        => esc_attr__( 'Font Weight', 'education-zone-pro' ),
			'line-height'        => esc_attr__( 'Line Height', 'education-zone-pro' ),
			'font-style'         => esc_attr__( 'Font Style', 'education-zone-pro' ),
			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'education-zone-pro' ),
			'text-align'         => esc_attr__( 'Text Align', 'education-zone-pro' ),
			'text-transform'     => esc_attr__( 'Text Transform', 'education-zone-pro' ),
			'none'               => esc_attr__( 'None', 'education-zone-pro' ),
			'uppercase'          => esc_attr__( 'Uppercase', 'education-zone-pro' ),
			'lowercase'          => esc_attr__( 'Lowercase', 'education-zone-pro' ),
			'top'                => esc_attr__( 'Top', 'education-zone-pro' ),
			'bottom'             => esc_attr__( 'Bottom', 'education-zone-pro' ),
			'left'               => esc_attr__( 'Left', 'education-zone-pro' ),
			'right'              => esc_attr__( 'Right', 'education-zone-pro' ),
			'center'             => esc_attr__( 'Center', 'education-zone-pro' ),
			'justify'            => esc_attr__( 'Justify', 'education-zone-pro' ),
			'color'              => esc_attr__( 'Color', 'education-zone-pro' ),
			'select-font-family' => esc_attr__( 'Select a font-family', 'education-zone-pro' ),
			'variant'            => esc_attr__( 'Variant', 'education-zone-pro' ),
			'style'              => esc_attr__( 'Style', 'education-zone-pro' ),
			'size'               => esc_attr__( 'Size', 'education-zone-pro' ),
			'height'             => esc_attr__( 'Height', 'education-zone-pro' ),
			'spacing'            => esc_attr__( 'Spacing', 'education-zone-pro' ),
			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'education-zone-pro' ),
			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'education-zone-pro' ),
			'light'              => esc_attr__( 'Light 200', 'education-zone-pro' ),
			'light-italic'       => esc_attr__( 'Light 200 Italic', 'education-zone-pro' ),
			'book'               => esc_attr__( 'Book 300', 'education-zone-pro' ),
			'book-italic'        => esc_attr__( 'Book 300 Italic', 'education-zone-pro' ),
			'regular'            => esc_attr__( 'Normal 400', 'education-zone-pro' ),
			'italic'             => esc_attr__( 'Normal 400 Italic', 'education-zone-pro' ),
			'medium'             => esc_attr__( 'Medium 500', 'education-zone-pro' ),
			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'education-zone-pro' ),
			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'education-zone-pro' ),
			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'education-zone-pro' ),
			'bold'               => esc_attr__( 'Bold 700', 'education-zone-pro' ),
			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'education-zone-pro' ),
			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'education-zone-pro' ),
			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'education-zone-pro' ),
			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'education-zone-pro' ),
			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'education-zone-pro' ),
			'invalid-value'      => esc_attr__( 'Invalid Value', 'education-zone-pro' ),
		) );

		$defaults = array( 'font-family'=> false );

		$this->json['default'] = wp_parse_args( $this->json['default'], $defaults );
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_style( 'rara-typography-css', get_template_directory_uri() . '/inc/custom-controls/typography/typography.css', null );
        /*
		 * JavaScript
		 */
        wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tooltip' );
		wp_enqueue_script( 'jquery-stepper-min-js' );
		
		// Selectize
		wp_enqueue_script( 'selectize', get_template_directory_uri() . '/inc/custom-controls/select/selectize.js', array( 'jquery' ), false, true );

		// Typography
		wp_enqueue_script( 'rara-typography-control', get_template_directory_uri() . '/inc/custom-controls/typography/typography.js', array(
			'jquery',
			'selectize'
		), false, true );

		$google_fonts   = Rara_Fonts::get_google_fonts();
		$standard_fonts = Rara_Fonts::get_standard_fonts();
		$all_variants   = Rara_Fonts::get_all_variants();

		$standard_fonts_final = array();
		foreach ( $standard_fonts as $key => $value ) {
			$standard_fonts_final[] = array(
				'family'      => $value['stack'],
				'label'       => $value['label'],
				'is_standard' => true,
				'variants'    => array(
					array(
						'id'    => 'regular',
						'label' => $all_variants['regular'],
					),
					array(
						'id'    => 'italic',
						'label' => $all_variants['italic'],
					),
					array(
						'id'    => '700',
						'label' => $all_variants['700'],
					),
					array(
						'id'    => '700italic',
						'label' => $all_variants['700italic'],
					),
				),
			);
		}

		$google_fonts_final = array();

		if ( is_array( $google_fonts ) ) {
			foreach ( $google_fonts as $family => $args ) {
				$label    = ( isset( $args['label'] ) ) ? $args['label'] : $family;
				$variants = ( isset( $args['variants'] ) ) ? $args['variants'] : array( 'regular', '700' );

				$available_variants = array();
				foreach ( $variants as $variant ) {
					if ( array_key_exists( $variant, $all_variants ) ) {
						$available_variants[] = array( 'id' => $variant, 'label' => $all_variants[ $variant ] );
					}
				}

				$google_fonts_final[] = array(
					'family'   => $family,
					'label'    => $label,
					'variants' => $available_variants
				);
			}
		}

		$final = array_merge( $standard_fonts_final, $google_fonts_final );
		wp_localize_script( 'rara-typography-control', 'RaraAllFonts', $final );
	}

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
	 *
	 * Supports basic input types `text`, `checkbox`, `textarea`, `radio`, `select` and `dropdown-pages`.
	 * Additional input types such as `email`, `url`, `number`, `hidden` and `date` are supported implicitly.
	 *
	 * Control content can alternately be rendered in JS. See {@see WP_Customize_Control::print_template()}.
	 *
	 * @access public
	 * @return void
	 */
	public function render_content() {

		// intentionally empty
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * I put this in a separate file because PhpStorm didn't like it and it fucked with my formatting.
	 *
	 * @see    WP_Customize_Control::print_template()
	 *
	 * @access protected
	 * @return void
	 */
	protected function content_template() { ?>
		<# if ( data.tooltip ) { #>
            <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
        <# } #>
        
        <label class="customizer-text">
            <# if ( data.label ) { #>
                <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>
            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
        </label>
        
        <div class="wrapper">
            <# if ( data.default['font-family'] ) { #>
                <# if ( '' == data.value['font-family'] ) { data.value['font-family'] = data.default['font-family']; } #>
                <# if ( data.choices['fonts'] ) { data.fonts = data.choices['fonts']; } #>
                <div class="font-family">
                    <h5>{{ data.l10n['font-family'] }}</h5>
                    <select id="rara-typography-font-family-{{{ data.id }}}" placeholder="{{ data.l10n['select-font-family'] }}"></select>
                </div>
                <div class="variant rara-variant-wrapper">
                    <h5>{{ data.l10n['style'] }}</h5>
                    <select class="variant" id="rara-typography-variant-{{{ data.id }}}"></select>
                </div>
            <# } #>   
            
        </div>
        <?php
	}

}