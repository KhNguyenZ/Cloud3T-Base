<?php

/**
 * Script Name: Pterodactyl - PHP Thuần
 * Description: Script hỗ trợ cho site làm hosting Minecraft
 * Author: Khôi Nguyên (https://www.facebook.com/KhNguyenZ.Dev)
 * Date: 3-7-2024
 */
class Pterodactyl
{
    private $apiKey;
    private $apiUrl;
    private $api_urls;
    private $main_url = 'https://panel.nctcraft.io.vn/';

    public function __construct()
    {
        $this->apiKey = 'ptla_Q7HFnlFoOri0NPwuOCpIXxqktJZX2pBNX2RrtdsKWT0';
        $this->api_urls = [
            'createServer' => $this->apiurl('api/application/servers'),
            'createUser' => $this->apiurl('api/application/users')
        ];
    }

    private function apiurl($ext)
    {
        return rtrim($this->main_url, '/') . '/' . ltrim($ext, '/');
    }
    private function Pterodactyl_API($url, $data = null, $method = 'POST')
    {
        $headers = [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        } elseif ($method === 'GET') {
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $result = [
            'httpcode' => $httpCode,
            'response' => json_decode($response, true)
        ];
        return $result;
    }

    public function checkUserExists($email)
    {
        $filter = ['filter[email]' => $email];
        $headers = [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        $url = $this->api_urls['createUser'] . '?' . http_build_query($filter);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpCode == 200) {
            $data = json_decode($response, true);
            if ($data['data']) return 1;
            else return 0;
        } else return -1;
    }

    public function createUser($email, $username, $name, $password, $last_name)
    {
        $data = [
            'email' => $email,
            'username' => $username,
            'first_name' => $name,
            'last_name' => $last_name,
            'password' => $password,
            'language' => 'en',
            '2fa' => false,
            'root_admin' => false
        ];

        $result = $this->Pterodactyl_API($this->api_urls['createUser'], $data);
        $response = $result['response'];
        if (!empty($response['attributes']['uuid'])) $status = 'success';
        else $status = 'error';
        $details = [];
        foreach ($response['detail']['errors'] as $error) {
            if (isset($error['detail'])) {
                $details[] = $error['detail'];
            }
        }
        $trave = [
            'status' => $status,
            'uuid' => $response['attributes']['uuid'] ?? null,
            'id' => $response['attributes']['id'] ?? null,
        ];
        return json_encode($trave);
    }
    public function createServer($name, $userId, $description, $docker, $startup_cmd, $version, $cpu, $memory, $disk)
    {
        $dataz = [
            'name' => $name,
            'user' => ceil($userId),
            'description' => $description,
            'start_on_completion' => false,
            'node_id' => 1,
            'allocation' => [
                'default' => $this->getDefaultAllocation('1')
            ],
            'limits' => [
                'memory' => $memory,
                'swap' => 0,
                'disk' => $disk,
                'io' => 500,
                'cpu' => $cpu,
            ],
            'feature_limits' => [
                'databases' => 1,
                'allocations' => 1,
                'backups' => 0
            ],
            'egg' => 1,
            'docker_image' => $docker,
            'startup' => $startup_cmd,
            'environment' => [
                'MINECRAFT_VERSION' => $version,
                'SERVER_JARFILE' => 'server.jar',
                'DL_PATH' => '',
                'BUILD_NUMBER' => 'latest'
            ]
        ];

        $result = $this->Pterodactyl_API($this->api_urls['createServer'], $dataz);
        if ($result['httpcode'] == ceil(201)) $status = 'success';
        else $status = 'error';
        $trave = [
            'status' => $status,
            'id' => $result['response']['attributes']['id'],
            'uuid' => $result['response']['attributes']['uuid'],
            'action' => $result['response']['attributes']['status'],
            'response' => $result['response']
        ];
        return json_encode($trave);
    }
    public function getServerDetails($serverId)
    {
        $url = $this->api_urls['createServer'] . '/' . $serverId;
        $result = $this->Pterodactyl_API($url, null, 'GET');

        if ($result['httpcode'] == 200) {
            return $result['response'];
        } else {
            return 0;
        }
    }
    public function getAllocations($nodeId)
    {
        $url = $this->main_url . "api/application/nodes/{$nodeId}/allocations";
        $result = $this->Pterodactyl_API($url, '', 'GET');

        if ($result['httpcode'] == 200) {
            return $result['response'];
        } else {
            throw new Exception("Failed to get allocations. HTTP Status Code: " . $result['httpcode'] . " Response: " . json_encode($result['response']));
        }
    }
    public function getDefaultAllocation($nodeId)
    {
        $allocations = $this->getAllocations($nodeId);

        if (!empty($allocations['data'])) {
            foreach ($allocations['data'] as $allocation) {
                if (!$allocation['attributes']['assigned']) {
                    return $allocation['attributes']['id'];
                }
            }
        } else {
            throw new Exception("No allocations found for node ID: " . $nodeId);
        }

        throw new Exception("No available allocations found for node ID: " . $nodeId);
    }
}
