<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Diagnostico;
use DB;

class DiagnosticoController extends Component
{
    use WithPagination;

    public $fecha,$item,$descripcion,$observaciones,
           $search,$selected_id,$pageTitle,$componentName;
    private $pagination=6;

    function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    function mount()
    {
        $this->pageTitle ='Listado';
        $this->componentName = 'Diagnostico';
        $this->status ='Elegir';
    }

    public function render()
    {
        if(strlen($this->search) > 0 )
            $Diagnostico = Diagnostico::where('name', 'like', '%' . $this->search . '%')
            ->select('*')->orderBy('name', 'asc')->paginate($this->pagination);
        else
            $Diagnostico = Diagnostico::select('*')->orderBy('name', 'asc')->paginate($this->pagination);

        $Diagnostico=Diagnostico::All();
        return view('livewire.diagnostico.component',['Diagnostico'=>$Diagnostico])
        ->extends('layouts.theme.app')
        ->section('content');
        
    }
}
