<?php

namespace App\Services;

use App\Models\Router;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;

class HotspotService
{
    /**
     * Crée une connexion API au MikroTik.
     */
    protected function client(Router $router): Client
    {
        $config = new Config([
            'host'    => $router->ip,
            'user'    => $router->username,
            'pass'    => $router->password,
            'port'    => $router->api_port,
            'timeout' => 30,
        ]);

        return new Client($config);
    }

    /**
     * Liste des serveurs Hotspot.
     */
    public function servers(Router $router): array
    {
        $client = $this->client($router);

        return $client
            ->query(new Query('/ip/hotspot/print'))
            ->read();
    }

    /**
     * Liste des profils Hotspot.
     */
    public function profiles(Router $router): array
    {
        $client = $this->client($router);

        return $client
            ->query(new Query('/ip/hotspot/profile/print'))
            ->read();
    }

    /**
     * Liste des utilisateurs Hotspot.
     *
     * ATTENTION :
     * Si le MikroTik contient plusieurs milliers d'utilisateurs,
     * cette commande peut provoquer un timeout.
     * Nous ajouterons une pagination dans la prochaine version.
     */
    public function users(Router $router): array
    {
        $client = $this->client($router);

        return $client
            ->query(new Query('/ip/hotspot/user/print'))
            ->read();
    }

    /**
     * Liste des utilisateurs actuellement connectés.
     */
    public function activeUsers(Router $router): array
    {
        $client = $this->client($router);

        return $client
            ->query(new Query('/ip/hotspot/active/print'))
            ->read();
    }
}