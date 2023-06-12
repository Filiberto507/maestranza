<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">
                    <b>{{$componentName}}</b> | {{ $selected_id > 0 ? 'EDITAR' : 'CREAR'}}
                </h5>
                <h6 class="text-center text-warning" wire:loading>
                    POR FAVOR ESPERE
                </h6>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-12 mt-2">
                        <h6>Fecha Entrada</h6>
                        <div class="form-group">
                            <input type="text" wire:model="dateFrom" class="form-control flatpickr" placeholder="Click para elegir">
                        </div>
                    </div>

                    <div class="col-sm-12 mt-2">
                        <h6>Fecha Salida</h6>
                        <div class="form-group">
                            <input type="text" wire:model="dateTo" class="form-control flatpickr" placeholder="Click para elegir">
                        </div>
                    </div>

                    <!-- <div class="col-sm-12 mt2">
                        
                        <input id="appt-time" type="time" name="appt-time" value="13:30" />
                    </div> -->

                    <div class="col-sm-4 mt2">
                        <div class="form-group">
                            <label>Entrada</label>
                            <input type="time" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4 mt2">
                        <div class="form-group">
                            <label>Salida</label>
                            <input type="time" class="form-control" />
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" wire:model.lazy="TallerName" class="form-control" placeholder="ej: Admin" maxlength="255">
                            </div>
                            @error('TallerName')
                            <span class="text-danger er"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" wire:model.lazy="TallerName" class="form-control" placeholder="ej: Admin" maxlength="255">
                            </div>
                            @error('TallerName')
                            <span class="text-danger er"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-4 ">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" wire:model.lazy="TallerName" class="form-control" placeholder="Kilometraje" maxlength="255">
                            </div>
                            @error('TallerName')
                            <span class="text-danger er"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" wire:model.lazy="TallerName" class="form-control" placeholder="ej: Admin" maxlength="255">
                            </div>
                            @error('TallerName')
                            <span class="text-danger er"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" wire:model.lazy="TallerName" class="form-control" placeholder="Vehiculo" maxlength="255">
                            </div>
                            @error('TallerName')
                            <span class="text-danger er"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" wire:model.lazy="TallerName" class="form-control" placeholder="Color" maxlength="255">
                            </div>
                            @error('TallerName')
                            <span class="text-danger er"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="width:20px; height:20px;" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Estuche de Herramientas y algo mas
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn text-info" data-desmiss="modal">
                            CERRAR
                        </button>

                        @if($selected_id < 1) <button type="button" wire:click.prevent="CreateRole()" class="btn btn-dark close-modal">
                            GUARDAR
                            </button>
                            @else
                            <button type="button" wire:click.prevent="UpdateRole()" class="btn btn-dark close-modal">
                                ACTUALIZAR
                            </button>
                            @endif
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