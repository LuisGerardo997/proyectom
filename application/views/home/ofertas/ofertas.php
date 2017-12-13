<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>
            Ofertas
          </h2>
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
            <table id="dt_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Oferta</th>
                  <th>Descuento (s/.)</th>
                  <th>Fecha inicial</th>
                  <th>Fecha de finalización</th>
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
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Código</label>
                                            <input disabled type="number" name="cod_oferta" id="cod_oferta" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Nombre de la oferta</label>
                                            <input type="text" name="oferta" id="oferta" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Descuento (s/.)</label>
                                            <input type="number" name="descuento" id="descuento" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Fecha inicial</label>
                                            <input type="text" name="fecha_inicio" id="fecha_inicio" class="datepicker form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Fecha de finalización</label>
                                            <input type="text" name="fecha_fin" id="fecha_fin" class="datepicker form-control">
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
                        <h2 class="modal-title" id="largeModalLabel">Registro de Ofertas</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Código</label>
                                            <input disabled type="number" value="<?base_url() ?><?php echo $this->Ofertas_model->num_rows() ?>" name="cod_oferta_c" id="cod_oferta_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Nombre de la oferta</label>
                                            <input type="text" name="oferta" id="oferta_c" class="form-control" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Descuento (s/.)</label>
                                            <input type="number" name="descuento" id="descuento_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Fecha inicial</label>
                                            <input type="text" name="fecha_inicio" id="fecha_inicio_c" class="datepicker form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Fecha de finalización</label>
                                            <input type="text" name="fecha_fin" id="fecha_fin_c" class="datepicker form-control">
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