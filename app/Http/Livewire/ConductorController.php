<?php

namespace App\Http\Livewire;

use App\Models\Conductor;
use Livewire\WithPagination;

use Livewire\Component;

class ConductorController extends Component
{
    public $componentName, $pageTitle, $search, $selected_id, $name, $telefono, $status;
    public $filas = [];

    private $pagination = 5;

    public function PaginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function mount(){
        $this->pageTitle = 'Listado';
        $this->componentName = 'Conductores';
    }

    public function render()
    {
        //validar datos
        if(strlen($this->search) > 0)
            $conductor = Conductor::where('name', 'like', '%'. $this->search. '%')->paginate($this->pagination);
        else
            $conductor = Conductor::orderby('id', 'asc')->paginate($this->pagination);

        return view('livewire.conductor.component',[
            'conductor' => $conductor
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Store()
    {
        dd($this->filas);
        //validaciones
        $rules = ['name' => 'required|min:2|unique:conductors,name'];

        //mensajes
        $messages = [
            'name.required' => 'El nombre del conductor es requerido',
            'name.unique' => 'El role ya existe',
            'name.min' => 'el nombre del conductor debe tener al menos 2 catacteres'
        ];

        //validar si estan bien 
        $this->validate($rules, $messages);
        //crear el rol
        $conductor = Conductor::create([
            'name' => $this->name,
            'telefono' => $this->telefono,
            'status' => $this->status
            
        ]);
        

        $this->emit('conductor-added', 'Se registro el conductor con exito');
        $this->resetUI();
    }

    //metodo editar

    public function Edit(Conductor $role)
    {
        //buscar el rol con el metodo antiguo
        //$role = Role::find($id);
        //mandar los datos a los propiedades
        $this->selected_id = $role->id;
        $this->name = $role->name;
        $this->telefono = $role->telefono;

        //emitir un evento a una ventada modal
        $this->emit('show-modal', ' Show modal');
    }

    public function algo()
    {
        
        $this->emit('show-modal', ' Show modal');
    }

    //actualizar datos
    public function Update()
    {
        //validaciones
        $rules = ['name' => "required|min:2|unique:roles,name, {$this->selected_id}"];

        //mensajes
        $messages = [
            'name.required' => 'El nombre del conductor es requerido',
            'name.unique' => 'El conductor ya existe',
            'name.min' => 'el nombre del conductor debe tener al menos 2 catacteres'
        ];

        $this->validate($rules, $messages);

        //busqueda del rol
        $Conductor = Conductor::find($this->selected_id);
        $Conductor->Update([
            'name' => $this->name,
            'telefono' => $this->telefono,
            'status' => $this->status
        ]);
        //guardar rol 
       $Conductor->save();

       $this->emit('conductor-updated', 'Se actualizo el conductor con exito');
       $this->resetUI();
    }

    //limpiar los inputs
    public function resetUI()
    {
        $this->name ='';
        $this->telefono ='';
        $this->status ='';
        $this->search ='';
        $this->selected_id =0;
        $this->resetValidation();
        $this->emit('conductor-close', 'conductor cerrar');
    }

    public function agregarFila()
{
    $this->filas[] = [
        'items' => '',
        'descriptions' => '',
    ];

    
}

}