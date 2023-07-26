<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget" style="background: #ebe6ea">
            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{$componentName}}</b></h4>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="">
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <h6 class="text-center">Buscar por PLACA</h6>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-gp">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>

                                            </span>
                                        </div>
                                        <input type="text" wire:model="search" placeholder="5563-CUH" class="form-control">
                                    </div>
                                </div>
                            </div>



                            <div class="form-group col-md-3">
                                <h6>Fecha desde</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateFrom" class="form-control flatpickr" placeholder="Click para elegir">
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <h6>Fecha hasta</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateTo" class="form-control flatpickr" placeholder="Click para elegir">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="widget-content">
                        <!-- TABLA -->
                        <div class="table-responsive">
                            <!-- Anterior table: table table-bordered border-primary table striped mt-1  -->
                            <table class="table table-bordered d-none d-sm-table-cell">
                                <thead class="text-white" style="background:#3b3f5c;">
                                    <tr>
                                        <th class="table-th text-white text-center">
                                            ID
                                        </th>
                                        <th class="table-th text-white text-center">
                                            VEHICULO
                                        </th>
                                        <th class="table-th text-white text-center">
                                            CONDUCTOR
                                        </th>
                                        <th class="table-th text-white text-center">
                                            RESPONSABLE
                                        </th>
                                        <th class="table-th text-white text-center">
                                            REPORTE
                                        </th>
                                        <th class="table-th text-white text-center">
                                            FECHA
                                        </th>
                                        <th class="table-th text-white text-center">
                                            PDF
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) < 1) <tr>
                                        <td colspan="7">
                                            <h5>Sin Resultados</h5>
                                        </td>
                                        </tr>
                                        @endif
                                        @foreach ($data as $d)
                                        <tr>
                                            <td class="text-center">
                                                <h6>{{$d->id}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{$d->vehiculo}} - {{$d->placa}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{$d->conductor}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6></h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>TALLER</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{($d->fecha_ingreso)}}</h6>
                                            </td>
                                            <td class="text-center" width="50px">
                                                <a href="{{ url('report/pdf' . '/' . $d->id) }}" class="btn btn-danger" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                        <rect x="6" y="14" width="12" height="8"></rect>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                        $diagnostico_taller = $Diagnostico->where('taller_id', $d->id);
                                        @endphp
                                        @foreach ($diagnostico_taller as $di)
                                        <tr>
                                            <td class="text-center">
                                                <h6>{{$di->id}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{$di->marca}} - {{$di->placa}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{$di->conductor}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6></h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>DIAGNOSCTICO</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{($di->fecha)}}</h6>
                                            </td>
                                            <td class="text-center" width="50px">
                                                <a href="{{ url('diagnostico/pdf' . '/' . $di->id) }}" class="btn btn-danger" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                        <rect x="6" y="14" width="12" height="8"></rect>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                        $trabajo_taller = $TrabajoRealizadoTaller->where('taller_id', $d->id);
                                        @endphp
                                        @foreach ($trabajo_taller as $tr)
                                        <tr>
                                            <td class="text-center">
                                                <h6>{{$tr->id}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{$tr->vehiculo}} - {{$tr->placa}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6></h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{$tr->responsable}}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>TRABAJO REALIZADO</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{($tr->fecha_ingreso)}}</h6>
                                            </td>
                                            <td class="text-center" width="50px">
                                                <a href="{{ url('reportrabajo/pdf' . '/' . $tr->id) }}" class="btn btn-danger" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                        <rect x="6" y="14" width="12" height="8"></rect>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                        <tr style="color: #3b3f5c;">

                                            <td colspan="7">
                                                ===================================================================================================================================
                                            </td> <!-- Línea divisoria entre diagnósticos -->

                                        </tr>
                                        @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(document.getElementsByClassName('flatpickr'), {
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                        "Domingo",
                        "Lunes",
                        "Martes",
                        "Miércoles",
                        "Jueves",
                        "Viernes",
                        "Sábado",
                    ],
                },
                months: {
                    shorthand: [
                        "Ene",
                        "Feb",
                        "Mar",
                        "Abr",
                        "May",
                        "Jun",
                        "Jul",
                        "Ago",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dic",
                    ],
                    longhand: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre",
                    ],
                },
            }
        })

        //eventos
        window.livewire.on('show-modal', Msg => {
            $('#modalDetails').modal('show')
        })



    });
</script>