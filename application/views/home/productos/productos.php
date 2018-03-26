
<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Productos
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
                                        <th width="15%">Codigo</th>
                                        <th>Marca</th>
                                        <th>Tipo de Producto</th>
                                        <th width="50%">Producto</th>
                                        <th width="50%">Descripcion</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Stock Minimo</th>
                                        <th>Stock Maximo</th>
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
                              <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Código</label>
                                            <input type="number" name="cod_producto" id="cod_producto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float form_label">
                                        <div class="form-line focused">
                                            <select name="marca" id="marca" class="form-control">
                                                <option value="">-- Please select --</option>
                                                <?php foreach($marca as $fila):?>
                                                    <option value='<?= $fila["cod_marca"] ?>'><?= $fila['marca'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <select name="tipo_producto" id="tipo_producto" class="form-control">
                                                <option value="">-- Please select --</option>
                                                <?php foreach($tipo_producto as $fila):?>
                                                    <option value='<?= $fila["cod_tipo_producto"] ?>'><?= $fila['tipo_producto'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Producto</label>
                                            <input type="text" name="producto" id="producto" class="form-control">
                                        </div>
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Descripcion</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Precio (s/.)</label>
                                            <input type="text" name="precio_producto" id="precio_producto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Stock actual</label>
                                            <input type="text" name="stock_producto" id="stock_producto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Stock mínimo</label>
                                            <input type="text" name="stock_minimo" id="stock_minimo" class="form-control email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <label class="form-label">Stock máximo</label>
                                            <input type="text" name="stock_maximo" id="stock_maximo" class="form-control email">
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
                        <h2 class="modal-title" id="largeModalLabel">Registro de Productos</h2>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Código</label>
                                          <input type="number" name="cod_producto" id="cod_producto_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                   <div class="form-group">
                                        <div class="form-line focused">
                                            <select name="marca" id="marca_c" class="form-control">
                                                <option value="">-- Please select --</option>
                                                <?php foreach($marca as $fila):?>
                                                    <option value='<?= $fila["cod_marca"] ?>'><?= $fila['marca'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                              </div>
                              <div class="col-sm-4">
                                   <div class="form-group">
                                        <div class="form-line focused">
                                            <select name="tipo_producto" id="tipo_producto_c" class="form-control">
                                                <option value="">-- Please select --</option>
                                                <?php foreach($tipo_producto as $fila):?>
                                                    <option value='<?= $fila["cod_tipo_producto"] ?>'><?= $fila['tipo_producto'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                              </div>
                            </div>
                            <div class="row clearfix">
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Producto</label>
                                          <input type="text" name="producto" id="producto_c" class="form-control">
                                      </div>
                                  </div>
                              </div><div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Descripción</label>
                                          <input type="text" name="descripcion" id="descripcion_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Precio (s/.)</label>
                                          <input type="text" name="precio_producto" id="precio_producto_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Stock actual</label>
                                          <input type="text" name="stock_producto" id="stock_producto_c" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Stock mínimo</label>
                                          <input type="text" name="stock_minimo" id="stock_minimo_c" class="form-control email">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <label class="form-label">Stock máximo</label>
                                          <input type="text" name="stock_maximo" id="stock_maximo_c" class="form-control email">
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
