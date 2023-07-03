@include('common.modalHead')

<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="ej: Crismar Rodrigo">
            @error('name') <span class="text-danger er">{{ $message}} </span>

            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Telefono</label>
            <input type="text" wire:model.lazy="telefono" class="form-control" placeholder="ej: 66985745" maxlength="10">
            @error('telefono') <span class="text-danger er">{{ $message}} </span>

            @enderror
        </div>
    </div>


    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Estado</label>
            <select wire:model.lazy="status" class="form-control">
                <option value="Elegir" selected> Elegir </option>
                <option value="Active" selected> Activo </option>
                <option value="Locked" selected> Bloqueado </option>
            </select>
            @error('status') <span class="text-danger er">{{ $message}} </span>

            @enderror
        </div>
    </div>

    <table class="table  table-bordered table-hover mt-1">
        <thead>
            <tr>
                <th>Número de Items</th>
                <th>Descripción</th>
                
                <th> 
                    <button class="btn btn-primary" wire:click="agregarFila({{1}})">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </div>
                   1 </button>

                    <button class="btn btn-primary" wire:click="agregarFila({{2}})">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </div>
                    2</button>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filas as $index => $fila)
            <tr>
                <td><input type="text" wire:model="filas.{{ $index }}.items" /></td>
                <td><input type="text"  /></td>
                <td><textarea wire:model="filas.{{ $index }}.descriptions" name="" id="" col="100"  rows="3"></textarea></td>
                <td><button class="btn btn-danger" wire:click="eliminarFila({{ $index }})">Eliminar</button></td>
            </tr>
            @endforeach

            @foreach ($filas2 as $index => $fila)
            <tr>
                <td><input type="text" wire:model="filas2.{{ $index }}.items" /></td>
                <td><input type="text" wire:model="filas2.{{ $index }}.descriptions" /></td>
                <td><button class="btn btn-danger" wire:click="eliminarFila({{ $index }})">Eliminar</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>


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