$(document).on('ready',function(){


$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"tipo_habitacion/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_tipo_habitacion'},
        {data: 'tipo_habitacion'},
        {data: 'descripcion'},
        {data: 'precio_tipo_habitacion'},
        {data: 'max_h'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_tipo_habitacion+'\',\''+row.tipo_habitacion+'\',\''+row.descripcion+'\',\''+row.precio_tipo_habitacion+'\',\''+row.max_h+'\');">Editar</a></li>'+
           '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_tipo_habitacion+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});


editClient = function(cod_tipo_habitacion, tipo_habitacion, descripcion, precio_tipo_habitacion, max_h){
    $('#cod_tipo_habitacion').val(cod_tipo_habitacion);
    $('#tipo_habitacion').val(tipo_habitacion);
    $('#descripcion').val(descripcion);
    $('#precio_tipo_habitacion').val(precio_tipo_habitacion);
    $('#max_h').val(max_h);

    enviar = function(){
        $.post(base_url+"tipo_habitacion/actualizar",
        {
            cod_tipo_habitacion:$('#cod_tipo_habitacion').val(),
            tipo_habitacion:$('#tipo_habitacion').val(),
            descripcion:$('#descripcion').val(),
            precio_tipo_habitacion:$('#precio_tipo_habitacion').val(),
            max_h:$('#max_h').val(),
        },
        function(data){
            if (data == 1){
                alert('El registro fue guardado correctamente');
                $('#cerrar_modal').click();

                location.reload();
            }
        });
    }
};

    deldat = function(cod_tipo_habitacion){
    $.post(base_url+'tipo_habitacion/eliminar',
    {
        cod_tipo_habitacion:cod_tipo_habitacion,
    },
    function(data){
        if (data == 1){
            alert('El registro fue eliminado correctamente');
            location.reload();
        }
        alert(cod_tipo_habitacion);
    });
};

insertdat = function(cod_tipo_habitacion, tipo_habitacion, descripcion, precio_tipo_habitacion, max_h){
    $.post(base_url+'tipo_habitacion/guardar',
    {
        cod_tipo_habitacion:$('#cod_tipo_habitacion_c').val(),
        tipo_habitacion:$('#tipo_habitacion_c').val(),
        descripcion:$('#descripcion_c').val(),
        precio_tipo_habitacion:$('#precio_tipo_habitacion_c').val(),
        max_h:$('#max_h_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
        alert(data);
    });
};

});
