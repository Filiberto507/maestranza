@include('common.modalHead')

<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label >Nombre</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="ej: Crismar Rodrigo">
            @error('name') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label >Telefono</label>
            <input type="text" wire:model.lazy="phone" class="form-control" placeholder="ej: 66985745" maxlength="10">
            @error('phone') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>


    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label >Estado</label>
            <select wire:model.lazy="status" class="form-control" >
                <option value="Elegir" selected> Elegir </option>
                <option value="Active" selected> Activo </option>
                <option value="Locked" selected> Bloqueado </option>
            </select>
            @error('status') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>



</div>

@include('common.modalFooter')