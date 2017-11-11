$(document).on('ready',function(){
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"acceso/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_modulo'},
        {data: 'modulo'},
        {data: 'cod_perfil'},
        {data: 'perfil'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+'<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_modulo+'\',\''+row.cod_perfil+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});

editClient = function(cod_modulo, modulo, cod_perfil, perfil){
    $("#cod_modulo option:contains('"+modulo+"')").attr("selected",true);
    $("#cod_perfil option:contains('"+perfil+"')").attr("selected",true);
};

deldat = function(cod_perfil, cod_modulo){
    $.post(base_url+'acceso/eliminar',
    {
        cod_perfil:cod_perfil,
        cod_modulo:cod_modulo
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_perfil, cod_modulo){
    $.post(base_url+'acceso/guardar',
    {
        cod_perfil:$('#cod_perfil_c').val(),
        cod_modulo:$('#cod_modulo_c').val()
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
