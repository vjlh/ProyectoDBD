<!-- Modal -->

<form action="/transporte/{{ $transporte->id }}" method="post">
@method('PATCH')
@csrf
    <div class="modal fade" id="modal-transporte-update{{$transporte->id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editando Vehículo patente: {{$transporte->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body" style="color: black">
                        
                <div class="form-group row">
                    <label 
                    for="precio" 
                    class="col-sm-4 col-form-label text-md-right"
                    >
                    {{ __('Precio') }}
                    </label>

                    <div class="col-md-6">
                        <input 
                        id="precio" 
                        name="precio" 
                        type="number"
                        min="0"
                        class="form-control"  
                        value="{{ $transporte->precio }}" 
                        required 
                        autofocus
                        >
                    </div>
                </div>
        
        
        
            </div>
    </div>
    </div>
</form>
