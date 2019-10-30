@extends('admin.layout.layout')
@section('page-header')
    <h1>
        Clientes
        <small>Crear cliente</small>
    </h1>
    <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.customer')}}">Clientes</a></li>
        <li class="active">Nuevo cliente</li>
    </ul>
@endsection

@section('container')
<section class="content-header">
    <h1>
        Crear cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
    </ol>
</section>
<section class="content">
<!-- Horizontal Form -->
<div class="box box-primary">
<!-- /.box-header -->
<!-- form start -->
{{ Form::open(['route' => 'admin.customer.store', 'class' => 'form-horizontal','id' => 'formCustomer']) }}
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
      <legend class="text-center">Datos del cliente</legend>
      <div class="form-group">
          <label class="col-sm-2 control-label">Nombres</label>
          <div class="col-sm-10">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" name="first_name" placeholder="Cuál es su nombre?">
              </div>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label">Apellidos</label>
          <div class="col-sm-10">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" name="last_name" placeholder="Cuál es su apellido?">
              </div>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label">Apodo</label>
          <div class="col-sm-10">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                <input type="text" class="form-control" name="nick_name" placeholder="Cuál es su apodo?">
            </div>
          </div>
      </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Teléfono</label>
            <div class="col-sm-10">
                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="tel" class="form-control" name="phone" placeholder="(000)-000-000">
                </div>
            </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label">Compañía</label>
          <div class="col-sm-10">
              <select class="select2" style="width: 100%;" name="company_id">
                  <option value=""></option>
                  @foreach($companies as $companie)
                    <option value="{{$companie->id}}">{{$companie->name}}</option>
                  @endforeach
              </select>
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label">Cargo</label>
          <div class="col-sm-10">
              <select class="select2" style="width: 100%;" name="position_id">
                  <option value=""></option>
                  @foreach($positions as $position)
                      <option value="{{$position->id}}">{{$position->name}}</option>
                  @endforeach
              </select>
          </div>
      </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Dirección</label>
      <div class="col-sm-10">
        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-home"></i></span>
          <input type="text" name="address" placeholder="Dirección de domicilio donde vive" class="form-control" >
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box box-primary">
      <div class="box-body">
        <div class="pull-left">
            <a href="{{route('admin.customer')}}" class="btn btn-default btn-lg">Cancelar</a>
        </div><!--pull-left-->

        <div class="pull-right">
            <input class="btn btn-primary btn-lg " id="btnRegister" type="submit" value="Guardar">
        </div><!--pull-right-->

        <div class="clearfix"></div>
      </div><!-- /.box-body -->
  </div>
  <!-- /.box-footer -->
{{ Form::close() }}

    @include('admin.customer.includes.message-confirmation')

</div>
</section>
@endsection