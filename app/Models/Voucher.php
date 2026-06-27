<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [

        'voucher_batch_id',

        'ticket_number',

        'code',

        'username',

        'password',

        'profile',

        'price',

        'validity',

        'ssid',

        'used',

        'used_at',

    ];

    protected $casts = [

        'used' => 'boolean',

        'used_at' => 'datetime',

    ];

    public function batch()
    {
        return $this->belongsTo(VoucherBatch::class, 'voucher_batch_id');
    }

    /**
     * Retourne le code unique à afficher sur le ticket.
     */
    public function connectionCode(): string
    {
        return $this->code;
    }

    /**
     * Vérifie si le ticket a déjà été utilisé.
     */
    public function isUsed(): bool
    {
        return (bool) $this->used;
    }
}