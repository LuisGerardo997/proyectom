<script>
var num_compra = '<?php echo $this->Compras_model->num_compra() ?>';
var empleado = '<?php echo $this->session->userdata('cod_p') ?>';
</script>
<section class="content">
        <div class="container-fluid">
                <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                        <div class="header">
                                                <h2 class="text-center">
                                                        MÓDULO DE COMPRAS
                                                </h2>
                                        </div>
                                        <div class="body">
                                                <div class="row clearfix">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <!-- Nav tabs -->
                                                                <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                                        <li role="presentation" id="ventas_realizadas" class="active"><a href="#home_animation_1" data-toggle="tab">Compras realizadas</a></li>
                                                                        <li role="presentation" id="realizar_venta"><a href="#profile_animation_1" data-toggle="tab">Realizar compra</a></li>
                                                                </ul>

                                                                <!-- Tab panes -->
                                                                <div class="tab-content">
                                                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">
                                                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                                                        <div class="table-responsive">

                                                                                                <b>Historial de compras</b>
                                                                                                <table id="dt_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                                                        <thead>
                                                                                                                <tr>
                                                                                                                        <th>#</th>
                                                                                                                        <th>RUC Proveedor</th>
                                                                                                                        <th>Razón social</th>
                                                                                                                        <th>Fecha de compra</th>
                                                                                                                        <th><i class="material-icons">more_vert</i></th>
                                                                                                                </tr>
                                                                                                        </thead>
                                                                                                </table>
                                                                                        </div>

                                                                                </div>
                                                                        </div>
                                                                        <div role="tabpanel" class="tab-pane animated flipInX" id="profile_animation_1">
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="card">
                                                                                                <div class="header text-center">
                                                                                                        <h2>Registro de la Compras</h2>
                                                                                                        <ul class="header-dropdown m-r--5">
                                                                                                                <li class="dropdown">
                                                                                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                                                                                <i class="material-icons">more_vert</i>
                                                                                                                        </a>
                                                                                                                        <ul class="dropdown-menu pull-right">
                                                                                                                                <li><a href="javascript:void(0);">Action</a></li>
                                                                                                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                                                                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                                                                                                        </ul>
                                                                                                                </li>
                                                                                                        </ul>
                                                                                                </div>
                                                                                                <div class="body">
                                                                                                        <div id="wizard_horizontal">
                                                                                                                <h2>Proveedor</h2>
                                                                                                                <section>
                                                                                                                        <div class="text-center">
                                                                                                                                <h4>Seleccione el proveedor</h4>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <input type="hidden" disabled value="" name="nro_compra" id="nro_compra" class="form-control">
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
                                                                                                                        <div id="proveedor_nombre"></div>
                                                                                                                        <div id="proveedor_app"></div>
                                                                                                                        <div id="proveedor_apm"></div>
                                                                                                                        <input type="hidden" name="empleado" id="empleado" class="form-control">
                                                                                                                        <input type="hidden" name="empleado" id="proveedor" class="form-control">
                                                                                                                        <input type="hidden" name="fecha" id="fecha" class="datepicker form-control">
                                                                                                                        <input type="hidden" name="fecha_r" id="fecha_r" class="datepicker form-control">
                                                                                                                        <div class="col-md-12">
                                                                                                                                <hr>
                                                                                                                        </div>
                                                                                                                        <div id='detalle_body'></div>
                                                                                                                </section>
                                                                                                                <h2>Productos</h2>
                                                                                                                <section>
                                                                                                                        <div class="body">
                                                                                                                                <div class="row clearfix">
                                                                                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                                                                                <!-- Nav tabs -->
                                                                                                                                                <!-- <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                                                                                                                        <li role="presentation" id="existentes_trigger" class="active"><a href="#existentes" data-toggle="tab">Productos existentes</a></li>
                                                                                                                                                        <li role="presentation" id="nuevos_trigger"><a href="#nuevos" data-toggle="tab">Producto nuevo</a></li>
                                                                                                                                                </ul> -->

                                                                                                                                                <!-- Tab panes -->
                                                                                                                                                <!-- <div class="tab-content">
                                                                                                                                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="existentes"> -->
                                                                                                                                                                <div class="body">
                                                                                                                                                                        <h4 class="text-center">Selección de productos</h4>
                                                                                                                                                                        <br>
                                                                                                                                                                        <div class="table-responsive">
                                                                                                                                                                                <table class="table table-bordered table-striped table-hover">
                                                                                                                                                                                        <thead>
                                                                                                                                                                                                <tr>
                                                                                                                                                                                                        <th>Código</th>
                                                                                                                                                                                                        <th>Producto</th>
                                                                                                                                                                                                        <th>Marca</th>
                                                                                                                                                                                                        <th>Tipo de producto</th>
                                                                                                                                                                                                        <th>Stock</th>
                                                                                                                                                                                                        <th>Stock máximo</th>
                                                                                                                                                                                                        <th>Precio</th>
                                                                                                                                                                                                        <th><i class="material-icons">check</i></th>
                                                                                                                                                                                                </tr>
                                                                                                                                                                                        </thead>
                                                                                                                                                                                        <tbody id="body_pro"></tbody>
                                                                                                                                                                                </table>
                                                                                                                                                                        </div>
                                                                                                                                                                </div>


                                                                                                                                                        <!-- </div> -->
                                                                                                                                                        <!-- <div role="tabpanel" class="tab-pane animated flipInX" id="nuevos">
                                                                                                                                                                <h3 class="title text-center">Registro de nuevo producto</h3>
                                                                                                                                                                <br><br>
                                                                                                                                                                <div class="row clearfix">
                                                                                                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                                                                                                <div class="col-md-3">
                                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                                <div class="form-line focused">
                                                                                                                                                                                                        <label class="form-label">Código</label>
                                                                                                                                                                                                        <input type="number" name="cod_producto" id="cod_producto_c" class="form-control">
                                                                                                                                                                                                </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-sm-3">
                                                                                                                                                                                        <div class="form-group form-float">
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
                                                                                                                                                                                <div class="col-sm-3">
                                                                                                                                                                                        <div class="form-group form-float">
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
                                                                                                                                                                                <div class="col-md-3">
                                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                                <div class="form-line focused">
                                                                                                                                                                                                        <label class="form-label">Precio (s/.)</label>
                                                                                                                                                                                                        <input type="text" name="precio_producto" id="precio_producto_c" class="form-control">
                                                                                                                                                                                                </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-md-3">
                                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                                <div class="form-line focused">
                                                                                                                                                                                                        <label class="form-label">Producto</label>
                                                                                                                                                                                                        <input type="text" name="producto" id="producto_c" class="form-control">
                                                                                                                                                                                                </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                </div><div class="col-md-5">
                                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                                <div class="form-line focused">
                                                                                                                                                                                                        <label class="form-label">Descripción</label>
                                                                                                                                                                                                        <input type="text" name="descripcion" id="descripcion_c" class="form-control">
                                                                                                                                                                                                </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-md-2">
                                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                                <div class="form-line focused">
                                                                                                                                                                                                        <label class="form-label">Stock mínimo</label>
                                                                                                                                                                                                        <input type="number" name="stock_minimo" id="stock_minimo_c" class="form-control email">
                                                                                                                                                                                                </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-md-2">
                                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                                <div class="form-line focused">
                                                                                                                                                                                                        <label class="form-label">Stock máximo</label>
                                                                                                                                                                                                        <input type="number" name="stock_maximo" id="stock_maximo_c" class="form-control email">
                                                                                                                                                                                                </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <h5 class="text-center">Cantidad a comprar</h5>
                                                                                                                                                                                <div class="col-md-2 col-md-offset-5">
                                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                                <div class="form-line focused">
                                                                                                                                                                                                        <input type="number" name="stock_producto" id="stock_producto" class="form-control email">
                                                                                                                                                                                                </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                </div>

                                                                                                                                                                        </div>
                                                                                                                                                                </div>
                                                                                                                                                        </div> -->
                                                                                                                                                <!-- </div> -->
                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </section>

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
</div>
<!-- #END# Tabs With Custom Animations -->
<!-- Comienzo de modals -->
<div class="modal fade" id="habitaciones_list" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header text-center">
                                <h2 class="modal-title" id="largeModalLabel">Selección de artículos</h2>
                        </div>
                        <div class="modal-body">
                                <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                <div class="body">
                                                        <div id="habitaciones_list1">

                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<div class="modal fade" id="detalle_venta" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header text-center">
                                <h2 class="modal-title" id="largeModalLabel">Selección de artículos</h2>
                        </div>
                        <div class="modal-body">
                                <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                <div class="body">
                                                        <div class="row" id="detalle_venta_body">

                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<div class="modal fade" id="ingresar_cantidad" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header text-center">
                                <h2 class="modal-title" id="largeModalLabel">Reabastecimiento de producto</h2>
                        </div>
                        <div class="modal-body">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <br><br>
                                                <div class="row clearfix">
                                                        <div class="col-md-4 col-md-offset-4">
                                                                <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                                <label class="form-label">Cantidad a comprar</label>
                                                                                <input type="number" name="stock_producto" id="stock_productox" class="form-control email">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <input type="hidden" disabled value="" name="producto_cod" id="producto_cod" class="form-control">
                                                <input type="hidden" disabled value="" name="precio_unitario" id="precio_unitario" class="form-control">
                                                <input type="hidden" disabled value="" name="cantidad_actual" id="cantidad_actual" class="form-control">
                                                <div class="row clearfix">
                                                        <div class="col-md-3 col-md-offset-3">
                                                                <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                                <label class="form-label">Capacidad</label>
                                                                                <input disabled type="number" name="cantidad_maxima" id="cantidad_maxima" class="form-control">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                                <div class="form-group form-float">
                                                                        <div class="form-line focused">
                                                                                <label class="form-label">Precio</label>
                                                                                <input disabled type="text" name="monto_compra" id="monto_compra" class="form-control">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" onClick='guardar_compra();' class="btn btn-link waves-effect">Aceptar</button>
                                <button type="button" id="cerrar_modal" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                        </div>
                </div>
        </div>
</div>
<div class="modal fade" id="producto_cant" tabindex="-1" role="dialog">
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
                                                                        <label class="form-label">Cantidad</label>
                                                                        <input maxlength="8" type="number" value="" name="cant_prod" id="cant_prod" class="form-control">
                                                                </div>
                                                        </div>
                                                </div>
                                                                        <input disabled maxlength="8" type="hidden" value="" name="cant_act" id="cant_act" class="form-control">
                                                <div class="col-md-4">
                                                        <div class="form-group form-float">
                                                                <div class="form-line focused">
                                                                        <label class="form-label">Máximo permitido</label>
                                                                        <input disabled maxlength="8" type="number" value="" name="cant_max" id="cant_max" class="form-control">
                                                                </div>
                                                        </div>
                                                </div>
                                        </form>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" id="confirm_cant">Confirmar</button>
                                <button type="button" class="btn btn-link waves-effect" onClick="cancelar();" data-dismiss="modal">Cancelar</button>
                        </div>
                </div>
        </div>
</div>
<!-- Final de modals -->
</div>
</section>
