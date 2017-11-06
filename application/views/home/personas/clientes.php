
<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Clientes
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
                                        <th>RUC</th>
                                        <th>e-Mail</th>
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
        <div class="modal fade" id="editar" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Edición de datos</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="cod_persona" id="cod_persona" class="form-control" placeholder="DNI">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nombres_e" id="nombres_e" class="form-control" placeholder="Nombres">
                                        </div>
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" placeholder="Apellido Paterno">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" placeholder="Apellido Materno">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="ruc" id="ruc" class="form-control" placeholder="RUC">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" id="email" class="form-control email" placeholder="e-Mail">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tel_movil" id="tel_movil" class="form-control" placeholder="Teléfono">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <select name="ciudad" id="ciudad" class="form-control">
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
                        <button type="button" class="btn btn-link waves-effect" onclick="enviar();">Guardar cambios</button>
                        <button type="button" id="cerrar_modal" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="crear" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro de Clientes</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="cod_persona_c" id="cod_persona_c" class="form-control" placeholder="DNI">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nombres" id="nombres_c" class="form-control" placeholder="Nombres">
                                        </div>
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="apellido_paterno" id="apellido_paterno_c" class="form-control" placeholder="Apellido Paterno">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="apellido_materno" id="apellido_materno_c" class="form-control" placeholder="Apellido Materno">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="ruc" id="ruc_c" class="form-control" placeholder="RUC">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" id="email_c" class="form-control email" placeholder="e-Mail">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tel_movil" id="tel_movil_c" class="form-control" placeholder="Teléfono">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <select name="ciudad" id="ciudad_c" class="form-control show-tick">
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
