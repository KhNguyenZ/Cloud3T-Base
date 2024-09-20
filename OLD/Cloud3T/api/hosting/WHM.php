<?php
require $_SERVER['DOCUMENT_ROOT'] ."/api/vendor/autoload.php";
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/WHM.php');
use PreviewTechs\cPanelWHM\WHM\Accounts;
use PreviewTechs\cPanelWHM\WHMClient;
use PreviewTechs\cPanelWHM\Entity\Account;
use GuzzleHttp\Client;
$whm_username = "mnsssarpxyz";
$whm_pass = "pQPLTWV4GKmQ6aOwEKNU";
$whm_token = "GC509OKB7K5DIRQC9BEO2IV42M4937M1";
$whm_url = "ns.cloud3t.com";

$whmClient = new WHMClient($whm_username, $whm_token, $whm_url, 2087);
$accounts = new Accounts($whmClient);
function CreateHosting($user, $pass, $domain, $email, $plan)
{
    global $whmClient,$accounts;
    global $KNCMS, $whm_username, $whm_token, $whm_url;
    $account = new Account();
    $account->setUser($user);
    $account->setDomain($domain);
    $account->setPassword($pass);
    $account->setEmail($email);
    $account->setPlanName($plan);
    $result = $accounts->create($account);

    if($result['raw_output'] == "Account Creation Ok"){
        $code = "UPDATE `user_hosting` SET `status` = '1' WHERE `domain` = '$domain'";
        echo $code;
        $KNCMS->query($code);
        echo 'success';
        return 1;
    }
    else{
        echo 'error';
        return 0;
    }
}

function UpgaredHosting($user, $plan, $price, $username)
{
    global $whmClient,$accounts;
    if(!IsValidHost($user)) return 0;
    global $whm_username, $whm_token, $whm_url, $uid;
    trutien($username, $price);
    $planz = $whm_username.'_'.strtolower($plan);
    $result = $accounts->changePlan($user,$planz);
    if($result['metadata']['reason'] == "OK") {
        LogUser($uid, 'Bạn vừa nâng cấp hosting lên gói'. $plan);
        return 1;
    }
    else return 0;
}

function ChangeHostPassword($user, $newPassword)
{
    global $whmClient,$accounts;
    $result = $accounts->changePassword($user, $newPassword, null, true);
    if(!empty($result)) return 1;
    else return 0;
}

function DeleteHost($user)
{
    global $accounts;
    $result = $accounts->remove($user);
    if($result === true) return 1;
    else return 0;
}

function FastLogin($user)
{
    global $accounts; 
    $result = $accounts->createUserSession($user);
    return $result['data']['url'];
}