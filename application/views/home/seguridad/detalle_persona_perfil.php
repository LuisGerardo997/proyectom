<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Privilegios</h2>
                        <ul class="header-dropdown m-r--5">
                               <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
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
                                        <th>Código de perfil</th>
                                        <th>Perfil</th>
                                        <th>Código</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Nombres</th>
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
                                          <label class="form-label">Código Perfil</label>
                                            <input disabled type="number" name="cod_perfil" id="cod_perfil" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Perfil</label>
                                            <input type="text" name="perfil" id="perfil" class="form-control" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Código de Persona</label>
                                            <input type="number" name="cod_persona" id="cod_persona" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Nombre</label>
                                            <input type="text" name="nombres" id="nombres" class="form-control" maxlength="120">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Apellido Paterno</label>
                                            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group  form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Apellido Materno</label>
                                            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onclick="enviar();">Guardar cambios</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Creación -->

        <div class="modal fade" id="crear" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro de Encargados</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6">
                                    <select name="cod_perfil_c" id="cod_perfil_c" class="form-control">
                                        <option value="">Selecione por favor</option>
                                        <?php foreach($perfil as $fila):?>
                                        <option value='<?= $fila["cod_perfil"] ?>'><?= $fila['perfil'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="cod_persona_c" id="cod_persona_c" class="form-control">
                                        <option value="">Selecione por favor</option>
                                        <?php foreach($persona as $fila):?>
                                        <option value='<?= $fila["cod_persona"] ?>'><?= $fila['apellido_paterno'].' '.$fila['apellido_materno'].' '.$fila['nombres']?></option>
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

    </div>
</section>
