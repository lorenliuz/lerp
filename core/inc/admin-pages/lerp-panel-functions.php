<?php
/**
 * Functions for the Lerp panel menu.
 */

if ( !defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}

/**
 * Get panel menu pages.
 *
 * @return array
 */
function lerp_get_admin_panel_menu_pages()
{
    $pages = array(
        'welcome' => array(
            'title' => esc_html__('欢迎', 'lerp'),
            'page_title' => esc_html__('欢迎使用Lerp', 'lerp'),
            'description' => sprintf(esc_html__("%s 已经安装好了！请注册您的购买，确保您已经满足了下面的所有要求，并寻找一个绿色的成功信息。", "lerp"), UNCODE_NAME),
            'url' => admin_url('admin.php?page=lerp-system-status')
        ),
        'plugins' => array(
            'title' => esc_html__('插件', 'lerp'),
            'page_title' => esc_html__('插件', 'lerp'),
            'description' => esc_html__('Lerp Core 和 Lerp Page Builder 是唯一需要的插件。任何其他插件都是可选的。', 'lerp'),
            'url' => admin_url('admin.php?page=lerp-plugins')
        ),
        'fonts' => array(
            'title' => esc_html__('字体库', 'lerp'),
            'page_title' => esc_html__('字体库', 'lerp'),
            'description' => esc_html__('从最流行的字体库导入字体并创建字体堆栈。', 'lerp'),
            'url' => admin_url('admin.php?page=lerp-font-library')
        ),
        'utils' => array(
            'title' => esc_html__('设置工具', 'lerp'),
            'page_title' => esc_html__('设置工具', 'lerp'),
            'description' => esc_html__('找到有用的工具来保存手动备份或导出/导入主题选项。', 'lerp'),
            'url' => admin_url('admin.php?page=lerp-settings')
        ),
    );

    if ( ot_get_option('_lerp_admin_help') !== 'off' ) {
        $pages['support'] = array(
            'title' => esc_html__('支持', 'lerp'),
            'page_title' => esc_html__('支持', 'lerp'),
            'description' => esc_html__('帮助您了解如何使用Lerp主题', 'lerp'),
            'url' => admin_url('admin.php?page=lerp-support')
        );
    }

    return apply_filters('lerp_get_admin_panel_menu_pages', $pages);
}

/**
 * Output lerp admin pages title.
 *
 * @return string
 */
function lerp_admin_panel_page_title($page_id, $data = false)
{
    $pages = lerp_get_admin_panel_menu_pages();

    ob_start();
    ?>

    <h2></h2><!-- empty h2 for admin notices -->

    <h1><?php echo esc_html($data ? $data['page_title'] : $pages[$page_id]['page_title']); ?></h1>

    <div class="about-text">
        <?php echo esc_html($data ? $data['description'] : $pages[$page_id]['description']); ?>
    </div>

    <?php
    return ob_get_clean();
}

/**
 * Output lerp panel title.
 *
 * @return string
 */
/*function lerp_admin_panel_title() {
	$active_theme  = wp_get_theme();
	$theme_name    = $active_theme->Name;
	$theme_version = $active_theme->Version;

	if ( is_child_theme() ) {
		$parent_theme  = $active_theme->parent();
		$theme_name    = $parent_theme->Name;
		$theme_version = $parent_theme->Version;
	}

	ob_start();
	?>

	<div class="lerp-admin-panel-title">
		<span class="lerp-admin-panel-title__parent-theme"><?php echo $theme_name . ' ' . $theme_version; ?></span>

		<?php if ( is_child_theme() ) :
			$active_theme  = wp_get_theme();
			?>
			<span class="lerp-admin-panel-title__sep"> - </span>
			<span class="lerp-admin-panel-title__child-theme"><?php echo esc_html( $active_theme->Name ); ?></span>
		<?php else : ?>

		<?php endif; ?>
	</div>

	<?php
	return ob_get_clean();
}*/

/**
 * Output lerp panel menu.
 *
 * @param  string $active_tab
 * @return string
 */
function lerp_admin_panel_menu($active_tab)
{
    $pages = lerp_get_admin_panel_menu_pages();

    ob_start();
    ?>

    <div class="lerp-admin-panel-menu">
        <ul class="lerp-admin-panel-menu__list">

            <?php foreach ( $pages as $page_id => $page ) : ?>
                <li class="lerp-admin-panel-menu__item lerp-admin-panel-menu__item--<?php echo esc_attr($page_id); ?>">

                    <?php if ( $active_tab == $page_id ) : ?>

                        <span class="lerp-admin-panel-menu__link lerp-admin-panel-menu__link--<?php echo $page_id; ?> lerp-admin-panel-menu__link--active"><?php echo $page['title']; ?></span>
                    <?php else : ?>

                        <a href="<?php echo esc_url($page['url']) ?>"
                           class="lerp-admin-panel-menu__link lerp-admin-panel-menu__link--<?php echo $page_id; ?>"><?php echo $page['title']; ?></a>
                    <?php endif; ?>

                </li>
            <?php endforeach; ?>

        </ul>
    </div>

    <?php
    return ob_get_clean();
}

/**
 * Output markup before TGMPA form.
 * We are using an action to have less changes in the original TGMPA class.
 *
 * This markup replaces the opening <div class="tgmpa wrap"> div
 *
 * @return string
 */
function lerp_open_tgmpa_form()
{
    ob_start();
    ?>
    <div class="tgmpa wrap lerp-wrap">
    <?php echo lerp_admin_panel_page_title('plugins'); ?>

    <div class="lerp-admin-panel">
    <?php //echo lerp_admin_panel_title(); 
    ?>
    <?php echo lerp_admin_panel_menu('plugins'); ?>

    <div class="lerp-admin-panel__content">
    <h2 class="lerp-admin-panel__heading"><?php echo esc_html(get_admin_page_title()); ?></h2>

    <?php
    echo ob_get_clean();
}

add_action('lerp_before_tgmpa_form', 'lerp_open_tgmpa_form');

/**
 * Output markup after TGMPA form.
 * We are using an action to have less changes in the original TGMPA class.
 *
 * This markup replaces the closing <div class="tgmpa wrap"> div
 *
 * @return string
 */
function lerp_close_tgmpa_form()
{
    ob_start();
    ?>
    </div><!-- .lerp-admin-panel__content -->
    </div><!-- .lerp-admin-panel -->
    </div><!-- .lerp-wrap -->

    <?php
    echo ob_get_clean();
}

add_action('lerp_after_tgmpa_form', 'lerp_close_tgmpa_form');
