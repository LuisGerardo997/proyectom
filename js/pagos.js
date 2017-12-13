$(document).on('ready',function(){
    $('.modal').on('hidden.bs.modal', function(){
		$(this).find('form')[0].reset();
		$("label.error").remove();
	});

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });

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

    var cronogramas_seleccionados = Array();
    var amortizacion_venta = Array();
    var monto_cronogramas = Array();
    var monto_total = Array();

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
            console.log(cronogramas_seleccionados);
        }
        else{
            var pos = cronogramas_seleccionados.indexOf(cod_cronograma_ventas);
            cronogramas_seleccionados.splice(pos,1);
            monto_cronogramas.splice(pos,1);
            amortizacion_venta.splice(pos,1);
            monto_total.splice(pos,1);
            console.log(cronogramas_seleccionados)
            console.log(monto_cronogramas)
            console.log(amortizacion_venta)
            var monto_virtual = 0;
            amortizacion_venta.forEach(function(i){
                monto_virtual+=parseFloat(i);
            })
            $('#monto_cronograma').val(monto_virtual);
            // console.log(monto_total);

        }
    }

    cancelar = function(){
        var cron = cronogramas_seleccionados.pop();
        $('#cv'+cron+'').prop('checked', false);
        $('#amortizacion_venta').modal('hide');
    }

    confirmar = function(){
        amortizacion_venta.push($('#monto_a_amortizar').val())
        console.log(amortizacion_venta)
        // monto_total.push($('#monto_amortizar').val());
        var monto_virtual = 0;
        amortizacion_venta.forEach(function(i){
            monto_virtual+=parseFloat(i);
        })
        $('#monto_cronograma').val(monto_virtual);
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
    }

    cobrar = function(){
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
            monto:amortizacion_venta,
            monto_cronogramas:monto_cronogramas,
        })
        location.reload();
    }

    var seleccionadop = new Array();
    var seleccionadoe = new Array();
    var precio_preliminar = new Array();
    var subtotal = 0;

    var buscar_cliente_producto = document.getElementById('buscar_cliente_producto');
    var buscar_cliente_estadia = document.getElementById('buscar_cliente_estadia');

    var detalle_cliente_producto = document.getElementById('detalle_cliente_producto');
    var detalle_cliente_estadia = document.getElementById('detalle_cliente_estadia');

    $('#forma_pago_div').attr('style','display:none');
    $('#tipo_documento_div').attr('style','display:none');
    $('#tarjeta_div').attr('style','display:none');
    $('#ruc_div').attr('style','display:none');
    $('#periodo_div').attr('style','display:none');
    $('#cuota_div').attr('style','display:none');
    $('#inicial_div').attr('style','display:none');
    $('#monto_contado_div').attr('style','display:none');
    $('#fecha_contado_div').attr('style','display:none');
    $('#fecha_credito_div').attr('style','display:none');
    $('#concepto_movimiento_div').attr('style','display:none');

    $('a[href="#next"]').click(function(){
        $('a[href="#wizard_horizontal-h-1"]').click(function(){
            seleccionadop.forEach(function(i){
            $('#p'+i+'').prop('checked', true);
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
                        '<td>'+datos[i]['fecha_venta']+'</td>'+
                        '<td><input type="checkbox" name="listado_p" value="'+datos[i]['cod_venta']+'" id="p'+datos[i]['cod_venta']+'"><label for="p'+datos[i]['cod_venta']+'"></label></td>'+
                        '</tr>';
                    if ($('#ruc').val()==''){
                        $('#ruc').val(datos[i]['ruc'])
                    }
                }
                buscar_cliente_producto.innerHTML = html;
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
            }
        )

        $.post(base_url+'pagos/consultar_cliente_estadia',
            {cliente:$('#dni_cliente').val(),},
            function(data){
                var html = '';
                var datos = eval(data);
                for (i = 0; i<datos.length; i++){
                    html+='<tr>'+
                        '<td>'+datos[i]['cod_estadia']+'</td>'+
                        '<td>'+datos[i]['cod_cliente']+'</td>'+
                        '<td>'+datos[i]['nombres']+'</td>'+
                        '<td>'+datos[i]['apellido_paterno']+'</td>'+
                        '<td>'+datos[i]['apellido_materno']+'</td>'+
                        '<td>'+datos[i]['fecha_reserva']+'</td>'+
                        '<td>'+datos[i]['fecha_ingreso']+'</td>'+
                        '<td>'+datos[i]['fecha_salida']+'</td>'+
                        '<td><input type="checkbox" name="listado_e" value="'+datos[i]['cod_estadia']+'" id="e'+datos[i]['cod_estadia']+'"><label for="e'+datos[i]['cod_estadia']+'"></label></td>'+
                        '</tr>';
                }
                buscar_cliente_estadia.innerHTML = html;
                $('input[type=checkbox]').click(function(){
                    var elemento = $(this).val();
                    if (seleccionadoe.includes(elemento)){
                        var pos = seleccionadoe.indexOf(elemento);
                        seleccionadoe.splice(pos,1);
                        console.log(seleccionadoe);
                    }
                    $('input[name=listado_e]:checked').each(function(){
                        if (seleccionadoe.includes($(this).val()) == false){
                        seleccionadoe.push($(this).val());
                        console.log(seleccionadoe);
                        }
                    })
                })
            }
        )
    })

    $('#tipo_t').change(function(){
        if($('#tipo_t').val() !=  ''){
            if($('#tipo_t').val() == '1'){
               $('#forma_pago_div').attr('style','display:block');
                $('#tipo_documento_div').attr('style','display:block');
                $('#tarjeta_div').attr('style','display:block');
                $('#ruc_div').attr('style','display:block');
                $('#periodo_div').attr('style','display:none');
                $('#cuota_div').attr('style','display:none');
                $('#inicial_div').attr('style','display:none');
                $('#monto_contado_div').attr('style','display:block');
                $('#fecha_contado_div').attr('style','display:block');
                $('#fecha_credito_div').attr('style','display:none');
                $('#concepto_movimiento_div').attr('style','display:block');
            }

            if($('#tipo_t').val() == '2'){
                $('#forma_pago_div').attr('style','display:block');
                $('#tipo_documento_div').attr('style','display:block');
                $('#tarjeta_div').attr('style','display:block');
                $('#ruc_div').attr('style','display:block');
                $('#periodo_div').attr('style','display:block');
                $('#cuota_div').attr('style','display:block');
                $('#inicial_div').attr('style','display:block');
                $('#monto_contado_div').attr('style','display:block');
                $('#fecha_contado_div').attr('style','display:none');
                $('#fecha_credito_div').attr('style','display:block');
                $('#concepto_movimiento_div').attr('style','display:block');
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
                        $('#monto_contado').val(parseFloat(subtotal));
                        $('#detalle_cliente_producto').append(html);
                    }
                )
            })

            $('#detalle_cliente_estadia').html('');
            console.log(seleccionadoe)
            seleccionadoe.forEach(function(u){
                $.post(base_url+'pagos/detalle_cliente_estadia',
                    {
                        cod_estadia:u,
                    },
                    function(data1){
                        var html = '';
                        var datos1 = eval(data1);
                        console.log(datos1);
                        for (i = 0; i<datos1.length; i++){
                            html+='<tr>'+
                                '<td>'+datos1[i]['cod_habitacion']+'</td>'+
                                '<td>'+datos1[i]['tipo_habitacion']+'</td>'+
                                '<td>'+datos1[i]['precio_tipo_habitacion']+'</td>'+
                                '<td>'+datos1[i]['servicio']+'</td>'+
                                '<td>'+datos1[i]['precio']+'</td>'+
                                '</tr>';
                        }
                        $('#detalle_cliente_estadia').append(html);
                    }
                )
            })
        }
    })

    $('a[href="#finish"]').click(function(){
        $.post(base_url+'pagos/procesar_pago',
            {
                tipo_t:$('#tipo_t').val(),
                compras:seleccionadop,
                dni_cliente:$('#dni_cliente'),
                estadias:seleccionadoe,
                forma_pago:$('#forma_pago').val(),
                tipo_documento:$('#tipo_documento').val(),
                tarjeta:$('#tarjeta').val(),
                ruc:$('#ruc').val(),
                periodo:$('#periodo').val(),
                cuota:$('#cuota').val(),
                inicial:$('#inicial').val(),
                monto_contado:$('#monto_contado').val(),
                fecha_contado:$('#fecha_contado').val(),
                fecha_credito:$('#fecha_credito').val(),
                concepto_movimiento:$('#concepto_movimiento').val(),
        },
              function(data1){
                if (data1  == true){
                    alert(':v')
                }
        })
    })
})
