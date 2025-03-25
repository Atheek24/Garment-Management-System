<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable = [
        'order_id',
        'material_cost',
        'labor_cost',
        'machine_cost',
        'total_cost',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
