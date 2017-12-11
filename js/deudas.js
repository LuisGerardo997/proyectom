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

    var seleccionadop = new Array();

    var detalle_cliente_producto = document.getElementById('detalle_cliente_producto');
    $('#tabla_proveedor').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url": base_url+"deudas/consultar_proveedor",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_proveedor'},
            {data: 'razon_social'},
            {data: 'dni'},
            {data: 'nombres'},
            {data: 'apellido_paterno'},
            {data: 'apellido_materno'},
            {data: 'ciudad'},
            {"orderable":true,
            render:function(data, type, row){
                return '<input name="proveedor" onClick="proveedor_c(\''+row.cod_proveedor+'\')" type="radio" id="\''+row.cod_proveedor+'\'"/>'+'<label for="\''+row.cod_proveedor+'\'"></label>'
            }
        }
    ],
    "order":[[0, "asc"]],
    'language':español
});

$('#forma_pago_div').attr('style','display:none');
$('#tipo_documento_div').attr('style','display:none');
$('#serie_div').attr('style','display:none');
$('#correlativo_div').attr('style','display:none');
$('#periodo_div').attr('style','display:none');
$('#cuota_div').attr('style','display:none');
$('#monto_inicial_div').attr('style','display:none');
$('#fecha_contado_div').attr('style','display:none');
$('#fecha_credito_div').attr('style','display:none');
$('#concepto_movimiento_div').attr('style','display:none');

proveedor_c = function(data1){
    seleccionadop.length=0;
    var cod_pr = data1;
    $.post(base_url+'deudas/consultar_proveedor_compra',
    {proveedor:cod_pr,},
    function(data){
        var html = '';
        var datos = eval(data);
        for (i = 0; i<datos.length; i++){
            html+='<tr>'+
            '<td>'+datos[i]['cod_compra']+'</td>'+
            '<td>'+datos[i]['cod_proveedor']+'</td>'+
            '<td>'+datos[i]['razon_social']+'</td>'+
            '<td>'+datos[i]['fecha_compra']+'</td>'+
            '<td><input type="checkbox" name="listado_pc" value="'+datos[i]['cod_compra']+'" id="p'+datos[i]['cod_compra']+'"><label for="p'+datos[i]['cod_compra']+'"></label></td>'+
            '</tr>';
        }
        $('#consultar_proveedor_compra').html(html);
        $('input[type=checkbox]').click(function(){
            var elemento = $(this).val();
            if (seleccionadop.includes(elemento)){
                var pos = seleccionadop.indexOf(elemento);
                seleccionadop.splice(pos,1);
                console.log(seleccionadop);
            }
            $('input[name="listado_pc"]:checked').each(function(){
                if (seleccionadop.includes($(this).val()) == false){
                    seleccionadop.push($(this).val());
                    console.log(seleccionadop);
                }
            })
            arraydetuqlo = seleccionadop.sort()
            $('#detalle_proveedor_producto').html('');
            seleccionadop.forEach(function(e){
                $.post(base_url+'deudas/detalle_proveedor_producto',
                {
                    cod_compra:e,
                },
                function(data){
                    var html = '';
                    var datos = eval(data);
                    console.log(datos);
                    for (i = 0; i<datos.length; i++){
                        html+='<tr>'+
                        '<td>'+datos[i]['cod_compra']+'</td>'+

                        '<td>'+datos[i]['cod_producto']+'</td>'+
                        '<td>'+datos[i]['cantidad']+'</td>'+
                        '<td>'+datos[i]['producto']+'</td>'+
                        '<td>'+datos[i]['precio']+'</td>'+
                        '<td>'+datos[i]['descuento']+'</td>'+
                        '<td>'+datos[i]['cod_parametro']+'</td>'+
                        '</tr>';
                    }
                    $('#detalle_proveedor_producto').append(html);
                }
            )
        })
    })
}
)
}

$('#tipo_t').change(function(){
    if($('#tipo_t').val() !=  ''){
        console.log($('#tipo_t').val())
        if($('#tipo_t').val() == '1'){                          //Contado
            $('#forma_pago_div').attr('style','display:block');
            $('#tipo_documento_div').attr('style','display:block');
            $('#serie_div').attr('style','display:block');
            $('#correlativo_div').attr('style','display:block');
            $('#fecha_contado_div').attr('style','display:block');
            $('#concepto_movimiento_div').attr('style','display:block');
            $('#cuota_div').attr('style','display:none');
            $('#periodo_div').attr('style','display:none');
            $('#fecha_credito_div').attr('style','display:none');

        }

        if($('#tipo_t').val() == '2'){                          //Crédito
            $('#forma_pago_div').attr('style','display:block');
            $('#tipo_documento_div').attr('style','display:block');
            $('#serie_div').attr('style','display:block');
            $('#correlativo_div').attr('style','display:block');
            $('#cuota_div').attr('style','display:block');
            $('#periodo_div').attr('style','display:block');
            $('#fecha_credito_div').attr('style','display:block');
            $('#concepto_movimiento_div').attr('style','display:block');
            $('#fecha_contado_div').attr('style','display:none');
        }


        //$('#modal_general').modal({backdrop:"static"})
        $('#detalle_proveedor_producto').html('');
        console.log(seleccionadop)
        arraydetuqlo = seleccionadop.sort()
        arraydetuqlo.forEach(function(e){
            $.post(base_url+'deudas/detalle_proveedor_producto',
            {
                cod_compra:e,
            },
            function(data){
                var html = '';
                var datos = eval(data);
                console.log(datos);
                for (i = 0; i<datos.length; i++){
                    html+='<tr>'+
                    '<td>'+datos[i]['cod_compra']+'</td>'+

                    '<td>'+datos[i]['cod_producto']+'</td>'+
                    '<td>'+datos[i]['cantidad']+'</td>'+
                    '<td>'+datos[i]['producto']+'</td>'+
                    '<td>'+datos[i]['precio']+'</td>'+
                    '<td>'+datos[i]['descuento']+'</td>'+
                    '<td>'+datos[i]['cod_parametro']+'</td>'+
                    '</tr>';
                }
                $('#detalle_proveedor_producto').append(html);
            }
        )
    })
}
})
$('a[href="#finish"]').click(function(){
    $.post(base_url+'deudas/procesar_deuda',
    {
        tipo_t:$('#tipo_t').val(),
        compras:seleccionadop,
        forma_pago:$('#forma_pago').val(),
        tipo_documento:$('#tipo_documento').val(),
        serie:$('#serie').val(),
        correlativo:$('#correlativo').val(),
        periodo:$('#periodo').val(),
        cuota:$('#cuota').val(),
        monto_inicial:$('#monto_inicial').val(),
        fecha_contado:$('#fecha_contado').val(),
        fecha_credito:$('#fecha_credito').val(),
        concepto_movimiento:$('#concepto_movimiento').val(),
    },
    function(data1){
        if (data1  == true){
            alert('Paolo puta:v')
        }
    })
})

$('#pagos_pendientes_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"deudas/consultar_deudas",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_cronograma_compras'},
        {data: 'cod_compra'},
        {data: 'cod_proveedor'},
        {data: 'razon_social'},
        {data: 'nro_cuota'},
        {data: 'fecha_vencimiento'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="">'+
            '<input type="checkbox" name="cronograma_compras" onClick="ingresar_datos(\''+row.cod_cronograma_compras+'\', \''+row.monto+'\')" value="\''+row.cod_cronograma_compras+'\'" id="cc'+row.cod_cronograma_compras+'"><label for="cc'+row.cod_cronograma_compras+'"></label>'+
            '</div>'
        }
    }
    // ,
    //   {"orderable":true,
    //   render:function(data, type, row){
    //     return '<div class="btn-group" role="group">'+
    //     '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
    //     'Acciones <span class="caret"></span>'+
    //     '</button>'+
    //     '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
    //     '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_compra+'\',\''+row.cod_proveedor+'\',\''+row.razon_social+'\',\''+row.fecha_compra+'\');">Editar</a></li>'+
    //     '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_compra+'\')">Eliminar</a></li>'+
    //     '</ul>'+
    //     '</div>'
    //   }
    // }
],
"order":[[0, "asc"]],
'language':español
});
var cronogramas_seleccionados = Array();
var cronogramas_amortizacion = Array();
var monto_cronogramas = Array();
var monto_total = 0;
ingresar_datos = function(data1, data2){
    var cod_cronograma_compras = data1;
    var monto_crono = data2;
    monto_cronogramas.push(monto_crono);
    console.log(monto_cronogramas)
    if (cronogramas_seleccionados.includes(cod_cronograma_compras)==false){
        $('#pagar_deuda').modal({backdrop: "static", keyboard: false})
            $.post(base_url+'deudas/consultar_amortizacion',
            {
                cod_cron: cod_cronograma_compras,
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
                }else{
                    $('#monto_restante').val(monto_crono);
                    console.log(monto_crono)
                }

            })
        cronogramas_seleccionados.push(cod_cronograma_compras);
        console.log(cronogramas_seleccionados);
    }else{
        var pos = cronogramas_seleccionados.indexOf(cod_cronograma_compras);
        cronogramas_seleccionados.splice(pos,1);
        console.log(cronogramas_seleccionados);
    }
}
cancelar = function(){
    var cron = cronogramas_seleccionados.pop();
    $('#cc'+cron+'').prop('checked', false);
    $('#pagar_deuda').modal('hide');
}
confirmar = function(){
    cronogramas_amortizacion.push($('#monto_amortizar').val())
    console.log(cronogramas_amortizacion)
    monto_total += parseFloat($('#monto_amortizar').val());
    console.log(monto_total)
    $('#monto_cronograma').val(monto_total);
    $('#pagar_deuda').modal('hide');
    $.post(base_url+'deudas/consultar_fecha_caja',
    {
        empleado:$('#empleado').val(),
    },
    function(dataa){
        var datosa = eval(dataa);
        datosa.forEach(function(b){
            $('#caja').val(b['cod_caja'])
            $('#fecha_inicio').val(b['fecha_inicio'])
            console.log($('#fecha_inicio').val())
            console.log($('#caja').val())
        })
    })

}
pagar = function(){
    $.post(base_url+'deudas/guardar_pago',
    {
        empleado:$('#empleado').val(),
        caja:$('#caja').val(),
        fecha_inicio:$('#fecha_inicio').val(),
        forma_pago:$('#forma_pago_cr').val(),
        tipo_documento:$('#tipo_documento_cr').val(),
        concepto_movimiento:$('#concepto_movimiento_cr').val(),
        monto_cronograma:$('#monto_cronograma').val(),
        serie:$('#serie_cr').val(),
        correlativo:$('#correlativo_cr').val(),
        compras:cronogramas_seleccionados,
        monto:cronogramas_amortizacion,
        monto_cronogramas:monto_cronogramas,
    },function(dat1){
        alert('Paolo chivo');
    })
}
})
/*
$('a[href="#next"]').click(function(){
$('a[href="#wizard_horizontal-h-1"]').click(function(){
seleccionadop.forEach(function(i){
$('#p'+i+'').prop('checked', true);
});
});


$.post(base_url+'pagos/consultar_cliente_estadia',
{cliente:$('#dni_cliente').val(),},
function(data){
var html = '';
var datos = eval(data);
for (i = 0; i<datos.length; i++){
html+='<tr>'+
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
//buscar_cliente_estadia.innerHTML = html;
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

var cuota = document.getElementById('cuota');
var periodo = document.getElementById('periodo');
var inicial = document.getElementById('inicial');
var monto_inicial = document.getElementById('monto_inicial');
var fecha_inicial_div = document.getElementById('fecha_inicial_div');
var tarjeta = document.getElementById('tarjeta');

cuota.setAttribute('style','display:none');
periodo.setAttribute('style','display:none');
inicial.setAttribute('style','display:none');
fecha_inicial_div.setAttribute('style','display:none');
tarjeta.setAttribute('style','display:none')

$('#contado').click(function(){
fecha_inicial_div.setAttribute('style','display:none');
cuota.setAttribute('style','display:none');
periodo.setAttribute('style','display:none');
inicial.setAttribute('style','display:none');
tarjeta.setAttribute('style','display:none');
})


$('#credito').click(function(){
fecha_inicial_div.setAttribute('style','display:block');
$.post(base_url+'Pagos/consultar_tarjeta',
{
cliente:$('#dni_cliente').val(),
},
function(data){
datos  = eval(data);
if (datos[0]['nro_tarjeta'] != '0'){
tarjeta.setAttribute('style','display:none')
$('#nro_tarjeta').val(i['nro_tarjeta']);

}else{
tarjeta.setAttribute('style','display:block')
}
})
cuota.setAttribute('style','display:block');
periodo.setAttribute('style','display:block');
})

var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = d.getFullYear() + '/' +
(month<10 ? '0' : '') + month + '/' +
(day<10 ? '0' : '') + day;

$('#date').bootstrapMaterialDatePicker({
format: 'DD-MM-YYYY',
clearButton: true,
weekStart: 1,
time: false
});
$('#fecha_inicial').change(function(){
if($(this).val()== output){
$('#monto_inicial').val('');
inicial.setAttribute('style','display:block');
}else{
inicial.setAttribute('style','display:none');
$('#monto_inicial').val('0');
}
})
var seleccionadodh = new Array();
var huespedes = new Array();
var objeto = new Object();
/*$('#dt_table').DataTable({
'paging':true,
'info':true,
'filter':true,
'stateSave':true,
'ajax':{
"url": base_url+"pagos/consultar_cliente_pago",
"type":"POST",
dataSrc: ''
},
'columns':[
{data: 'cod_cliente'},
{data: 'nombres'},
{data: 'apellido_paterno'},
{data: 'apellido_materno'},
{"orderable":true,
render:function(data, type, row){
return '<div class="btn-group" role="group">'+
'<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
'Acciones <span class="caret"></span>'+
'</button>'+
'<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
'<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_cliente+'\',\''+row.nombres+'\',\''+row.apellido_paterno+'\',\''+row.apellido_materno+'\');">Editar</a></li>'+
'<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_estadia+'\')">Eliminar</a></li>'+
'<li><a data-toggle="modal" data-target="#VerDetalle" class="waves-effect waves-block" onClick="VerDetalle(\''+row.cod_estadia+'\')">Ver detalles</a></li>'+
'</ul>'+
'</div>'
}
}
],
"order":[[0, "asc"]],
'language':español
});

editClient = function(cod_estadia, cod_cliente, cod_empleado, fecha_reserva, fecha_ingreso, fecha_salida){
$('#fecha_ingreso').val(cod_estadia);
$('#fecha_reservacion').val(cod_cliente);
enviar = function(){
$.post(base_url+"reservaciones/actualizar",
{
cod_estadia:cod_estadia,
fecha_ingreso:$('#fecha_ingreso').val(),
fecha_reservacion:$('#fecha_reservacion').val(),
},
function(data){
if (data == 1){
alert('Guardado');
$('#cerrar_modal').click();

location.reload();
}
alert(data);
});
}
};
deldat = function(cod_cargo){
$.post(base_url+'cargo/eliminar',
{
cod_cargo:cod_cargo,
},
function(data){
if (data == 1){
alert('Eliminado');
location.reload();
}
});
};
insertdat = function(cod_cargo, area, descripcion, cargo){
$.post(base_url+'cargo/guardar',
{
cod_cargo:$('#cod_cargo_c').val(),
area:$('#area_c').val(),
descripcion:$('#descripcion_c').val(),
cargo:$('#cargo_c').val(),
},
function(data){
if(data == 1){
alert('El registro fue almacenado correctamente');
location.reload();
}
});
};

var detalle_body = document.getElementById('detalle_body');
var body_hab = document.getElementById('body_hab');
var nom_client = document.getElementById('nom_client');
var app_client = document.getElementById('app_client');
var empleado_div = document.getElementById('empleado_div');
var fecha_div = document.getElementById('fecha_div');
var tipo_r_div = document.getElementById('tipo_r_div');
var estadia_div = document.getElementById('estadia_div');

$('#realizar_venta').click(function(){
$('#nro_res').val(parseInt(num_reservacion)+1);
$('#cliente').on('keyup',function(){
if ($(this).val().length == 8){
$.post(base_url+'reservaciones/comprobar_cliente',
{
cliente:$('#cliente').val(),
},
function(data){
if (data == 'No existe'){
nom_client.setAttribute("style","display:block");
app_client.setAttribute("style","display:block");
nom_client.setAttribute("class","col-md-3");
app_client.setAttribute("class","col-md-3");
empleado_div.setAttribute("class","col-md-3 col-md-offset-2");
fecha_div.setAttribute("class","col-md-2");
tipo_r_div.setAttribute("class","col-md-3");
var html = '<div class="form-group form-float">'
+'<div class="form-line focused">'
+'<label class="form-label">Nombres</label>'
+'<input type="text" value="" name="nombres" id="nombres" class="form-control">'
+'</div>'
+'</div>';
nom_client.innerHTML = html;
html = '<div class="form-group form-float">'
+'<div class="form-line focused">'
+'<label class="form-label">Apellido Paterno</label>'
+'<input type="text" value="" name="apellido_p" id="apellido_p" class="form-control">'
+'</div>'
+'</div>';
app_client.innerHTML = html;

}else{
nom_client.setAttribute("style","display:none");
app_client.setAttribute("style","display:none");
empleado_div.setAttribute("class","col-md-3");
fecha_div.setAttribute("class","col-md-3");
tipo_r_div.setAttribute("class","col-md-3 col-md-offset-3 text-center");
var datos = eval(data);
var clnt = '';
datos.forEach(function(i){
clnt = 'El cliente es: '+i['nombres']+' '+i['apellido_paterno']+' '+i['apellido_materno'];
})
alert(clnt);
$('#cliente').blur();
}
})
}
if ($(this).val().length > 8){
alert('Se exbedió el número máximo de caracteres para este campo');
}
})
$('#empleado').val(empleado);
$('#fecha_r').val(output);
$('#despues').click(function(){
$('#fecha_estadia').val('');
$('#fecha_estadia').focus();
})

/*$('#especificar').click(function(){
detalle_body.setAttribute('style','display:block');
$('#detalle_body').html('');
var html = '';
seleccionadodh.length = 0;
seleccionadoh.forEach(function(a){
html = '';
html+='<div class="col-md-12 text-left"><h4>Habitación '+a+'</h4>';
html+='<div class="col-md-12 text-left" id="'+a+'"></div>';
html+='<br /><div class="col-md-12" id="deta'+a+'"></div></div>';
$('#detalle_body').append(html);
$.post(base_url+'reservaciones/detalle_habitacion',
{
cod_habitacion:a,
},
function(data){
var html = '';
datos = eval(data);
var objeto={};
for (i = 0; i < datos.length; i++){
html+= '<p><strong>Tipo de habitación: </strong>'+datos[i]['tipo_habitacion']+'</p>';
html+= '<p><strong>Piso: </strong>'+datos[i]['piso']+'</p>';
html+= '<p><strong>Capacidad máxima: </strong>'+datos[i]['max_h']+'</p>';
$('#'+a+'').append(html);
objeto.cod_habitacion = a;
objeto.tipo_habitacion = datos[i]['tipo_habitacion'];
objeto.piso = datos[i]['piso'];
objeto.max_h = datos[i]['max_h'];
seleccionadodh.push(objeto);
var html = '';
for (j=0;j<datos[i]['max_h'];j++){
html += '<div class="col-md-3">';
html += '<div class="form-group form-float">'+
'<div class="form-line focused">';
html += '<label class="form-label">Huésped '+parseInt(j+1)+':</label>';
html += '<input class="form-control" type="number" id="'+a+j+'" />';
html += '</div></div></div>';
}
$('#deta'+a+'').html(html);
}
})
})
})
/*$('#no_especificar').click(function(){
detalle_body.setAttribute('style','display:none');
})

$.post(base_url+'reservaciones/room_list',
{
},
function(data){
var html = '';
var datos = eval(data);
for (i = 0; i<datos.length; i++){
html+='<tr>'+
'<td>'+datos[i]['cod_habitacion']+'</td>'+
'<td>'+datos[i]['tipo_habitacion']+'</td>'+
'<td>'+datos[i]['piso']+'</td>'+
'<td>'+datos[i]['precio']+'</td>'+
'<td><input type="checkbox" name="listado_h" value="'+datos[i]['cod_habitacion']+'" id="h'+datos[i]['cod_habitacion']+'"><label for="h'+datos[i]['cod_habitacion']+'"></label></td>'+
'</tr>';
}
body_hab.innerHTML = html;
seleccionadop.forEach(function(i){
$('#h'+i+'').prop('checked', true);
});

})
$('#buscar_h').keyup(function(){
$.post(base_url+'reservaciones/room_list',
{
hab:$('#buscar_h').val(),
},
function(data){
console.log($('#buscar_h').val());
var html = '';
var datos = eval(data);
for (i = 0; i<datos.length; i++){
html+='<tr>'+
'<td>'+datos[i]['cod_habitacion']+'</td>'+
'<td>'+datos[i]['tipo_habitacion']+'</td>'+
'<td>'+datos[i]['piso']+'</td>'+
'<td>'+datos[i]['precio']+'</td>'+
'<td><input type="checkbox" name="listado_h" value="'+datos[i]['cod_habitacion']+'" id="h'+datos[i]['cod_habitacion']+'"><label for="h'+datos[i]['cod_habitacion']+'"></label></td>'+
'</tr>';
}
body_hab.innerHTML = html;
seleccionadoh.forEach(function(i){
$('#h'+i+'').prop('checked', true);
});

$('input[type=checkbox]').click(function(){
var elemento = $(this).val();
if (seleccionadoh.includes(elemento)){
var pos = seleccionadoh.indexOf(elemento);
seleccionadoh.splice(pos,1);
}
$('input[name=listado_h]:checked').each(function(){
if (seleccionadoh.includes($(this).val()) == false){
seleccionadoh.push($(this).val());
}
})
})
})
})
})

$('a[href="#finish"]').click(function(){
$.post(base_url+'pagos/guardar_tipo_transaccion',
{
cod_tipo_transaccion:$('#contado').val(),
},
function(data){
if (data == 1){
alert('Correcto')
}else{
alert('alv')
}
})
})

})

var Detalle=document.getElementById("Detalle");

VerDetalle=function(data1){
$.post(base_url+'reservaciones/consultar',
{
cod_estadia:data1,
},
function(data2){
var datos = eval(data2);
datos.forEach(function(a){
html = '';
html+='<div class="col-md-12 text-left"><h4>Huésped '+a+'</h4>';
html+='<div class="col-md-12 text-left" id="'+a+'"></div>';
html+='<br /><div class="col-md-12" id="deta'+a+'"></div></div>';
$('#detalle_body').append(html);
$.post(base_url+'reservaciones/consultar',
{
cod_estadia:a,
},
function(data){
var html = '';
datos = eval(data);
var objeto={};
for (i = 0; i < datos.length; i++){
html+= '<p><strong>Código: </strong>'+datos[i]['cod_estadia']+'</p>';
html+= '<p><strong>Empleado (DNI): </strong>'+datos[i]['cod_empleado']+'</p>';
html+= '<p><strong>Cliente (DNI): </strong>'+datos[i]['cod_cliente']+'</p>';
html+= '<p><strong>Fecha de reservación: </strong>'+datos[i]['fecha_reserva']+'</p>';
html+= '<p><strong>Fecha de ingreso: </strong>'+datos[i]['fecha_ingreso']+'</p>';
html+= '<p><strong>Fecha de salida: </strong>'+datos[i]['fecha_salida']+'</p>';
$('#Detalle').append(html);
var html = '';
console.log(a);
$.post(base_url+'reservaciones/consultar_habitacion_estadia',
{
cod_estadia1:datos[i]['cod_estadia'],
},
function(data1){
var html = '';
datos = eval(data1);
var objeto={};
for (i = 0; i < datos.length; i++){
html+= '<p><strong>DNI: </strong>'+datos[i]['cod_persona']+'</p>';
html+= '<p><strong>Nombres: </strong>'+datos[i]['nombres']+'</p>';
html+= '<p><strong>Apellido paterno: </strong>'+datos[i]['apellido_paterno']+'</p>';
html+= '<p><strong>Apellido materno: </strong>'+datos[i]['apellido_materno']+'</p>';
html+= '<p><strong>Nº de habitación: </strong>'+datos[i]['cod_habitacion']+'</p>';
html+= '<p><strong>Fecha de ingreso: </strong>'+datos[i]['fecha_ingreso']+'</p>';
html+= '<p><strong>Fecha de salida: </strong>'+datos[i]['fecha_salida']+'</p>';
$('#habitacion_estadia').html(html);


}
})
}
})
})
}
)
}
*/
