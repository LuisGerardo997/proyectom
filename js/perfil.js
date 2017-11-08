$(document).on('ready',function(){
    var base_url = 'http://localhost/proyectom/';
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"perfil/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_perfil'},
        {data: 'perfil'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_perfil+'\',\''+row.perfil+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);"class=" waves-effect waves-block" onClick="deldat(\''+row.cod_perfil+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});

editClient = function(cod_perfil, perfil){
    $('#cod_perfil').val(cod_perfil);
    $('#perfil').val(perfil);
    
    enviar = function(){
        $.post(base_url+"perfil/actualizar",{
            cod_perfil:$('#cod_perfil').val(),
            perfil:$('#perfil').val()
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

deldat = function(cod_perfil){
    $.post(base_url+'perfil/eliminar',
    {
        cod_perfil:cod_perfil,
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_perfil, perfil){
    $.post(base_url+'perfil/guardar',
    {
        cod_perfil:$('#cod_perfil_c').val(),
        perfil:$('#perfil_c').val()
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});