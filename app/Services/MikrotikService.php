<?php

namespace App\Services;

use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;

class MikrotikService
{
    public function test(array $router)
    {
        try {

            $config = new Config([
                'host' => $router['ip'],
                'user' => $router['username'],
                'pass' => $router['password'],
                'port' => $router['api_port'],
            ]);

            $client = new Client($config);

            $query = new Query('/system/resource/print');

            $response = $client->query($query)->read();

            return [
                'success' => true,
                'data' => $response[0]
            ];

        } catch (\Throwable $e) {

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];

        }
    }
}