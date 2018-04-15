$(document).on('ready', function () {
    activar_menu('empleados', true);
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });
    $('#dt_table').DataTable({
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            "url": base_url + "empleados/consultar",
            "type": "POST",
            dataSrc: ''
        },
        'columns': [{
                data: 'cod_persona'
            },
            {
                data: 'nombres'
            },
            {
                data: 'apellido_paterno'
            },
            {
                data: 'apellido_materno'
            },
            {
                data: 'cargo'
            },
            {
                data: 'ruc'
            },
            {
                data: 'email'
            },
            {
                data: 'genero'
            },
            {
                data: 'tel_movil'
            },
            {
                data: 'ciudad_direccion'
            },
            {
                "orderable": true,
                render: function (data, type, row) {
                    return '<div class="btn-group" role="group">' +
                        '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        'Acciones <span class="caret"></span>' +
                        '</button>' +
                        '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">' +
                        '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\'' + row.cod_persona + '\',\'' + row.nombres + '\',\'' + row.apellido_paterno + '\',\'' + row.apellido_materno + '\',\'' + row.cargo + '\',\'' + row.ruc + '\',\'' + row.email + '\',\'' + row.direccion + '\',\'' + row.genero + '\',\'' + row.tel_movil + '\',\'' + row.ciudad_nacimiento + '\',\'' + row.ciudad_direccion + '\',\'' + row.estado_civil + '\',\'' + row.nro_cuenta_bancaria + '\',\'' + row.nombre_banco + '\',\'' + row.tel_domicilio + '\',\'' + row.tel_movil + '\',\'' + row.operador_movil + '\',\'' + row.fecha_nacimiento + '\',\'' + row.tipo_persona + '\');">Editar</a></li>' +
                        '<li><a href="javascript:void(0);" class=" waves-effect waves-block" onClick="deldat(\'' + row.cod_persona + '\')">Eliminar</a></li>' +
                        '</ul>' +
                        '</div>'
                }
            }
        ],
        "order": [
            [1, "asc"]
        ],
        'language': español
    });


    editClient = function (cod_persona, nombres, apellido_paterno, apellido_materno, cargo, ruc, email, direccion, genero, tel_movil, ciudad_nacimiento, ciudad_direccion, estado_civil, nro_cuenta_bancaria, nombre_banco, tel_domicilio, tel_movil, operador_movil, fecha_nacimiento, tipo_persona) {
        if (fecha_nacimiento == 'null') {
            fecha_nacimiento = '';
        };
        if (nombre_banco == 'null') {
            nombre_banco = '';
        };
        if (operador_movil == 'null') {
            operador_movil = '';
        };
        if (email == 'null') {
            email = '';
        };
        if (direccion == 'null') {
            direccion = '';
        };

        $('#cod_persona_e').val(cod_persona);
        $('#nombres_e').val(nombres);
        $('#apellido_paterno_e').val(apellido_paterno);
        $('#apellido_materno_e').val(apellido_materno);
        $('#ru_e').val(ruc);
        $('#email_e').val(email);
        $('input:radio[name="genero_e"][value="' + genero + '"]').prop('checked', true);
        $('#tel_movil_e').val(tel_movil);
        $('#direccion_e').val(direccion);
        $('#bancaria_e').val(nro_cuenta_bancaria);
        $('#banco_e').val(nombre_banco);
        $('#telefono_domicilio_e').val(tel_domicilio);
        $('#operador_e').val(operador_movil);
        $('#nacimiento_e').val(fecha_nacimiento);
        $("#ciudad_e option:contains('" + ciudad_nacimiento + "')").attr("selected", true);
        $("#ciudad1_e option:contains('" + ciudad_direccion + "')").attr("selected", true);
        $("#civil_e option:contains('" + estado_civil + "')").attr("selected", true);
        $("#persona_e option:contains('" + tipo_persona + "')").attr("selected", true);
        $("#cargo_e option:contains('" + cargo + "')").attr("selected", true);
        enviar = function () {
            $.post(base_url + "empleados/actualizar", {
                    cod_persona: $('#cod_persona_e').val(),
                    nombres: $('#nombres_e').val(),
                    apellido_paterno: $('#apellido_paterno_e').val(),
                    apellido_materno: $('#apellido_materno_e').val(),
                    ruc: $('#ru_e').val(),
                    email: $('#email_e').val(),
                    genero: $('input[name=genero_e]:checked', '#editar').val(),
                    tel_movil: $('#tel_movil_e').val(),
                    direccion: $('#direccion_e').val(),
                    bancaria: $('#bancaria_e').val(),
                    banco: $('#banco_e').val(),
                    telefono_domicilio: $('#telefono_domicilio_e').val(),
                    operador: $('#operador_e').val(),
                    nacimiento: $('#nacimiento_e').val(),
                    ciudad: $('#ciudad_e').val(),
                    ciudad1: $('#ciudad1_e').val(),
                    civil: $('#civil_e').val(),
                    persona: $('#persona_e').val(),
                    cargo: $('#cargo_e').val()
                },
                function (data) {
                    if (data == 1) {
                        swal({
                                title: 'Cambios guardados correctamente.',
                                type: 'info'
                            },
                            function () {
                                $('#cerrar_modal').click();
                                location.reload();
                            });
                    }
                });
        }
    };
    deldat = function (cod_persona) {
        $.post(base_url + 'empleados/eliminar', {
                cod_persona: cod_persona,
            },
            function (data) {
                if (data == 1) {
                    swal({
                            title: 'El registro fue eliminado correctamente',
                            type: 'info'
                        },
                        function () {
                            location.reload();
                        });
                }
            });
    };

    insertdat = function (cod_persona, nombres, apellido_paterno, apellido_materno, area, cargo, ruc, email, genero, tel_movil, ciudad) {
        if($('#mode').val()=='1'){
            var sub_url = 'actualizar';
        }else{
            var sub_url= 'guardar';
        }
        $.post(base_url + 'empleados/'+sub_url, {
                cod_persona: $('#cod_persona_c').val(),
                nombres: $('#nombres_c').val(),
                apellido_paterno: $('#apellido_paterno_c').val(),
                apellido_materno: $('#apellido_materno_c').val(),
                area: $('#area_c').val(),
                cargo: $('#cargo_c').val(),
                ruc: $('#ruc_c').val(),
                email: $('#email_c').val(),
                genero: $('input[name=genero_c]:checked', '#crear').val(),
                tel_movil: $('#tel_movil_c').val(),
                ciudad: $('#ciudad_c').val()
            },
            function (data) {
                if (data == 1) {
                    swal({
                            title: 'El registro fue almacenado correctamente',
                            type: 'info'
                        },
                        function () {
                            location.reload();
                        });
                }
            });
    };
    insertdatextend = function (cod_persona, nombres, apellido_paterno, apellido_materno, area, ruc, email, genero, tel_movil, ciudad, direccion, bancaria, banco, telefono_domicilio, operador, ciudad1, civil, persona, cargo) {
        if($('#cod_persona_r').val()!='' && $('#cod_persona_r').val().length==8){
            if($('#mode').val()=='1'){
                var sub_url = 'actualizar';
            }else{
                var sub_url= 'almacenar';
            }
            $.post(base_url + 'empleados/'+sub_url, {
                    cod_persona: $('#cod_persona_r').val(),
                    nombres: $('#nombres_r').val(),
                    apellido_paterno: $('#apellido_paterno_r').val(),
                    apellido_materno: $('#apellido_materno_r').val(),
                    ruc: $('#ruc_r').val(),
                    email: $('#email_r').val(),
                    genero: $('input[name=genero_r]:checked', '#crear').val(),
                    tel_movil: $('#tel_movil_r').val(),
                    ciudad: $('#ciudad_r').val(),
                    direccion: $('#direccion_r').val(),
                    bancaria: $('#bancaria_r').val(),
                    banco: $('#banco_r').val(),
                    telefono_domicilio: $('#telefono_domicilio_r').val(),
                    operador: $('#operador_r').val(),
                    nacimiento: $('#nacimiento_r').val(),
                    ciudad1: $('#ciudad1_r').val(),
                    civil: $('#civil_r').val(),
                    persona: $('#persona_r').val(),
                    cargo: $('#cargo_r').val(),
                    area: $('#area_r').val()
                },
                function (data) {
                    if (data == 1) {
                        swal({
                                title: 'El registro fue correctamente almacenado',
                                type: 'info'
                            },
                            function () {
                                location.reload();
                            });
                    }
                }
            );
        }else{
            swal({
                title: 'Ha ocurrido un error!',
                text: 'Verifica el campo DNI, este debe contener 8 caracteres',
                type: 'warning'
            });
            $('#cod_persona_r').parent().addClass('error');
        }
    }

});


$('#cod_persona_c').keyup(function(){
    var persona = $(this).val();
    if(persona.length==8){
        $('#cod_persona_c').parent().removeClass('error');
        $.ajax({
            url: base_url+'empleados/consultar_clientes',
            type: 'get',
            dataType: 'json',
            data:{cod_persona: persona},
            success: function(response){
                if (response.length>0){
                    $('input.form-control').parent().addClass('focused');
                    console.log(response);
                    $.each(response, function(key, value){
                        $('#nombres_c').val(value.nombres);
                        $('#apellido_paterno_c').val(value.apellido_paterno);
                        $('#apellido_materno_c').val(value.apellido_materno);
                        $('#ruc_c').val(value.ruc);
                        $('#email_c').val(value.email);
                        $('input:radio[name="genero_c"][value="' + value.genero + '"]').prop('checked', true);
                        $('#tel_movil_c').val(value.tel_movil);
                        $("#ciudad_c option:contains('" + value.ciudad_direccion + "')").attr("selected", true);
                        $("#cargo_c option:contains('" + value.cargo + "')").attr("selected", true);
                    })
                    $('#mode').val('1');
                }else{
                    $('#mode').val('0');
                }
            }
        });
    }
})
$('#cod_persona_r').keyup(function(){
    var persona = $(this).val();
    if(persona.length==8){
        $('#cod_persona_r').parent().removeClass('error');
        $.ajax({
            url: base_url+'empleados/consultar_clientes',
            type: 'get',
            dataType: 'json',
            data:{cod_persona: persona},
            success: function(response){
                if (response.length>0){
                    $('input.form-control').parent().addClass('focused');
                    $.each(response, function(key, value){
                        $('#nombres_r').val(value.nombres);
                        $('#apellido_paterno_r').val(value.apellido_paterno);
                        $('#apellido_materno_r').val(value.apellido_materno);
                        $('#ruc_r').val(value.ruc);
                        $('#email_r').val(value.email);
                        $('input:radio[name="genero_r"][value="' + value.genero + '"]').prop('checked', true);
                        $('#tel_movil_r').val(value.tel_movil);
                        $('#direccion_r').val(value.direccion);
                        $('#bancaria_r').val(value.nro_ruenta_bancaria);
                        $('#banco_r').val(value.nombre_banco);
                        $('#telefono_domicilio_r').val(value.tel_domicilio);
                        $('#operador_r').val(value.operador_movil);
                        $('#nacimiento_r').val(value.fecha_nacimiento);
                        $("#ciudad_r option:contains('" + value.ciudad_nacimiento + "')").attr("selected", true);
                        $("#ciudad1_r option:contains('" + value.ciudad_direccion + "')").attr("selected", true);
                        $("#civil_r option:contains('" + value.estado_rivil + "')").attr("selected", true);
                        $("#persona_r option:contains('" + value.tipo_persona + "')").attr("selected", true);
                        $("#cargo_r option:contains('" + value.cargo + "')").attr("selected", true);
                    })
                    console.log(response);
                }
            }
        });
    }
})