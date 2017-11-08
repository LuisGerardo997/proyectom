$(document).on('ready',function(){
  var base_url = 'http://localhost/proyectom/';
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY/MM/DD',
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
        "url":"http://localhost/proyectom/ofertas/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_oferta'},
        {data: 'oferta'},
        {data: 'descuento'},
        {data: 'fecha_inicio'},
        {data: 'fecha_fin'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_oferta+'\',\''+row.oferta+'\',\''+row.descuento+'\',\''+row.fecha_inicio+'\',\''+row.fecha_fin+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_oferta+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
});


editClient = function(cod_oferta, oferta, descuento,fecha_inicio,fecha_fin){
    $('#cod_oferta').val(cod_oferta);
    $('#oferta').val(oferta);
    $('#descuento').val(descuento);
    $('#fecha_inicio').val(fecha_inicio);
    $('#fecha_fin').val(fecha_fin);
    enviar = function(){
        $.post(base_url+"ofertas/actualizar",{
            cod_oferta:$('#cod_oferta').val(),
            oferta:$('#oferta').val(),
            descuento:$('#descuento').val(),
            fecha_inicio:$('#fecha_inicio').val(),
            fecha_fin:$('#fecha_fin').val(),
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

deldat = function(cod_oferta){
    $.post(base_url+'ofertas/eliminar',
    {
        cod_oferta:cod_oferta,
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_oferta, oferta, descuento,fecha_inicio,fecha_fin){
    $.post(base_url+'ofertas/guardar',
    {
        cod_oferta_c:$('#cod_oferta_c').val(),
        oferta_c:$('#oferta_c').val(),
        descuento_c:$('#descuento_c').val(),
        fecha_inicio_c:$('#fecha_inicio_c').val(),
        fecha_fin_c:$('#fecha_fin_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
});
