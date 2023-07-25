<?php

namespace App\Http\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Diagnostico_area_transporte;
use App\Models\Diagnostico_servicio;
use App\Models\Vehiculos;
use DB;

class DiagnosticoAreaTransporteController extends Component
{
    use WithPagination;

    public $fecha, $conclusion, $dependencia,$conductor, $vehiculos_id,
        $search, $selected_id, $pageTitle, $componentName;
    public $filas = [];
    private $pagination = 6;


    function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Diagnostico Area de Transportes';
        $this->diagnosticos_id='Elegir';
        $this->vehiculos_id = 'Elegir';
    }

    public function render()
    {
        if (strlen($this->search) > 0)

            $DiagnosticoAreaT = Diagnostico_area_transporte::join("Vehiculos as v", "v.id", "Diagnostico_area_transportes.vehiculos_id")
                ->select('Diagnostico_area_transportes.*', 'v.id as vehiculos', 'v.placa','v.tipo_vehiculo','v.cilindrada','v.chasis','v.motor')
                ->where('Diagnostico_area_transportes.fecha', 'like', '%' . $this->search . '%')
                ->orWhere('v.id', 'like', '%' . $this->search . '%')
                ->orderBy('Diagnostico_area_transportes.id', 'asc')
                ->paginate($this->pagination);
        else
        $DiagnosticoAreaT = Diagnostico_area_transporte::join("Vehiculos as v", "v.id", "Diagnostico_area_transportes.vehiculos_id")
        ->select('Diagnostico_area_transportes.*', 'v.id as vehiculos', 'v.placa','v.tipo_vehiculo','v.cilindrada','v.chasis','v.motor')
        ->orderBy('Diagnostico_area_transportes.id', 'asc')
        ->paginate($this->pagination);
        //dd($Diagnostico);

        return view('livewire.diagnostico_area_transporte.component', [
            'Diagnostico_area_transportes' => $DiagnosticoAreaT,
            'Vehiculos' => Vehiculos::orderBy('id', 'asc')->get(),
            //'Conductor'=> Conductor::orderBy('name','asc')->get()
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }
    public function Edit($id)
    {
        //dd($Dependencias);
        $DiagnosticoAreaT = Diagnostico_area_transporte::find($id);
        $this->selected_id = $DiagnosticoAreaT->id;
        $this->fecha = $DiagnosticoAreaT->fecha;
        $this->dependencia = $DiagnosticoAreaT->dependencia;
        $this->conductor = $DiagnosticoAreaT->conductor;
        $this->conclusion = $DiagnosticoAreaT->conclusion;
        $this->vehiculos_id = $DiagnosticoAreaT->vehiculos_id;
        $DiagnosticoServicio = Diagnostico_servicio::where('diagnostico_area_transportes_id', $id)->get();
        //dd($DiagnosticoItem);
        foreach ($DiagnosticoServicio as $d) {
            //dd($d->item);
            $this->filas[] = [
                'item'=>$d->item,
                'cantidad' => $d->cantidad,
                'servicio' => $d->servicio,
            ];
        }
        //dd($this->filas);
        $this->emit('show-modal', 'SHOW MODAL');
    }
    public function Store()
    {
        //dd($this->filas);
        $rules = [
            'fecha' => 'required',
            'conclusion' => 'required|min:3',
            'dependencia' => 'required|min:3',
            'conductor' => 'required|min:3',
            'vehiculos_id' => 'required',
        ];
        $messages = [
            'fecha.required' => 'seleccione una fecha',
            'conclusion.required' => 'Ingrese las conclusion',
            'conclusion.min' => 'El campo tiene que tener al menos 3 caracteres',

        ];

        $this->validate($rules, $messages);
        //dd($this->filas);

        $DiagnosticoAreaT = Diagnostico_area_transporte::create([
            'fecha' => $this->fecha,
            'dependencia' => $this->dependencia,
            'conductor' => $this->conductor,
            'vehiculos_id' => $this->vehiculos_id,
            'conclusion' => $this->conclusion
        ]);
        if ($DiagnosticoAreaT) {

            foreach ($this->filas as $f) {
                Diagnostico_servicio::create([
                    'item'=>$f['item'],
                    'cantidad' => $f['cantidad'],
                    'servicio' => $f['servicio'],
                    'diagnostico_area_transportes_id' => $DiagnosticoAreaT->id
                ]);
            }
        }
        // dd($Dependencias);
        $this->resetUI();
        $this->emit('diagnostico_area_transporte-added', 'Se registro el diagnostico con exito');
    }

    public function resetUI()
    {
        $this->fecha = '';
        $this->conclusion = '';
        $this->dependencia = '';
        $this->conductor = '';
        $this->search = '';
        $this->vehiculos_id = 'Elegir';
        $this->filas = [];
        $this->selected_id = 0;
        $this->resetValidation();
        //para regresar a la pagina principal
        $this->resetPage();
        $this->emit('diagnostico_area_transporte-close', 'vehiculo cerrar');
    }
    public function Update()
    {
        //dd($this->filas);
        $rules = [
            'fecha' => 'required',
            'conclusion' => 'required|min:3',
            'dependencia' => 'required|min:3',
            'conductor' => 'required|min:3',
            'vehiculos_id' => 'required',

        ];

        $messages = [
            'fecha.required' => 'ingresela fecha',
            'conclusion.required' => 'ingrese las conclusiones',
            'conclusion.min' => 'El campo tiene que tener al menos 3 caracteres',

        ];

        $this->validate($rules, $messages);
        $DiagnosticoAreaT = Diagnostico_area_transporte::find($this->selected_id);
        $DiagnosticoAreaT->update([
            'fecha' => $this->fecha,
            'conclusion' => $this->conclusion,
            'dependencia' => $this->dependencia,
            'conductor' => $this->conductor,
            'vehiculos_id' => $this->vehiculos_id
        ]);

        if ($DiagnosticoAreaT) {
            $itemdiag= Diagnostico_servicio::where('diagnostico_area_transportes_id', $this->selected_id)->get();
            //dd($itemdiag);
            $this->AgregarItem($itemdiag, $this->filas, $this->selected_id);
            $this->EliminarItem($itemdiag, $this->filas, $this->selected_id);
        }

        // dd($Dependencias);
        $this->resetUI();
        $this->emit('diagnostico_area_transporte-updated', 'Se actualizo el diagnostico con exito');
    }

    protected $listeners = ['destroy' => 'Destroy'];

    public function Destroy($id)
    {
        //dd('hola');
        Diagnostico_servicio::where('diagnostico_area_transportes_id', $id)->delete();
        Diagnostico_area_transporte::find($id)->delete();
        $this->resetUI();
        $this->emit('diagnostico_area_transporte-deleted', 'Se elimino el diagnostico');
    }

    public function agregarFila($variable)
    {
        if (count($this->filas) == 30) {
            dd($this->filas);
        }
        switch ($variable) {
            case '1':
                $this->filas[] = [
                    'item'=>'',
                    'cantidad' => '',
                    'servicio' => '',
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
        $this->filas = $this->filas; // Reindexar el arreglo
    }
    
    public function pdf($id)
    {
        $DiagnosticoAreaT = Diagnostico_area_transporte::join('Vehiculos as v', 'v.id', 'Diagnostico_area_transportes.vehiculos_id')
            ->select('Diagnostico_area_transportes.*', 'v.id as vehiculos', 'v.placa', 'v.marca','v.tipo_vehiculo','v.cilindrada','v.chasis','v.motor')
            ->where('Diagnostico_area_transportes.id', $id)->first();
        //dd($Diagnostico);
        $Diagnostico_servicio = Diagnostico_servicio::where('diagnostico_area_transportes_id', $id)->get();
        $Vehiculos = Vehiculos::all();
        $pdf = Pdf::loadView('livewire.diagnostico_area_transporte.pdf', compact('DiagnosticoAreaT', 'Diagnostico_servicio', 'Vehiculos'));
        return $pdf->stream();
        //si se quiere descargar
        //return $pdf->download('reporteDisagnostico.pdf');
    }

    public function EliminarItem($itembd, $itemnew, $iditem)
    {
        //dd($itembd, $itemnew);
        foreach ($itembd as $key => $item) {
            $itemnuevo = null;
            foreach ($itemnew as $key2 => $value) {
                if ($key == $key2) {
                    $itemnuevo = $item;
                    break;
                }
            }

            if ($itemnuevo == null) {
                ($item)->delete();
            }

            else{
                $item->update([
                    'item'=>$value['item'],
                    'cantidad' => $value['cantidad'],
                    'servicio' => $value['servicio'],
                    'diagnostico_area_transportes_id' => $iditem
                ]);
            }
        }
    }

    public function AgregarItem($itembd, $itemnew, $iditem)
    {
        //dd($itembd, $itemnew);
        foreach ($itemnew as $key => $item) {
            $itemnuevo = null;
            foreach ($itembd as $key2 => $value) {
                if ($key == $key2) {
                    $itemnuevo = $value;
                    break;
                }
            }

            if ($itemnuevo == null) {
                
                Diagnostico_servicio::create([
                    'item'=>$item['item'],
                    'cantidad' => $item['cantidad'],
                    'servicio' => $item['servicio'],
                    'diagnostico_area_transportes_id' => $iditem
                ]);
            }
        }
    }
}
