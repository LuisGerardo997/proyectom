<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>
            Servicios
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
                  <th width="20%">Codigo de Servicio</th>
                  <th>Servicio</th>
                  <th>Precio (S/.)</th>
                  <th width="1px">Acción</th>
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
                                              <label class="form-label">Código</label>
                                                <input type="number" name="cod_servicio" id="cod_servicio" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                              <label class="form-label">Servicio</label>
                                                <input type="text" name="servicio" id="servicio" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                              <label class="form-label">Precio (s/.)</label>
                                                <input type="number" name="precio" id="precio" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onClick="enviar();">Guardar Cambios</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
      </div>
      <div class="modal fade" id="crear" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="largeModalLabel">Registro de Servicios</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                          <label class="form-label">Código</label>
                                            <input type="number" name="cod_servicio_c" id="cod_servicio_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                          <label class="form-label">Servicio</label>
                                            <input type="text" name="servicio_c" id="servicio_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                          <label class="form-label">Precio (s/.)</label>
                                            <input type="number" name="precio_c" id="precio_c" class="form-control">
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

         <!-- #END# Basic Examples -->
