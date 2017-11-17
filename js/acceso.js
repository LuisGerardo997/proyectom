$(document).on('ready',function(){
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"acceso/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_modulo'},
        {data: 'modulo'},
        {data: 'cod_perfil'},
        {data: 'perfil'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+'<li><a href="javascript:void(0);" class="waves-effect waves-block" onClick="deldat(\''+row.cod_modulo+'\',\''+row.cod_perfil+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language':español
});

editClient = function(cod_modulo, modulo, cod_perfil, perfil){
    $("#cod_modulo option:contains('"+modulo+"')").attr("selected",true);
    $("#cod_perfil option:contains('"+perfil+"')").attr("selected",true);
};

deldat = function(cod_modulo, cod_perfil){
    $.post(base_url+'acceso/eliminar',
    {
        cod_perfil:cod_perfil,
        cod_modulo:cod_modulo
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};
insertdat = function(cod_perfil, cod_modulo){
    $.post(base_url+'acceso/guardar',
    {
        cod_perfil:$('#cod_perfil_c').val(),
        cod_modulo:$('#cod_modulo_c').val(),
        cod_sub_modulo:$('#cod_sub_modulo_c').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            alert($('#cod_sub_modulo_c').val());
            location.reload();
        }else{
            alert('El registro no pudo ser almacenado');
        }
    });
};
$('#cod_modulo_c').change(function(){
    $('#cod_modulo_c option:selected').each(function(){
        var cod = $(this).val();
        $.post(base_url+'acceso/select3',
    {
        co:cod
    },
    function(data){
        var espacio = document.getElementById('espacio');
        if (data != 0){
            espacio.setAttribute("style","display:block");
            var datos = eval(data);
            var html = '';
            html += '<div class="col-md-12"><label for="cod_sub_modulo_c">Sub módulo</label>';
            html += '<select class="form-control show-tick" multiple id="cod_sub_modulo_c">';
            for (var i = 0; i < datos.length ; i++){
                html += '<option value="'+datos[i]['cod_modulo']+'">'+datos[i]['modulo']+'</option>';
            }
            html += '</select></div>';
            $('#espacio').html(html);
            $('#cod_sub_modulo_c').multiSelect();
        }else{
            espacio.setAttribute("style","display:none");
        }
    });
});
});
});
