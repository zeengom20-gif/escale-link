<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $fillable = [
        'name',
        'ip',
        'api_port',
        'username',
        'password',
        'ssl',
        'identity',
        'routeros_version',
        'board_name',
        'status'
    ];

    protected $casts = [
        'password' => 'encrypted',
        'ssl' => 'boolean',
        'status' => 'boolean',
    ];
}