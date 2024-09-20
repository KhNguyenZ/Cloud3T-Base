<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/config.php';
require $_SERVER['DOCUMENT_ROOT'] . '/api/minecraft/api.php';
$pterodactyl = new Pterodactyl();
foreach ($KNCMS->get_list("SELECT * FROM `user_mc` WHERE `status` = 'installing'") as $cron) {
    $host = $KNCMS->query("SELECT * FROM `user_mc` WHERE `id` = " . $cron['id'])->fetch_array();
    $result = $pterodactyl->getServerDetails($cron['server_id']);
    if ($result['object'] == 'server') {

        $installed = $result['attributes']['container']['installed'];
        $sv_id = $result['attributes']['id'];
        if ($installed) {
            $createdtime = date('Y-m-d');
            $expiredtime = date('Y-m-d', strtotime('+1 month +3 days'));
            $KNCMS->query("UPDATE `user_mc` SET `status` = 'Active', `expiredtime` = '$expiredtime' WHERE `server_id` = " . $sv_id);
        }
    }
}
