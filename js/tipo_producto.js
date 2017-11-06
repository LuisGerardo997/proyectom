$(document).on('ready',function(){
    var base_url = 'http://localhost/proyectom/';
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"/tipo_producto/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_tipo_producto'},
        {data: 'tipo_producto'},
        {data: 'descripcion'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_tipo_producto+'\',\''+row.tipo_producto+'\',\''+row.descripcion+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_tipo_producto+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});


editClient = function(cod_tipo_producto,  tipo_producto, descripcion){
    $('#cod_tipo_producto').val(cod_tipo_producto);
    $('#tipo_producto').val(tipo_producto);
    $('#descripcion').val(descripcion);
    enviar = function(){
        $.post(base_url+"tipo_producto/actualizar",
        {
            cod_tipo_producto:$('#cod_tipo_producto').val(),
            tipo_producto:$('#tipo_producto').val(),
            descripcion:$('#descripcion').val(),
        },
        function(data){
            if (data == 1){
                alert('Guardado');
                $('#cerrar_modal').click();

                location.reload();
            }
        });
    }
};
deldat = function(cod_tipo_producto){
    $.post(base_url+'tipo_producto/eliminar',
    {
        cod_tipo_producto:cod_tipo_producto,
    },
    function(data){
        if (data == 1){
            alert('Eliminado');
            location.reload();
        }
    });
};
insertdat = function(cod_tipo_producto,  tipo_producto, descripcion){
    $.post(base_url+'tipo_producto/guardar',
    {
      cod_tipo_producto:$('#cod_tipo_producto_c').val(),
      tipo_producto:$('#tipo_producto_c').val(),
      descripcion:$('#descripcion_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
