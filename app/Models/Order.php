<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'status',
        'total',
        'user_id',
    ];

    protected $table = 'orders';
}