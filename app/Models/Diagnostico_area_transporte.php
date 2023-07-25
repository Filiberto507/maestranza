<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico_area_transporte extends Model
{
    use HasFactory;
    protected $fillable=['fecha','conclusion','dependencia','conductor','vehiculos_id'];

    public function diagnostico_servicio()
    {
        return $this->hasMany(Diagnostico_servicio::class);

    }
    public function vehiculos()
    {
        return $this->hasMany(Vehiculos::class);

    }
}
