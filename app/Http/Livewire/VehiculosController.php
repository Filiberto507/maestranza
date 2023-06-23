<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Vehiculos;
use DB;

class VehiculosController extends Component
{
    use WithPagination;

    public $placa,$modelo,$marca,$año,$color,$cilindrada,$chasis,$motor,
           $search,$selected_id,$pageTitle,$componentName;
    private $pagination=5;

    function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    function mount()
    {
        $this->pageTitle ='Listado';
        $this->componentName = 'Vehiculos';
        $this->status ='Elegir';
    }

    public function render()
    {
        if(strlen($this->search) > 0 )
            $Data = Vehiculos::where('placa', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $Data= Vehiculos::orderBy('id', 'asc')->paginate($this->pagination);

        $Data=Vehiculos::All();
        return view('livewire.vehiculos.component',['Vehiculos'=>$Data])
        ->extends('layouts.theme.app')
        ->section('content');
        
    }
}
