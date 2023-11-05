<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAssignment extends Model
{
    protected $table = 'job_assignments';

    protected $fillable = [
        'unique_id', 'order_id', 'vendor_id', 'amount', 'tax_amount', 'total_amount', 'status'
    ];
}
