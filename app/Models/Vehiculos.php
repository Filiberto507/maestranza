<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable=['placa','clase','marca','tipo_vehiculo','color','combustible_capacidad',
                         'motor','chasis','modelo','cilindrada','estado','dependencias_id'];

    public function diagnostico()
    {
        
        return $this->belongsTo(Diagnostico::class);
 
    }
=======
    protected $fillable=['placa','modelo','marca','color','año','cilindrada','chasis','motor','dependencias_id','conductors_id'];

    public function taller()
    {
        return $this->hasMany(taller::class);

    }

    
>>>>>>> 28c9ba3e4fa59a190db3b7933bb417cc0b58c6e0
}
