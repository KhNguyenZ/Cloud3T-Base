<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/domain/checkdomain.php';
if(isset($_POST['buyhosting']))
{
    if(empty($_POST['domain'])) $KNCMS->msg_warning("Vui lòng nhập tên miền!", "", 1000);
    if(check_rows('user_domains','domain', $_POST['domain'])) $KNCMS->msg_warning("Tên miền đã tồn tại trên hệ thống", "", 1000);
    $code = "SELECT * FROM `domain` WHERE `id` = ".$_POST['buyhosting'];
    $dinfo = $KNCMS->query($code)->fetch_array();
    
    if(!empty($_POST['voucher']))
    {
        if(!check_rows('voucher', 'voucher', $_POST['voucher'])) return $KNCMS->msg_warning("Voucher này không tồn tại", "", 1000);

        $vinfo = GetVoucher($_POST['voucher']);

        if($vinfo['type'] != 1) return $KNCMS->msg_warning("Voucher này không dùng cho domain", "", 1000);
        if($vinfo['limit'] <= 0) return $KNCMS->msg_warning("Voucher này đã hết lượt sử dụng", "", 1000);
        $price = round($dinfo['price'] * ($vinfo['discount']/100));
    }
    else $price = $dinfo['price'];

    if($KNCMS->getUser($_SESSION['username'])['Cash'] < $price) $KNCMS->msg_warning("Bạn không đủ tiền để thực hiện giao dịch", "", 1000);
    if(CheckDomain($_POST['domain'].$dinfo['domain']) == 1) $KNCMS->msg_warning("Bạn không thể mua 1 tên miền đang tồn tại", "", 1000);
    trutien($_SESSION['username'], $price);
    $user = $KNCMS->getUser($_SESSION['username'])['id'];
    $domain = $_POST['domain'].$dinfo['domain'];
    $buytime = date('Y-m-d h:i:s');
    $time_exp = date('Y-m-d h:i:s', strtotime('+1 year'));
    $type_domain = $dinfo['type'];
    $buydomain = $KNCMS->query("INSERT INTO `user_domains` (user, domain, buytime, time, status, type) VALUE ($user, '$domain', '$buytime', '$time_exp', 0,$type_domain)");
    $update_v = $KNCMS->query("UPDATE `voucher` SET `limit` = `limit`-1 WHERE `voucher` = '".$_POST['voucher']."'");
    TelegramLog('Thông báo đơn hàng mới [Domain] | Domain: '.$domain.' | Loại: '. GetDomainType($type_domain).' | Giá: '.$KNCMS->format_cash($price));
    if($buydomain) $KNCMS->msg_success("Bạn đã mua thành công tên miền ".$domain.".Vui lòng chờ xét duyệt nhé !".$price, "Domain", 1000);
}