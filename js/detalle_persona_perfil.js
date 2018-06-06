$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"detalle_persona_perfil/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_perfil'},
        {data: 'perfil'},
        {data: 'cod_persona'},
        {data: 'apellido_paterno'},
        {data: 'apellido_materno'},
        {data: 'nombres'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_perfil+'\',\''+row.cod_persona+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});

editClient = function(cod_perfil, perfil, cod_persona, nombres, apellido_paterno, apellido_materno){
    $("#cod_perfil option:contains('"+perfil+"')").attr("selected",true);
    $("#cod_persona option:contains('"+apellido_paterno+" "+apellido_materno+" "+nombres+"')").attr("selected",true);
};

deldat = function(cod_perfil,cod_persona){
    $.post(base_url+'detalle_persona_perfil/eliminar',
    {
        cod_perfil:cod_perfil,
        cod_persona:cod_persona,
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_perfil, cod_persona){
    $.post(base_url+'detalle_persona_perfil/guardar',
    {
        cod_perfil:$('#cod_perfil_c').val(),
        cod_persona:$('#cod_persona_c').val()
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
