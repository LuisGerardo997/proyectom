$(document).on('ready',function(){
    var base_url = 'http://localhost/proyectom/';
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"tipo_documento/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_tipo_documento'},
        {data: 'descripcion'},
        {data: 'nro_serie'},
        {data: 'nro_correlativo'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_tipo_documento+'\',\''+row.descripcion+'\',\''+row.nro_serie+'\',\''+row.nro_correlativo+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_tipo_documento+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});


editClient = function(cod_tipo_documento, descripcion, nro_serie, nro_correlativo){
    $('#cod_tipo_documento').val(cod_tipo_documento);
    $('#descripcion').val(descripcion);
    $('#nro_serie').val(nro_serie);
    $('#nro_correlativo').val(nro_correlativo);
    enviar = function(){
        $.post(base_url+"tipo_documento/actualizar",
        {
            cod_tipo_documento:$('#cod_tipo_documento').val(),
            descripcion:$('#descripcion').val(),
            nro_serie:$('#nro_serie').val(),
            nro_correlativo:$('#nro_correlativo').val(),
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
deldat = function(cod_tipo_documento){
    $.post(base_url+'tipo_documento/eliminar',
    {
        cod_tipo_documento:cod_tipo_documento,
    },
    function(data){
        if (data == 1){
            alert('Eliminado');
            location.reload();
        }
    });
};
insertdat = function(cod_tipo_documento, descripcion, nro_serie, nro_correlativo){
    $.post(base_url+'tipo_documento/guardar',
    {
      cod_tipo_documento:$('#cod_tipo_documento_c').val(),
      descripcion:$('#descripcion_c').val(),
      nro_serie:$('#nro_serie_c').val(),
      nro_correlativo:$('#nro_correlativo_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
