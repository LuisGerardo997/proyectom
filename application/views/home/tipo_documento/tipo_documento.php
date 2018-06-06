<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Tipos de Documento
                        </h2>
                        <ul class="header-dropdown m-r">
                            <a data-toggle="modal" data-target="#crear" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">add</i>
                            </a>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="dt_table" class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Descricion</th>
                                        <th>N° de serie</th>
                                        <th>N° correlativo</th>
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
                                <div class="col-md-2">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Código</label>
                                            <input disabled type="text" name="cod_tipo_documento" id="cod_tipo_documento" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Descripción</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Nº de serie</label>
                                            <input type="text" name="nro_serie" id="nro_serie" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                          <label class="form-label">Nº correlativo</label>
                                            <input type="text" name="nro_correlativo" id="nro_correlativo" class="form-control">
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
                        <h2 class="modal-title text-center" id="largeModalLabel">Registro de Tipos de Documento</h2>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                            <div class="row clearfix">
                              <div class="col-md-2">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                        <label class="form-label">Código</label>
                                          <input type="number" disabled value="<?php echo $this->Tipo_documento_model->num_rows() ?>" name="cod_tipo_documento" id="cod_tipo_documento_c" class="form-control">
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
                              <div class="col-md-3">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                        <label class="form-label">Nº de serie</label>
                                          <input type="number" name="nro_serie" id="nro_serie_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                        <label class="form-label">Nº correlativo</label>
                                          <input type="number" name="nro_correlativo" id="nro_correlativo_c" class="form-control">
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
