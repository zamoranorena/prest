@extends('admin.layout.layout')
@section('page-header')
    <h1>
        Clientes
        <small>Lista de cliente</small>
    </h1>
    <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active"><a>Lista de clientes</a></li>
    </ul>
@endsection

@section('container')
    @if($flash = session('message'))
        <div class="alert alert-success" role="alert">
            {{$flash}}
        </div>
    @endif
    <section class="content-header">
        <h1>
            Lista de clientes
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>
    <section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de clientes</h3>
            <div class="box-tools pull-right">
                <div class="pull-right mb-10 hidden-sm hidden-xs">
                    <a href="{{route('admin.customer.create')}}" class="btn btn-primary btn"><i class="fa fa-plus" aria-hidden="true"></i>
                         Nuevo cliente</a>
                </div><!--pull right-->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="list-customers" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">Nro</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$customer->full_name()}}</td>
                          <td>{{$customer->company->name}}</td>
                          <td>{{$customer->position->name}}</td>
                        <td>
                            <div class="mb-10 hidden-sm hidden-xs">
                                <a href="{{route('admin.customer.edit', $customer->token )}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{{route('admin.customer.show', $customer->token )}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-danger btn_destroy" data-toggle="modal" data-target="#destroy-confirmation" data-url="{{route('admin.customer.edit', $customer->token)}}"><i class="fa fa-trash"></i></a>
                            </div><!--pull right-->

                            <div class="mb-10 hidden-lg hidden-md">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cogs"></i>
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{route('admin.customer.show', $customer->token )}}">Mostrar</a></li>
                                        <li><a href="{{route('admin.customer.edit', $customer->token )}}">Editar</a></li>
                                        <li><a href="#" class="btn_destroy" data-toggle="modal" data-target="#destroy-confirmation" data-url="{{route('admin.customer.edit', $customer->token)}}">Eliminar</a></li>
                                    </ul>
                                </div>
                            </div><!--pull right-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    </section>
<!-- /.box -->
<div class="modal fade" id="destroy-confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>
@endsection