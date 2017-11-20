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
        "url":base_url+"usuarios/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_persona'},
        {data: 'usuario'},
        {data: 'nombres'},
        {data: 'apellido_paterno'},
        {data: 'apellido_materno'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_persona+'\',\''+row.usuario+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_persona+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
'language':español
});


editClient = function(cod_persona, usuario){
    $('#usuario_e').val(usuario);
    enviar = function(){
        $.post(base_url+"usuarios/actualizar",
        {
            cod_persona:cod_persona,
            usuario:$('#usuario_e').val(),
        },
        function(data){
            if (data == 1){
                alert('Guardado');
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
    });
};

insertdat = function(cod_persona, nombres, apellido_paterno, apellido_materno, area, cargo, ruc, email, genero, tel_movil, ciudad){
    $.post(base_url+'usuarios/guardar',
    {
        cod_persona:$('#cod_persona').val(),
        user:$('#usuario').val(),
        pass:$('#contrasea').val(),
    },
    function(data){
        if(data == 1){
            alert('El registro fue almacenado correctamente');
            location.reload();
        }
    });
};
insertdatextend = function(cod_persona, nombres, apellido_paterno, apellido_materno, area, ruc, email, genero, tel_movil, ciudad,direccion, bancaria, banco, telefono_domicilio, operador, profesion, hijos, estatura, peso, sangre, hobby, deporte, ciudad1, civil, persona, cargo){
    $.post(base_url+'empleados/almacenar',
    {
        cod_persona:$('#cod_persona_r').val(),
        nombres:$('#nombres_r').val(),
        apellido_paterno:$('#apellido_paterno_r').val(),
        apellido_materno:$('#apellido_materno_r').val(),
        ruc:$('#ruc_r').val(),
        email:$('#email_r').val(),
        genero:$('input[name=genero_r]:checked', '#crear').val(),
        tel_movil:$('#tel_movil_r').val(),
        ciudad:$('#ciudad_r').val(),
        direccion:$('#direccion_r').val(),
        bancaria:$('#bancaria_r').val(),
        banco:$('#banco_r').val(),
        telefono_domicilio:$('#telefono_domicilio_r').val(),
        operador:$('#operador_r').val(),
        nacimiento:$('#nacimiento_r').val(),
        profesion:$('#profesion_r').val(),
        hijos:$('#hijos_r').val(),
        estatura:$('#estatura_r').val(),
        peso:$('#peso_r').val(),
        sangre:$('#sangre_r').val(),
        hobby:$('#hobby_r').val(),
        deporte:$('deporte_r').val(),
        ciudad1:$('#ciudad1_r').val(),
        civil:$('#civil_r').val(),
        persona:$('#persona_r').val(),
        cargo:$('#cargo_r').val(),
        area:$('#area_r').val()
    },
    function(data){
        if(data == 1){
            alert('El registro fue correctamente almacenado');
            location.reload();
        }
    });
};

});
