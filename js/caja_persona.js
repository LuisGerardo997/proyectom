$(document).on('ready',function(){

$('.datepicker').bootstrapMaterialDatePicker({
    format: 'YYYY-MM-DD',
    clearButton: true,
    weekStart: 1,
    time: false
});
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"caja_persona/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'fecha_inicio'},
        {data: 'cod_caja'},
        {data: 'nro_caja'},
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
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.fecha_inicio+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
'language':español
});

editClient = function(fecha_inicio, cod_caja, nro_caja, cod_persona, apellido_paterno, apellido_materno, nombres){
    $('#fecha_inicio').val(fecha_inicio);
    $("#cod_caja option:contains('"+nro_caja+"')").attr("selected",true);
    $("#cod_persona option:contains('"+apellido_paterno+" "+apellido_materno+" "+nombres+"')").attr("selected",true);

    enviar = function(){
        $.post(base_url+"caja_persona/actualizar",{
            fecha_inicio:$('#fecha_inicio').val(),
            cod_caja:$('#cod_caja').val(),
            cod_persona:$('#cod_persona').val()
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

deldat = function(fecha_inicio){
    $.post(base_url+'caja_persona/eliminar',
    {
        fecha_inicio:fecha_inicio,
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(fecha_inicio, cod_caja, cod_persona){
    $.post(base_url+'caja_persona/guardar',
    {
        fecha_inicio:$('#fecha_inicio_c').val(),
        cod_caja:$('#cod_caja_c').val(),
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
