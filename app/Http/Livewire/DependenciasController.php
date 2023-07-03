<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dependencia;
use DB;

class DependenciasController extends Component
{
    use WithPagination;

    public $nombre,
           $search,$selected_id,$pageTitle,$componentName;
    private $pagination=3;

    function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    function mount()
    {
        $this->pageTitle ='Listado';
        $this->componentName = 'Dependencias';
        
    }

    public function render()
    {
        if(strlen($this->search) > 0 )
            $Data = Dependencia::where('nombre', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $Data= Dependencia::orderBy('id', 'asc')->paginate($this->pagination);

        


        return view('livewire.dependencias.component',['Dependencias'=>$Data])
        ->extends('layouts.theme.app')
        ->section('content');
        
    }
    

    /*public function Edit($id)
    {
        $Dependencias = Dependencia::find($id);
        $this->selected_id = $Dependencias->id;
        $this->nombre = $Dependencias->nombre;

        $this->emit('show-modal', 'show modal');
        
    }*/
    public function Edit(Dependencia $Dependencias)
    {
       //dd($Dependencias);
        $this->selected_id = $Dependencias->id;
        $this->nombre = $Dependencias->nombre;
        $this->emit('show-modal', 'SHOW MODAL');
    }
    public function Store()
    {
        
        $rules = [
            'nombre' => 'required|min:3|unique:dependencias,nombre',
        ];

        $messages =[
            'nombre.required' => 'ingrese el nombre',
            'nombre.unique'=> 'ya existe el nombre de la dependencia',
            'nombre.min' => 'El nombre tiene que tener al menos 3 caracteres',     
            
        ];

        $this->validate($rules, $messages);

        $Dependencias=Dependencia::create(['nombre' => $this->nombre]);
       // dd($Dependencias);
        $this->resetUI();
        $this->emit('dependencia-added', 'Se registro la dependencia con exito');
        
        
    }
    public function resetUI()
    {
        $this->nombre ='';
        $this->search ='';
        $this->selected_id =0;
        $this->resetValidation();
        //para regresar a la pagina principal
        $this->resetPage();
        $this->emit('dependencia-close', 'dependencia cerrar');
    }
    protected $listeners=['deleteRow'=>'Destroy'];
    public function Destroy($id)
    {
        $Dependencias=Dependencia::find($id);
        $Dependencias->delete();
        $this->resetUI();
        $this->emit('dependencia-deleted', 'Se elimino la dependencia');
    }
}
