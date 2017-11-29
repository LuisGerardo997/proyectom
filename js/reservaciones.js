$(document).on('ready',function(){
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var output = d.getFullYear() + '/' +
    (month<10 ? '0' : '') + month + '/' +
    (day<10 ? '0' : '') + day;
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY/MM/DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });
    var seleccionadoh = new Array();
    var seleccionadodh = new Array();
    var huespedes = new Array();
    var objeto = new Object();
    $('#dt_table').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url": base_url+"reservaciones/consultar",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_estadia'},
            {data: 'cod_cliente'},
            {data: 'cod_empleado'},
            {data: 'fecha_reserva'},
            {data: 'fecha_ingreso'},
            {data: 'fecha_salida'},
            {"orderable":true,
            render:function(data, type, row){
                return '<div class="btn-group" role="group">'+
                '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
                'Acciones <span class="caret"></span>'+
                '</button>'+
                '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
                '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_estadia+'\',\''+row.cod_cliente+'\',\''+row.cod_empleado+'\',\''+row.fecha_reserva+'\',\''+row.fecha_ingreso+'\',\''+row.fecha_salida+'\');">Editar</a></li>'+
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
var apm_client = document.getElementById('apm_client');
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
                    apm_client.setAttribute("style","display:block");
                    nom_client.setAttribute("class","col-md-3");
                    app_client.setAttribute("class","col-md-3");
                    apm_client.setAttribute("class","col-md-3");
                    //empleado_div.setAttribute("class","col-md-3 col-md-offset-2");
                    //fecha_div.setAttribute("class","col-md-2");
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
                    html = '<div class="form-group form-float">'
                    +'<div class="form-line focused">'
                    +'<label class="form-label">Apellido Paterno</label>'
                    +'<input type="text" value="" name="apellido_m" id="apellido_m" class="form-control">'
                    +'</div>'
                    +'</div>';
                    apm_client.innerHTML = html;
                    apm_client.setAttribute("class","col-md-3 col-md-offset-2");

                }else{
                    nom_client.setAttribute("style","display:none");
                    app_client.setAttribute("style","display:none");
                    apm_client.setAttribute("style","display:none");
                    //apellido_m.setAttribute("style","display:none");
                    //empleado_div.setAttribute("class","col-md-3");
                    //fecha_div.setAttribute("class","col-md-3");
                    tipo_r_div.setAttribute("class","col-md-3");
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
            alert('Se exedió el número máximo de caracteres para este campo');
        }
    })
    $('#empleado').val(empleado);
    $('#fecha_r').val(output);
    $('#despues').click(function(){
        $('#fecha_estadia').val('');
        $('#fecha_estadia').focus();
    })
    $('#ahora').click(function(){
        estadia_div.setAttribute("style","display:block");
        $('#fecha_estadia').val(output);
    })

    $('#especificar').click(function(){
        detalle_body.setAttribute('style','display:block');
        $('#detalle_body').html('');
        var html = '';
        seleccionadodh.length = 0;
        //console.log(seleccionadoh);
        seleccionadoh.forEach(function(a){
            html = '';
            //console.log('valor de a: '+a+'');
            html+='<div class="col-md-12 text-left"><h4>Habitacion '+a+'</h4>';
            html+='<div  class="col-md-12 text-left" id="'+a+'"></div>';
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
                    html+= '<p><strong>Capacidad: </strong>'+datos[i]['max_h']+'</p>';
                    $('#'+a+'').append(html);
                    objeto.cod_habitacion = a;
                    objeto.tipo_habitacion = datos[i]['tipo_habitacion'];
                    objeto.piso = datos[i]['piso'];
                    objeto.max_h = datos[i]['max_h'];
                    seleccionadodh.push(objeto);
                    var html = '';
                    for (j=0;j<datos[i]['max_h'];j++){
                        var indice = a+j;
                        html += '<div class="col-md-12"><div class="col-md-3">';
                        html += '<div class="form-group form-float">'+
                                '<div class="form-line focused">';
                        html += '<label class="form-label">Huésped '+parseInt(j+1)+':</label>';
                        html += '<input class="form-control" onBlur="comprobar('+indice+');" type="number" id="'+a+j+'" />';
                        html += '</div></div></div><div id="huesdiv'+a+j+'"></div></div>';
                    }
                    $('#deta'+a+'').html(html);
                }

            })
            //console.log('xDDD');
            //html+= '<p><strong>Tipo de habitación: </strong>'+seleccionadodh['0']['tipo_habitacion']+'</p>';
            //html+= '<p><strong>Piso: </strong>'+seleccionadodh['0']['piso']+'</p>';
            //html += '</div>';
        })
        //console.log(html);
        //alert(html);
    })
    $('#no_especificar').click(function(){
        detalle_body.setAttribute('style','display:none');
    })

    //#############################################################
    // listado de habitaciones

    $.post(base_url+'reservaciones/room_list',
    {
    },
    function(data){
        var html = '';
        var datos = eval(data);
        //console.log(datos);
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
            //console.log($(this).val());
            $('input[name=listado_h]:checked').each(function(){
                if (seleccionadoh.includes($(this).val()) == false){
                seleccionadoh.push($(this).val());
                }
            })
            //console.log(seleccionadoh);
        })
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
//Fin listado
//#############################################
    $('a[href="#finish"]').click(function(){

        $.post(base_url+'reservaciones/registrar_estadia',
        {
            nro_res:$('#nro_res').val(),
            cliente:$('#cliente').val(),
            empleado:$('#empleado').val(),
            fecha_r:$('#fecha_r').val(),
            tipo_r:$('#tipo_r').val(),
            fecha_estadia:$('#fecha_estadia').val(),
            lista_hab:seleccionadoh,
            //huespedes:huespedes,
        },
        function(data){
            console.log(data);
            console.log(huespedes);
            //location.reload();
        })
        seleccionadoh.forEach(function(e){
            $.post(base_url+'reservaciones/detalle_habitacion',
        {
            cod_habitacion:e,
        },
        function(data){
            var datos = eval(data);
            //console.log(datos);
            for (var i=0; i<datos.length; i++){
                for(var j = 0; j<datos[i]['max_h']; j++){
                        $('#'+e+j+'').val();
                        $.post(base_url+'reservaciones/registrar_detalle_estadia',
                            {
                                nro_res:$('#nro_res').val(),
                                cliente:$('#cliente').val(),
                                huesped:$('#'+e+j+'').val(),
                                huesped_nombre:$('#nombres'+e+j+'').val(),
                                huesped_apellido_paterno:$('#apellido_paterno'+e+j+'').val(),
                                huesped_apellido_materno:$('#apellido_materno'+e+j+'').val(),
                                fecha_r:$('#fecha_r').val(),
                                tipo_r:$('#tipo_r').val(),
                                fecha_estadia:$('#fecha_estadia').val(),
                                habitacion:e,
                            },
                            function(data){
                                console.log(data);
                                console.log(huespedes);
                                location.reload();
                            })
                        }
                    }
            })
        })
        console.log(huespedes);
        console.log(seleccionadoh);
        console.log('holitas');
    })
})
comprobar = function(data1){
    $.post(base_url+'reservaciones/existencia',
    {
        cod_persona:$('#'+data1+'').val(),
    },
    function(data){
        $('#huesdiv'+data1+'').html('');
        if (data == 0){
            var html='';
            html += '<div class="col-md-3">';
            html += '<div class="form-group form-float">'+
                    '<div class="form-line focused">';
            html += '<label class="form-label">Nombres:</label>';
            html += '<input class="form-control" type="text" id="nombres'+data1+'" />';
            html += '</div></div></div>';

            html += '<div class="col-md-3">';
            html += '<div class="form-group form-float">'+
                    '<div class="form-line focused">';
            html += '<label class="form-label">Apellido Paterno:</label>';
            html += '<input class="form-control" type="text" id="apellido_paterno'+data1+'" />';
            html += '</div></div></div>';

            html += '<div class="col-md-3">';
            html += '<div class="form-group form-float">'+
                    '<div class="form-line focused">';
            html += '<label class="form-label">Apellido Materno:</label>';
            html += '<input class="form-control" type="text" id="apellido_materno'+data1+'" />';
            html += '</div></div></div>';
            $('#huesdiv'+data1+'').append(html);
        }else{
            $('#huesdiv'+data1+'').html('');
        }
    })
}
VerDetalle=function(data1){
    /*$.post(base_url+'reservaciones/consultar',
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
                $('#detalle_body').append(html);*/
                $.post(base_url+'reservaciones/consultar_estadia',
                {
                    cod_estadia:data1,
                },
                function(data){
                    var html = '';
                    datos = eval(data);
                    var objeto={};
                    for (i = 0; i < datos.length; i++){
                        html+= '<div class="col-md-4"><strong>Código de estadía: </strong>'+datos[i]['cod_estadia']+'<br /><br />';
                        html+= '<strong>Empleado (DNI): </strong>'+datos[i]['cod_empleado']+'<br /><br />';
                        html+= '<strong>Cliente (DNI): </strong>'+datos[i]['cod_persona']+'</div><br />';
                        html+= '<div class="col-md-4"><strong>Nombres: </strong>'+datos[i]['nombres']+'</div>';
                        html+= '<div class="col-md-4"><strong>Apellido paterno: </strong>'+datos[i]['apellido_paterno']+'</div>';
                        html+= '<div class="col-md-4"><strong>Apellido materno: </strong>'+datos[i]['apellido_materno']+'</div>';
                        html+= '<div class="col-md-4"><strong>Fecha de reservación: </strong>'+datos[i]['fecha_reserva']+'</div>';
                        html+= '<div class="col-md-4"><strong>Fecha de ingreso: </strong>'+datos[i]['fecha_ingreso']+'</div>';
                        html+= '<div class="col-md-4"><strong>Fecha de salida: </strong>'+datos[i]['fecha_salida']+'</div>';
                        $('#Detalle').append(html);
                        var html = '';

                        /*for (j=0;j<datos[i]['max_h'];j++){
                            html += '<div class="col-md-3">';
                            html += '<div class="form-group form-float">'+
                                    '<div class="form-line focused">';
                            html += '<label class="form-label">Huésped '+parseInt(j+1)+':</label>';
                            html += '<input class="form-control" type="number" id="'+a+j+'" />';
                            html += '</div></div></div>';
                        }*/
                        //$('#deta'+a+'').html(html);
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
        }
})
