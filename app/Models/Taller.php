<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;

    protected $fillable = [
       'ingreso', 'salida', 'fecha_ingreso','fecha_salida', 'name','vehiculo','color','dependencia','placa','kilometraje','ordentrabajo'
    ];

    public function tallerdetalle()
    {
        return $this->hasMany(tallerdetalle::class);

    }
}
