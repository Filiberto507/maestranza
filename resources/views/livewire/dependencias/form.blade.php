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
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="form-label" >Id</label>
                    <input type="text" wire:model.lazy="id" class="form-control" placeholder="ej: " maxlength="10">
                    @error('id') <span class="text-danger er">{{ $message}} </span>
                        
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="form-label" >Nombre</label>
                    <input type="text" wire:model.lazy="nombre" class="form-control" placeholder="ej: " maxlength="10">
                    @error('nombre') <span class="text-danger er">{{ $message}} </span>
                        
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
        <button type="button" wire:click.prevent="UpdateRole()" class="btn btn-dark close-modal" >
          ACTUALIZAR
        </button>
        @endif
      </div>
    </div>
  </div>
</div>
          