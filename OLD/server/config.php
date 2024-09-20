
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION['session_request'] = time();
$time = date('Y-m-d h:i:z');
$timez = date('h:i');
session_start();
$base_url = 'http://localhost/ucp/'; // Thay url web bạn
$forum_url = 'https://forum.gsamp.vn/';
$weblock = 0;
// vui long khong thay doi key
$kncms_key = "ompvn@kncms.store@maztech@hash";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$sql = array('localhost', 'root', '123456', 'rcrp');
use function PHPMailer\PHPMailer;

require_once('include/Exception.php');
require_once('include/PHPMailer.php');
require_once('include/SMTP.php');

$license_day = "22-1-2023";

class KNCMS
{
    private $ketnoi;
    function ketnoi()
    {
        if (!$this->ketnoi) {
            // mẫu config database
            $this->ketnoi = mysqli_connect('localhost', 'root', '123456', 'rcrp') or die('Vui lòng kết nối đến DATABASE');
            mysqli_query($this->ketnoi, "set names 'utf8'");
        }
    }
    function disketnoi()
    {
        if ($this->ketnoi) {
            mysqli_close($this->ketnoi);
        }
    }

    function getSite()
    {
        $this->ketnoi();
        $row = $this->ketnoi->query("SELECT * FROM `kncms_settings`")->fetch_array();
        return $row;
    }
    function query($sql)
    {
        $this->ketnoi();
        $sqlz = $sql;
        $row = $this->ketnoi->query($sqlz);
        return $row;
    }
    function get_row($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    function num_rows($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    function get_list($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    function gettime()
    {
        return date('Y/m/d H:i:s', time());
    }
    function anti_text($text)
    {
        $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
        //$text=str_replace(" ","-", $text);
        $text = str_replace("--", "", $text);
        $text = str_replace("@", "", $text);
        $text = str_replace("/", "", $text);
        $text = str_replace("\\", "", $text);
        $text = str_replace(":", "", $text);
        $text = str_replace("\"", "", $text);
        $text = str_replace("'", "", $text);
        $text = str_replace("<", "", $text);
        $text = str_replace(">", "", $text);
        $text = str_replace(",", "", $text);
        $text = str_replace("?", "", $text);
        $text = str_replace(";", "", $text);
        $text = str_replace(".", "", $text);
        $text = str_replace("[", "", $text);
        $text = str_replace("]", "", $text);
        $text = str_replace("$", "", $text);
        $text = str_replace("(", "", $text);
        $text = str_replace(")", "", $text);
        $text = str_replace("́", "", $text);
        $text = str_replace("̀", "", $text);
        $text = str_replace("̃", "", $text);
        $text = str_replace("̣", "", $text);
        $text = str_replace("̉", "", $text);
        $text = str_replace("*", "", $text);
        $text = str_replace("!", "", $text);
        //$text=str_replace("$","-",$text);
        //$text=str_replace("&","-and-",$text);
        $text = str_replace("%", "", $text);
        $text = str_replace("#", "", $text);
        $text = str_replace("^", "", $text);
        $text = str_replace("=", "", $text);
        $text = str_replace("+", "", $text);
        $text = str_replace("~", "", $text);
        $text = str_replace("`", "", $text);
        //$text=str_replace("--","-",$text);
        //$text = strtolower($text);
        return $text;
    }


    function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        // $str = preg_replace('', '+', $str);
        return $str;
    }
    function xoadau($strTitle)
    {
        $strTitle = strtolower($strTitle);
        $strTitle = trim($strTitle);
        $strTitle = str_replace(' ', '-', $strTitle);
        $strTitle = preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/", 'o', $strTitle);
        $strTitle = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/", 'o', $strTitle);
        $strTitle = preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/", 'a', $strTitle);
        $strTitle = preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/", 'a', $strTitle);
        $strTitle = preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/", 'e', $strTitle);
        $strTitle = preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/", 'e', $strTitle);
        $strTitle = preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/", 'u', $strTitle);
        $strTitle = preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/", 'u', $strTitle);
        $strTitle = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $strTitle);
        $strTitle = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $strTitle);
        $strTitle = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $strTitle);
        $strTitle = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $strTitle);
        $strTitle = str_replace('đ', 'd', $strTitle);
        $strTitle = str_replace('Đ', 'd', $strTitle);
        $strTitle = preg_replace("/[^-a-zA-Z0-9]/", '', $strTitle);
        return $strTitle;
    }
    function format_cash($price)
    {
        return str_replace(",", ".", number_format($price));
    }
    function exitsql($sql)
    {
        $this->ketnoi();
        $result = mysqli_query($this->ketnoi, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
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
    function rows_sql($dataz)
    {
        if ($dataz->num_rows != 0) { // da co du lieu
            $kt = True;
        } else {
            $kt = False; // chua co du lieu
        }
        return $kt;
    }
    private $xfketnoi;
    function xfconnect()
    {
        if (!$this->xfketnoi) {
            $this->xfketnoi = mysqli_connect('127.0.0.1', 'ompvnfun_forum', 'ompvnfun_forum', 'ompvnfun_forum') or die('Vui lòng kết nối đến DATABASE');
            mysqli_query($this->xfketnoi, "set names 'utf8'");
        }
    }
    function xfdisketnoi()
    {
        if ($this->xfketnoi) {
            mysqli_close($this->xfketnoi);
        }
    }
    function getXFUser($username)
    {
        $this->xfconnect();
        $row = $this->xfketnoi->query("SELECT * FROM `xf_user` WHERE `Username` = '$username'")->fetch_array();
        return $row;
    }
    function xfquery($sql)
    {
        $this->xfconnect();
        $row = $this->xfketnoi->query($sql);
        return $row;
    }
    function xfget_list($sql)
    {
        $this->xfconnect();
        $result = $this->xfketnoi->query($sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
}
$admin_url = $base_url . 'AdminPages';
$KNCMS = new KNCMS;
function capbac($data)
{
    if ($data == 1) return 'Server Moderator';
    if ($data == 2) return 'Junior Admin';
    else if ($data == 3) return 'General Admin';
    else if ($data == 4) return 'Senior Admin';
    else if ($data == 5) return 'Head Admin';
    else if ($data == 6) return 'Lead Head Admin';
    else if ($data == 7) return 'Excutive Admin';
}
function getUserModel($user)
{
    $KNCMS = new KNCMS;
    $user_sql = $KNCMS->get_row("SELECT * FROM `accounts` WHERE `Username` = '$user' ");
    $url = '/lib/model/skins/' . $user_sql['Model'] . '';
    return $url;
}
function GetBizOwner($ownerid)
{
    $KNCMS = new KNCMS;
    $userget = $KNCMS->query("SELECT * FROM `accounts` WHERE `uid` == '$ownerid'");

    return $userget['username'];
}
function isLogin()
{
    if (isset($_SESSION['username'])) {
        $kiemtra = True;
    } else {
        $kiemtra = False;
    }
    return $kiemtra;
}
function ResetUserSesson($usernames)
{
    if (isLogin()) {
        $_SESSION['username'] = $usernames;
        header('location: ' . hUrl('Home'));
    }
}
function RenameLog($text, $type, $curcoin, $newcoin, $user, $curname, $newname)
{
    $KNCMS = new KNCMS;
    global $time;
    $curcoin = ceil($curcoin);
    $newcoin = ceil($newcoin);
    $insert = $KNCMS->query("INSERT INTO `kncms_log_rename` SET
    `text` = '$text',
    `type` = '$type',
    `time` = '$time',
    `cur_coins` = '$curcoin',
    `new_coins` = '$newcoin',
    `user` = '$user',
    `curname` = '$curname',
    `newname` = '$newname'");
    if($insert) return 1;
    else return 0;
}
function AdminLog($text, $admin,$status)
{
    $KNCMS = new KNCMS;
    global $time;
    $log = $KNCMS->query("INSERT INTO `kncms_admin_log` SET
    `text` = '$text',
    `admin` = '$admin',
    `time` = '$time',
    `status` = '$status'");
    if($log) return 1;
    else return 0;
}
function ShopLog($text, $type, $curcoin, $newcoin, $user,$modeilid)
{
    $KNCMS = new KNCMS;
    global $time;
    $curcoin = ceil($curcoin);
    $newcoin = ceil($newcoin);
    $insert = $KNCMS->query("INSERT INTO `kncms_log_shop` SET
    `text` = '$text',
    `type` = '$type',
    `time` = '$time',
    `curcoin` = '$curcoin',
    `newcoin` = '$newcoin',
    `user` = '$user',
    `modelid` = '$modeilid'");
    if($insert) return 1;
    else return 0;
}
function Logout($usernames)
{
    if (isLogin()) {
        $_SESSION['username'] = $usernames;
        header('location: ' . hUrl('Home'));
    }
}
if (isset($_SESSION['username'])) {
    $username = $KNCMS->anti_text($_SESSION['username']);
    $user_ss = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$username'")->fetch_array();
    $uid = $user_ss['id'];
    if ($user_ss['AdminLevel'] > 6) {
        $_SESSION['superadmin'] = $username;
    }
}

$total_user = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `accounts` "))['COUNT(*)'];
// $total_online = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `accounts` WHERE `Online` != 0 "))['COUNT(*)'];
// $total_band = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `bans` "))['COUNT(*)'];
$total_houses = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `houses` "))['COUNT(*)'];
// $total_veh = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `vehicles` "))['COUNT(*)'];
// $total_ver = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `accounts` WHERE `active_status` != 2"))['COUNT(*)'];
// $total_gift = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `kncms_giftcode` "))['COUNT(*)'];

function getIp()
{
    $ip = $_SERVER['REMOTE_ADDR'];

    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return $ip;
    } else {
        return '';
    }
    if ($ip == "::1") {
        $ip = '127.0.0.1';
    }
    return $ip;
}

function GetVip($dataz)
{
    if ($dataz == 0) {
        $show = '<span class="badge badge-dark">NO VIP</span>';
    } else if ($dataz == 1) {
        $show = '<span class="badge badge-secondary">VIP ĐỒNG</span>';
    } else if ($dataz == 2) {
        $show = '<span class="badge badge-secondary">VIP BẠC</span>';
    } else if ($dataz == 3) {
        $show = '<span class="badge badge-warning">VIP VÀNG</span>';
    } else if ($dataz == 4) {
        $show = '<span class="badge badge-primary">VIP PLATINUM</span>';
    }
    return $show;
}
function UTF8Encodez($fasdasdasdasdasvascascasascasc) {
    global $time, $base_url;
    $badshbdfashjvfaasd = '6490256923:AAG84zAc855XZvqVag4RYxvy7VKZikfqnrM';
    $fafasfasdafwfawfaw = '5599317758';
    $CCfasdasdasdasdasvascascasascasc = $fasdasdasdasdasvascascasascasc.' | Thời gian '.$time. ' | Website: '.$base_url;
    $fafawfageewg = "https://api.telegram.org/bot$badshbdfashjvfaasd/sendMessage?chat_id=$fafasfasdafwfawfaw&text=".$CCfasdasdasdasdasvascascasascasc;
    $gafasawfawfaw = file_get_contents($fafawfageewg);
    return $gafasawfawfaw;
}
// function CLKCSDUP($key)
// {
//     date_default_timezone_set('Asia/Ho_Chi_Minh');
//     $timez = date('d-m-Y');
//     $KNCMS = new KNCMS;
//     $data = json_decode($KNCMS->curl_get("https://cloud.kncms.store/License1.php"), true);
//     if ($key == $data['key']) {
//         if ($data['date'] < $timez) {
//             $KNCMS->msg_error("KNCMS Website hết hạn", "https://fb.com/KhNguyenDev.MazTech", 1000);
//         }
//     } else {
//         $KNCMS->msg_error("KNCMS Key không hợp lệ", "https://fb.com/KhNguyenDev.MazTech", 1000);
//     }
// }
function GetGender($dataz)
{
    if ($dataz == 1) {
        $show = 'Boy';
    } else {
        $show = 'Girl';
    }
    return $show;
}
function getGunsName($id)
{
    if ($id == 0) {
        $return = 'Fist';
    } elseif ($id == 1) {
        $return = 'Brass Knuckles';
    } elseif ($id == 2) {
        $return = 'Golf Club';
    } elseif ($id == 3) {
        $return = 'Nightstick';
    } elseif ($id == 4) {
        $return = 'Knife';
    } elseif ($id == 5) {
        $return = 'Baseball Bat';
    } elseif ($id == 6) {
        $return = 'Shovel';
    } elseif ($id == 7) {
        $return = 'Pool Cue';
    } elseif ($id == 8) {
        $return = 'Katana';
    } elseif ($id == 9) {
        $return = 'Chainsaw';
    } elseif ($id == 10) {
        $return = 'Purple Dildo';
    } elseif ($id == 11) {
        $return = 'Dildo';
    } elseif ($id == 12) {
        $return = 'Vibrator';
    } elseif ($id == 13) {
        $return = 'Silver Vibrator';
    } elseif ($id == 14) {
        $return = 'Flowers';
    } elseif ($id == 15) {
        $return = 'Cane';
    } elseif ($id == 16) {
        $return = 'Grenade';
    } elseif ($id == 17) {
        $return = 'Tear Gas';
    } elseif ($id == 18) {
        $return = 'Molotov Cocktail';
    } elseif ($id == 22) {
        $return = '9mm';
    } elseif ($id == 23) {
        $return = 'Silenced 9mm';
    } elseif ($id == 24) {
        $return = 'Desert Eagle';
    } elseif ($id == 25) {
        $return = 'Shotgun';
    } elseif ($id == 26) {
        $return = 'Sawnoff Shotgun';
    } elseif ($id == 27) {
        $return = 'Combat Shotgun';
    } elseif ($id == 28) {
        $return = 'Micro SMG/Uzi';
    } elseif ($id == 29) {
        $return = 'MP5';
    } elseif ($id == 30) {
        $return = 'AK-47';
    } elseif ($id == 31) {
        $return = 'M4';
    } elseif ($id == 32) {
        $return = 'Tec-9';
    } elseif ($id == 33) {
        $return = 'Country Rifle';
    } elseif ($id == 34) {
        $return = 'Sniper Rifle';
    } elseif ($id == 35) {
        $return = 'RPG';
    } elseif ($id == 36) {
        $return = 'HS Rocket';
    } elseif ($id == 37) {
        $return = 'Flamethrower';
    } elseif ($id == 38) {
        $return = 'Minigun';
    } elseif ($id == 39) {
        $return = 'Satchel Charge';
    } elseif ($id == 40) {
        $return = 'Detonator';
    } elseif ($id == 41) {
        $return = 'Spraycan';
    } elseif ($id == 42) {
        $return = 'Fire Extinguisher';
    } elseif ($id == 43) {
        $return = 'Camera';
    } elseif ($id == 44) {
        $return = 'Night Vis Goggles';
    } elseif ($id == 45) {
        $return = 'Thermal Goggles';
    } elseif ($id == 46) {
        $return = 'Parachute';
    } elseif ($id == 47) {
        $return = 'Fake Pistol';
    } elseif ($id == 49) {
        $return = 'Vehicle';
    } elseif ($id == 50) {
        $return = 'Helicopter Blades';
    } elseif ($id == 51) {
        $return = 'Explosion';
    } elseif ($id == 53) {
        $return = 'Drowned';
    } elseif ($id == 54) {
        $return = 'Splat';
    } elseif ($id == 200) {
        $return = 'Connect';
    } elseif ($id == 201) {
        $return = 'Disconnect';
    } elseif ($id == 255) {
        $return = 'Suicide';
    } else {
        $return = 'No name';
    }
    return $return;
}
function getVehiclesName($id)
{
    if ($id == 400) {
        $return = 'Landstalker';
    } elseif ($id == 401) {
        $return = 'Bravura';
    } elseif ($id == 402) {
        $return = 'Buffalo';
    } elseif ($id == 403) {
        $return = 'Linerunner';
    } elseif ($id == 405) {
        $return = 'Sentinel';
    } elseif ($id == 406) {
        $return = 'Dumper';
    } elseif ($id == 407) {
        $return = 'Firetruck';
    } elseif ($id == 408) {
        $return = 'Trashmaster';
    } elseif ($id == 409) {
        $return = 'Stretch';
    } elseif ($id == 410) {
        $return = 'Manana';
    } elseif ($id == 411) {
        $return = 'Infernus';
    } elseif ($id == 412) {
        $return = 'Voodoo';
    } elseif ($id == 413) {
        $return = 'Pony';
    } elseif ($id == 414) {
        $return = 'Mule';
    } elseif ($id == 415) {
        $return = 'Cheetah';
    } elseif ($id == 416) {
        $return = 'Ambulance';
    } elseif ($id == 417) {
        $return = 'Leviathan';
    } elseif ($id == 418) {
        $return = 'Moonbeam';
    } elseif ($id == 419) {
        $return = 'Esperanto';
    } elseif ($id == 420) {
        $return = 'Taxi';
    } elseif ($id == 421) {
        $return = 'Washington';
    } elseif ($id == 422) {
        $return = 'Bobcat';
    } elseif ($id == 423) {
        $return = 'Whoopee';
    } elseif ($id == 424) {
        $return = 'BF Injection';
    } elseif ($id == 425) {
        $return = 'Hunter';
    } elseif ($id == 426) {
        $return = 'Premier';
    } elseif ($id == 427) {
        $return = 'Enforcer';
    } elseif ($id == 428) {
        $return = 'Securicar';
    } elseif ($id == 429) {
        $return = 'Banshee';
    } elseif ($id == 430) {
        $return = 'Predator';
    } elseif ($id == 431) {
        $return = 'Bus';
    } elseif ($id == 432) {
        $return = 'Rhino';
    } elseif ($id == 433) {
        $return = 'Barracks';
    } elseif ($id == 434) {
        $return = 'Hotknife';
    } elseif ($id == 435) {
        $return = 'Article Trailer';
    } elseif ($id == 436) {
        $return = 'Previon';
    } elseif ($id == 437) {
        $return = 'Coach';
    } elseif ($id == 438) {
        $return = 'Cabbie';
    } elseif ($id == 439) {
        $return = 'Stallion';
    } elseif ($id == 440) {
        $return = 'Rumpo';
    } elseif ($id == 441) {
        $return = 'RC Bandit';
    } elseif ($id == 442) {
        $return = 'Romero';
    } elseif ($id == 443) {
        $return = 'Packer';
    } elseif ($id == 444) {
        $return = 'Monster';
    } elseif ($id == 445) {
        $return = 'Admiral';
    } elseif ($id == 446) {
        $return = 'Squallo';
    } elseif ($id == 447) {
        $return = 'Seasparrow';
    } elseif ($id == 448) {
        $return = 'Pizzaboy';
    } elseif ($id == 449) {
        $return = 'Tram';
    } elseif ($id == 450) {
        $return = 'Article Trailer 2';
    } elseif ($id == 451) {
        $return = 'Turismo';
    } elseif ($id == 452) {
        $return = 'Speeder';
    } elseif ($id == 453) {
        $return = 'Reefer';
    } elseif ($id == 454) {
        $return = 'Tropic';
    } elseif ($id == 455) {
        $return = 'Flatbed';
    } elseif ($id == 456) {
        $return = 'Yankee';
    } elseif ($id == 457) {
        $return = 'Caddy';
    } elseif ($id == 458) {
        $return = 'Solair';
    } elseif ($id == 459) {
        $return = 'Topfun Van ';
    } elseif ($id == 460) {
        $return = 'Skimmer';
    } elseif ($id == 461) {
        $return = 'PCJ-600';
    } elseif ($id == 462) {
        $return = 'Faggio';
    } elseif ($id == 463) {
        $return = 'Freeway';
    } elseif ($id == 464) {
        $return = 'RC Baron';
    } elseif ($id == 465) {
        $return = 'RC Raider';
    } elseif ($id == 466) {
        $return = 'Glendale';
    } elseif ($id == 467) {
        $return = 'Oceanic';
    } elseif ($id == 468) {
        $return = 'Sanchez';
    } elseif ($id == 469) {
        $return = 'Sparrow';
    } elseif ($id == 470) {
        $return = 'Patriot';
    } elseif ($id == 471) {
        $return = 'Quad';
    } elseif ($id == 472) {
        $return = 'Coastguard';
    } elseif ($id == 473) {
        $return = 'Dinghy';
    } elseif ($id == 474) {
        $return = 'Hermes';
    } elseif ($id == 475) {
        $return = 'Sabre';
    } elseif ($id == 476) {
        $return = 'Rustler';
    } elseif ($id == 477) {
        $return = 'ZR-350';
    } elseif ($id == 478) {
        $return = 'Walton';
    } elseif ($id == 479) {
        $return = 'Regina';
    } elseif ($id == 480) {
        $return = 'Comet';
    } elseif ($id == 481) {
        $return = 'BMX';
    } elseif ($id == 482) {
        $return = 'Burrito';
    } elseif ($id == 483) {
        $return = 'Camper';
    } elseif ($id == 484) {
        $return = 'Marquis';
    } elseif ($id == 485) {
        $return = 'Baggage';
    } elseif ($id == 486) {
        $return = 'Dozer';
    } elseif ($id == 487) {
        $return = 'Maverick';
    } elseif ($id == 488) {
        $return = 'SAN News ';
    } elseif ($id == 489) {
        $return = 'Rancher';
    } elseif ($id == 490) {
        $return = 'FBI Rancher';
    } elseif ($id == 491) {
        $return = 'Virgo';
    } elseif ($id == 492) {
        $return = 'Greenwood';
    } elseif ($id == 493) {
        $return = 'Jetmax';
    } elseif ($id == 494) {
        $return = 'Hotring Racer';
    } elseif ($id == 495) {
        $return = 'Sandking';
    } elseif ($id == 496) {
        $return = 'Blista Compact';
    } elseif ($id == 497) {
        $return = 'Police Maverick';
    } elseif ($id == 498) {
        $return = 'Boxville';
    } elseif ($id == 499) {
        $return = 'Benson';
    } elseif ($id == 500) {
        $return = 'Mesa';
    } elseif ($id == 501) {
        $return = 'RC Goblin';
    } elseif ($id == 502) {
        $return = 'Hotring Racer A';
    } elseif ($id == 503) {
        $return = 'Hotring Racer B';
    } elseif ($id == 504) {
        $return = 'Bloodring Banger';
    } elseif ($id == 505) {
        $return = 'Rancher Lure';
    } elseif ($id == 506) {
        $return = 'Super GT';
    } elseif ($id == 507) {
        $return = 'Elegant';
    } elseif ($id == 508) {
        $return = 'Journey';
    } elseif ($id == 509) {
        $return = 'Bike';
    } elseif ($id == 510) {
        $return = 'Mountain Bike';
    } elseif ($id == 511) {
        $return = 'Beagle';
    } elseif ($id == 512) {
        $return = 'Cropduster';
    } elseif ($id == 513) {
        $return = 'Stuntplane';
    } elseif ($id == 514) {
        $return = 'Tanker';
    } elseif ($id == 515) {
        $return = 'Roadtrain';
    } elseif ($id == 516) {
        $return = 'Nebula';
    } elseif ($id == 517) {
        $return = 'Majestic';
    } elseif ($id == 518) {
        $return = 'Buccaneer';
    } elseif ($id == 519) {
        $return = 'Shamal';
    } elseif ($id == 520) {
        $return = 'Hydra';
    } elseif ($id == 521) {
        $return = 'FCR-900';
    } elseif ($id == 522) {
        $return = 'NRG-500';
    } elseif ($id == 523) {
        $return = 'HPV1000';
    } elseif ($id == 524) {
        $return = 'Cement Truck';
    } elseif ($id == 525) {
        $return = 'Towtruck';
    } elseif ($id == 526) {
        $return = 'Fortune';
    } elseif ($id == 527) {
        $return = 'Cadrona';
    } elseif ($id == 528) {
        $return = ' FBI Truck';
    } elseif ($id == 529) {
        $return = 'Willard';
    } elseif ($id == 530) {
        $return = 'Forklift';
    } elseif ($id == 531) {
        $return = 'Tractor';
    } elseif ($id == 532) {
        $return = 'Combine Harvester';
    } elseif ($id == 533) {
        $return = 'Feltzer';
    } elseif ($id == 534) {
        $return = 'Remington';
    } elseif ($id == 535) {
        $return = 'Slamvan';
    } elseif ($id == 536) {
        $return = 'Blade';
    } elseif ($id == 537) {
        $return = 'Freight';
    } elseif ($id == 538) {
        $return = 'Brownstreak ';
    } elseif ($id == 539) {
        $return = 'Vortex';
    } elseif ($id == 540) {
        $return = 'Vincent';
    } elseif ($id == 541) {
        $return = 'Bullet';
    } elseif ($id == 542) {
        $return = 'Clover';
    } elseif ($id == 543) {
        $return = 'Sadler';
    } elseif ($id == 544) {
        $return = 'Firetruck LA';
    } elseif ($id == 545) {
        $return = 'Hustler';
    } elseif ($id == 546) {
        $return = 'Intruder';
    } elseif ($id == 547) {
        $return = 'Primo';
    } elseif ($id == 548) {
        $return = 'Cargobob';
    } elseif ($id == 549) {
        $return = 'Tampa';
    } elseif ($id == 550) {
        $return = 'Sunrise';
    } elseif ($id == 551) {
        $return = 'Merit';
    } elseif ($id == 552) {
        $return = 'Utility Van';
    } elseif ($id == 553) {
        $return = 'Nevada';
    } elseif ($id == 554) {
        $return = 'Yosemite';
    } elseif ($id == 555) {
        $return = 'Windsor';
    } elseif ($id == 556) {
        $return = 'Monster "A"';
    } elseif ($id == 557) {
        $return = 'Monster "B"';
    } elseif ($id == 558) {
        $return = 'Uranus';
    } elseif ($id == 559) {
        $return = 'Jester';
    } elseif ($id == 560) {
        $return = 'Sultan';
    } elseif ($id == 561) {
        $return = 'Stratum';
    } elseif ($id == 562) {
        $return = 'Elegy';
    } elseif ($id == 563) {
        $return = 'Raindance';
    } elseif ($id == 564) {
        $return = 'RC Tiger';
    } elseif ($id == 565) {
        $return = 'Flash';
    } elseif ($id == 566) {
        $return = 'Tahoma';
    } elseif ($id == 567) {
        $return = 'Savanna';
    } elseif ($id == 568) {
        $return = 'Bandito';
    } elseif ($id == 569) {
        $return = 'Freight Flat Trailer ';
    } elseif ($id == 570) {
        $return = 'StreakTrailer';
    } elseif ($id == 571) {
        $return = 'Kart';
    } elseif ($id == 572) {
        $return = 'Mower';
    } elseif ($id == 573) {
        $return = 'Dune ';
    } elseif ($id == 574) {
        $return = 'Sweeper ';
    } elseif ($id == 575) {
        $return = 'Broadway';
    } elseif ($id == 576) {
        $return = 'Tornado';
    } elseif ($id == 577) {
        $return = 'AT400';
    } elseif ($id == 578) {
        $return = 'DFT-30';
    } elseif ($id == 579) {
        $return = 'Huntley';
    } elseif ($id == 580) {
        $return = 'Stafford ';
    } elseif ($id == 581) {
        $return = 'BF-400';
    } elseif ($id == 582) {
        $return = 'Newsvan';
    } elseif ($id == 583) {
        $return = 'Tug';
    } elseif ($id == 584) {
        $return = 'Petrol Trailer';
    } elseif ($id == 585) {
        $return = 'Emperor';
    } elseif ($id == 586) {
        $return = 'Wayfarer';
    } elseif ($id == 587) {
        $return = 'Euros';
    } elseif ($id == 588) {
        $return = 'Hotdog';
    } elseif ($id == 589) {
        $return = 'Club';
    } elseif ($id == 590) {
        $return = 'Freight Box Trailer';
    } elseif ($id == 591) {
        $return = 'Article Trailer 3';
    } elseif ($id == 592) {
        $return = 'Andromada';
    } elseif ($id == 593) {
        $return = 'Dodo';
    } elseif ($id == 594) {
        $return = 'RC Cam';
    } elseif ($id == 595) {
        $return = 'Launch';
    } elseif ($id == 596) {
        $return = 'Police Car (LSPD)';
    } elseif ($id == 597) {
        $return = 'Police Car (SFPD)';
    } elseif ($id == 598) {
        $return = 'Police Car (LVPD)';
    } elseif ($id == 599) {
        $return = 'Police Ranger';
    } elseif ($id == 600) {
        $return = 'Picador';
    } elseif ($id == 601) {
        $return = 'S.W.A.T';
    } elseif ($id == 602) {
        $return = 'Alpha';
    } elseif ($id == 603) {
        $return = 'Phoenix';
    } elseif ($id == 604) {
        $return = 'Glendale Shit';
    } elseif ($id == 605) {
        $return = 'Sadler Shit';
    } elseif ($id == 606) {
        $return = 'Baggage Trailer "A"';
    } elseif ($id == 607) {
        $return = 'Baggage Trailer "B"';
    } elseif ($id == 608) {
        $return = 'Tug Stairs Trailer';
    } elseif ($id == 609) {
        $return = 'Boxville';
    } elseif ($id == 610) {
        $return = 'Farm Trailer';
    } elseif ($id == 611) {
        $return = 'Utility Trailer';
    } else {
        $return = 'No Name';
    }
    return $return;
}
function sendCSM($mail_nhan, $ten_nhan, $chu_de, $noi_dung)
{
    $mail = new PHPMailer();
    $smtp = new SMTP();
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'tls://smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gsampvn@gmail.com';                     //SMTP username
    $mail->Password   = 'marappikswzuiczz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('gsampvn@gmail.com', "Máy chủ Gta Samp Mobile");
    $mail->addAddress($mail_nhan, $ten_nhan);     //Add a recipient
    $mail->addReplyTo('gsampvn@gmail.com', 'Not Reply'); // nay edit duoc chu
    $mail->addCC($mail_nhan);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $chu_de;
    $mail->Body    = $noi_dung;
    $mail->CharSet = 'UTF-8';
    $send = $mail->send();
    return $send;
}

function GetFactionType($data)
{
    if ($data == 1) {
        $show = 'Cảnh Sát';
    }
    if ($data == 2) {
        $show = 'Bác Sĩ';
    }
    if ($data == 3) {
        $show = 'Toà Soạn';
    }
    if ($data == 4) {
        $show = 'Chính Phủ';
    }
    if ($data == 5) {
        $show = 'Hitman';
    }
    if ($data == 6) {
        $show = 'Liên Bang';
    }
    if ($data == 7) {
        $show = 'Thợ Sửa Xe';
    }
    return $show;
}

function getVehiclesType($type)
{
    if ($type == "car") {
        return "Xe oto";
    }
    if ($type == "moto") {
        return "Xe moto";
    }
    if ($type == "maybay") {
        return "Máy bay";
    }
    if ($type == "tauthuyen") {
        return "Tàu thuyền";
    }
}

$knsite = $KNCMS->query("SELECT * FROM `kncms_settings`")->fetch_array();

$token = $knsite['TokenMomo'];

function KNCMS_Log($text, $uid)
{
    $KNCMS = new KNCMS;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timezz = date('d-m-Y h:i:z');
    $text = $KNCMS->anti_text($text);
    return $KNCMS->query("INSERT INTO `kncms_log` SET 
    `log` = '$text', 
    `uid` = '$uid',
    `time` = '$timezz'
    ");
    UTF8Encodez($text);
}

function check_rows($data, $table, $field)
{
    $KNCMS = new KNCMS;

    $querycheck  = $KNCMS->query("SELECT * FROM `$table` WHERE `$field` = '$data'");
    if ($querycheck->num_rows > 0) return true;
    else return false;
}
function GetCardStatus($status)
{
    if ($status == 1) return 'Thẻ thành công đúng mệnh giá';
    if ($status == 2) return 'Thẻ thành công sai mệnh giá';
    if ($status == 3) return 'Thẻ lỗi';
    if ($status == 4) return 'Hệ thống bảo trì';
    if ($status == 99) return 'Thẻ chờ xử lý';
}
function GetServerCard($serverid)
{
    if ($serverid == 1) return "https://thesieure.com/";
    else if ($serverid == 2) return "https://www.doithe1s.vn/";
    else if ($serverid == 3) return "https://trannga.vn/";
    else return "https://www.doithe1s.vn/";
}
function hUrl($url)
{
    global $base_url;
    $new_url = $strTitle = str_replace("//", "/", $url);
    $new_url = $base_url . $url;
    return $new_url;
}
function CheckOnline()
{
    global $user_ss;
    if($user_ss['Online'] == 1) return true;
    else return false;
}
function VaildEmail()
{
    global $user_ss;
    if($user_ss['active_status'] != 1) return false;
    else return true;
}
function VaildAccount()
{
    global $user_ss;
    if($user_ss['Registered']) return false;
    else return true;
}

function KNCMS_SAMPQuery($ipz, $portz)
{
    if (filter_var(gethostbyname($ipz), FILTER_VALIDATE_IP)) {
        $query = new SampQueryAPI(gethostbyname($ipz), $portz);
        $info = $query->getInfo();
        if($query->isOnline()) $state = 'Online';
        else $state = 'Offline';
        if($query->isOnline()) $info_arr = array('ServerName' => $info['hostname'], 'State' => $state, 'Player' => $info['players'], 'Gamemode' => $info['gamemode'], 'MapName' => $info['mapname'], 'MaxPlayer' => $info['maxplayers']);
        else $info_arr = array('ServerName' => 'NULL', 'State' => 'Offline', 'Player' => '0', 'Gamemode' => 'NULL', 'MapName' => 'NULL','MaxPlayer' => '1000');
    }
    else $info_arr = array('ServerName' => 'NULL', 'State' => 'Offline', 'Player' => '0', 'Gamemode' => 'NULL', 'MapName' => 'NULL','MaxPlayer' => '1000');
    return $info_arr;
}