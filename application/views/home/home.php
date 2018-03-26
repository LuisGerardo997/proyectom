

<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header text-center">
            <img src="<?= base_url() ?>images/Rio1.png" alt="">
        </div> -->
        <div class="col-lg-9">
            <div class="card">
                <div class="body">
                    <?php foreach($data as $detalle): ?>
                        <div class="block-header">
                            <h2>Habitación <?= $detalle['tipo_habitacion']; ?></h2>
                        </div>
                        <div class="row clearfix">
                            <!-- With Captions -->
                            <!-- <div class="col-lg-9"> -->
                            <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
                                <div class="info-box-2 bg-green hover-zoom-effect">
                                    <div class="icon">
                                        <i class="material-icons">event_seat</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Disponibles</div>
                                        <div class="number"><?= $detalle['disponible']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div>
                            <div class="col-lg-4"> -->
                            <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
                                <div class="info-box-2 bg-orange hover-zoom-effect">
                                    <div class="icon">
                                        <i class="material-icons">build</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Mantenimiento</div>
                                        <div class="number"><?php echo $detalle['mantenimiento']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
                                <div class="info-box-2 bg-red hover-zoom-effect">
                                    <div class="icon">
                                        <i class="material-icons">hotel</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Ocupadas</div>
                                        <div class="number"><?php echo $detalle['ocupado']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                <div class="card">
                    <div class="header text-center">
                        <h5>HABITACIONES</h5>
                        <h4>DISPONIBLES</h4>
                    </div>
                    <div class="body">
                        <table>
                            <thead>
                                <tr>
                                    <th width="15%"></th>
                                    <th width="25%"></th>
                                    <th width="60%"></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php if(sizeof($habitaciones_disponibles)== 0){?>
                                <div class="text-center"><strong>No hay habitaciones disponibles</strong></div>
                                <?php }else{?>
                                <?php foreach($habitaciones_disponibles as $hd): ?>
                                <tr>
                                    <td>
                                            <i class='material-icons'>check</i>
                                    </td>
                                    <td>
                                            <strong><?= $hd['cod_habitacion'] ?></strong>
                                    </td>
                                <!-- </tr>
                                <tr> -->
                                    <td>
                                        <?= $hd['tipo_habitacion'] ?>
                                    </td>
                                </tr>
                              <?php endforeach; ?>
                            <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row clearfix">
    <div class="col-lg-12 col-md-11 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
              <br>
              <div class="row clearfix text-center">
                <div class="col-md-6">
                  <a class="btn bg-pink waves-effect m-b-15" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                     aria-controls="collapseExample">
                           OFERTAS
                  </a>
                  <div class="collapse" id="collapseExample">
                      <div class="well">
                          Las ofertas del Hoter Residencial Rio serán constantemente actualizadas, por motivos especiales
                          fiestas o cualquier evento que el Hotel considere adecuado, Se busca con esto la premiasión de nuestros clientes.
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <button class="btn bg-cyan waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#m" aria-expanded="false"
                        aria-controls="collapseExample">
                         POLITICA DEL HOTEL
                  </button>
                  <div class="collapse" id="m">
                    <div class="well">
                        El Hotel Recidencial Rio tiene como principal regamento la estricta confidencialidad, esto implica desde los nombres de las personas hospedadas a cualquier tipo de infromación que involucre a algún cliente de nuestro establecimiento.
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div> -->


   </section>
