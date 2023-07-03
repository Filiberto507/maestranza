<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;
    protected $fillable=['placa','modelo','marca','color','año','cilindrada','chasis','motor','dependencias_id','conductors_id'];
}
