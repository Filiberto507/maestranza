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
            <div class="col-sm-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label >Fecha</label>
                            <input type="date" wire:model.lazy="fecha" class="form-control" placeholder="ej: 1,2,3" maxlength="10">
                            @error('fecha') <span class="text-danger er">{{ $message}} </span>
                                
                            @enderror
                        </div>
                    </div>
     
                    <table class="table  table-bordered table-hover mt-1">
        <thead>
            <tr>
                <th>Items</th>
                <th>Descripción</th>
                
                <th> 
                    <button class="btn btn-primary" wire:click="agregarFila({{1}})">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </div>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filas as $index => $fila)
            <tr>
                <td><input name="item" class="form-control" type="text" wire:model="filas.{{ $index }}.items" /></td>
                <td><input name="desc" class="form-control" type="text" wire:model="filas.{{ $index }}.descriptions" /></td>
                <td><button class="btn btn-danger" wire:click="eliminarFila({{ $index }})">Eliminar</button></td>
            </tr>
            @endforeach

            
        </tbody>
    </table>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                                <textarea class="form-control" wire:model.lazy="observaciones"  rows="3"></textarea>
                              </div>
                            @error('observaciones') <span class="text-danger er">{{ $message}} </span>
                                
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Asignar vehiculo</label>
                            <select wire:model.lazy="vehiculos_id" class="form-control" id="select2-dropdown" >
                                <option value="Elegir" selected> Elegir </option>
                                @foreach($Vehiculos as $v)
                                <option value="{{$v->id}}" selected> {{$v->placa}} </option>
                                @endforeach
                            </select>
                            @error('vehiculos_id') <span class="text-danger er">{{ $message}} </span>
                
                            @enderror
                        </div>
                    </div>
        </div>

    <div>
      <div class="modal-footer">
        <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn text-info" data-desmiss="modal">
          CERRAR
        </button>

        @if($selected_id < 1)
        <button type="button" wire:click.prevent="Store()" class="btn btn-dark close-modal" >
          GUARDAR
        </button>
        @else
        <button type="button" wire:click.prevent="Update()" class="btn btn-dark close-modal" >
          ACTUALIZAR
        </button>
        @endif
      </div>
    </div>
  </div>
</div>
          