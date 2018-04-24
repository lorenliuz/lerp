<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once( 'class-vc-grids-common.php' );
$gridParams = VcGridsCommon::getBasicAtts();

return array(
	'name' => __( 'Post Grid', 'page_builder' ),
	'base' => 'vc_basic_grid',
	'icon' => 'icon-wpb-application-icon-large',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Posts, pages or custom posts in grid', 'page_builder' ),
	'params' => $gridParams,
);
