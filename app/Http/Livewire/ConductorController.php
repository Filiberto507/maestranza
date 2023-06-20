<?php

namespace App\Http\Livewire;

use App\Models\Conductor;
use Livewire\WithPagination;

use Livewire\Component;

class ConductorController extends Component
{
    public $componentName, $pageTitle, $search, $select_id, $name;
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
}
