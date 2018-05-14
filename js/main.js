var datos = new Array();
var cont = 0;
function actual_list(){
    $.ajax({
        url: base_url+'home/lista_actual',
        type: 'get',
        dataType: 'json',
        success: function(response){
            datos = response;
        }
    })
}
function mostrar_notificaciones(){
    actual_list();
    $.ajax({
        url: base_url+'login/reservaciones_terminadas',
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response.length>0){
                console.log(response);
                if (cont==0){
                    // show_notify();
                    var html = '';
                    for(var i = 0; response.length>i; i++){
                        html +=  '<li>'+
                                    '<a href="'+base_url+'reservaciones">'+
                                        '<div class="icon-circle bg-indigo">'+
                                            '<i class="material-icons">hotel</i>'+
                                        '</div>'+
                                        '<div class="menu-info">'+
                                            '<div style="width:210px;">'+
                                            '<h4>La estadía '+response[i]['cod_estadia']+' ha finalizado.</h4>'+
                                            '</div>'+
                                            '<p>'+
                                            '<i class="material-icons">access_time</i> 14 mins ago'+
                                            '</p>'+
                                        '</div>'+
                                    '</a>'+
                                '</li>';
                    }
                    $('#notificaciones').html(html);
                }
                cont = 1;
                // if(datos != response){
                //     $.each(response, function(key, value){
                //         show_notify(value.cod_estadia);
                //     })
                //     $.ajax({
                //         url: base_url+'home/nueva_lista',
                //         type: 'post',
                //         data: {arreglo: response}
                //     });
                // }
                $('#counter').html(response.length);
                // if (response!=datos){
                //     response.forEach(function(i){
                //         show_notify(i['cod_estadia']);
                //     })
                // }
            }
        }
    })
    console.log('hi');
};
function activar_menu(item, nested){
    if(!nested){
        $('#'+item+'').addClass('active').siblings().removeClass('active');
    }else{
        $('#'+item).addClass('active').children().addClass('toggled').parents('li').addClass('active').siblings().removeClass('active');
        $('#'+item).parents().siblings('a').addClass('toggled');
        $('#'+item).parents('ul').addClass('active').css('display', 'block');
    }
}

$(document).ready(function(){
    setInterval(mostrar_notificaciones, 1000);
});
function show_notify(){
    $.notify({
        // options
        title: 'Tienes nuevas notificaciones <br>',
        message: 'Haga click en la campana, para ver todas.',
    },{
        type: 'info',
	    delay: 2000,
    });
}
