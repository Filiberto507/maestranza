<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importar todo lo requerido para el pdf
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
//modelos
use App\Models\Conductor;
use App\Models\Vehiculos;
use App\Models\Taller;
use App\Models\tallerdetalle;
use App\Models\accesoriostaller;


class ExportController extends Controller
{
    public $check=[];
    public function reportPDF($id)
    {

        $tallerdatos = Taller::find($id);
        //datos para el reporte
        $fecha_ingreso = $tallerdatos->fecha_ingreso;
        $fecha_salida = $tallerdatos->fecha_salida;
        $hora_ingreso = $tallerdatos->ingreso;
        $hora_salida = $tallerdatos->salida;
        $nombre = $tallerdatos->name;
        $vehiculo = $tallerdatos->vehiculo;
        $color = $tallerdatos->color;
        $dependencia = $tallerdatos->dependencia;
        $placa = $tallerdatos->placa;
        $kilometraje = $tallerdatos->kilometraje;

        //obtener los checks
        $acctalleres = accesoriostaller::orderBy('id', 'asc')->get();

        //dd($acctaller);
        //foreach para agregar si tiene el checked
        foreach ($acctalleres as $tall) {
            //buscado el id del taller
            //dd($tallerherr->id);
            //obtenemos todos los id de las herramientas que tiene el taller id
            $tallerherramientas = tallerdetalle::where('taller_id', $tallerdatos->id)->get();
            //dd($tallerherramientas);

            //buscamos si existe esa herramienta agregado o no
            $obtenercheck = $tallerherramientas->where('acctaller_id', $tall->id)->first();
            //dump($obtenercheck);
            //exists sirve para obtener valor en boleano
            //$this->roles()->where('nombre', $nombreRol)->exists();

            // verificar si tenemos datos en obtenercheck
            if ($obtenercheck) {
                //dump($obtenercheck->acctaller_id);
                $addcheck = accesoriostaller::find($obtenercheck->acctaller_id);
                //dump($addcheck);
                $tall->checked = 1;
                $this->check[] =
                    $addcheck->id . ", " .
                    $addcheck->name;

                //$acctalleres->pull($tall->id);
            }
        }

        //la funcion chunk divide el segmento segun el rango especificado
        $segmentos = $acctalleres->chunk($acctalleres->count() / 3);
        //dd($segmentos);

        $primeros10 = $segmentos[0];
        $segundos10 = $segmentos[1];
        //la funcion collect + concat ayudar a concadenar una coleccion
        $ultimos10 = collect($segmentos[2])->concat($segmentos[3]);


        //validar la palabra user
        //$user = $id == 0 ? 'Todos' : User::find($userId)->name;
        //usar lo importado del PDF
        //loadView = pasando la vista
        $pdf = PDF::loadView('pdf.reporte1', compact('tallerdatos','hora_ingreso', 'hora_salida', 'fecha_ingreso', 'fecha_salida' , 'primeros10', 
        'segundos10', 'ultimos10', 'nombre', 'vehiculo', 'color', 'dependencia', 'placa', 'kilometraje'));
        //visualizar en el navegador
        return $pdf->stream('salesReport.pdf'); 
        //para descargar el reporte en pdf
        //return $pdf->download('salesReport.pdf');
    }
}
