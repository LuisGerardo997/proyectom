<script>
var num_reservacion = '<?php echo $this->Reservaciones_model->num_reservacion() ?>';
var empleado = '<?php echo $this->session->userdata('cod_p') ?>';
</script>
<section class="content">
        <div class="container-fluid">
                <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                        <div class="header">
                                                        <h2 class="text-center">
                                                                MÓDULO DE RESERVACIONES Y ESTADÍAS
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
                                                <li role="presentation" id="ventas_realizadas" class="active"><a href="#home_animation_1" data-toggle="tab">Ver reservaciones</a></li>
                                                <li role="presentation" id="realizar_venta"><a href="#profile_animation_1" data-toggle="tab">Nueva reservación</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">
                                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                                                <div class="table-responsive">

                                                                        <b>Historial de reservaciones</b>
                                                                        <table id="dt_table" class="table table-bordered table-striped table-hover dataTable" width="100%">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th>#</th>
                                                                                                <th>Cliente</th>
                                                                                                <th>Empleado</th>
                                                                                                <th>Fecha de reservación</th>
                                                                                                <th>Fecha de ingreso</th>
                                                                                                <th>Fecha de salida</th>
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
                            <h2>Registro de reservación</h2>
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
                                <h2>Habitación</h2>
                                <section>
                                        <div class="body">
                                                <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group form-float">
                                                                <div class="form-line">
                                                                        <label class="form-label">Buscar:</label>
                                                                        <input type="text" name="buscar_h" id="buscar_h" class="form-control" >
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="body">
                                                <div class="table-responsive col-md-10 col-md-offset-1">
                                                        <table id="slct_table" class="table table-hover" width="100%">
                                                                <thead>
                                                                        <tr>
                                                                                <th width="15%">Habitación</th>
                                                                                <th>Tipo</th>
                                                                                <th>Piso</th>
                                                                                <th>Precio</th>
                                                                                <th width="1px">Selección</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody id='body_hab'></tbody>
                                                        </table>
                                                </div>
                                        </div>
                                </section>

                                <h2>Reservación</h2>
                                <section>
                                        <div class="text-center">
                                                <h4>Datos de la reservación</h4>
                                                <span>En los campos que se colocan a continuación, coloque los datos pertenecientes a la reservación.</span>
                                        </div>
                                        <br>
                                        <div class="col-md-1 col-md-offset-1">
                                                <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                                <label class="form-label">Nro</label>
                                                                <input type="number" disabled value="" name="nro_venta" id="nro_res" class="form-control">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                                <label class="form-label">Cliente (DNI)</label>
                                                                <input maxlength="3" type="number" value="" name="cliente" id="cliente" class="form-control">
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
                                                                <input type="hidden" name="fecha_r" id="fecha_r" class="datepicker form-control">
                                                        <!--</div>
                                                </div>
                                        </div>-->
                                        <div class="col-md-3" id='estadia_div'>
                                                <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                                <label class="form-label">Fecha de estadía</label>
                                                                <input type="text" name="fecha_estadia" id="fecha_estadia" class="datepicker form-control">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-3" id="tipo_r_div">
                                                <div class="form-group">
                                                        <div class="demo-radio-button">
                                                                <input name="tipo_r" value="M" type="radio" id="ahora" />
                                                                <label for="ahora">Hospedarse ahora</label>
                                                                <input name="tipo_r" value="F" type="radio" id="despues" />
                                                                <label for="despues">Hospedarse después</label>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-12 text-center"><h4>¿Desea especificar los huespedes de cada habitación?</h4></div>
                                        <div class="col-md-3 col-md-offset-3 text-center">
                                                <div class="form-group">
                                                        <div class="demo-radio-button">
                                                                <input name="detallar" value="M" type="radio" id="especificar" />
                                                                <label for="especificar">Detallar</label>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-3 text-center">
                                                <div class="form-group">
                                                        <div class="demo-radio-button">
                                                                <input name="detallar" value="F" type="radio" id="no_especificar" />
                                                                <label for="no_especificar">No detallar</label>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                        <hr>
                                        </div>
                                        <div id='detalle_body'></div>
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

<div class="modal fade" id="editar" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title" id="largeModalLabel">Panel de edición de reservaciones</h2>
              </div>
              <div class="modal-body">
                  <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <br>
                      <div class="row clearfix">
                            <div class="col-md-3 col-md-offset-3">
                                    <div class="form-group form-float">
                                            <div class="form-line focused">
                                                    <label class="form-label">Fecha de ingreso</label>
                                                    <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="datepicker form-control">
                                            </div>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group form-float">
                                            <div class="form-line focused">
                                                    <label class="form-label">Fecha de reservación</label>
                                                    <input type="text" name="fecha_reservacion" id="fecha_reservacion" class="datepicker form-control">
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
<div class="modal fade" id="VerDetalle" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="largeModalLabel">Detalles de la reservación</h2>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                       <div id="Detalle"></div>
                       <div id="habitacion_estadia"></div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Final de modals -->
</div>
</section>
