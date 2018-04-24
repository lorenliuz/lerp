<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once 'vc-grids-functions.php';
if ( ! class_exists( 'VcGridsCommon' ) ) {
	abstract class VcGridsCommon {

		protected static $basicGrid;
		protected static $masonryGrid;
		protected static $masonryMediaGrid;
		protected static $mediaGrid;
		protected static $gridCommon;
		protected static $btn3Params;
		protected static $gridColsList;

		protected static function initData() {

			self::$btn3Params = vc_map_integrate_shortcode( 'vc_btn', 'btn_', __( 'Load More Button', 'page_builder' ), array(
				'exclude' => array(
					'link',
					'css',
					'el_class',
					'css_animation',
				),
			), array(
				'element' => 'style',
				'value' => array( 'load-more' ),
			) );
			foreach ( self::$btn3Params as $key => $value ) {
				if ( 'btn_title' == $value['param_name'] ) {
					self::$btn3Params[ $key ]['value'] = __( 'Load more', 'page_builder' );
				} else if ( 'btn_color' == $value['param_name'] ) {
					self::$btn3Params[ $key ]['std'] = 'blue';
				} else if ( 'btn_style' == $value['param_name'] ) {
					self::$btn3Params[ $key ]['std'] = 'flat';
				}
			}

			// Grid column list
			self::$gridColsList = array(
				array(
					'label' => '6',
					'value' => 2,
				),
				array(
					'label' => '4',
					'value' => 3,
				),
				array(
					'label' => '3',
					'value' => 4,
				),
				array(
					'label' => '2',
					'value' => 6,
				),
				array(
					'label' => '1',
					'value' => 12,
				),
			);
		}

		// Basic Grid Common Settings
		public static function getBasicAtts() {

			if ( self::$basicGrid ) {
				return self::$basicGrid;
			}

			if ( is_null( self::$btn3Params ) && is_null( self::$gridColsList ) ) {
				self::initData();
			}

			$postTypes = get_post_types( array() );
			$postTypesList = array();
			$excludedPostTypes = array(
				'revision',
				'nav_menu_item',
				'vc_grid_item',
			);
			if ( is_array( $postTypes ) && ! empty( $postTypes ) ) {
				foreach ( $postTypes as $postType ) {
					if ( ! in_array( $postType, $excludedPostTypes ) ) {
						$label = ucfirst( $postType );
						$postTypesList[] = array(
							$postType,
							$label,
						);
					}
				}
			}
			$postTypesList[] = array(
				'custom',
				__( 'Custom query', 'page_builder' ),
			);
			$postTypesList[] = array(
				'ids',
				__( 'List of IDs', 'page_builder' ),
			);

			$taxonomiesForFilter = array();

			if ( 'vc_edit_form' === vc_post_param( 'action' ) ) {
				$vcTaxonomiesTypes = vc_taxonomies_types();
				if ( is_array( $vcTaxonomiesTypes ) && ! empty( $vcTaxonomiesTypes ) ) {
					foreach ( $vcTaxonomiesTypes as $t => $data ) {
						if ( 'post_format' !== $t && is_object( $data ) ) {
							$taxonomiesForFilter[ $data->labels->name . '(' . $t . ')' ] = $t;
						}
					}
				}
			}

			self::$basicGrid = array_merge( array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Data source', 'page_builder' ),
					'param_name' => 'post_type',
					'value' => $postTypesList,
					'save_always' => true,
					'description' => __( 'Select content type for your grid.', 'page_builder' ),
					'admin_label' => true,
				),
				array(
					'type' => 'autocomplete',
					'heading' => __( 'Include only', 'page_builder' ),
					'param_name' => 'include',
					'description' => __( 'Add posts, pages, etc. by title.', 'page_builder' ),
					'settings' => array(
						'multiple' => true,
						'sortable' => true,
						'groups' => true,
					),
					'dependency' => array(
						'element' => 'post_type',
						'value' => array( 'ids' ),
					),
				),
				// Custom query tab
				array(
					'type' => 'textarea_safe',
					'heading' => __( 'Custom query', 'page_builder' ),
					'param_name' => 'custom_query',
					'description' => __( 'Build custom query according to <a href="http://codex.wordpress.org/Function_Reference/query_posts">WordPress Codex</a>.', 'page_builder' ),
					'dependency' => array(
						'element' => 'post_type',
						'value' => array( 'custom' ),
					),
				),
				array(
					'type' => 'autocomplete',
					'heading' => __( 'Narrow data source', 'page_builder' ),
					'param_name' => 'taxonomies',
					'settings' => array(
						'multiple' => true,
						'min_length' => 1,
						'groups' => true,
						// In UI show results grouped by groups, default false
						'unique_values' => true,
						// In UI show results except selected. NB! You should manually check values in backend, default false
						'display_inline' => true,
						// In UI show results inline view, default false (each value in own line)
						'delay' => 500,
						// delay for search. default 500
						'auto_focus' => true,
						// auto focus input, default true
					),
					'param_holder_class' => 'vc_not-for-custom',
					'description' => __( 'Enter categories, tags or custom taxonomies.', 'page_builder' ),
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array(
							'ids',
							'custom',
						),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Total items', 'page_builder' ),
					'param_name' => 'max_items',
					'value' => 10,
					// default value
					'param_holder_class' => 'vc_not-for-custom',
					'description' => __( 'Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'page_builder' ),
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array(
							'ids',
							'custom',
						),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Display Style', 'page_builder' ),
					'param_name' => 'style',
					'value' => array(
						__( 'Show all', 'page_builder' ) => 'all',
						__( 'Load more button', 'page_builder' ) => 'load-more',
						__( 'Lazy loading', 'page_builder' ) => 'lazy',
						__( 'Pagination', 'page_builder' ) => 'pagination',
					),
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array( 'custom' ),
					),
					'edit_field_class' => 'vc_col-sm-6',
					'description' => __( 'Select display style for grid.', 'page_builder' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Items per page', 'page_builder' ),
					'param_name' => 'items_per_page',
					'description' => __( 'Number of items to show per page.', 'page_builder' ),
					'value' => '10',
					'dependency' => array(
						'element' => 'style',
						'value' => array(
							'lazy',
							'load-more',
							'pagination',
						),
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Show filter', 'page_builder' ),
					'param_name' => 'show_filter',
					'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
					'description' => __( 'Append filter to grid.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Grid elements per row', 'page_builder' ),
					'param_name' => 'element_width',
					'value' => self::$gridColsList,
					'std' => '4',
					'edit_field_class' => 'vc_col-sm-6',
					'description' => __( 'Select number of single grid elements per row.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Gap', 'page_builder' ),
					'param_name' => 'gap',
					'value' => array(
						'0px' => '0',
						'1px' => '1',
						'2px' => '2',
						'3px' => '3',
						'4px' => '4',
						'5px' => '5',
						'10px' => '10',
						'15px' => '15',
						'20px' => '20',
						'25px' => '25',
						'30px' => '30',
						'35px' => '35',
					),
					'std' => '30',
					'description' => __( 'Select gap between grid elements.', 'page_builder' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				// Data settings
				array(
					'type' => 'dropdown',
					'heading' => __( 'Order by', 'page_builder' ),
					'param_name' => 'orderby',
					'value' => array(
						__( 'Date', 'page_builder' ) => 'date',
						__( 'Order by post ID', 'page_builder' ) => 'ID',
						__( 'Author', 'page_builder' ) => 'author',
						__( 'Title', 'page_builder' ) => 'title',
						__( 'Last modified date', 'page_builder' ) => 'modified',
						__( 'Post/page parent ID', 'page_builder' ) => 'parent',
						__( 'Number of comments', 'page_builder' ) => 'comment_count',
						__( 'Menu order/Page Order', 'page_builder' ) => 'menu_order',
						__( 'Meta value', 'page_builder' ) => 'meta_value',
						__( 'Meta value number', 'page_builder' ) => 'meta_value_num',
						__( 'Random order', 'page_builder' ) => 'rand',
					),
					'description' => __( 'Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'page_builder' ),
					'group' => __( 'Data Settings', 'page_builder' ),
					'param_holder_class' => 'vc_grid-data-type-not-ids',
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array(
							'ids',
							'custom',
						),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Sort order', 'page_builder' ),
					'param_name' => 'order',
					'group' => __( 'Data Settings', 'page_builder' ),
					'value' => array(
						__( 'Descending', 'page_builder' ) => 'DESC',
						__( 'Ascending', 'page_builder' ) => 'ASC',
					),
					'param_holder_class' => 'vc_grid-data-type-not-ids',
					'description' => __( 'Select sorting order.', 'page_builder' ),
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array(
							'ids',
							'custom',
						),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Meta key', 'page_builder' ),
					'param_name' => 'meta_key',
					'description' => __( 'Input meta key for grid ordering.', 'page_builder' ),
					'group' => __( 'Data Settings', 'page_builder' ),
					'param_holder_class' => 'vc_grid-data-type-not-ids',
					'dependency' => array(
						'element' => 'orderby',
						'value' => array(
							'meta_value',
							'meta_value_num',
						),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Offset', 'page_builder' ),
					'param_name' => 'offset',
					'description' => __( 'Number of grid elements to displace or pass over.', 'page_builder' ),
					'group' => __( 'Data Settings', 'page_builder' ),
					'param_holder_class' => 'vc_grid-data-type-not-ids',
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array(
							'ids',
							'custom',
						),
					),
				),
				array(
					'type' => 'autocomplete',
					'heading' => __( 'Exclude', 'page_builder' ),
					'param_name' => 'exclude',
					'description' => __( 'Exclude posts, pages, etc. by title.', 'page_builder' ),
					'group' => __( 'Data Settings', 'page_builder' ),
					'settings' => array(
						'multiple' => true,
					),
					'param_holder_class' => 'vc_grid-data-type-not-ids',
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array(
							'ids',
							'custom',
						),
						'callback' => 'vc_grid_exclude_dependency_callback',
					),
				),
				//Filter tab
				array(
					'type' => 'dropdown',
					'heading' => __( 'Filter by', 'page_builder' ),
					'param_name' => 'filter_source',
					'value' => $taxonomiesForFilter,
					'group' => __( 'Filter', 'page_builder' ),
					'dependency' => array(
						'element' => 'show_filter',
						'value' => array( 'yes' ),
					),
					'save_always' => true,
					'description' => __( 'Select filter source.', 'page_builder' ),
				),
				array(
					'type' => 'autocomplete',
					'heading' => __( 'Exclude from filter list', 'page_builder' ),
					'param_name' => 'exclude_filter',
					'settings' => array(
						'multiple' => true,
						// is multiple values allowed? default false
						'min_length' => 1,
						// min length to start search -> default 2
						'groups' => true,
						// In UI show results grouped by groups, default false
						'unique_values' => true,
						// In UI show results except selected. NB! You should manually check values in backend, default false
						'display_inline' => true,
						// In UI show results inline view, default false (each value in own line)
						'delay' => 500,
						// delay for search. default 500
						'auto_focus' => true,
						// auto focus input, default true
					),
					'description' => __( 'Enter categories, tags won\'t be shown in the filters list', 'page_builder' ),
					'dependency' => array(
						'element' => 'show_filter',
						'value' => array( 'yes' ),
						'callback' => 'vcGridFilterExcludeCallBack',
					),
					'group' => __( 'Filter', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Style', 'page_builder' ),
					'param_name' => 'filter_style',
					'value' => array(
						__( 'Rounded', 'page_builder' ) => 'default',
						__( 'Less Rounded', 'page_builder' ) => 'default-less-rounded',
						__( 'Border', 'page_builder' ) => 'bordered',
						__( 'Rounded Border', 'page_builder' ) => 'bordered-rounded',
						__( 'Less Rounded Border', 'page_builder' ) => 'bordered-rounded-less',
						__( 'Filled', 'page_builder' ) => 'filled',
						__( 'Rounded Filled', 'page_builder' ) => 'filled-rounded',
						__( 'Dropdown', 'page_builder' ) => 'dropdown',
					),
					'dependency' => array(
						'element' => 'show_filter',
						'value' => array( 'yes' ),
					),
					'group' => __( 'Filter', 'page_builder' ),
					'description' => __( 'Select filter display style.', 'page_builder' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Default title', 'page_builder' ),
					'param_name' => 'filter_default_title',
					'value' => __( 'All', 'page_builder' ),
					'description' => __( 'Enter default title for filter option display (empty: "All").', 'page_builder' ),
					'dependency' => array(
						'element' => 'show_filter',
						'value' => array( 'yes' ),
					),
					'group' => __( 'Filter', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Alignment', 'page_builder' ),
					'param_name' => 'filter_align',
					'value' => array(
						__( 'Center', 'page_builder' ) => 'center',
						__( 'Left', 'page_builder' ) => 'left',
						__( 'Right', 'page_builder' ) => 'right',
					),
					'dependency' => array(
						'element' => 'show_filter',
						'value' => array( 'yes' ),
					),
					'group' => __( 'Filter', 'page_builder' ),
					'description' => __( 'Select filter alignment.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Color', 'page_builder' ),
					'param_name' => 'filter_color',
					'value' => getVcShared( 'colors' ),
					'std' => 'grey',
					'param_holder_class' => 'vc_colored-dropdown',
					'dependency' => array(
						'element' => 'show_filter',
						'value' => array( 'yes' ),
					),
					'group' => __( 'Filter', 'page_builder' ),
					'description' => __( 'Select filter color.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Filter size', 'page_builder' ),
					'param_name' => 'filter_size',
					'value' => getVcShared( 'sizes' ),
					'std' => 'md',
					'description' => __( 'Select filter size.', 'page_builder' ),
					'dependency' => array(
						'element' => 'show_filter',
						'value' => array( 'yes' ),
					),
					'group' => __( 'Filter', 'page_builder' ),
				),
				// moved to the end
				// Paging controls
				array(
					'type' => 'dropdown',
					'heading' => __( 'Arrows design', 'page_builder' ),
					'param_name' => 'arrows_design',
					'value' => array(
						__( 'None', 'page_builder' ) => 'none',
						__( 'Simple', 'page_builder' ) => 'vc_arrow-icon-arrow_01_left',
						__( 'Simple Circle Border', 'page_builder' ) => 'vc_arrow-icon-arrow_02_left',
						__( 'Simple Circle', 'page_builder' ) => 'vc_arrow-icon-arrow_03_left',
						__( 'Simple Square', 'page_builder' ) => 'vc_arrow-icon-arrow_09_left',
						__( 'Simple Square Rounded', 'page_builder' ) => 'vc_arrow-icon-arrow_12_left',
						__( 'Simple Rounded', 'page_builder' ) => 'vc_arrow-icon-arrow_11_left',
						__( 'Rounded', 'page_builder' ) => 'vc_arrow-icon-arrow_04_left',
						__( 'Rounded Circle Border', 'page_builder' ) => 'vc_arrow-icon-arrow_05_left',
						__( 'Rounded Circle', 'page_builder' ) => 'vc_arrow-icon-arrow_06_left',
						__( 'Rounded Square', 'page_builder' ) => 'vc_arrow-icon-arrow_10_left',
						__( 'Simple Arrow', 'page_builder' ) => 'vc_arrow-icon-arrow_08_left',
						__( 'Simple Rounded Arrow', 'page_builder' ) => 'vc_arrow-icon-arrow_07_left',

					),
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
					'description' => __( 'Select design for arrows.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Arrows position', 'page_builder' ),
					'param_name' => 'arrows_position',
					'value' => array(
						__( 'Inside Wrapper', 'page_builder' ) => 'inside',
						__( 'Outside Wrapper', 'page_builder' ) => 'outside',
					),
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'arrows_design',
						'value_not_equal_to' => array( 'none' ),
						// New dependency
					),
					'description' => __( 'Arrows will be displayed inside or outside grid.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Arrows color', 'page_builder' ),
					'param_name' => 'arrows_color',
					'value' => getVcShared( 'colors' ),
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'arrows_design',
						'value_not_equal_to' => array( 'none' ),
						// New dependency
					),
					'description' => __( 'Select color for arrows.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Pagination style', 'page_builder' ),
					'param_name' => 'paging_design',
					'value' => array(
						__( 'None', 'page_builder' ) => 'none',
						__( 'Square Dots', 'page_builder' ) => 'square_dots',
						__( 'Radio Dots', 'page_builder' ) => 'radio_dots',
						__( 'Point Dots', 'page_builder' ) => 'point_dots',
						__( 'Fill Square Dots', 'page_builder' ) => 'fill_square_dots',
						__( 'Rounded Fill Square Dots', 'page_builder' ) => 'round_fill_square_dots',
						__( 'Pagination Default', 'page_builder' ) => 'pagination_default',
						__( 'Outline Default Dark', 'page_builder' ) => 'pagination_default_dark',
						__( 'Outline Default Light', 'page_builder' ) => 'pagination_default_light',
						__( 'Pagination Rounded', 'page_builder' ) => 'pagination_rounded',
						__( 'Outline Rounded Dark', 'page_builder' ) => 'pagination_rounded_dark',
						__( 'Outline Rounded Light', 'page_builder' ) => 'pagination_rounded_light',
						__( 'Pagination Square', 'page_builder' ) => 'pagination_square',
						__( 'Outline Square Dark', 'page_builder' ) => 'pagination_square_dark',
						__( 'Outline Square Light', 'page_builder' ) => 'pagination_square_light',
						__( 'Pagination Rounded Square', 'page_builder' ) => 'pagination_rounded_square',
						__( 'Outline Rounded Square Dark', 'page_builder' ) => 'pagination_rounded_square_dark',
						__( 'Outline Rounded Square Light', 'page_builder' ) => 'pagination_rounded_square_light',
						__( 'Stripes Dark', 'page_builder' ) => 'pagination_stripes_dark',
						__( 'Stripes Light', 'page_builder' ) => 'pagination_stripes_light',
					),
					'std' => 'radio_dots',
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
					'description' => __( 'Select pagination style.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Pagination color', 'page_builder' ),
					'param_name' => 'paging_color',
					'value' => getVcShared( 'colors' ),
					'std' => 'grey',
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'paging_design',
						'value_not_equal_to' => array( 'none' ),
						// New dependency
					),
					'description' => __( 'Select pagination color.', 'page_builder' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Loop pages?', 'page_builder' ),
					'param_name' => 'loop',
					'description' => __( 'Allow items to be repeated in infinite loop (carousel).', 'page_builder' ),
					'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Autoplay delay', 'page_builder' ),
					'param_name' => 'autoplay',
					'value' => '-1',
					'description' => __( 'Enter value in seconds. Set -1 to disable autoplay.', 'page_builder' ),
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
				),
				array(
					'type' => 'animation_style',
					'heading' => __( 'Animation In', 'page_builder' ),
					'param_name' => 'paging_animation_in',
					'group' => __( 'Pagination', 'page_builder' ),
					'settings' => array(
						'type' => array(
							'in',
							'other',
						),
					),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
					'description' => __( 'Select "animation in" for page transition.', 'page_builder' ),
				),
				array(
					'type' => 'animation_style',
					'heading' => __( 'Animation Out', 'page_builder' ),
					'param_name' => 'paging_animation_out',
					'group' => __( 'Pagination', 'page_builder' ),
					'settings' => array(
						'type' => array( 'out' ),
					),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
					'description' => __( 'Select "animation out" for page transition.', 'page_builder' ),
				),
				array(
					'type' => 'vc_grid_item',
					'heading' => __( 'Grid element template', 'page_builder' ),
					'param_name' => 'item',
					'description' => sprintf( __( '%sCreate new%s template or %smodify selected%s. Predefined templates will be cloned.', 'page_builder' ), '<a href="' . esc_url( admin_url( 'post-new.php?post_type=vc_grid_item' ) ) . '" target="_blank">', '</a>', '<a href="#" target="_blank" data-vc-grid-item="edit_link">', '</a>' ),
					'group' => __( 'Item Design', 'page_builder' ),
					'value' => 'none',
				),
				array(
					'type' => 'vc_grid_id',
					'param_name' => 'grid_id',
				),
				array(
					'type' => 'animation_style',
					'heading' => __( 'Initial loading animation', 'page_builder' ),
					'param_name' => 'initial_loading_animation',
					'value' => 'fadeIn',
					'settings' => array(
						'type' => array(
							'in',
							'other',
						),
					),
					'description' => __( 'Select initial loading animation for grid element.', 'page_builder' ),
				),
				array(
					'type' => 'el_id',
					'heading' => __( 'Element ID', 'page_builder' ),
					'param_name' => 'el_id',
					'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'page_builder' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'page_builder' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
				),
				array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'page_builder' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'page_builder' ),
				),

				// Load more btn
				array(
					'type' => 'hidden',
					'heading' => __( 'Button style', 'page_builder' ),
					'param_name' => 'button_style',
					'value' => '',
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
					'description' => __( 'Select button style.', 'page_builder' ),
				),
				array(
					'type' => 'hidden',
					'heading' => __( 'Button color', 'page_builder' ),
					'param_name' => 'button_color',
					'value' => '',
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
					'description' => __( 'Select button color.', 'page_builder' ),
				),
				array(
					'type' => 'hidden',
					'heading' => __( 'Button size', 'page_builder' ),
					'param_name' => 'button_size',
					'value' => '',
					'description' => __( 'Select button size.', 'page_builder' ),
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
				),
			), self::$btn3Params );
			self::$basicGrid = array_merge( self::$basicGrid );

			return self::$basicGrid;
		}

		// Media grid common settings
		public static function getMediaCommonAtts() {

			if ( self::$mediaGrid ) {
				return self::$mediaGrid;
			}

			if ( is_null( self::$btn3Params ) && is_null( self::$gridColsList ) ) {
				self::initData();
			}

			self::$mediaGrid = array_merge( array(
				array(
					'type' => 'attach_images',
					'heading' => __( 'Images', 'page_builder' ),
					'param_name' => 'include',
					'description' => __( 'Select images from media library.', 'page_builder' ),

				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Display Style', 'page_builder' ),
					'param_name' => 'style',
					'value' => array(
						__( 'Show all', 'page_builder' ) => 'all',
						__( 'Load more button', 'page_builder' ) => 'load-more',
						__( 'Lazy loading', 'page_builder' ) => 'lazy',
						__( 'Pagination', 'page_builder' ) => 'pagination',
					),
					'dependency' => array(
						'element' => 'post_type',
						'value_not_equal_to' => array( 'custom' ),
					),
					'edit_field_class' => 'vc_col-sm-6',
					'description' => __( 'Select display style for grid.', 'page_builder' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Items per page', 'page_builder' ),
					'param_name' => 'items_per_page',
					'description' => __( 'Number of items to show per page.', 'page_builder' ),
					'value' => '10',
					'dependency' => array(
						'element' => 'style',
						'value' => array(
							'lazy',
							'load-more',
							'pagination',
						),
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Grid elements per row', 'page_builder' ),
					'param_name' => 'element_width',
					'value' => self::$gridColsList,
					'std' => '4',
					'edit_field_class' => 'vc_col-sm-6',
					'description' => __( 'Select number of single grid elements per row.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Gap', 'page_builder' ),
					'param_name' => 'gap',
					'value' => array(
						'0px' => '0',
						'1px' => '1',
						'2px' => '2',
						'3px' => '3',
						'4px' => '4',
						'5px' => '5',
						'10px' => '10',
						'15px' => '15',
						'20px' => '20',
						'25px' => '25',
						'30px' => '30',
						'35px' => '35',
					),
					'std' => '5',
					'description' => __( 'Select gap between grid elements.', 'page_builder' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'hidden',
					'heading' => __( 'Button style', 'page_builder' ),
					'param_name' => 'button_style',
					'value' => '',
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
					'description' => __( 'Select button style.', 'page_builder' ),
				),
				array(
					'type' => 'hidden',
					'heading' => __( 'Button color', 'page_builder' ),
					'param_name' => 'button_color',
					'value' => '',
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
					'description' => __( 'Select button color.', 'page_builder' ),
				),
				array(
					'type' => 'hidden',
					'heading' => __( 'Button size', 'page_builder' ),
					'param_name' => 'button_size',
					'value' => '',
					'description' => __( 'Select button size.', 'page_builder' ),
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Arrows design', 'page_builder' ),
					'param_name' => 'arrows_design',
					'value' => array(
						__( 'None', 'page_builder' ) => 'none',
						__( 'Simple', 'page_builder' ) => 'vc_arrow-icon-arrow_01_left',
						__( 'Simple Circle Border', 'page_builder' ) => 'vc_arrow-icon-arrow_02_left',
						__( 'Simple Circle', 'page_builder' ) => 'vc_arrow-icon-arrow_03_left',
						__( 'Simple Square', 'page_builder' ) => 'vc_arrow-icon-arrow_09_left',
						__( 'Simple Square Rounded', 'page_builder' ) => 'vc_arrow-icon-arrow_12_left',
						__( 'Simple Rounded', 'page_builder' ) => 'vc_arrow-icon-arrow_11_left',
						__( 'Rounded', 'page_builder' ) => 'vc_arrow-icon-arrow_04_left',
						__( 'Rounded Circle Border', 'page_builder' ) => 'vc_arrow-icon-arrow_05_left',
						__( 'Rounded Circle', 'page_builder' ) => 'vc_arrow-icon-arrow_06_left',
						__( 'Rounded Square', 'page_builder' ) => 'vc_arrow-icon-arrow_10_left',
						__( 'Simple Arrow', 'page_builder' ) => 'vc_arrow-icon-arrow_08_left',
						__( 'Simple Rounded Arrow', 'page_builder' ) => 'vc_arrow-icon-arrow_07_left',

					),
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
					'description' => __( 'Select design for arrows.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Arrows position', 'page_builder' ),
					'param_name' => 'arrows_position',
					'value' => array(
						__( 'Inside Wrapper', 'page_builder' ) => 'inside',
						__( 'Outside Wrapper', 'page_builder' ) => 'outside',
					),
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'arrows_design',
						'value_not_equal_to' => array( 'none' ),
						// New dependency
					),
					'description' => __( 'Arrows will be displayed inside or outside grid.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Arrows color', 'page_builder' ),
					'param_name' => 'arrows_color',
					'value' => getVcShared( 'colors' ),
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'arrows_design',
						'value_not_equal_to' => array( 'none' ),
						// New dependency
					),
					'description' => __( 'Select color for arrows.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Pagination style', 'page_builder' ),
					'param_name' => 'paging_design',
					'value' => array(
						__( 'None', 'page_builder' ) => 'none',
						__( 'Square Dots', 'page_builder' ) => 'square_dots',
						__( 'Radio Dots', 'page_builder' ) => 'radio_dots',
						__( 'Point Dots', 'page_builder' ) => 'point_dots',
						__( 'Fill Square Dots', 'page_builder' ) => 'fill_square_dots',
						__( 'Rounded Fill Square Dots', 'page_builder' ) => 'round_fill_square_dots',
						__( 'Pagination Default', 'page_builder' ) => 'pagination_default',
						__( 'Outline Default Dark', 'page_builder' ) => 'pagination_default_dark',
						__( 'Outline Default Light', 'page_builder' ) => 'pagination_default_light',
						__( 'Pagination Rounded', 'page_builder' ) => 'pagination_rounded',
						__( 'Outline Rounded Dark', 'page_builder' ) => 'pagination_rounded_dark',
						__( 'Outline Rounded Light', 'page_builder' ) => 'pagination_rounded_light',
						__( 'Pagination Square', 'page_builder' ) => 'pagination_square',
						__( 'Outline Square Dark', 'page_builder' ) => 'pagination_square_dark',
						__( 'Outline Square Light', 'page_builder' ) => 'pagination_square_light',
						__( 'Pagination Rounded Square', 'page_builder' ) => 'pagination_rounded_square',
						__( 'Outline Rounded Square Dark', 'page_builder' ) => 'pagination_rounded_square_dark',
						__( 'Outline Rounded Square Light', 'page_builder' ) => 'pagination_rounded_square_light',
						__( 'Stripes Dark', 'page_builder' ) => 'pagination_stripes_dark',
						__( 'Stripes Light', 'page_builder' ) => 'pagination_stripes_light',
					),
					'std' => 'radio_dots',
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
					'description' => __( 'Select pagination style.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Pagination color', 'page_builder' ),
					'param_name' => 'paging_color',
					'value' => getVcShared( 'colors' ),
					'std' => 'grey',
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'paging_design',
						'value_not_equal_to' => array( 'none' ),
						// New dependency
					),
					'description' => __( 'Select pagination color.', 'page_builder' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => __( 'Loop pages?', 'page_builder' ),
					'param_name' => 'loop',
					'description' => __( 'Allow items to be repeated in infinite loop (carousel).', 'page_builder' ),
					'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Autoplay delay', 'page_builder' ),
					'param_name' => 'autoplay',
					'value' => '-1',
					'description' => __( 'Enter value in seconds. Set -1 to disable autoplay.', 'page_builder' ),
					'group' => __( 'Pagination', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
				),
				array(
					'type' => 'animation_style',
					'heading' => __( 'Animation In', 'page_builder' ),
					'param_name' => 'paging_animation_in',
					'group' => __( 'Pagination', 'page_builder' ),
					'settings' => array(
						'type' => array(
							'in',
							'other',
						),
					),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
					'description' => __( 'Select "animation in" for page transition.', 'page_builder' ),
				),
				array(
					'type' => 'animation_style',
					'heading' => __( 'Animation Out', 'page_builder' ),
					'param_name' => 'paging_animation_out',
					'group' => __( 'Pagination', 'page_builder' ),
					'settings' => array(
						'type' => array( 'out' ),
					),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'pagination' ),
					),
					'description' => __( 'Select "animation out" for page transition.', 'page_builder' ),
				),
				array(
					'type' => 'vc_grid_item',
					'heading' => __( 'Grid element template', 'page_builder' ),
					'param_name' => 'item',
					'description' => sprintf( __( '%sCreate new%s template or %smodify selected%s. Predefined templates will be cloned.', 'page_builder' ), '<a href="' . esc_url( admin_url( 'post-new.php?post_type=vc_grid_item' ) ) . '" target="_blank">', '</a>', '<a href="#" target="_blank" data-vc-grid-item="edit_link">', '</a>' ),
					'group' => __( 'Item Design', 'page_builder' ),
					'value' => 'mediaGrid_Default',
				),
				array(
					'type' => 'vc_grid_id',
					'param_name' => 'grid_id',
				),
				array(
					'type' => 'el_id',
					'heading' => __( 'Element ID', 'page_builder' ),
					'param_name' => 'el_id',
					'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'page_builder' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'page_builder' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
				),
				array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'page_builder' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'page_builder' ),
				),
			), self::$btn3Params, array(
				// Load more btn bc
				array(
					'type' => 'hidden',
					'heading' => __( 'Button style', 'page_builder' ),
					'param_name' => 'button_style',
					'value' => '',
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
					'description' => __( 'Select button style.', 'page_builder' ),
				),
				array(
					'type' => 'hidden',
					'heading' => __( 'Button color', 'page_builder' ),
					'param_name' => 'button_color',
					'value' => '',
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
					'description' => __( 'Select button color.', 'page_builder' ),
				),
				array(
					'type' => 'hidden',
					'heading' => __( 'Button size', 'page_builder' ),
					'param_name' => 'button_size',
					'value' => '',
					'description' => __( 'Select button size.', 'page_builder' ),
					'group' => __( 'Load More Button', 'page_builder' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'load-more' ),
					),
				),
				array(
					'type' => 'animation_style',
					'heading' => __( 'Initial loading animation', 'page_builder' ),
					'param_name' => 'initial_loading_animation',
					'value' => 'fadeIn',
					'settings' => array(
						'type' => array(
							'in',
							'other',
						),
					),
					'description' => __( 'Select initial loading animation for grid element.', 'page_builder' ),
				),
			) );

			self::$mediaGrid = array_merge( self::$mediaGrid );

			return self::$mediaGrid;
		}

		public static function getMasonryCommonAtts() {

			if ( self::$masonryGrid ) {
				return self::$masonryGrid;
			}

			$gridParams = self::getBasicAtts();

			self::$masonryGrid = $gridParams;
			$style = self::arraySearch( self::$masonryGrid, 'param_name', 'style' );
			unset( self::$masonryGrid[ $style ]['value'][ __( 'Pagination', 'page_builder' ) ] );

			$animation = self::arraySearch( self::$masonryGrid, 'param_name', 'initial_loading_animation' );
			$masonryAnimation = array(
				'type' => 'dropdown',
				'heading' => __( 'Initial loading animation', 'page_builder' ),
				'param_name' => 'initial_loading_animation',
				'value' => array(
					__( 'None', 'page_builder' ) => 'none',
					__( 'Default', 'page_builder' ) => 'zoomIn',
					__( 'Fade In', 'page_builder' ) => 'fadeIn',
				),
				'std' => 'zoomIn',
				'description' => __( 'Select initial loading animation for grid element.', 'page_builder' ),
			);
			// unset( self::$masonryGrid[$animation] );
			self::$masonryGrid[ $animation ] = $masonryAnimation;

			while ( $key = self::arraySearch( self::$masonryGrid, 'group', __( 'Pagination', 'page_builder' ) ) ) {
				unset( self::$masonryGrid[ $key ] );
			}

			$vcGridItem = self::arraySearch( self::$masonryGrid, 'param_name', 'item' );
			self::$masonryGrid[ $vcGridItem ]['value'] = 'masonryGrid_Default';

			self::$masonryGrid = array_merge( self::$masonryGrid );

			return array_merge( self::$masonryGrid );
		}

		public static function getMasonryMediaCommonAtts() {

			if ( self::$masonryMediaGrid ) {
				return self::$masonryMediaGrid;
			}

			$mediaGridParams = self::getMediaCommonAtts();

			self::$masonryMediaGrid = $mediaGridParams;

			while ( $key = self::arraySearch( self::$masonryMediaGrid, 'group', __( 'Pagination', 'page_builder' ) ) ) {
				unset( self::$masonryMediaGrid[ $key ] );
			}

			$vcGridItem = self::arraySearch( self::$masonryMediaGrid, 'param_name', 'item' );
			self::$masonryMediaGrid[ $vcGridItem ]['value'] = 'masonryMedia_Default';

			$style = self::arraySearch( self::$masonryMediaGrid, 'param_name', 'style' );

			unset( self::$masonryMediaGrid[ $style ]['value'][ __( 'Pagination', 'page_builder' ) ] );

			$animation = self::arraySearch( self::$masonryMediaGrid, 'param_name', 'initial_loading_animation' );
			$masonryAnimation = array(
				'type' => 'dropdown',
				'heading' => __( 'Initial loading animation', 'page_builder' ),
				'param_name' => 'initial_loading_animation',
				'value' => array(
					__( 'None', 'page_builder' ) => 'none',
					__( 'Default', 'page_builder' ) => 'zoomIn',
					__( 'Fade In', 'page_builder' ) => 'fadeIn',
				),
				'std' => 'zoomIn',
				'settings' => array(
					'type' => array(
						'in',
						'other',
					),
				),
				'description' => __( 'Select initial loading animation for grid element.', 'page_builder' ),
			);
			self::$masonryMediaGrid[ $animation ] = $masonryAnimation;

			self::$masonryMediaGrid = array_merge( self::$masonryMediaGrid );

			return array_merge( self::$masonryMediaGrid );
		}

		// Function to search array
		public static function arraySearch( $array, $column, $value ) {
			if ( ! is_array( $array ) ) {
				return false;
			}
			foreach ( $array as $key => $innerArray ) {
				$exists = isset( $innerArray[ $column ] ) && $innerArray[ $column ] == $value;
				if ( $exists ) {
					return $key;
				}
			}

			return false;
		}
	} // class ends
}
