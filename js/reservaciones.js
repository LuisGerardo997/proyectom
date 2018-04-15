var seleccionadoh = new Array();
var seleccionadodh = new Array();
var huespedes = new Array();
var objeto = new Object();
var habitacion_estadia_detalle = $('#habitacion_estadia_detalle');
// INICIO: OBTENER FECHA
var d = new Date();

var month = d.getMonth() + 1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
    (month < 10 ? '0' : '') + month + '-' +
    (day < 10 ? '0' : '') + day;
// FIN: OBTENER FECHA

function deldat(cod_estadia) {
    swal({
            title: "¿Está seguro?",
            text: "Una vez eliminado, no volverá a tener acceso a este elemento.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post(base_url + 'reservaciones/eliminar', {
                        cod_estadia: cod_estadia,
                    },
                    function (data) {
                        console.log(data);
                        if (data == 1) {
                            swal('El elemento ha sido eliminado.', {
                                icon: "success"
                            });
                            location.reload();
                        }
                    });
            } else {
                swal("El elemento no fue eliminado.");
            }
        });
};

function confirmarEstadia(estadia) {
    $.post(base_url + 'reservaciones/confirmar_estadia', {
            cod_estadia: estadia
        },
        function (r) {
            if (r == 1) {
                swal('Reservación confirmada.');
                // location.reload();
            } else {
                swal('Error al confirmar :c');
            }
        })
};

function mostrar_detalle(id) {
    $.ajax({
        url: base_url + 'reservaciones/consultar_habitacion_estadia',
        type: 'GET',
        dataType: 'json',
        data: {
            cod_estadia1: id
        },
        success: function (r) {
            habitacion_estadia_detalle.DataTable().clear();
            if (r.length > 0) {
                $.each(r, function (key, value) {
                    habitacion_estadia_detalle.DataTable().row.add([
                        value.cod_habitacion,
                        value.cod_persona,
                        value.nombres,
                        value.apellido_paterno,
                        value.apellido_materno,
                    ]).draw(false);
                });
            } else {
                $('#habitacion_estadia_detalle tbody').empty();
                habitacion_estadia_detalle.DataTable().draw();
            };
        }
    });
};
var espacios = Array();
var habitaciones = Array();
function add_client(estadia) {
    $('#add_client').modal();
    $('#codi_estadia').val(estadia);
    espacios.length=0;
    habitaciones.length=0;
    $.ajax({
        url: base_url + 'reservaciones/detalle_habitacion_estadia',
        type: 'get',
        dataType: 'json',
        data: {
            cod_estadia: estadia
        },
        success: function (response) {
            $('#huesped_detail').html('');
            if (response.length > 0) {
                var html = '';
                var html0 = '';
                $.each(response, function (key, value) {
                    habitaciones.push(value.cod_habitacion);
                    espacios.push(value.espacios);
                    if (value.espacios > 0) {
                        html = '';
                        for (var x = 0; x < value.espacios; x++) {
                            html += '<div class="col-md-3">' +
                                '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">DNI</label>' +
                                '<input type="number" name="' + x + '_dni_' + value.cod_habitacion + '" id="' + x + 'dni_huesped' + value.cod_habitacion + '" class="form-control dni" data-index="' + x + '" data-group="'+value.cod_habitacion+'">' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="col-md-3">' +
                                '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">Nombres</label>' +
                                '<input type="text" name="' + x + '_nombres_' + value.cod_habitacion + '" id="' + x + 'huesped_name' + value.cod_habitacion + '" class="form-control">' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="col-md-3">' +
                                '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">Apellido Paterno</label>' +
                                '<input type="text" name="' + x + '_ap_' + value.cod_habitacion + '" id="' + x + 'huesped_am' + value.cod_habitacion + '" class="form-control">' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="col-md-3">' +
                                '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">Apellido Materno</label>' +
                                '<input type="text" name="' + x + '_am_' + value.cod_habitacion + '" id="' + x + 'huesped_ap' + value.cod_habitacion + '" class="form-control">' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        }
                    } else {
                        html = '<div class="text-center">No existen espacios disponibles en esta habitación.</div>';
                    };
                    html0 += '<div class="col-md-12 text-center"><h4>Habitacion ' + value.cod_habitacion + '</h4>';
                    html0 += '<div  class="col-md-12" id="' + value.cod_habitacion + '"><p><strong>Tipo de habitación: </strong>' + value.tipo_habitacion + '</p>';
                    html0 += '<p><strong>Piso: </strong>' + value.piso + '</p>';
                    html0 += '<div class="col-md-12" id="deta' + value.cod_habitacion + '"><br>' + html + '</div><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"><hr></div></div></div>';
                    $('#huesped_detail').html(html0);
                    $('input.dni').keyup(function () {
                        var dni = $(this).val();
                        if (dni.length == 8) {
                            var index = $(this).attr('data-index');
                            var habitacion = $(this).attr('data-group');
                            // console.log(index);
                            add_confirm(dni, index, habitacion);
                        }
                    });
                });
            }
        }
    });

    // function dni_keyEvent(dni_field, index) {
    //     console.log(dni_field, index, habitaciones);
    //     add_confirm(habitaciones, dni_field, index);
    // }

}

function add_confirm(dni_field, index, habitacion) {
        consultar_cliente(habitacion, dni_field, index);
        // console.log('llego');
        // console.log(consultar_cliente(habitacion, dni_field, index));
}

function consultar_cliente(cod_habitacion, cod_cliente, index) {
    $.ajax({
        url: 'clientes/consultar_cliente',
        type: 'get',
        dataType: 'json',
        data: {
            cod_cliente: cod_cliente
        },
        success: function (r) {
            if (r != false) {
                $('#' + index + 'huesped_name' + cod_habitacion).attr('readonly', 'readonly');
                $('#' + index + 'huesped_name' + cod_habitacion).val(r['0'].nombres);
                $('#' + index + 'huesped_am' + cod_habitacion).attr('readonly', 'readonly');
                $('#' + index + 'huesped_am' + cod_habitacion).val(r['0'].apellido_paterno);
                $('#' + index + 'huesped_ap' + cod_habitacion).attr('readonly', 'readonly');
                $('#' + index + 'huesped_ap' + cod_habitacion).val(r['0'].apellido_materno);
                // // console.log(r['0'].cod_persona, r, cod_cliente, index);
            } else {
                // console.log('No existe');
                $('#' + index + 'huesped_name' + cod_habitacion).removeAttr('disabled');
                $('#' + index + 'huesped_name' + cod_habitacion).val('');
                $('#' + index + 'huesped_am' + cod_habitacion).removeAttr('disabled');
                $('#' + index + 'huesped_am' + cod_habitacion).val('');
                $('#' + index + 'huesped_ap' + cod_habitacion).removeAttr('disabled');
                $('#' + index + 'huesped_ap' + cod_habitacion).val('');
            }
        }
    });
}

$('#btn-add').click(function(){
    var datos_formulario = $('form[name="huesped_add"]').serialize();
    $.ajax({
        url: 'reservaciones/add_huesped',
        type: 'get',
        dataType: 'json',
        data:{
            formData: datos_formulario,
            habitaciones: habitaciones,
            espacios: espacios,
            cod_estadia: $('#codi_estadia').val(),
        },
        success: function(response){
            console.log(response);
        }
    })
    // console.log();
});

function validacion_r1(){
    var fecha_ingreso = $('#fecha_estadia').val();
    var fecha_salida = $('#fecha_salida').val();
    if ((fecha_ingreso && fecha_salida)==''||(seleccionadoh.length==0)){
        $('a[href="#next"]').parent().css('display', 'none');
        $('a[href="#wizard_horizontal-h-1"]').parent().removeClass('done').addClass('disabled').attr('aria-disabled','true');
    }else{
        $('a[href="#next"]').parent().css('display', 'block');
    }
}
function validacion_r2(){
    var fecha_ingreso = $('#fecha_estadia').val();
    var fecha_salida = $('#fecha_salida').val();
    if ((fecha_ingreso && fecha_salida)==''||(seleccionadoh.length==0)){
        $('a[href="#next"]').parent().css('display', 'none');
        $('a[href="#wizard_horizontal-h-1"]').parent().removeClass('done').addClass('disabled').attr('aria-disabled','true');
    }else{
        $('a[href="#next"]').parent().css('display', 'block');
    }
}


$(document).on('ready', function () {
    activar_menu('reservaciones', false);
    // INICIO: DEFINICION DE VARIABLES
    var reservaciones_dt = $('#dt_table');
    var field_table = $('#client_dt_body');
    var table_client = $('#client_dt');
    var inputsval = Array();
    var num_hues = 0;
    var fecha_reservacion = $('#fecha_r');
    var fecha_estadia = $('#fecha_estadia');
    var fecha_salida = $('#fecha_salida');
    var fecha_salida_e = $('#fecha_salida_e');
    var btn_ahora = $('#ahora');
    var detalle_body = $('#detalle_body');
    var body_hab = $('#body_hab');
    var nom_client = $('#nom_client');
    var app_client = $('#app_client');
    var apm_client = $('#apm_client');
    var cliente = $('#cliente');
    var nombres = $('#nombres');
    var apellido_p = $('#apellido_p');
    var apellido_m = $('#apellido_m');
    var empleado_div = $('#empleado_div');
    var fecha_div = $('#fecha_div');
    var tipo_r_div = $('#tipo_r_div');
    var estadia_div = $('#estadia_div');
    var realizar_venta = $('#realizar_venta');
    var nro_res = $('#nro_res');
    var cliente = $('#cliente');
    var btn_registrar = $('#btn_registrar');
    var cliente_form = $('#cliente_form');
    // FIN: DEFINICION DE VARIABLES

    fecha_salida.attr('disabled', 'disabled');
    fecha_estadia.bootstrapMaterialDatePicker({
        minDate: new Date(),
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false,
        minDate: new Date(),
    });
    fecha_salida.bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false,
    });
    fecha_salida_e.bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false,
    });
    fecha_estadia.change(function () {
        console.log('hola');
        inicializar_fecha_salida(fecha_estadia.val());
    });

    // INICIO: FUNCIONES
    function inicializar_fecha_salida(value) {
        var date = value;
        fecha_salida.removeAttr('disabled');
        fecha_salida.bootstrapMaterialDatePicker('setMinDate', date);
    };


    function registrar_cliente() {
        $.ajax({
            url: base_url + 'reservaciones/registrar_cliente',
            type: 'POST',
            dataType: 'JSON',
            data: {
                cliente: cliente.val(),
                nombres: $('#nombres').val(),
                apellido_p: $('#apellido_p').val(),
                apellido_m: $('#apellido_m').val(),
            },
            success: function (r) {
                console.log(r);
            }
        }).done(function () {
            swal('Cliente registrado correctamente.');
            $('#nombres').val('');
            $('#apellido_p').val('');
            $('#apellido_m').val('');
            $('#nom_client').css("display", "none");
            $('#app_client').css("display", "none");
            $('#apm_client').css("display", "none");
            btn_registrar.css('display', 'none');

        }).fail(function () {
            swal('Error al registrar');
        });
    }

    editClient = function (cod_estadia, fecha_ingreso, fecha_salida) {
        fecha_salida_e.bootstrapMaterialDatePicker('setMinDate', fecha_ingreso)
        fecha_salida_e.val(fecha_salida);
        insertdat = function () {
            $.post(base_url + "reservaciones/actualizar", {
                    cod_estadia: cod_estadia,
                    fecha_salida: fecha_salida_e.val(),
                },
                function (data) {
                    if (data == 1) {
                        swal('Guardado');
                        $('#cerrar_modal').click();
                        location.reload();
                    }
                    swal(data);
                });
        }
    };
    terminar_estadia = function(cod_estadia){
        swal({
            title: '¿Está seguro?',
            text: 'Está a punto de terminar una reservacion, ¿está completamente seguro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Sí, terminar',
            closeOnConfirm: true,
        },
        function(){
            $.ajax({
                url: base_url+'reservaciones/terminar_estadia',
                dataType: 'json',
                type: 'get',
                data: {cod_estadia: cod_estadia},
                success: function(response){
                }
            })
            location.reload();
        });
    }

    function habitaciones_reservar(arg1 = '', arg2 = '') {
        $.post(base_url + 'reservaciones/room_list', {
                fecha_estadia: arg1,
                fecha_salida: arg2,
            },
            function (data) {
                console.log(data);
                var html = '';
                var datos = eval(data);
                for (i = 0; i < datos.length; i++) {
                    html += '<tr>' +
                        '<td>' + datos[i]['cod_habitacion'] + '</td>' +
                        '<td>' + datos[i]['tipo_habitacion'] + '</td>' +
                        '<td>' + datos[i]['piso'] + '</td>' +
                        '<td>' + datos[i]['precio'] + '</td>' +
                        '<td><input type="checkbox" name="listado_h" value="' + datos[i]['cod_habitacion'] + '" id="h' + datos[i]['cod_habitacion'] + '"><label for="h' + datos[i]['cod_habitacion'] + '"></label></td>' +
                        '</tr>';
                }
                body_hab.html(html);
                seleccionadoh.forEach(function (i) {
                    $('#h' + i + '').prop('checked', true);
                });

                $('input[type=checkbox]').click(function () {
                    var elemento = $(this).val();
                    if (seleccionadoh.includes(elemento)) {
                        var pos = seleccionadoh.indexOf(elemento);
                        seleccionadoh.splice(pos, 1);
                        validacion_r1();
                    }
                    $('input[name=listado_h]:checked').each(function () {
                        if (seleccionadoh.includes($(this).val()) == false) {
                            seleccionadoh.push($(this).val());
                            validacion_r1();
                        }
                    })
                })
            })
    }
    // FIN: FUNCIONES
    habitacion_estadia_detalle.DataTable({
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'language': español
    });

    reservaciones_dt.DataTable({
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": base_url + "reservaciones/consultar",
            "type": "get",
            dataSrc: ''
        },
        'columns': [{
                data: 'cod_estadia'
            },
            {
                data: 'cod_cliente'
            },
            {
                data: 'estado'
            },
            {
                data: 'fecha_reserva'
            },
            {
                data: 'fecha_ingreso'
            },
            {
                data: 'fecha_salida'
            },
            {
                "orderable": true,
                render: function (data, type, row) {
                    var confirm = '';
                    var delete_li = '';
                    var add_li = '';
                    var remove_li = '';
                    if (row.estado == 'Pendiente') {
                        confirm = '<li><a class="waves-effect waves-block" onClick="confirmarEstadia(\'' + row.cod_estadia + '\')">Confirmar</a></li>';
                    };
                    if (row.estado != 'En curso') {
                        delete_li = '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\'' + row.cod_estadia + '\')">Descartar</a></li>';
                    };
                    if (row.estado == 'En curso') {
                        add_li = '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="add_client(\'' + row.cod_estadia + '\')">Añadir huésped</a></li>';
                        remove_li = '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="terminar_estadia(\'' + row.cod_estadia + '\')">Terminar estadía</a></li>';
                    };
                    return '<div class="btn-group" role="group">' +
                        '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        'Acciones <span class="caret"></span>' +
                        '</button>' +
                        '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">' +
                        '<li><a class="waves-effect waves-block" onClick="VerDetalle(\'' + row.cod_estadia + '\')">Ver detalles</a></li>' + confirm + add_li +remove_li+
                        '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\'' + row.cod_estadia + '\',\'' + row.fecha_ingreso + '\',\'' + row.fecha_salida + '\');">Editar</a></li>' +
                        delete_li +
                        '</ul>' +
                        '</div>'
                }
            }
        ],
        "order": [
            [0, "asc"]
        ],
        'language': español
    });
    $('#fecha_r').val(output);
    $('#despues').click(function () {
        fecha_estadia.val('');
        fecha_estadia.focus();
    })
    fecha_estadia.change(function () {
        if ($(this).val() == output) {
            btn_ahora.click();
        } else {
            $('#despues').prop('checked', 'checked');
        };
        if ($('#despues').val() != '') {

        }
        validacion_r1();
    })
    fecha_salida.change(function () {
        fecha_estadia.bootstrapMaterialDatePicker('setMaxDate', fecha_salida.val());
        habitaciones_reservar(fecha_estadia.val(), fecha_salida.val());
        validacion_r1();
    })
    btn_ahora.click(function () {
        estadia_div.attr("style", "display:block");
        fecha_estadia.val(output);
        inicializar_fecha_salida(fecha_estadia.val());
        validacion_r1();
    })

    realizar_venta.click(function () {
        validacion_r1();
        $('input.date').change(function(){
            validacion_r1();
        })
        nro_res.val(parseInt(num_reservacion) + 1);
        var flag = 0;
        cliente.on('keyup', function () {
            var cliente_in = $(this);
            if ($(this).val().length == 8) {
                // $('#cliente').blur();
                $.post(base_url + 'reservaciones/comprobar_cliente', {
                        cliente: cliente.val(),
                    },
                    function (data) {
                        if (data == 'No existe') {
                            flag++;
                            $('#detalles').html('');
                            nom_client.attr("style", "display:block");
                            app_client.attr("style", "display:block");
                            apm_client.attr("style", "display:block");
                            app_client.attr("style", "display:block");
                            btn_registrar.css('display', 'block');
                            nom_client.attr("class", "col-md-3");
                            app_client.attr("class", "col-md-3");
                            apm_client.attr("class", "col-md-3");
                            //empleado_div.setAttribute("class","col-md-3 col-md-offset-2");
                            //fecha_div.setAttribute("class","col-md-2");
                            tipo_r_div.attr("class", "col-md-3");
                            var html = '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">Nombres</label>' +
                                '<input type="text" value="" name="nombres" id="nombres" class="form-control">' +
                                '</div>' +
                                '</div>';
                            nom_client.html(html);
                            html = '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">Apellido Paterno</label>' +
                                '<input type="text" value="" name="apellido_p" id="apellido_p" class="form-control">' +
                                '</div>' +
                                '</div>';
                            app_client.html(html);
                            html = '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">Apellido Materno</label>' +
                                '<input type="text" value="" name="apellido_m" id="apellido_m" class="form-control">' +
                                '</div>' +
                                '</div>';
                            apm_client.html(html);
                            apm_client.attr("class", "col-md-3 col-md-offset-2");
                        } else {
                            if (flag != 0) {
                                $('#nombres').val('');
                                $('#apellido_p').val('');
                                $('#apellido_m').val('');
                            }
                            nom_client.attr("style", "display:none");
                            app_client.attr("style", "display:none");
                            apm_client.attr("style", "display:none");
                            btn_registrar.css('display', 'none');
                            tipo_r_div.attr("class", "col-md-3");
                            var datos = eval(data);
                            var clnt = '';
                            datos.forEach(function (i) {
                                clnt = '<strong>Cliente: </strong>' + i['nombres'] + ' ' + i['apellido_paterno'] + ' ' + i['apellido_materno'];
                                clnt = '<div class="col-md-12 col-lg-12">' + clnt + '</div>';
                            })
                            $('#detalles').html(clnt).addClass('col-md-8');
                        }
                    })
            }else{
                nom_client.attr("style", "display:none");
                app_client.attr("style", "display:none");
                apm_client.attr("style", "display:none");
                btn_registrar.css('display', 'none');
                $('#detalles').html('');
            }
        })
        btn_registrar.click(function (e) {
            e.preventDefault();
            registrar_cliente();
        })
        $('#empleado').val(empleado);
        $('a[href="#wizard_horizontal-h-1"]').click(function () {
            finish_reserv();
        })
        //#############################################################
        // listado de habitaciones
        habitaciones_reservar('', '');
        // $.post(base_url+'reservaciones/room_list',
        // {

        // },
        // function(data){
        //     var html = '';
        //     var datos = eval(data);
        //     //console.log(datos);
        //     for (i = 0; i<datos.length; i++){
        //         html+='<tr>'+
        //                 '<td>'+datos[i]['cod_habitacion']+'</td>'+
        //                 '<td>'+datos[i]['tipo_habitacion']+'</td>'+
        //                 '<td>'+datos[i]['piso']+'</td>'+
        //                 '<td>'+datos[i]['precio']+'</td>'+
        //                 '<td><input type="checkbox" name="listado_h" value="'+datos[i]['cod_habitacion']+'" id="h'+datos[i]['cod_habitacion']+'"><label for="h'+datos[i]['cod_habitacion']+'"></label></td>'+
        //                 '</tr>';
        //     }
        //     body_hab.html(html);
        //     seleccionadoh.forEach(function(i){
        //         $('#h'+i+'').prop('checked', true);
        //     });

        //     $('input[type=checkbox]').click(function(){
        //         var elemento = $(this).val();
        //         if (seleccionadoh.includes(elemento)){
        //             var pos = seleccionadoh.indexOf(elemento);
        //             seleccionadoh.splice(pos,1);
        //         }
        //         //console.log($(this).val());
        //         $('input[name=listado_h]:checked').each(function(){
        //             if (seleccionadoh.includes($(this).val()) == false){
        //             seleccionadoh.push($(this).val());
        //             }
        //         })
        //         console.log(seleccionadoh);
        //         if(seleccionadoh.length==0){
        //             $('a[href="#next"]').parent().attr('style', 'display:none')
        //         }else{
        //             $('a[href="#next"]').parent().attr('style', 'display:block')
        //         }
        //     })
        // })
        //Fin listado
        //#############################################
        $('a[href="#finish"]').click(function () {
            var errores = 0;
            var guest_ = $('.guest');
            $('.guest').each(function(){
                if($(this).parent().hasClass('error')){
                    errores++;
                };
                if($(guest_[0]).val()==''){
                    $(guest_[0]).parent().addClass('error');
                }
            });
            console.log(errores);
            if ($('#cliente').val().length == 8 && seleccionadoh.length > 0 && errores == 0){
                $.post(base_url + 'reservaciones/registrar_estadia', {
                    nro_res: $('#nro_res').val(),
                    cliente: $('#cliente').val(),
                    empleado: $('#empleado').val(),
                    fecha_r: $('#fecha_r').val(),
                    tipo_r: $('#tipo_r').val(),
                    fecha_estadia: $('#fecha_estadia').val(),
                    fecha_salida: $('#fecha_salida').val(),
                    lista_hab: seleccionadoh,
                    //huespedes:huespedes,
                },
                function (data) {
                    console.log(data);
                    console.log(huespedes);
                    //location.reload();
                });
                seleccionadoh.forEach(function (e) {
                    $.post(base_url + 'reservaciones/detalle_habitacion', {
                            cod_habitacion: e,
                        },
                        function (data) {
                            var datos = eval(data);
                            //console.log(datos);
                            for (var i = 0; i < datos.length; i++) {
                                for (var j = 0; j < datos[i]['max_h']; j++) {
                                    $('#' + e + j + '').val();
                                    $.post(base_url + 'reservaciones/registrar_detalle_estadia', {
                                            nro_res: $('#nro_res').val(),
                                            nombres: $('#nombres').val(),
                                            apellido_p: $('#apellido_p').val(),
                                            apellido_m: $('#apellido_m').val(),
                                            cliente: $('#cliente').val(),
                                            huesped: $('#' + e + j + '').val(),
                                            huesped_nombre: $('#nombres' + e + j + '').val(),
                                            huesped_apellido_paterno: $('#apellido_paterno' + e + j + '').val(),
                                            huesped_apellido_materno: $('#apellido_materno' + e + j + '').val(),
                                            fecha_r: $('#fecha_r').val(),
                                            tipo_r: $('#tipo_r').val(),
                                            fecha_estadia: $('#fecha_estadia').val(),
                                            fecha_salida: $('#fecha_salida').val(),
                                            habitacion: e,
                                        },
                                        function (data) {
                                            console.log(data);
                                            console.log(huespedes);
                                            swal(data);
                                            location.reload();
                                        })
                                }
                            }
                        })
                })
                console.log(huespedes);
                console.log(seleccionadoh);
            }else{
                swal({
                    title: 'Error!',
                    text: 'Por favor, verifique la información provista en el formulario',
                    icon: 'warning',
                    dangerMode: true
                });
                if ($('#cliente').val().length!=8){
                    $('#cliente').parent().addClass('error');
                }
            }
        })
    })
    comprobar = function (data1) {
        // $('input.huesped').each(function(){
        //     var field = $(this);
        //     var field_val = $(this).val();
        //     if (field_val.length == 8){
        //         console.log(field_val);
        //     }else{
        //         field.parent('div').addClass('error');
        //     }
        // })
        var field = $('#' + data1 + '').val();
        if (field.length == 8) {
            $.post(base_url + 'reservaciones/existencia', {
                    cod_persona: $('#' + data1 + '').val(),
                },
                function (data) {
                    $('#huesdiv' + data1 + '').html('');
                    if (data == 0) {
                        if (inputsval.includes($('#cliente').val()) == false) {
                            var html = '';
                            html += '<div class="col-md-3">';
                            html += '<div class="form-group form-float">' +
                                '<div class="form-line focused">';
                            html += '<label class="form-label">Nombres:</label>';
                            html += '<input class="form-control" type="text" id="nombres' + data1 + '" />';
                            html += '</div></div></div>';

                            html += '<div class="col-md-3">';
                            html += '<div class="form-group form-float">' +
                                '<div class="form-line focused">';
                            html += '<label class="form-label">Apellido Paterno:</label>';
                            html += '<input class="form-control" type="text" id="apellido_paterno' + data1 + '" />';
                            html += '</div></div></div>';

                            html += '<div class="col-md-3">';
                            html += '<div class="form-group form-float">' +
                                '<div class="form-line focused">';
                            html += '<label class="form-label">Apellido Materno:</label>';
                            html += '<input class="form-control" type="text" id="apellido_materno' + data1 + '" />';
                            html += '</div></div></div>';
                            $('#huesdiv' + data1 + '').append(html);
                        }
                    } else {
                        $('#huesdiv' + data1 + '').html('');
                    }
                })
        } else {

            $('#huesdiv' + data1 + '').html('');
        }
    }
    VerDetalle = function (data1) {
        $('#habitacion_estadia').html('');
        $('#Detalle').html('');
        $.post(base_url + 'reservaciones/consultar_estadia', {
                cod_estadia: data1,
            },
            function (data) {
                var html = '';
                datos = eval(data);
                var objeto = {};
                for (i = 0; i < datos.length; i++) {
                    html += '<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 align-left">';
                    html += '<p><strong>Cliente (DNI): </strong><br />' + datos[i]['cod_persona'] + '</p>';
                    html += '<p><strong>Nombres: </strong><br />' + datos[i]['nombres'] + '</p></div>';
                    html += '<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 align-justify">';
                    html += '<p><strong>Apellido paterno: </strong><br />' + datos[i]['apellido_paterno'] + '</p>';
                    html += '<p><strong>Apellido materno: </strong><br />' + datos[i]['apellido_materno'] + '</p></div>';
                    html += '<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 align-justify">';
                    html += '<p><strong>Código de estadía: </strong><br />' + datos[i]['cod_estadia'] + '</p>';
                    html += '<p><strong>Reservación: </strong><br />' + datos[i]['fecha_reserva'] + '</p></div>';
                    html += '<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 align-justify">';
                    html += '<p><strong>Ingreso: </strong><br />' + datos[i]['fecha_ingreso'] + '</p>';
                    html += '<p><strong>Salida: </strong><br />' + datos[i]['fecha_salida'] + '</p></div>';
                    $('#Detalle').append(html);
                    var html = '';
                    mostrar_detalle(datos[i]['cod_estadia']);
                    $('#VerDetalle').modal();
                    // $.post(base_url+'reservaciones/consultar_habitacion_estadia',
                    //     {
                    //         cod_estadia1:datos[i]['cod_estadia'],
                    //     },
                    //        function(data1){
                    //         datos1 = eval(data1);
                    //         var objeto={};
                    //         for (j = 0; j < datos1.length; j++){
                    //             html+= '<tr>'+
                    //                     '<td>'+datos1[j]['cod_habitacion']+'</td>'+
                    //                     '<td>'+datos1[j]['cod_persona']+'</td>'+
                    //                     '<td>'+datos1[j]['nombres']+'</td>'+
                    //                     '<td>'+datos1[j]['apellido_paterno']+'</td>'+
                    //                     '<td>'+datos1[j]['apellido_materno']+'</td>'+
                    //             '</tr>';

                    //         }
                    //         $('#habitacion_estadia').append(html);

                    // })
                }
            })
    }
    finish_reserv = function () {
        num_hues = 0;
        // $('a[href="#finish"]').parent().attr('style', 'display:none')
        inputsval.length = 0;
        detalle_body.attr('style', 'display:block');
        detalle_body.html('');
        var html = '';
        seleccionadodh.length = 0;
        //console.log(seleccionadoh);
        var maxh = 0;
        seleccionadoh.forEach(function (a) {
            console.log(seleccionadoh.length);
            html = '';
            //console.log('valor de a: '+a+'');
            html += '<div class="col-md-12 text-left"><h4>Habitacion ' + a + '</h4>';
            html += '<div  class="col-md-12 text-left" id="' + a + '"></div>';
            html += '<br /><div class="col-md-12" id="deta' + a + '"></div></div>';
            $('#detalle_body').append(html);
            $.post(base_url + 'reservaciones/detalle_habitacion', {
                    cod_habitacion: a,
                },
                function (data) {
                    var html = '';
                    var datos = eval(data);
                    var objeto = {};
                    for (i = 0; i < datos.length; i++) {
                        html += '<p><strong>Tipo de habitación: </strong>' + datos[i]['tipo_habitacion'] + '</p>';
                        html += '<p><strong>Piso: </strong>' + datos[i]['piso'] + '</p>';
                        html += '<p><strong>Capacidad: </strong>' + datos[i]['max_h'] + '</p>';
                        $('#' + a + '').append(html);
                        objeto.cod_habitacion = a;
                        objeto.tipo_habitacion = datos[i]['tipo_habitacion'];
                        objeto.piso = datos[i]['piso'];
                        objeto.max_h = datos[i]['max_h'];
                        num_hues = parseInt(num_hues) + parseInt(datos[i]['max_h']);
                        maxh = datos[i]['max_h'];
                        seleccionadodh.push(objeto);
                        var html = '';
                        for (j = 0; j < datos[i]['max_h']; j++) {
                            var indice = a + j;
                            html += '<div class="col-md-12"><div class="col-md-3">';
                            html += '<div class="form-group form-float">' +
                                '<div class="form-line focused">';
                            html += '<label class="form-label">DNI ' + parseInt(j + 1) + ':</label>';
                            html += '<input name="dni_huesped" class="form-control dni-field guest" onKeyup="comprobar(' + indice + ');" type="number" id="' + a + j + '" />';
                            html += '</div></div></div><div id="huesdiv' + a + j + '"></div></div>';
                        }
                        $('#deta' + a + '').html(html);
                        //   $('input[name=dni_huesped]').blur(function(){
                        //       if(inputsval.includes($(this).val())){
                        //           swal({habitacion
                        //               title: 'No se permite valores duplicados en los campos de DNI, por favor coloque valores diferentes.',
                        //                 type: 'warning'
                        //             });
                        //           $(this).val('');
                        //           console.log(inputsval);
                        //           $(this).focus();
                        //       }else if($(this).val()!=''){
                        //           inputsval.push($(this).val());
                        //           console.log(inputsval);
                        //       }
                        //   })
                        //   $('input[name=dni_huesped]').focus(function(){
                        //       if (inputsval.includes($(this).val())){
                        //           var pos = inputsval.indexOf($(this).val());
                        //           inputsval.splice(pos,1);
                        //       }
                        //   })
                        console.log(num_hues);
                    }
                    $('#cliente').keyup(function(){
                        var cliente = $(this).val();
                        var guests = $('.guest');
                        $(guests[0]).val(cliente);
                        if(cliente.length==8){
                            $(guests[0]).parent().removeClass('error');
                        }else{
                            $(guests[0]).parent().addClass('error');
                        }
                    })
                    $('.dni-field').keyup(function () {
                        var elemento = $(this);
                        if (elemento.val().length != 8) {
                            elemento.parent('div').addClass('error');
                        }else{
                            elemento.parent('div').removeClass('error');
                        }
                    })

                })
        })
    }
})
