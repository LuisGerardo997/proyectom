<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>
            Habitación
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
                  <th width="1px">Codigo de Habitación</th>
                  <th>Codigo Tipo de Habitación</th>
                  <th width="1px">Piso</th>
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
                                              <label class="form-label">Número</label>
                                                <input disabled type="number" name="cod_habitacion" id="cod_habitacion" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <select name="tipo_habitacion" id="tipo_habitacion" class="form-group">
                                        <option value="">-- Please select --</option>
                                        <?php foreach($tipo_habitacion as $fila):?>
                                            <option value='<?= $fila["cod_tipo_habitacion"] ?>'><?= $fila['tipo_habitacion'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line focused">
                                              <label class="form-label">Piso</label>
                                                <input type="number" name="piso" id="piso" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" onclick="enviar();">Guardar Cambios</button>
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
                        <h2 class="modal-title" id="largeModalLabel">Registro de Habitación</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                          <label class="form-label">Número</label>
                                            <input type="number" name="cod_habitacion_c" id="cod_habitacion_c" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select name="tipo_habitacion_c" id="tipo_habitacion_c" class="form-group">
                                        <option value="">-- Please select --</option>
                                        <?php foreach($tipo_habitacion as $fila):?>
                                            <option value='<?= $fila["cod_tipo_habitacion"] ?>'><?= $fila['tipo_habitacion'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                          <label class="form-label">Piso</label>
                                            <input type="text" name="piso_c" id="piso_c" class="form-control">
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
