<?php



if(isset($_POST['login']))
{
    if(empty(($_POST['username']))) return $KNCMS->msg_error("Tên đăng nhập không được bỏ trống !!!", hUrl("Auth/Login"), 1000);
    if(empty(($_POST['password']))) return $KNCMS->msg_error("Mật khẩu không được bỏ trống !!!", hUrl("Auth/Login"), 1000);

    $username = $KNCMS->anti_text($_POST['username']);
    $password = $KNCMS->anti_text($_POST['password']);

    if(!check_rows("users", "Username", $username)) return $KNCMS->msg_error("Tài khoản không hợp lệ !!!", hUrl("Auth/Login"), 1000);

    if($password != $KNCMS->getUser($username)['Password'])return $KNCMS->msg_error("Mật khẩu không chính xác", hUrl("Auth/Login"), 1000);


    $_SESSION['username'] = $username;
    $KNCMS->query("UPDATE `users` SET `LastLogin` = '$time' WHERE `Username` = '$username'");
    $KNCMS->msg_success("Đăng nhập thành công", hUrl('Home'), 1000);
}