var producto_precio = new Array();
var cantidad_producto = new Array();
precio_p = function (arg1, id) {
    cancelar = function () {
        $('#p' +id+ '').prop('checked', false);
        producto_precio.pop();
        if(producto_precio.length>0){
            $('a[href="#finish"]').parent().css('display', 'block');
        }else{
            $('a[href="#finish"]').parent().css('display', 'none');
        }
    }
    if (its_in_array(producto_precio, id) == false) {
        cantidad(id);
        var dato_respuesta = {
            'cod_producto': id,
            'precio_producto': arg1
        };
        producto_precio.push(dato_respuesta);
        if(producto_precio.length>0){
            $('a[href="#finish"]').parent().css('display', 'block');
        }else{
            $('a[href="#finish"]').parent().css('display', 'none');
        }
        console.log(producto_precio);
    } else {
        var index = array_pos(producto_precio, id);
        console.log(index);
        producto_precio.splice(index, 1);
        cantidad_producto.splice(index, 1);
        if(producto_precio.length>0){
            $('a[href="#finish"]').parent().css('display', 'block');
        }else{
            $('a[href="#finish"]').parent().css('display', 'none');
        }
        console.log(producto_precio);
    }
}

function insertar_cantidad()
{
    var quantity_field = $('#cant_prod');
    if (cantidad_producto.includes(quantity_field.val())==false)
    {
        cantidad_producto.push(quantity_field.val());
    } 
}

its_in_array = function (array, id) {
    var cont = 0;
    for (var y = 0; array.length > y; y++) {
        console.log(array, id, array[y]['cod_producto']);
        if (array[y]['cod_producto'] == id) {
            cont++;
        }
    };
    if (cont == 0) {
        return false;
    } else {
        return true;
    };
};

array_pos = function (array, id) {
    var index = 0;
    for (var l = 0; array.length > l; l++) {
        if (array[l]['cod_producto'] == id) {
            console.log(id, l, array[l]['cod_producto']);
            index = l;
        }
    }
    return index;
}


$(document).on('ready', function () {
    activar_menu('ventas');
    $('#producto_cant').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
        $("label.error").remove();
    });
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = d.getFullYear() + '/' +
        (month < 10 ? '0' : '') + month + '/' +
        (day < 10 ? '0' : '') + day;
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY/MM/DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });
    var seleccionados = new Array();
    var seleccionadoh = new Array();
    var seleccionadoe = new Array();
    var servicio_precio = new Array();
    var cliente = new Array();
    var valor_p = new Array();
    var seleccionadop = new Array();
    var habitacion_servicio = new Array();
    var habitacion_servicio_seleccion = new Array();
    $('#dt_table').DataTable({
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": base_url + "ventas/consultar",
            "type": "POST",
            dataSrc: ''
        },
        'columns': [{
                data: 'cod_venta'
            },
            {
                data: 'cod_cliente'
            },
            {
                data: 'nombres'
            },
            {
                data: 'apellido_paterno'
            },
            {
                data: 'cod_oferta'
            },
            {
                data: 'fecha_venta'
            },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<div class="btn-group" role="group">' +
                        '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        'Acciones <span class="caret"></span>' +
                        '</button>' +
                        '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">' +
                        '<li><a data-toggle="modal" data-target="#detalles" class=" waves-effect waves-block" onClick="detalles(\'' + row.cod_venta + '\');">Ver detalles</a></li>' +
                        '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\'' + row.cod_venta + '\')">Eliminar</a></li>' +
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



    $('#products_dt').DataTable({
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'destroy': true,
        'ajax': {
            "url": base_url + "ventas/productos_slct",
            "type": "POST",
            dataSrc: ''
        },
        'columns': [
            {
                data: 'cod_producto'
            },
            {
                data: 'producto'
            },
            {
                data: 'marca'
            },
            {
                data: 'tipo_producto'
            },
            {
                data: 'precio'
            },
            {
                data: 'stock_producto'
            },
            {
                'orderable': false,
                render: function (data, type, row) {
                    return '<div class="input-group">' +
                        '<input type="checkbox" value="\''+row.cod_producto+'\'" onClick="precio_p(\'' +row.precio+ '\', \'' +row.cod_producto+ '\')" name="listado_p" value="' +row.cod_producto+ '" id="p' +row.cod_producto+ '"><label for="p' +row.cod_producto+ '"></label></td>' +
                        '</div>';
                }
            },
        ],
        "order": [
            [0, "asc"]
        ],
        'language': español
    });

    var body_srv = document.getElementById('body_srv');
    var body_pro = document.getElementById('body_pro');
    var buscar_servicio_div = document.getElementById('buscar_servicio_div');
    var buscar_estadias_div = document.getElementById('buscar_estadias_div');
    var tabla_servicio_div = document.getElementById('tabla_servicio_div');
    var tabla_estadias_div = document.getElementById('tabla_estadias_div');
    var nota_servicio_div = document.getElementById('nota_servicio_div');
    var nota_estadias_div = document.getElementById('nota_estadias_div');
    detalles = function (cod_v) {
        var codigo_venta = cod_v;
        $('#dt_venta').DataTable({
            'paging': true,
            'info': true,
            'filter': true,
            'stateSave': true,
            'destroy': true,
            'ajax': {
                "url": base_url + "ventas/consultar_detalle_ventas",
                "type": "POST",
                "data": {
                    cod_venta: codigo_venta
                },
                dataSrc: ''
            },
            'columns': [{
                    data: 'cod_producto'
                },
                {
                    data: 'producto'
                },
                {
                    data: 'marca'
                },
                {
                    data: 'tipo_producto'
                },
                {
                    data: 'precio'
                },
                {
                    data: 'descuento'
                },
                {
                    data: 'descripcion'
                },
                {
                    data: 'cantidad'
                },
            ],
            "order": [
                [0, "asc"]
            ],
            'language': español
        });
    };
    deldat = function (cod_cargo) {
        $.post(base_url + 'cargo/eliminar', {
                cod_cargo: cod_cargo,
            },
            function (data) {
                if (data == 1) {
                    swal('Eliminado');
                    location.reload();
                }
            });
    };
    get_value = function (cod_persona) {
        $('#cliente_input').val(cod_persona);
        $('a[href="#next"]').parent().attr('style', 'display:block');
        // $('#wizard_horizontal-t-1').parent().removeAttr('class').addClass('done').attr('aria-disabled', 'false');
    };
    cancelar_cliente = function () {
        $('#cliente_input').val('');
        $('a[href="#next"]').parent().attr('style', 'display:none');
        $('#wizard_horizontal-t-1').parent().removeAttr('class').addClass('disabled').attr('aria-disabled', 'true');
    };

    insertdat = function (cod_cargo, area, descripcion, cargo) {
        $.post(base_url + 'cargo/guardar', {
                cod_cargo: $('#cod_cargo_c').val(),
                area: $('#area_c').val(),
                descripcion: $('#descripcion_c').val(),
                cargo: $('#cargo_c').val(),
            },
            function (data) {
                if (data == 1) {
                    swal('El registro fue almacenado correctamente');
                    location.reload();
                }
            });
    };
    $('#cliente_input').click(function () {
        $('#buscar_cliente').modal();
        $('#client_dt').DataTable({
            'paging': true,
            'info': true,
            'filter': true,
            'stateSave': true,
            'destroy': true,
            'ajax': {
                "url": base_url + "clientes/consultar",
                "type": "POST",
                dataSrc: ''
            },
            'columns': [{
                    'orderable': false,
                    render: function (data, type, row) {
                        return '<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">' +
                            '<div class="form-group">' +
                            '<div class="radio-button">' +
                            '<input name="client_ls" onClick="get_value(\'' + row.cod_persona + '\');" type="radio" id="' + row.cod_persona + '" />' +
                            '<label for="' + row.cod_persona + '"</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    }
                },
                {
                    data: 'cod_persona'
                },
                {
                    data: 'nombres'
                },
                {
                    data: 'apellido_paterno'
                },
                {
                    data: 'apellido_materno'
                },
            ],
            "order": [
                [0, "asc"]
            ],
            'language': español
        });
        $('#confirm_cliente').click(function () {
            $('#buscar_cliente').modal('hide');
        })
    });

    var nom_client = document.getElementById('nom_client');
    var app_client = document.getElementById('app_client');
    $('#realizar_venta').click(function () {
        $('a[href="#next"]').parent().attr('style', 'display:none');
        $('#nro_venta').val(parseInt(num_venta) + 1);
        $('#cliente').on('keyUp', function () {
            var cliente = $(this);
            if (cliente.val().length == 8) {
                $.post(base_url + 'ventas/comprobar_cliente', {
                        cliente: cliente.val(),
                    },
                    function (data) {
                        // swal(data);
                        if (data == 'No existe') {
                            nom_client.setAttribute("style", "display:block");
                            app_client.setAttribute("style", "display:block");
                            nom_client.setAttribute("class", "col-md-4");
                            app_client.setAttribute("class", "col-md-4");
                            var html = '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">Nombres</label>' +
                                '<input type="text" value="" name="nombres" id="nombres" class="form-control">' +
                                '</div>' +
                                '</div>';
                            nom_client.innerHTML = html;
                            html = '<div class="form-group form-float">' +
                                '<div class="form-line focused">' +
                                '<label class="form-label">Apellido Paterno</label>' +
                                '<input type="text" value="" name="apellido_p" id="apellido_p" class="form-control">' +
                                '</div>' +
                                '</div>';
                            app_client.innerHTML = html;

                        } else if (data == 'Existe') {
                            nom_client.setAttribute("style", "display:none");
                            app_client.setAttribute("style", "display:none");
                        }
                    })
            }
            if ($(this).val().length > 8) {
                swal('Se exedió el número máximo de caracteres para este campo');
            }
        })
        $('#empleado').val(empleado);
        $('#fecha').val(output);
        //tabla de seleccion de productos
        
        //detector de teclas en buscador
        $('#buscar').keyup(function () {
            $.post(base_url + 'ventas/productos_slct', {
                    buscar: $('#buscar').val(),
                },
                function (data) {
                    var html = '';
                    var datos = eval(data);
                    for (i = 0; i < datos.length; i++) {
                        html += '<tr>' +
                            '<td>' + datos[i]['cod_producto'] + '</td>' +
                            '<td>' + datos[i]['producto'] + '</td>' +
                            '<td>' + datos[i]['marca'] + '</td>' +
                            '<td>' + datos[i]['tipo_producto'] + '</td>' +
                            '<td>' + datos[i]['precio'] + '</td>' +
                            '<td>' + datos[i]['stock_producto'] + '</td>' +
                            '<td><input type="checkbox" name="listado_p" onClick="precio_p(\'' + datos[i]['precio'] + '\',  \'' + datos[i]['cod_producto'] + '\')" value="' + datos[i]['cod_producto'] + '" id="p' + datos[i]['cod_producto'] + '"><label for="p' + datos[i]['cod_producto'] + '"></label></td>' +
                            '</tr>';
                    }
                    body_pro.innerHTML = html;
                })
        })
        //tabla de seleccion de servicios

        $('a[href="#next"]').click(function () {
            $('a[href="#finish"]').parent().css('display', 'none');
            if ($('#cliente_input').val().length < 8) {
                $('a[href="#next"]').stopEvent;
            }
            $.post(base_url + 'ventas/servicios_slct', {
                    cliente: $('#cliente_input').val(),
                },
                function (data) {
                    // console.log(data);
                    if (data != '') {
                        // buscar_servicio_div.attr('style', 'display:block');
                        // tabla_servicio_div.attr('style', 'display:block');
                        var html = '';
                        var datos = eval(data);
                        for (i = 0; i < datos.length; i++) {
                            html += '<tr>' +
                                '<td>' + datos[i]['cod_servicio'] + '</td>' +
                                '<td>' + datos[i]['servicio'] + '</td>' +
                                '<td>' + datos[i]['precio'] + '</td>' +
                                '<td><input type="checkbox" name="listado_s" onClick="precio_s(\'' + datos[i]['precio'] + '\')" value="' + datos[i]['cod_servicio'] + '" id="s' + datos[i]['cod_servicio'] + '"><label for="s' + datos[i]['cod_servicio'] + '"></label></td>' +
                                '</tr>';
                        }
                        $('#body_srv').html(html);
                        seleccionados.forEach(function (i) {
                            $('#s' + i + '').prop('checked', true);
                        });
                        $('input[type=checkbox]').click(function () {
                            var elemento = $(this).val();
                            if (seleccionados.includes(elemento)) {
                                var pos = seleccionados.indexOf(elemento);
                                seleccionados.splice(pos, 1);
                                //seleccionadoh.splice(pos,1);
                                servicio_precio.splice(pos, 1);
                            }
                            //console.log($(this).val());
                            $('input[name=listado_s]:checked').each(function () {
                                var elemento = $(this).val();
                                if (seleccionados.includes($(this).val()) == false) {
                                    seleccionados.push($(this).val());
                                    $('#seleccionar_estadia').modal();
                                     $.post(base_url+'habitacion/habitaciones_reservadas',
                                     {
                                        cliente_estadia:$('#cliente_input').val(),
                                     },
                                     function(data){
                                         var html = '';
                                         var codigo = '';
                                         var datos = eval(data);
                                         if (datos.length > 0){
                                             datos.forEach(function(i){
                                                 if (codigo != i['cod_estadia']){
                                                     html+='<div class="row clearfix"><h4>Estadía nro: '+i['cod_estadia']+'</h4></div>';
                                                 }
                                                 codigo = i['cod_estadia'];
                                                 html+='<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">'+
                                                     '<a name="seleccionables" onClick="insertar(\''+i['cod_habitacion']+'\',\''+i['cod_estadia']+'\');" href="#'+i['cod_habitacion']+'">'+
                                                         '<div class="info-box-4 hover-zoom-effect">'+
                                                                 '<div class="icon">'+
                                                                         '<i class="material-icons col-blue">hotel</i>'+
                                                                 '</div>'+
                                                                 '<div class="content">'+
                                                                         '<div class="text">Habitacion</div>'+
                                                                         '<div class="number">'+i['cod_habitacion']+'</div>'+
                                                                 '</div>'+
                                                         '</div>'+
                                                     '</a>'+
                                                 '</div>';
                                             })
                                         }else{
                                             html += '<br /><div class="body text-center">No se encontró ninguna habitación vinculada a este cliente.</div>';
                                             html += '<br /><br />';
                                         }
                                         $('#habitaciones_list1').html(html);
                                     })
                                }
                                $('#aceptar_button').click(function () {
                                    confirmar_servicios();
                                })
                            })
                            // console.log(seleccionados);
                        })
                    } else {
                        buscar_servicio_div.setAttribute('style', 'display:none');
                        tabla_servicio_div.setAttribute('style', 'display:none');
                        var html = '<br /><br /><div class="col-md-6 col-md-offset-3 text-center"><p>Actualmente, el cliente no cuenta con estadías abiertas.</p></div>';
                        $('#nota_servicio_div').html(html);

                    }
                })
            $.post(base_url + 'habitacion/habitaciones_reservadas', {
                    cliente_estadia: $('#cliente_input').val(),
                },
                function (data) {
                    $('#body_est').html('');
                    $('#nota_estadias_div').html('');
                    if (data != '') {
                        var html = '';
                        var datos = eval(data);
                        for (i = 0; i < datos.length; i++) {
                            // if (datos[i]['fecha_salida'] == null){
                            //     fecha_salida ='No especificado';
                            // }else{
                            //     fecha_salida = datos[i]['fecha_salida'];
                            // }
                            html += '<tr>' +
                                '<td>' + datos[i]['cod_estadia'] + '</td>' +
                                '<td>' + datos[i]['cod_habitacion'] + '</td>' +
                                '<td>' + datos[i]['tipo_habitacion'] + '</td>' +
                                '<td>' + datos[i]['piso'] + '</td>' +
                                '<td><input type="checkbox" name="listado_h" value="' + datos[i]['cod_habitacion'] + '" id="h' + datos[i]['cod_habitacion'] + '"><label for="h' + datos[i]['cod_habitacion'] + '"></label></td>' +
                                '</tr>';
                            if (seleccionadoe.includes(datos[i]['cod_estadia']) == false) {
                                seleccionadoe.push(datos[i]['cod_estadia']);
                            }
                        }
                        $('#body_est').html(html);
                        seleccionadoh.forEach(function (i) {
                            $('#h' + i + '').prop('checked', true);
                        });
                        $('input[type=checkbox]').click(function () {
                            var elemento = $(this).val();
                            habitacion_servicio.forEach(function (ele) {
                                if (ele.includes(elemento)) {
                                    var pos1 = habitacion_servicio.indexOf(ele);
                                    habitacion_servicio.splice(pos1, 1);
                                    // console.log(habitacion_servicio);
                                }
                            })
                            if (seleccionadoh.includes(elemento)) {
                                var pos = seleccionadoh.indexOf(elemento);
                                seleccionadoh.splice(pos, 1);
                            }
                            //console.log($(this).val());
                            $('input[name=listado_h]:checked').each(function () {
                                if (seleccionadoh.includes($(this).val()) == false) {
                                    seleccionadoh.push($(this).val());
                                    $('#seleccionar_servicio').modal();

                                }
                            })
                            // $('input[name=listado_e]:checked').each(function(){
                            //     var cod_est = $(this).val();
                            // })
                            // console.log(seleccionadoe);
                            // console.log(habitacion_servicio);
                        })
                    } else {
                        buscar_servicio_div.setAttribute('style', 'display:none');
                        tabla_servicio_div.setAttribute('style', 'display:none');
                        var html = '<br /><br /><div class="col-md-6 col-md-offset-3 text-center"><p>Actualmentel, el cliente no cuenta con estadías abiertas.</p></div>';
                        $('#nota_estadias_div').html(html);

                    }
                })
            $('#buscar_s').keyup(function () {
                $.post(base_url + 'ventas/servicios_slct', {
                        buscar_s: $('#buscar_s').val(),
                        compras: $('#buscar_s').val(),
                    },
                    function (data) {
                        var html = '';
                        var datos = eval(data);
                        for (i = 0; i < datos.length; i++) {
                            html += '<tr>' +
                                '<td>' + datos[i]['cod_servicio'] + '</td>' +
                                '<td>' + datos[i]['servicio'] + '</td>' +
                                '<td>' + datos[i]['precio'] + '</td>' +
                                '<td><input type="checkbox" name="listado_s" onClick="precio_s(\'' + datos[i]['precio'] + '\')" value="' + datos[i]['cod_servicio'] + '" id="s' + datos[i]['cod_servicio'] + '"><label for="s' + datos[i]['cod_servicio'] + '"></label></td>' +
                                '</tr>';
                        }
                        body_srv.innerHTML = html;
                        seleccionados.forEach(function (i) {
                            $('#s' + i + '').prop('checked', true);
                        });
                        $('input[type=checkbox]').click(function () {
                            var elemento = $(this).val();
                            if (seleccionados.includes(elemento)) {
                                var pos = seleccionados.indexOf(elemento);
                                seleccionados.splice(pos, 1);
                                seleccionadoh.splice(pos, 1);
                                servicio_precio.splice(pos, 1);
                            }
                            //console.log($(this).val());
                            $('input[name=listado_s]:checked').each(function () {
                                if (seleccionados.includes($(this).val()) == false) {
                                    //$('#seleccionar_estadia').modal();
                                    seleccionados.push($(this).val());
                                }
                            })
                            $('input[name=listado_s]:checked').each(function () {
                                var cod_serv = $(this).val();
                                $.post(base_url + 'habitacion/habitaciones_reservadas', {},
                                    function (data) {
                                        var html = '';
                                        var codigo = '';
                                        var datos = eval(data);
                                        if (datos.length > 0) {
                                            datos.forEach(function (i) {
                                                if (codigo != i['cod_estadia']) {
                                                    html += '<div class="col-md-12 text-center"><div class="row clearfix"><h4>Estadía nro: ' + i['cod_estadia'] + '</h4></div></div>';
                                                }
                                                codigo = i['cod_estadia'];
                                                html += '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">' +
                                                    '<a name="seleccionables" onClick="insertar(\'' + i['cod_habitacion'] + '\',\'' + i['cod_estadia'] + '\');" href="#seleccionables">' +
                                                    '<div class="info-box-4 hover-zoom-effect">' +
                                                    '<div class="icon">' +
                                                    '<i class="material-icons col-blue">hotel</i>' +
                                                    '</div>' +
                                                    '<div class="content">' +
                                                    '<div class="text">Habitacion</div>' +
                                                    '<div class="number">' + i['cod_habitacion'] + '</div>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</a>' +
                                                    '</div>';
                                            })
                                        } else {
                                            html += '<br /><div class="body text-center">No se encontró ninguna habitación vinculada a este cliente.</div>';
                                            html += '<br /><br />';
                                        }
                                        $('#habitaciones_list1').html(html);
                                    })
                                $("#habitaciones_list").modal();
                            })
                            // console.log(seleccionados);
                        })
                    })
            })

        })
    })
    var seleccion_total = new Array();
    var html_p = '';
    var det_body = document.getElementById('det_body');
    var pie_dt = document.getElementById('pie_dt');
    var detalle = document.getElementById('detalle');
    var total = 0;
    //detalle.setAttribute('style','display:none');
    /*$('#Servicios').click(function(){
        seleccionados.length = 0;
        seleccionadop.length = 0;
        $('input[type=checkbox]').click(function(){
            var elemento = $(this).val();
            if (seleccionados.includes(elemento)){
                var pos = seleccionados.indexOf(elemento);
                seleccionados.splice(pos,1);
            }
            //console.log($(this).val());
            $('input[name=listado_s]:checked').each(function(){
                if (seleccionados.includes($(this).val()) == false){
                seleccionados.push($(this).val());
                }
            })
            console.log(seleccionados);
        })
        $('#seleccion_detalle').click(function(){

        })

    })*/

    $('a[href="#finish"]').click(function () {
        $.post(base_url + 'ventas/guardar_venta', {
                fecha: $('#fecha').val(),
                nro_venta: $('#nro_venta').val(),
                cliente_venta: $('#cliente_input').val(),
                empleado: $('#empleado').val(),
                // productos:seleccionadop,
                producto_precio: producto_precio,
                cantidad_producto:cantidad_producto,
                cantidad: producto_precio.length,
                habitacion_servicio: habitacion_servicio,
                estadias: seleccionadoe,
            },
            function (data) {
                if (data == 1) {
                    console.log('CORRECTO');
                    location.reload();
                } else {
                    console.log('INCORRECTO');
                }
                swal({
                        title: 'Venta satisfactoria',
                        type: 'info',
                        closeOnConfirm: true
                    },
                    function () {
                        location.reload()
                    })
            })
    })
    cantidad = function (arg1) {
        $.post(base_url + 'productos/buscar_producto', {
                cod_pr: arg1,
            },
            function (data) {
                datos = eval(data);
                // console.log(datos)
                $('#cant_max').val(datos[0]['stock_producto']);
                // console.log(datos[0]['stock_producto'])
                $('#cant_prod').keyup(function () {
                    if ($('#cant_prod').val() > parseInt(datos[0]['stock_producto'])) {
                        swal('La cantidad ingresada, supera al stock disponible.')
                        $('#cant_prod').val(0);
                        $('#cant_prod').val('');
                    }
                })
            })
        $('#producto_cant').modal({
            backdrop: "static",
            keyboard: false
        })
    }
    precio_s = function (arg1) {
        if (servicio_precio.includes(arg1) == false) {
            servicio_precio.push(arg1);
        }
        // console.log(servicio_precio)
    }
    insertar = function (data, data1) {
        // console.log(data);
        seleccionadoh.push(data);
        seleccionadoe.push(data1);
        // console.log(seleccionadoh);
        // console.log(seleccionadoe);
        $("#habitaciones_list").modal('hide');
    }
    stopEvent = function (e) {
        if (!e) e = window.event;
        if (e.stopPropagation) {
            e.stopPropagation();
        } else {
            e.cancelBubble = true;
        }
    }
    confirmar_servicios = function () {
        if (seleccionados.length > 0) {
            var len = habitacion_servicio.length;
            habitacion_servicio[len] = [];
            // console.log(seleccionadoh);
            var copia_h = seleccionadoh.slice();
            var valorh = copia_h.pop();
            var copia_s = seleccionados.slice();
            var copia_sp = servicio_precio.slice();
            var copia_e = seleccionadoe.slice();
            var valore = copia_e.pop();
            habitacion_servicio[len].push(valore);
            habitacion_servicio[len].push(valorh);
            habitacion_servicio[len].push(copia_s);
            habitacion_servicio[len].push(copia_sp);
            // console.log(habitacion_servicio);
            seleccionados.length = 0;
            servicio_precio.length = 0;
            $('#seleccionar_servicio').modal('hide');
        }
    }
    cancelar_servicios = function () {
        var cod = seleccionados.pop();
        $('#s' + cod + '').prop('checked', false);
        seleccionadoh.pop()
        seleccionados.length = 0;
        servicio_precio.length = 0;
    }
});
