<?php



if (isset($_POST['admin_login'])) {
    if (empty(($_POST['username']))) return $KNCMS->msg_error("Tên đăng nhập không được bỏ trống !!!", "", 1000);
    if (empty(($_POST['password']))) return $KNCMS->msg_error("Mật khẩu không được bỏ trống !!!", "", 1000);

    $username = $KNCMS->anti_text($_POST['username']);
    $password = $KNCMS->anti_text($_POST['password']);

    if (!check_rows("users", "Username", $username)) return $KNCMS->msg_error("Tài khoản không hợp lệ !!!", "", 1000);

    if ($password != $KNCMS->getUser($username)['Password']) return $KNCMS->msg_error("Mật khẩu không chính xác", "", 1000);

    if ($KNCMS->getUser($username)['Level'] == 3) {
        $_SESSION['admin_cloud3t'] = $username;
        $KNCMS->msg_success("Đăng nhập thành công", hUrl('Home'), 1000);
    }
}
