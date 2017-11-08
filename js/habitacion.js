$(document).on('ready',function(){
        var base_url = 'http://localhost/proyectom/';
    /*$('#dt_table tbody').html('');
    $.post(base_url+"clientes/consultar",
    function(data){
    alert(data);
    var p = JSON.parse(data);
    $.each(p, function(i, item){
    $('#dt_table tbody').append(
    '<tr>'+
    '   <td>1</td>'+
    '   <td>'+item.nombre+'</td>'+
    '   <td>'+item.apellido_paterno+'</td>'+
    '   <td>'+item.apellido_materno+'</td>'+
    '   <td>'+item.ruc+'</td>'+
    '   <td>'+item.email+'</td>'+
    '   <td>'+item.genero+'</td>'+
    '   <td>'+item.tel_movil+'</td>'+
    '   <td>'+item.ciudad+'</td>'+
    '   <td><button href="#" type="button" class="btn btn-default waves-effect">Crear</button></td>'+
    '</tr>'
);
});
});*/

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":"http://localhost/proyectom/habitacion/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_habitacion'},
        {data: 'tipo_habitacion'},
        {data: 'piso'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_habitacion+'\',\''+row.tipo_habitacion+'\',\''+row.piso+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_habitacion+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});


editClient = function(cod_habitacion, tipo_habitacion, piso){
    $('#cod_habitacion').val(cod_habitacion);
    $("#tipo_habitacion option:contains('"+tipo_habitacion+"')").attr("selected",true);
    $('#piso').val(piso);
   
    enviar = function(){
        $.post(base_url+"habitacion/actualizar",
        {
            cod_habitacion:$('#cod_habitacion').val(),
            tipo_habitacion:$('#tipo_habitacion').val(),
            piso:$('#piso').val(),
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

    deldat = function(cod_habitacion){
    $.post(base_url+'habitacion/eliminar',
    {
        cod_habitacion:cod_habitacion,
    },
    function(data){
        if (data == 1){
            alert('El registro fue eliminado correctamente');
            location.reload();
        }
        alert(cod_habitacion);
    });
};

insertdat = function(cod_habitacion, tipo_habitacion, piso){
    $.post(base_url+'habitacion/guardar',
    {
        cod_habitacion:$('#cod_habitacion_c').val(),
        tipo_habitacion:$('#tipo_habitacion_c').val(),
        piso:$('#piso_c').val(),
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
