@extends('admin.layout.layout')

@section('page-header')
    <h1>
        Clientes
        <small>Editar cliente</small>
    </h1>
    <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}" >Dashboard</a></li>
        <li><a href="{{route('admin.customer')}}">Clientes</a></li>
        <li class="active">Editar cliente</li>
    </ul>
@endsection

@section('container')
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar cliente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::open(['route' => ['admin.customer.update', $customer->token], 'class' => 'form-horizontal', 'id' => 'formCustomer', 'method' => 'put']) }}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombres</label>
                    <div class="col-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="first_name" value="{{$customer->first_name}}" placeholder="Cuál es su nombre?">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Apellidos</label>
                    <div class="col-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="last_name" value="{{$customer->last_name}}" placeholder="Cuál es su apellido?">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Apodo</label>
                    <div class="col-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                            <input type="text" class="form-control" name="nick_name" value="{{$customer->nick_name}}" placeholder="Cuál es su apodo?">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Teléfono</label>
                    <div class="col-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="tel" class="form-control" name="phone" value="{{$customer->phone}}" placeholder="(000)-000-000" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Compañía</label>
                    <div class="col-sm-10">
                        <select class="select2" style="width: 100%;" name="company_id">
                            @foreach($companies as $companie)
                                <option value="{{$companie->id}}" @if($customer->company->id == $companie->id)selected="selected"@endif>{{$companie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cargo</label>
                    <div class="col-sm-10">
                        <select class="select2" style="width: 100%;" name="position_id">
                            @foreach($positions as $position)
                                <option value="{{$position->id}}" @if($customer->position->id == $position->id)selected="selected"@endif>{{$position->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Dirección</label>
                    <div class="col-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <input type="text" class="form-control" name="address" value="{{$customer->address}}" placeholder="Dirección de domicilio donde vive">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-block btn-success btn-lg" id="btnRegister">Actualizar</button>
                <a href="{{route('admin.customer')}}" class="btn btn-block btn-danger btn-lg">Cancelar</a>
            </div>
            <!-- /.box-footer -->
            {{ Form::close() }}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-circle fa-lg"></i> Nuevo mensaje</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Seguro que quieres actualizar un cliente?</p>
                            <p class="text-center">Los datos modificados serán actualizados en el sistema.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelConfirmation">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="btnAcceptConfirmation">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection