<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>Tipos de Habitación</h2>
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
                  <th>Tipo de Habitación</th>
                  <th>Descripción</th>
                  <th>Precio (s/.)</th>
                  <th>Capacidad</th>
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
                    <h2 class="modal-title text-center" id="largeModalLabel">Edición de datos</h2>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                             <div class="col-md-3">
                                  <div class="form-group form-float">
                                      <div class="form-line focused">
                                        <label class="form-label">Número</label>
                                          <input disabled type="number" name="cod_tipo_habitacion" id="cod_tipo_habitacion" class="form-control"></div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group form-float">
                                      <div class="form-line focused">
                                        <label class="form-label">Tipo de habitación</label>
                                          <input type="text" name="tipo_habitacion" id="tipo_habitacion_e" class="form-control" maxlength="50">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group form-float">
                                      <div class="form-line focused">
                                        <label class="form-label">Precio (s/.)</label>
                                          <input type="number" name="precio_tipo_habitacion" id="precio_tipo_habitacion" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group form-float">
                                      <div class="form-line focused">
                                        <label class="form-label">Capacidad</label>
                                          <input type="number" name="max_h" id="max_h" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-9">
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
                    <button type="button" class="btn btn-link waves-effect" onClick="enviar();">Guardar cambios</button>
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
                <h2 class="modal-title text-center" id="largeModalLabel">Registro de Tipos de Habitación</h2>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                  <label class="form-label">Número</label>
                                    <input type="number" disabled value="<?php echo $this->Tipo_habitacion_model->num_rows() ?>" name="cod_tipo_habitacion_c" id="cod_tipo_habitacion_c" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                  <label class="form-label">Tipo de habitación</label>
                                    <input type="text" name="tipo_habitacion_c" id="tipo_habitacion_c" class="form-control" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                  <label class="form-label">Precio (s/.)</label>
                                    <input type="number" name="precio_tipo_habitacion_c" id="precio_tipo_habitacion_c" class="form-control email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                  <label class="form-label">Capacidad</label>
                                    <input type="number" name="max_h_c" id="max_h_c" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group form-float">
                                <div class="form-line">
                                  <label class="form-label">Descripción</label>
                                    <input type="text" name="descripcion_c" id="descripcion_c" class="form-control" maxlength="100">
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
    </div>
</section>
