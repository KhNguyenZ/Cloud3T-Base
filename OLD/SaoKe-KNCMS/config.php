
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION['session_request'] = time();
$time = date('Y-m-d h:i:z');
$timez = date('h:i');
session_start();

$base_url = 'http://localhost/SaoKe-KNCMS/'; // Thay url web bạn
class KNCMS
{
    function format_cash($price)
    {
        return str_replace(",", ".", number_format($price));
    }
    function curl_get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);

        curl_close($ch);
        return $data;
    }
    function msg_success($text, $url, $time)
    {
        return die('<script type="text/javascript">Swal.fire("Thành Công", "' . $text . '","success");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
    }
    function msg_error($text, $url, $time)
    {
        return die('<script type="text/javascript">Swal.fire("Thất Bại", "' . $text . '","error");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
    }
    function msg_warning($text, $url, $time)
    {
        return die('<script type="text/javascript">Swal.fire("Thông Báo", "' . $text . '","warning");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
    }
}
$KNCMS = new KNCMS;
function hUrl($url)
{
    global $base_url;
    $new_url = str_replace("//", "/", $url);
    $new_url = $base_url . $url;
    return $new_url;
}
?>