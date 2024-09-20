<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/domain/checkdomain.php';
if (isset($_POST['check'])) {
    if (empty($_POST['domain'])) return $KNCMS->msg_error("Không được bỏ trống tên miền", "", 1000);
    $info = CheckDomain($_POST['domain']);
    if ($info == 0) {
        echo '<div class="alert alert-success" role="alert">
                Miền này chưa được đăng ký !
                </div>';
    } else if ($info == 1) {
        echo '<div class="alert alert-danger" role="alert">
                Miền này đã được đăng ký !
                </div>';
    } else {
    echo '<div class="alert alert-warning" role="alert">
            Miền này không thể kiểm tra !
            </div>';
}
}
