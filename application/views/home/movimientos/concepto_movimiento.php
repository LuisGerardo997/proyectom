<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Conceptos de Movimiento</h2>
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
                                        <th>Código</th>
                                        <th>Concepto de movimiento</th>
                                        <th>Tipo de movimiento</th>
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
                        <h2 class="modal-title text-center" id="largeModalLabel">Edición de datos</h2>
                    </div>
                    <div class="modal-body">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Código</label>
                                            <input disabled type="number" name="cod_concepto_movimiento" id="cod_concepto_movimiento" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group form-float" "form_label">
                                        <div class="form-line focused">
                                            <select name="tipo_movimiento" id="tipo_movimiento" class="form-control">
                                                <option value>Seleccione el Tipo de Movimiento</option>
                                                    <?php foreach($tipo_movimiento as $fila):?>
                                                        <option value='<?= $fila["cod_tipo_movimiento"] ?>'><?= $fila['tipo_movimiento'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Nombre del concepto de movimiento</label>
                                            <input type="text" name="concepto_movimiento" id="concepto_movimiento" class="form-control" maxlength="100">
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
                        <h2 class="modal-title text-center" id="largeModalLabel">Registro de Conceptos de Movimiento</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Código</label>
                                            <input disabled type="number" name="cod_concepto_movimiento_c" id="cod_concepto_movimiento_c" class="form-control" value="<?=base_url() ?><?php echo $this->Concepto_movimiento_model->num_rows() ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group form-float" "form_label">
                                        <div class="form-line">
                                            <select name="tipo_movimiento_c" id="tipo_movimiento_c" class="form-control">
                                                <option value>Seleccione el Tipo de Movimiento</option>
                                                    <?php foreach($tipo_movimiento as $fila):?>
                                                        <option value='<?= $fila["cod_tipo_movimiento"] ?>'><?= $fila['tipo_movimiento'] ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Nombre del concepto de movimiento</label>
                                            <input type="text" name="concepto_movimiento_c" id="concepto_movimiento_c" class="form-control" maxlength="100">
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