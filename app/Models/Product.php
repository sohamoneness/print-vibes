<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public function DesignData(){
    	return $this->belongsTo(\App\Models\Design::class, 'design_id', 'id');
    }
}
