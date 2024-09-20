<?php
if(isset($_POST['add']))
{
    if(empty($_POST['voucher']) || empty($_POST['limit']) || empty($_POST['discount']) || $_POST['vtype'] == "") return $KNCMS->msg_warning("Không được bỏ trống thông tin!", "", 1000);
    $voucher = $_POST['voucher'];
    $limit = ceil($_POST['limit']);
    $discount = ceil($_POST['discount']);
    $type = ceil($_POST['vtype']);
    $code = "INSERT INTO `voucher` (`voucher`, `limit`, `discount`, `type`) VALUES ('$voucher', $limit,$discount, $type)";
    // echo $code;
    $add = $KNCMS->query($code);
    if($add) $KNCMS->msg_success("Thêm thành công", "", 1000);
}


if (isset($_GET['delete'])) {
    $KNCMS->query("DELETE FROM `voucher` WHERE `id` = " . ceil($_GET['delete']));
    $KNCMS->msg_success("Xóa thành công voucher số" . $_GET['delete'], hUrl('Control/Domain'), 1000);
}