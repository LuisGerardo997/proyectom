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
                    '<td><input type="checkbox" name="listado_p" value="'+datos[i]['cod_producto']+'" id="p'+datos[i]['cod_producto']+'"><label for="p'+datos[i]['cod_producto']+'"></label></td>'+
                    '</tr>';
        }
        body_pro.innerHTML = html;
        seleccionadop.forEach(function(i){
            $('#p'+i+'').prop('checked', true);
        });
    })
    //tabla de seleccion de servicios
    $.post(base_url+'ventas/servicios_slct',
    {
    },
    function(data){
        var html = '';
        var datos = eval(data);
        for (i = 0; i<datos.length; i++){
            html+='<tr>'+
                    '<td>'+datos[i]['cod_servicio']+'</td>'+
                    '<td>'+datos[i]['servicio']+'</td>'+
                    '<td>'+datos[i]['precio']+'</td>'+
                    '<td><input type="checkbox" name="listado_s" value="'+datos[i]['cod_servicio']+'" id="s'+datos[i]['cod_servicio']+'"><label for="s'+datos[i]['cod_servicio']+'"></label></td>'+
                    '</tr>';
        }
        body_srv.innerHTML = html;
        seleccionados.forEach(function(i){
            $('#s'+i+'').prop('checked', true);
        });
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
                        '<td><input type="checkbox" name="listado_p" value="'+datos[i]['cod_producto']+'" id="p'+datos[i]['cod_producto']+'"><label for="'+datos[i]['cod_producto']+'"></label></td>'+
                        '</tr>';
            }
            body_pro.innerHTML = html;
            seleccionadop.forEach(function(i){
                $('#p'+i+'').prop('checked', true);
            });
        })
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
                        '<td><input type="checkbox" name="listado_s" value="'+datos[i]['cod_servicio']+'" id="s'+datos[i]['cod_servicio']+'"><label for="s'+datos[i]['cod_servicio']+'"></label></td>'+
                        '</tr>';
            }
            body_srv.innerHTML = html;
            seleccionados.forEach(function(i){
                $('#s'+i+'').prop('checked', true);
            });
        })
    })
})
var seleccion_total = new Array();
var html_p = '';
var det_body = document.getElementById('det_body');
var pie_dt = document.getElementById('pie_dt');
var detalle = document.getElementById('detalle');
var total = 0;
detalle.setAttribute('style','display:none');
$('#agregar').click(function(){
    seleccionados.length = 0;
    seleccionadop.length = 0;
    $('input[type=checkbox]').click(function(){
        $('input[name=listado_s]:checked').each(function(){
            if (seleccionados.includes($(this).val()) == false){
            seleccionados.push($(this).val());
            }
        })
        if ($('input[name=listado_s]:unchecked'),prop('checked',false)){
            console.log($(this).val());
        }
        $('input[name=listado_p]:checked').each(function(){
            if (seleccionadop.includes($(this).val()) == false){
            seleccionadop.push($(this).val());
            }
        })

        detalle.setAttribute('style','display:block');
        var html = '';
        var total_html = '';
        $('#det_body').html(html);
        pie_dt.innerHTML = total_html;


        for(i=0; i<seleccionados.length; i++){
                $.post(base_url+'ventas/get_det',
                {
                    cod:seleccionados[i],
                },
                function(data){
                    var html='';
                    datos = eval(data);
                    for (i=0;i<datos.length;i++){
                        html +='<tr>'+
                                '<td>1</td>'+
                                '<td>'+datos[i]['servicio']+'</td>'+
                                '<td>'+datos[i]['precio']+'</td>'+
                                '<td>'+datos[i]['precio']+'</td>'+
                                '</tr>';
                        total = total+parseInt(datos[i]['precio']);
                    }
                    total_html = '<tr>'+
                                    '<th></th>'+
                                    '<th></th>'+
                                    '<th>TOTAL</th>'+
                                    '<th>'+total+'</th>'+
                                    '</tr>';
                    recopilar(html);
                })

        }
        seleccion_total.length = 0;
        function recopilar(data){
            if (seleccion_total.includes(data)==false){
                seleccion_total.push(data);
            }
            alert(seleccionados);
        }
        for(i=0; i<seleccionadop.length; i++){
                $.post(base_url+'ventas/get_det_p',
                {
                    cod_p:seleccionadop[i],
                },
                function(data){
                    datos = eval(data);
                    for (i=0;i<datos.length;i++){
                        html_p +='<tr>'+
                                '<td>1</td>'+
                                '<td>'+datos[i]['producto']+'</td>'+
                                '<td>'+datos[i]['precio']+'</td>'+
                                '<td>'+datos[i]['precio']+'</td>'+
                                '</tr>';
                        total = total+parseInt(datos[i]['precio']);
                    }
                    total_html ='<tr>'+
                                    '<th></th>'+
                                    '<th></th>'+
                                    '<th>TOTAL</th>'+
                                    '<th>'+total+'</th>'+
                                    '</tr>';
                })
        }

        det_body.innerHTML = html;
        pie_dt.innerHTML = total_html;
    })
    $('#seleccion_detalle').click(function(){

    })
})
});
