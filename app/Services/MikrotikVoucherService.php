<?php

namespace App\Services;

use App\Models\Router;
use App\Models\Voucher;
use App\Models\VoucherBatch;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;

class MikrotikVoucherService
{
    protected function client(Router $router): Client
    {
        return new Client(new Config([
            'host'    => $router->ip,
            'user'    => $router->username,
            'pass'    => $router->password,
            'port'    => $router->api_port,
            'timeout' => 30,
        ]));
    }

    /**
     * Génère un code aléatoire.
     */
    protected function generateCode(string $prefix, int $length): string
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

        do {

            $code = strtoupper($prefix);

            for ($i = 0; $i < $length; $i++) {

                $code .= $characters[random_int(0, strlen($characters) - 1)];

            }

        } while (Voucher::where('code', $code)->exists());

        return $code;
    }

    /**
     * Génère le prochain numéro de ticket.
     */
    protected function nextTicketNumber(): string
    {
        $last = Voucher::max('ticket_number');

        if (!$last) {
            return '000001';
        }

        return str_pad(((int) $last) + 1, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Génère le prochain numéro de lot.
     */
    protected function nextBatchNumber(): string
    {
        $last = VoucherBatch::max('batch_number');

        if (!$last) {
            return 'LOT000001';
        }

        $number = (int) str_replace('LOT', '', $last);

        return 'LOT' . str_pad($number + 1, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Création d'un lot complet.
     */
    public function createBatch(
        Router $router,
        string $profile,
        int $quantity,
        string $prefix,
        int $length,
        float $price = 0,
        ?string $comment = null
    ): VoucherBatch {

        $batch = VoucherBatch::create([

            'router_id'    => $router->id,
            'batch_number' => $this->nextBatchNumber(),
            'profile'      => $profile,
            'quantity'     => $quantity,
            'prefix'       => $prefix,
            'length'       => $length,
            'price'        => $price,
            'comment'      => $comment,

        ]);

        $client = $this->client($router);

        for ($i = 0; $i < $quantity; $i++) {

            $code = $this->generateCode($prefix, $length);

            $ticket = $this->nextTicketNumber();

            $query = new Query('/ip/hotspot/user/add');

            $query
                ->equal('name', $code)
                ->equal('password', $code)
                ->equal('profile', $profile);

            $client->query($query)->read();

            Voucher::create([

                'voucher_batch_id' => $batch->id,

                'ticket_number'    => $ticket,

                'code'             => $code,

                'username'         => $code,

                'password'         => $code,

                'profile'          => $profile,

                'price'            => $price,

                'validity'         => null,

                'ssid'             => null,

            ]);
        }

        return $batch;
    }
}