<?php
function CheckDomain($domain)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.tuanori.vn/domain.php?domain=' . $domain,
        CURLOPT_USERAGENT => 'TRUY VẤN TÊN MIỀN',
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
    ));
    $ketqua = curl_exec($curl);

    curl_close($curl);
    $ketqua = json_decode($ketqua, true);

    if ($ketqua['status'] == true) {
        return $ketqua['true'];
    } else if ($ketqua['status'] == false) {
        return -1;
    }
}
