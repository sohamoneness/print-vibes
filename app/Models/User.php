<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'mobile', 'email', 'otp','password', 'country', 'city', 'type', 'status', 'is_deleted'
    ];

}
