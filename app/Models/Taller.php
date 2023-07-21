<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;

    protected $fillable = [
       'ingreso', 'salida', 'fecha_ingreso','fecha_salida', 'name','vehiculo','color','dependencia','placa','kilometraje','ordentrabajo', 'vehiculo_id'
    ];

    public function tallerdetalle()
    {
        return $this->hasMany(tallerdetalle::class);

    }

    public function vehiculos()
    {
        return $this->belongsTo(Vehiculos::class);

    }

    public function estadovehiculo()
    {
        return $this->hasMany(Estadovehiculo::class);

    }

    public function trabajoreazliado()
    {
        return $this->belongsTo(TrabajoRealizadoTaller::class);

    }
}
