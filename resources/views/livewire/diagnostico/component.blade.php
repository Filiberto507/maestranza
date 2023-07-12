<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">
                            Agregar
                        </a>
                    </li>
                </ul>
            </div>
            @include('common.searchbox')
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" >
                            <tr>
                                <th class="table-th text-while">
                                    ID
                                </th>
                                <th class="table-th text-while">
                                    FECHA
                                </th>
                                <th class="table-th text-while">
                                    DEPENDENCIA
                                </th>
                                <th class="table-th text-while">
                                    CONDUCTOR
                                </th>
                                <th class="table-th text-while">
                                    OBSERVACIONES
                                </th>
                                <th class="table-th text-while">
                                    PLACA VEHICULO
                                </th>
                                
                                <th class="table-th text-while">
                                    ACCTIONS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Diagnosticos as $diag )
                            <tr>
                                <td>
                                    <h6>{{$diag->id}}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{$diag->fecha}}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{$diag->dependencia}}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{$diag->conductor}}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{$diag->observaciones}}</h6>
                                </td>
                                <td class="text-center">
                                    <h6>{{$diag->placa}}</h6>
                                </td> 
                                
                                <td class="text-center">
                                    <a href="javascript:void(0)" 
                                    wire:click="Edit({{$diag->id}})"
                                    class="btn btn-dark mtmoble" title="Editar Registro">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>

                                    <a href="javascript:void(0)"
                                        onclick="Confirm('{{$diag->id}}')"
                                        class="btn btn-dark" title="Eliminar Registro">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    @include('livewire.diagnostico.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        //evento ocultar la ventana modal y notificar
        window.livewire.on('diagnostico-added', Msg => {
            $('#theModal').modal('hide')
        })
        //evento ocultar la ventana modal y notificar
        window.livewire.on('diagnostico-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        //evento  notificar
        window.livewire.on('diagnostico-deleted', Msg => {
            noty(Msg)
        })
        //evento notificar
        window.livewire.on('diagnostico-exists', Msg => {
            noty(Msg)
        })

        //evento notificar
        window.livewire.on('diagnostico-error', Msg => {
            noty(Msg)
        })

        //evento ocultar la ventana modal 
        window.livewire.on('hide-modal', Msg => {
            $('#theModal').modal('hide')
        })

        //evento mostrar
        window.livewire.on('show-modal', msg =>{
            $('#theModal').modal('show')
        });
        //cerrar
        window.livewire.on('diagnostico-close', Msg =>{
            $('#theModal').modal('hide')
            noty(Msg)
        });
    });
    //confimar eliminar
    function Confirm(id)
    {   
        
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('destroy', id)
                swal.close()
            }
        })
    }
</script>