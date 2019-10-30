@extends('admin.layout.layout')
@section('page-header')
    <h1>
        Prestamos
        <small>Crear prestamo</small>
    </h1>
    <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.loan')}}">Prestamos</a></li>
        <li class="active">Nuevo prestamo</li>
    </ul>
@endsection

@section('container')
    <section class="content-header">
        <h1>
            Crear prestamo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Información del cliente</h3>
                </div>
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user2-160x160.jpg')}}" alt="User profile picture">

                    <h3 class="profile-username text-center">Nina Mcintire</h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-7">
        <!-- Horizontal Form -->
        <div class="box box-primary">
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
            <div class="box-header">
                <h3 class="box-title">Registro de prestamos</h3>
            </div>
            <div class="box-body">

                <div class="alert alert-danger message-danger" role="alert">
                    Este cliente tiene un prestamo pendiente.
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cliente</label>
                    <div class="col-sm-10">
                        <select class="select2" style="width: 100%;" name="customer_id">
                            <option value=""></option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}" data-url="{{route('admin.loan.customer', $customer->id)}}">{{$customer->full_name()}}</option>
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
                <div class="form-group">
                    <label class="col-sm-2 control-label">Interes</label>
                    <div class="col-sm-10">
                        <select class="select2" style="width: 100%;" name="percentaje_id">
                            <option value=""></option>
                            @foreach($percentajes as $percentaje)
                                <option value="{{$percentaje->id}}" data-value="{{$percentaje->interest}}">{{$percentaje->interest}}%</option>
                            @endforeach
                        </select>
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

        var videlxu = {
            btn_accept_modal: '#btnAcceptConfirmation',
            btn_cancel_modal: '#btnCancelConfirmation',
            body : 'body',
            btn_destroy: $('.btn_destroy'),
            btn_register: '#btnRegister',
            validate : false,
            messageConfirm:function (e) {
                //Muestra mensaje de confirmación
                if(videlxu.validate === false){
                    $('#exampleModal').modal('show');
                    e.preventDefault();
                }
                videlxu.validateMessageConfirm();
            },
            validateMessageConfirm:function () {
                $(videlxu.btn_accept_modal).on("click", function(){
                    //Si acepta, el mensaje de confirmación se oculta y envia la información.
                    videlxu.validate = true;
                    if(videlxu.validate){
                        $("#exampleModal").modal('hide');
                        $('#formLoan').submit();
                    }
                });
                $(videlxu.btn_cancel_modal).on("click", function(){
                    //Si cancela, el mensaje de confirmación se oculta.
                    $("#exampleModal").modal('hide');
                    $(videlxu.btn_register).removeAttr('disabled');
                });
                $(videlxu.body).on('click',function () {
                    $(videlxu.btn_register).removeAttr('disabled');
                })
            },
            validateFormCustomer:function () {
                $('#formLoan')
                    .bootstrapValidator({
                        feedbackIcons: {
                            valid: 'fa fa-check',
                            invalid: 'fa fa-remove',
                            validating: 'fa fa-sync-alt'
                        },
                        fields: {
                            customer_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'Porfavor seleccione un cliente.'
                                    }
                                }
                            },
                            amount: {
                                validators: {
                                    stringLength: {
                                        min: 2
                                    },
                                    notEmpty: {
                                        message: 'Porfavor ingrese un monto'
                                    }
                                }
                            },
                            percentaje_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'Porfavor seleccione un interes para el préstamo.'
                                    }
                                }
                            },
                        }
                    })
                    .on('success.form.bv', function(e) {
                        videlxu.messageConfirm(e);
                    });
            },
            disabledBeforeSendForm:function () {
                $( ".send-form" ).submit(function( event ) {
                    $('#send-btn').attr('disabled','disabled');
                });
            },
            destroyCustomer:function () {
                videlxu.btn_destroy.click(function() {
                    var url = $(this).data('url');
                    $.get(url, null, null, 'html')
                        .done(function (view){
                            $('#destroy-confirmation').find('.modal-content').html(view);
                        })
                        .fail(function(){
                            alert("No intentes algo indevido");
                        });
                });
            },
            init:function () {
                this.disabledBeforeSendForm();
                this.validateFormCustomer();
                this.destroyCustomer();
            }
        }
        $('select[name="percentaje_id"]').on('select2:select', function (event){
            var percentaje_value = $('option:selected', this).attr('data-value');
            $("#percentaje-value").val(percentaje_value);
        });
        $('select[name="customer_id"]').on('select2:select', function (event){
            var url = $('option:selected', this).attr('data-url');
            $.get(url, null, null, 'html')
                .done(function (data){
                    data = JSON.parse(data);
                    if(jQuery.isEmptyObject(data.unpainds_loans) == true){
                        $(".message-danger").removeClass( "active" );
                    }else if(jQuery.isEmptyObject(data.unpainds_loans) == false){
                        $(".message-danger").addClass( "active" );
                        $('select[name="customer_id"]').val(null).trigger("change");
                    }
                })
                .fail(function(){
                    alert("No intentes algo indevido");
                });
        });
    </script>
@endsection