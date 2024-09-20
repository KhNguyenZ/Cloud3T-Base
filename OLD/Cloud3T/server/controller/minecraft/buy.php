<?php
require $_SERVER['DOCUMENT_ROOT'] . '/api/minecraft/api.php';
if ($_POST['buymchost']) {
    $pterodactyl = new Pterodactyl();
    $mch = $_POST['buymchost'];
    $platform = $_POST['platform'];
    $java_ver = $_POST['java_ver'];
    $mc_ver = $_POST['mc_ver'];
    $startup_cmd = $_POST['startup_cmd'];
    $mc_name = $_POST['mc_name'];
    $mc_des = $_POST['mc_des'];
    $hinfo = $KNCMS->query("SELECT * FROM `mc_hosting` WHERE `id` = '$mch'")->fetch_array();
    if(!empty($_POST['voucher']))
    {
        if(!check_rows('voucher', 'voucher', $_POST['voucher'])) return $KNCMS->msg_warning("Voucher này không tồn tại", "", 1000);

        $vinfo = GetVoucher($_POST['voucher']);
        if($vinfo['type'] != 3) return $KNCMS->msg_warning("Voucher này không dùng cho hosting", "", 1000);
        if($vinfo['limit'] <= 0) return $KNCMS->msg_warning("Voucher này đã hết lượt sử dụng", "", 1000);
        $price = round($host['price'] * ($vinfo['discount']/100));
    }
    else $price = $hinfo['price'];
    if($KNCMS->getUser($_SESSION['username'])['Cash'] < $price) $KNCMS->msg_warning("Bạn không đủ tiền để thực hiện giao dịch này", "", 1000);
    if (empty($platform) || empty($java_ver) || empty($mc_ver) || empty($startup_cmd)) $KNCMS->msg_error("Không được bỏ trống thông tin !", "", 1000);
    $client = $KNCMS->getUser($_SESSION['username']);
    if ($pterodactyl->checkUserExists($client['Email']) != 1) {
        $kq_user = $pterodactyl->createUser($client['Email'], $client['Username'], $client['Username'], $client['Password'], 'Cloud3T.com');
        $kq_user = json_decode($kq_user, true);
        if ($kq_user['status'] == 'success') {
            $uuid = $kq_user['uuid'];
            $id = $kq_user['id'];
            $KNCMS->query("UPDATE `users` SET `Pterodactyl_UUID` = '$uuid', `Pterodactyl_ID` = '$id' WHERE `id` = '$uid'");
        } else {
            $KNCMS->msg_error("Thất bại khi gọi tới Pterodactyl", "", 1000);
        }
    }
    $kq = $pterodactyl->createServer(
        $mc_name,
        $client['Pterodactyl_ID'],
        $mc_des,
        $java_ver,
        $startup_cmd,
        $mc_ver,
        50,
        $hinfo['ram'],
        $hinfo['disk']
    );

    $kq = json_decode($kq, true);
    if ($kq['status'] == 'success') {
        $values = sprintf(
            "('%s', '%d', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%d')",
            $uid,
            $kq_user['id'],
            $time,
            $kq['id'],
            $client['Username'],
            $client['Password'],
            $kq['action'],
            $mc_name,
            $mc_des,
            $kq['uuid'],
            $mch
        );
        $KNCMS->query("INSERT INTO `user_mc` (`uid`, `Pterodactyl_ID`, `createdtime`, `server_id` ,`user`, `pass`, `status`, `name`, `description`, `server_uuid`, `plan_id`)
        VALUES  $values");
        trutien($_SERVER['username'], $price);
        $KNCMS->query("UPDATE `voucher` SET `limit` = `limit`-1 WHERE `voucher` = '".$_POST['voucher']."'");
        $KNCMS->msg_success('Tạo hosting thành công', '', 1000);
    } else $KNCMS->msg_error('Tạo hosting thất bại' . $kq['response'], '', 1000);
}
