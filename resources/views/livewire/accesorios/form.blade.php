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
            <label class="form-label" >Nombre</label>
            <input type="text" wire:model.lazy="nombre" class="form-control" placeholder="ej: 2344 xly" maxlength="10">
            @error('nombre') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>

</div>
@include('common.modalFooter')