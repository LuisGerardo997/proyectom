<script>
var num_venta = '<?php echo $this->Reservaciones_model->num_venta() ?>';
var empleado = '<?php echo $this->session->userdata('cod_p') ?>';
</script>
<section class="content">
        <div class="container-fluid">
                <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                        <div class="header">
                                                <div class="text-center">
                                                        <img src="<?= base_url() ?>images/Rio1.png" style="width:80px;height:30px;" alt="Logo">
                                                </div><br>
                                                        <h2 class="text-center">
                                                                MÓDULO DE VENTAS
                                                        </h2>
                                                        <!--<ul class="header-dropdown m-r--5">
                                                        <li class="dropdown">
                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">add</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                </li>
                        </ul>-->
                </div>
                <div class="body">
                        <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                <li role="presentation" id="ventas_realizadas" class="active"><a href="#home_animation_1" data-toggle="tab">Ventas realizadas</a></li>
                                                <li role="presentation" id="realizar_venta"><a href="#profile_animation_1" data-toggle="tab">Realizar venta</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">
                                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                                                <div class="table-responsive">

                                                                        <b>Historial de ventas</b>
                                                                        <table id="dt_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th>#</th>
                                                                                                <th>Cliente</th>
                                                                                                <th>Empleado</th>
                                                                                                <th>Tipo de transacción</th>
                                                                                                <th>Oferta</th>
                                                                                                <th>Fecha</th>
                                                                                                <th><i class="material-icons">more_vert</i></th>
                                                                                        </tr>
                                                                                </thead>
                                                                        </table>
                                                                </div>

                                                        </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane animated flipInX" id="profile_animation_1">
                                                        <div class="col-md-10 col-md-offset-1">
                                                                <div class="row clearfix">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <div class="row clearfix">
                                                                                        <div class="col-md-1">
                                                                                                <div class="form-group form-float">
                                                                                                        <div class="form-line focused">
                                                                                                                <label class="form-label">#</label>
                                                                                                                <input type="number" disabled value="" name="nro_venta" id="nro_venta" class="form-control">
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                                <div class="form-group form-float">
                                                                                                        <div class="form-line focused">
                                                                                                                <label class="form-label">Cliente (DNI)</label>
                                                                                                                <input maxlength="3" type="number" value="" name="cliente" id="cliente" class="form-control">
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div id="nom_client"></div>
                                                                                        <div id="app_client"></div>
                                                                                        <div class="col-md-2">
                                                                                                <div class="form-group form-float">
                                                                                                        <div class="form-line focused">
                                                                                                                <label class="form-label">Empleado (DNI)</label>
                                                                                                                <input disabled type="number" value="" name="empleado" id="empleado" class="form-control">
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-md-3" >
                                                                                                    <div class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                                <select name="t_tran" id="t_tran" class="form-control">
                                                                                                                        <option value="">Tipo de transacción</option>
                                                                                                                        <?php foreach($t_tran as $fila):?>
                                                                                                                                <option value='<?= $fila["cod_tipo_transaccion"] ?>'><?= $fila['tipo_transaccion'] ?></option>
                                                                                                                        <?php endforeach; ?>
                                                                                                                </select>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-md-2" >
                                                                                                <div class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                                <select name="oferta" id="oferta" class="form-control">
                                                                                                                        <option value="">Ofertas</option>
                                                                                                                        <?php foreach($oferta as $fila):?>
                                                                                                                                <option value='<?= $fila["cod_oferta"] ?>'><?= $fila['oferta'] ?></option>
                                                                                                                        <?php endforeach; ?>
                                                                                                                </select>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                                <div class="form-group form-float">
                                                                                                        <div class="form-line focused">
                                                                                                                <label class="form-label">Fecha</label>
                                                                                                                <input type="text" name="fecha" id="fecha" class="datepicker form-control">
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <hr>
                                                                <div class="text-center">
                                                                        <h3>Detalle de la venta</h3>
                                                                </div>
                                                                <div class="body table-responsive">

                                                                        <table class="table">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th>Cantidad</th>
                                                                                                <th>Descripción</th>
                                                                                                <th>Precio</th>
                                                                                                <th>Importe</th>
                                                                                                <th></th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody id="detalle"></tbody>
                                                                                <tfoot>
                                                                                        <tr>
                                                                                                <th></th>
                                                                                                <th></th>
                                                                                                <th>TOTAL</th>
                                                                                                <th></th>
                                                                                                <th></th>
                                                                                        </tr>
                                                                                </tfoot>
                                                                        </table>
                                                                </div>
                                                                <hr>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <div class="col-md-4 col-md-offset-2 text-center">
                                                                        <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                                                                                <i class="material-icons">check</i>
                                                                        </button>
                                                                        <br>
                                                                        <br>
                                                                        <span>Registrar</span><br>
                                                                        <span>venta</span>
                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                        <button type="button" data-toggle="modal" data-target="#seleccionar" id="agregar" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                                                                                <i class="material-icons">add</i>
                                                                        </button>
                                                                        <br>
                                                                        <br>
                                                                        <span>Agregar</span><br>
                                                                        <span>(producto - servicio - estadía)</span>
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
<div class="modal fade" id="seleccionar" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header text-center">
                                <h2 class="modal-title" id="largeModalLabel">Selección de artículos</h2>
                        </div>
                        <div class="modal-body">
                                <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                <div class="body">
                                                        <div class="row clearfix">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <!-- Nav tabs -->
                                                                        <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                                                <li role="presentation" id="ventas_realizadas" class="active"><a href="#Productos" data-toggle="tab">Productos</a></li>
                                                                                <li role="presentation" id="realizar_venta"><a href="#Servicios" data-toggle="tab">Servicios</a></li>
                                                                                <li role="presentation" id="realizar_venta"><a href="#estadias" data-toggle="tab">Estadías</a></li>
                                                                        </ul>

                                                                        <!-- Tab panes -->
                                                                        <div class="tab-content">
                                                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="Productos">



                                                                                        <div class="body">
                                                                                                <div class="table-responsive">
                                                                                                        <table id="slct_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                                                                <thead>
                                                                                                                        <tr>
                                                                                                                                <th width="15%">Código</th>
                                                                                                                                <th>Producto</th>
                                                                                                                                <th>Marca</th>
                                                                                                                                <th>Tipo de producto</th>
                                                                                                                                <th>Precio</th>
                                                                                                                                <th width="1px"></th>
                                                                                                                        </tr>
                                                                                                                </thead>
                                                                                                        </table>
                                                                                                </div>
                                                                                        </div>


                                                                                </div>
                                                                                <div role="tabpanel" class="tab-pane animated flipInX" id="Servicios">
                                                                                        <div class="body">
                                                                                                <div class="table-responsive">
                                                                                                        <table id="srv_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                                                                <thead>
                                                                                                                        <tr>
                                                                                                                                <th width="15%">Código</th>
                                                                                                                                <th>Servicio</th>
                                                                                                                                <th>Precio</th>
                                                                                                                                <th width="1px"></th>
                                                                                                                        </tr>
                                                                                                                </thead>
                                                                                                        </table>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="estadias">



                                                                                        <div class="body">
                                                                                                <div class="table-responsive">
                                                                                                        <table id="est_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                                                                <thead>
                                                                                                                        <tr>
                                                                                                                                <th width="15%">Código</th>
                                                                                                                                <th>Nombres</th>
                                                                                                                                <th>Apellido paterno</th>
                                                                                                                                <th>Habitación</th>
                                                                                                                                <th>Tipo de habitación</th>
                                                                                                                                <th>Tiempo(días)</th>
                                                                                                                                <th width="1px"></th>
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
<!-- Final de modals -->
</div>
</section>
