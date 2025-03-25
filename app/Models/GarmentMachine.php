<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GarmentMachine extends Model
{
    protected $fillable = [
        'garment_id',
        'machine_id',
        'hoursRequired',
    ];

    public function garment()
    {
        return $this->belongsTo(Garment::class, 'garment_id');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id');
    }
}
