<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'name',
        'unitCost',
        'quantityInStock',
        'unit'
    ];

    public function garments()
    {
        return $this->belongsToMany(Garment::class, 'garment_materials')->withPivot('quantity_needed');
    }
}
