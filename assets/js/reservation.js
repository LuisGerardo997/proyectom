var primary_date = new Date();
var local_date = primary_date.getFullYear()+"-"+(primary_date.getMonth()+1)+"-"+primary_date.getDate();
var max_date = (primary_date.getFullYear()+1)+"-"+(primary_date.getMonth()+1)+"-"+primary_date.getDate();
var room_checked = new Array();
var room_type_list = new Array();
var watcher;
var fecha_salida = $('#fecha_salida');
var fecha_estadia = $('#fecha_estadia');
var room_display = $('#room_display');
// $('div[name="div_btn_reservar"]').css('display', 'none');
$('input[name="daterange"]').daterangepicker(
{
    locale: {
      format: 'YYYY-MM-DD'
    },
    startDate: local_date,
    endDate: max_date
},
function(start, end, label) {
    alert("Se ha seleccionado el rango de días, desde el " + start.format('YYYY-MM-DD') + ' hasta el ' + end.format('YYYY-MM-DD'));
});

$('.room_type').mouseover(function(){
  document.body.style.cursor='pointer';
  // $(this).click(function(){
  //   $(this).addClass('selected_item');
  // })
})
$('.room_type').mouseout(function(){
  document.body.style.cursor='default';
  // $(this).click(function(){
  //   $(this).removeClass('selected_item');
  // })
})

function calcular_total(array){
  var total = 0;
  array.forEach(function(a){
    total+=parseFloat(a.price);
  })
  return total;
}

function find_el(array, elemento)
{
  var status = false;
  var index = -1;
  array.forEach(function(e){
    if(e.sku == elemento){
      status = true;
    }
    index+=1;
  });
  var result = [status, index];
  return result;
};

var room_details = new Array();
var type;
function start_trigger(){
  $('.room_type').click(function(){
    var room = $(this).attr('value');
    var capacity = $(this).attr('capacity');
    type='';
    type = $(this).attr('data-type');
    // console.log(capacity);
    // alert(room);
    $.ajax({
      url:base_url+'reservar/consultar_disponibilidad',
      type: 'POST',
      data: {
        'fecha_estadia': fecha_estadia.val(),
        'fecha_salida': fecha_salida.val(),
        'tipo_habitacion': room,
      },
      dataType: 'JSON',
      success: function(r){
        var index = parseInt(room)-1
        room_type_list[index]=r;
        // console.log(room_type_list[index]);
        // alert(r.length);
        $('.room-list').html('');
        room_details.length=0;
        room_details = r;
        for (var i = 0; i < r.length; i++){
          var html = '<div class="clearfix col-md-4">'+
                '<div class="panel panel-rooms text-center">'+
                '<div class="checkbox">'+
                  '<label>'+
                    '<input type="checkbox" id="'+r[i]['cod_habitacion']+'" data-price="'+r[i]['precio']+'" name="habitaciones_in" value="'+r[i]['cod_habitacion']+'">'+
                    '&nbsp; <span class="list-input">Habitación '+r[i]['cod_habitacion']+'</span>'+
                  '</label>'+
                '</div>'+
                '</div>'+
              '</div>';
            $('.room-list').append(html);
          }
      }
    }).error(function(){
      alert('error');
    }).done(function(){
      $('input[name="habitaciones_in"]').click(function(){
        // alert($(this).val());
        var room_number = $(this).val();
        var room_price = (Math.round(parseFloat($(this).attr('data-price'))*0.31*100)/100);
        var pos = find_el(room_checked, room_number)[1];
        if (find_el(room_checked, room_number)[0]==false){
          room_checked.push({
            'name'  :'Habitacion '+room_number,
            'sku'  :room_number,
            'description'  :'Alquiler de habitacion '+room_number,
            'quantity' : '1',
            'currency' : 'USD',
            'price' : room_price,
            // 'type'  :type,
          });
          console.log(room_checked);
          var details =
          '<div id="d'+room_number+'">'+
          '<h4 class="label-group text-center">Habitacion '+room_number+'</h4>'+
          '<div class="text-center">'+
            '<h5>Precio: </h5>'+
            '<span class="price-text"> s/.'+room_price+'</span>'+
          '</div>'+
          '<br/>'+
          '<div class="clearfix">'+
              '<div class="check_availability-field_group text-center">'+
                  '<div class="form-group col-md-6 col-sm-6">'+
                      '<label>Adultos</label>'+
                      '<select name="adults" class="form-control col-sm-6">'+
                        '<option value="0">0</option>';
                      for (var j = 1; j <= capacity; j++)
                      {
                        details +='<option value="'+j+'">'+j+'</option>';
                      }
                      details +=
                      '</select>'+
                  '</div>'+
                  '<div class="form-group col-md-6 col-sm-6">'+
                      '<label>Niños</label>'+
                      '<select name="children" class="form-control">'+
                        '<option value="0">0</option>';
                      for (var j = 1; j <= capacity; j++)
                      {
                        details +='<option value="'+j+'">'+j+'</option>';
                      }
                      details +=
                      '</select>'+
                  '</div>'+
              '</div>'+
          '</div>'+
          '<hr>'+
          '</div>';
          $('.reservation_details p').css('display', 'none');
          $('.reservation_details').append(details);
          $('#total_count').html(calcular_total(room_checked));
          $('input[name="details_subtotal"]').val(calcular_total(room_checked));
          $('input[name="items"]').val(JSON.stringify(room_checked));
          // var direccion = base_url+'paypal/comprar.php?total='+calcular_total(room_checked);
          // $('button[name="total"]').attr('href', direccion);
        }else{
          room_checked.splice(pos);
          if(room_checked.length == 0){
            $('.reservation_details p').css('display', 'block');
          }
          $('.reservation_details div[id="d'+room_number+'"]').remove();
        }
      })
        room_checked.forEach(function(c){
          $('#'+c.sku).prop('checked', 1);
          console.log(room_checked, c, c.sku);
        })
        console.log(room_checked);
    })
    $('#room_modal').modal();
  })
}
$('.reservation_details').click(function(){
  watcher = 1;
})
// var adults_by_room = new Array();
// var children_by_room = new Array();
// $('button[name="btn_reservar"]').click(function(e){
//   e.preventDefault();
//   $('input[name="rooms"]').val(room_checked);
//   $('select[name="adults"]').each(function(){
//     adults_by_room.push($(this).val());
//   })
//   $('select[name="children"]').each(function(){
//     children_by_room.push($(this).val());
//   })
//   $('input[name="adults_by_room"]').val(adults_by_room);
//   $('input[name="children_by_room"]').val(children_by_room);
//
//   if(watcher != 1)
//   {
//     alert('No se ha especificado el número de huéspedes en las habitaciones: ');
//   }
//   data = $('form[name="reservation_form"]').serialize();
//   console.log(data);
// })
$('.reservation_step ul li a').click(function(e){
  e.preventDefault();
  activeTab($(this));
  // alert(toggle);
})
// $('a.disabled').parents().mouseover(function(){
//   var y = $(this);
//   y.css('background-color', '#ffffff');
// })
$('button[name="btn_next"]').click(function(e){
  e.preventDefault();
  $('li a.disabled').each(function(){
    var x = $(this);
    activeTab(x);
    x.removeClass('disabled');
    return false;
  })
  // $('#paypal_form').html('');
  // var html =
  // '<input type="hidden" name="cmd" value="_cart">'+
  // '<input type="hidden" name="upload" value="1">'+
  // '<input type="hidden" name="business" value="luis63r4rd0@gmail.com">';
  // for(var i = 0; i<room_checked.length; i++){
  //   html+=
  //   '<input type="hidden" name="item_name_'+(parseInt(i)+1)+'" value="'+'Habitacion '+room_checked[i]['name']+' - '+room_checked[i]['type']+'">'+
  //   '<input type="hidden" name="amount_'+(parseInt(i)+1)+'" value="'+(parseFloat(room_checked[i]['price'])/3.2)+'">'+
  //   '<input type="hidden" name="quantity_'+(parseInt(i)+1)+'" value="2">';
  //   // $('input[name="item_name_1"]').val('Habitacion '+i['room']+' - '+i['type']);
  // }
  // html+=
  // '<input type="submit" value="PayPal">';
  // $('#paypal_form').html(html);
})
function activeTab(a){
  var div_active = $('.reservation_step ul li.active').children().attr('data-toggle');
  $(div_active).fadeOut('200');
  var toggle = a.attr('data-toggle');
  // console.log(toggle);
  a.parents().addClass('active').siblings().removeClass('active');
  $(toggle).fadeIn('250');
  $(toggle).addClass('active').siblings().removeClass('active');
  // if(toggle=='#pay_step'){
  //   $('#details-content').animate({left: '180px'});
  // }else{
  //   $('#details-content').css('left','180px').animate({left: '0px'}, 'slow');
  // }
}
function check_room_type(){
  $.ajax({
    url: base_url+'reservar/tipo_habitacion',
    data: {
      'fecha_estadia': fecha_estadia.val(),
      'fecha_salida': fecha_salida.val(),
    },
    type: 'get',
    dataType: 'JSON',
    success: function(r){
      room_display.html('');
      var html = '';
      r.forEach(function(u){
        html+= '<div class="col-md-4 room_type" value="'+u.cod_tipo_habitacion+'" data-type="tipo_habitacion" capacity="'+u.max_h+'" href="javascript:void(0);" style="margin-bottom:30px;">'+
                  '<div class="price-block agile">'+
                    '<div class="price-gd-top">'+
                      '<img src="'+base_url+'images/habitaciones/'+u.tipo_habitacion.toLowerCase()+'.jpg" alt=" " class="img-responsive" />'+
                      '<a href="#more">'+
                        '<h4>'+u.tipo_habitacion+'</h4>'+
                      '</a>'+
                    '</div>'+
                    '<div class="price-gd-bottom">'+
                      '<div class="clearfix">'+
                        '<div class="price col-lg-6">'+
                          '<span><strong>Precio: </strong> <p>s/.'+u.precio+'</p></span>'+
                        '</div>'+
                        '<div class="capacity col-lg-6">'+
                          '<span><strong>Capacidad: </strong> <p>'+u.max_h+' personas</p></span>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>';
      });
      room_display.html(html).fadeIn();
      start_trigger();
    }
  });
};
fecha_estadia.change(function(){
  fecha_salida.change(function(){
   check_room_type();
  })
});
$(document).ready(function(){
  // fecha_salida.attr('disabled', 'disabled');
  fecha_estadia.datepicker({
    dateFormat: "yy-mm-dd"
  });
  fecha_salida.datepicker({
    dateFormat: "yy-mm-dd"
  });
  start_trigger();
});
