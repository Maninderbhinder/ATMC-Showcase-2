<?php
/**
 * Customizer Control: dimensions.
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       2.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dimensions control.
 * multiple fields with CSS units validation.
 */
class Kirki_Control_Dimensions extends Kirki_Control_Base {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-dimensions';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		if ( is_array( $this->choices ) ) {
			foreach ( $this->choices as $choice => $value ) {
				if ( 'labels' !== $choice && true === $value ) {
					$this->json['choices'][ $choice ] = true;
				}
			}
		}
		if ( is_array( $this->json['default'] ) ) {
			foreach ( $this->json['default'] as $key => $value ) {
				if ( isset( $this->json['choices'][ $key ] ) && ! isset( $this->json['value'][ $key ] ) ) {
					$this->json['value'][ $key ] = $value;
				}
			}
		}
	}

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		wp_enqueue_style( 'kirki-styles', trailingslashit( Kirki::$url ) . 'controls/css/styles.css', array(), KIRKI_VERSION );
		wp_localize_script( 'kirki-script', 'dimensionskirkiL10n', $this->l10n() );
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<label>
			<# if ( data.label ) { #><span class="customize-control-title">{{{ data.label }}}</span><# } #>
			<# if ( data.description ) { #><span class="description customize-control-description">{{{ data.description }}}</span><# } #>
			<div class="wrapper">
				<div class="control">
					<# for ( choiceKey in data.default ) { #>
						<div class="{{ choiceKey }}">
							<h5>
								<# if ( ! _.isUndefined( data.choices.labels ) && ! _.isUndefined( data.choices.labels[ choiceKey ] ) ) { #>
									{{ data.choices.labels[ choiceKey ] }}
								<# } else if ( ! _.isUndefined( data.l10n[ choiceKey ] ) ) { #>
									{{ data.l10n[ choiceKey ] }}
								<# } else { #>
									{{ choiceKey }}
								<# } #>
							</h5>
							<div class="{{ choiceKey }} input-wrapper">
								<# var val = ( ! _.isUndefined( data.value ) && ! _.isUndefined( data.value[ choiceKey ] ) ) ? data.value[ choiceKey ].replace( '%%', '%' ) : ''; #>
								<input {{{ data.inputAttrs }}} type="text" data-choice="{{ choiceKey }}" value="{{ val }}"/>
							</div>
						</div>
					<# } #>
				</div>
			</div>
		</label>
		<?php
	}

	/**
	 * Returns an array of translation strings.
	 *
	 * @access protected
	 * @since 3.0.0
	 * @return array
	 */
	protected function l10n() {
		return array(
			'left-top'              => esc_attr__( 'Left Top', 'education-zone-pro' ),
			'left-center'           => esc_attr__( 'Left Center', 'education-zone-pro' ),
			'left-bottom'           => esc_attr__( 'Left Bottom', 'education-zone-pro' ),
			'right-top'             => esc_attr__( 'Right Top', 'education-zone-pro' ),
			'right-center'          => esc_attr__( 'Right Center', 'education-zone-pro' ),
			'right-bottom'          => esc_attr__( 'Right Bottom', 'education-zone-pro' ),
			'center-top'            => esc_attr__( 'Center Top', 'education-zone-pro' ),
			'center-center'         => esc_attr__( 'Center Center', 'education-zone-pro' ),
			'center-bottom'         => esc_attr__( 'Center Bottom', 'education-zone-pro' ),
			'font-size'             => esc_attr__( 'Font Size', 'education-zone-pro' ),
			'font-weight'           => esc_attr__( 'Font Weight', 'education-zone-pro' ),
			'line-height'           => esc_attr__( 'Line Height', 'education-zone-pro' ),
			'font-style'            => esc_attr__( 'Font Style', 'education-zone-pro' ),
			'letter-spacing'        => esc_attr__( 'Letter Spacing', 'education-zone-pro' ),
			'word-spacing'          => esc_attr__( 'Word Spacing', 'education-zone-pro' ),
			'top'                   => esc_attr__( 'Top', 'education-zone-pro' ),
			'bottom'                => esc_attr__( 'Bottom', 'education-zone-pro' ),
			'left'                  => esc_attr__( 'Left', 'education-zone-pro' ),
			'right'                 => esc_attr__( 'Right', 'education-zone-pro' ),
			'center'                => esc_attr__( 'Center', 'education-zone-pro' ),
			'size'                  => esc_attr__( 'Size', 'education-zone-pro' ),
			'height'                => esc_attr__( 'Height', 'education-zone-pro' ),
			'spacing'               => esc_attr__( 'Spacing', 'education-zone-pro' ),
			'width'                 => esc_attr__( 'Width', 'education-zone-pro' ),
			'height'                => esc_attr__( 'Height', 'education-zone-pro' ),
			'invalid-value'         => esc_attr__( 'Invalid Value', 'education-zone-pro' ),
		);
	}
}
