<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
       'unique_id', 'user_id', 'name', 'email', 'address', 'location', 'country', 'city', 'pin', 'state', 'amount', 'coupon_code', 'discounted_amount', 'delivery_charge', 'packing_price', 'tax_amount', 'total_amount', 'status', 'transaction_id', 'payment_status'
    ];
}
