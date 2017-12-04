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
    var seleccionados = new Array();
    var seleccionadoh = new Array();
    var seleccionadoe = new Array();
    var producto_precio = new Array();
    var servicio_precio = new Array();
    var cliente = new Array();
    var valor_p = new Array();
    var seleccionadop = new Array();
    $('#dt_table').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url": base_url+"ventas/consultar",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_venta'},
            {data: 'cod_pc'},
            {data: 'cod_pe'},
            {data: 'tipo_transaccion'},
            {data: 'oferta'},
            {data: 'fecha_venta'},
            {"orderable":true,
            render:function(data, type, row){
                return '<div class="btn-group" role="group">'+
                '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
                'Acciones <span class="caret"></span>'+
                '</button>'+
                '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
                '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_venta+'\',\''+row.cod_pc+'\',\''+row.nombres_c+'\',\''+row.apellido_p_c+'\',\''+row.apellido_m_c+'\',\''+row.cod_pe+'\',\''+row.nombres_e+'\',\''+row.apellido_p_e+'\',\''+row.apellido_m_e+'\',\''+row.tipo_transaccion+'\',\''+row.oferta+'\',\''+row.fecha_venta+'\');">Editar</a></li>'+
                '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_venta+'\')">Eliminar</a></li>'+
                '</ul>'+
                '</div>'
            }
        }
    ],
    "order":[[0, "asc"]],
    'language':español
});


var body_srv = document.getElementById('body_srv');
var body_pro = document.getElementById('body_pro');
var buscar_servicio_div = document.getElementById('buscar_servicio_div');
var buscar_estadias_div = document.getElementById('buscar_estadias_div');
var tabla_servicio_div = document.getElementById('tabla_servicio_div');
var tabla_estadias_div = document.getElementById('tabla_estadias_div');
var nota_servicio_div = document.getElementById('nota_servicio_div');
var nota_estadias_div = document.getElementById('nota_estadias_div');
editClient = function(cod_cargo, area, descripcion, cargo){
    $('#cod_cargo').val(cod_cargo);
    $("#area option:contains('"+area+"')").attr("selected",true);
    $('#descripcion').val(descripcion);
    $('#cargo').val(cargo);
    enviar = function(){
        $.post(base_url+"cargo/actualizar",
        {
            cod_cargo:$('#cod_cargo').val(),
            area:$('#area').val(),
            descripcion:$('#descripcion').val(),
            cargo:$('#cargo').val(),
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
var nom_client = document.getElementById('nom_client');
var app_client = document.getElementById('app_client');
$('#realizar_venta').click(function(){
    $('#nro_venta').val(parseInt(num_venta)+1);
    $('#cliente').on('keyup',function(){
        if ($(this).val().length == 8){
            $.post(base_url+'ventas/comprobar_cliente',
            {
                cliente:$('#cliente').val(),
            },
            function(data){
                alert(data);
                if (data == 'No existe'){
                    nom_client.setAttribute("style","display:block");
                    app_client.setAttribute("style","display:block");
                    nom_client.setAttribute("class","col-md-4");
                    app_client.setAttribute("class","col-md-4");
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

                }else if (data=='Existe'){
                    alert('xD');
                    nom_client.setAttribute("style","display:none");
                    app_client.setAttribute("style","display:none");
                }
            })
        }
        if ($(this).val().length > 8){
            alert('Se exedió el número máximo de caracteres para este campo');
        }
    })
    $('#empleado').val(empleado);
    $('#fecha').val(output);
    //tabla de seleccion de productos
    $.post(base_url+'ventas/productos_slct',
    {
        buscar:$('#buscar').val(),
    },
    function(data){
        var html = '';
        var datos = eval(data);
        for (i = 0; i<datos.length; i++){
            html+='<tr>'+
                    '<td>'+datos[i]['cod_producto']+'</td>'+
                    '<td>'+datos[i]['producto']+'</td>'+
                    '<td>'+datos[i]['marca']+'</td>'+
                    '<td>'+datos[i]['tipo_producto']+'</td>'+
                    '<td>'+datos[i]['precio']+'</td>'+
                    '<td>'+datos[i]['precio']+'</td>'+
                    '<td><input type="checkbox" onClick="precio_p(\''+datos[i]['precio']+'\')" name="listado_p" value="'+datos[i]['cod_producto']+'" id="p'+datos[i]['cod_producto']+'"><label for="p'+datos[i]['cod_producto']+'"></label></td>'+
                    '</tr>';
        }
        body_pro.innerHTML = html;
        seleccionadop.forEach(function(i){
            $('#p'+i+'').prop('checked', true);
        });
        $('input[type=checkbox]').click(function(){
            var elemento = $(this).val();
            if (seleccionadop.includes(elemento)){
                var pos = seleccionadop.indexOf(elemento);
                cantidad(pos);
                seleccionadop.splice(pos,1);
                producto_precio.splice(pos,1);
            }
            //console.log($(this).val());
            $('input[name=listado_p]:checked').each(function(){
                if (seleccionadop.includes($(this).val()) == false){
                seleccionadop.push($(this).val());
                cantidad(1);
                }
            })
            console.log(seleccionadop);
        })
    })
//detector de teclas en buscador
$('#buscar').keyup(function(){
    $.post(base_url+'ventas/productos_slct',
    {
        buscar:$('#buscar').val(),
    },
    function(data){
        var html = '';
        var datos = eval(data);
        for (i = 0; i<datos.length; i++){
            html+='<tr>'+
                    '<td>'+datos[i]['cod_producto']+'</td>'+
                    '<td>'+datos[i]['producto']+'</td>'+
                    '<td>'+datos[i]['marca']+'</td>'+
                    '<td>'+datos[i]['tipo_producto']+'</td>'+
                    '<td>'+datos[i]['precio']+'</td>'+
                    '<td>'+datos[i]['precio']+'</td>'+
                    '<td><input type="checkbox" name="listado_p" onClick="precio_p(\''+datos[i]['precio']+'\')" value="'+datos[i]['cod_producto']+'" id="p'+datos[i]['cod_producto']+'"><label for="p'+datos[i]['cod_producto']+'"></label></td>'+
                    '</tr>';
        }
        body_pro.innerHTML = html;
        seleccionadop.forEach(function(i){
            $('#p'+i+'').prop('checked', true);
        });
        $('input[type=checkbox]').click(function(){
            var elemento = $(this).val();
            if (seleccionadop.includes(elemento)){
                var pos = seleccionadop.indexOf(elemento);
                cantidad(pos);
                seleccionadop.splice(pos,1);
                producto_precio.splice(pos,1);
            }
            //console.log($(this).val());
            $('input[name=listado_p]:checked').each(function(){
                if (seleccionadop.includes($(this).val()) == false){
                seleccionadop.push($(this).val());
                cantidad(1);
                }
            })
            console.log(seleccionadop);
        })
    })
})
    //tabla de seleccion de servicios
    $('a[href="#next"]').click(function(){
        $.post(base_url+'ventas/servicios_slct',
        {
          cliente:$('#cliente_input').val(),
        },
        function(data){
            console.log(data);
            if (data != ''){
                buscar_servicio_div.setAttribute('style','display:block');
                tabla_servicio_div.setAttribute('style','display:block');
                var html = '';
                var datos = eval(data);
                for (i = 0; i<datos.length; i++){
                    html+='<tr>'+
                            '<td>'+datos[i]['cod_servicio']+'</td>'+
                            '<td>'+datos[i]['servicio']+'</td>'+
                            '<td>'+datos[i]['precio']+'</td>'+
                            '<td><input type="checkbox" name="listado_s" onClick="precio_s(\''+datos[i]['precio']+'\')" value="'+datos[i]['cod_servicio']+'" id="s'+datos[i]['cod_servicio']+'"><label for="s'+datos[i]['cod_servicio']+'"></label></td>'+
                            '</tr>';
                }
                $('#body_srv').html(html);
                seleccionados.forEach(function(i){
                    $('#s'+i+'').prop('checked', true);
                });
                $('input[type=checkbox]').click(function(){
                    var elemento = $(this).val();
                    if (seleccionados.includes(elemento)){
                        var pos = seleccionados.indexOf(elemento);
                        seleccionados.splice(pos,1);
                        seleccionadoh.splice(pos,1);
                        servicio_precio.splice(pos,1);
                    }
                    //console.log($(this).val());
                    $('input[name=listado_s]:checked').each(function(){
                        var elemento = $(this).val();
                        if (seleccionados.includes($(this).val()) == false){
                        seleccionados.push($(this).val());
                        //$('#seleccionar_estadia').modal();
                            $.post(base_url+'habitacion/habitaciones_reservadas',
                            {
                                cod_cliente:$('#cliente_input').val(),
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
                            $("#habitaciones_list").modal();
                        }
                    })
                    console.log(seleccionadoe);
                })
            }else{
                buscar_servicio_div.setAttribute('style','display:none');
                tabla_servicio_div.setAttribute('style','display:none');
                var html = '<br /><br /><div class="col-md-6 col-md-offset-3 text-center"><p>Actualmentel, el cliente no cuesdasdasnta con estadías abiertassss.</p></div>';
                $('#nota_servicio_div').html(html);

            }
        })
        $.post(base_url+'ventas/estadias_slct',
        {
          cliente_estadia:$('#cliente_input').val(),
        },
        function(data){
            if (data != ''){
                var html = '';
                var datos = eval(data);
                for (i = 0; i<datos.length; i++){
                    html+='<tr>'+
                            '<td>'+datos[i]['cod_estadia']+'</td>'+
                            '<td>'+datos[i]['fecha_reserva']+'</td>'+
                            '<td>'+datos[i]['fecha_ingreso']+'</td>'+
                            '<td>'+datos[i]['fecha_salida']+'</td>'+
                            '<td>'+(Date(datos[i]['fecha_ingreso'])-Date(output))+'</td>'+
                            '<td><input type="checkbox" name="listado_e" value="'+datos[i]['cod_estadia']+'" id="e'+datos[i]['cod_estadia']+'"><label for="e'+datos[i]['cod_estadia']+'"></label></td>'+
                            '</tr>';
                }
                $('#body_est').html(html);
                seleccionadoe.forEach(function(i){
                    $('#e'+i+'').prop('checked', true);
                });
                $('input[type=checkbox]').click(function(){
                    var elemento = $(this).val();
                    if (seleccionadoe.includes(elemento)){
                        var pos = seleccionadoe.indexOf(elemento);
                        seleccionadoe.splice(pos,1);
                    }
                    //console.log($(this).val());
                    $('input[name=listado_e]:checked').each(function(){
                        if (seleccionadoe.includes($(this).val()) == false){
                        seleccionadoe.push($(this).val());
                        }
                    })
                    $('input[name=listado_e]:checked').each(function(){
                        var cod_est = $(this).val();
                    })
                    console.log(seleccionadoe);
                })
            }else{
                buscar_servicio_div.setAttribute('style','display:none');
                tabla_servicio_div.setAttribute('style','display:none');
                var html = '<br /><br /><div class="col-md-6 col-md-offset-3 text-center"><p>Actualmentel, el cliente no cuenta con estadías abiertas.</p></div>';
                $('#nota_estadias_div').html(html);

            }
        })
    $('#buscar_s').keyup(function(){
        $.post(base_url+'ventas/servicios_slct',
        {
            buscar_s:$('#buscar_s').val(),
        },
        function(data){
            var html = '';
            var datos = eval(data);
            for (i = 0; i<datos.length; i++){
                html+='<tr>'+
                        '<td>'+datos[i]['cod_servicio']+'</td>'+
                        '<td>'+datos[i]['servicio']+'</td>'+
                        '<td>'+datos[i]['precio']+'</td>'+
                        '<td><input type="checkbox" name="listado_s" onClick="precio_s(\''+datos[i]['precio']+'\')" value="'+datos[i]['cod_servicio']+'" id="s'+datos[i]['cod_servicio']+'"><label for="s'+datos[i]['cod_servicio']+'"></label></td>'+
                        '</tr>';
            }
            body_srv.innerHTML = html;
            seleccionados.forEach(function(i){
                $('#s'+i+'').prop('checked', true);
            });
            $('input[type=checkbox]').click(function(){
                var elemento = $(this).val();
                if (seleccionados.includes(elemento)){
                    var pos = seleccionados.indexOf(elemento);
                    seleccionados.splice(pos,1);
                    seleccionadoh.splice(pos,1);
                    servicio_precio.splice(pos,1);
                }
                //console.log($(this).val());
                $('input[name=listado_s]:checked').each(function(){
                    if (seleccionados.includes($(this).val()) == false){
                    //$('#seleccionar_estadia').modal();
                    seleccionados.push($(this).val());
                    }
                })
                $('input[name=listado_s]:checked').each(function(){
                    var cod_serv = $(this).val();
                    $.post(base_url+'habitacion/habitaciones_reservadas',
                    {
                    },
                    function(data){
                        var html = '';
                        var codigo = '';
                        var datos = eval(data);
                        if (datos.length > 0){
                            datos.forEach(function(i){
                                if (codigo != i['cod_estadia']){
                                    html+='<div class="col-md-12 text-center"><div class="row clearfix"><h4>Estadía nro: '+i['cod_estadia']+'</h4></div></div>';
                                }
                                codigo = i['cod_estadia'];
                                html+='<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">'+
                                    '<a name="seleccionables" onClick="insertar(\''+i['cod_habitacion']+'\',\''+i['cod_estadia']+'\');" href="#seleccionables">'+
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
                    $("#habitaciones_list").modal();
                })
                console.log(seleccionados);
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

$('a[href="#finish"]').click(function(){
    $.post(base_url+'ventas/guardar_venta',
    {
        fecha:$('#fecha').val(),
        nro_venta:$('#nro_venta').val(),
        cliente_venta:$('#cliente_input').val(),
        empleado:$('#empleado').val(),
        productos:seleccionadop,
        producto_precio:producto_precio,
        cantidad:valor_p,
        servicios:seleccionados,
        servicio_precio:servicio_precio,
        habitaciones:seleccionadoh,
        estadias:seleccionadoe,
    },
    function(){
        if (data == 1){
            console.log('CORRECTO');
        }else{
            console.log('INCORRECTO');
        }
    })
})

cantidad = function(arg1){
    if (arg1 == 1){
        var cantidad = prompt('Ingrese la cantidad requerida:');
        if (cantidad != null){
            valor_p.push(cantidad);
        }
    }else{
        valor_p.splice(arg1,1);
    }
    console.log(valor_p)
}
precio_p = function(arg1){
    if (producto_precio.includes(arg1) == false){
        producto_precio.push(arg1);
    }
    console.log(producto_precio)
}
precio_s = function(arg1){
    if (servicio_precio.includes(arg1) == false){
        servicio_precio.push(arg1);
    }
    console.log(servicio_precio)
}
insertar = function(data, data1){
    console.log(data);
    seleccionadoh.push(data);
    seleccionadoe.push(data1);
    console.log(seleccionadoh);
    console.log(seleccionadoe);
    $("#habitaciones_list").modal('hide');
}
});
