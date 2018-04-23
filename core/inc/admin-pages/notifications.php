<?php
require_once get_template_directory() . '/core/inc/LerpAPI.class.php';
require_once get_template_directory() . '/core/inc/LerpHotfix.class.php';


function lerp_add_news_notification() {
    global $menu;

    $total_count = 0;
    $patches_count = 0;
    $unread_mess = 0;
    $update_count = 0;

    $hotfix = new LerpHotfix('http://static.undsgn.com/lerp/endpoint');
    $envato = new Envato();
    $envato->setAPIKey(ENVATO_KEY);
    $communicator = new LerpCommunicator();

    if (isInstallationLegit() && !requiredDataEmpty()) {
        $patches_count = $hotfix->countCommittedPatches(array(
            'key' => 'merged',
            'value' => false
        ));
        $check_update = $envato->updateExistsForTheme(ITEM_ID);
        $update_count = !empty($check_update) ? 1: 0;
    }

    foreach ($communicator->getUnreadItems() as $item) {
        $unread_mess += 1;
    }

    // $total_count += $patches_count;
    //$total_count += $update_count;
    $total_count += $unread_mess;

    foreach ( $menu as $key => $value ) {

        if ( $menu[$key][2] == 'lerp-system-status') {
            $menu[$key][0] .= ' ' . "<span class='update-plugins count-$total_count'><span class='update-count'>$total_count</span></span>";
            return;

        }

    }
}
//add_action( 'admin_menu', 'lerp_add_news_notification' );
