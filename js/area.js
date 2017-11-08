$(document).on('ready',function(){
        var base_url = 'http://localhost/proyectom/';

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":"http://localhost/proyectom/area/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_area'},
        {data: 'area'},
        {data: 'descripcion'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_area+'\',\''+row.area+'\',\''+row.descripcion+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_area+'\');">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});


editClient = function(cod_area, area, descripcion){
    $('#cod_area').val(cod_area);
    $('#area').val(area);
    $('#descripcion').val(descripcion);

enviar = function(){
        $.post(base_url+"area/actualizar",
        {
            cod_area:$('#cod_area').val(),
            area:$('#area').val(),
            descripcion:$('#descripcion').val(),
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
               
deldat = function(cod_area){
    $.post(base_url+'area/eliminar',
    {
        cod_area:cod_area,
    },
    function(data){
        if (data == 1){
            alert('El registro fue eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_area, area, descripcion){
    $.post(base_url+'area/guardar',
    {
        cod_area:$('#cod_area_c').val(),
        area:$('#area_c').val(),
        descripcion:$('#descripcion_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
        alert(data);
    });
};   
})
