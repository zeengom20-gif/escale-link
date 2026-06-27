<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherBatch extends Model
{
    protected $fillable = [

        'router_id',

        'batch_number',

        'profile',

        'quantity',

        'prefix',

        'length',

        'price',

        'validity',

        'ssid',

        'comment',

    ];

    protected $appends = [

        'total_amount',

    ];

    public function router()
    {
        return $this->belongsTo(Router::class);
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function getTotalAmountAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function usedCount()
    {
        return $this->vouchers()->where('used', true)->count();
    }

    public function unusedCount()
    {
        return $this->vouchers()->where('used', false)->count();
    }
}