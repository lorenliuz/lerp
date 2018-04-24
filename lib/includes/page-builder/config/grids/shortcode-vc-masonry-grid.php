<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once( 'class-vc-grids-common.php' );
$masonryGridParams = VcGridsCommon::getMasonryCommonAtts();

return array(
	'name' => __( 'Post Masonry Grid', 'page_builder' ),
	'base' => 'vc_masonry_grid',
	'icon' => 'vc_icon-vc-masonry-grid',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Posts, pages or custom posts in masonry grid', 'page_builder' ),
	'params' => $masonryGridParams,
);
