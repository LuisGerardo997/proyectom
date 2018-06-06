$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"estado_habitacion/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_estado_habitacion'},
        {data: 'nombre'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_estado_habitacion+'\',\''+row.nombre+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_estado_habitacion+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});

editClient = function(cod_estado_habitacion, nombre){
    $('#cod_estado_habitacion').val(cod_estado_habitacion);
    $('#nombre').val(nombre);

    enviar = function(){
        $.post(base_url+"estado_habitacion/actualizar",{
            cod_estado_habitacion:$('#cod_estado_habitacion').val(),
            nombre:$('#nombre').val()
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

deldat = function(cod_estado_habitacion){
    $.post(base_url+'estado_habitacion/eliminar',
    {
        cod_estado_habitacion:cod_estado_habitacion,
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_estado_habitacion, nombre){
    $.post(base_url+'estado_habitacion/guardar',
    {
        cod_estado_habitacion:$('#cod_estado_habitacion_c').val(),
        nombre:$('#nombre_c').val()
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
