<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    <h2>Módulos</h2>
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
                            <table id="dt_table" class="table table-bordered table-striped table-hover dataTable" width='100%'>
                                <thead>
                                    <tr>
                                        <th width="15%">Código</th>
                                        <th>Dependencia</th>
                                        <th>Módulo</th>
                                        <th width="1px">Acción</th>
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
                                            <input type="number" name="cod_modulo" id="cod_modulo" class="form-control" placeholder="Código">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" >
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="pmodulo" id="pmodulo" class="form-control">
                                                <option value="">-- Please select --</option>
                                                <?php foreach($modulo as $fila):?>
                                                    <option value='<?= $fila["cod_modulo"] ?>'><?= $fila['modulo'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="submodulo_div_e" style="display:none">
                                    <div class="form-group">
                                        <div class="form-line" id="contenedor_sub_e">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="modulo" id="modulo" class="form-control" placeholder="Nombre del módulo" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Controlador</label>
                                            <input type="text" name="ruta" id="ruta" class="form-control" maxlength="50">
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
        <!-- formulario de registro -->
        <div class="modal fade" id="crear" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro de datos</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Código</label>
                                            <input type="number" disabled value="<?php echo $this->Modulo_model->num_rows() ?>" name="cod_modulo" id="cod_modulo_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" >
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="pmodulo" id="pmodulo_c" class="form-control">
                                                <option value="">-- Please select --</option>
                                                <?php foreach($modulo as $fila):?>
                                                    <option value='<?= $fila["cod_modulo"] ?>'><?= $fila['modulo'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="submodulo_div" style="display:none">
                                    <div class="form-group">
                                        <div class="form-line" id="contenedor_sub">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Nombre del módulo</label>
                                            <input type="text" name="modulo" id="modulo_c" class="form-control" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Controlador</label>
                                            <input type="text" name="ruta" id="ruta_c" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onClick="insertdat();">Guardar cambios</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
