$(document).on('ready',function(){

$('#dt_table').DataTable({
    'destroy':true,
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"caja/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_caja'},
        {data: 'nro_caja'},
        {data: 'descripcion'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_caja+'\',\''+row.nro_caja+'\',\''+row.descripcion+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_caja+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});

editClient = function(cod_caja, nro_caja, descripcion){
    $('#cod_caja').val(cod_caja);
    $('#nro_caja').val(nro_caja);
    $('#descripcion').val(descripcion);

    enviar = function(){
        $.post(base_url+"caja/actualizar",
        {
            cod_caja:$('#cod_caja').val(),
            nro_caja:$('#nro_caja').val(),
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

deldat = function(cod_caja){
    $.post(base_url+'caja/eliminar',
    {
        cod_caja:cod_caja,
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_caja, nro_caja, descripcion){
    $.post(base_url+'caja/guardar',
    {
        cod_caja:$('#cod_caja_c').val(),
        nro_caja:$('#nro_caja_c').val(),
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
