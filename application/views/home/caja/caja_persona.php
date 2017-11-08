<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Encargados</h2>
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
                                        <th>Fecha de inicio</th>
                                        <th>Código de caja</th>
                                        <th>Número de caja</th>
                                        <th>DNI</th>
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
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Fecha de Inicio</label>
                                            <input disabled type="text" name="fecha_inicio" id="fecha_inicio" class="datepicker form-control" placeholder="Fecha de Entrada">
                                        </div>
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <select name="cod_caja" id="cod_caja" class="form-control">
                                        <option value="">Selecione por favor</option>
                                        <?php foreach($caja as $fila):?>
                                        <option value='<?= $fila["cod_caja"] ?>'><?= $fila['nro_caja'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="cod_persona" id="cod_persona" class="form-control">
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
                        <button type="button" class="btn btn-link waves-effect" onclick="enviar();">Guardar cambios</button>
                        <button type="button" id="cerrar_modal" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Creación -->

        <div class="modal fade" id="crear" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro de Encargado</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="fecha_inicio_c" id="fecha_inicio_c" class="datepicker form-control" placeholder="Fecha de entrada">
                                        </div>
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <select name="cod_caja_c" id="cod_caja_c" class="form-control">
                                        <option value="">Selecione por favor</option>
                                        <?php foreach($caja as $fila):?>
                                        <option value='<?= $fila["cod_caja"] ?>'><?= $fila['nro_caja'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                          </div>
                                <div class="col-sm-6">
                                    <select name="cod_persona_c" id="cod_persona_c" class="form-control">
                                        <option value="">Selecione por favor</option>
                                        <?php foreach($persona as $fila):?>
                                        <option value='<?= $fila["cod_persona"] ?>'><?= $fila['apellido_paterno'].' '.$fila['apellido_materno'].' '.$fila['nombres']?></option>
                                        <?php endforeach; ?>
                                    </select>
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
