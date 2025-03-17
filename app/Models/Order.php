<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'product_name',
        'price',
        'quantity',
        'total',
        'user_id',
        'order_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment(){
        return $this->hasOne(Payment::class, 'order_id');
    }
}
