<script>
var num_venta = '<?php echo $this->Compras_model->num_venta() ?>';
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
                                                                        <!-- Nav tabs -->
                                                                        <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                                                <li role="presentation" id="ventas_realizadas" class="active"><a href="#home_animation_1" data-toggle="tab">Ventas realizadas</a></li>
                                                                                <li role="presentation" id="realizar_venta"><a href="#profile_animation_1" data-toggle="tab">Realizar compra</a></li>
                                                                        </ul>

                                                                        <!-- Tab panes -->
                                                                        <div class="tab-content">
                                                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">
                                                                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                                                                                <div id="wizard_horizontal">
                                                                                                        <h2>Compra</h2>
                                                                                                        <section>
                                                                                                                <div class="text-center">
                                                                                                                        <h4>Datos de la reservación</h4>
                                                                                                                        <span>En los campos que se colocan a continuación, coloque los datos pertenecientes a la compra.</span>
                                                                                                                </div>
                                                                                                                <br>
                                                                                                                <!--<div class="col-md-1 col-md-offset-1">
                                                                                                                        <div class="form-group form-float">
                                                                                                                                <div class="form-line focused">
                                                                                                                                        <label class="form-label">Nro</label> -->
                                                                                                                                        <input type="hidden" disabled value="" name="nro_venta" id="nro_venta" class="form-control">
                                                                                                                                <!--</div>
                                                                                                                        </div>
                                                                                                                </div>-->
                                                                                                                <div class="col-md-4 col-md-offset-4">
                                                                                                                        <div class="form-group form-float">
                                                                                                                                <div class="form-line focused">
                                                                                                                                        <label class="form-label">Proveedor (RUC)</label>
                                                                                                                                        <input maxlength="3" type="number" value="" name="cliente_input" id="cliente_input" class="form-control">
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div id="nom_client"></div>
                                                                                                                <div id="app_client"></div>
                                                                                                                <div id="apm_client"></div>
                                                                                                                <!--<div class="col-md-3" style='display:none' id='empleado_div'>
                                                                                                                <div class="form-group form-float">
                                                                                                                <div class="form-line focused">
                                                                                                                <label class="form-label">Empleado (DNI)</label>-->
                                                                                                                <input disabled type="hidden" value="" name="empleado" id="empleado" class="form-control">
                                                                                                                <!--</div>
                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-md-3" style='display:none' id='fecha_div'>
                                                                                                                                <div class="form-group form-float">
                                                                                                                                <div class="form-line focused">
                                                                                                                                <label class="form-label">Fecha de reservación</label> -->
                                                                                                                <input type="hidden" name="fecha" id="fecha" class="datepicker form-control">
                                                                                                                <input type="hidden" name="fecha_r" id="fecha_r" class="datepicker form-control">
                                                                                                                                <!--</div>
                                                                                                                        </div>
                                                                                                                </div>-->
                                                                                                                <div class="col-md-12">
                                                                                                                        <hr>
                                                                                                                </div>
                                                                                                                <div id='detalle_body'></div>
                                                                                                        </section>
                                                                                                        <h2>Artículos</h2>
                                                                                                        <section>
                                                                                                                <div class="body">
                                                                                                                        <div class="row clearfix">
                                                                                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                                                                        <!-- Nav tabs -->
                                                                                                                                        <ul class="nav nav-tabs tab-nav-right text-right" role="tablist">
                                                                                                                                                <li role="presentation" id="productos_trigger" class="active"><a href="#Productos" data-toggle="tab">Productos existentes</a></li>
                                                                                                                                                <li role="presentation" id="servicios_trigger"><a href="#Servicios" data-toggle="tab">Servicios</a></li>
                                                                                                                                        </ul>

                                                                                                                                        <!-- Tab panes -->
                                                                                                                                        <div class="tab-content">
                                                                                                                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="Productos">
                                                                                                                                                        <div class="body">
                                                                                                                                                                <div class="col-md-6 col-md-offset-3">
                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                <div class="form-line focused">
                                                                                                                                                                                        <label class="form-label">Buscar:</label>
                                                                                                                                                                                        <input type="text" name="buscar" id="buscar" class="form-control" >
                                                                                                                                                                                </div>
                                                                                                                                                                        </div>
                                                                                                                                                                </div>
                                                                                                                                                        </div>



                                                                                                                                                        <div class="body">
                                                                                                                                                                <div class="table-responsive col-md-10 col-md-offset-1">
                                                                                                                                                                        <table id="slct_table" class="table table-hover" width="100%">
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
                                                                                                                                                                                <tbody id='body_pro'></tbody>
                                                                                                                                                                        </table>
                                                                                                                                                                </div>
                                                                                                                                                        </div>


                                                                                                                                                </div>
                                                                                                                                                <div role="tabpanel" class="tab-pane animated flipInX" id="Servicios">
                                                                                                                                                        <div class="body" id='buscar_servicio_div'>
                                                                                                                                                                <div class="col-md-6 col-md-offset-3">
                                                                                                                                                                        <div class="form-group form-float">
                                                                                                                                                                                <div class="form-line">
                                                                                                                                                                                        <label class="form-label">Buscar:</label>
                                                                                                                                                                                        <input type="text" name="buscar_s" id="buscar_s" class="form-control" >
                                                                                                                                                                                </div>
                                                                                                                                                                        </div>
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="body" id='tabla_servicio_div'>
                                                                                                                                                                <div class="table-responsive col-md-10 col-md-offset-1">
                                                                                                                                                                        <table id="srv_table" class="table table-hover" width="100%">
                                                                                                                                                                                <thead>
                                                                                                                                                                                        <tr>
                                                                                                                                                                                                <th width="15%">Código</th>
                                                                                                                                                                                                <th>Servicio</th>
                                                                                                                                                                                                <th>Precio</th>
                                                                                                                                                                                        </tr>
                                                                                                                                                                                </thead>
                                                                                                                                                                                <tbody id='body_srv'></tbody>
                                                                                                                                                                        </table>
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div id='nota_servicio_div'></div>
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
<div class="modal fade" id="seleccionar_estadia" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header text-center">
                                <h2 class="modal-title" id="largeModalLabel">Selección de estadía</h2>
                        </div>
                        <div class="modal-body">
                                <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="body" id='tabla_estadias_div'>
                                                        <div class="table-responsive">
                                                                <table id="est_table" class="table table-striped table-hover" width="100%">
                                                                        <thead>
                                                                                <tr>
                                                                                        <th width="15%">Código</th>
                                                                                        <th>Fecha de reservación</th>
                                                                                        <th>Fecha de ingreso</th>
                                                                                        <th>Fecha de salida</th>
                                                                                        <th>Tiempo(días)</th>
                                                                                        <th width="1px"></th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody id='body_est'>

                                                                        </tbody>
                                                                </table>
                                                        </div>
                                                </div>
                                                <div id='nota_estadia_div'></div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<!-- Final de modals -->
</div>
</section>
