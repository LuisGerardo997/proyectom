$(document).on('ready', function () {
    activar_menu('usuarios', true);
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
        'destroy': true,
        'ajax': {
            "url": base_url + "usuarios/consultar",
            "type": "POST",
            dataSrc: ''
        },
        'columns': [{
                data: 'cod_persona'
            },
            {
                data: 'usuario'
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
                "orderable": true,
                render: function (data, type, row) {
                    return '<div class="btn-group" role="group">' +
                        '<button id="btnGroupVerticalDrop1" type="button" class="btn white waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                        'Acciones <span class="caret"></span>' +
                        '</button>' +
                        '<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">' +
                        '<li><a data-toggle="modal" data-target="#editar" class=" waves-effect waves-block" onClick="editClient(\'' + row.cod_persona + '\',\'' + row.usuario + '\');">Editar</a></li>' +
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


    editClient = function (cod_persona, usuario) {
        $('#usuario_e').val(usuario);
        enviar = function () {
            $.post(base_url + "usuarios/actualizar", {
                    cod_persona: cod_persona,
                    usuario: $('#usuario_e').val(),
                },
                function (data) {
                    if (data == 1) {
                        alert('Guardado');
                        $('#cerrar_modal').click();

                        location.reload();
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
                    alert('El registro fue eliminado correctamente');
                    location.reload();
                }
            });
    };

    insertdat = function (cod_persona, nombres, apellido_paterno, apellido_materno, area, cargo, ruc, email, genero, tel_movil, ciudad) {
        $.post(base_url + 'usuarios/guardar', {
                cod_persona: $('#cod_persona').val(),
                user: $('#usuario').val(),
                pass: $('#contrasea').val(),
            });
            $.post(base_url+'detalle_persona_perfil/guardar',
            {
                cod_perfil:$('#cod_perfil_c').val(),
                cod_persona:$('#cod_persona').val()
            },
            function(data){
                if(data == 1){
                    alert('El registro fue almacenado correctamente');
                    location.reload();
                }
            });
    };
});