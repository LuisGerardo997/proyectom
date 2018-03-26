<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center">Módulo de Cobros</h2>
                    </div>
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="body">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                    <li role="presentation" id="realizar_venta" class="active"><a href="#carta_1" data-toggle="tab">Cobros por procesar</a></li>
                                    <li role="presentation" id="cobros_pendientes"><a href="#carta_2" data-toggle="tab">Cobros pendientes</a></li>
                                    <li role="presentation" id="cobros_realizados"><a href="#carta_3" data-toggle="tab">Cobros realizados</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated flipInX active" id="carta_1">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="body">
                                                <div id="wizard_horizontal">
                                                    <h2>Buscar cliente</h2>
                                                    <section>
                                                        <div class="text-center">
                                                            <h4>Buscador</h4>
                                                            <span>A continuación escriba el el DNI respectivo del cliente a buscar</span>
                                                        </div>
                                                        <br>
                                                        <br>
                                                            <div class="col-md-4 col-md-offset-4">
                                                                <div class="form-group form-float">
                                                                    <div class="form-line focused">
                                                                        <label class="form-label">DNI del cliente</label>
                                                                        <input type="text" id='dni_cliente' class="form-control" maxlength="8" onkeydown="return( event.ctrlKey || event.altKey
                                                                        || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                        || (event.keyCode>95 && event.keyCode<106)
                                                                        || (event.keyCode>34 && event.keyCode<40)
                                                                        || (event.keyCode==8)
                                                                        || (event.keyCode==9)
                                                                        || (event.keyCode==46))">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </section>

                                                    <h2>Cliente</h2>
                                                    <section>
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                            <li role="presentation" class="active" id="realizar_venta"><a href="#cliente_producto" data-toggle="tab">Productos</a></li>
                                                            <li role="presentation" id="realizar_venta1"><a href="#cliente_estadia" data-toggle="tab">Estadías</a></li>
                                                        </ul>

                                                        <!-- Tab panes -->
                                                        <div class="tab-content">
                                                            <div role="tabpanel" class="tab-pane animated flipInX active" id="cliente_producto">
                                                                <div class="body">
                                                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-striped table-hover" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Venta</th>
                                                                                        <th>DNI</th>
                                                                                        <th>Nombres</th>
                                                                                        <th>Apellido paterno</th>
                                                                                        <th>Apellido materno</th>
                                                                                        <th>Fecha</th>
                                                                                        <th width="1px"><i class="material-icons">check</i></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id='buscar_cliente_producto'></tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane animated flipInX" id="cliente_estadia">
                                                                <div class="body">
                                                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-striped table-hover" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Estadía</th>
                                                                                        <th>DNI</th>
                                                                                        <th>Nombres</th>
                                                                                        <th>Apellido paterno</th>
                                                                                        <th>Apellido materno</th>
                                                                                        <th>Reserva</th>
                                                                                        <th>Ingreso</th>
                                                                                        <th>Salida</th>
                                                                                        <th width="1px"><i class="material-icons">check</i></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id='buscar_cliente_estadia'></tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
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
                                                           <div class="col-md-2" id="fecha_credito_div">
                                                                <div class="form-group form-float">
                                                                    <div class="form-line focused">
                                                                        <label class="form-label">Fecha del 1er pago</label>
                                                                        <input id="fecha_credito" type="text" class="datepicker form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                            <!-- <div class="col-md-3" id="ruc_div">
                                                                <div class="form-group form-float">
                                                                    <div class="form-line focused">
                                                                        <label class="form-label">RUC</label>
                                                                        <input id="ruc" type="number" class="form-control" min="1" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return(event.ctrlKey || event.altKey
                                                                        || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                        || (event.keyCode>95 && event.keyCode<106)
                                                                        || (event.keyCode>34 && event.eyCode<40)
                                                                        || (event.keyCode==8)
                                                                        || (event.keyCode==9)
                                                                        || (event.keyCode==46))">
                                                                    </div>
                                                                </div>
                                                            </div> -->
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
                                                                        <input id="cuota" type="number" class="form-control" min="1" onkeydown="return( event.ctrlKey || event.altKey
                                                                        || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false)
                                                                        || (event.keyCode>95 && event.keyCode<106)
                                                                        || (event.keyCode>34 && event.eyCode<40)
                                                                        || (event.keyCode==8)
                                                                        || (event.keyCode==9)
                                                                        || (event.keyCode==46))">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2" id="monto_credito_div">
                                                                <div class="form-group form-float">
                                                                    <div class="form-line focused">
                                                                        <label class="form-label">Monto inicial</label>
                                                                        <input id="monto_credito" type="text" class="form-control" step="0.01" maxlength="8" onkeydown="return( event.ctrlKey || event.altKey
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
                                                            <div class="col-md-2" id="monto_contado_div">
                                                                <div class="form-group form-float">
                                                                    <div class="form-line focused">
                                                                        <label class="form-label">Total</label>
                                                                        <input disabled id="monto_contado" type="number" class="form-control" step="0.01" maxlength="8" onkeydown="return( event.ctrlKey || event.altKey
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
                                                                        <input id="fecha_contado" type="text"  class="datepicker form-control">
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

                                                        </div>
                                                        <div class="row clearfix">
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                                <li role="presentation" class="active"><a href="#productos1" data-toggle="tab">Productos</a></li>
                                                                <li role="presentation"><a href="#estadias1" data-toggle="tab">Estadías</a></li>
                                                            </ul>

                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="productos1">
                                                                    <div class="body">
                                                                        <div class="table-responsive">
                                                                            <table id="slct_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Venta</th>
                                                                                        <th>DNI</th>
                                                                                        <th>Nombres</th>
                                                                                        <th>Apellido paterno</th>
                                                                                        <th>Cantidad</th>
                                                                                        <th>Producto</th>
                                                                                        <th>Precio</th>
                                                                                        <th>Descuento</th>
                                                                                        <th>IGV</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id='detalle_cliente_producto'></tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div role="tabpanel" class="tab-pane animated flipInX" id="estadias1">
                                                                    <div class="body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-striped table-hover" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Estadía</th>
                                                                                        <th>Habitación</th>
                                                                                        <th>Tipo</th>
                                                                                        <th>Precio</th>
                                                                                        <th>Días</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id='detalle_cliente_estadia'></tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                    <div class="col-md-3" id="forma_pago_cronograma_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <select id="forma_pago_cronograma" class="form-control">
                                                                    <option value>Forma de pago</option>
                                                                        <?php foreach($forma_pago as $fila):?>
                                                                            <option value='<?= $fila["cod_forma_pago"] ?>'><?= $fila['forma_pago'] ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="tipo_documento_cronograma_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <select id="tipo_documento_cronograma" class="form-control">
                                                                    <option value>Tipo de comprobante</option>
                                                                        <?php foreach($tipo_documento as $fila):?>
                                                                            <option value='<?= $fila["cod_tipo_documento"] ?>'><?= $fila['descripcion'] ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="concepto_movimiento_cronograma_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <select id="concepto_movimiento_cronograma" class="form-control">
                                                                    <option value>Concepto de movimiento</option>
                                                                        <?php foreach($concepto_movimiento as $fila):?>
                                                                            <option value='<?= $fila["cod_concepto_movimiento"] ?>'><?= $fila['concepto_movimiento'] ?></option>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" id="monto_cronograma_div">
                                                        <div class="form-group form-float">
                                                            <div class="form-line focused">
                                                                <label class="form-label">Monto</label>
                                                                <input disabled id="monto_cronograma" type="number" class="form-control" step="0.01">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input disabled type="hidden" id="empleado" value="<?php echo $this->session->userdata('cod_p'); ?>" class="form-control">
                                                    <input disabled type="hidden" id="caja" class="form-control">
                                                    <input disabled type="hidden" id="fecha_inicio" class="form-control">

                                                    <button type="button" id="cobrar" class="btn bg-red waves-effect" onclick="cobrar();">Cobrar</button>

                                                </div>
                                            </div>

                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                <li role="presentation" id="productos_li" class="active"><a href="#cobro_productos" data-toggle="tab">Productos</a></li>
                                                <li role="presentation" id="estadias_li"><a href="#cobro_estadias" data-toggle="tab">Estadías</a></li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="cobro_productos">
                                                    <div class="body">
                                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                                            <div class="table-responsive">
                                                                <table id="cobros_2" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nº</th>
                                                                            <th>Venta</th>
                                                                            <th>Cuota</th>
                                                                            <th>DNI</th>
                                                                            <th>Nombres</th>
                                                                            <th>Apellido paterno</th>
                                                                            <th>Apellido materno</th>
                                                                            <th>Vencimiento</th>
                                                                            <th>Monto</th>
                                                                            <th width="1px"><i class="material-icons">check</i></th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div role="tabpanel" class="tab-pane animated flipInX" id="cobro_estadias">
                                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                                        <div class="table-responsive">
                                                            <table id="cobros_3" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>CCE</th>
                                                                        <th>CE</th>
                                                                        <th>Cuota</th>
                                                                        <th>DNI</th>
                                                                        <th>Nombres</th>
                                                                        <th>Apellido paterno</th>
                                                                        <th>Apellido materno</th>
                                                                        <th>Vencimiento</th>
                                                                        <th>Monto</th>
                                                                        <th width="1px"><i class="material-icons">check</i></th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane animated flipInX" id="carta_3">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                            <li role="presentation" id="productos_li" class="active"><a href="#ventas_realizado" data-toggle="tab">Productos</a></li>
                                            <li role="presentation" id="estadias_li"><a href="#estadia_realizado" data-toggle="tab">Estadías</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane animated flipInX active" id="ventas_realizado">
                                                <div class="body">
                                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                                        <div class="table-responsive col-md-12">
                                                            <table id="realizado_1" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Mov.</th>
                                                                        <th>CCV</th>
                                                                        <th>DNI</th>
                                                                        <th>Nombres</th>
                                                                        <th>Apellido paterno</th>
                                                                        <th>Apellido materno</th>
                                                                        <th>Amortizó</th>
                                                                        <th width="1px">Detalles</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane animated flipInX" id="estadia_realizado">
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <div class="table-responsive col-md-12">
                                                        <table id="realizado_2" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Mov.</th>
                                                                    <th>CCE.</th>
                                                                    <th>DNI</th>
                                                                    <th>Nombres</th>
                                                                    <th>Apellido paterno</th>
                                                                    <th>Apellido materno</th>
                                                                    <th>Amortizó</th>
                                                                    <th width="1px">Detalles</i></th>
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
        </div>
    </div>
</section>


<div class="modal fade" id="amortizacion_venta" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="title" id="largeModalLabel">Introduzca el monto a amortizar</h3>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-t-20" id="contenedor_detalle">
                    <form action="#">
                        <div class="col-md-4 col-md-offset-2" id="monto_a_amortizar_div">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Monto a amortizar</label>
                                    <input type="number" id="monto_a_amortizar" class="form-control" min="0" step="0.01" onkeydown="return( event.ctrlKey || event.altKey
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
                        <div class="col-md-4 col-md-offset-2" id="monto_a_amortizar_e_div">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Monto a amortizar</label>
                                    <input type="number" id="monto_a_amortizar_e" class="form-control" min="0" step="0.01" onkeydown="return( event.ctrlKey || event.altKey
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
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Monto restante</label>
                                    <input disabled type="number" id="monto_restante" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="confirmar();">Confirmar</button>
                <button type="button" class="btn btn-link waves-effect" onClick="cancelar();" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="buscar_cliente" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h3 class="title" id="largeModalLabel">Seleccione al cliente:</h3>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                      <table id="client_dt" class="table dataTable table-bordered table-striped table-hover col-md-12 col-sm-12 col-lg-12 col-xs-12" width="100%">
                        <thead>
                          <tr>
                            <th width="10" ></th>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" id="confirm_cliente">Confirmar</button>
                    <button type="button" class="btn btn-link waves-effect" onClick="cancelar_cliente();" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
        </div>
</div>
<!-- Final de modals -->
</div>
<div class="modal fade" id="venta_detalles" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="title" id="largeModalLabel">Detalle de la venta</h3>
      </div>
      <div class="modal-body">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedor_detalle">
          <div class="table-responsive col-md-12">
            <b>Datos de la venta</b>
            <table id="dt_detalle" class="table table-bordered table-striped table-hover dataTable col-md-12" width="100%">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Producto</th>
                  <th>Marca</th>
                  <th>Tipo</th>
                  <th>Precio</th>
                  <th>Descuento</th>
                  <th>Descripción</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
