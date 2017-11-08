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
                                            <th>Area</th>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Edición de datos</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <label class="form-label">DNI</label>
                                                    <input disabled type="number" name="cod_persona" id="cod_persona" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <label class="form-label">Nombres</label>
                                                    <input type="text" name="nombres" id="nombres" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <label class="form-label">Apellido paterno</label>
                                                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <label class="form-label">Apellido materno</label>
                                                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="area" id="area">
                                                    <option>Seleccione el área</option>
                                                    <?php foreach($area as $fila): ?>
                                                    <option value="<?= $fila['cod_area'] ?>"><?= $fila['area'] ?></option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="cargo" id="cargo">
                                                    <option>Seleccione la cargo</option>
                                                    <?php foreach($cargo as $fila): ?>
                                                    <option value="<?= $fila['cod_cargo'] ?>"><?= $fila['cargo'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <label class="form-label">RUC</label>
                                                    <input type="text" name="ruc" id="ruc" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <label class="form-label">e-Mail</label>
                                                    <input type="text" name="email" id="email" class="form-control email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="demo-radio-button">
                                                    <input name="genero" value="M" type="radio" id="masculino" />
                                                    <label for="masculino">Masculino</label>
                                                    <input name="genero" value="F" type="radio" id="femenino" />
                                                    <label for="femenino">Femenino</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-3 col-md-offset-2">
                                            <div class="form-group form-float">
                                                <div class="form-line focused">
                                                    <label class="form-label">Teléfono</label>
                                                    <input type="text" name="tel_movil" id="tel_movil" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                                <select name="ciudad" id="ciudad">
                                                    <option>Seleccione la ciudad</option>
                                                    <?php foreach($ciudad as $fila): ?>
                                                    <option value="<?= $fila['cod_ciudad'] ?>"><?= $fila['ciudad'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onClick="enviar();">Guardar Cambios</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
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
                                            <input type="number" name="cod_persona_c" id="cod_persona_c" class="form-control">
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
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Área</label>
                                            <input type="text" name="area" id="area_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Cargo</label>
                                            <input type="text" name="cargo" id="cargo_c" class="form-control">
                                        </div>
                                    </div>
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
                                    <select class="form-line" name="ciudad" id="ciudad_c">
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
