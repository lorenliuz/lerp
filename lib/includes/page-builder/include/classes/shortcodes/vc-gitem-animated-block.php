<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-gitem.php' );

class WPBakeryShortCode_VC_Gitem_Animated_Block extends WPBakeryShortCode_VC_Gitem {
	protected static $animations = array();

	public function itemGrid() {
		$output = '';
		$output .= '<div class="vc_gitem-animated-block-content-controls">'
		           . '<ul class="vc_gitem-tabs vc_clearfix" data-vc-gitem-animated-block="tabs">'
		           . '</ul>'
		           . '</div>';
		$output .= ''
		           . '<div class="vc_gitem-zone-tab vc_clearfix" data-vc-gitem-animated-block="add-a"></div>'
		           . '<div class="vc_gitem-zone-tab vc_clearfix" data-vc-gitem-animated-block="add-b"></div>';

		return $output;
	}

	public function containerHtmlBlockParams( $width, $i ) {
		return 'class="vc_gitem-animated-block-content"';
	}

	public static function animations() {
		return array(
			__( 'Single block (no animation)', 'page_builder' ) => '',
			__( 'Double block (no animation)', 'page_builder' ) => 'none',
			__( 'Fade in', 'page_builder' ) => 'fadeIn',
			__( 'Scale in', 'page_builder' ) => 'scaleIn',
			__( 'Scale in with rotation', 'page_builder' ) => 'scaleRotateIn',
			__( 'Blur out', 'page_builder' ) => 'blurOut',
			__( 'Blur scale out', 'page_builder' ) => 'blurScaleOut',
			__( 'Slide in from left', 'page_builder' ) => 'slideInRight',
			__( 'Slide in from right', 'page_builder' ) => 'slideInLeft',
			__( 'Slide bottom', 'page_builder' ) => 'slideBottom',
			__( 'Slide top', 'page_builder' ) => 'slideTop',
			__( 'Vertical flip in with fade', 'page_builder' ) => 'flipFadeIn',
			__( 'Horizontal flip in with fade', 'page_builder' ) => 'flipHorizontalFadeIn',
			__( 'Go top', 'page_builder' ) => 'goTop20',
			__( 'Go bottom', 'page_builder' ) => 'goBottom20',
		);
	}
}
