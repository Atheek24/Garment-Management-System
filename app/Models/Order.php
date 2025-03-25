<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'garment_id',
        'status',
        'size',
        'quantity',
        'created_by',
        'order_date',
        'due_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }
}
