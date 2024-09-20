<?php 
require $_SERVER['DOCUMENT_ROOT'].'/modules/config.php';

foreach($KNCMS->get_list("SELECT * FROM `user_hosting` WHERE `status` = '0'") as $host)
{
    $result[] = $host;
}

echo $result;