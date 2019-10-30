@extends('admin.layout.layout')
@section('page-header')
    <h1>
        Pagos
        <small>Crear pago</small>
    </h1>
    <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.loan')}}">Pagos</a></li>
        <li class="active">Nuevo pago</li>
    </ul>
@endsection
@section('container')
    <section class="content-header">
        <h1>
            Crear pago
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>
    <section class="content">
    <!-- Horizontal Form -->
    <div class="row">
    <div class="col-md-7">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Información del prestamo</h3>
                <small class="pull-right">Fecha: 2/10/2014</small>
            </div>
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user2-160x160.jpg')}}" alt="User profile picture">

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Monto prestado</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Interes</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Many more skins available. <a href="http://fronteed.com/iCheck/">Documentation</a>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Registro de pagos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::open(['route' => 'admin.loan.store', 'class' => 'form-horizontal','id' => 'formLoan']) }}
            <input type="hidden" name="percentaje_value" value="" id="percentaje-value">
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

                <legend class="text-center">Datos del pago</legend>
                <div class="alert alert-danger message-danger" role="alert">
                    Este cliente tiene un prestamo pendiente.
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cliente</label>
                    <div class="col-sm-10">
                        <select class="select2" style="width: 100%;" name="customer_id">
                            <option value=""></option>
                            @foreach($loans as $loan)
                                <option value="{{$loan->id}}">{{$loan->customer->full_name()}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Monto</label>
                    <div class="col-sm-10">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                            <input type="text" class="form-control amount" name="amount" data-mask="#,##0.00" placeholder="Ingrese el monto a prestar">
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
                        <input class="btn btn-primary btn-lg" type="submit" value="Guardar">
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div>
            <!-- /.box-footer -->
            {{ Form::close() }}

            @include('admin.loan.includes.message-confirmation')

        </div>
    </div>
    </div>
    </section>
@endsection
@section('after-scripts')
    <script>
        (function($){
            $(document).ready(function () {
                $('.amount').mask('#,##0.00', { reverse: true });
                videlxu.init();
            });
        })(jQuery);
    </script>
@endsection