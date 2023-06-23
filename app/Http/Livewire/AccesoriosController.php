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
        $this->componentName = 'Accesorios';
        $this->status ='Elegir';
    }

    public function render()
    {
        if(strlen($this->search) > 0 )
            $Accesorios = Accesorios::where('name', 'like', '%' . $this->search . '%')
            ->select('*')->orderBy('name', 'asc')->paginate($this->pagination);
        else
            $Accesorios = Accesorios::select('*')->orderBy('name', 'asc')->paginate($this->pagination);

            $Accesorios = Accesorios::All();
        return view('livewire.accesorios.component',['Accesorios'=>$Accesorios])
        ->extends('layouts.theme.app')
        ->section('content');
        
    }
}