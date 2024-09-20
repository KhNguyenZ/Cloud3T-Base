<?php

if (isset($_POST['naptien'])) {
    if (empty($_POST['amount'])) return $KNCMS->msg_warning('Không được bỏ trống số tiền', '', 1000);
    $user = $_SESSION['username'];
    $sotien = $_POST['amount'];
    $noidung = 'bank' . $uid;
    $KNCMS->msg_success('Tạo mã chuyển khoản thành công', hUrl('api/naptien.php?amount=' . $sotien . '&noidung=' . $noidung), 1000);
}


if (isset($_POST['KNCMSSendCard'])) {
    $telco = $_POST['telco'];
    $amount = $_POST['amount'];
    $serial = $_POST['serial'];
    $code = $_POST['code'];

    if (!$telco) $KNCMS->msg_error("Bạn chưa chọn loại thẻ", hUrl('User/NapCard'), 1000);
    if (!$amount) $KNCMS->msg_error("Bạn chưa chọn mệnh giá thẻ", hUrl('User/NapCard'), 1000);
    if (!$serial) $KNCMS->msg_error("Bạn chưa nhập seri thẻ", hUrl('User/NapCard'), 1000);
    if (!$code) $KNCMS->msg_error("Bạn chưa nhập mã thẻ", hUrl('User/NapCard'), 1000);
    $ranid  = rand(1111111111, 9999999999);
    $partner_id = '31169491589';
    $partner_key = '10d2952879e2dffb1573401ddee25021';
    $url = 'https://www.doithe1s.vn/chargingws/v2?sign=' . md5($partner_key . $code . $serial) . '&telco=' . $telco . '&code=' . $code . '&serial=' . $serial . '&amount=' . $amount . '&request_id=' . $ranid . '&partner_id=' . $partner_id . '&command=charging';
    $data = $KNCMS->curl_get($url);
    $json = json_decode($data, true);
    $servercard = GetServerCard($knsite['ServerAPI']);
    $status = $json['status'];
    $uid = $KNCMS->getUser($_SESSION['username'])['id'];
    $napthe = $KNCMS->query("INSERT INTO `users_napthe` SET
                                    `type` = '$telco',
                                    `amount` = '$amount',
                                    `serial` = '$serial',
                                    `code` = '$code',
                                    `status` = '$status',
                                    `uid` = $uid,
                                    `server_api` = '$servercard',
                                    `mgd` = '$ranid',
                                    `createdtime` = '$time'");
    if (!$napthe) $KNCMS->msg_error("Nap the khong thanh cong , vui long inbox Khôi Nguyên", hUrl('User/NapCard'), 1000);
    if ($json['status'] == 100) {
        $res['error'] = $json['message']; // lỗi kèm thông báo về
        $KNCMS->msg_error($res['error'], hUrl('User/NapCard'), 1000);
        die(json_encode($res));
    }
    if ($json['status'] == 1) {
        $res['success'] = "Nạp thẻ thành công"; // thẻ đúng 
        $KNCMS->msg_success($res['error'], hUrl('User/NapCard'), 1000);
        die(json_encode($res));
    }
    if ($json['status'] == 2) {
        $res['error'] = "Sai mệnh giá thẻ"; // sai mệnh giá
        $KNCMS->msg_error($res['error'], hUrl('User/NapCard'), 1000);
        die(json_encode($res));
    }
    if ($json['status'] == 3) {
        $res['error'] = "Vui lòng kiểm tra lại thẻ"; // thẻ lỗi
        $KNCMS->msg_error($res['error'], hUrl('User/NapCard'), 1000);
        die(json_encode($res));
    }
    if ($json['status'] == 4) {
        $res['error'] = "Server API bảo trì"; // bảo trì
        $KNCMS->msg_error($res['error'], hUrl('User/NapCard'), 1000);
        die(json_encode($res));
    }
    if ($json['status'] == 99) {
        $res['success'] = "Gửi thẻ thành công"; // đang duyệt
        $KNCMS->msg_success($res['error'], hUrl('User/NapCard'), 1000);
        die(json_encode($res));
    } else {
        $res['error'] = $json['message']; // lỗi không xác định , kèm thông báo
        $KNCMS->msg_success($res['error'], hUrl('User/NapCard'), 1000);
        die(json_encode($res));
    }
}
