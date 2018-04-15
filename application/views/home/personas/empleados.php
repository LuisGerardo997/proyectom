<section class="content">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row clearfix">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Empleados
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a data-toggle="modal" data-target="#crear">Añadir</a></li>
                                        <li><a data-toggle="modal" data-target="#completo">Formulario extendido</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="dt_table" class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>DNI</th>
                                            <th>Nombres</th>
                                            <th>Apellido paterno</th>
                                            <th>Apellido materno</th>
                                            <th>Cargo</th>
                                            <th>RUC</th>
                                            <th>E-mail</th>
                                            <th>Género</th>
                                            <th>Teléfono</th>
                                            <th>Ciudad</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Edición -->
    <input type="hidden" id="mode">
        <div class="modal fade" id="editar" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-center" id="largeModalLabel">Edición de Datos</h2>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label focused">DNI</label>
                                            <input type="number" name="cod_persona_e" id="cod_persona_e" class="form-control" min="0" max="99999999" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return( event.ctrlKey || event.altKey
                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                            || (event.keyCode>95 && event.keyCode<106)
                                            || (event.keyCode>34 && event.keyCode<40)
                                            || (event.keyCode==8)
                                            || (event.keyCode==9)
                                            || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Nombres</label>
                                            <input type="text" name="nombres_e" id="nombres_e" class="form-control" maxlength="120">
                                        </div>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno_e" id="apellido_paterno_e" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno" id="apellido_materno_e" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="demo-radio-button">
                                            <input name="genero_e" value="M" type="radio" id="masculino"/>
                                            <label for="masculino">Masculino</label>
                                            <input name="genero_e" value="F" type="radio" id="femenino"/>
                                            <label for="femenino">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">RUC</label>
                                            <input type="number" name="ruc" id="ru_e" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Fecha de nacimiento</label>
                                            <input type="text" name="nacimiento_e" id="nacimiento_e" class="datepicker form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Correo electrónico</label>
                                            <input type="email" name="email_e" id="email_e" class="form-control email" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Dirección</label>
                                            <input type="text" name="direccion_e" id="direccion_e" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Teléfono</label>
                                            <input type="number" name="telefono_domicilio_e" id="telefono_domicilio_e" class="form-control" min="0" onkeydown="return( event.ctrlKey || event.altKey
                                        || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                        || (event.keyCode>95 && event.keyCode<106)
                                        || (event.keyCode>34 && event.keyCode<40)
                                        || (event.keyCode==8)
                                        || (event.keyCode==9)
                                        || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Celular</label>
                                            <input type="number" name="tel_movil_e" id="tel_movil_e" class="form-control" min="0" onkeydown="return( event.ctrlKey || event.altKey
                                        || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                        || (event.keyCode>95 && event.keyCode<106)
                                        || (event.keyCode>34 && event.keyCode<40)
                                        || (event.keyCode==8)
                                        || (event.keyCode==9)
                                        || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Operador móvil</label>
                                            <input type="text" name="operador_e" id="operador_e" class="form-control" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Cuenta bancaria</label>
                                            <input type="number" name="bancaria_e" id="bancaria_e" class="form-control" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Banco</label>
                                            <input type="text" name="banco_e" id="banco_e" class="form-control" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float form_label">
                                        <div class="form-line focused">
                                            <select name="ciudad" id="ciudad_e" class="form-control">
                                                <option value="">Ciudad de nacimiento</option>
                                                <?php foreach($ciudad as $fila):?>
                                                    <option class='' value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float form_label">
                                        <div class="form-line focused">
                                            <select name="ciudad1" id="ciudad1_e" class="form-control">
                                                <option class="active" value=''>Ciudad actual</option>
                                                <?php foreach($ciudad as $fila):?>
                                                    <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float form_label">
                                        <div class="form-line focused">
                                            <select name="civil" id="civil_e" class="form-control">
                                                <option value="">Estado civil</option>
                                                <?php foreach($ec as $fila):?>
                                                    <option value='<?= $fila["cod_estado_civil"] ?>'><?= $fila['estado_civil'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float form_label">
                                        <div class="form-line focused">
                                            <select name="persona" id="persona_e" class="form-control">
                                                <option value="">Tipo de persona</option>
                                                <?php foreach($tp as $fila):?>
                                                    <option value='<?= $fila["cod_tipo_persona"] ?>'><?= $fila['tipo_persona'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float form_label">
                                        <div class="form-line focused">
                                            <select name="cargo" id="cargo_e" class="form-control">
                                                <option value="">Cargo</option>
                                                <?php foreach($cargo as $fila):?>
                                                    <option value='<?= $fila["cod_cargo"] ?>'><?= $fila['cargo'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onClick="enviar();">Guardar cambios</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Creación (1) -->

        <div class="modal fade" id="completo" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-center" id="largeModalLabel">Registro extendido de Empleados</h2>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">DNI</label>
                                            <input type="number" name="cod_persona_r" id="cod_persona_r" class="form-control" min="0" max="99999999" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return( event.ctrlKey || event.altKey
                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                            || (event.keyCode>95 && event.keyCode<106)
                                            || (event.keyCode>34 && event.keyCode<40)
                                            || (event.keyCode==8)
                                            || (event.keyCode==9)
                                            || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Nombres</label>
                                            <input type="text" name="nombres_e" id="nombres_r" class="form-control" maxlength="120">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno" id="apellido_paterno_r" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno" id="apellido_materno_r" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="demo-radio-button">
                                            <input name="genero_r" value="M" type="radio" id="masculino_r"/>
                                            <label for="masculino_r">Masculino</label>
                                            <input name="genero_r" value="F" type="radio" id="femenino_r"/>
                                            <label for="femenino_r">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">RUC</label>
                                            <input type="number" name="ruc" id="ruc_r" class="form-control" min="1" max="99999999999" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return( event.ctrlKey || event.altKey
                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                            || (event.keyCode>95 && event.keyCode<106)
                                            || (event.keyCode>34 && event.keyCode<40)
                                            || (event.keyCode==8)
                                            || (event.keyCode==9)
                                            || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Fecha de nacimiento</label>
                                            <input type="text" name="nacimiento" id="nacimiento_r" class="datepicker form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Correo electrónico</label>
                                            <input type="email" name="email" id="email_r" class="form-control email" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Dirección</label>
                                            <input type="text" name="direccion" id="direccion_r" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Teléfono</label>
                                            <input type="number" name="telefono_domicilio" id="telefono_domicilio_r" class="form-control" min="0" onkeydown="return( event.ctrlKey || event.altKey
                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                            || (event.keyCode>95 && event.keyCode<106)
                                            || (event.keyCode>34 && event.keyCode<40)
                                            || (event.keyCode==8)
                                            || (event.keyCode==9)
                                            || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Celular</label>
                                            <input type="number" name="tel_movil_r" id="tel_movil_r" class="form-control" min="0" onkeydown="return( event.ctrlKey || event.altKey
                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                            || (event.keyCode>95 && event.keyCode<106)
                                            || (event.keyCode>34 && event.keyCode<40)
                                            || (event.keyCode==8)
                                            || (event.keyCode==9)
                                            || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Operador móvil</label>
                                            <input type="text" name="operador" id="operador_r" class="form-control" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Cuenta bancaria</label>
                                            <input type="number" name="bancaria" id="bancaria_r" class="form-control" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Banco</label>
                                            <input type="text" name="banco" id="banco_r" class="form-control" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="ciudad_r" id="ciudad_r" class="form-control">
                                                <option value="">Ciudad de nacimiento</option>
                                                <?php foreach($ciudad as $fila):?>
                                                    <option class='' value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="ciudad1" id="ciudad1_r" class="form-control">
                                                <option class="active" value=''>Ciudad actual</option>
                                                <?php foreach($ciudad as $fila):?>
                                                    <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="civil_r" id="civil_r" class="form-control">
                                                <option value="">Estado civil</option>
                                                <?php foreach($ec as $fila):?>
                                                    <option value='<?= $fila["cod_estado_civil"] ?>'><?= $fila['estado_civil'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="persona_r" id="persona_r" class="form-control">
                                                <option value="">Tipo de persona</option>
                                                <?php foreach($tp as $fila):?>
                                                    <option value='<?= $fila["cod_tipo_persona"] ?>'><?= $fila['tipo_persona'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="cargo" id="cargo_r" class="form-control">
                                                <option value="">Cargo</option>
                                                <?php foreach($cargo as $fila):?>
                                                    <option value='<?= $fila["cod_cargo"] ?>'><?= $fila['cargo'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onclick="insertdatextend();">Guardar cambios</button>
                        <button type="button" id="cerrar_modal" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Creación (2) -->

        <div class="modal fade" id="crear" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-center" id="largeModalLabel">Registro de Empleados</h2>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">DNI</label>
                                            <input type="text" name="cod_persona_c" id="cod_persona_c" class="form-control" maxlength="8" onkeydown="return( event.ctrlKey || event.altKey
                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                            || (event.keyCode>95 && event.keyCode<106)
                                            || (event.keyCode>34 && event.keyCode<40)
                                            || (event.keyCode==8)
                                            || (event.keyCode==9)
                                            || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Nombres</label>
                                            <input type="text" name="nombres_c" id="nombres_c" class="form-control" maxlength="120">
                                        </div>
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno_c" id="apellido_paterno_c" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno_c" id="apellido_materno_c" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">RUC</label>
                                            <input type="number" name="ruc" id="ruc_c" class="form-control" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return( event.ctrlKey || event.altKey
                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                            || (event.keyCode>95 && event.keyCode<106)
                                            || (event.keyCode>34 && event.keyCode<40)
                                            || (event.keyCode==8)
                                            || (event.keyCode==9)
                                            || (event.keyCode==46))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float form_label">
                                        <div class="form-line">
                                            <select name="cargo_c" id="cargo_c" class="form-control">
                                                <option value="">Cargo</option>
                                                <?php foreach($cargo as $fila):?>
                                                    <option value='<?= $fila["cod_cargo"] ?>'><?= $fila['cargo'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="demo-radio-button">
                                            <input name="genero_c" value="M" type="radio" id="masculino_c" />
                                            <label for="masculino_c">Masculino</label>
                                            <input name="genero_c" value="F" type="radio" id="femenino_c" />
                                            <label for="femenino_c">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Teléfono</label>
                                            <input type="number" name="tel_movil_c" id="tel_movil_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float form_label">
                                        <div class="form-line">
                                            <select name="ciudad_c" id="ciudad_c" class="form-control">
                                                <option value="">Ciudad actual</option>
                                                <?php foreach($ciudad as $fila):?>
                                                    <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">E-mail</label>
                                            <input type="text" name="email_c" id="email_c" class="form-control email" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onclick="insertdat();">Guardar cambios</button>
                        <button type="button" id="cerrar_modal" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
