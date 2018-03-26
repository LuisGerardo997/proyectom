$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"proveedores/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_proveedor'},
        {data: 'nombres'},
        {data: 'apellido_paterno'},
        {data: 'apellido_materno'},
        {data: 'dni'},
        {data: 'ciudad'},
        {data: 'razon_social'},
        {data: 'descripcion'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_proveedor+'\',\''+row.nombres+'\',\''+row.apellido_paterno+'\',\''+row.apellido_materno+'\',\''+row.dni+'\',\''+row.ciudad+'\',\''+row.razon_social+'\',\''+row.descripcion+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_proveedor+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
'language':español
});


editClient = function(cod_proveedor, nombres, apellido_paterno, apellido_materno,dni,ciudad,razon_social,descripcion){
    $('#cod_proveedor').val(cod_proveedor);
    $('#nombres').val(nombres);
    $('#apellido_paterno').val(apellido_paterno);
    $('#apellido_materno').val(apellido_materno);
    $('#dni').val(dni);
    $("#ciudad option:contains('"+ciudad+"')").attr("selected",true);
    $('#razon_social').val(razon_social);
    $('#descripcion').val(descripcion);
    enviar = function(){
        $.post(base_url+"proveedores/actualizar",
        {
            cod_proveedor:$('#cod_proveedor').val(),
            nombres:$('#nombres').val(),
            apellido_paterno:$('#apellido_paterno').val(),
            apellido_materno:$('#apellido_materno').val(),
            dni:$('#dni').val(),
            ciudad:$('#ciudad').val(),
            razon_social:$('#razon_social').val(),
            descripcion:$('#descripcion').val(),
        },
        function(data){
            if (data == 1){
                swal({
                    title: 'Guardado',
                    type: 'info'
                },
                function(){
                    $('#cerrar_modal').click();
                    location.reload();
                });
            }
            swal(data);
        });
    }
};
deldat = function(cod_proveedor){
    $.post(base_url+'proveedores/eliminar',
    {
        cod_proveedor:cod_proveedor,
    },
    function(data){
        if (data == 1){
            swal({
                title: 'Eliminado',
                type: 'info'
            },
            function(){
                location.reload();
            });
        }
    });
};
insertdat = function(cod_proveedor, nombres, apellido_paterno, apellido_materno,dni,ciudad,razon_social,descripcion){
    $.post(base_url+'proveedores/guardar',
    {
      cod_proveedor:$('#cod_proveedor_c').val(),
      nombres:$('#nombres_c').val(),
      apellido_paterno:$('#apellido_paterno_c').val(),
      apellido_materno:$('#apellido_materno_c').val(),
      dni:$('#dni_c').val(),
      ciudad:$('#ciudad_c').val(),
      razon_social:$('#razon_social_c').val(),
      descripcion:$('#descripcion_c').val(),
    },
    function(data){
        if(data == 1){
            swal({
                title: 'El registro fue almacenado correctamente',
                type: 'info'    
            },
            function(){
                location.reload();
            });
        }
    });
};
});
