<?php

if(isset($_POST['edit_service']))
{
    $name = $_POST['name'];
    $content = base64_decode($_POST['content']);
    $id = $_POST['edit_service'];
    $KNCMS->query("UPDATE `dichvu` SET `dichvu` = '$name', `content` = '$content' WHERE `id` = '$id'");
    $KNCMS->msg_success("Thành công", "", 1000);
}

