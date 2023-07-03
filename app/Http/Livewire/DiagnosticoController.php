<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Diagnosticos;
use App\Models\Vehiculos;
use App\Http\Livewire\array_field;
use DB;

class DiagnosticoController extends Component
{
    use WithPagination;
    
    public $fecha,$observaciones,$vehiculos_id,
           $search,$selected_id,$pageTitle,$componentName;
    public $filas = [],$descripcion=[];
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

        $Diagnostico=Diagnosticos::join('Vehiculos as v','v.id','Diagnosticos.vehiculos_id')
        ->select('Diagnosticos.*','v.id as vehiculos')
        ->where('Diagnosticos.fecha','like','%'.$this->search.'%')
        ->orWhere('v.id','like','%'.$this->search.'%')
        ->orderBy('Diagnosticos.fecha','asc')
        ->paginate($this->pagination);
        else
        $Diagnostico=Diagnosticos::join('Vehiculos as v','v.id','Diagnosticos.vehiculos_id')
        ->select('Diagnosticos.*','v.id as vehiculos')
        ->orderBy('Diagnosticos.fecha','asc')
        ->paginate($this->pagination);

        return view('livewire.diagnostico.component',[
            'Diagnosticos'=>$Diagnostico,
            'Vehiculos'=> Vehiculos::orderBy('placa','asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
        
    }
    public function Edit(Diagnosticos $Diagnostico)
    {
       //dd($Dependencias);
        $this->selected_id = $Diagnostico->id;
        $this->fecha = $Diagnostico->fecha;
        $this->observaciones=$Diagnostico->observaciones;
        $this->vehiculos_id=$Diagnostico->vehiculos_id;
        $this->emit('show-modal', 'SHOW MODAL');
    }

    

    public function Store()
    {
        
        $rules = [
            'fecha' => 'required',
            'observaciones' => 'required|min:3',
            'vehiculos_id' => 'required',
            
        ];

        $messages =[
            'fecha.required' => 'ingrese el nombre',
            'fecha.unique'=> 'ya existe el nombre de la placa',
            'fecha.min' => 'El nombre tiene que tener al menos 3 caracteres',     
            
        ];

        $this->validate($rules, $messages);

        $Diagnostico=Diagnosticos::create(['fecha' => $this->fecha,
                                      'descripcion'=>$this->descripcion,
                                      'observaciones'=>$this->observaciones,
                                      'vehiculos_id' => $this->vehiculos_id]);
                                      
                                     /* if ($Diagnostico) {

                                        $items = $this->descripcion;

                                        foreach ($items as $item) {
                                            Diagnosticos::create([
                        
                                                'descripcion' => implode(', ', $item),
                                            ]);
                                        }
                                    }
                                    //confirma la transaccion
                                    DB::commit();    */                 
       // dd($Dependencias);
        $this->resetUI();
        $this->emit('diagnostico-added', 'Se registro el diagnostico con exito');
        
        
    }
    public function resetUI()
    {
        $this->fecha ='';
        $this->observaciones ='';
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
            'vehiculos_id' => 'required',
            
        ];

        $messages =[
            'fecha.required' => 'ingrese el nombre',
            'fecha.unique'=> 'ya existe el nombre de la placa',
            'fecha.min' => 'El nombre tiene que tener al menos 3 caracteres',     
            
        ];

        $this->validate($rules, $messages);
        $Diagnostico =Diagnosticos::find($this->selected_id);
        $Diagnostico ->update(['fecha' => $this->fecha,
                                      'observaciones'=>$this->observaciones,
                                      'vehiculos_id' => $this->vehiculos_id]);
                                      
       // dd($Dependencias);
        $this->resetUI();
        $this->emit('diagnostico-updated', 'Se actualizo el diagnostico con exito');
    }
    protected $listeners=['deleteRow'=>'Destroy'];

    public function Destroy(Diagnosticos $Diagnostico)
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
    public function crearDescripcion(Request $request)
    {
    
        // Obtener los valores de los inputs
        $item = $request->input('item');
        $desc = $request->input('desc');

        // Crear el array y guardar los valores
        $descripcion['item'] = $item;
        $descripcion['desc'] = $desc;
        $descripcion = [$item, $desc];

        //return $descripcion;
    }
}
