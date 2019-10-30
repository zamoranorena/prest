{{ Form::open(['route' => ['admin.customer.destroy', $customer->token], 'class' => 'form-horizontal', 'method' => 'DELETE']) }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-circle fa-lg"></i> Nuevo mensaje</h4>
    </div>
    <div class="modal-body">
        <p class="text-center">Seguro que quieres eliminar un cliente?</p>
        <p class="text-center">El cliente será eliminado del sistema</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </div>
{{ Form::close() }}
