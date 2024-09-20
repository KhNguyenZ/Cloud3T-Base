<?php 
require_once '../modules/config.php';

if (isset($_GET['request_id']) && isset($_GET['status'])) {
    /// status = 1 ==> thẻ đúng
    /// status = 2 ==> thẻ sai mệnh giá
    /// status = 3 ==> thẻ lỗi
    /// status = 99 ==> thẻ vẫn chờ xử lý
    $getdata['status'] = (int)$_GET['status']; // Trạng thái thẻ
    $getdata['message'] = $_GET['message']; // thông báo kèm theo thẻ
    $request_id = $_GET['request_id'];   /// Mã giao dịch bạn gửi lên 
    $getdata['declared_value'] = $_GET['declared_value'];  /// Mệnh giá mà bạn khai báo 
    $getdata['value'] = $_GET['value'];  /// Mệnh giá thực tế của thẻ
    $getdata['telco'] = $_GET['telco'];   /// Nhà mạng
    $card = $KNCMS->query("SELECT * FROM `users_napthe` WHERE `mgd` = '$request_id'")->fetch_array();
    $uid = $card['uid'];
    $status = (int)$getdata['status'];
    echo $_GET['status'];
    $update_status = $KNCMS->query("UPDATE `users_napthe` SET
        `status` = '$status'
        WHERE `mgd` = '$request_id' ");
    // $usercard = $KNCMS->query("SELECT * FROM `accounts` WHERE `id` = '$uid'")->fetch_array();
    $unap = $KNCMS->query("SELECT * FROM `users` WHERE `id` = ".$uid)->fetch_array();
    if ((int)$getdata['status'] == 1) {
        congtien($unap['Username'], $getdata['value']);
        LogUser("Bạn đã nạp thành công $cash vào tài khoản", $uid);
    }
    else if ((int)$getdata['status'] == 2) {
        congtien($unap['Username'], $getdata['value']/2);
        LogUser("Bạn đã nạp thành công $cash vào tài khoản (SAI MỆNH GIÁ , MẤT 50% giá trị)", $uid);
    }
}

// ?request_id=9480149347&status=1&message=Success&declared_value=100000&value=100000&telco=Viettel