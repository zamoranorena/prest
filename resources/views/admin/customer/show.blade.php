@extends('admin.layout.layout')

@section('page-header')
    <h1>
        Clientes
        <small>Ver clientes</small>
    </h1>
    <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.customer')}}">Clientes</a></li>
        <li class="active">Ver Cliente</li>
    </ul>
@endsection

@section('container')
    <!-- Horizontal Form -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Ver cliente</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">General</a>
                    </li>
                    <li role="presentation">
                        <a href="#history" aria-controls="history" role="tab" data-toggle="tab">Historia</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        <table class="table table-striped table-hover">

                            <tr>
                                <th>Nombres</th>
                                <td>{{$customer->first_name}}</td>
                            </tr>

                            <tr>
                                <th>Apellidos</th>
                                <td>{{$customer->last_name}}</td>
                            </tr>

                            <tr>
                                <th>Apodo</th>
                                <td>{{$customer->nick_name}}</td>
                            </tr>

                            <tr>
                                <th>Teléfono</th>
                                <td>{{$customer->phone}}</td>
                            </tr>

                            <tr>
                                <th>Empresa</th>
                                <td>{{$customer->company->name}}</td>
                            </tr>

                            <tr>
                                <th>Cargo</th>
                                <td>{{$customer->position->name}}</td>
                            </tr>

                            <tr>
                                <th>Dirección</th>
                                <td>{{$customer->address}}</td>
                            </tr>
                            <tr>
                                <th>Creado por</th>
                                <td>{{$customer->user->name}}</td>
                            </tr>
                        </table>
                    </div><!--tab overview profile-->
                    <div role="tabpanel" class="tab-pane mt-30" id="history">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>F. Creación</th>
                                <td>{{$customer->created_at->toFormattedDateString()}}</td>
                            </tr>
                            <tr>
                                <th>Ultima Actualización</th>
                                <td>{{$customer->updated_at->toFormattedDateString()}}</td>
                            </tr>
                        </table>
                    </div><!--tab panel history-->
                </div><!--tab content-->
            </div><!--tab panel-->
        </div>
    </div>
@endsection