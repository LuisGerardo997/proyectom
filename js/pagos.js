function calcularPrecios(arg1, arg2, arg3)
{
    console.log(arg1, arg2, arg3);
    var fecha_ingreso = new Date(arg1);
    var fecha_salida= new Date(arg2);
    var dias = (fecha_salida - fecha_ingreso)/86400000;
    var precio_total = parseFloat(arg3)*dias;
    return precio_total;
}
function calcularDias(arg1, arg2)
{
    var fecha_ingreso = new Date(arg1);
    var fecha_salida = new Date(arg2);
    var dias = (fecha_salida - fecha_ingreso)/86400000;
    // console.log(fecha_ingreso, fecha_salida, dias);
    // console.log()
    return dias;
}


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
var seleccionadop = new Array();
var seleccionadoe = new Array();
var monto_ventas = new Array();
var monto_estadia = new Array();
    var habitacion_estadia_detalle = $('#habitacion_estadia_detalle');
$(document).on('ready',function(){
    activar_menu('cobros', false);
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var output = d.getFullYear()+1 + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;
    var output1 = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

    $('.modal').on('hidden.bs.modal', function(){
		$(this).find('form')[0].reset();
		$("label.error").remove();
	});

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false,
        maxDate: output,
        minDate: output1,
    });

    $('#realizado_1').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url": base_url+"pagos/ventas_realizadas",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_movimiento'},
            {data: 'cod_cronograma_ventas'},
            {data: 'cod_cliente'},
            {data: 'nombres'},
            {data: 'apellido_paterno'},
            {data: 'apellido_materno'},
            {data: 'monto'},
            {"orderable":true,
                render:function(data, type, row){
                  return '<div class="btn-group" role="group">'+
                  '<button id="btnGroupVerticalDrop1" type="button data-toggle="modal" data-target="#venta_detalles"" class="btn white waves-effect" onClick="VerDetalle(\''+row.cod_cronograma_venta+'\')">'+
                  'Ver más'+
                  '</button>'+
                  '</div>'
                }
            }
        ],
        "order":[[0, "asc"]],
        'language':español
    });

    $('#realizado_2').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url": base_url+"pagos/estadias_realizadas",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_movimiento'},
            {data: 'cod_cronograma_estadia'},
            {data: 'cod_cliente'},
            {data: 'nombres'},
            {data: 'apellido_paterno'},
            {data: 'apellido_materno'},
            {data: 'monto'},
            {"orderable":true,
                render:function(data, type, row){
                return  '<div class="btn-group" role="group">'+
                            '<button type="button" class="btn white waves-effect" onClick="VerDetalleEstadia(\''+row.cod_estadia+'\')">'+
                            'Ver más'+
                            '</button>'+
                        '</div>';
                }
            }
        ],
        "order":[[0, "asc"]],
        'language':español
    });
    habitacion_estadia_detalle.DataTable({
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'language': español
    });
    VerDetalleEstadia = function (data1) {
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
            $('#VerDetalle').modal();
    }
    $('#cobros_2').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url": base_url+"pagos/cronograma_ventas",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_cronograma_ventas'},
            {data: 'cod_venta'},
            {data: 'nro_cuota'},
            {data: 'cod_cliente'},
            {data: 'nombres'},
            {data: 'apellido_paterno'},
            {data: 'apellido_materno'},
            {data: 'fecha_vencimiento'},
            {data: 'monto'},
            {"orderable":true,
                render:function(data, type, row){
                return '<input type="checkbox" name="cronograma_ventas" onClick="ingresar_datos(\''+row.cod_cronograma_ventas+'\',\''+row.monto+'\')" id="cv'+row.cod_cronograma_ventas+'" value="\''+row.cod_cronograma_ventas+'\'"/>'+'<label for="cv'+row.cod_cronograma_ventas+'"></label>'
                }
            }
        ],
        "order":[[0, "asc"]],
        'language':español
    });
    // $('#cobrar').css('display', 'none');
    $('#cobros_3').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url": base_url+"pagos/cronograma_estadia",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_cronograma_estadia'},
            {data: 'cod_estadia'},
            {data: 'nro_cuota'},
            {data: 'cod_cliente'},
            {data: 'nombres'},
            {data: 'apellido_paterno'},
            {data: 'apellido_materno'},
            {data: 'fecha'},
            {data: 'monto'},
            {"orderable":true,
                render:function(data, type, row){
                return '<input type="checkbox" name="cronograma_estadia" onClick="ingresar_datos_e(\''+row.cod_cronograma_estadia+'\',\''+row.monto+'\')" id="ce'+row.cod_cronograma_estadia+'" value="\''+row.cod_cronograma_estadia+'\'"/>'+'<label for="ce'+row.cod_cronograma_estadia+'"></label>'
                }
            }
        ],
        "order":[[0, "asc"]],
        'language':español
    });

    var cronogramas_seleccionados = Array();
    var cronogramas_seleccionados_e = Array();
    var amortizacion_venta = Array();
    var amortizacion_venta_e = Array();
    var monto_cronogramas = Array();
    var monto_cronogramas_e = Array();
    var monto_total = Array();

    if($('#dni_cliente').val()==''){
        $('a[href="#next"]').parent().css('display', 'none');
        $('#wizard_horizontal-t-1').parent().removeAttr('class').addClass('disabled');
    }else{
        $('a[href="#next"]').parent().css('display', 'block');
        $('#wizard_horizontal-t-1').parent().removeAttr('class').addClass('done').attr('aria-disabled', 'false');
    };

    $('#forma_pago').change(function(){
        if($(this).val()!=''){
            $(this).parent().removeClass('error');
        }
    });
    $('#tipo_documento').change(function(){
        if($(this).val()!=''){
            $(this).parent().removeClass('error');
        }
    });
    $('#monto_contado').change(function(){
        if($(this).val()!=''){
            $(this).parent().removeClass('error');
        }
    });
    $('#concepto_movimiento').change(function(){
        if($(this).val()!=''){
            $(this).parent().removeClass('error');
        }
    });


    VerDetalle = function(cronograma_ventas){
      $('#venta_detalles').modal();
      $('#dt_detalle').DataTable({
          'paging':true,
          'info':true,
          'filter':true,
          'stateSave':true,
          'destroy':true,
          'ajax':{
              "url": base_url+"pagos/detalle_ventas",
              "type":"POST",
              "data": {cronograma_ventas:cronograma_ventas},
              dataSrc: ''
          },
          'columns':[
              {data: 'cod_producto'},
              {data: 'producto'},
              {data: 'marca'},
              {data: 'tipo_producto'},
              {data: 'precio'},
              {data: 'descuento'},
              {data: 'descripcion'},
              {data: 'cantidad'},
              ],
      "order":[[0, "asc"]],
      'language':español
  });
    }

    $('#cobros_realizados').click(function(){
        $('#cobros_pendientes').click(function(){
            $('#monto_a_amortizar_e_div').attr('style', 'display:block')
        })
    })
    $('#cobros_pendientes').click(function(){
        $('#monto_a_amortizar_e_div').attr('style', 'display:none')
    })
    $('#productos_li').click(function(){
        $('#monto_a_amortizar_div').attr('style', 'display:block')
        $('#monto_a_amortizar_e_div').attr('style', 'display:none')
    })
    $('#estadias_li').click(function(){
        $('#monto_a_amortizar_div').attr('style', 'display:none')
        $('#monto_a_amortizar_e_div').attr('style', 'display:block')
    })

    $('#dni_cliente').focus(function(){
      $('#buscar_cliente').modal();
      $('#client_dt').DataTable({
          'paging':true,
          'info':true,
          'filter':true,
          'stateSave':true,
          'destroy':true,
          'ajax':{
              "url": base_url+"clientes/consultar_deudores",
              "type":"POST",
              dataSrc: ''
          },
          'columns':[
              {'orderable': false,
                render:function(data, type, row){
                  return '<div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">'+
                          '<div class="form-group">'+
                            '<div class="radio-button">'+
                              '<input name="client_ls" onClick="get_value(\''+row.cod_persona+'\');" type="radio" id="'+row.cod_persona+'" />'+
                              '<label for="'+row.cod_persona+'"</label>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                  }
              },
              {data: 'cod_persona'},
              {data: 'nombres'},
              {data: 'apellido_paterno'},
              {data: 'apellido_materno'},
              ],
          "order":[[0, "asc"]],
          'language':español
      });
      $('#confirm_cliente').click(function(){
        $('#buscar_cliente').modal('hide');
      })
    })

    get_value = function(cod_persona){
        $('#dni_cliente').val(cod_persona);
        $('a[href="#next"]').parent().attr('style', 'display:block');
    };
    cancelar_cliente = function(){
        $('#dni_cliente').val('');
        $('a[href="#next"]').parent().attr('style', 'display:none');
        $('#wizard_horizontal-t-1').parent().removeAttr('class').addClass('disabled');
    };

    ingresar_datos = function(data1,data2){
        var cod_cronograma_ventas = data1;
        var monto_crono = data2;
        console.log(monto_cronogramas)
        if (cronogramas_seleccionados.includes(cod_cronograma_ventas)==false){
            $('#amortizacion_venta').modal({backdrop: "static", keyboard: false})
            $.post(base_url+'pagos/consultar_amortizacion_venta',{
                cod_cron: cod_cronograma_ventas,
            },
            function(data){
                var datos = eval(data);
                var suma_monto = 0;
                if (datos != ''){
                    datos.forEach(function(a){
                        suma_monto += parseFloat(a['monto'])
                    })
                    var monto_restante = parseFloat(monto_crono) - parseFloat(suma_monto)
                    $('#monto_restante').val(monto_restante);
                    monto_cronogramas.push(monto_restante);
                }
                else{
                    $('#monto_restante').val(monto_crono);
                    monto_cronogramas.push(monto_crono);
                }
            })
            cronogramas_seleccionados.push(cod_cronograma_ventas);
            if(cronogramas_seleccionados_e.length>0){
                $('#concepto_movimiento_cronograma').val('2').change();
                if(cronogramas_seleccionados.length>0){
                    $('#concepto_movimiento_cronograma').val('5').change();
                };
            }else{
                $('#concepto_movimiento_cronograma').val('1').change();
            }
            console.log(cronogramas_seleccionados);
        }
        else{
            var pos = cronogramas_seleccionados.indexOf(cod_cronograma_ventas);
            cronogramas_seleccionados.splice(pos,1);
            monto_cronogramas.splice(pos,1);
            amortizacion_venta.splice(pos,1);
            monto_total.splice(pos,1);
            console.log(cronogramas_seleccionados);
            console.log(monto_cronogramas);
            console.log(amortizacion_venta);
            var monto_virtual = 0;
            var valor1 = amortizacion_venta.slice();
            var valor2 = amortizacion_venta_e.slice();
            valor2.concat(valor1);
            valor2.forEach(function(y){
                monto_virtual+=parseFloat(y);
                console.log(monto_virtual)
            })
            console.log(monto_virtual)
            console.log(monto_cronogramas_e)
            console.log(amortizacion_venta_e)
            $('#monto_cronograma').val(parseFloat(monto_virtual));
            if(cronogramas_seleccionados_e.length>0){
                $('#concepto_movimiento_cronograma').val('2').change();
                if(cronogramas_seleccionados.length>0){
                    $('#concepto_movimiento_cronograma').val('5').change();
                };
            }else{
                $('#concepto_movimiento_cronograma').val('1').change();
            }
        }
    }

    ingresar_datos_e = function(data3, data4){
        var cod_cronograma_estadia = data3
        var monto_crono = parseFloat(data4);
        console.log(monto_cronogramas_e)
        if (cronogramas_seleccionados_e.includes(cod_cronograma_estadia)==false){
            $('#amortizacion_venta').modal({backdrop: "static", keyboard: false})
            $.post(base_url+'pagos/consultar_amortizacion_cronograma_movimiento',{
                cod_cron: cod_cronograma_estadia,
            },
            function(data){
                var datos = eval(data);
                var suma_monto = 0;
                if (datos != ''){
                    for (var a=0; a<datos.length; a++){
                        suma_monto += parseFloat(datos[a]['monto'])
                        console.log(suma_monto, datos[a]['monto']);
                    }
                    var monto_restante = parseFloat(monto_crono) - parseFloat(suma_monto)
                    console.log(monto_crono, suma_monto, monto_crono);
                    $('#monto_restante').val(monto_restante);
                    monto_cronogramas_e.push(monto_restante);
                }
                else{
                    $('#monto_restante').val(monto_crono);
                    monto_cronogramas_e.push(monto_crono);
                }
            })
            cronogramas_seleccionados_e.push(cod_cronograma_estadia);
            if(cronogramas_seleccionados_e.length>0){
                $('#concepto_movimiento_cronograma').val('2').change();
                if(cronogramas_seleccionados.length>0){
                    $('#concepto_movimiento_cronograma').val('5').change();
                };
            }else{
                $('#concepto_movimiento_cronograma').val('1').change();
            }
            console.log(cronogramas_seleccionados_e);
        }
        else{
            var pos = cronogramas_seleccionados_e.indexOf(cod_cronograma_estadia);
            cronogramas_seleccionados_e.splice(pos,1);
            monto_cronogramas_e.splice(pos,1);
            amortizacion_venta_e.splice(pos,1);
            monto_total.splice(pos,1);
            console.log(cronogramas_seleccionados_e);
            console.log(monto_cronogramas_e);
            console.log(amortizacion_venta_e);
            var monto_virtual = 0;
            var valor1 = amortizacion_venta.slice();
            var valor2 = amortizacion_venta_e.slice();
            valor1.concat(valor2);
            valor1.forEach(function(x){
                monto_virtual+=parseFloat(x);
                console.log(monto_virtual)
            })
            console.log(monto_virtual)
            $('#monto_cronograma').val(parseFloat(monto_virtual));
            if(cronogramas_seleccionados_e.length>0){
                $('#concepto_movimiento_cronograma').val('2').change();
                if(cronogramas_seleccionados.length>0){
                    $('#concepto_movimiento_cronograma').val('5').change();
                };
            }else{
                $('#concepto_movimiento_cronograma').val('1').change();
            }
        }
    }
    $('#forma_pago_cronograma').change(function(){
        $(this).parent().removeClass('error');
    })
    $('#tipo_documento_cronograma').change(function(){
        $(this).parent().removeClass('error');
    })
    $('#concepto_movimiento_cronograma').change(function(){
        $(this).parent().removeClass('error');
    })
    cancelar = function(){
        var copia_cs = cronogramas_seleccionados.slice();
        var copia_cs_e = cronogramas_seleccionados_e.slice();
        var cron = cronogramas_seleccionados.pop();
        var cron_e = cronogramas_seleccionados_e.pop();
        var pos = copia_cs.indexOf(cron);
        var pos_e = copia_cs.indexOf(cron_e);
        monto_cronogramas.splice(pos, 1)
        monto_cronogramas_e.splice(pos_e, 1)
        $('#cv'+cron+'').prop('checked', false);
        $('#ce'+cron_e+'').prop('checked', false);
        $('#amortizacion_venta').modal('hide');
    }

    confirmar = function(){
        if ($('#monto_a_amortizar_e').val() || $('#monto_a_amortizar').val() != ''){
            if ($('#monto_a_amortizar_e').val() != ''){
            amortizacion_venta_e.push($('#monto_a_amortizar_e').val())
            }else{
               amortizacion_venta.push($('#monto_a_amortizar').val())
            }
            console.log(amortizacion_venta)
            console.log(amortizacion_venta_e)
            var monto_virtual = 0;
            var monto_virtual_e = 0;
            amortizacion_venta.forEach(function(i){
                monto_virtual+=parseFloat(i);
                console.log(monto_virtual)
            })
            amortizacion_venta_e.forEach(function(j){
                monto_virtual_e+=parseFloat(j);
                console.log(monto_virtual_e)
            })
            var monto_suma = parseFloat(monto_virtual) + parseFloat(monto_virtual_e)
            $('#monto_cronograma').val(parseFloat(monto_suma));
            $('#amortizacion_venta').modal('hide');
            $.post(base_url+'pagos/consultar_fecha_caja',
            {
                empleado:$('#empleado').val()
            },
            function(dataa){
                var datosa = eval(dataa);
                datosa.forEach(function(b){
                    $('#fecha_inicio').val(b['fecha_inicio'])
                    $('#caja').val(b['cod_caja'])
                    console.log($('#fecha_inicio').val())
                    console.log($('#caja').val())
                })
            })
        }else{
            alert('¡Introduzca el monto a amortizar por favor!')
        }
    }

    cobrar = function(){
        if(cronogramas_seleccionados.length>0 && cronogramas_seleccionados_e>0 && $('#forma_pago_cronograma').val()!='' && $('#tipo_documento_cronograma').val()!='' && $('#concepto_movimiento_cronograma').val()!=''){
            $.post(base_url+'pagos/guardar_cobro',
            {
                cod_persona:$('#empleado').val(),
                cod_caja:$('#caja').val(),
                fecha_inicio:$('#fecha_inicio').val(),
                forma_pago_cronograma:$('#forma_pago_cronograma').val(),
                tipo_documento_cronograma:$('#tipo_documento_cronograma').val(),
                concepto_movimiento_cronograma:$('#concepto_movimiento_cronograma').val(),
                monto_cronograma:$('#monto_cronograma').val(),
                ventas:cronogramas_seleccionados,
                ventas_e:cronogramas_seleccionados_e,
                monto:amortizacion_venta,
                monto_e:amortizacion_venta_e,
                monto_cronogramas:monto_cronogramas,
                monto_cronogramas_e:monto_cronogramas_e,
            })
            alert('El cobro se efectuó correctamente');
            location.reload();
        }else{
            swal({
                title: 'Ha ocurrido un error!',
                text: 'Por favor, verifique que los datos hayan sido configurados correctamente',
                type: 'warning',
            });
            if($('#forma_pago_cronograma').val()==''){
                $('#forma_pago_cronograma').parent().addClass('error');
            }
            if ($('#tipo_documento_cronograma').val()==''){
                $('#tipo_documento_cronograma').parent().addClass('error');
            }
            if($('#concepto_movimiento_cronograma').val()==''){
                $('#concepto_movimiento_cronograma').parent().addClass('error');
            }
        }
    }

    //Generador

    var subtotal = 0;

    var buscar_cliente_producto = $('#buscar_cliente_producto');
    var buscar_cliente_estadia = $('#buscar_cliente_estadia');

    var detalle_cliente_producto = $('#detalle_cliente_producto');
    var detalle_cliente_estadia = $('#detalle_cliente_estadia');

    $('#forma_pago_div').attr('style','display:none');
    $('#tipo_documento_div').attr('style','display:none');
    $('#ruc_div').attr('style','display:none');
    $('#periodo_div').attr('style','display:none');
    $('#cuota_div').attr('style','display:none');
    $('#inicial_div').attr('style','display:none');
    $('#monto_contado_div').attr('style','display:none');
    $('#fecha_contado_div').attr('style','display:none');
    $('#fecha_contado').val(output1);
    $('#fecha_credito_div').attr('style','display:none');
    $('#concepto_movimiento_div').attr('style','display:none');

    $('a[href="#next"]').click(function(){
        $('a[href="#next"]').parent().css('display', 'none');
    $('#monto_credito_div').attr('style','display:none');
        $('a[href="#wizard_horizontal-h-1"]').click(function(){
            seleccionadop.forEach(function(i){
                $('#p'+i+'').prop('checked', true);
                $('#cp'+i+'').prop('checked', true);
            });
            seleccionadoe.forEach(function(i){
                $('#ce'+i+'').prop('checked', true);
            });
        });
        $.post(base_url+'pagos/consultar_cliente_producto',
            {cliente:$('#dni_cliente').val(),},
            function(data){
                var html = '';
                var datos = eval(data);
                for (i = 0; i<datos.length; i++){
                    html+='<tr>'+
                        '<td>'+datos[i]['cod_venta']+'</td>'+
                        '<td>'+datos[i]['cod_cliente']+'</td>'+
                        '<td>'+datos[i]['nombres']+'</td>'+
                        '<td>'+datos[i]['apellido_paterno']+'</td>'+
                        '<td>'+datos[i]['apellido_materno']+'</td>'+
                        '<td>'+datos[i]['fecha_venta']+'</td(>'+
                        '<td><input type="checkbox" onClick="check_ventas('+datos[i]['cod_venta']+')" name="listado_p" value="'+datos[i]['cod_venta']+'" id="cp'+datos[i]['cod_venta']+'"><label for="cp'+datos[i]['cod_venta']+'"></label></td>'+
                        '</tr>';
                    if ($('#ruc').val()==''){
                        $('#ruc').val(datos[i]['ruc'])
                    }
                }
                buscar_cliente_producto.html(html);
                /*
                $('input[type=checkbox]').click(function(){
                    var elemento = $(this).val();
                    if (seleccionadop.includes(elemento)){
                        var pos = seleccionadop.indexOf(elemento);
                        seleccionadop.splice(pos,1);
                            console.log(seleccionadop);
                    }
                    $('input[name=listado_p]:checked').each(function(){
                        if (seleccionadop.includes($(this).val()) == false){
                        seleccionadop.push($(this).val());
                            console.log(seleccionadop);
                        }
                    })
                })
                */
            }
        )

        $.post(base_url+'pagos/consultar_cliente_estadia',
            {cliente:$('#dni_cliente').val(),},
            function(data){
                var html = '';
                var datos = eval(data);
                for (var i = 0; i<datos.length; i++){
                    html+='<tr>'+
                        '<td>'+datos[i]['cod_estadia']+'</td>'+
                        '<td>'+datos[i]['cod_cliente']+'</td>'+
                        '<td>'+datos[i]['nombres']+'</td>'+
                        '<td>'+datos[i]['apellido_paterno']+'</td>'+
                        '<td>'+datos[i]['apellido_materno']+'</td>'+
                        '<td>'+datos[i]['fecha_reserva']+'</td>'+
                        '<td>'+datos[i]['fecha_ingreso']+'</td>'+
                        '<td>'+datos[i]['fecha_salida']+'</td>'+
                        '<td><input type="checkbox" name="listado_e" onClick="check_estadia('+datos[i]['cod_estadia']+')" value="'+datos[i]['cod_estadia']+'" id="ce'+datos[i]['cod_estadia']+'"><label for="ce'+datos[i]['cod_estadia']+'"></label></td>'+
                        '</tr>';
                }
                seleccionadop.length = 0;
                seleccionadoe.length = 0;
                buscar_cliente_estadia.html(html);

                // $('input[type=checkbox]').click(function(){
                //     var elemento = $(this).val();
                //     if (seleccionadoe.includes(elemento)){
                //         var pos = seleccionadoe.indexOf(elemento);
                //         seleccionadoe.splice(pos,1);
                //         console.log(seleccionadoe);
                //     }
                //     $('input[name=listado_e]:checked').each(function(){
                //         if (seleccionadoe.includes($(this).val()) == false){
                //         seleccionadoe.push($(this).val());
                //         console.log(seleccionadoe);
                //         }
                //     })
                // })

            }
        )
    })

        $('a[href="#previous"]').click(function(){
            $('a[href="#wizard_horizontal-h-1"]').click(function(){
                seleccionadop.forEach(function(i){
                    $('#cp'+i+'').prop('checked', true);
                });
                seleccionadoe.forEach(function(i){
                    $('#ce'+i+'').prop('checked', true);
                });
            });
        })
    check_ventas = function(arg){
        var elemento = arg;
        if (seleccionadop.includes(elemento)){
            var pos = seleccionadop.indexOf(elemento);
            seleccionadop.splice(pos,1);
            monto_ventas.splice(pos,1);
            console.log(seleccionadop);
            console.log(monto_ventas);
            if((seleccionadoe.length || seleccionadop.length)==0){
                $('a[href="#next"]').parent().css('display', 'none');
                $('#wizard_horizontal-t-2').parent().removeAttr('class').addClass('disabled');
            }else{
                $('a[href="#next"]').parent().css('display', 'block');
                $('#wizard_horizontal-t-2').parent().removeAttr('class').addClass('done').attr('aria-disabled', 'false');
            }
        }else{
            seleccionadop.push(elemento);
            if((seleccionadoe.length || seleccionadop.length)==0){
                $('a[href="#next"]').parent().css('display', 'none');
                $('#wizard_horizontal-t-2').parent().removeAttr('class').addClass('disabled');
            }else{
                $('a[href="#next"]').parent().css('display', 'block');
                $('#wizard_horizontal-t-2').parent().removeAttr('class').addClass('done').attr('aria-disabled', 'false');
            }
            console.log(seleccionadop);
            $('#detalle_cliente_producto').html('');
            seleccionadop.forEach(function(e){
                var precio_venta = 0;
                $.post(base_url+'pagos/detalle_cliente_producto',
                    {
                        cod_cliente:$('#dni_cliente').val(),
                        cod_venta:e,
                    },
                    function(data){
                        var html = '';
                        var sub_total = 0;
                        var datos = eval(data);
                        console.log(datos);
                        for (i = 0; i<datos.length; i++){
                            html+='<tr>'+
                                '<td>'+datos[i]['cod_venta']+'</td>'+
                                '<td>'+datos[i]['cod_persona']+'</td>'+
                                '<td>'+datos[i]['nombres']+'</td>'+
                                '<td>'+datos[i]['apellido_paterno']+'</td>'+
                                '<td>'+datos[i]['cantidad']+'</td>'+
                                '<td>'+datos[i]['producto']+'</td>'+
                                '<td>'+datos[i]['precio']+'</td>'+
                                '<td>'+datos[i]['descuento']+'</td>'+
                                '<td>'+datos[i]['cod_parametro']+'</td>'+
                                '</tr>';
                            sub_total += parseFloat(datos[i]['precio'])*parseInt(datos[i]['cantidad']);
                        }
                        precio_venta +=  sub_total;
                        $('#detalle_cliente_producto').append(html);
                        if(monto_ventas.includes(precio_venta)==false){
                           monto_ventas.push(precio_venta);
                        }
                        console.log(monto_ventas);
                    }
                )
            })
        }
    }
    var precios_servicios = Array();
    var precios_habitaciones = Array();
    var precios_habitacion_servicio = Array();
    check_estadia = function(arg1){
        var elemento = arg1;
        if (seleccionadoe.includes(elemento)){
            var pos = seleccionadoe.indexOf(elemento);
            seleccionadoe.splice(pos,1);
            monto_estadia.splice(pos,1);
            precios_habitaciones.splice(pos,1);
            precios_servicios.splice(pos,1);
            console.log(seleccionadoe);
            console.log(monto_estadia);
            if((seleccionadoe.length || seleccionadop.length)==0){
                $('a[href="#next"]').parent().css('display', 'none');
                $('#wizard_horizontal-t-2').parent().removeAttr('class').addClass('disabled');
            }else{
                $('a[href="#next"]').parent().css('display', 'block');
                $('#wizard_horizontal-t-2').parent().removeAttr('class').addClass('done').attr('aria-disabled', 'false');
            }
        }else{
            seleccionadoe.push(elemento);
            if((seleccionadoe.length || seleccionadop.length)==0){
                $('a[href="#next"]').parent().css('display', 'none');
                $('#wizard_horizontal-t-2').parent().removeAttr('class').addClass('disabled');
            }else{
                $('a[href="#next"]').parent().css('display', 'block');
                $('#wizard_horizontal-t-2').parent().removeAttr('class').addClass('done').attr('aria-disabled', 'false');
            }
            console.log(seleccionadoe);
            $('#detalle_cliente_estadia').html('');
            seleccionadoe.forEach(function(u){
                var precio_estadia = 0;
                $.post(base_url+'pagos/detalle_cliente_estadia',
                    {
                        cod_estadia:u,
                    },
                    function(data){
                        var html = '';
                        var precio_habitacion = 0;
                        var habitacion = '';
                        var sub_total1 = 0;
                        var datos = eval(data);
                        // console.log(datos);
                        for (var l = 0; l<datos.length; l++){
                            html+='<tr>'+
                                '<td>'+datos[l]['cod_estadia']+'</td>'+
                                '<td>'+datos[l]['cod_habitacion']+'</td>'+
                                '<td>'+datos[l]['tipo_habitacion']+'</td>'+
                                '<td>'+datos[l]['precio_tipo_habitacion']+'</td>'+
                                '<td>'+calcularDias(datos[l]['fecha_ingreso'], datos[l]['fecha_salida'])+' días</td>'+
                                '</tr>';
                        }
                        $('#detalle_cliente_estadia').append(html);
                       // monto_estadia.push(precio_estadia);
                       //  console.log(monto_estadia);
                })
                $.post(base_url+'pagos/precio_servicios',
                {
                    cod_estadia: u,
                },
                function(datax){
                    var datosx = eval(datax);
                    var suma_precios_s = 0;
                    datosx.forEach(function(xy){
                        suma_precios_s += parseFloat(xy['precio'])
                    })
                    if (precios_servicios.includes(suma_precios_s)==false){
                        precios_servicios.push(suma_precios_s)
                        console.log(precios_servicios)
                    }
                })

            })

        }
    }

    $('#fecha_credito').change(function(){
        // if ($(this).val() == output1){
        //     $('#forma_pago_div').attr('style','display:block');
        //     $('#tipo_documento_div').attr('style','display:block');
        //     $('#monto_inicial_div').attr('style','display:block');
        // }else{
        //     $('#forma_pago_div').attr('style','display:none');
        //     $('#tipo_documento_div').attr('style','display:none');
        //     $('#monto_inicial_div').attr('style','display:none');
        // }
    })

    $('#tipo_t').change(function(){
        if($('#tipo_t').val() !=  ''){
            if($('#tipo_t').val() == '1'){
                if (seleccionadop.length>0){
                    if (seleccionadoe.length>0){
                        $('#concepto_movimiento').val('5').change();
                    }else{
                        $('#concepto_movimiento').val('1').change();
                    }
                }else{
                    $('#concepto_movimiento').val('2').change();
                };
                $('#forma_pago_div').attr('style','display:block');
                $('#tipo_documento_div').attr('style','display:block');
                $('#ruc_div').attr('style','display:block');
                $('#periodo_div').attr('style','display:none');
                $('#cuota_div').attr('style','display:none');
                $('#monto_credito_div').attr('style','display:none');
                $('#monto_contado_div').attr('style','display:block');
                //$('#fecha_contado_div').attr('style','display:none');
                $('#fecha_credito_div').attr('style','display:none');
                $('#concepto_movimiento_div').attr('style','display:block');
            }

            if($('#tipo_t').val() == '2'){

                $('#forma_pago_div').attr('style','display:none');
                $('#tipo_documento_div').attr('style','display:none');
                $('#ruc_div').attr('style','display:none');
                $('#periodo_div').attr('style','display:block');
                $('#cuota_div').attr('style','display:block');
                $('#monto_credito_div').attr('style','display:none');
                $('#monto_contado_div').attr('style','display:block');
                $('#fecha_contado_div').attr('style','display:none');
                $('#fecha_credito_div').attr('style','display:block');
                $('#concepto_movimiento_div').attr('style','display:none');
            }

            $('#detalle_cliente_producto').html('');
            subtotal = 0;
            seleccionadop.forEach(function(e){
                $.post(base_url+'pagos/detalle_cliente_producto',
                    {
                        cod_cliente:$('#dni_cliente').val(),
                        cod_venta:e,
                    },
                    function(data){
                        var precio_pr = 0;
                        var html = '';
                        var datos = eval(data);
                        console.log(datos);
                        for (i = 0; i<datos.length; i++){
                            html+='<tr>'+
                                '<td>'+datos[i]['cod_venta']+'</td>'+
                                '<td>'+datos[i]['cod_persona']+'</td>'+
                                '<td>'+datos[i]['nombres']+'</td>'+
                                '<td>'+datos[i]['apellido_paterno']+'</td>'+
                                '<td>'+datos[i]['cantidad']+'</td>'+
                                '<td>'+datos[i]['producto']+'</td>'+
                                '<td>'+datos[i]['precio']+'</td>'+
                                '<td>'+datos[i]['descuento']+'</td>'+
                                '<td>'+datos[i]['cod_parametro']+'</td>'+
                                '</tr>';
                            var precio = parseFloat(datos[i]['precio'])*parseInt(datos[i]['cantidad']);
                            precio_pr += precio;
                        }
                        subtotal +=  precio_pr;
                        console.log(subtotal)
                        var total = 0;
                        monto_ventas.concat(precios_habitacion_servicio).forEach(function(q){
                            total+=parseFloat(q);
                        })
                        $('#monto_contado').val(parseFloat(total));
                        $('#detalle_cliente_producto').append(html);
                    }
                )
            })

            $('#detalle_cliente_estadia').html('');
            console.log(seleccionadoe);
            var precio_total = 0;
            precios_habitaciones.length=0;
            seleccionadoe.forEach(function(u){
                $.post(base_url+'pagos/detalle_cliente_estadia',
                    {
                        cod_estadia:u,
                    },
                    function(data1){
                        var html = '';
                        var datos1 = eval(data1);
                        var total = 0;
                        console.log(datos1);
                        for (i = 0; i<datos1.length; i++){
                            precios_habitaciones.push(calcularPrecios(datos1[i]['fecha_ingreso'], datos1[i]['fecha_salida'], datos1[i]['precio_tipo_habitacion']));
                            console.log(precios_habitaciones);
                            total += calcularPrecios(datos1[i]['fecha_ingreso'], datos1[i]['fecha_salida'], datos1[i]['precio_tipo_habitacion']);
                            console.log(total, calcularPrecios(datos1[i]['fecha_ingreso'], datos1[i]['fecha_salida'], datos1[i]['precio_tipo_habitacion']));
                            html+='<tr>'+
                                '<td>'+datos1[i]['cod_estadia']+'</td>'+
                                '<td>'+datos1[i]['cod_habitacion']+'</td>'+
                                '<td>'+datos1[i]['tipo_habitacion']+'</td>'+
                                '<td>'+datos1[i]['precio_tipo_habitacion']+'</td>'+
                                '<td>'+calcularDias(datos1[i]['fecha_ingreso'], datos1[i]['fecha_salida'])+' días</td>'+
                                '</tr>';
                        }
                        $('#detalle_cliente_estadia').append(html);
                        precio_total+=total;
                        // var total = 0;
                        // precios_habitacion_servicio.concat(monto_ventas).forEach(function(t){
                        //     total+=parseFloat(t);
                        // })
                        $('#monto_contado').val(parseFloat(precio_total));
                    }
                )
            })
        }
    })

    $('a[href="#finish"]').click(function(){
        // alert($('#tipo_t').val())
        registrar_cronogramas();
    })

    restaFechas = function(f1,f2)
    {
        var aFecha1 = f1.split('-');
        var aFecha2 = f2.split('-');
        var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]);
        var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]);
        var dif = fFecha2-fFecha1;
        var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
        return dias;
    }
    function editar_fecha(fecha, intervalo, dma, simbolo) {

      var simbolo = simbolo || "-";
      var arrayFecha = fecha.split(simbolo);
      var dia = arrayFecha[2];
      var mes = arrayFecha[1];
      var anio = arrayFecha[0];

      var fechaInicial = new Date(anio, mes - 1, dia);
      var fechaFinal = fechaInicial;
      if(dma=="m" || dma=="M"){
        fechaFinal.setMonth(fechaInicial.getMonth()+parseInt(intervalo));
      }else if(dma=="y" || dma=="Y"){
        fechaFinal.setFullYear(fechaInicial.getFullYear()+parseInt(intervalo));
      }else if(dma=="d" || dma=="D"){
        fechaFinal.setDate(fechaInicial.getDate()+parseInt(intervalo));
      }else{
        return fecha;
      }
      dia = fechaFinal.getDate();
      mes = fechaFinal.getMonth() + 1;
      anio = fechaFinal.getFullYear();

      dia = (dia.toString().length == 1) ? "0" + dia.toString() : dia;
      mes = (mes.toString().length == 1) ? "0" + mes.toString() : mes;

      return anio + "-" + mes + "-" + dia;
    }
    registrar_cronogramas = function(){
        console.log(seleccionadoe)
        if ($('#tipo_t').val() == '2'){
            if (seleccionadop.length > 0){
                for(var v = 0; v<seleccionadop.length; v++){
                    for (var p=0; p<$('#cuota').val(); p++){
                        var monto_cronograma = parseFloat(monto_ventas[v])/parseFloat($('#cuota').val())
                        fecha_credito = $('#fecha_credito').val();
                        if ($('#periodo').val() == 1){
                            fecha_crono = editar_fecha($('#fecha_credito').val(), p, 'd', '-');
                        }
                        if ($('#periodo').val() == 2){
                            var dias = parseInt(p)*7
                            fecha_crono = editar_fecha($('#fecha_credito').val(), dias, 'd', '-');
                        }
                        if ($('#periodo').val() == 3){
                            fecha_crono = editar_fecha($('#fecha_credito').val(), p, 'm', '-');
                        }
                        console.log(fecha_crono);
                        var nro_cuota = parseInt(p)+1
                        $.post(base_url+'pagos/ventas_credito',
                            {
                                cod_venta: seleccionadop[v],
                                fecha_vencimiento: fecha_crono,
                                nro_cuota: nro_cuota,
                                monto: monto_cronograma,
                                estado: '1',
                            },
                            function(datav){
                                if (datav == true){
                                    alert('Cronograma de ventas generado.');
                                }
                                location.reload();
                            }
                        )
                    }
                    $.post(base_url+'pagos/actualizar_venta',
                    {
                        cod_venta: seleccionadop[v],
                    })
                }
            }else{
                swal({
                    title: 'Ha ocurrido un error!',
                    text: 'No se ha sele',
                });
            }
            console.log(seleccionadoe.length)
            if (seleccionadoe.length > 0){
                for(var e = 0; e<seleccionadoe.length; e++){
                    var cuota = $('#cuota').val();
                    for (var s = 0; s<cuota; s++){
                        console.log('s'+s+'')
                        var precio_estadia = parseFloat(precios_habitaciones[e])+parseFloat(precios_servicios[e])
                        var monto_cronograma = parseFloat(precio_estadia)/parseFloat($('#cuota').val())
                        if ($('#periodo').val() == 1){
                            fecha_crono = editar_fecha($('#fecha_credito').val(), s, 'd', '-');
                        }
                        if ($('#periodo').val() == 2){
                            fecha_crono = editar_fecha($('#fecha_credito').val(), s, 'm', '-');
                        }
                        if ($('#periodo').val() == 3){
                            fecha_crono = editar_fecha($('#fecha_credito').val(), s, 'y', '-');
                        }
                        var nro_cuota = parseInt(s)+1
                        $.post(base_url+'pagos/estadias_credito',
                            {
                                cod_estadia: seleccionadoe[e],
                                fecha: fecha_crono,
                                nro_cuota: nro_cuota,
                                monto: monto_cronograma,
                                estado: '1',
                            },
                            function(datae){
                                if (datae == true){
                                    alert('Cronograma de estadía registrado correctamente.')

                                }
                                location.reload();
                            }
                        )
                    }
                    $.post(base_url+'pagos/actualizar_estados',
                        {
                            cod_estadia: seleccionadoe[e],
                            fecha_contado: output1,
                        }
                    )
                }
            }
        }else
            {
                if (($('#forma_pago').val()&&$('#tipo_documento').val()&&$('#monto_contado').val()&&$('#concepto_movimiento').val())!=''){
                    $.post(base_url+'pagos/procesar_pago',
                        {
                            dni_cliente:$('#dni_cliente').val(),
                            empleado:$('#empleado').val(),
                            tipo_t:$('#tipo_t').val(),
                            forma_pago:$('#forma_pago').val(),
                            tipo_documento:$('#tipo_documento').val(),
                            monto_contado:$('#monto_contado').val(),
                            fecha_contado:$('#fecha_contado').val(),
                            concepto_movimiento:$('#concepto_movimiento').val(),
                            ventas:seleccionadop,
                            cantidad_ventas:seleccionadop.length,
                            cantidad_estadias:seleccionadoe.length,
                            estadias:seleccionadoe,
                            monto_ventas:monto_ventas,
                            precios_habitaciones:precios_habitaciones,
                            precios_servicios:precios_servicios,
                        },
                            function(data1){
                            if (data1  == true){
                                alert(':v')
                            }
                            location.reload()
                    })
                }else{
                    if($('#forma_pago').val()==''){
                        $('#forma_pago').parent().addClass('error');
                    }
                    if($('#tipo_documento').val()==''){
                        $('#tipo_documento').parent().addClass('error');
                    }
                    if($('#monto_contado').val()==''){
                        $('#monto_contado').parent().addClass('error');
                    }
                    swal({
                        title: 'Ha ocurrido un error!',
                        text: 'El formulario no ha sido correctamente configurado.',
                        type: 'warning',
                    });
                }
            }
    }

})
