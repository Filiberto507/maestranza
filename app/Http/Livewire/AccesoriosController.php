<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Accesorios;
use DB;

class AccesoriosController extends Component
{
    use WithPagination;

    public $nombre,
           $search,$selected_id,$pageTitle,$componentName;
    private $pagination=6;

    function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    function mount()
    {
        $this->pageTitle ='Listado';
        $this->componentName = 'Vehiculos';
        $this->dependencia_id ='Elegir';
    }

    public function render()
    {
        if(strlen($this->search) > 0 )

        $Vehiculos=Vehiculos::join('Dependencias as dep','dep.id','Vehiculos.dependencias_id')
        ->select('Vehiculos.*','dep.id as dependencias')
        ->where('Vehiculos.placa','like','%'.$this->search.'%')
        ->orWhere('dep.id','like','%'.$this->search.'%')
        ->orderBy('Vehiculos.placa','asc')
        ->paginate($this->pagination);
        else
        $Vehiculos=Vehiculos::join('Dependencias as dep','dep.id','Vehiculos.dependencias_id')
        ->select('Vehiculos.*','dep.id as dependencias')
        ->orderBy('Vehiculos.placa','asc')
        ->paginate($this->pagination);

        return view('livewire.vehiculos.component',[
            'Vehiculos'=>$Vehiculos,
            'Dependencias'=> Dependencia::orderBy('nombre','asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
        
    }
    public function Edit(Vehiculos $Vehiculos)
    {
       //dd($Dependencias);
        $this->selected_id = $Vehiculos->id;
        $this->placa = $Vehiculos->placa;
        $this->modelo=$Vehiculos->modelo;
        $this->marca=$Vehiculos->marca;
        $this->color=$Vehiculos->color;
        $this->año=$Vehiculos->año;
        $this->cilindrada=$Vehiculos->cilindrada;
        $this->chasis=$Vehiculos->chasis;
        $this->motor=$Vehiculos->motor;
        $this->dependencias_id=$Vehiculos->dependencias_id;
        $this->emit('show-modal', 'SHOW MODAL');
    }
    public function Store()
    {
        
        $rules = [
            'placa' => 'required|min:3|unique:vehiculos,placa',
            'modelo' => 'required|min:3',
            'marca' => 'required|min:3',
            'color' => 'required|min:3',
            'año' => 'required|min:3',
            'cilindrada' => 'required|min:3',
            'chasis' => 'required|min:3|unique:vehiculos,chasis',
            'motor' => 'required|min:3|unique:vehiculos,motor',
            'dependencias_id' => 'required',
        ];

        $messages =[
            'placa.required' => 'ingrese el nombre',
            'placa.unique'=> 'ya existe el nombre de la placa',
            'placa.min' => 'El nombre tiene que tener al menos 3 caracteres',     
            
        ];

        $this->validate($rules, $messages);

        $Vehiculos=Vehiculos::create(['placa' => $this->placa,
                                      'modelo'=>$this->modelo,
                                      'marca'=>$this->marca,
                                      'color'=>$this->color,
                                      'año'=>$this->año,
                                      'cilindrada'=>$this->cilindrada,
                                      'chasis'=>$this->chasis,
                                      'motor'=>$this->motor,
                                      'dependencias_id' => $this->dependencias_id]);
                                      
       // dd($Dependencias);
        $this->resetUI();
        $this->emit('vehiculo-added', 'Se registro el vehiculo con exito');
        
        
    }
    public function resetUI()
    {
        $this->placa ='';
        $this->modelo ='';
        $this->marca ='';
        $this->color ='';
        $this->año ='';
        $this->cilindrada ='';
        $this->chasis ='';
        $this->motor ='';
        $this->search ='';
        $this->dependencias_id='Elegir';
        $this->selected_id =0;
        $this->resetValidation();
        //para regresar a la pagina principal
        $this->resetPage();
        $this->emit('vehiculo-close', 'vehiculo cerrar');
    }
    public function Update()
    {
        $rules = [
            'placa' => "required|min:3|unique:vehiculos,placa,{$this->selected_id}",
            'modelo' => 'required|min:3',
            'marca' => 'required|min:3',
            'color' => 'required|min:3',
            'año' => 'required|min:3',
            'cilindrada' => 'required|min:3',
            'chasis' => 'required|min:3',
            'motor' => 'required|min:3',
            'dependencias_id' => 'required',
        ];

        $messages =[
            'placa.required' => 'ingrese el nombre',
            'placa.unique'=> 'ya existe el nombre de la placa',
            'placa.min' => 'El nombre tiene que tener al menos 3 caracteres',     
            
        ];

        $this->validate($rules, $messages);
        $Vehiculos =Vehiculos::find($this->selected_id);
        $Vehiculos ->update(['placa' => $this->placa,
                                      'modelo'=>$this->modelo,
                                      'marca'=>$this->marca,
                                      'color'=>$this->color,
                                      'año'=>$this->año,
                                      'cilindrada'=>$this->cilindrada,
                                      'chasis'=>$this->chasis,
                                      'motor'=>$this->motor,
                                      'dependencias_id' => $this->dependencias_id]);
                                      
       // dd($Dependencias);
        $this->resetUI();
        $this->emit('vehiculo-updated', 'Se actualizo el vehiculo con exito');
    }
    protected $listeners=['deleteRow'=>'Destroy'];

    public function Destroy(Vehiculos $Vehiculos)
    {
        $this->selected_id = $Vehiculos->id;
        $Vehiculos ->delete();
        $this->resetUI();
        $this->emit('vehiculo-deleted', 'Se elimino el vehiculo');
    
    }
}