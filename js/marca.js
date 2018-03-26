$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"/marca/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_marca'},
        {data: 'marca'},
        {data: 'descripcion'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_marca+'\',\''+row.marca+'\',\''+row.descripcion+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_marca+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});


editClient = function(cod_marca, marca, descripcion){
    $('#cod_marca').val(cod_marca);
    $('#marca').val(marca);
    $('#descripcion').val(descripcion);
    enviar = function(){
        $.post(base_url+"marca/actualizar",
        {
            cod_marca:$('#cod_marca').val(),
            marca:$('#marca').val(),
            descripcion:$('#descripcion').val(),
        },
        function(data){
            if (data == 1){
                swal({
                    title: 'Guardado',
                    type: 'info'
                },
                function(){
                    $('#cerrar_modal').click();
                    location.reload();
                });
            }
        });
    }
};
deldat = function(cod_marca){
    $.post(base_url+'marca/eliminar',
    {
        cod_marca:cod_marca,
    },
    function(data){
        if (data == 1){
            swal({
                title: 'Eliminado',
                type: 'info'
            },
            function(){
                location.reload();
            });
        }
    });
};
insertdat = function(cod_marca, marca, descripcion){
    $.post(base_url+'marca/guardar',
    {
      cod_marca:$('#cod_marca_c').val(),
      marca:$('#marca_c').val(),
      descripcion:$('#descripcion_c').val(),
    },
    function(data){
        if(data == 1){
            swal({
                title: 'El registro fue almacenado correctamente',
                type: 'info'
            },
            function(){
                location.reload();
            });
        }
    });
};
});
