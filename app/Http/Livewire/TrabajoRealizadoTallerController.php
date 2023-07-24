<?php

namespace App\Http\Livewire;

use App\Models\TrabajoRealizadoTaller;
use App\Models\Taller;
use App\Models\accesoriostaller;
use App\Models\Conductor;
use App\Models\Vehiculos;
use App\Models\tallerdetalle;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class TrabajoRealizadoTallerController extends Component
{
    use WithPagination;

    public $TrabajoName, $search, $selected_id, $pageTitle, $componentName, $check = [];

    public $fecha_ingreso, $fecha_salida, $name, $vehiculo, $responsable, $taller_id,
        $dependencia, $placa, $km_ingreso, $km_salida, $descripcion, $observacion;

    //select2
    public $vehiculoselectedId, $vehiculoselectedName, $vehiculodatos;

    //numero de filas por pagina
    private $pagination = 5;

    //traer el paginacion de bootstrap
    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    //agregar las propiedades del componente
    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Trabajo Realizado';
        $this->vehiculoselectedName = 'Elegir';

    }

    public function render()
    {
         //validar si el usuario ingreso informacion
         if (strlen($this->search) > 0)
         $trabajo = TrabajoRealizadoTaller::where('placa', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
         $trabajo = TrabajoRealizadoTaller::orderBy('id', 'asc')->paginate($this->pagination);


     $this->vehiculodatos = Taller::leftJoin('trabajo_realizado_tallers as tr', 'tr.taller_id', 'tallers.id')
        ->select('tallers.*')
        ->whereNull('taller_id')
        ->orderby('id', 'desc')
        ->get();

    //dd($this->vehiculodatos);
     //dd($this->vehiculodatos);

     //dd($this->vehiculoselectedName);

     return view('livewire.TrabajoRealizadoTaller.component', [
         'trabajor' => $trabajo,
         'vehiculodatos' => $this->vehiculodatos,
         'conductor' => Conductor::orderby('name', 'asc')->get()
     ])
         //extender de layouts
         ->extends('layouts.theme.app')
         //renderizarse
         ->section('content');
    }

    public function trabajodatos(Request $request){
       // dd($request);
        $datoRecibido = $request->input('id');
        //dd($datoRecibido);
        $findvehiculo = taller::where('id', $datoRecibido)
        ->first();
    //dd($findvehiculo);
    $this->placa = $findvehiculo->placa;
    $this->vehiculo = $findvehiculo->vehiculo;
    $this->dependencia = $findvehiculo->dependencia;
    $this->render();
    //$this->emit('show-modal', 'open!');
    
    }
    public function resetUI()
    {
        //dd($this->check);
        $this->TrabajoName = '';
        $this->fecha_ingreso = '';
        $this->fecha_salida = '';
        $this->name = '';
        $this->vehiculo = '';
        $this->dependencia = '';
        $this->responsable = '';
        $this->placa = '';
        $this->check = [];
        $this->search = '';
        $this->selected_id = 0;
        $this->vehiculoselectedName = null;
        $this->km_ingreso = '';
        $this->km_salida = '';
        $this->descripcion = '';
        $this->observacion=' ';

        $this->resetValidation();
        $this->resetPage();

        $this->emit('trabajos-close', 'taller cerrar');
        //dd($this->check);
    }

    public function Edit(TrabajoRealizadoTaller $trabajosr)
    {
        $this->selected_id = $trabajosr->id;
        $this->vehiculo = $trabajosr->vehiculo;
        $this->placa = $trabajosr->placa;
        $this->responsable = $trabajosr->responsable;
        $this->dependencia = $trabajosr->dependencia;
        $this->fecha_ingreso = $trabajosr->fecha_ingreso;
        $this->fecha_salida = $trabajosr->fecha_salida;
        $this->km_ingreso = $trabajosr->km_ingreso;
        $this->km_salida = $trabajosr->km_salida;
        $this->descripcion = $trabajosr->descripcion;
        $this->observacion = $trabajosr->observaciones;

        $this->emit('show-modal', 'open!');
    }

    public function create_trabajo()
    {
        //dd("hola");
        // dd($this->TallerName,
        // $this->ingreso,
        // $this->salida,
        // $this->fecha_ingreso,
        // $this->fecha_salida,
        // $this->name,
        // $this->vehiculo,
        // $this->color,
        // $this->dependencia,
        // $this->placa,
        // $this->kilometraje,
        // $this->ordentrabajo,
        // $this->check);
        $rules = [
            'dependencia' => 'required|min:3',
            'responsable' => 'required|min:3',
            'descripcion' => 'required|min:3'
        ];

        $messages =[
            'dependencia.required' => 'Ingrese la dependencia',
            'dependencia.min' => 'Dependencia debe tener al menos 3 caracteres',
            'responsable.required' => 'Agregue el responsable',
            'responsable.min' => 'responsable debe tener al menos 3 caracteres',
            'descripcion.required' => 'Es requerido la orden de trabajo a realizar',
            'descripcion.min' => 'Orden de Trabajo debe tener al menos 3 caracteres'
        ];
        //validar los datos
        $this->validate($rules, $messages);
        //dd($this->responsable);
        
          //crear el usuario
        $trabajosr = TrabajoRealizadoTaller::create([
            'vehiculo' => $this->vehiculo,
            'placa' => $this->placa,
            'responsable' => $this->responsable,
            'dependencia' => $this->dependencia,
            'fecha_ingreso' => $this->fecha_ingreso,
            'fecha_salida' => $this->fecha_salida,
            'km_ingreso' => $this->km_ingreso,
            'km_salida' => $this->km_salida,
            'descripcion' => $this->descripcion,
            'observaciones' => $this->observacion,
            'taller_id' => $this->taller_id,
        ]);

        $this->resetUI();
        $this->emit('trabajo-added', 'Reporte Diario Registrado');
    }

    public function UpdateTrabajo()
    {
        $rules = [
            'dependencia' => 'required|min:3',
            'responsable' => 'required|min:3',
            'descripcion' => 'required|min:3'
        ];

        $messages =[
            'dependencia.required' => 'Ingrese la dependencia',
            'dependencia.min' => 'Dependencia debe tener al menos 3 caracteres',
            'responsable.required' => 'Agregue el responsable',
            'responsable.min' => 'responsable debe tener al menos 3 caracteres',
            'descripcion.required' => 'Es requerido la orden de trabajo a realizar',
            'descripcion.min' => 'Orden de Trabajo debe tener al menos 3 caracteres'
        ];

        //validamos 
        $this->validate($rules, $messages);
        $trabajosr = TrabajoRealizadoTaller::find($this->selected_id);
        $trabajosr->Update([
            'responsable' => $this->responsable,
            'fecha_ingreso' => $this->fecha_ingreso,
            'fecha_salida' => $this->fecha_salida,
            'km_ingreso' => $this->km_ingreso,
            'km_salida' => $this->km_salida,
            'descripcion' => $this->descripcion,
            'observaciones' => $this->observacion,
        ]);

        
 
         $this->resetUI();
         $this->emit('trabajo-updated', 'Reporte Diario Actualizado');
    }


    public function showDatos()
    {


        $this->fecha_ingreso = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->ingreso = Carbon::parse(Carbon::now())->format('H:i');
        //dd($this->vehiculoselectedId);
        //dd($this->vehiculoselectedName, $this->vehiculoselectedId);
        $findvehiculo = taller::where('id', $this->vehiculoselectedId)
            ->first();
        //dd($findvehiculo);
        $this->placa = $findvehiculo->placa;
        $this->vehiculo = $findvehiculo->vehiculo;
        $this->dependencia = $findvehiculo->dependencia;
        $this->taller_id = $findvehiculo->id;
        
        /* //obtencion de los accesorios que tiene el vehiculo
        //para traer el id del ultimo taller del vehiculo que se tiene el id
        $ultivehiculo = Taller::where('vehiculo_id', 3)
        ->orderBy('id', 'desc')
        ->first();

        $acctalleres = accesoriostaller::orderBy('id', 'asc')->get();

        //dd($acctaller);
        //foreach para agregar si tiene el checked
        foreach ($acctalleres as $tall) {
            //buscado el id del taller
            //dd($tallerherr->id);
            //obtenemos todos los id de las herramientas que tiene el taller id
            $tallerherramientas = tallerdetalle::where('vehiculo_id', $this->vehiculoselectedId)->get();
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

        $this->acctaller = $acctalleres;*/
    }
}
