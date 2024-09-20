<?php
$name = 'TRAN KHOI NGUYEN';
$stk = '4523151108';
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php');
function GetQRNapTien($amount, $noidung)
{
    global $stk, $name;
    $bank_name = str_replace(' ', '%20', $name);
    $api_url = "https://api.vietqr.io/image/970422-$stk-saeowhL.jpg?accountName=$bank_name&amount=$amount&addInfo=$noidung";
    return $api_url;
}
if (isset($_GET['amount']) && isset($_GET['noidung'])) { ?>
    <center>
        <img src="<?= GetQRNapTien($_GET['amount'], $_GET['noidung']) ?>" />
        <h1>STK: <?=$stk?></h1>
        <h1>Tên: <?=$name?></h1>
        <h1>Số tiền: <?=$KNCMS->format_cash($_GET['amount'])?>đ</h1>
        <h1>Nội dung: <?=$_GET['noidung']?></h1>
    </center>
<?php } ?>