$(document).on('ready',function(){
    var base_url = 'http://localhost/proyectom/';

    
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":"http://localhost/proyectom/servicios/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_servicio'},
        {data: 'servicio'},
        {data: 'precio'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_servicio+'\',\''+row.servicio+'\',\''+row.precio+'\',);">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_servicio+'\');">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
});


editClient = function(cod_servicio, servicio, precio){
    $('#cod_servicio').val(cod_servicio);
    $('#servicio').val(servicio);
    $('#precio').val(precio);

    enviar = function(){
        $.post(base_url+"servicios/actualizar",
        {
            cod_servicio:$('#cod_servicio').val(),
            servicio:$('#servicio').val(),
            precio:$('#precio').val(),
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
deldat = function(cod_servicio){
    $.post(base_url+'servicios/eliminar',
    {
        cod_servicio:cod_servicio,
    },
    function(data){
        if (data == 1){
            alert('El registro fue eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_servicio, servicio, precio){
    $.post(base_url+'servicios/guardar',
    {
        cod_servicio:$('#cod_servicio_c').val(),
        servicio:$('#servicio_c').val(),
        precio:$('#precio_c').val(),
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


