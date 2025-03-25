<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = [
        'name',
        'type',
        'status',
        'hourlyRate',
    ];

    public function garments()
    {
        return $this->belongsToMany(Garment::class, 'garment_machines');
    }
}
