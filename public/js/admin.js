(function($){
    $(document).ready(function () {
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
                $('#formCustomer').submit();
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
        $('#formCustomer')
            .bootstrapValidator({
                feedbackIcons: {
                    valid: 'fa fa-check',
                    invalid: 'fa fa-remove',
                    validating: 'fa fa-sync-alt'
                },
                fields: {
                    first_name: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Porfavor ingrese su nombre'
                            }
                        }
                    },
                    last_name: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Porfavor ingrese su apellido'
                            }
                        }
                    },
                    nick_name: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Porfavor ingrese su apodo'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'Porfavor ingrese su número de celular'
                            },
                            phone: {
                                country: 'PE',
                                message: 'Porfavor proporcione un número de teléfono válido'
                            }
                        }
                    },
                    company_id: {
                        validators: {
                            notEmpty: {
                                message: 'Porfavor seleccione una empresa.'
                            }
                        }
                    },
                    position_id: {
                        validators: {
                            notEmpty: {
                                message: 'Porfavor seleccione un cargo.'
                            }
                        }
                    },
                    address: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Porfavor ingrese su dirección de domicilio'
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