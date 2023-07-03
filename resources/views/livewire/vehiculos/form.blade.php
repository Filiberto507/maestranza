@include('common.modalHead')
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label class="form-label" >Placa</label>
            <input type="text" wire:model.lazy="placa" class="form-control" placeholder="ej: 2344 xly" maxlength="10">
            @error('placa') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label >Modelo</label>
            <input type="text" wire:model.lazy="modelo" class="form-control" placeholder="ej: X-trail" maxlength="10">
            @error('modelo') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label >Marca</label>
            <input type="text" wire:model.lazy="marca" class="form-control" placeholder="ej: Nissan" maxlength="10">
            @error('marca') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label >Año</label>
            <input type="text" wire:model.lazy="año" class="form-control" placeholder="ej: 2005" maxlength="10">
            @error('año') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label >Color</label>
            <input type="text" wire:model.lazy="color" class="form-control" placeholder="ej: plomo" maxlength="10">
            @error('color') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label >Cilindrada</label>
            <input type="text" wire:model.lazy="cilindrada" class="form-control" placeholder="ej: 2.500 CC" maxlength="10">
            @error('cilindrada') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label >Chasis</label>
            <input type="text" wire:model.lazy="chasis" class="form-control" placeholder="ej: 1HGBH41JXMN109186" maxlength="10">
            @error('chasis') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label >Motor</label>
            <input type="text" wire:model.lazy="motor" class="form-control" placeholder="ej: 52WBC10338" maxlength="10">
            @error('motor') <span class="text-danger er">{{ $message}} </span>
                
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Asignar Dependencia</label>
            <select wire:model.lazy="dependencias_id" class="form-control" id="select2-dropdown" >
                <option value="Elegir" selected> Elegir </option>
                @foreach($Dependencias as $dep)
                <option value="{{$dep->id}}" selected> {{$dep->nombre}} </option>
                @endforeach
            </select>
            @error('dependencias_id') <span class="text-danger er">{{ $message}} </span>

            @enderror
        </div>
    </div>
        

</div>
@include('common.modalFooter')