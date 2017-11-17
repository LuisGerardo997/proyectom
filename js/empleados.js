$(document).on('ready',function(){
$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url":base_url+"empleados/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_persona'},
        {data: 'nombres'},
        {data: 'apellido_paterno'},
        {data: 'apellido_materno'},
        {data: 'area'},
        {data: 'cargo'},
        {data: 'ruc'},
        {data: 'email'},
        {data: 'genero'},
        {data: 'tel_movil'},
        {data: 'ciudad'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_persona+'\',\''+row.nombres+'\',\''+row.apellido_paterno+'\',\''+row.apellido_materno+'\',\''+row.area+'\',\''+row.cargo+'\',\''+row.ruc+'\',\''+row.email+'\',\''+row.genero+'\',\''+row.tel_movil+'\',\''+row.ciudad+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_persona+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
'language':español
});


editClient = function(cod_persona, nombres, apellido_paterno, apellido_materno, area, cargo, ruc, email, genero, tel_movil, ciudad){
    $('#cod_persona').val(cod_persona);
    $('#nombres').val(nombres);
    $('#apellido_paterno').val(apellido_paterno);
    $('#apellido_materno').val(apellido_materno);
    $("#area option:contains('"+area+"')").attr("selected",true);
    $("#cargo option:contains('"+cargo+"')").attr("selected",true);
    $('#ruc').val(ruc);
    $('#email').val(email);
    $('input:radio[name="genero"][value="'+genero+'"]').prop('checked', true);
    $('#tel_movil').val(tel_movil);
    $("#ciudad option:contains('"+ciudad+"')").attr("selected",true);

 enviar = function(){
        $.post(base_url+"empleados/actualizar",
        {
            cod_persona:$('#cod_persona').val(),
            nombres:$('#nombres_e').val(),
            apellido_paterno:$('#apellido_paterno').val(),
            apellido_materno:$('#apellido_materno').val(),
            area:$('#area').val(),
            cargo:$('#cargo').val(),
            ruc:$('#ruc').val(),
            email:$('#email').val(),
            genero:$('input[name=genero]:checked', '#editar').val(),
            tel_movil:$('#tel_movil').val(),
            ciudad:$('#ciudad').val()
        },
        function(data){
            if (data == 1){
                alert('El registro fue guardado correctamente');
                $('#cerrar_modal').click();

                location.reload();
            }
        });
    }
};

deldat = function(cod_persona){
    $.post(base_url+'empleados/eliminar',
    {
        cod_persona:cod_persona,
    },
    function(data){
        if (data == 1){
            alert('El registro fue eliminado correctamente');
            location.reload();
        }
        alert(cod_persona);
    });
};

insertdat = function(cod_persona, nombres, apellido_paterno, apellido_materno, area, cargo, ruc, email, genero, tel_movil, ciudad){
    $.post(base_url+'empleados/guardar',
    {
        cod_persona:$('#cod_persona_c').val(),
        nombres:$('#nombres_c').val(),
        apellido_paterno:$('#apellido_paterno_c').val(),
        apellido_materno:$('#apellido_materno_c').val(),
        area:$('#area_c').val(),
        cargo:$('#cargo_c').val(),
        ruc:$('#ruc_c').val(),
        email:$('#email_c').val(),
        genero:$('input[name=genero_c]:checked', '#crear').val(),
        tel_movil:$('#tel_movil_c').val(),
        ciudad:$('#ciudad_c').val()
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
        alert(data);
    });
};

});
