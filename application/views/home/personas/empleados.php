    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                        <li><a data-toggle="modal" data-target="#completo">Formulario Extendido</a></li>
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
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
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
            <div class="modal fade" id="editar" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="largeModalLabel">Edición de Datos</h2>
                        </div>
                        <div class="modal-body">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="col-md-4">
                                      <div class="form-group form-float">
                                          <div class="form-line focused">
                                              <label class="form-label focused">DNI</label>
                                              <input type="number" name="cod_persona_c" id="cod_persona_e" class="form-control">
                                          </div>
                                      </div>
                                  </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Nombres</label>
                                                <input type="text" name="nombres_e" id="nombres_e" class="form-control" >
                                            </div>
                                        </div>
                                    </div><div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Apellido paterno</label>
                                                <input type="text" name="apellido_paterno" id="apellido_paterno_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Apellido materno</label>
                                                <input type="text" name="apellido_materno" id="apellido_materno_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">RUC</label>
                                                <input type="text" name="ruc" id="ru_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">e-Mail</label>
                                                <input type="text" name="email" id="email_e" class="form-control email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="demo-radio-button">
                                                <input name="genero" value="M" type="radio" id="masculino" />
                                                <label for="masculino">Masculino</label>
                                                <input name="genero" value="F" type="radio" id="femenino" />
                                                <label for="femenino">Femenino</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Teléfono</label>
                                                <input type="text" name="tel_movil" id="tel_movil_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Direccion</label>
                                                <input type="text" name="direccion" id="direccion_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Cuenta Bancaria</label>
                                                <input type="text" name="bancaria" id="bancaria_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Banco</label>
                                                <input type="text" name="banco" id="banco_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Telefono Domicilio</label>
                                                <input type="text" name="telefono_domicilio" id="telefono_domicilio_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Operador Movil</label>
                                                <input type="text" name="operador" id="operador_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Fecha Nacimiento</label>
                                                <input type="text" name="nacimiento" id="nacimiento_e" class="datepicker form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Profesión</label>
                                                <input type="text" name="profesion" id="profesion_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Numero de Hijos</label>
                                                <input type="numeric" name="hijos" id="hijos_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Estatura</label>
                                                <input type="numeric" name="estatura" id="estatura_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Peso</label>
                                                <input type="numeric" name="peso" id="peso_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Tipo Sangre</label>
                                                <input type="text" name="sangre" id="sangre_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Hobby</label>
                                                <input type="text" name="hobby" id="hobby_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                                <label class="form-label">Deporte Favorito</label>
                                                <input type="text" name="deporte" id="deporte_e" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="ciudad" id="ciudad_e" class="form-control">
                                            <option value="">-- Ciudad de Nacimiento --</option>
                                            <?php foreach($ciudad as $fila):?>
                                                <option class='' value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <select name="ciudad1" id="ciudad1_e" class="form-control">
                                            <option class="active" value=''>-- Dirección Actual --</option>
                                            <?php foreach($ciudad as $fila):?>
                                                <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="civil" id="civil_e" class="form-control">
                                            <option value="">-- Estado Civil --</option>
                                            <?php foreach($ec as $fila):?>
                                                <option value='<?= $fila["cod_estado_civil"] ?>'><?= $fila['estado_civil'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="persona" id="persona_e" class="form-control">
                                            <option value="">-- Tipo Persona --</option>
                                            <?php foreach($tp as $fila):?>
                                                <option value='<?= $fila["cod_tipo_persona"] ?>'><?= $fila['tipo_persona'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="cargo" id="cargo_e" class="form-control">
                                            <option value="">-- Cargo --</option>
                                            <?php foreach($cargo as $fila):?>
                                                <option value='<?= $fila["cod_cargo"] ?>'><?= $fila['cargo'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                              </br>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onClick="enviar();">Guardar Cambios</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="completo" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro Extendido</h2>
                    </div>
                    <div class="modal-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">DNI</label>
                                          <input type="number" name="cod_persona_c" id="cod_persona_r" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Nombres</label>
                                            <input type="text" name="nombres_e" id="nombres_r" class="form-control" >
                                        </div>
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno" id="apellido_paterno_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno" id="apellido_materno_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">RUC</label>
                                            <input type="text" name="ruc" id="ruc_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">e-Mail</label>
                                            <input type="text" name="email" id="email_r" class="form-control email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="demo-radio-button">
                                            <input name="genero_r" value="M" type="radio" id="masculino_r" />
                                            <label for="masculino_r">Masculino</label>
                                            <input name="genero_r" value="F" type="radio" id="femenino_r" />
                                            <label for="femenino_r">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Teléfono</label>
                                            <input type="text" name="tel_movil" id="tel_movil_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Direccion</label>
                                            <input type="text" name="direccion" id="direccion_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Cuenta Bancaria</label>
                                            <input type="text" name="bancaria" id="bancaria_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Banco</label>
                                            <input type="text" name="banco" id="banco_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Telefono Domicilio</label>
                                            <input type="text" name="telefono_domicilio" id="telefono_domicilio_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Operador Movil</label>
                                            <input type="text" name="operador" id="operador_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Fecha Nacimiento</label>
                                            <input type="text" name="nacimiento" id="nacimiento_r" class="datepicker form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Profesión</label>
                                            <input type="text" name="profesion" id="profesion_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Numero de Hijos</label>
                                            <input type="numeric" name="hijos" id="hijos_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Estatura</label>
                                            <input type="numeric" name="estatura" id="estatura_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Peso</label>
                                            <input type="numeric" name="peso" id="peso_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="sangre" id="sangre_r" class="form-control">
                                                <option value="">Tipo de sangre</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Hobby</label>
                                            <input type="text" name="hobby" id="hobby_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Deporte Favorito</label>
                                            <input type="text" name="deporte" id="deporte_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="ciudad" id="ciudad_r" class="form-control">
                                                <option value="">Ciudad de Nacimiento</option>
                                                <?php foreach($ciudad as $fila):?>
                                                    <option class='' value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="ciudad1" id="ciudad1_r" class="form-control">
                                                <option class="active" value=''>Dirección Actual</option>
                                                <?php foreach($ciudad as $fila):?>
                                                    <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="civil" id="civil_r" class="form-control">
                                                <option value="">Estado Civil</option>
                                                <?php foreach($ec as $fila):?>
                                                    <option value='<?= $fila["cod_estado_civil"] ?>'><?= $fila['estado_civil'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="persona" id="persona_r" class="form-control">
                                                <option value="">Tipo Persona</option>
                                                <?php foreach($tp as $fila):?>
                                                    <option value='<?= $fila["cod_tipo_persona"] ?>'><?= $fila['tipo_persona'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                          </br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onclick="insertdatextend();">Guardar cambios</button>
                        <button type="button" id="cerrar_modal" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="crear" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro de Empleados</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">DNI</label>
                                            <input type="number" name="cod_persona" id="cod_persona_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Nombres</label>
                                            <input type="text" name="nombres" id="nombres_c" class="form-control">
                                        </div>
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido paterno</label>
                                            <input type="text" name="apellido_paterno" id="apellido_paterno_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno" id="apellido_materno_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <select name="cargo" id="cargo_c" class="form-control">
                                        <option value="">-- Cargo --</option>
                                        <?php foreach($cargo as $fila):?>
                                            <option value='<?= $fila["cod_cargo"] ?>'><?= $fila['cargo'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">RUC</label>
                                            <input type="number" name="ruc" id="ruc_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">e-Mail</label>
                                            <input type="text" name="email" id="email_c" class="form-control email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="demo-radio-button">
                                            <input name="genero_c" value="M" type="radio" id="masculino_c" />
                                            <label for="masculino_c">Masculino</label>
                                            <input name="genero_c" value="F" type="radio" id="femenino_c" />
                                            <label for="femenino_c">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-2">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Teléfono</label>
                                            <input type="text" name="tel_movil" id="tel_movil_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-line" name="ciudad" id="ciudad_c class="form-control">
                                        <option value="">-- Please select --</option>
                                        <?php foreach($ciudad as $fila):?>
                                            <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
            <!-- #END# Basic Examples -->

        </div>
    </section>
