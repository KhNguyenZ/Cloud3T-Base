<?php
if(isset($_POST['add']))
{
    if(empty($_POST['domain']) || empty($_POST['price']) || $_POST['dtype'] == "") return $KNCMS->msg_warning("Không được bỏ trống thông tin!", "", 1000);
    $domain = $_POST['domain'];
    $price = ceil($_POST['price']);
    $type = ceil($_POST['dtype']);
    $code = "INSERT INTO `domain` (domain, price, type) VALUES ('$domain', $price, $type)";
    $add = $KNCMS->query($code);
    if($add) $KNCMS->msg_success("Thêm thành công", "", 1000);
}


if (isset($_GET['delete'])) {
    $KNCMS->query("DELETE FROM `domain` WHERE `id` = " . ceil($_GET['delete']));
    $KNCMS->msg_success("Xóa thành công domain số" . $_GET['delete'], hUrl('Control/Domain'), 1000);
}