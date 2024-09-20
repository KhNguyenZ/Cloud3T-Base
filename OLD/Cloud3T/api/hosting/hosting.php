<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/modules/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/buyhosting.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/hosting/WHM.php');
$user = $_POST['user'];
$pass = $_POST['pass'];
$domain = $_POST['domain'];
$email = $_POST['email'];
$plan_n = $_POST['plan_n'];
CreateHosting($user, $pass, $domain, $email, $plan_n);