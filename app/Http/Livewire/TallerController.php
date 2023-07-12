<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Taller;
use App\Models\accesoriostaller;
use App\Models\Conductor;
use App\Models\Vehiculos;
use App\Models\tallerdetalle;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\Estadovehiculo;
use DB;

class TallerController extends Component
{
    use WithPagination;

    public $TallerName, $search, $selected_id, $pageTitle, $componentName, $check = [];
    public $ingreso, $salida, $fecha_ingreso, $fecha_salida, $name, $vehiculo, $color,
        $dependencia, $placa, $kilometraje, $ordentrabajo, $acctaller, $acctaller2;
    //select2
    public $vehiculoselectedId, $vehiculoselectedName, $vehiculodatos;

    //estado de vehiculo img
    public $estadovehiculo = [];


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
        $this->componentName = 'Taller';
        $this->vehiculoselectedName = 'Elegir';

        //dd($this->ingreso, $this->fecha_ingreso);
        //     $this->check=[
        //         "12, Estuche de Herramientas",
        // "18, Luz de Placa"
        //     ];
    }
    public function render()
    {
        //validar si el usuario ingreso informacion
        if (strlen($this->search) > 0)
            $Taller = Taller::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $Taller = Taller::orderBy('id', 'desc')->paginate($this->pagination);
        $this->acctaller = accesoriostaller::orderBy('id', 'asc')->get();

        $this->vehiculodatos = Vehiculos::join('dependencias as d', 'd.id', 'vehiculos.dependencias_id')
            ->select('vehiculos.*', 'd.nombre as dependencia')
            ->orderby('id', 'desc')
            ->get();

        //dd($this->vehiculodatos);

        //dd($this->vehiculoselectedName);

        return view('livewire.taller.component', [
            'taller' => $Taller,
            'acctaller' => $this->acctaller,
            'vehiculodatos' => $this->vehiculodatos,
            'conductor' => Conductor::orderby('name', 'asc')->get()
        ])
            //extender de layouts
            ->extends('layouts.theme.app')
            //renderizarse
            ->section('content');
    }

    public function resetUI()
    {
        //dd($this->check);
        $this->TallerName = '';
        $this->ingreso = '';
        $this->salida = '';
        $this->fecha_ingreso = '';
        $this->fecha_salida = '';
        $this->name = '';
        $this->vehiculo = '';
        $this->color = '';
        $this->dependencia = '';
        $this->placa = '';
        $this->kilometraje = '';
        $this->ordentrabajo = '';
        $this->check = [];
        $this->search = '';
        $this->selected_id = 0;
        $this->vehiculoselectedName = null;
        $this->estadovehiculo = [];

        $this->resetValidation();
        $this->resetPage();

        $this->emit('tallers-close', 'taller cerrar');
        //dd($this->check);
    }

    public function checks()
    {
        dd($this->check);
    }

    public function create_taller()
    {
        // dd($this->vehiculoselectedId);
        // para eliminar casillas que esten vacias
        // dd($this->estadovehiculo);
        foreach ($this->estadovehiculo as $value) {

            if ($value["descripcion"] == "") {
                $this->estadovehiculo = array_filter($this->estadovehiculo, function ($value) {
                    return !empty($value["descripcion"]);
                });
            }
        }
        //dd($this->estadovehiculo);
        //dd($this->acctaller);
        //dd($this->check);
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
        try {
            //guardar
            $talleres = Taller::create([

                'ingreso' => $this->ingreso,
                'salida' => $this->salida,
                'fecha_ingreso' => $this->fecha_ingreso,
                'name' => $this->name,
                'vehiculo' => $this->vehiculo,
                'color' => $this->color,
                'dependencia' => $this->dependencia,
                'placa' => strtoupper($this->placa),
                'kilometraje' => $this->kilometraje,
                'ordentrabajo' => $this->ordentrabajo,
                'vehiculo_id' => $this->vehiculoselectedId,
                //'user_id' => Auth()->user()->id
            ]);
            //dd($talleres);
            //validar si se guardo
            if ($talleres) {
                //guardar detalle de recepcion
                $items = $this->check;
                //dump($items);
                foreach ($items as $item) {
                    //dump(explode(',', $item)[0]);
                    //explide -> divide una cadena usando un separador que definas en este caso la ,
                    tallerdetalle::create([

                        'acctaller_id' => explode(',', $item)[0],
                        'taller_id' => $talleres->id
                    ]);
                }

                //estado vehiculo
                foreach ($this->estadovehiculo as $key => $value) {
                    //agregamos a la tabla 
                    Estadovehiculo::create([
                        'descripcion' => $value["descripcion"],
                        'taller_id' => $talleres->id,
                        'key' => $key
                    ]);
                }
            }
            //confirma la transaccion
            DB::commit();

            //limpiar el carrito y reinicar las variables


            $this->emit('taller-ok', 'recepcion registrada con exito');
            //$this->emit('print-ticket', $talleres->id);
            $this->resetUI();
        } catch (Exception $e) {
            //borrar las acciones incompletas
            DB::rollback();
            $this->emit('taller-error', $e->getMessage());
        }
    }

    protected $listeners =[
        'destroy' => 'Destroy',
        'resetUI' => 'resetUi'
    ];

    public function Edit(Taller $taller)
    {
        //dd($this->check);
        //dd($taller);

        $this->selected_id = $taller->id;
        $this->ingreso = $taller->ingreso;
        $this->salida = $taller->salida;
        $this->fecha_ingreso = $taller->fecha_ingreso;
        $this->fecha_salida = $taller->fecha_salida;
        $this->name = $taller->name;
        $this->vehiculo = $taller->vehiculo;
        $this->color = $taller->color;
        $this->dependencia = $taller->dependencia;
        $this->placa = $taller->placa;
        $this->kilometraje = $taller->kilometraje;
        $this->ordentrabajo = $taller->ordentrabajo;
        //separar el texto para el pdf
        $separador = "\n"; // Usar salto de línea
        $separada = explode($separador, $this->ordentrabajo);
        //dd($separada);
        $acctalleres = accesoriostaller::orderBy('id', 'asc')->get();

        //dd($acctaller);
        //foreach para agregar si tiene el checked
        foreach ($acctalleres as $tall) {
            //buscado el id del taller
            $tallerid = Taller::find($this->selected_id);
            //dd($tallerherr->id);
            //obtenemos todos los id de las herramientas que tiene el taller id
            $tallerherramientas = tallerdetalle::where('taller_id', $tallerid->id)->get();
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

        //separar el arreglo
        //$acctalleres = range(1, 30); // Arreglo con 30 elementos
        //dd($acctalleres);


        //la funcion chunk divide el segmento segun el rango especificado
        $segmentos = $acctalleres->chunk($acctalleres->count() / 3);
        //dd($segmentos);

        $primeros10 = $segmentos[0];
        $segundos10 = $segmentos[1];
        //la funcion collect() + ->concat() ayudar a concadenar una coleccion
        $ultimos10 = $segmentos[2];

        //dd($primeros10, $segundos10, $ultimos10);

        //dd($this->check);
        $this->acctaller = $acctalleres;
        //dd($this->acctaller);

        //traer las descripciones de los estados del vehiculo

        $datosestadovehiculo = Estadovehiculo::where('taller_id', $this->selected_id)->get();

        foreach ($datosestadovehiculo as $value) {
            $this->estadovehiculo[$value->key] = [
                'descripcion' => $value->descripcion,
            ];
        }
        //dd($this->estadovehiculo);
        $this->emit('show-modal', 'open!');
    }

    public function UpdateTaller()
    {
        foreach ($this->estadovehiculo as $value) {

            if ($value["descripcion"] == "") {
                $this->estadovehiculo = array_filter($this->estadovehiculo, function ($value) {
                    return !empty($value["descripcion"]);
                });
            }
        }

        //dd($this->estadovehiculo);
        //buscar por el id
        $talleres = Taller::find($this->selected_id);

        try {
            //guardar
            $talleres->update([

                'ingreso' => $this->ingreso,
                'salida' => $this->salida,
                'fecha_ingreso' => $this->fecha_ingreso,
                'fecha_salida' => $this->fecha_salida,
                'name' => $this->name,
                'vehiculo' => $this->vehiculo,
                'color' => $this->color,
                'dependencia' => $this->dependencia,
                'placa' => $this->placa,
                'kilometraje' => $this->kilometraje,
                'ordentrabajo' => $this->ordentrabajo,
                //'user_id' => Auth()->user()->id
            ]);
            //dd($talleres->id);
            //validar si se guardo
            if ($talleres) {
                //actualizar detalle de checkbox de recepcion
                //dd($this->selected_id);
                $itemscheck = tallerdetalle::where('taller_id', $this->selected_id)->get();
                $this->agregarcheck($itemscheck, $this->check, $this->selected_id);
                $checksnuevos = $this->check;
                $this->eliminarcheck($itemscheck, $this->check);
                //dd($this->check);
                //dump($items);

                //actualizar estado vehiculo
                $comentestado = Estadovehiculo::where('taller_id', $this->selected_id)->get();
                //dd($comentestado);
                $this->agregarestadoauto($comentestado, $this->estadovehiculo, $this->selected_id);
                $this->eliminarestadoauto($comentestado, $this->estadovehiculo, $this->selected_id);
            }
            //confirma la transaccion
            DB::commit();

            //limpiar el carrito y reinicar las variables


            $this->emit('taller-ok', 'recepcion actualizada con exito');
            //$this->emit('print-ticket', $talleres->id);
            $this->resetUI();
        } catch (Exception $e) {
            //borrar las acciones incompletas
            DB::rollback();
            $this->emit('taller-error', $e->getMessage());
        }
    }

    public function Destroy($id)
    {
       // dd($id);
        //defininar permisos 
        //cantidad de permisos que tiene
        tallerdetalle::where('taller_id', $id)->delete();
        Estadovehiculo::where('taller_id', $id)->delete();
        Taller::find($id)->delete();
        
        $this->emit('taller-deleted', 'Se elimino la RECEPCION DE VEHICULO con exito');
        
    }

    public function showDatos()
    {


        $this->fecha_ingreso = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->ingreso = Carbon::parse(Carbon::now())->format('H:i');
        //dd($this->vehiculoselectedId);
        //dd($this->vehiculoselectedName, $this->vehiculoselectedId);
        $findvehiculo = Vehiculos::join('dependencias as d', 'd.id', 'vehiculos.dependencias_id')
            ->select('vehiculos.*', 'd.nombre as dependencia')
            ->where('vehiculos.id', $this->vehiculoselectedId)
            ->first();
        //dd($findvehiculo);
        $this->placa = $findvehiculo->placa;
        $this->vehiculo = $findvehiculo->marca;
        $this->color = $findvehiculo->color;

        /* //obtencion de los accesorios que tiene el vehiculo
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

    //crear arrays para los diferentes columnas que seran como 11 y cada array tendra el id al lugar
    //que pertenece para luego realizar un array merger e insertar todos los datos en descripcion-vehiculo

    //funcion para eliminar los checks que se quitaron
    public function eliminarcheck($checksbd, $checksnuevos)
    {

        foreach ($checksbd as $item) {
            $datonuevo = null;
            foreach ($checksnuevos as $value) {

                if ($item->acctaller_id == explode(',', $value)[0]) {
                    $datonuevo = explode(',', $value)[0];
                    // dd($item->id, explode(',', $value)[0] );
                    break;
                }
            }

            if ($datonuevo == null) {
                //dump($datonuevo);
                $item->delete();
            }
        }
    }

    //funcion para agregar los nuevos checks a la bd
    public function agregarcheck($checksbd, $checksnuevos, $idtaller)
    {

        foreach ($checksnuevos as $item) {
            $datonuevo = null;
            foreach ($checksbd as $value) {

                if ($value->acctaller_id == explode(',', $item)[0]) {
                    $datonuevo = explode(',', $value)[0];
                    // dd($item->id, explode(',', $value)[0] );
                    break;
                }
            }

            if ($datonuevo == null) {
                //dump($datonuevo);

                tallerdetalle::create([

                    'acctaller_id' => explode(',', $item)[0],
                    'taller_id' => $idtaller
                ]);
            }
        }
    }

    //funcion para eliminar comentarios del estado del auto que ya no estan
    public function eliminarestadoauto($estadoautobd, $estadoautonew, $idtaller)
    {

        foreach ($estadoautobd as $item) {
            $datonuevo = null;
            foreach ($estadoautonew as $key => $value) {

                if ($item->key == $key) {
                    $datonuevo = $value;
                    break;
                }
            }

            if ($datonuevo == null) {
                //dump($datonuevo);
                $item->delete();
            }
            else{
                //dump($value);
                $item->update([

                    'descripcion' => $value["descripcion"],
                    'taller_id' => $idtaller,
                    'key' => $key
                ]);
            }
        }
    }

    //funcion para agregar los comentarios nuevos del estado del auto
    public function agregarestadoauto($estadoautobd, $estadoautonew, $idtaller)
    {

        foreach ($estadoautonew as $key => $item) {
            $datonuevo = null;
            foreach ($estadoautobd as $value) {

                if ($value->key == $key) {
                    $datonuevo = $item;
                    break;
                }
            }

            if ($datonuevo == null) {
                //dump($datonuevo);

                Estadovehiculo::create([
                    'descripcion' => $item["descripcion"],
                    'taller_id' => $idtaller,
                    'key' => $key
                ]);
            }

            
        }
    }
}
