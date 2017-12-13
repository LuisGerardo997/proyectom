<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Formas de Pago
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
                                        <th>Código</th>
                                        <th>Tipo de pago</th>
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
                        <h2 class="modal-title text-center" id="largeModalLabel">Edición de datos</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Código</label>
                                            <input disabled type="number" name="cod_forma_pago" id="cod_forma_pago" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Nombre de la forma de pago</label>
                                            <input type="text" name="forma_pago" id="forma_pago" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Descripción</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control">
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
                        <h2 class="modal-title text-center" id="largeModalLabel">Registro de Formas de Pago</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-2">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                        <label class="form-label">Código</label>
                                          <input type="number" disabled value="<?base_url() ?><?php echo $this->Forma_pago_model->num_rows() ?>" name="cod_forma_pago_c" id="cod_forma_pago_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-5">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                        <label class="form-label">Nombre de la forma de pago</label>
                                          <input type="text" name="forma_pago_c" id="forma_pago_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-5">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                        <label class="form-label">Descripción</label>
                                          <input type="text" name="descripcion_c" id="descripcion_c" class="form-control">
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
