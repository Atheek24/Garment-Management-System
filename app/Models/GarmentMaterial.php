<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GarmentMaterial extends Model
{
    protected $fillable = [
        'garment_id',
        'material_id',
        'quantity_needed',
    ];

    public function garment()
    {
        return $this->belongsTo(Garment::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
