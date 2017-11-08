$(document).on('ready',function(){
    var base_url = 'http://localhost/proyectom/';
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"tipo_transaccion/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_tipo_transaccion'},
        {data: 'tipo_transaccion'},
        {data: 'descripcion'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_tipo_transaccion+'\',\''+row.tipo_transaccion+'\',\''+row.descripcion+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_tipo_transaccion+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});

editClient = function(cod_tipo_transaccion, tipo_transaccion, descripcion){
    $('#cod_tipo_transaccion').val(cod_tipo_transaccion);
    $('#tipo_transaccion').val(tipo_transaccion);
    $('#descripcion').val(descripcion);
    
    enviar = function(){
        $.post(base_url+"tipo_transaccion/actualizar",{
            cod_tipo_transaccion:$('#cod_tipo_transaccion').val(),
            tipo_transaccion:$('#tipo_transaccion').val(),
            descripcion:$('#descripcion').val()
        },
        
        function(data){
            if (data == 1){
                alert('Los cambios se han realizado correctamente');
                $('#cerrar_modal').click();
                location.reload();
            }
        });
    }
};

deldat = function(cod_tipo_transaccion){
    $.post(base_url+'tipo_transaccion/eliminar',
    {
        cod_tipo_transaccion:cod_tipo_transaccion,
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_tipo_transaccion, tipo_transaccion, descripcion){
    $.post(base_url+'tipo_transaccion/guardar',
    {
        cod_tipo_transaccion:$('#cod_tipo_transaccion_c').val(),
        tipo_transaccion:$('#tipo_transaccion_c').val(),
        descripcion:$('#descripcion_c').val()
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});