$(document).on('ready',function(){
    var base_url = 'http://localhost/proyectom/';

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":"http://localhost/proyectom/tipo_persona/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_tipo_persona'},
        {data: 'tipo_persona'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_tipo_persona+'\',\''+row.tipo_persona+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_tipo_persona+'\');">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});


editClient = function(cod_tipo_persona, tipo_persona){
    $('#cod_tipo_persona').val(cod_tipo_persona);
    $('#tipo_persona').val(tipo_persona);
    
    enviar = function(){
        $.post(base_url+"tipo_persona/actualizar",
        {
            cod_tipo_persona:$('#cod_tipo_persona').val(),
            tipo_persona:$('#tipo_persona').val(),
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
    
deldat = function(cod_tipo_persona){
    $.post(base_url+'tipo_persona/eliminar',
    {
        cod_tipo_persona:cod_tipo_persona,
    },
    function(data){
        if (data == 1){
            alert('El registro fue eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_tipo_persona, tipo_persona){
    $.post(base_url+'tipo_persona/guardar',
    {
        cod_tipo_persona:$('#cod_tipo_persona_c').val(),
        tipo_persona:$('#tipo_persona_c').val(),
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
