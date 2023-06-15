<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Taller;
use App\Models\accesoriostaller;
use App\Models\tallerdetalle;
use Livewire\WithPagination;
use Carbon\Carbon;
use DB;

class TallerController extends Component
{
    use WithPagination;

    public $TallerName, $search, $selected_id, $pageTitle, $componentName, $check=[];
    public $ingreso, $salida, $fecha_ingreso, $fecha_salida, $name, $vehiculo, $color, 
            $dependencia, $placa, $kilometraje, $ordentrabajo, $acctaller, $acctaller2;
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
    }

    public function render()
    {
       //validar si el usuario ingreso informacion
        if(strlen($this->search) > 0)
            $Taller = Taller::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
        $Taller = Taller::orderBy('name', 'asc')->paginate($this->pagination);
        $this->acctaller = accesoriostaller::orderBy('id','asc')->get();
        //dd($acctaller);
        
        return view('livewire.taller.component',[
            'taller' => $Taller,
            'acctaller' => $this->acctaller
        ])
        //extender de layouts
        ->extends('layouts.theme.app')
        //renderizarse
        ->section('content');
    }

    public function resetUI()
    {
        //dd($this->check);
        $this->TallerName ='';
        $this->ingreso='';
        $this->salida='';
        $this->fecha_ingreso='';
        $this->fecha_salida='';
        $this->name='';
        $this->vehiculo='';
        $this->color='';
        $this->dependencia='';
        $this->placa='';
        $this->kilometraje='';
        $this->ordentrabajo='';
        $this->check=[];
        $this->search ='';
        $this->selected_id =0;
        //dd($this->check);
        $this->resetValidation();
        $this->emit('taller-close', 'taller cerrar');
    }

    public function checks(){
        dd($this->check);
    }

    public function create_taller(){
        //dd($this->acctaller);
        //dd($this->check);
        // dd($this->TallerName ,
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
            if($talleres){
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
            }
            //confirma la transaccion
           DB::commit();

           //limpiar el carrito y reinicar las variables

           
            $this->emit('taller-ok','recepcion registrada con exito');
            //$this->emit('print-ticket', $talleres->id);
            $this->resetUI();
        } catch (Exception $e) {
            //borrar las acciones incompletas
            DB::rollback();
            $this->emit('taller-error', $e->getMessage());

        }
    }

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
        $acctalleres = accesoriostaller::orderBy('id', 'asc')->get();

        //dd($acctaller);
        foreach ($acctalleres as $tall) {

            $tallerid= Taller::find($this->selected_id)->first();
            //dd($tallerherr->id);
            $tallerherramientas = tallerdetalle::where('taller_id',$tallerid->id )->get();
            //dd($tallerherramientas);
            //dd($tallobtherramientas);
            //buscar si tiene asginado ese permiso
            //$tieneherr= tallerdetalle::find($tallerherr->id)->get();
            $obtenercheck =$tallerherramientas->where( 'acctaller_id', $tall->id)->first();
            //dd($obtenercheck);
            //$this->roles()->where('nombre', $nombreRol)->exists();
            //dump($obtenercheck);
             if($obtenercheck){
                //dump($obtenercheck);
                $tall->checked = 1;
                //$acctalleres->pull($tall->id);
             }
             
        }
        $this->acctaller2=$acctalleres;
        //dd($this->acctaller);

        $this->emit('show-modal', 'open!');
    }
}
