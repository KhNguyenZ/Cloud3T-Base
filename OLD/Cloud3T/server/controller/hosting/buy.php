<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/buyhosting.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/WHM.php');
if (isset($_POST['buyhosting'])) {
    if (empty($_POST['domain'])) $KNCMS->msg_warning("Vui lòng nhập tên miền!", "", 1000);
    $host = $KNCMS->query("SELECT * FROM `hosting` WHERE `id` = '$hid'")->fetch_array();
    if (check_rows('user_hosting', 'domain', $_POST['domain'])) $KNCMS->msg_warning("Tên miền đã tồn tại trong hệ thống", "", 1000);
    
    if(!empty($_POST['voucher']))
    {
        if(!check_rows('voucher', 'voucher', $_POST['voucher'])) return $KNCMS->msg_warning("Voucher này không tồn tại", "", 1000);

        $vinfo = GetVoucher($_POST['voucher']);
        if($vinfo['type'] != 2) return $KNCMS->msg_warning("Voucher này không dùng cho hosting", "", 1000);
        if($vinfo['limit'] <= 0) return $KNCMS->msg_warning("Voucher này đã hết lượt sử dụng", "", 1000);
        $price = round($host['price'] * ($vinfo['discount']/100));
    }
    else $price = $host['price'];

    $email = $KNCMS->getUser($_SESSION['username'])['Email'];
    if($KNCMS->getUser($_SESSION['username'])['Cash'] < $price) $KNCMS->msg_warning("Bạn không đủ tiền để thực hiện giao dịch này", "", 1000);
    trutien($_SESSION['username'], $price);
    $domain = $_POST['domain'];
    $user = 'h' . XoaKiTuDacBiet($domain);
    $pass = KNCMS_Random(15, 'khnguyendevz' . $domain);
    $createdtime = date('Y-m-d');
    $expiredtime = date('Y-m-d', strtotime('+1 month +3 days'));
    $plan = $host['package'];
    $plan_n = $whm_username . "_" . strtolower($plan);
    $uid = $KNCMS->getUser($_SESSION['username'])['id'];
    if (empty($email)) $KNCMS->msg_warning("Bạn chưa cập nhật email", "", 1000);
    $buy = $KNCMS->query("INSERT INTO `user_hosting` (user, pass, createdtime, expiredtime, status, email, domain, plan, uid) VALUES ('$user', '$pass','$createdtime', '$expiredtime', 0, '$email', '$domain', '$plan', $uid)");
    $update_v = $KNCMS->query("UPDATE `voucher` SET `limit` = `limit`-1 WHERE `voucher` = '".$_POST['voucher']."'");
    TelegramLog('Thông báo đơn hàng mới [Hosting] | Domain: '.$domain.' | Gói: '. $plan.' | Giá: '.$KNCMS->format_cash($price));
    echo '<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            title: "Thành công!",
            text: "Bạn đã mua hosting thành công, hãy đợi hosting được kích hoạt trong 1-3 phút.\nNhấn OK để tiếp tục!",
            icon: "success",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "' . $base_url . 'api/hosting/hosting.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            var response = xhr.responseText.trim();
                            if (response.includes("success")) {
                                Swal.fire({
                                    title: "Kích hoạt thành công!",
                                    text: "Hosting của bạn đã được kích hoạt thành công.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                });
                            } else {
                                Swal.fire({
                                    title: "Lỗi!",
                                    text: "Đã xảy ra lỗi khi kích hoạt hosting. Vui lòng thử lại sau.Response:"+ response,
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            }
                        } else {
                            Swal.fire({
                                title: "Lỗi!",
                                text: "Đã xảy ra lỗi khi gọi API.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    }
                };
                var data = "user=' . urlencode($user) . '&pass=' . urlencode($pass) . '&domain=' . urlencode($domain) . '&email=' . urlencode($email) . '&plan_n=' . urlencode($plan_n) . '";
                xhr.send(data);
            }
        });
    });
</script>';
}
