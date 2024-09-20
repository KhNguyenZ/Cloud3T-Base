<?php

if(isset($_POST['post_host']))
{
    if(empty($_POST['name']) || empty($_POST['package']) || empty($_POST['price']) || empty($_POST['content'])) 
    {
        $KNCMS->msg_error("Không được bỏ trống thông tin", "", 1000);
    }
    $name = $_POST['name']; $package = $_POST['package']; $price = $_POST['price'];$content = $_POST['content'];
    $code = "INSERT INTO `hosting` (title , package, price, content) VALUES ('$name', '$package', '$price', '$content')";
    $post = $KNCMS->query($code);
    if($post) $KNCMS->msg_success("Đăng thành công", "", 1000);
}

