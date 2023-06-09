@include('common.modalHead')

<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Fecha</label>
            <input type="date" wire:model.lazy="fecha" class="form-control" placeholder=" ">
            @error('fecha') <span class="text-danger er">{{ $message}} </span>

            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Dependencia</label>
            <input type="text" wire:model.lazy="dependencia" class="form-control" placeholder="ej: Gabinete">
            @error('dependencia') <span class="text-danger er">{{ $message}} </span>

            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Conductor</label>
            <input type="text" wire:model.lazy="conductor" class="form-control" placeholder="ej: Crismar Rodrigo">
            @error('conductor') <span class="text-danger er">{{ $message}} </span>

            @enderror
        </div>
    </div>

  
<div class="col-sm-12 col-md-6">
  <div class="form-group">
      <label>Asignar Vehiculo</label>
      <select wire:model.lazy="vehiculos_id" class="form-control" id="select2-dropdown" >
          <option value="Elegir" selected> Elegir </option>
          @foreach($Vehiculos as $v)
          <option value="{{$v->id}}" selected> {{$v->placa}}</option>
          @endforeach
      </select>
      @error('vehiculos_id') <span class="text-danger er">{{ $message}} </span>

      @enderror
  </div>
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
                <td><input type="text" class="form-control" wire:model="filas.{{ $index }}.items" /></td>
                <td><textarea class="form-control" wire:model="filas.{{ $index }}.descriptions" name="" id="" col="100"  rows="2"></textarea></td>
                <td><button class="btn btn-danger" wire:click="eliminarFila({{ $index }})">Eliminar</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-sm-12 col-md-8">
      <div class="form-group">
          <label>Observaciones</label>
          <textarea wire:model.lazy="observaciones" class="form-control" name="" id="" cols="100" rows="4" placeholder="..."></textarea>
          @error('observaciones') <span class="text-danger er">{{ $message}} </span>

          @enderror
      </div>


    <!-- tabla de solo uno -->

    <!-- <table class="table  table-bordered table-hover mt-1">
        <thead>
          <tr>
            <th>Numero de item</th>
            <th>Descripcion</th>
            <th>
              <button wire:click="agregar">
                Agregar
              </button>
            </th>
          </tr>
        </thead>

        <tbody>
            @foreach($filas as $index => $fila)
              <tr>
                <td><input type="text" wire:model="filas.{{ $index}}.items"></td>
                <td><input type="text" wire:model="filas.{{ $index}}.descripcion"></td>
              </tr>
            @endforeach
        </tbody>
    </table> -->


    <!-- <button wire:click="agregarFila">Agregar fila</button> -->




</div>

@include('common.modalFooter')