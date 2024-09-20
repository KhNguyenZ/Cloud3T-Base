<?php
require $_SERVER['DOCUMENT_ROOT'] . '/api/minecraft/api.php';

$apiKey = 'ptla_Q7HFnlFoOri0NPwuOCpIXxqktJZX2pBNX2RrtdsKWT0';
$pterodactyl = new Pterodactyl();
$pterodactyl->createServer('DMM', '1', 'MC Test', 'ghcr.io/pterodactyl/yolks:java_21', 'java -Xms1024M -XX:MaxRAMPercentage=95.0 -jar {{SERVER_JARFILE}}', '1.21','1','1024','1024');

// echo var_dump($pterodactyl->getDefaultAllocation('1'));
?>
<!-- 
KNCMS 2023-2024
Copyright 
          Website Developer - Khôi Nguyên (https://facebook.com/KhNguyenDev.MazTech)
-->