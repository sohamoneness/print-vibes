<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignCategory extends Model
{
    protected $table = 'design_categories';

    protected $fillable = [
        'category_id', 'design_id'
    ];
}
