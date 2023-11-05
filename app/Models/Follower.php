<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'followers';

    protected $fillable = [
        'user_id', 'followed_by'
    ];

    //hasOne relation with User Model
    public function followed_by(){
        return $this->hasOne(User::class, 'id', 'followed_by');
    }
}
