$(document).on('ready',function(){

$('#dt_table').DataTable({
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        "url": base_url+"/clientes/consultar",
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
        {data: 'ciudad'},
        {"orderable":true,
        render:function(data, type, row){
            return '<div class="btn-group" role="group">'+
            '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
            'Acciones <span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">'+
            '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\''+row.cod_persona+'\',\''+row.nombres+'\',\''+row.apellido_paterno+'\',\''+row.apellido_materno+'\',\''+row.ruc+'\',\''+row.email+'\',\''+row.genero+'\',\''+row.tel_movil+'\',\''+row.ciudad+'\');">Editar</a></li>'+
            '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\''+row.cod_persona+'\')">Eliminar</a></li>'+
            '</ul>'+
            '</div>'
        }
    }
],
"order":[[1, "asc"]],
'language': español
});


editClient = function(cod_persona, nombres, apellido_paterno, apellido_materno, ruc, email, genero, tel_movil, ciudad,direccion, bancaria, banco, telefono_domicilio, operador, profesion, hijos, estatura, peso, sangre, hobby, deporte, ciudad1, civil, persona){
    $('#cod_persona_e').val(cod_persona);
    $('#nombres_e').val(nombres);
    $('#apellido_paterno_e').val(apellido_paterno);
    $('#apellido_materno_e').val(apellido_materno);
    $('#ru_e').val(ruc);
    $('#email_e').val(email);
    //$('input[name=genero]').filter('[value='+genero+']').attr('checked', true);
    $('input:radio[name="genero_e"][value="'+genero+'"]').prop('checked', true);
    $('#tel_movil_e').val(tel_movil);
    $('#direccion_e').val(direccion);
    $('#bancaria_e').val(bancaria);
    $('#banco_e').val(banco);
    $('#telefono_domicilio_e').val(telefono_domicilio);
    $('#operador_e').val(operador);
    $('#nacimiento_e').val(nacimiento);
    $('#profesion_e').val(profesion);
    $('#hijos_e').val(hijos);
    $('#estatura_e').val(estatura);
    $('#peso_e').val(peso);
    $('#sangre_e').val(sangre);
    $('#hobby_e').val(hobby);
    $('#deporte_e').val(deporte);
    $("#ciudad_e option:contains('"+ciudad+"')").attr("selected",true);
    $("#ciudad1_e option:contains('"+ciudad1+"')").attr("selected",true);
    $("#civil_e option:contains('"+civil+"')").attr("selected",true);
    $("#persona_e option:contains('"+persona+"')").attr("selected",true);
    enviar = function(){
        $.post(base_url+"clientes/actualizar",
        {
            cod_persona:$('#cod_persona').val(),
            nombres:$('#nombres_e').val(),
            apellido_paterno:$('#apellido_paterno').val(),
            apellido_materno:$('#apellido_materno').val(),
            ruc:$('#ruc').val(),
            email:$('#email').val(),
            genero:$('input[name=genero]:checked', '#editar').val(),
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
                alert('Guardado');
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
            alert('Eliminado');
            location.reload();
        }
        alert(cod_persona);
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
insertdatextend = function(cod_persona, nombres, apellido_paterno, apellido_materno, ruc, email, genero, tel_movil, ciudad,direccion, bancaria, banco, telefono_domicilio, operador, profesion, hijos, estatura, peso, sangre, hobby, deporte, ciudad1, civil, persona, cargo){
    $.post(base_url+'clientes/almacenar',
    {
        cod_persona:$('#cod_persona_e').val(),
        nombres:$('#nombres_e').val(),
        apellido_paterno:$('#apellido_paterno_e').val(),
        apellido_materno:$('#apellido_materno_e').val(),
        ruc:$('#ru_e').val(),
        email:$('#email_e').val(),
        genero:$('input[name=genero_e]:checked', '#crear').val(),
        tel_movil:$('#tel_movil_e').val(),
        ciudad:$('#ciudad_e').val(),
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
        deporte:$('deporte_e').val(),
        ciudad1:$('#ciudad1_e').val(),
        civil:$('#civil_e').val(),
        persona:$('#persona_e').val(),
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
