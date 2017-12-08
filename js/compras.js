$(document).on('ready',function(){
  var d = new Date();

  var month = d.getMonth()+1;
  var day = d.getDate();

  var output = d.getFullYear() + '/' +
  (month<10 ? '0' : '') + month + '/' +
  (day<10 ? '0' : '') + day;
  $('.datepicker').bootstrapMaterialDatePicker({
    format: 'YYYY/MM/DD',
    clearButton: true,
    weekStart: 1,
    time: false
  });
  var producto_precio = new Array();
  var servicio_precio = new Array();
  var cliente = new Array();
  var valor_p = new Array();
  var seleccionadop = new Array();
  var cantidad_p = new Array();
  $('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
      "url": base_url+"compras/consultar",
      "type":"POST",
      dataSrc: ''
    },
    'columns':[
      {data: 'cod_compra'},
      {data: 'cod_proveedor'},
      {data: 'razon_social'},
      {data: 'fecha_compra'},
      {"orderable":true,
      render:function(data, type, row){
        return '<div class="btn-group" role="group">'+
        '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
        'Acciones <span class="caret"></span>'+
        '</button>'+
        '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
        '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_compra+'\',\''+row.cod_proveedor+'\',\''+row.razon_social+'\',\''+row.fecha_compra+'\');">Editar</a></li>'+
        '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_compra+'\')">Eliminar</a></li>'+
        '</ul>'+
        '</div>'
      }
    }
  ],
  "order":[[0, "asc"]],
  'language':español
});

editClient = function(cod_cargo, area, descripcion, cargo){
  $('#cod_cargo').val(cod_cargo);
  $("#area option:contains('"+area+"')").attr("selected",true);
  $('#descripcion').val(descripcion);
  $('#cargo').val(cargo);
  enviar = function(){
    $.post(base_url+"cargo/actualizar",
    {
      cod_cargo:$('#cod_cargo').val(),
      area:$('#area').val(),
      descripcion:$('#descripcion').val(),
      cargo:$('#cargo').val(),
    },
    function(data){
      if (data == 1){
        alert('Guardado');
        $('#cerrar_modal').click();

        location.reload();
      }
      alert(data);
    });
  }
};
deldat = function(cod_cargo){
  $.post(base_url+'cargo/eliminar',
  {
    cod_cargo:cod_cargo,
  },
  function(data){
    if (data == 1){
      alert('Eliminado');
      location.reload();
    }
  });
};
insertdat = function(cod_cargo, area, descripcion, cargo){
  $.post(base_url+'cargo/guardar',
  {
    cod_cargo:$('#cod_cargo_c').val(),
    area:$('#area_c').val(),
    descripcion:$('#descripcion_c').val(),
    cargo:$('#cargo_c').val(),
  },
  function(data){
    if(data == 1){
      alert('El registro fue almacenado correctamente');
      location.reload();
    }
  });
};
var proveedor_div = document.getElementById('proveedor_div');
var proveedor_nombre = document.getElementById('proveedor_nombre');
var proveedor_app = document.getElementById('proveedor_app');
var proveedor_apm = document.getElementById('proveedor_apm');
$('#realizar_venta').click(function(){
  $('a[href="#next"]').parent().attr('style','display:none');
  $('#nro_compra').val(parseInt(num_compra)+1);
  $('#proveedor').on('keyup',function(){
    comprobar_proveedor($(this).val());
    if ($(this).val().length > 11){
      alert('Se exedió el número máximo de caracteres para este campo');
    }
  })
  $('#proveedor').keyup(function(){
      if ($(this).val().length =! 11){
          $('a[href="#next"]').parent().attr('style','display:none');
      }else{
          $('a[href="#next"]').parent().attr('style', 'display:block');
      }
  })
  $('#empleado').val(empleado);
  $('#fecha').val(output);
  $('#existentes_dt').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
      "url": base_url+"compras/productos_compra",
      "type":"POST",
      dataSrc: ''
    },
    'columns':[
      {data: 'cod_producto'},
      {data: 'producto'},
      {data: 'marca'},
      {data: 'tipo_producto'},
      {data: 'stock_producto'},
      {data: 'stock_maximo'},
      {data: 'precio'},
      {"orderable":true,
      render:function(data, type, row){
        return '<div class="btn-group" role="group">'+
        '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
        'Acciones <span class="caret"></span>'+
        '</button>'+
        '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
        '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="ingresar_cantidad(\''+row.cod_producto+'\',\''+row.stock_maximo+'\',\''+row.stock_producto+'\',\''+row.precio+'\');">Reabastecer</a></li>'+
        '</ul>'+
        '</div>'
      }
    }
  ],
  "order":[[0, "asc"]],
  'language':español
});
})
var valor_maximo;
ingresar_cantidad = function(arg1, arg2, arg3, arg4){
  $('#cantidad_actual').val(arg3);
  $('#precio_unitario').val(arg4);
  $('#ingresar_cantidad').modal({backdrop: "static"})
  cant_maxima = parseInt(arg2)
  cant_actual = parseInt(arg3)
  valor_maximo = cant_maxima-cant_actual;
  $('#cantidad_maxima').val(valor_maximo)
  $('#producto_cod').val(arg1)
  $('#stock_productox').keyup(function(){
    console.log($(this).val());
    if ($(this).val() > valor_maximo){
      alert('La cantidad ingresada, supera a la capacidad máxima en almacén, por favor, ingrese un valor menor a la cantidad máxima expresa.');
      $(this).val('');
    }else if($(this).val()!=0){
      monto_total = parseFloat($('#stock_productox').val())*parseFloat(arg4);
      $('#monto_compra').val(monto_total);
    }
    if ($(this).val()==0){
      $('#monto_compra').val('');
    }
  })
  $('#descuentox').keyup(function(){
    if ($('#descuentox').val()!=0){
      var coeficiente = parseFloat($('#descuentox').val())/100;
      descuento_valor = parseFloat($('#stock_productox').val())*parseFloat(arg4)*coeficiente;
      monto_total = parseFloat($('#stock_productox').val())*parseFloat(arg4)-descuento_valor;
      $('#monto_compra').val(monto_total);
    }else{
      monto_total = parseFloat($('#stock_productox').val())*parseFloat(arg4);
      $('#monto_compra').val(monto_total);
    }
  })
}
precio_p = function(arg1){
  if (producto_precio.includes(arg1) == false){
    producto_precio.push(arg1);
  }
  console.log(producto_precio)
}
precio_s = function(arg1){
  if (servicio_precio.includes(arg1) == false){
    servicio_precio.push(arg1);
  }
  console.log(servicio_precio)
}
insertar = function(data, data1){
  console.log(data);
  seleccionadoh.push(data);
  seleccionadoe.push(data1);
  console.log(seleccionadoh);
  console.log(seleccionadoe);
  $("#habitaciones_list").modal('hide');
}
guardar_compra = function(){
  $.post(base_url+'compras/guardar_compra',
  {
    cod_compra: $('#nro_compra').val(),
    empleado: $('#empleado').val(),
    cod_proveedor: $('#proveedor').val(),
    fecha_c: $('#fecha').val(),
    producto_cod: $('#producto_cod').val(),
    stock_productox: $('#stock_productox').val(),
    precio_unitario: $('#precio_unitario').val(),
    descuentox: $('#descuentox').val(),
    cantidad_actual: $('#cantidad_actual').val(),
  },
  function(data){
    if (data == 1){
      alert('Registro exitoso');
      location.reload()
    }else{
      console.log('Registro fallido');
    }
  })
}
comprobar_proveedor = function(arg){

  if (arg.length == 11){
    $.post(base_url+'compras/comprobar_proveedor',
    {
      proveedor:arg,
    },
    function(data){
      alert(data);
      if (data == 'No existe'){
        proveedor_nombre.setAttribute("style","display:block");
        proveedor_app.setAttribute("style","display:block");
        proveedor_apm.setAttribute("style","display:block");
        proveedor_div.setAttribute("class","col-md-3");
        proveedor_nombre.setAttribute("class","col-md-3");
        proveedor_app.setAttribute("class","col-md-3");
        proveedor_apm.setAttribute("class","col-md-3");
        var html = '<div class="form-group form-float">'
        +'<div class="form-line focused">'
        +'<label class="form-label">Nombres</label>'
        +'<input type="text" value="" name="nombres" id="nombres" class="form-control">'
        +'</div>'
        +'</div>';
        proveedor_nombre.innerHTML = html;
        html = '<div class="form-group form-float">'
        +'<div class="form-line focused">'
        +'<label class="form-label">Apellido Paterno</label>'
        +'<input type="text" value="" name="apellido_p" id="apellido_p" class="form-control">'
        +'</div>'
        +'</div>';
        proveedor_app.innerHTML = html;
        html = '<div class="form-group form-float">'
        +'<div class="form-line focused">'
        +'<label class="form-label">Apellido Materno</label>'
        +'<input type="text" value="" name="apellido_m" id="apellido_m" class="form-control">'
        +'</div>'
        +'</div>';
        proveedor_apm.innerHTML = html;

      }else if (data=='Existe'){
        proveedor_div.setAttribute("class","col-md-4 col-md-offset-4");
        proveedor_nombre.setAttribute("style","display:none");
        proveedor_app.setAttribute("style","display:none");
        proveedor_apm.setAttribute("style","display:none");
      }
    })
  }
}
});
