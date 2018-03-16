$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"cargo/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_cargo'},
        {data: 'area'},
        {data: 'descripcion'},
        {data: 'cargo'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_cargo+'\',\''+row.area+'\',\''+row.descripcion+'\',\''+row.cargo+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_cargo+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});


editClient = function(cod_cargo, area, descripcion, cargo){
    $('#cod_cargo').val(cod_cargo);
    $("#area option:contains('"+area+"')").attr("selected",true);
    $('#descripcion').val(descripcion);
    $('#cargo_e').val(cargo);
    enviar = function(){
        $.post(base_url+"cargo/actualizar",
        {
            cod_cargo:$('#cod_cargo').val(),
            area:$('#area').val(),
            descripcion:$('#descripcion').val(),
            cargo:$('#cargo_e').val(),
        },
        function(data){
            if (data == 1){
                alert('Guardado');
                $('#cerrar_modal').click();

                location.reload();
            }
            alert(data);
        });
    }
};
deldat = function(cod_cargo){
    $.post(base_url+'cargo/eliminar',
    {
        cod_cargo:cod_cargo,
    },
    function(data){
        if (data == 1){
            alert('Eliminado');
            location.reload();
        }
    });
};
insertdat = function(cod_cargo, area, descripcion, cargo){
    $.post(base_url+'cargo/guardar',
    {
      cod_cargo:$('#cod_cargo_c').val(),
      area:$('#area_c').val(),
      descripcion:$('#descripcion_c').val(),
      cargo:$('#cargo_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
