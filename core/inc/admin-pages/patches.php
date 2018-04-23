<?php
require_once get_template_directory() . '/core/inc/LerpAPI.class.php';
require_once get_template_directory() . '/core/inc/LerpHotfix.class.php';

/*function patches_add_news_notification() {
    global $menu;

    $hotfix = new LerpHotfix('http://www.mocky.io/v2');
    $patches_count = $hotfix->countCommittedPatches([
        'key' => 'merged',
        'value' => false
    ]);

    foreach ( $menu as $key => $value ) {

        if ( $menu[$key][2] == 'lerp-system-status' || $menu[$key][2] == 'patches' ) {
            $menu[$key][0] .= ' ' . "<span class='update-plugins count-$patches_count'><span class='update-count'>$patches_count</span></span>";
            return;

        }

    }
}
add_action( 'admin_menu', 'patches_add_news_notification' );*/

function patches_callback()
{
    if ( !isInstallationLegit() || requiredDataEmpty() ) {
        wp_die();
    }

    $hotfix = new LerpHotfix();

    if ( isset($_POST['merge_patch']) ) {
        $patch_id = $_POST['patch_id'];
        $patch = $hotfix->getCommittedPatch($patch_id);

        if ( $hotfix->mergePatch($patch) ) {
            $patch->merged = true;

            $hotfix->commitPatch($patch);
        }
    }

    if ( isset($_POST['delete_patch']) ) {
        $patch_id = $_POST['patch_id'];
        $patch = $hotfix->getCommittedPatch($patch_id);

        $hotfix->uncommitPatch($patch);
    }

    /* Fetch all patches and sort them by 'merged' */
    $patches = $hotfix->getCommittedPatches(null, function ($a, $b) {
        return $a->merged == true;
    });

    ?>
    <div class="wrap" id="lerp-patches">
        <h1><?php esc_html_e('Patches', 'lerp'); ?>
            <span class="lerp-heading-subtitle"><?php esc_html_e("The easiest and fastest way to fix issues on fly", "lerp"); ?></span>
        </h1>

        <table class='wp-list-table widefat fixed striped posts'>
            <thead>
            <th><?php esc_html_e("Fix", "lerp"); ?></th>
            <th><?php esc_html_e("Path", "lerp"); ?></th>
            <th><?php esc_html_e("Date", "lerp"); ?></th>
            <th></th>
            </thead>
            <tbody id='the-list'>
            <?php foreach ( $patches as $patch ) { ?>
                <?php if ( isset($patch->merged) ) {
                    if ( $patch->merged ) {
                        continue;
                    }
                } ?>
                <tr class='rss-widget'>
                    <td><?php echo $patch->desc; ?></td>
                    <td><code><?php echo $patch->path; ?></code></td>
                    <td>
                        <small><?php echo $patch->date; ?></small>
                    </td>

                    <td>
                        <form method='POST'>
                            <input type='hidden' name='patch_id' value='<?php echo $patch->id; ?>'>
                            <input type='submit' class='button button-primary' name='merge_patch'
                                   value='<?php esc_html_e("Apply", "lerp"); ?>'>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}

function patches_submenu_page()
{
    $hotfix = new LerpHotfix('http://www.mocky.io/v2');
    $patches_count = $hotfix->countCommittedPatches(array(
        'key' => 'merged',
        'value' => false
    ));

    if ( isInstallationLegit() && !requiredDataEmpty() ) {
        if ( $patches_count > 0 ) {
            add_submenu_page(
                'lerp-system-status',
                esc_html__('Patches ', 'lerp') . '<span class="update-plugins count-' . $patches_count . '"><span class="update-count">' . $patches_count . '</span></span>',
                esc_html__('Patches ', 'lerp') . '<span class="update-plugins count-' . $patches_count . '"><span class="update-count">' . $patches_count . '</span></span>',
                'manage_options',
                'patches',
                'patches_callback');
        }
    }
}

//add_action('admin_menu', 'patches_submenu_page');


if ( !wp_next_scheduled('patch_task_hook') ) {
    wp_schedule_event(time(), 'hourly', 'patch_task_hook');
}
add_action('patch_task_hook', 'patch_task_function');

function patch_task_function()
{
    $hotfix = new LerpHotfix();
    $hotfix->commitPatches();
}

//uncomment this when debugging
//patch_task_function();
?>
