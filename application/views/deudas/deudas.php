<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center">Módulo de Pagos</h2>
                    </div>
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="body">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                    <li role="presentation" id="realizar_venta" class="active"><a href="#carta_1" data-toggle="tab">Pagos por procesar</a></li>
                                    <li role="presentation" id="realizar_venta"><a href="#carta_2" data-toggle="tab">Pagos pendientes</a></li>
                                    <li role="presentation" id="ventas_realizadas"><a href="#carta_3" data-toggle="tab">Pagos realizados</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated flipInX active" id="carta_1">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="body">
                                                <div id="wizard_horizontal">
                                                    <h2>Buscar proveedor</h2>
                                                    <section>
                                                        <div class="body">
                                                            <div class="table-responsive">
                                                                <table id="tabla_proveedor" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>RUC</th>
                                                                            <th>Razón social</th>
                                                                            <th>DNI</th>
                                                                            <th>Nombres</th>
                                                                            <th>Apellido paterno</th>
                                                                            <th>Apellido materno</th>
                                                                            <th>Ciudad</th>
                                                                            <th>Acción</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </section>

                                                    <h2>Proveedor</h2>
                                                    <section>
                                                        <div class="body">
                                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped table-hover" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Compra</th>
                                                                                <th>RUC</th>
                                                                                <th>Razón social</th>
                                                                                <th>Fecha</th>
                                                                                <th width="1px"><i class="material-icons">check</i></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="consultar_proveedor_compra"></tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>

                                                    <h2>Procesar pago</h2>
                                                    <section>
                                                        <div class="text-center">
                                                            <h4>Datos de la venta</h4>
                                                            <span>Seleccione la forma de pago en que va a ser procesada la venta</span>
                                                        </div>
                                                        <br>
                                                        <div class="row clearfix">
                                                            <div class="col-sm-4 col-sm-offset-4">
                                                                <div class="form-group form-float text-center">
                                                                    <div class="form-line focused">
                                                                        <select name="tipo_t" id="tipo_t" class="form-control">
                                                                            <option value>Seleccione el Tipo de pago</option>
                                                                                <?php foreach($tipo_transaccion as $fila):?>
                                                                                    <option value='<?= $fila["cod_tipo_transaccion"] ?>'><?= $fila['tipo_transaccion'] ?></option>
                                                                                <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="body">
                                                                <div class="col-md-3" id="forma_pago_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <select id="forma_pago" class="form-control">
                                                                                <option value>Forma de pago</option>
                                                                                    <?php foreach($forma_pago as $fila):?>
                                                                                        <option value='<?= $fila["cod_forma_pago"] ?>'><?= $fila['forma_pago'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               <div class="col-md-3" id="tipo_documento_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <select id="tipo_documento" class="form-control">
                                                                                <option value>Tipo de comprobante</option>
                                                                                    <?php foreach($tipo_documento as $fila):?>
                                                                                        <option value='<?= $fila["cod_tipo_documento"] ?>'><?= $fila['descripcion'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" id="serie_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <label class="form-label">Nº de serie</label>
                                                                            <input type="number" id="serie" class="form-control" min="1" onkeydown="return( event.ctrlKey || event.altKey
                                                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                            || (event.keyCode>95 && event.keyCode<106)
                                                                            || (event.keyCode>34 && event.eyCode<40)
                                                                            || (event.keyCode==8)
                                                                            || (event.keyCode==9)
                                                                            || (event.keyCode==46))">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" id="correlativo_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <label class="form-label">Nº correlativo</label>
                                                                            <input type="number" id="correlativo" class="form-control" min="1" onkeydown="return( event.ctrlKey || event.altKey
                                                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                            || (event.keyCode>95 && event.keyCode<106)
                                                                            || (event.keyCode>34 && event.eyCode<40)
                                                                            || (event.keyCode==8)
                                                                            || (event.keyCode==9)
                                                                            || (event.keyCode==46))">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" id="periodo_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <select id="periodo" class="form-control">
                                                                                <option value>Periodo</option>
                                                                                <option value='1'>Diario</option>
                                                                                <option value='2'>Semanal</option>
                                                                                <option value='3'>Mensual</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" id="cuota_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <label class="form-label">Nº de cuotas</label>
                                                                            <input type="number" id="cuota" class="form-control" min="1" onkeydown="return( event.ctrlKey || event.altKey
                                                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                            || (event.keyCode>95 && event.keyCode<106)
                                                                            || (event.keyCode>34 && event.eyCode<40)
                                                                            || (event.keyCode==8)
                                                                            || (event.keyCode==9)
                                                                            || (event.keyCode==46))">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" id="monto_inicial_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <label class="form-label">Monto inicial</label>
                                                                            <input type="text" id="monto_inicial" class="form-control" step="0.01" onkeydown="return( event.ctrlKey || event.altKey
                                                                            || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                            || (event.keyCode>95 && event.keyCode<106)
                                                                            || (event.keyCode>34 && event.keyCode<40)
                                                                            || (event.keyCode==8)
                                                                            || (event.keyCode==9)
                                                                            || (event.keyCode==46)
                                                                            || (event.keyCode==188))">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" id="fecha_contado_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <label class="form-label">Fecha de pago</label>
                                                                            <input type="text" id="fecha_contado" class="datepicker form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3" id="fecha_credito_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <label class="form-label">Fecha del primer pago</label>
                                                                            <input type="text" id="fecha_credito" class="datepicker form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" id="concepto_movimiento_div">
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                            <select id="concepto_movimiento" class="form-control">
                                                                                <option value>Concepto de movimiento</option>
                                                                                    <?php foreach($concepto_movimiento as $fila):?>
                                                                                        <option value='<?= $fila["cod_concepto_movimiento"] ?>'><?= $fila['concepto_movimiento'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <input type="hidden" id="hora" class="form-control"> -->
                                                            </div>
                                                        </div>
                                                        <div class="body">
                                                            <div class="table-responsive">
                                                                <table id="slct_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Compra</th>
                                                                            <th>Código</th>
                                                                            <th>Cantidad</th>
                                                                            <th>Producto</th>
                                                                            <th>Precio</th>
                                                                            <th>Descuento</th>
                                                                            <th>IGV</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id='detalle_proveedor_producto'></tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane animated flipInX" id="carta_2">
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-md-3" id="forma_pago_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <select id="forma_pago_cr" class="form-control">
                                                                    <option value>Forma de pago</option>
                                                                        <?php foreach($forma_pago as $fila):?>
                                                                            <option value='<?= $fila["cod_forma_pago"] ?>'><?= $fila['forma_pago'] ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <div class="col-md-3" id="tipo_documento_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <select id="tipo_documento_cr" class="form-control">
                                                                    <option value>Tipo de comprobante</option>
                                                                        <?php foreach($tipo_documento as $fila):?>
                                                                            <option value='<?= $fila["cod_tipo_documento"] ?>'><?= $fila['descripcion'] ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" id="serie_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <label class="form-label">Nº de serie</label>
                                                                <input type="number" id="serie_cr" class="form-control" min="1" onkeydown="return( event.ctrlKey || event.altKey
                                                                || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                || (event.keyCode>95 && event.keyCode<106)
                                                                || (event.keyCode>34 && event.eyCode<40)
                                                                || (event.keyCode==8)
                                                                || (event.keyCode==9)
                                                                || (event.keyCode==46))">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" id="correlativo_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <label class="form-label">Nº correlativo</label>
                                                                <input type="number" id="correlativo_cr" class="form-control" min="1" onkeydown="return( event.ctrlKey || event.altKey
                                                                || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                || (event.keyCode>95 && event.keyCode<106)
                                                                || (event.keyCode>34 && event.eyCode<40)
                                                                || (event.keyCode==8)
                                                                || (event.keyCode==9)
                                                                || (event.keyCode==46))">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" id="monto_inicial_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <label class="form-label">Monto</label>
                                                                <input type="text" id="monto_cronograma" class="form-control" step="0.01" onkeydown="return( event.ctrlKey || event.altKey
                                                                || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                || (event.keyCode>95 && event.keyCode<106)
                                                                || (event.keyCode>34 && event.keyCode<40)
                                                                || (event.keyCode==8)
                                                                || (event.keyCode==9)
                                                                || (event.keyCode==46)
                                                                || (event.keyCode==188))">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4" id="concepto_movimiento_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <select id="concepto_movimiento" class="form-control">
                                                                    <option value>Concepto de movimiento</option>
                                                                        <?php foreach($concepto_movimiento as $fila):?>
                                                                            <option value='<?= $fila["cod_concepto_movimiento"] ?>'><?= $fila['concepto_movimiento'] ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-md-offset-6">
                                                        <button type="button" class="btn btn-link waves-effect bg-red" onClick="pagar();">Pagar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php echo $this->session->userdata('cod_p'); ?>" id="empleado" class="form-control">
                                            <input type="hidden" id="caja" class="form-control">
                                            <input type="hidden" id="fecha_inicio" class="form-control">
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="table-responsive">
                                                        <table id="pagos_pendientes_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>compra</th>
                                                                    <th>RUC</th>
                                                                    <th>Proveedor</th>
                                                                    <th>Cuota</th>
                                                                    <th>Vencimiento</th>
                                                                    <th><i class="material-icons">check</i></th>
                                                                    <!-- <th><i class="material-icons">check</i></th> -->
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane animated flipInX" id="carta_3">
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            <div class="table-responsive">
                                                <table id="dt_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>DNI</th>
                                                            <th>Cliente</th>
                                                            <th>Apellido paterno</th>
                                                            <th>Apellido materno</th>
                                                            <th>Fecha</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="pagar_deuda" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header text-center">
                                <h3 class="title" id="largeModalLabel">Introduzca la cantidad deseada:</h3>
                        </div>
                        <div class="modal-body">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-t-20" id="contenedor_detalle">
                                        <form action="#">
                                                <div class="col-md-4 col-md-offset-2">
                                                        <div class="form-group form-float">
                                                                <div class="form-line focused">
                                                                        <label class="form-label">Monto a amortizar</label>
                                                                        <input type="number" name="monto_amortizar" id="monto_amortizar" class="form-control">
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="form-group form-float">
                                                                <div class="form-line focused">
                                                                        <label class="form-label">Monto del cronograma</label>
                                                                        <input disabled type="number" name="monto_restante" id="monto_restante" class="form-control">
                                                                </div>
                                                        </div>
                                                </div>
                                        </form>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" onClick="confirmar();">Confirmar</button>
                                <button type="button" class="btn btn-link waves-effect" onClick="cancelar();" data-dismiss="modal">Cancelar</button>
                        </div>
                </div>
        </div>
</div>
