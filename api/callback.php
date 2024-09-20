<?php

require_once '../modules/config.php';

function get_word_after_bank($description) {
    $pos = strpos($description, 'bank');
    if ($pos !== false) {
        $word_part = substr($description, $pos + strlen('bank'));
        
        $space_pos = strpos($word_part, ' ');

        if ($space_pos === false) {
            return $word_part;
        } else {
            return substr($word_part, 0, $space_pos);
        }
    }
    
    return null;
}
$token = '74a6615776d0c8196eb7ab4e5d03c348';
$result = $KNCMS->curl_get('https://api.sieuthicode.net/historyapimbbankv2/' . $token);
$result = json_decode($result, true);
foreach ($result['transactions'] as $naptien_data) {
    if ($naptien_data['type'] === "IN") {
        $mgd = $naptien_data['transactionID'];
        $sotien = $naptien_data['amount'];
        $content = get_word_after_bank($naptien_data['description']);
        // $content = 'bank1';
        if (!check_rows('trans_bank', 'mgd', $mgd)) {
            $userid = str_replace('bank', '', $content);
            if(check_rows('users', 'id', $userid))
            {
                $naptien = $KNCMS->query("SELECT * FROM `users` WHERE `id` ='$userid'")->fetch_array();
                $usernap = $naptien['Username'];
                $uid = $naptien['id'];
                $code = "INSERT INTO `trans_bank` (user, sotien, noidung, uid,status, mgd, createdtime) VALUES ('$usernap',$sotien,'$content',$uid ,1, '$mgd', '$time')";
                echo $code;
                $KNCMS->query($code);
                congtien($usernap, $sotien);
                // TelegramLog('Nap success User '. $usernap. 'Số tiền: '.$KNCMS->format_cash($sotien));
            }
        }
    }
}
