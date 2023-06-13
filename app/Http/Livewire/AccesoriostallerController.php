<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\accesoriostaller;
use Livewire\WithPagination;
use DB;

class AccesoriostallerController extends Component
{
    use WithPagination;

    public $acctallerName, $search, $selected_id, $pageTitle, $componentName;
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
        $this->componentName = 'Accesorios Taller';
    }

    public function render()
    {
       //validar si el usuario ingreso informacion
        if(strlen($this->search) > 0)
            $acctaller = accesoriostaller::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
        $acctaller = accesoriostaller::orderBy('id', 'asc')->paginate($this->pagination);

        return view('livewire.accesoriostaller.component',[
            'acctaller' => $acctaller
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
        $this->emit('acctaller-close', 'acctaller cerrar');
    }
}