$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"/forma_pago/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_forma_pago'},
        {data: 'forma_pago'},
        {data: 'descripcion'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_forma_pago+'\',\''+row.forma_pago+'\',\''+row.descripcion+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_forma_pago+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});


editClient = function(cod_forma_pago,  forma_pago, descripcion){
    $('#cod_forma_pago').val(cod_forma_pago);
    $('#forma_pago').val(forma_pago);
    $('#descripcion').val(descripcion);
    enviar = function(){
        $.post(base_url+"forma_pago/actualizar",
        {
            cod_forma_pago:$('#cod_forma_pago').val(),
            forma_pago:$('#forma_pago').val(),
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
deldat = function(cod_forma_pago){
    $.post(base_url+'forma_pago/eliminar',
    {
        cod_forma_pago:cod_forma_pago,
    },
    function(data){
        if (data == 1){
            alert('Eliminado');
            location.reload();
        }
    });
};
insertdat = function(cod_forma_pago,  forma_pago, descripcion){
    $.post(base_url+'forma_pago/guardar',
    {
      cod_forma_pago:$('#cod_forma_pago_c').val(),
      forma_pago:$('#forma_pago_c').val(),
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
