<?php
if(isset($_POST['btnEditUser']))
{
    $editid = $_POST['btnEditUser'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $capbac = $_POST['capbac'];

    $editu = $KNCMS->query("UPDATE `users` SET `Username` = '$username', `Password` = '$password', `Email` = '$email', `Level` = '$capbac' WHERE `id` = '$editid'");
    if($editu) $KNCMS->msg_success("Bạn đã cập nhật thành công người dùng này", hUrl('Control/ListUser'), 1000);
}

if(isset($_POST['congtien']))
{
    if(empty($_POST['amount'])) $KNCMS->msg_error("Không được bỏ trống số tiền", "", 1000);
    if(empty($_POST['reason'])) {
        $reason = 'Admin cộng tiền | Số tiền nhận được là '. $KNCMS->format_cash($_POST['amount']). 'đ';
    }
    else {
        $reason = $_POST['reason']. ' | Số tiền được cộng là '. $KNCMS->format_cash($_POST['amount']). 'đ';
    }
    congtien($einfo['Username'], $_POST['amount']);
    LogUser($eid, $reason);
    TelegramLog($_SESSION['admin_cloud3t']. " vừa cộng cho người dùng '".$einfo['Username']."' số tiền là ".$KNCMS->format_cash($_POST['amount']));
    $KNCMS->msg_success("Cộng tiền thành công", "", 1000);
}

if(isset($_POST['trutien']))
{
    if(empty($_POST['amount'])) $KNCMS->msg_error("Không được bỏ trống số tiền", "", 1000);
    if(empty($_POST['reason'])) {
        $reason = 'Admin trừ tiền | Số tiền bị trừ là '. $KNCMS->format_cash($_POST['amount']). 'đ';
    }
    else {
        $reason = $_POST['reason']. ' | Số tiền bị trừ là '. $KNCMS->format_cash($_POST['amount']). 'đ';
    }
    trutien($einfo['Username'], $_POST['amount']);
    LogUser($eid, $reason);
    TelegramLog($_SESSION['admin_cloud3t']. " vừa trừ người dùng '".$einfo['Username']."' số tiền là ".$KNCMS->format_cash($_POST['amount']));
    $KNCMS->msg_success("Trừ tiền thành công", "", 1000);
}