<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once( 'class-vc-grids-common.php' );
$mediaGridParams = VcGridsCommon::getMediaCommonAtts();

return array(
	'name' => __( 'Media Grid', 'page_builder' ),
	'base' => 'vc_media_grid',
	'icon' => 'vc_icon-vc-media-grid',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Media grid from Media Library', 'page_builder' ),
	'params' => $mediaGridParams,
);
