$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"/tipo_movimiento/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_tipo_movimiento'},
        {data: 'tipo_movimiento'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_tipo_movimiento+'\',\''+row.tipo_movimiento+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_tipo_movimiento+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});


editClient = function(cod_tipo_movimiento,  tipo_movimiento){
    $('#cod_tipo_movimiento').val(cod_tipo_movimiento);
    $('#tipo_movimiento').val(tipo_movimiento);
    enviar = function(){
        $.post(base_url+"tipo_movimiento/actualizar",
        {
            cod_tipo_movimiento:$('#cod_tipo_movimiento').val(),
            tipo_movimiento:$('#tipo_movimiento').val(),
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
deldat = function(cod_tipo_movimiento){
    $.post(base_url+'tipo_movimiento/eliminar',
    {
        cod_tipo_movimiento:cod_tipo_movimiento,
    },
    function(data){
        if (data == 1){
            alert('Eliminado');
            location.reload();
        }
    });
};
insertdat = function(cod_tipo_movimiento,  tipo_movimiento){
    $.post(base_url+'tipo_movimiento/guardar',
    {
      cod_tipo_movimiento:$('#cod_tipo_movimiento_c').val(),
      tipo_movimiento:$('#tipo_movimiento_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
