<?php



if(isset($_POST['register']))
{
    if(empty(($_POST['username']))) return $KNCMS->msg_error("Tên đăng nhập không được bỏ trống !!!", hUrl("Auth/Register"), 1000);
    if(empty(($_POST['password']))) return $KNCMS->msg_error("Mật khẩu không được bỏ trống !!!", hUrl("Auth/Register"), 1000);
    if(empty(($_POST['email']))) return $KNCMS->msg_error("Email không được bỏ trống !!!", hUrl("Auth/Register"), 1000);
    if(empty(($_POST['repassword']))) return $KNCMS->msg_error("Xác nhận mật khẩu không được bỏ trống !!!", hUrl("Auth/Register"), 1000);

    $username = $KNCMS->anti_text($_POST['username']);
    $password = $KNCMS->anti_text($_POST['password']);
    $email = $_POST['email'];
    $repassword = $KNCMS->anti_text($_POST['repassword']);
    if($password != $repassword) return $KNCMS->msg_error("Xác nhận mật khẩu không chính xác !!!", hUrl("Auth/Register"), 1000);
    if(strlen($password) < 6) return $KNCMS->msg_error("Mật khẩu phải lớn hơn 6 kí tự !!!", hUrl("Auth/Register"), 1000);

    if(check_rows("users", "Username", $username)) return $KNCMS->msg_error("Tài khoản đã tồn tại !!!", hUrl("Auth/Register"), 1000);
    if(check_rows("users", "Email", $email)) return $KNCMS->msg_error("Email đã tồn tại !!!", hUrl("Auth/Register"), 1000);


    $reg = $KNCMS->query("INSERT INTO `users` SET 
    `Username` = '$username', 
    `Password` = '$password',
    `email` = '$email'");
    if($reg) return $KNCMS->msg_success("Đăng kí tài khoản thành công, hãy đăng nhập lại bạn nhé !!!", hUrl("Auth/Login"), 1000);
}