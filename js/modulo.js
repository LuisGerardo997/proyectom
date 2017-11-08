$(document).on('ready',function(){
    var base_url = 'http://localhost/proyectom/';
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":"http://localhost/proyectom/modulo/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_modulo'},
        {data: 'pmodulo'},
        {data: 'modulo'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_modulo+'\',\''+row.pmodulo+'\',\''+row.modulo+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});

editClient = function(cod_modulo, pmodulo, modulo){
    $('#cod_modulo').val(cod_modulo);
    $('#pmodulo').val(pmodulo);
    $('#modulo').val(modulo);
};
deldat = function(cod_modulo){
    $.post(base_url+'modulo/eliminar',
    {
        cod_modulo:cod_modulo,
    },
    function(data){
        if (data == 1){
            alert('Eliminado');
            location.reload();
        }
    });
};
insertdat = function(cod_modulo, pmodulo, modulo){
    $.post(base_url+'modulo/guardar',
    {
      cod_modulo_c:$('#cod_modulo_c').val(),
      pmodulo_c:$('#pmodulo_c').val(),
      modulo_c:$('#modulo_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
