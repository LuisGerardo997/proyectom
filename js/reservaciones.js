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
            {data: 'cod_venta'},
            {data: 'nombres_c'+' '+'apellido_p_c'+' '+'apellido_m_c'},
            {data: 'nombres_e'+' '+'apellido_p_e'+' '+'apellido_m_e'},
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
            $.post(base_url+'reservaciones/comprobar_cliente',
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
})

$('#agregar').click(function(){
    $('#slct_table').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url": base_url+"productos/consultar",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_producto'},
            {data: 'producto'},
            {data: 'marca'},
            {data: 'tipo_producto'},
            {data: 'precio_producto'},
            {"orderable":true,
            render:function(data, type, row){
                return '<div>'+
                            '<input type="checkbox" value="\''+row.cod_producto+'\'" id="\''+'p'+row.cod_producto+'\'"/>'+
                            '<label for="\''+'p'+row.cod_producto+'\'"></label>'+
                        '</div>'
            }
        }
    ],
    "order":[[0, "asc"]],
    'language':español
    });
    $('#srv_table').DataTable({
        'paging':true,
        'info':true,
        'filter':true,
        'stateSave':true,
        'ajax':{
            "url":base_url+"servicios/consultar",
            "type":"POST",
            dataSrc: ''
        },
        'columns':[
            {data: 'cod_servicio'},
            {data: 'servicio'},
            {data: 'precio'},
            {"orderable":true,
            render:function(data, type, row){
                return '<div>'+
                            '<input type="checkbox" value="\''+row.cod_servicio+'\'" id="\''+'s'+row.cod_servicio+'\'"/>'+
                            '<label for="\''+'s'+row.cod_servicio+'\'"></label>'+
                        '</div>'
            }
        }
    ],
    "order":[[0, "asc"]],
    'language':español
    });
})

});
