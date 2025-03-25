<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{
    protected $fillable = [
        'name',
        'design',
        'category',
        'sizes',
        'basePrice',
        'status',
        'laborHoursPerUnit',
        'hourlyLaborRate',
    ];

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'garment_materials')->withPivot('quantity_needed');
    }

    public function machines()
    {
        return $this->belongsToMany(Machine::class, 'garment_machines');
    }
}
