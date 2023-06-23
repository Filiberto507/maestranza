@include('common.modalHead')
<div class="row">
    
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label class="form-label" >Id</label>
            <input type="date" wire:model.lazy="id" class="form-control" placeholder="ej: 2344 xly" maxlength="10">
            @error('id') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label class="form-label" >Fecha</label>
            <input type="date" wire:model.lazy="fecha" class="form-control" placeholder="ej: 2344 xly" maxlength="10">
            @error('fecha') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label class="form-label" >Item</label>
            <input type="text" wire:model.lazy="item" class="form-control" placeholder="ej: 2344 xly" maxlength="10">
            @error('item') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label >Descripcion</label>
            <textarea name="descripcion" rows="5" cols="60"></textarea>
            @error('descripcion') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label >Observaciones</label>
            <textarea name="observaciones" rows="5" cols="106"></textarea>
            @error('observacioines') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>

</div>
@include('common.modalFooter')