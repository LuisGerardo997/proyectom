
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Tipos de Producto
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
                                        <th>Código</th>
                                        <th>Tipo de Producto</th>
                                        <th>Descripción</th>
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
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Código</label>
                                            <input disabled type="number" name="cod_tipo_producto" id="cod_tipo_producto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Nombre del tipo de producto</label>
                                            <input type="text" name="tipo_producto" id="tipo_producto" class="form-control" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Descripción</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control" maxlength="100">
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
                        <h2 class="modal-title" id="largeModalLabel">Registro de Tipos Producto</h2>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                              <div class="col-md-3">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Código</label>
                                          <input type="number" disabled value="<?php echo $this->Tipo_producto_model->num_rows() ?>" name="cod_tipo_producto" id="cod_tipo_producto_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-9">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Nombre del tipo de producto</label>
                                          <input type="text" name="tipo_producto" id="tipo_producto_c" class="form-control" maxlength="30">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Descripción</label>
                                          <input type="text" name="descripcion" id="descripcion_c" class="form-control" maxlength="100">
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