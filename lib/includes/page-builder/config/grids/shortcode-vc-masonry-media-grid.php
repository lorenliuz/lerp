<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once( 'class-vc-grids-common.php' );
$masonryMediaGridParams = VcGridsCommon::getMasonryMediaCommonAtts();

return array(
	'name' => __( 'Masonry Media Grid', 'page_builder' ),
	'base' => 'vc_masonry_media_grid',
	'icon' => 'vc_icon-vc-masonry-media-grid',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Masonry media grid from Media Library', 'page_builder' ),
	'params' => $masonryMediaGridParams,
);
