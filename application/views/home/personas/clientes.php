<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Clientes</h2>
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
                                        <th>RUC</th>
                                        <th>E-mail</th>
                                        <th>Género</th>
                                        <th>Teléfono</th>
                                        <th>Ciudad</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Edición -->
        
        <div class="modal fade" id="editar" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Edición de datos</h2>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label focused">DNI</label>
                                            <input type="number" name="cod_persona_e" id="cod_persona_e" class="form-control">
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
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno_e" id="apellido_paterno_e" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno_e" id="apellido_materno_e" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">RUC</label>
                                            <input type="number" name="ruc_e" id="ruc_e" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">E-mail</label>
                                            <input type="email" name="email_e" id="email_e" class="form-control email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="demo-radio-button">
                                            <input name="genero_e" value="M" type="radio" id="masculino" />
                                            <label for="masculino">Masculino</label>
                                            <input name="genero_e" value="F" type="radio" id="femenino" />
                                            <label for="femenino">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Teléfono</label>
                                            <input type="number" name="tel_movil_e" id="tel_movil_e" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Dirección</label>
                                            <input type="text" name="direccion_e" id="direccion_e" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Cuenta bancaria</label>
                                            <input type="number" name="bancaria_e" id="bancaria_e" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Banco</label>
                                            <input type="text" name="banco_e" id="banco_e" class="form-control" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Teléfono domicilio</label>
                                            <input type="number" name="telefono_domicilio_e" id="telefono_domicilio_e" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                                            <label class="form-label">Fecha de nacimiento</label>
                                            <input type="text" name="nacimiento_e" id="nacimiento_e" class="datepicker form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Profesión</label>
                                            <input type="text" name="profesion_e" id="profesion_e" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Número de hijos</label>
                                            <input type="number" name="hijos_e" id="hijos_e" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Estatura (cm)</label>
                                            <input type="number" name="estatura_e" id="estatura_e" class="form-control" step="0.01">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Peso (Kg) (Ejemplo: 64,6)</label>
                                            <input type="number" name="peso_e" id="peso_e" class="form-control" step="0.01">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float" "form_label">
                                        <div class="form-line focused">
                                            <select name="sangre_e" id="sangre_e" class="form-control">
                                                <option value>Grupo sanguíneo</option>
                                                <option value='O-'>O negativo (O-)</option>
                                                <option value='O+'>O positivo (O+)</option>
                                                <option value='A-'>A negativo (A-)</option>
                                                <option value='A+'>A positivo (A+)</option>
                                                <option value='B-'>B negativo (B-)</option>
                                                <option value='B+'>B positivo (B+)</option>
                                                <option value='AB-'>AB negativo (AB-)</option>
                                                <option value='AB+'>AB positivo (AB+)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Hobby</label>
                                            <input type="text" name="hobby_e" id="hobby_e" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Deporte favorito</label>
                                            <input type="text" name="deporte_e" id="deporte_e" class="form-control" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float" "form_label">
                                        <div class="form-line focused">
                                            <select name="ciudad_e" id="ciudad_e" class="form-control">
                                                <option value>Ciudad de nacimiento</option>
                                                    <?php foreach($ciudad as $fila):?>
                                                        <option class='' value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float" "form_label">
                                        <div class="form-line focused">
                                            <select name="ciudad1_e" id="ciudad1_e" class="form-control">
                                                <option value>Ciudad actual</option>
                                                    <?php foreach($ciudad as $fila):?>
                                                        <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float" "form_label">
                                        <div class="form-line focused">
                                            <select name="civil_e" id="civil_e" class="form-control">
                                                <option value>Estado civil</option>
                                                    <?php foreach($ec as $fila):?>
                                                        <option value='<?= $fila["cod_estado_civil"] ?>'><?= $fila['estado_civil'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float" "form_label">
                                        <div class="form-line focused">
                                            <select name="persona_e" id="persona_e" class="form-control">
                                                <option value>Tipo de persona</option>
                                                    <?php foreach($tp as $fila):?>
                                                        <option value='<?= $fila["cod_tipo_persona"] ?>'><?= $fila['tipo_persona'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" onclick="enviar();">Guardar cambios</button>
                            <button type="button" id="cerrar_modal" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Creación (1) -->
        
        <div class="modal fade" id="completo" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro extendido</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">DNI</label>
                                            <input type="text" name="cod_persona_r" id="cod_persona_r" class="form-control" maxlength="8" onkeydown="return( event.ctrlKey || event.altKey 
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
                                            <input type="text" name="nombres_r" id="nombres_r" class="form-control" maxlength="120">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno_r" id="apellido_paterno_r" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno_r" id="apellido_materno_r" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">RUC</label>
                                            <input type="text" name="ruc_r" id="ruc_r" class="form-control" maxlength="11" onkeydown="return( event.ctrlKey || event.altKey 
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
                                            <label class="form-label">E-mail</label>
                                            <input type="email" name="email_r" id="email_r" class="form-control email" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="demo-radio-button">
                                            <input name="genero_r" value="M" type="radio" id="masculino_r"/>
                                            <label for="masculino_r">Masculino</label>
                                            <input name="genero_r" value="F" type="radio" id="femenino_r"/>
                                            <label for="femenino_r">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Teléfono celular</label>
                                            <input type="number" name="tel_movil_r" id="tel_movil_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Dirección</label>
                                            <input type="text" name="direccion_r" id="direccion_r" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Cuenta bancaria</label>
                                            <input type="number" name="bancaria_r" id="bancaria_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Banco</label>
                                            <input type="text" name="banco_r" id="banco_r" class="form-control" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Teléfono domicilio</label>
                                            <input type="number" name="telefono_domicilio_r" id="telefono_domicilio_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Operador móvil</label>
                                            <input type="text" name="operador_r" id="operador_r" class="form-control" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Fecha de nacimiento</label>
                                            <input type="text" name="nacimiento_r" id="nacimiento_r" class="datepicker form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Profesión</label>
                                            <input type="text" name="profesion_r" id="profesion_r" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Número de hijos</label>
                                            <input type="number" name="hijos_r" id="hijos_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Estatura (cm)</label>
                                            <input type="number" name="estatura_r" id="estatura_r" class="form-control" maxlength="3" onkeydown="return( event.ctrlKey || event.altKey 
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
                                            <label class="form-label">Peso (Kg) (Ejemplo: 64,6)</label>
                                            <input type="number" name="peso_r" id="peso_r" class="form-control" maxlength="6" step="0.01" onkeydown="return( event.ctrlKey || event.altKey 
                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false) 
                                            || (event.keyCode>95 && event.keyCode<106)
                                            || (event.keyCode>34 && event.keyCode<40)
                                            || (event.keyCode==8) 
                                            || (event.keyCode==9)  
                                            || (event.keyCode==46)
                                            || (event.keyCode==188))">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Hobby</label>
                                            <input type="text" name="hobby_r" id="hobby_r" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Deporte favorito</label>
                                            <input type="text" name="deporte_r" id="deporte_r" class="form-control" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group form-float" "form_label">
                                        <div class="form-line">
                                            <select name="sangre_r" id="sangre_r" class="form-control">
                                                <option value>Grupo sanguíneo</option>
                                                <option value='O-'>O negativo (O-)</option>
                                                <option value='O+'>O positivo (O+)</option>
                                                <option value='A-'>A negativo (A-)</option>
                                                <option value='A+'>A positivo (A+)</option>
                                                <option value='B-'>B negativo (B-)</option>
                                                <option value='B+'>B positivo (B+)</option>
                                                <option value='AB-'>AB negativo (AB-)</option>
                                                <option value='AB+'>AB positivo (AB+)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float" "form_label">
                                        <div class="form-line">
                                            <select name="ciudad_r" id="ciudad_r" class="form-control">
                                                <option value>Ciudad de nacimiento</option>
                                                    <?php foreach($ciudad as $fila):?>
                                                        <option class='' value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float" "form_label">
                                        <div class="form-line">
                                            <select name="ciudad1_r" id="ciudad1_r" class="form-control">
                                                <option class="active" value>Ciudad actual</option>
                                                    <?php foreach($ciudad as $fila):?>
                                                        <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float" "form_label">
                                        <div class="form-line">
                                            <select name="civil_r" id="civil_r" class="form-control">
                                                <option value>Estado civil</option>
                                                    <?php foreach($ec as $fila):?>
                                                        <option value='<?= $fila["cod_estado_civil"] ?>'><?= $fila['estado_civil'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float" "form_label">
                                        <div class="form-line">
                                            <select name="persona_r" id="persona_r" class="form-control">
                                                <option value>Tipo de persona</option>
                                                    <?php foreach($tp as $fila):?>
                                                        <option value='<?= $fila["cod_tipo_persona"] ?>'><?= $fila['tipo_persona'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
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
        </div>
        
        <!-- Creación (2) -->
        
        <div class="modal fade" id="crear" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro de Clientes</h2>
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
                                            <input type="text" name="nombres" id="nombres_c" class="form-control" maxlength="120">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno" id="apellido_paterno_c" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno" id="apellido_materno_c" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">RUC</label>
                                            <input type="text" name="ruc_c" id="ruc_c" class="form-control" maxlength="11" onkeydown="return( event.ctrlKey || event.altKey 
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
                                            <label class="form-label">Teléfono</label>
                                            <input type="number" name="tel_movil" id="tel_movil_c" class="form-control">
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
                                <div class="col-sm-8">
                                   <div class="form-group form-float form_label">
                                        <div class="form-line">
                                            <select name="ciudad" id="ciudad_c" class="form-control show-tick">
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
                                            <input type="email" name="email" id="email_c" class="form-control email" maxlength="50">
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
