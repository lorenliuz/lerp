<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Class Vc_ParamAnimation
 *
 * For working with animations
 * array(
 *        'type' => 'animation_style',
 *        'heading' => __( 'Animation', 'page_builder' ),
 *        'param_name' => 'animation',
 * ),
 * Preview in http://daneden.github.io/animate.css/
 * @since 4.4
 */
class Vc_ParamAnimation {
	/**
	 * @since 4.4
	 * @var array $settings parameter settings from vc_map
	 */
	protected $settings;
	/**
	 * @since 4.4
	 * @var string $value parameter value
	 */
	protected $value;

	/**
	 * Define available animation effects
	 * @since 4.4
	 * vc_filter: vc_param_animation_style_list - to override animation styles
	 *     array
	 * @return array
	 */
	protected function animationStyles() {
		$styles = array(
			array(
				'values' => array(
					__( 'None', 'page_builder' ) => 'none',
				),
			),
			array(
				'label' => __( 'Attention Seekers', 'page_builder' ),
				'values' => array(
					// text to display => value
					__( 'bounce', 'page_builder' ) => array(
						'value' => 'bounce',
						'type' => 'other',
					),
					__( 'flash', 'page_builder' ) => array(
						'value' => 'flash',
						'type' => 'other',
					),
					__( 'pulse', 'page_builder' ) => array(
						'value' => 'pulse',
						'type' => 'other',
					),
					__( 'rubberBand', 'page_builder' ) => array(
						'value' => 'rubberBand',
						'type' => 'other',
					),
					__( 'shake', 'page_builder' ) => array(
						'value' => 'shake',
						'type' => 'other',
					),
					__( 'swing', 'page_builder' ) => array(
						'value' => 'swing',
						'type' => 'other',
					),
					__( 'tada', 'page_builder' ) => array(
						'value' => 'tada',
						'type' => 'other',
					),
					__( 'wobble', 'page_builder' ) => array(
						'value' => 'wobble',
						'type' => 'other',
					),
				),
			),
			array(
				'label' => __( 'Bouncing Entrances', 'page_builder' ),
				'values' => array(
					// text to display => value
					__( 'bounceIn', 'page_builder' ) => array(
						'value' => 'bounceIn',
						'type' => 'in',
					),
					__( 'bounceInDown', 'page_builder' ) => array(
						'value' => 'bounceInDown',
						'type' => 'in',
					),
					__( 'bounceInLeft', 'page_builder' ) => array(
						'value' => 'bounceInLeft',
						'type' => 'in',
					),
					__( 'bounceInRight', 'page_builder' ) => array(
						'value' => 'bounceInRight',
						'type' => 'in',
					),
					__( 'bounceInUp', 'page_builder' ) => array(
						'value' => 'bounceInUp',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Bouncing Exits', 'page_builder' ),
				'values' => array(
					// text to display => value
					__( 'bounceOut', 'page_builder' ) => array(
						'value' => 'bounceOut',
						'type' => 'out',
					),
					__( 'bounceOutDown', 'page_builder' ) => array(
						'value' => 'bounceOutDown',
						'type' => 'out',
					),
					__( 'bounceOutLeft', 'page_builder' ) => array(
						'value' => 'bounceOutLeft',
						'type' => 'out',
					),
					__( 'bounceOutRight', 'page_builder' ) => array(
						'value' => 'bounceOutRight',
						'type' => 'out',
					),
					__( 'bounceOutUp', 'page_builder' ) => array(
						'value' => 'bounceOutUp',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Fading Entrances', 'page_builder' ),
				'values' => array(
					// text to display => value
					__( 'fadeIn', 'page_builder' ) => array(
						'value' => 'fadeIn',
						'type' => 'in',
					),
					__( 'fadeInDown', 'page_builder' ) => array(
						'value' => 'fadeInDown',
						'type' => 'in',
					),
					__( 'fadeInDownBig', 'page_builder' ) => array(
						'value' => 'fadeInDownBig',
						'type' => 'in',
					),
					__( 'fadeInLeft', 'page_builder' ) => array(
						'value' => 'fadeInLeft',
						'type' => 'in',
					),
					__( 'fadeInLeftBig', 'page_builder' ) => array(
						'value' => 'fadeInLeftBig',
						'type' => 'in',
					),
					__( 'fadeInRight', 'page_builder' ) => array(
						'value' => 'fadeInRight',
						'type' => 'in',
					),
					__( 'fadeInRightBig', 'page_builder' ) => array(
						'value' => 'fadeInRightBig',
						'type' => 'in',
					),
					__( 'fadeInUp', 'page_builder' ) => array(
						'value' => 'fadeInUp',
						'type' => 'in',
					),
					__( 'fadeInUpBig', 'page_builder' ) => array(
						'value' => 'fadeInUpBig',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Fading Exits', 'page_builder' ),
				'values' => array(
					__( 'fadeOut', 'page_builder' ) => array(
						'value' => 'fadeOut',
						'type' => 'out',
					),
					__( 'fadeOutDown', 'page_builder' ) => array(
						'value' => 'fadeOutDown',
						'type' => 'out',
					),
					__( 'fadeOutDownBig', 'page_builder' ) => array(
						'value' => 'fadeOutDownBig',
						'type' => 'out',
					),
					__( 'fadeOutLeft', 'page_builder' ) => array(
						'value' => 'fadeOutLeft',
						'type' => 'out',
					),
					__( 'fadeOutLeftBig', 'page_builder' ) => array(
						'value' => 'fadeOutLeftBig',
						'type' => 'out',
					),
					__( 'fadeOutRight', 'page_builder' ) => array(
						'value' => 'fadeOutRight',
						'type' => 'out',
					),
					__( 'fadeOutRightBig', 'page_builder' ) => array(
						'value' => 'fadeOutRightBig',
						'type' => 'out',
					),
					__( 'fadeOutUp', 'page_builder' ) => array(
						'value' => 'fadeOutUp',
						'type' => 'out',
					),
					__( 'fadeOutUpBig', 'page_builder' ) => array(
						'value' => 'fadeOutUpBig',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Flippers', 'page_builder' ),
				'values' => array(
					__( 'flip', 'page_builder' ) => array(
						'value' => 'flip',
						'type' => 'other',
					),
					__( 'flipInX', 'page_builder' ) => array(
						'value' => 'flipInX',
						'type' => 'in',
					),
					__( 'flipInY', 'page_builder' ) => array(
						'value' => 'flipInY',
						'type' => 'in',
					),
					__( 'flipOutX', 'page_builder' ) => array(
						'value' => 'flipOutX',
						'type' => 'out',
					),
					__( 'flipOutY', 'page_builder' ) => array(
						'value' => 'flipOutY',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Lightspeed', 'page_builder' ),
				'values' => array(
					__( 'lightSpeedIn', 'page_builder' ) => array(
						'value' => 'lightSpeedIn',
						'type' => 'in',
					),
					__( 'lightSpeedOut', 'page_builder' ) => array(
						'value' => 'lightSpeedOut',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Rotating Entrances', 'page_builder' ),
				'values' => array(
					__( 'rotateIn', 'page_builder' ) => array(
						'value' => 'rotateIn',
						'type' => 'in',
					),
					__( 'rotateInDownLeft', 'page_builder' ) => array(
						'value' => 'rotateInDownLeft',
						'type' => 'in',
					),
					__( 'rotateInDownRight', 'page_builder' ) => array(
						'value' => 'rotateInDownRight',
						'type' => 'in',
					),
					__( 'rotateInUpLeft', 'page_builder' ) => array(
						'value' => 'rotateInUpLeft',
						'type' => 'in',
					),
					__( 'rotateInUpRight', 'page_builder' ) => array(
						'value' => 'rotateInUpRight',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Rotating Exits', 'page_builder' ),
				'values' => array(
					__( 'rotateOut', 'page_builder' ) => array(
						'value' => 'rotateOut',
						'type' => 'out',
					),
					__( 'rotateOutDownLeft', 'page_builder' ) => array(
						'value' => 'rotateOutDownLeft',
						'type' => 'out',
					),
					__( 'rotateOutDownRight', 'page_builder' ) => array(
						'value' => 'rotateOutDownRight',
						'type' => 'out',
					),
					__( 'rotateOutUpLeft', 'page_builder' ) => array(
						'value' => 'rotateOutUpLeft',
						'type' => 'out',
					),
					__( 'rotateOutUpRight', 'page_builder' ) => array(
						'value' => 'rotateOutUpRight',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Specials', 'page_builder' ),
				'values' => array(
					__( 'hinge', 'page_builder' ) => array(
						'value' => 'hinge',
						'type' => 'out',
					),
					__( 'rollIn', 'page_builder' ) => array(
						'value' => 'rollIn',
						'type' => 'in',
					),
					__( 'rollOut', 'page_builder' ) => array(
						'value' => 'rollOut',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Zoom Entrances', 'page_builder' ),
				'values' => array(
					__( 'zoomIn', 'page_builder' ) => array(
						'value' => 'zoomIn',
						'type' => 'in',
					),
					__( 'zoomInDown', 'page_builder' ) => array(
						'value' => 'zoomInDown',
						'type' => 'in',
					),
					__( 'zoomInLeft', 'page_builder' ) => array(
						'value' => 'zoomInLeft',
						'type' => 'in',
					),
					__( 'zoomInRight', 'page_builder' ) => array(
						'value' => 'zoomInRight',
						'type' => 'in',
					),
					__( 'zoomInUp', 'page_builder' ) => array(
						'value' => 'zoomInUp',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Zoom Exits', 'page_builder' ),
				'values' => array(
					__( 'zoomOut', 'page_builder' ) => array(
						'value' => 'zoomOut',
						'type' => 'out',
					),
					__( 'zoomOutDown', 'page_builder' ) => array(
						'value' => 'zoomOutDown',
						'type' => 'out',
					),
					__( 'zoomOutLeft', 'page_builder' ) => array(
						'value' => 'zoomOutLeft',
						'type' => 'out',
					),
					__( 'zoomOutRight', 'page_builder' ) => array(
						'value' => 'zoomOutRight',
						'type' => 'out',
					),
					__( 'zoomOutUp', 'page_builder' ) => array(
						'value' => 'zoomOutUp',
						'type' => 'out',
					),
				),
			),
			array(
				'label' => __( 'Slide Entrances', 'page_builder' ),
				'values' => array(
					__( 'slideInDown', 'page_builder' ) => array(
						'value' => 'slideInDown',
						'type' => 'in',
					),
					__( 'slideInLeft', 'page_builder' ) => array(
						'value' => 'slideInLeft',
						'type' => 'in',
					),
					__( 'slideInRight', 'page_builder' ) => array(
						'value' => 'slideInRight',
						'type' => 'in',
					),
					__( 'slideInUp', 'page_builder' ) => array(
						'value' => 'slideInUp',
						'type' => 'in',
					),
				),
			),
			array(
				'label' => __( 'Slide Exits', 'page_builder' ),
				'values' => array(
					__( 'slideOutDown', 'page_builder' ) => array(
						'value' => 'slideOutDown',
						'type' => 'out',
					),
					__( 'slideOutLeft', 'page_builder' ) => array(
						'value' => 'slideOutLeft',
						'type' => 'out',
					),
					__( 'slideOutRight', 'page_builder' ) => array(
						'value' => 'slideOutRight',
						'type' => 'out',
					),
					__( 'slideOutUp', 'page_builder' ) => array(
						'value' => 'slideOutUp',
						'type' => 'out',
					),
				),
			),
		);

		/**
		 * Used to override animation style list
		 * @since 4.4
		 */

		return apply_filters( 'vc_param_animation_style_list', $styles );
	}

	/**
	 * @param array $styles - array of styles to group
	 * @param string|array $type - what type to return
	 *
	 * @since 4.4
	 * @return array
	 */
	public function groupStyleByType( $styles, $type ) {
		$grouped = array();
		foreach ( $styles as $group ) {
			$inner_group = array( 'values' => array() );
			if ( isset( $group['label'] ) ) {
				$inner_group['label'] = $group['label'];
			}
			foreach ( $group['values'] as $key => $value ) {
				if ( ( is_array( $value ) && isset( $value['type'] ) && ( ( is_string( $type ) && $value['type'] == $type ) || is_array( $type ) && in_array( $value['type'], $type ) ) ) || ! is_array( $value ) || ! isset( $value['type'] ) ) {
					$inner_group['values'][ $key ] = $value;
				}
			}
			if ( ! empty( $inner_group['values'] ) ) {
				$grouped[] = $inner_group;
			}
		}

		return $grouped;
	}

	/**
	 * Set variables and register animate-css asset
	 * @since 4.4
	 *
	 * @param $settings
	 * @param $value
	 */
	public function __construct( $settings, $value ) {
		$this->settings = $settings;
		$this->value = $value;
		wp_register_style( 'animate-css', vc_asset_url( 'lib/bower/animate-css/animate.min.css' ), array(), WPB_VC_VERSION );
	}

	/**
	 * Render edit form output
	 * @since 4.4
	 * @return string
	 */
	public function render() {
		$output = '<div class="vc_row">';
		wp_enqueue_style( 'animate-css' );

		$styles = $this->animationStyles();
		if ( isset( $this->settings['settings']['type'] ) ) {
			$styles = $this->groupStyleByType( $styles, $this->settings['settings']['type'] );
		}
		if ( isset( $this->settings['settings']['custom'] ) && is_array( $this->settings['settings']['custom'] ) ) {
			$styles = array_merge( $styles, $this->settings['settings']['custom'] );
		}

		if ( is_array( $styles ) && ! empty( $styles ) ) {
			$left_side = '<div class="vc_col-sm-6">';
			$build_style_select = "\n" . '<select class="vc_param-animation-style">' . "\n";
			foreach ( $styles as $style ) {
				$build_style_select .= "\t\t" . '<optgroup ' . ( isset( $style['label'] ) ? 'label="' . $style['label'] . '"' : '' ) . '>' . "\n";
				if ( is_array( $style['values'] ) && ! empty( $style['values'] ) ) {
					foreach ( $style['values'] as $key => $value ) {
						$build_style_select .= "\t\t\t" . '<option value="' . ( is_array( $value ) ? $value['value'] : $value ) . '">' . $key . '</option>' . "\n";
					}
				}
				$build_style_select .= "\t\t" . '</optgroup>' . "\n";
			}
			$build_style_select .= '</select>' . "\n";
			$left_side .= $build_style_select;
			$left_side .= '</div>'; // Close left_side div
			$output .= $left_side;

			$right_side = '<div class="vc_col-sm-6">';
			$right_side .= '<div class="vc_param-animation-style-preview"><button class="vc_btn vc_btn-grey vc_btn-sm vc_param-animation-style-trigger">' . __( 'Animate it', 'page_builder' ) . '</button></div>';
			$right_side .= '</div>'; // Close right_side div
			$output .= $right_side;
		}

		$output .= '</div>'; // Close Row
		$output .= '<input name="' . $this->settings['param_name'] . '" class="wpb_vc_param_value  ' . $this->settings['param_name'] . ' ' . $this->settings['type'] . '_field" type="hidden" value="' . $this->value . '" ' . ' />';

		return $output;
	}
}

/**
 * Function for rendering param in edit form (add element)
 * Parse settings from vc_map and entered 'values'.
 *
 * @param array $settings - parameter settings in vc_map
 * @param string $value - parameter value
 * @param string $tag - shortcode tag
 *
 * vc_filter: vc_animation_style_render_filter - filter to override editor form
 *     field output
 *
 * @since 4.4
 * @return mixed|void rendered template for params in edit form
 *
 */
function vc_animation_style_form_field( $settings, $value, $tag ) {

	$field = new Vc_ParamAnimation( $settings, $value, $tag );

	/**
	 * Filter used to override full output of edit form field animation style
	 * @since 4.4
	 */

	return apply_filters( 'vc_animation_style_render_filter', $field->render(), $settings, $value, $tag );
}

