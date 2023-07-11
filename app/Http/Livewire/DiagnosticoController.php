<?php

namespace App\Http\Livewire;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Diagnostico;
use App\Models\DiagnosticoItem;
use App\Models\Vehiculos;
use DB;

class DiagnosticoController extends Component
{
    use WithPagination;
    
    public $fecha,$observaciones,$dependencia,$conductor,$vehiculos_id,
           $search,$selected_id,$pageTitle,$componentName;
    public $filas = [],$filas2=[];
    private $pagination=6;

    
    function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    function mount()
    {
        $this->pageTitle ='Listado';
        $this->componentName = 'Diagnostico';
        $this->vehiculos_id ='Elegir';
    }

    public function render()
    {
        if(strlen($this->search) > 0 )

        $Diagnostico=Diagnostico::join('Vehiculos as v','v.id','Diagnosticos.vehiculos_id')
        ->select('Diagnosticos.*','v.id as vehiculos')
        ->where('Diagnosticos.fecha','like','%'.$this->search.'%')
        ->orWhere('v.id','like','%'.$this->search.'%')
        ->orderBy('Diagnostico.fecha','asc')
        ->paginate($this->pagination);
        else
        $Diagnostico=Diagnostico::join('Vehiculos as v','v.id','Diagnosticos.vehiculos_id')
        ->select('Diagnosticos.*','v.id as vehiculos')
        ->orderBy('Diagnosticos.fecha','asc')
        ->paginate($this->pagination);
        //dd($Diagnostico);

        return view('livewire.diagnostico.component',[
            'Diagnosticos'=>$Diagnostico,
            'Vehiculos'=> Vehiculos::orderBy('placa','asc')->get(),
            //'Conductor'=> Conductor::orderBy('name','asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
        
    }
    public function Edit(Diagnostico $Diagnostico)
    {
       //dd($Dependencias);
        $this->selected_id = $Diagnostico->id;
        $this->fecha = $Diagnostico->fecha;
        $this->observaciones=$Diagnostico->observaciones;
        $this->dependencia=$Diagnostico->dependencia;
        $this->conductor=$Diagnostico->conductor;
        $this->vehiculos_id=$Diagnostico->vehiculos_id;
        $this->emit('show-modal', 'SHOW MODAL');
    }

    

    public function Store(Request $request)
    {/*
        $request->validate([
            'fecha' => 'required',
            'item' => 'required',
            'observaciones' => 'required|min:3',
            'dependencia' => 'required|min:3',
            'conductor' => 'required|min:3',
            'vehiculos_id' => 'required',
        ]);
        $messages =[
            'fecha.required' => 'ingrese el nombre',
            'nombre.unique'=> 'ya existe el nombre de la dependencia',
            'nombre.min' => 'El nombre tiene que tener al menos 3 caracteres',     
            
        ];
foreach($filas as $f)
{
    dump($f);
}
        $this->validate($rules, $messages);*/
        //dd($this->filas);

        $Diagnostico=Diagnostico::create(['fecha' => $this->fecha,
        'dependencia' => $this->dependencia,
        'conductor' => $this->conductor,
        'vehiculos_id' => $this->vehiculos_id,
        'observaciones' => $this->observaciones]);
        if($Diagnostico)
        {
           
            foreach($this->filas as $f)
            {
                DiagnosticoItem::create(['item' => $f['items'],
                'descripcion' => $f['descriptions'],
                'diagnosticos_id' => $Diagnostico->id]);
            }
        }
       // dd($Dependencias);
        $this->resetUI();
        $this->emit('diagnostico-added', 'Se registro la dependencia con exito');
    }

    public function resetUI()
    {
        $this->fecha ='';
        $this->observaciones ='';
        $this->dependencia ='';
        $this->conductor ='';
        $this->search ='';
        $this->vehiculos_id='Elegir';
        $this->selected_id =0;
        $this->resetValidation();
        //para regresar a la pagina principal
        $this->resetPage();
        $this->emit('diagnostico-close', 'vehiculo cerrar');
    }
    public function Update()
    {
        $rules = [
            'fecha' => 'required',
            'observaciones' => 'required|min:3',
            'dependencia' => 'required|min:3',
            'conductor' => 'required|min:3',
            'vehiculos_id' => 'required',
            
        ];

        $messages =[
            'fecha.required' => 'ingresela fecha',
            'fecha.unique'=> 'ya existe el nombre de la placa',
            'fecha.min' => 'El nombre tiene que tener al menos 3 caracteres',     
            
        ];

        $this->validate($rules, $messages);
        $Diagnostico =Diagnostico::find($this->selected_id);
        $Diagnostico ->update(['fecha' => $this->fecha,
                                      'observaciones'=>$this->observaciones,
                                      'dependencia' => $this->dependencia,
                                      'conductor' => $this->conductor,
                                      'vehiculos_id' => $this->vehiculos_id]);
                                      
       // dd($Dependencias);
        $this->resetUI();
        $this->emit('diagnostico-updated', 'Se actualizo el diagnostico con exito');
    }
    protected $listeners=['deleteRow'=>'Destroy'];

    public function Destroy(Diagnostico $Diagnostico)
    {
        $this->selected_id = $Diagnostico->id;
        $Diagnostico ->delete();
        $this->resetUI();
        $this->emit('diagnostico-deleted', 'Se elimino el diagnostico');
    
    }
    
    public function agregarFila($variable)
    {
        if (count($this->filas) == 7) {
            dd($this->filas);
        }

        switch ($variable) {
            case '1':
                $this->filas[] = [
                    'items' => '',
                    'descriptions' => '',
                ];
                break;

            case '2':
                $this->filas2[] = [
                    'items' => '',
                    'descriptions' => '',
                ];
                break;
            default:
                # code...
                break;
        }
    }

    public function eliminarFila($index)
    {
        unset($this->filas[$index]);
        $this->filas = array_values($this->filas); // Reindexar el arreglo
    }


    public function delete ($id)
    {
        $query = Category::find($id);
        $query->delete();
    }
    public function pdf()
    {
        $Diagnostico=Diagnostico::all();
        $DiagnosticoItem=DiagnosticoItem::all();
        $pdf = Pdf::loadView('livewire.diagnostico.pdf', compact('Diagnostico','DiagnosticoItem'));
        return $pdf->stream();
        //si se quiere descargar
        //return $pdf->download('reporteDisagnostico.pdf');
    }

    


    
}
