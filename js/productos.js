$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"productos/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_producto'},
        {data: 'marca'},
        {data: 'tipo_producto'},
        {data: 'producto'},
        {data: 'descripcion'},
        {data: 'precio_producto'},
        {data: 'stock_producto'},
        {data: 'stock_minimo'},
        {data: 'stock_maximo'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_producto+'\',\''+row.marca+'\',\''+row.tipo_producto+'\',\''+row.producto+'\',\''+row.descripcion+'\',\''+row.precio_producto+'\',\''+row.stock_producto+'\',\''+row.stock_minimo+'\',\''+row.stock_maximo+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_producto+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});


editClient = function(cod_producto, marca, tipo_producto, producto, descripcion, precio_producto, stock_producto, stock_minimo, stock_maximo){
    $('#cod_producto').val(cod_producto);
    $("#marca option:contains('"+marca+"')").attr("selected",true);
    $("#tipo_producto option:contains('"+tipo_producto+"')").attr("selected",true);
    $('#producto').val(producto);
    $('#descripcion').val(descripcion);
    $('#precio_producto').val(precio_producto);
    $('#stock_producto').val(stock_producto);
    $('#stock_minimo').val(stock_minimo);
    $('#stock_maximo').val(stock_maximo);
    enviar = function(){
        $.post(base_url+"productos/actualizar",
        {
            cod_producto:$('#cod_producto').val(),
            marca:$('#marca').val(),
            tipo_producto:$('#tipo_producto').val(),
            producto:$('#producto').val(),
            descripcion:$('#descripcion').val(),
            precio_producto:$('#precio_producto').val(),
            stock_producto:$('#stock_producto').val(),
            stock_minimo:$('#stock_minimo').val(),
            stock_maximo:$('#stock_maximo').val(),
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
        });
    }
};
deldat = function(cod_producto){
    $.post(base_url+'productos/eliminar',
    {
        cod_producto:cod_producto,
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
insertdat = function(cod_producto, marca, tipo_producto, producto, descripcion, precio_producto, stock_producto, stock_minimo, stock_maximo){
    $.post(base_url+'productos/guardar',
    {
      cod_producto:$('#cod_producto_c').val(),
      marca:$('#marca_c').val(),
      tipo_producto:$('#tipo_producto_c').val(),
      producto:$('#producto_c').val(),
      descripcion:$('#descripcion_c').val(),
      precio_producto:$('#precio_producto_c').val(),
      stock_producto:$('#stock_producto_c').val(),
      stock_minimo:$('#stock_minimo_c').val(),
      stock_maximo:$('#stock_maximo_c').val(),
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
