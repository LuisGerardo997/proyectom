<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Proveedores
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
                                        <th> Codigo</th>
                                        <th> Nombre</th>
                                        <th> Apellido Paterno</th>
                                        <th> Apellido Matern</th>
                                        <th> DNI</th>
                                        <th> Ciudad </th>
                                        <th> RUC</th>
                                        <th>Razon Social</th>
                                        <th>e-Descripcion</th>
                                        <th>e-Accion</th>
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
                              <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Código</label>
                                            <input disabled type="number" name="cod_proveedor" id="cod_proveedor" class="form-control">
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
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Apellido materno</label>
                                            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">DNI</label>
                                            <input type="number" name="dni" id="dni" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <select name="ciudad" id="ciudad" class="form-control">
                                        <option value="">-- Please select --</option>
                                        <?php foreach($ciudad as $fila):?>
                                            <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                              </div>
                              <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">RUC</label>
                                            <input type="text" name="ruc" id="ruc" class="form-control">
                                        </div>
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Razón social</label>
                                            <input type="text" name="razon_social" id="razon_social" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Descripción</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                                        </div>
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
                        <h2 class="modal-title" id="largeModalLabel">Registro de Proveedores</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Código</label>
                                          <input type="number" name="cod_proveedor" id="cod_proveedor_c" class="form-control">
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
                              </div>
                              <div class="col-md-4">
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
                                          <label class="form-label">DNI</label>
                                          <input type="number" name="dni" id="dni_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <select name="ciudad" id="ciudad_c" class="form-control">
                                      <option value="">-- Please select --</option>
                                      <?php foreach($ciudad as $fila):?>
                                          <option value='<?= $fila["cod_ciudad"] ?>'><?= $fila['ciudad'] ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                            </div>
                            <div class="row clearfix">
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">RUC</label>
                                          <input type="text" name="ruc" id="ruc_c" class="form-control">
                                      </div>
                                  </div>
                              </div><div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Razón social</label>
                                          <input type="text" name="razon_social" id="razon_social_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Descripción</label>
                                          <input type="text" name="descripcion" id="descripcion_c" class="form-control">
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
