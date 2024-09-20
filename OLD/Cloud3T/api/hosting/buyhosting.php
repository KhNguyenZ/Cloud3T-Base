<?php
function generateRandomString($length = 10) {
    return bin2hex(random_bytes($length / 2));
}
function KNCMS_Random($length = 5, $password){
    $seed = "KNCMSseed0971920024abcdefghxyz".$password."KhNguyenZDeveloperDangFhatLamMinhDuong";
    $seedLengths = strlen($seed);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $seed[rand(0, $seedLengths - 1)];
    }
    return $randomString;
}
function buyhosting($user, $pass, $domain, $email, $plan_n)
{
    global $base_url;
    $data = array(
        'user' => $user,
        'pass' => $pass,
        'domain' => $domain,
        'email' => $email,
        'plan_n' => $plan_n
    );
    
    $url = $base_url.'api/hosting/hosting.php';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Bỏ qua kiểm tra SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Bỏ qua kiểm tra SSL
    
    curl_exec($ch);
}