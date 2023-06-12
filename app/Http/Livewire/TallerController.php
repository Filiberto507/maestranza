<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Taller;
use Livewire\WithPagination;
use DB;

class TallerController extends Component
{
    use WithPagination;

    public $TallerName, $search, $selected_id, $pageTitle, $componentName;
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

        return view('livewire.taller.component',[
            'taller' => $Taller
        ])
        //extender de layouts
        ->extends('layouts.theme.app')
        //renderizarse
        ->section('content');
    }

    public function resetUI()
    {
        $this->TallerName ='';
        $this->search ='';
        $this->selected_id =0;
        $this->resetValidation();
        $this->emit('taller-close', 'taller cerrar');
    }
}
