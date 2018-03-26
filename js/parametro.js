$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"parametro/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_parametro'},
        {data: 'descripcion'},
        {data: 'valor'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_parametro+'\',\''+row.descripcion+'\',\''+row.valor+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_parametro+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});

editClient = function(cod_parametro, descripcion, valor){
    $('#cod_parametro').val(cod_parametro);
    $('#descripcion').val(descripcion);
    $('#valor').val(valor);

    enviar = function(){
        $.post(base_url+"parametro/actualizar",{
            cod_parametro:$('#cod_parametro').val(),
            descripcion:$('#descripcion').val(),
            valor:$('#valor').val(),
        },

        function(data){
            if (data == 1){
                swal({
                  title: 'Los cambios se han realizado correctamente',
                  type: 'info',
                  closeOnConfirm: true,
                },
              function(){
                $('#cerrar_modal').click();
                location.reload();
              });
            }
        });
    }
};

deldat = function(cod_parametro){
    $.post(base_url+'parametro/eliminar',
    {
        cod_parametro:cod_parametro,
    },
    function(data){
        if (data == 1){
            swal('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_parametro, descripcion, valor){
    $.post(base_url+'parametro/guardar',
    {
        cod_parametro:$('#cod_parametro_c').val(),
        descripcion:$('#descripcion_c').val(),
        valor:$('#valor_c').val()
    },
    function(data){
        if(data == 1){
            swal({
              title: 'El registro fue almacenado correctamente',
              type: 'info',
              closeOnConfirm: true,
            },
          function(){
            location.reload();
          });
        }
    });
};
});
