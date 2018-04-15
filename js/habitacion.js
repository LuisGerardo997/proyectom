$(document).on('ready',function(){
    activar_menu('habitacion', true);
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"habitacion/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_habitacion'},
        {data: 'tipo_habitacion'},
        {data: 'piso'},
        {data: 'nombre'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_habitacion+'\',\''+row.tipo_habitacion+'\',\''+row.piso+'\',\''+row.nombre+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_habitacion+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});


editClient = function(cod_habitacion, tipo_habitacion, piso, nombre){
    $('#cod_habitacion').val(cod_habitacion);
    $("#tipo_habitacion_e option:contains('"+tipo_habitacion+"')").attr("selected",true);
    $('#piso').val(piso);
    $("#nombre option:contains('"+nombre+"')").attr("selected",true);

    enviar = function(){
        $.post(base_url+"habitacion/actualizar",
        {
            cod_habitacion:$('#cod_habitacion').val(),
            tipo_habitacion:$('#tipo_habitacion_e').val(),
            piso:$('#piso').val(),
            nombre:$('#nombre').val(),
        },
        function(data){
            if (data == 1){
                swal({
                  title: 'El registro fue guardado correctamente',
                  type: 'info',
                  closeOnConfirm: false,
                },
              function(){
                $('#cerrar_modal').click();
                location.reload();
              });
            }
        });
    }
};

    deldat = function(cod_habitacion){
    $.post(base_url+'habitacion/eliminar',
    {
        cod_habitacion:cod_habitacion,
    },
    function(data){
        if (data == 1){
            swal({
              title: 'El registro fue eliminado correctamente',
              type: 'info',
              closeOnConfirm: true
            },
          function(){
            location.reload();
          });
        }
    });
};

insertdat = function(cod_habitacion, tipo_habitacion, piso, nombre){
    $.post(base_url+'habitacion/guardar',
    {
        cod_habitacion:$('#cod_habitacion_c').val(),
        tipo_habitacion:$('#tipo_habitacion_c').val(),
        piso:$('#piso_c').val(),
        nombre:$('#nombre_c').val(),
    },
    function(data){
        if(data == 1){
            swal({
              title: 'El registro fue almacenado correctamente',
              type: 'info',
              closeOnConfirm: true
            },
          function(){
            location.reload();            
          });
        }
    });
};

});
