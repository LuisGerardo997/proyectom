$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"modulo/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_modulo'},
        {data: 'pmodulo'},
        {data: 'modulo'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_modulo+'\',\''+row.pmodulo+'\',\''+row.cod_pmodulo+'\',\''+row.modulo+'\',\''+row.ruta+'\',\''+row.icono+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});

editClient = function(cod_modulo, pmodulo, cod_pmodulo, modulo, ruta, icono){
    $('#cod_modulo').val(cod_modulo);
    if (cod_pmodulo == 'null'){
        alert('padre')
        $('#ruta').val(ruta);
        $('#modulo').val(modulo);

    }else{
        $.post(base_url+'modulo/consultar_modulo_padre',
        {
            cod_modulo: cod_pmodulo,
        },
        function(data){
            var datos = eval(data);
            datos.forEach(function(x){
                if (x['parent_cod_modulo'] == null){
                    $('#pmodulo option:contains("'+x["modulo"]+'")').attr('selected', true)
                    nivel = 2
                }else{
                    $.post(base_url+'modulo/consultar_modulo_padre',
                    {
                        cod_modulo: x["modulo"],
                    }, function(data2){
                        var datos2 = eval(data2);
                        datos2.forEach(function(y){
                            var padre = y['parent_cod_modulo'];
                            $.post(base_url+'modulo/consultar_submodulos',
                            {
                              cod_modulo: padre,
                            },
                            function(data1){
                              if (data1 != ''){
                                var datos1 = eval(data1);
                                var html = '';
                                html += '<select name="submodulo" id="submodulo" class="form-control">'+
                                      '<option value="">-- Please select --</option>';
                                $('#submodulo_div_e').attr('style', 'display:block');
                                datos1.forEach(function(e){
                                  html+='<option value="'+e['cod_modulo']+'">'+e['pmodulo']+'</option>';
                                })
                                html+='</select>';
                                $('#contenedor_sub_e').html(html);
                                  $('#submodulo_div_e').attr('style', 'display:block');
                                $('#submodulo option:contains("'+x["modulo"]+'")').attr('selected', true)
                                $('#submodulo option:contains("'+y["modulo"]+'")').attr('selected', true)
                              }else{
                                $('#submodulo_div_e').attr('style', 'display:none');
                              }
                            })
                        })
                    })

                    nivel = 3
                }
            })
        })
    }
    $('#ruta').val(ruta);
    $('#modulo').val(modulo);
    // var generacion = 0;
    // $.post(base_url+'modulo/consultar_modulo_padre',
    // {
    //   cod_modulo: cod_modulo,
    // },
    // function(data){
    //     var datos = eval(data);
    //   if (datos != ''){
    //       var padre = datos['parent_cod_modulo'];
    //       $.post(base_url+'modulo/consultar_modulo_padre',
    //       {
    //           cod_modulo: padre,
    //       },
    //       function(data1){
    //           var datos1 = eval(data1);
    //           if (datos1['cod_modulo'] != ''){
    //               generacion = 3;
    //               alert('nieto')
    //           }else{
    //               generacion = 2;
    //               alert('hijo')
    //           }
    //       })
    //   }else{
    //       generacion = 1;
    //       alert('padre')
    //   }
    // })
    $('#submodulo').val(modulo);
    enviar = function(){
        $.post(base_url+"modulo/actualizar",{
            cod_modulo:$('#cod_modulo').val(),
            pmodulo:$('#pmodulo').val(),
            modulo:$('#modulo').val(),
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
deldat = function(cod_modulo){
    $.post(base_url+'modulo/eliminar',
    {
        cod_modulo:cod_modulo,
    },
    function(data){
        if (data == 1){
            alert('Eliminado');
            location.reload();
        }
    });
};
insertdat = function(cod_modulo, pmodulo, modulo){
    $.post(base_url+'modulo/guardar',
    {
      cod_modulo_c:$('#cod_modulo_c').val(),
      pmodulo_c:$('#pmodulo_c').val(),
      modulo_c:$('#modulo_c').val(),
      submodulo_c:$('#submodulo_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
$('#pmodulo_c').change(function(){
  var modulo = $(this).val();
  if (modulo != ''){
    $.post(base_url+'modulo/consultar_submodulos',
    {
      cod_modulo: modulo,
    },
    function(data){
      if (data != ''){
        var datos = eval(data);
        var html = '';
        html += '<select name="submodulo" id="submodulo_c" class="form-control">'+
              '<option value="">-- Please select --</option>';
        $('#submodulo_div').attr('style', 'display:block');
        datos.forEach(function(e){
          html+='<option value="'+e['cod_modulo']+'">'+e['pmodulo']+'</option>';
        })
        html+='</select>';
        $('#contenedor_sub').html(html);
      }else{
        $('#submodulo_div').attr('style', 'display:none');
      }
    })
  }else{
    $('#submodulo_div').attr('style', 'display:none');
  }
})
$('#pmodulo').change(function(){
  var modulo = $(this).val();
  if (modulo != ''){
    $.post(base_url+'modulo/consultar_submodulos',
    {
      cod_modulo: modulo,
    },
    function(data){
      if (data != ''){
        var datos = eval(data);
        var html = '';
        html += '<select name="submodulo" id="submodulo" class="form-control">'+
              '<option value="">-- Please select --</option>';
        $('#submodulo_div_e').attr('style', 'display:block');
        datos.forEach(function(e){
          html+='<option value="'+e['cod_modulo']+'">'+e['pmodulo']+'</option>';
        })
        html+='</select>';
        $('#contenedor_sub_e').html(html);
      }else{
        $('#submodulo_div_e').attr('style', 'display:none');
      }
    })
  }else{
    $('#submodulo_div_e').attr('style', 'display:none');
  }
})
});
