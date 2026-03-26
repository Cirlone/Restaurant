<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'stripe_payment_intent_id',
        'stripe_session_id',
        'status',
        'subtotal',
        'discount',
        'delivery_fee',
        'total',
        'voucher_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}