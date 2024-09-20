<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/buyhosting.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/WHM.php');
if(isset($_POST['upgrade']))
{
    $hinfo = GetUserHost($_POST['upgrade']);
    $select = $_POST['upgrade_form'];
    $hprice = $KNCMS->query("SELECT * FROM `hosting` WHERE `package` = '$select'")->fetch_array();
    if(UpgaredHosting($hinfo['user'], strtoupper($select), $hprice['price'], $_SESSION['username']))
    {
        $KNCMS->query("UPDATE `user_hosting` SET `plan` = '$select' WHERE `user` = '".$hinfo['user']."'");
        $KNCMS->msg_success("Nâng cấp thành công", hUrl('User/Manage/Hosting/'. $_POST['upgrade']), 1000);
    }
}

if(isset($_POST['giahan']))
{
    $uhost = GetUserHost($_POST['giahan']);
    $hprice = $KNCMS->query("SELECT * FROM `hosting` WHERE `package` = '".$uhost['plan']."'")->fetch_array();
    if($hprice['price'] > $userinfo['Cash']) $KNCMS->msg_warning("Bạn không đủ tiền để thực hiện thao tác này", "", 1000);
    trutien($userinfo['Username'], $hprice['price']);
    $expiredtime = strtotime($uhost['expiredtime']);
    $giahan = strtotime('+1 month', $expiredtime);
    $giahan = date('Y-m-d', $giahan);
    $KNCMS->query("UPDATE `user_hosting` SET `expiredtime` = '$giahan' WHERE `id` =". $uhost['id']);
    LogUser($uid, 'Bạn đã gia hạn hosting '. $uhost['domain'].' với giá là '. $KNCMS->format_cash($hprice['price']).'đ');
    $KNCMS->msg_success("Gia hạn thành công", "", 1000);
}
if(isset($_POST['forgetpass']))
{
    $uhost = GetUserHost($_POST['forgetpass']);
    $newpass = KNCMS_Random(20, $uhost['pass']);
    if(ChangeHostPassword($uhost['user'], $newpass))
    {
        $forgetpass = $KNCMS->query("UPDATE `user_hosting` SET `pass` = '$newpass' WHERE `id` = ".$uhost['id']);
        $KNCMS->msg_success("Đặt lại mật khẩu thành công !", "", 1000);
    }
    return 1;
}

if(isset($_POST['deletehost']))
{
    if(DeleteHost($user)) echo json_encode('success');
}