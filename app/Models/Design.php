<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $table = 'designs';

    protected $fillable = [
        'title', 'image', 'description', 'tags', 'user_id', 'status', 'is_mature_content'
    ];
}
