<!DOCTYPE html>
<html lang="es">
<head>
<title>Costa Azul - Reservar</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url();?>assets/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url();?>assets/css/chocolat.css" type="text/css" media="screen">
<link href="<?= base_url();?>assets/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/icons/costa_azul.ico" type="image/x-icon">
<link rel="stylesheet" href="<?= base_url();?>assets/css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="<?= base_url();?>assets/css/jquery-ui.css" />
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<link href="<?= base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url();?>assets/css/bar.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?= base_url();?>assets/js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="<?= base_url() ?>css/material-icons.css" rel="stylesheet" type="text/css">
<!-- Bootstrap Material Datetime Picker Css -->
<link href="<?= base_url() ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet"
/>

<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url();?>assets/css/style-b.css">
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/reservation.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/payment_form.css" />
<script>
  var base_url = "<?= base_url()?>";
</script>
<!--//fonts-->
</head>
<body>
<!-- header -->
	<div class="_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
						<a href="<?= base_url()?>">
					<div class="icon_bar">
						<img class="img-icon" src="<?= base_url();?>assets/images/icons/costa_azul.png" alt="logo">
					</div>
					</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
            <ul class="nav navbar-nav menu__list">
              <li class="menu__item"><a href="<?= base_url();?>" class="menu__link">Inicio</a></li>
              <li class="menu__item"><a href="<?= base_url()?>#about" class="menu__link">Servicios</a></li>
              <li class="menu__item"><a href="<?= base_url()?>#rooms" class="menu__link">Habitaciones</a></li>
              <li class="menu__item menu__item--current"><a href="<?= base_url()?>reservar" class="menu__link">Reservaciones</a></li>
              <!-- <li class="menu__item"><a href="#rooms" class="menu__link scroll">Portafolio</a></li> -->
              <li class="menu__item"><a href="<?= base_url()?>#contact" class="menu__link">Contáctanos</a></li>
            </ul>
					</nav>
				</div>
			</nav>

		</div>
	</div>
  <section class="section-reservation-page bg-white">
    <div class="container">
      <div class="reservation-page">
        <!-- STEP -->
        <div class="reservation_step">
          <ul>
            <li class="steps-tab active"><a href="#" data-toggle="#rooms_step"><span>1.</span>  Tipo de habitación</a></li>
            <li class="steps-tab"><a href="#" data-toggle="#pay_step" class="disabled"><span>2.</span> Pago</a></li>
            <li class="steps-tab"><a href="#" data-toggle="#finish_step" class="disabled"><span>3.</span> Reservación realizada</a></li>
          </ul>
        </div>
        <!-- END / STEP -->
        <div id="details-content" class="col-md-4 col-lg-3">
          <div class="reservation-sidebar">
            <!-- SIDEBAR AVAILBBILITY -->
            <div class="panel panel-details">
              <div class="panel-header">
                <div class="reservation-sidebar_availability bg-gray">
                  <!-- HEADING -->
                  <h2 class="reservation-heading">Tu reservación</h2>
                  <!-- END / HEADING -->
                  <!-- <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>paypal/create_payment_with_paypal"> -->
                    <h6 class="check_availability_title">Tus fechas</h6>
                    <div id='estadia_div'>
                      <div class="form-group form-float">
                        <div class="form-line focused">
                          <label class="form-label">Fecha de ingreso</label>
                          <input type="text" value="<?= $fecha_estadia;?>" name="fecha_estadia" id="fecha_estadia" autocomplete="off" class="form-control">
                        </div>
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line focused">
                          <label class="form-label">Fecha de salida</label>
                          <input type="text" value="<?= $fecha_salida;?>" name="fecha_salida" id="fecha_salida" autocomplete="off" class="form-control">
                        </div>
                      </div>
                    </div>
                    <h6 class="check_availability_title">Habitaciones &amp; Huéspedes</h6>
                    <br>
                    <div class="reservation_details">
                      <p class="text-center">No ha seleccionado ninguna habitación.</p>
                    </div>
                    <!-- <input type="hidden" name="adults_by" class="form-control">
                    <input type="hidden" name="children_by_room" class="form-control"> -->
										<form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>paypal/create_payment_with_paypal">
                    <input type="hidden" name="items" class="form-control">
										<br>
										<div class="text-center">
											<div class="col-md-4 col-md-offset-1"><h3>Total:</h3></div>
											<div class="col-md-6"><h4 id="total_count">0</h4></div>
											<input type="hidden" name="details_subtotal" value="">
										</div>
										<div class="footer" name="div_btn_reservar" >
											<button class="awe-btn awe-btn-13" name="enviar_datos">Reservar</button>
										</div>
                    <!-- <div name="div_btn_next">
                      <button class="awe-btn awe-btn-13" name="btn_next" style="display:none">Siguiente</button>
                    </div> -->
                  </form>
									<!-- <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>paypal/create_payment_with_paypal">
										<fieldset>
											<input title="item_name" name="item_name" type="hidden" value="ahmed fakhr">
											<input title="item_number" name="item_number" type="hidden" value="12345">
											<input title="item_description" name="item_description" type="hidden" value="to buy samsung smart tv">
											<input title="item_tax" name="item_tax" type="hidden" value="1">
											<input title="item_price" name="item_price" type="hidden" value="7">
											<input title="details_tax" name="details_tax" type="hidden" value="7">
											<input title="details_subtotal" name="details_subtotal" type="hidden" value="7">

											<div class="form-group">
												<div class="col-sm-offset-5">
													<button  type="submit"  class="btn btn-success">Pay Now</button>
												</div>
											</div>
										</fieldset>
									</form> -->
			<!-- paypal form -->
                  <br>
                  <!-- <div class="text-center">
                    <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" target="_blank">
                    <input name="merchantId"    type="hidden"  value="508029"   >
                    <input name="accountId"     type="hidden"  value="512323" >
                    <input name="description"   type="hidden"  value="Test PAYU"  >
                    <input name="referenceCode" type="hidden"  value="TestPayU" >
                    <input name="amount"        type="hidden"  value="200"   >
                    <input name="tax"           type="hidden"  value="0"  >
                    <input name="taxReturnBase" type="hidden"  value="0" >
                    <input name="currency"      type="hidden"  value="PEN" >
                    <input name="signature"     type="hidden"  value="31d5c530344475a9229bf0362c1e782c"  >
                    <input name="test"          type="hidden"  value="1" >
                    <input name="buyerEmail"    type="hidden"  value="test@test.com" >
                    <input name="responseUrl"    type="hidden"  value="http://localhost:8000/reservaciones/" >
                    <input name="confirmationUrl"    type="hidden"  value="http://localhost:8000/reservaciones/" >
                    <input name="Submit"        type="submit"  value="Enviar" >
                  </form>
                  </div> -->
                  <!-- END Paypal FORM -->
                </div>
              </div>
            </div>
            <!-- END / SIDEBAR AVAILBBILITY -->
          </div>
        </div>
        <div class="col-md-8 text-center">
          <div class="row">
            <div class="tab-panel">
              <div class="plans-section active" id="rooms_step">
                <div class="priceing-table-main" id="room_display">
                  <?php foreach($th as $th1){?>
                  <div class="col-md-4 room_type" value="<?= $th1->cod_tipo_habitacion?>" data-type="<?= $th1->tipo_habitacion?>" capacity="<?= $th1->max_h?>" href="javascript:void(0);" style="margin-bottom:30px;">
                    <div class="price-block agile">
                      <div class="price-gd-top">
                        <img src="<?= base_url();?>images/habitaciones/<?= strtolower($th1->tipo_habitacion);?>.jpg" alt=" " class="img-responsive" />
                        <a href="#more">
                          <h4><?= $th1->tipo_habitacion?></h4>
                        </a>
                      </div>
                      <div class="price-gd-bottom">
                        <div class="clearfix">
                          <div class="price col-lg-6">
                            <span><strong>Precio: </strong> <p>s/.<?= $th1->precio?></p></span>
                          </div>
                          <div class="capacity col-lg-6">
                            <span><strong>Capacidad: </strong> <p><?= $th1->max_h?> personas</p></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php };?>
                </div>
              </div>
              <div class="plans-section" id="pay_step">
                <!-- <div class="priceing-table-main">
                  <div class="panel panel-secondary">
                    <div class="container"> -->
                      <!-- <div class="row"> -->
                        <!-- You can make it whatever width you want. I'm making it full width
                        on <= small devices and 4/12 page width on >= medium devices -->
                      <!-- </div> -->
                    <!-- </div> -->

                    <!-- If you're using Stripe for payments -->
                    <!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->
                  <!-- </body>
                </div>
              </div> -->
              <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                  <div class="row clearfix">
                    <div class="panel panel-default">
                      <div class="panel-header">
                        <br>
                        <h3>
                          Detalle del cliente
                        </h3>
                      </div>
                      <div class="panel-body text-left">
                        <form action="" name="client_details">
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="client_dni" class="form-label">DNI:</label>
                            <input name="client_dni" type="number" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="client_name" class="form-label">Nombres:</label>
                            <input name="client_name" type="text" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="client_ap" class="form-label">Apellido paterno:</label>
                            <input name="client_ap" type="text" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="client_am" class="form-label">Apellido materno:</label>
                            <input name="client_am" type="text" class="form-control">
                          </div>
                          <div class="form-group col-md-8 col-lg-8">
                            <label for="client_email" class="form-label">Correo electrónico:</label>
                            <input name="client_email" type="text" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label for="client_phone" class="form-label">Teléfono:</label>
                            <input name="client_phone" type="text" class="form-control">
                          </div>
                            <br>
                        </form>
                      </div>
                    </div>
                    <!-- <h1>Hola</h1> -->
                  </div>
              </div>
            </div>
            <div class="plans-section" id="finish_step">
              <div class="priceing-table-main">
                <div class="panel panel-secondary">
                  <p>jbndkasbdia</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  <div class="modal fade" id="room_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Seleccione su(s) habitación(es)</h4>
        </div>
        <div class="modal-body room-list">
        </div>
        <br><br>
        <br><br>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script src="<?= base_url();?>assets/js/jqBootstrapValidation.js"></script>
  <script src="<?= base_url();?>assets/js/contact_me.js"></script>
  <!-- /contact form -->
  <!-- Calendar -->
  		<script src="<?= base_url();?>assets/js/jquery-ui.js"></script>
  		<script>
  				$(function() {
  				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
  				});
  		</script>
  <!-- //Calendar -->
  <!-- gallery popup -->
  <link rel="stylesheet" href="<?= base_url();?>assets/css/swipebox.css">
  				<script src="<?= base_url();?>assets/js/jquery.swipebox.min.js"></script>
  					<script type="<?= base_url();?>assets/text/javascript">
  						jQuery(function($) {
  							$(".swipebox").swipebox();
  						});
  					</script>
  <!-- //gallery popup -->
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="<?= base_url();?>assets/js/move-top.js"></script>
  <script type="text/javascript" src="<?= base_url();?>assets/js/easing.js"></script>
  <script type="text/javascript">
  	jQuery(document).ready(function($) {
  		$(".scroll").click(function(event){
  			event.preventDefault();
  			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
  		});
  	});
  </script>
  <!-- start-smoth-scrolling -->
  <!-- flexSlider -->
  				<script defer src="<?= base_url();?>assets/js/jquery.flexslider.js"></script>
  				<script type="text/javascript">
  				$(window).load(function(){
  				  $('.flexslider').flexslider({
  					animation: "slide",
  					start: function(slider){
  					  $('body').removeClass('loading');
  					}
  				  });
  				});
  			  </script>
  			<!-- //flexSlider -->
  <script src="<?= base_url();?>assets/js/responsiveslides.min.js"></script>
  			<script>
  						// You can also use "$(window).load(function() {"
  						$(function () {
  						  // Slideshow 4
  						  $("#slider4").responsiveSlides({
  							auto: true,
  							pager:true,
  							nav:false,
  							speed: 500,
  							namespace: "callbacks",
  							before: function () {
  							  $('.events').append("<li>before event fired.</li>");
  							},
  							after: function () {
  							  $('.events').append("<li>after event fired.</li>");
  							}
  						  });

  						});
  			</script>
  		<!--search-bar-->
  		<script src="<?= base_url();?>assets/js/main.js"></script>
  <!--//search-bar-->
  <!--tabs-->
  <script src="<?= base_url();?>assets/js/easy-responsive-tabs.js"></script>
  <script>
  $(document).ready(function () {
  $('#horizontalTab').easyResponsiveTabs({
  type: 'default',
  width: 'auto',
  fit: true,
  closed: 'accordion',
  activate: function(event) {
  var $tab = $(this);
  var $info = $('#tabInfo');
  var $name = $('span', $info);
  $name.text($tab.text());
  $info.show();
  }
  });
  $('#verticalTab').easyResponsiveTabs({
  type: 'vertical',
  width: 'auto',
  fit: true
  });
  });
  </script>
  <!--//tabs-->
  <!-- smooth scrolling -->
  	<script type="text/javascript">
  		$(document).ready(function() {
  		/*
  			var defaults = {
  			containerID: 'toTop', // fading element id
  			containerHoverID: 'toTopHover', // fading element hover id
  			scrollSpeed: 1200,
  			easingType: 'linear'
  			};
  		*/
  		$().UItoTop({ easingType: 'easeOutQuart' });
  		});
  	</script>

  	<div class="arr-ls">
  	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
  	</div>
  <!-- //smooth scrolling -->
  <script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap-3.1.1.min.js"></script>
  <!-- Moment Plugin Js -->
  <script src="<?= base_url() ?>plugins/momentjs/moment.js"></script>
  <script src="<?= base_url() ?>plugins/sweetalert/sweetalert.min.js"></script>
  <script src="<?= base_url() ?>js/pages/ui/dialogs.js"></script>
  <script src="<?= base_url() ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>
  <!-- Bootstrap Material Datetime Picker Plugin Js -->
  <script src="<?= base_url() ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
  <script src="<?= base_url();?>assets/js/reservation.js" charset="utf-8"></script>
  </body>
  </html>
