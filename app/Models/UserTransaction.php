<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    protected $table = 'user_transactions';

    protected $fillable = [
        'order_id', 'user_id', 'order_amount', 'commission_amount', 'type', 'comment'
    ];
}
