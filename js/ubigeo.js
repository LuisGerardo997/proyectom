$(document).on('ready',function(){



$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"ubigeo/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_ciudad'},
        {data: 'ciudad'},
        {data: 'provincia'},
        {data: 'departamento'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_ciudad+'\',\''+row.ciudad+'\',\''+row.provincia+'\',\''+row.departamento+'\');">Editar</a></li>'+
           '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_ciudad+'\');">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});


editClient = function(cod_ciudad, ciudad, provincia, departamento){
    $('#cod_ciudad').val(cod_ciudad);
    $('#ciudad').val(ciudad);
    $('#provincia').val(provincia);
    $('#departamento').val(departamento);

    enviar = function(){
        $.post(base_url+"ubigeo/actualizar",
        {
            cod_ciudad:$('#cod_ciudad').val(),
            ciudad:$('#ciudad').val(),
            provincia:$('#provincia').val(),
            departamento:$('#departamento').val(),
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
deldat = function(cod_ciudad){
    $.post(base_url+'ubigeo/eliminar',
    {
        cod_ciudad:cod_ciudad,
    },
    function(data){
        if (data == 1){
            alert('El registro fue eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_ciudad, ciudad, provincia, departamento){
    $.post(base_url+'ubigeo/guardar',
    {
        cod_ciudad:$('#cod_ciudad_c').val(),
        ciudad:$('#ciudad_c').val(),
        provincia:$('#provincia_c').val(),
        departamento:$('#departamento_c').val(),
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
