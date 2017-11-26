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
        "url": base_url+"clientes/consultar",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'cod_persona'},
        {data: 'nombres'},
        {data: 'apellido_paterno'},
        {data: 'apellido_materno'},
        {data: 'ruc'},
        {data: 'email'},
        {data: 'genero'},
        {data: 'tel_movil'},
        {data: 'ciudad_direccion'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_persona+'\',\''+row.nombres+'\',\''+row.apellido_paterno+'\',\''+row.apellido_materno+'\',\''+row.ruc+'\',\''+row.email+'\',\''+row.genero+'\',\''+row.tel_movil+'\',\''+row.direccion+'\',\''+row.ciudad_nacimiento+'\',\''+row.ciudad_direccion+'\',\''+row.estado_civil+'\',\''+row.nro_cuenta_bancaria+'\',\''+row.nombre_banco+'\',\''+row.tel_domicilio+'\',\''+row.tel_movil+'\',\''+row.operador_movil+'\',\''+row.fecha_nacimiento+'\',\''+row.profesion+'\',\''+row.num_hijos+'\',\''+row.estatura_cm+'\',\''+row.peso_kg+'\',\''+row.tipo_sangre+'\',\''+row.tipo_persona+'\',\''+row.hobby+'\',\''+row.deporte_favorito+'\',\''+row.observacion_persona+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_persona+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[0, "asc"]],
'language': español
});


editClient = function(cod_persona, nombres, apellido_paterno, apellido_materno, ruc, email, genero, tel_movil, direccion, ciudad_nacimiento, ciudad_direccion, estado_civil, nro_cuenta_bancaria, nombre_banco, tel_domicilio, tel_movil, operador_movil, fecha_nacimiento, profesion, num_hijos, estatura_cm, peso_kg, tipo_sangre, tipo_persona, hobby, deporte_favorito, observacion_persona){
    $('#cod_persona_e').val(cod_persona);
    $('#nombres_e').val(nombres);
    $('#apellido_paterno_e').val(apellido_paterno);
    $('#apellido_materno_e').val(apellido_materno);
    $('#ruc_e').val(ruc);
    $('#email_e').val(email);
    $('input:radio[name="genero_e"][value="'+genero+'"]').prop('checked', true);
    $('#tel_movil_e').val(tel_movil);
    $('#direccion_e').val(direccion);
    $('#bancaria_e').val(nro_cuenta_bancaria);
    $('#banco_e').val(nombre_banco);
    $('#telefono_domicilio_e').val(tel_domicilio);
    $('#operador_e').val(operador_movil);
    $('#nacimiento_e').val(fecha_nacimiento);
    $('#profesion_e').val(profesion);
    $('#hijos_e').val(num_hijos);
    $('#estatura_e').val(estatura_cm);
    $('#peso_e').val(peso_kg);
    $("#sangre_e option:contains('"+tipo_sangre+"')").attr("selected",true);
    $('#hobby_e').val(hobby);
    $('#deporte_e').val(deporte_favorito);
    $("#ciudad_e option:contains('"+ciudad_nacimiento+"')").attr("selected",true);
    $("#ciudad1_e option:contains('"+ciudad_direccion+"')").attr("selected",true);
    $("#civil_e option:contains('"+estado_civil+"')").attr("selected",true);
    $("#persona_e option:contains('"+tipo_persona+"')").attr("selected",true);
    enviar = function(){
        $.post(base_url+"clientes/actualizar",
        {
            cod_persona:$('#cod_persona_e').val(),
            nombres:$('#nombres_e').val(),
            apellido_paterno:$('#apellido_paterno_e').val(),
            apellido_materno:$('#apellido_materno_e').val(),
            ruc:$('#ruc_e').val(),
            email:$('#email_e').val(),
            genero:$('input[name=genero_e]:checked', '#editar').val(),
            tel_movil:$('#tel_movil_e').val(),
            direccion:$('#direccion_e').val(),
            bancaria:$('#bancaria_e').val(),
            banco:$('#banco_e').val(),
            telefono_domicilio:$('#telefono_domicilio_e').val(),
            operador:$('#operador_e').val(),
            nacimiento:$('#nacimiento_e').val(),
            profesion:$('#profesion_e').val(),
            hijos:$('#hijos_e').val(),
            estatura:$('#estatura_e').val(),
            peso:$('#peso_e').val(),
            sangre:$('#sangre_e').val(),
            hobby:$('#hobby_e').val(),
            deporte:$('#deporte_e').val(),
            ciudad:$('#ciudad_e').val(),
            ciudad1:$('#ciudad1_e').val(),
            civil:$('#civil_e').val(),
            persona:$('#persona_e').val(),
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

deldat = function(cod_persona){
    $.post(base_url+'clientes/eliminar',
    {
        cod_persona:cod_persona,
    },
    function(data){
        if (data == 1){
            alert('El registro se ha sido eliminado correctamente');
            location.reload();
        }
    });
};

insertdat = function(cod_persona, nombres, apellido_paterno, apellido_materno, ruc, email, genero, tel_movil, ciudad){
    $.post(base_url+'clientes/guardar',
    {
        cod_persona:$('#cod_persona_c').val(),
        nombres:$('#nombres_c').val(),
        apellido_paterno:$('#apellido_paterno_c').val(),
        apellido_materno:$('#apellido_materno_c').val(),
        ruc:$('#ru_c').val(),
        email:$('#email_c').val(),
        genero:$('input[name=genero_c]:checked', '#crear').val(),
        tel_movil:$('#tel_movil_c').val(),
        ciudad:$('#ciudad_c').val()
    },
    function(data){
        if(data == 1){
            alert('El registro fue correctamente almacenado');
            location.reload();
        }
        alert(data);
    });
};
insertdatextend = function(cod_persona, nombres, apellido_paterno, apellido_materno, ruc, email, genero, tel_movil, ciudad, direccion, bancaria, banco, telefono_domicilio, operador, profesion, hijos, estatura, peso, sangre, hobby, deporte, ciudad1, civil, persona, cargo){
    $.post(base_url+'clientes/almacenar',
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
    },
    function(data){
        if(data == 1){
            alert('El registro fue correctamente almacenado');
            location.reload();
        }
        alert(data);
    });
};

});
