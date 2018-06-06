$(document).on('ready',function(){
  activar_menu('compras_li', false);
    $('.modal').on('hidden.bs.modal', function(){
		$(this).find('form')[0].reset();
		$("label.error").remove();
	});
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
        swal({
          title: 'Guardado',
          type: 'info'
        },
        function(){
          $('#cerrar_modal').click();
          location.reload();
        });
      }
      // swal(data);
    });
  }
};
deldat = function(cod_compra){
  $.post(base_url+'compras/eliminar',
  {
    cod_compra:cod_compra,
  },
  function(data){
    if (data == 'true'){
      swal({
        title: 'Eliminado',
        type: 'info'
      },
      function(){
        location.reload();
      });
    }else{
      swal({
        title: 'Ups!',
        text: 'Ha ocurrido un error al eliminar',
        type: 'warning',
      });
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
insertprod = function(){
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

insertprov = function(){
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

var proveedor_div = document.getElementById('proveedor_div');
var proveedor_nombre = document.getElementById('proveedor_nombre');
var proveedor_app = document.getElementById('proveedor_app');
var proveedor_apm = document.getElementById('proveedor_apm');
$('#realizar_venta').click(function(){
  $('a[href="#next"]').click(function(){
    $('a[href="#finish"]').parent().css('display', 'none');
  })
  $('a[href="#next"]').parent().attr('style','display:none');
  $('#tabla_proveedor').DataTable({
      'paging':true,
      'info':true,
      'filter':true,
      'stateSave':true,
      'ajax':{
          "url": base_url+"deudas/consultar_proveedor",
          "type":"POST",
          dataSrc: ''
      },
      'columns':[
          {data: 'cod_proveedor'},
          {data: 'razon_social'},
          {data: 'dni'},
          {data: 'nombres'},
          {data: 'apellido_paterno'},
          {data: 'apellido_materno'},
          {data: 'ciudad'},
          {"orderable":true,
              render:function(data, type, row){
              return '<input name="proveedor_cod" onClick="proveedor_c(\''+row.cod_proveedor+'\')" type="radio" id="\''+row.cod_proveedor+'\'"/>'+'<label for="\''+row.cod_proveedor+'\'"></label>'
              }
          }
      ],
      "order":[[0, "asc"]],
      'language':español
  });
  proveedor_c = function(data1){
    $('a[href="#next"]').parent().attr('style', 'display:block');
    $('#proveedor').val(data1);
  }
  $('#nro_compra').val(parseInt(num_compra)+1);
  // $('#proveedor').on('keyup',function(){
  //   comprobar_proveedor($(this).val());
  //   if ($(this).val().length > 11){
  //     swal('Se exedió el número máximo de caracteres para este campo');
  //   }
  // })
  // $('input[name=proveedor_cod]').click(function(){
  //     $('a[href="#next"]').parent().attr('style', 'display:block');
  // })
  $('#empleado').val(empleado);
  $('#fecha').val(output);

    //tabla de seleccion de productos
    $.post(base_url+'compras/productos_compra',
    {
        buscar:$('#buscar').val(),
    },
    function(data){
        var html = '';
        var datos = eval(data);
        for (i = 0; i<datos.length; i++){
            html+='<tr>'+
                    '<td>'+datos[i]['cod_producto']+'</td>'+
                    '<td>'+datos[i]['producto']+'</td>'+
                    '<td>'+datos[i]['marca']+'</td>'+
                    '<td>'+datos[i]['tipo_producto']+'</td>'+
                    '<td>'+datos[i]['stock_producto']+'</td>'+
                    '<td>'+datos[i]['stock_maximo']+'</td>'+
                    '<td>'+datos[i]['precio']+'</td>'+
                    '<td><input type="checkbox" onClick="precio_p(\''+datos[i]['precio']+'\')" name="listado_p" value="'+datos[i]['cod_producto']+'" id="p'+datos[i]['cod_producto']+'"><label for="p'+datos[i]['cod_producto']+'"></label></td>'+
                    '</tr>';
        }
        body_pro.innerHTML = html;
        seleccionadop.forEach(function(i){
            $('#p'+i+'').prop('checked', true);
        });
        $('input[type=checkbox]').click(function(){
            var elemento = $(this).val();
            if (seleccionadop.includes(elemento)){
                var pos = seleccionadop.indexOf(elemento);
                valor_p.splice(pos,1);
                seleccionadop.splice(pos,1);
                producto_precio.splice(pos,1);
                if(seleccionadop.length>0){
                  $('a[href="#finish"]').parent().css('display', 'block');
                }else{
                  $('a[href="#finish"]').parent().css('display', 'none');
                }
            }
            //console.log($(this).val());
            $('input[name=listado_p]:checked').each(function(){
                if (seleccionadop.includes($(this).val()) == false){
                  seleccionadop.push($(this).val());
                  cantidad(elemento);
                  if(seleccionadop.length>0){
                    $('a[href="#finish"]').parent().css('display', 'block');
                  }else{
                    $('a[href="#finish"]').parent().css('display', 'none');
                  }
                }
            })
            console.log(seleccionadop);
        })
    })
//detector de teclas en buscador
$('#buscar').keyup(function(){
    $.post(base_url+'compras/productos_compra',
    {
        buscar:$('#buscar').val(),
    },
    function(data){
        var html = '';
        var datos = eval(data);
        for (i = 0; i<datos.length; i++){
            html+='<tr>'+
                    '<td>'+datos[i]['cod_producto']+'</td>'+
                    '<td>'+datos[i]['producto']+'</td>'+
                    '<td>'+datos[i]['marca']+'</td>'+
                    '<td>'+datos[i]['tipo_producto']+'</td>'+
                    '<td>'+datos[i]['stock_producto']+'</td>'+
                    '<td>'+datos[i]['stock_maximo']+'</td>'+
                    '<td>'+datos[i]['precio']+'</td>'+
                    '<td><input type="checkbox" name="listado_p" onClick="precio_p(\''+datos[i]['precio']+'\')" value="'+datos[i]['cod_producto']+'" id="p'+datos[i]['cod_producto']+'"><label for="p'+datos[i]['cod_producto']+'"></label></td>'+
                    '</tr>';
        }
        body_pro.innerHTML = html;
        seleccionadop.forEach(function(i){
            $('#p'+i+'').prop('checked', true);
        });
        $('input[type=checkbox]').click(function(){
            var elemento = $(this).val();
            if (seleccionadop.includes(elemento)){
                var pos = seleccionadop.indexOf(elemento);
                seleccionadop.splice(pos,1);
                producto_precio.splice(pos,1);
                valor_p.splice(pos,1);
            }
            //console.log($(this).val());
            $('input[name=listado_p]:checked').each(function(){
                if (seleccionadop.includes($(this).val()) == false){
                seleccionadop.push($(this).val());
                cantidad(elemento);
                }
            })
            console.log(seleccionadop);
        })
    })
})
//   $('#existentes_dt').DataTable({
//     'paging':true,
//     'info':true,
//     'filter':true,
//     'stateSave':true,
//     'ajax':{
//       "url": base_url+"compras/productos_compra",
//       "type":"POST",
//       dataSrc: ''
//     },
//     'columns':[
//       {data: 'cod_producto'},
//       {data: 'producto'},
//       {data: 'marca'},
//       {data: 'tipo_producto'},
//       {data: 'stock_producto'},
//       {data: 'stock_maximo'},
//       {data: 'precio'},
//       {"orderable":true,
//       render:function(data, type, row){
//         return '<div class="btn-group" role="group">'+
//         '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
//         'Acciones <span class="caret"></span>'+
//         '</button>'+
//         '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
//         '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="ingresar_cantidad(\''+row.cod_producto+'\',\''+row.stock_maximo+'\',\''+row.stock_producto+'\',\''+row.precio+'\');">Reabastecer</a></li>'+
//         '</ul>'+
//         '</div>'
//       }
//     }
//   ],
//   "order":[[0, "asc"]],
//   'language':español
// });
})
var valor_maximo;
// ingresar_cantidad = function(arg1, arg2, arg3, arg4){
//   $('#cantidad_actual').val(arg3);
//   $('#precio_unitario').val(arg4);
//   $('#ingresar_cantidad').modal({backdrop: "static", keyboard: false})
//   cant_maxima = parseInt(arg2)
//   cant_actual = parseInt(arg3)
//   valor_maximo = cant_maxima-cant_actual;
//   $('#cantidad_maxima').val(valor_maximo)
//   $('#producto_cod').val(arg1)
//   $('#stock_productox').keyup(function(){
//     console.log($(this).val());
//     if ($(this).val() > valor_maximo){
//       swal('La cantidad ingresada, supera a la capacidad máxima de almacenaje, por favor, ingrese un valor menor a la cantidad máxima expresa.');
//       $(this).val('');
//     }else if($(this).val()!=0){
//       monto_total = parseFloat($('#stock_productox').val())*parseFloat(arg4);
//       $('#monto_compra').val(monto_total);
//     }
//     if ($(this).val()==0){
//       $('#monto_compra').val('');
//     }
//   })
//   $('#descuentox').keyup(function(){
//     if ($('#descuentox').val()!=0){
//       var coeficiente = parseFloat($('#descuentox').val())/100;
//       descuento_valor = parseFloat($('#stock_productox').val())*parseFloat(arg4)*coeficiente;
//       monto_total = parseFloat($('#stock_productox').val())*parseFloat(arg4)-descuento_valor;
//       $('#monto_compra').val(monto_total);
//     }else{
//       monto_total = parseFloat($('#stock_productox').val())*parseFloat(arg4);
//       $('#monto_compra').val(monto_total);
//     }
//   })
// }

$('a[href="#finish"]').click(function(){
    $.post(base_url+'compras/guardar_compra',
    {
        cod_compra:$('#nro_compra').val(),
        empleado:$('#empleado').val(),
        cod_proveedor:$('#proveedor').val(),
        fecha_c:$('#fecha').val(),
        productos:seleccionadop,
        precio_unitario:producto_precio,
        descuentox:$('#oferta').val(),
        cantidad_p:valor_p,
    },
    function(data){
        if (data == 1){
            console.log('Compra satisfactoria');
            location.reload();
        }else{
            console.log('INCORRECTO');
        }
    })
})
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
      swal({
        title: 'Registro exitoso',
        type: 'info'
      },
      function(){
        location.reload()
      });
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
      swal(data);
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
cancelar = function(){
    var prod = seleccionadop.pop();
    $('#p'+prod+'').prop('checked', false);
    producto_precio.pop();
    if($('#producto_cant').val()>0){
        valor_p.pop();
    }
    if(seleccionadop.length>0){
      $('a[href="#finish"]').parent().css('display', 'block');
    }else{
      $('a[href="#finish"]').parent().css('display', 'none');
    }
}
cantidad = function(arg1){
    $.post(base_url+'productos/buscar_producto',
    {
        cod_pr:arg1,
    },
    function(data){
        datos = eval(data);
        console.log(datos)
        $('#cant_act').val(datos[0]['stock_producto']);
        var cantidad_act = parseInt(datos[0]['stock_producto']);
        var cantidad_max = parseInt(datos[0]['stock_maximo']);
        var cantidad_permitida= cantidad_max-cantidad_act
        $('#cant_max').val(cantidad_permitida);
        // $('#cant_prod').keyup(function(){
        //     if ($('#cant_prod').val()>parseInt(cantidad_permitida)){
        //         swal('La cantidad ingresada, supera a la capacidad del almacen.')
        //         $('#cant_prod').val('');
        //     }
        // })
    })
    $('#producto_cant').modal({backdrop: "static", keyboard: false})
    $('#confirm_cant').click(function(){
        if ($('#cant_prod').val()>0){
          if(valor_p.includes($('#cant_prod').val())==false){
               valor_p.push($('#cant_prod').val());
               $('#producto_cant').modal('hide')
               console.log(valor_p)
             }
        // }else {
        //     swal('El campo "cantidad" es requerido.')
        //     $(this).focus();
        }
    })
    // var cantidad = prompt('Ingrese la cantidad requerida:');
    // if (cantidad != null){
    //     valor_p.push(cantidad);
    // }
    console.log(valor_p)
}
});
