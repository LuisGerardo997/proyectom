<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Usuarios
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
                            <table id="dt_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th> Codigo </th>
                                        <th> Usuario</th>
                                        <th> Nombres</th>
                                        <th> Apellido paterno</th>
                                        <th> Apellido materno</th>
                                        <th width="1px"> Acción</th>
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Edición de datos</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Nombre de usuario</label>
                                            <input type="text" name="usuario" id="usuario_e" class="form-control">
                                        </div>
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

        <div class="modal fade" id="crear" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h2 class="modal-title" id="largeModalLabel">Registro de usuarios</h2>
                  </div>
                  <div class="modal-body">
                      <div class="row clearfix">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="cod_persona" id="cod_persona" class="form-control">
                                                <option value="">Empleado</option>
                                                <?php foreach($persona as $fila):?>
                                                    <option value='<?= $fila["cod_persona"] ?>'><?= $fila['nombres']." ".$fila['apellido_paterno']." ".$fila['apellido_materno'] ?></option>
                                                <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Nombre de usuario</label>
                                            <input type="text" name="usuario" id="usuario" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <select name="cod_perfil_c" id="cod_perfil_c" class="form-control">
                                        <option value="">Selecione por favor</option>
                                        <?php foreach($perfil as $fila):?>
                                        <option value='<?= $fila["cod_perfil"] ?>'><?= $fila['perfil'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Contraseña</label>
                                            <input type="password" name="contrasea" id="contrasea" class="form-control">
                                        </div>
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
        <!-- #END# Basic Examples -->

    </div>
</section>
