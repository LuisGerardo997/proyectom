<!DOCTYPE html>
<html lang="es">
<head>
<title>Hotel brand</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta name="keywords" content="Ver Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" /> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/chocolat.css" type="text/css" media="screen">
<link href="<?= base_url(); ?>assets/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery-ui.css" />
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url(); ?>assets/css/bar.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?= base_url(); ?>assets/js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
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
						<a href="<?= base_url(); ?>">
					<div class="icon_bar">
						<img class="img-icon" src="<?= base_url(); ?>assets/images/icons/costa_azul.png" alt="logo">
					</div>
					</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
					<ul class="nav navbar-nav menu__list">
						<li class="menu__item menu__item--current"><a href="{{url('/" class="menu__link">Inicio</a></li>
						<li class="menu__item"><a href="#about" class="menu__link scroll">Servicios</a></li>
						<li class="menu__item"><a href="#rooms" class="menu__link scroll">Habitaciones</a></li>
						<li class="menu__item"><a href="{{url('reservaciones" class="menu__link">Reservaciones</a></li>
						<!-- <li class="menu__item"><a href="#rooms" class="menu__link scroll">Portafolio</a></li> -->
						<li class="menu__item"><a href="#contact" class="menu__link scroll">Contáctanos</a></li>
					</ul>
					</nav>
				</div>
			</nav>

		</div>
	</div>
<!-- //header -->
		<!-- banner -->
	<div id="home" class="ls-banner">
		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="layouts-banner-top layouts-banner-top2">
							<div class="container">
								<div class="agileits-banner-info">
									<h3>Bienvenido a:</h3>
  								<h4>Costa Azul</h4>
										<!-- <p></p> -->
									<!-- <div class="agileits_layouts_more menu__item">
										<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Ver más</a>
									</div> -->
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--banner Slider starts Here-->
		</div>
		    <div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
				</div>
		</div>
	<!-- //banner -->
<!--//Header-->
<!-- //Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
<!-- Modal1 -->
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Resort <span>Inn</span></h4>
				<img src="<?= base_url(); ?>assets/images/1.jpg" alt=" " class="img-responsive">
				<h5>We know what you love</h5>
				<p>Providing guests unique and enchanting views from their rooms with its exceptional amenities, makes Star Hotel one of bests in its kind.Try our food menu, awesome services and friendly staff while you are here.</p>
			</div>
		</div>
	</div>
</div>
<!-- //Modal1 -->
<div id="availability-agileits">
<div class="col-md-3 book-form-left-layouts">
	<h2>DISPONIBILIDAD</h2>
</div>
<div class="col-md-9 book-form">
			   <form action="#" method="post">
					<div class="fields-ls form-left-agileits-layouts ">
							<p>Tipo de habitación</p>
							<select class="form-control">
								<option>Seleccione habitación</option>
								<option>Room 1</option>
								<option>Room 2</option>
								<option>Room 3</option>
								<option>Room 4</option>
							</select>
					</div>
					<div class="fields-ls form-date--agileits">
			        <p>Fecha de ingreso</p>
							<input  id="datepicker1" name="Text" type="text" placeholder=""="Seleccione fecha" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
					</div>
					<div class="fields-ls form-date--agileits">
			        <p>Fecha de salida</p>
						<input  id="datepicker2" name="Text" type="text" placeholder=""="Seleccione fecha" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
					</div>

					<div class=" form-left-agileits-submit">
						  <input type="submit" value="Ver disponibilidad">
					</div>
				</form>
			</div>
			<div class="clearfix"> </div>
</div>
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="agileits_banner_bottom">
				<h3><span>Experience a good stay, enjoy fantastic offers</span> Find our friendly welcoming reception</h3>
			</div>
			<div class="ls_banner_bottom_grids">
				<ul class="cbp-ig-grid">
					<li>
						<div class="_grid_effect">
							<span class="cbp-ig-icon _road"></span>
							<h4 class="cbp-ig-title">MASTER BEDROOMS</h4>
							<span class="cbp-ig-category">Ver</span>
						</div>
					</li>
					<li>
						<div class="_grid_effect">
							<span class="cbp-ig-icon _cube"></span>
							<h4 class="cbp-ig-title">SEA VIEW BALCONY</h4>
							<span class="cbp-ig-category">Ver</span>
						</div>
					</li>
					<li>
						<div class="_grid_effect">
							<span class="cbp-ig-icon _users"></span>
							<h4 class="cbp-ig-title">LARGE CAFE</h4>
							<span class="cbp-ig-category">Ver</span>
						</div>
					</li>
					<li>
						<div class="_grid_effect">
							<span class="cbp-ig-icon _ticket"></span>
							<h4 class="cbp-ig-title">WIFI COVERAGE</h4>
							<span class="cbp-ig-category">Ver</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<!-- //banner-bottom -->
<!-- /about -->
	<div class="about-wthree" id="about">
	  <div class="container">
		  <div class="ab-l-spa">
    	<h3 class="title--agileits title-black-wthree">Acerca del hotel</h3>
    		<p class="about-para-ls">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Sed tempus vestibulum lacus blandit faucibus. Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula, at imperdiet urna</p>
		    	<!-- <img src="images/about.jpg" class="img-responsive" alt="Hair Salon"> -->
					<div class="l-slider-img">
						<!-- <img src="images/a1.jpg" class="img-responsive" alt="Hair Salon"> -->
					</div>
      		<div class="col-md-6 col-md-offset-3">
			    	<img class="img-responsive" src="<?= base_url(); ?>assets/images/hotel_example.jpg" alt="">
					</div>
    	</div>
		   	<!-- <div class="clearfix"> </div> -->
    </div>
	</div>
 	<!-- //about -->
<!--sevices-->
<div class="advantages">
	<div class="container">
		<div class="advantages-main">
				<h3 class="title--agileits">Nuestros Servicios</h3>
		   <div class="advantage-bottom">
			 <div class="col-md-6 advantage-grid left-ls wow bounceInLeft" data-wow-delay="0.3s">
			 	<div class="advantage-block ">
					<i class="fa fa-credit-card" aria-hidden="true"></i>
			 		<h4>Lorem ipsum dolor sit amet</h4>
			 		<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates.</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Habitaciones decoradas, con aire acondicionado</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Balcón</p>

			 	</div>
			 </div>
			 <div class="col-md-6 advantage-grid right-ls wow zoomIn" data-wow-delay="0.3s">
			 	<div class="advantage-block">
					<i class="fa fa-clock-o" aria-hidden="true"></i>
			 		<h4>24 Hour Restaurant</h4>
			 		<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates.</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Servicio 24/7</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Servicio a la habitación</p>
			 	</div>
			 </div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<!--//sevices-->
<!-- Gallery -->
<section class="portfolio-ls" id="gallery">
		 <h3 class="title--agileits title-black-wthree">Galería</h3>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g1.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g1.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g2.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g3.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g3.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g4.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g5.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g5.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g6.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g6.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g6.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g7.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g6.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g8.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
					<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g9.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g9.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g10.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g10.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g4.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="<?= base_url(); ?>assets/images/g2.jpg" class="swipebox"><img src="<?= base_url(); ?>assets/images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Ver</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="clearfix"> </div>
</section>
<!-- //gallery -->
	 <!-- rooms & rates -->
      <div class="plans-section" id="rooms">
				 <div class="container">
				 <h3 class="title--agileits title-black-wthree">Habitaciones y precios</h3>
						<div class="priceing-table-main">
				 <div class="col-md-3 price-grid">
						<div class="price-block agile">
							<div class="price-gd-top">
							<img src="<?= base_url(); ?>assets/images/r1.jpg" alt=" " class="img-responsive" />
								<a href="#more">
								<h4>Habitación 1</h4>
								</a>
							</div>
							<div class="price-gd-bottom">
								<div class="price-selet">
									<h3><span>$</span>320</h3>
									<a href="#availability-agileits" class="scroll" >Reservar</a>
								</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 price-grid ">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="<?= base_url(); ?>assets/images/r2.jpg" alt=" " class="img-responsive" />
							<a href="#more">
							<h4>Habitación 2</h4>
							</a>
						</div>
						<div class="price-gd-bottom">
							<div class="price-selet">
								<h3><span>$</span>220</h3>
								<a href="#availability-agileits" class="scroll" >Reservar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid lost">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="<?= base_url(); ?>assets/images/r3.jpg" alt=" " class="img-responsive" />
							<a href="#more">
							<h4>Habitación 3</h4>
							</a>
						</div>
						<div class="price-gd-bottom">
							<div class="price-selet">
								<h3><span>$</span>180</h3>
								<a href="#availability-agileits" class="scroll" >Reservar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid wthree lost">
					<div class="price-block agile">
						<div class="price-gd-top ">
							<img src="<?= base_url(); ?>assets/images/r4.jpg" alt=" " class="img-responsive" />
								<a href="#more">
							<h4>Habitación 4</h4>
							</a>
						</div>
						<div class="price-gd-bottom">
							<div class="price-selet">
								<h3><span>$</span> 150</h3>
								<a href="#availability-agileits" class="scroll" >Reservar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	 <!--// rooms & rates -->
  <!-- visitors -->
	<div class="l-visitors-agile" >
		<div class="container">
                 <h3 class="title--agileits title-black-wthree">What other visitors experienced</h3>
		</div>
		<div class="layouts_work_grids">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="layouts_work_grid_left">
								<img src="<?= base_url(); ?>assets/images/5.jpg" alt=" " class="img-responsive" />
								<div class="layouts_work_grid_left_pos">
									<img src="<?= base_url(); ?>assets/images/c1.jpg" alt=" " class="img-responsive" />
								</div>
							</div>
							<div class="layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>Sed tempus vestibulum lacus blandit faucibus.
									Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula,
									at imperdiet urna. </p>
								<h5>Julia Rose</h5>
								<p>Germany</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="layouts_work_grid_left">
								<img src="<?= base_url(); ?>assets/images/5.jpg" alt=" " class="img-responsive" />
								<div class="layouts_work_grid_left_pos">
									<img src="<?= base_url(); ?>assets/images/c2.jpg" alt=" " class="img-responsive" />
								</div>
							</div>
							<div class="layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>Sed tempus vestibulum lacus blandit faucibus.
									Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula,
									at imperdiet urna. </p>
								<h5>Jahnatan Smith</h5>
								<p>United States</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="layouts_work_grid_left">
								<img src="<?= base_url(); ?>assets/images/5.jpg" alt=" " class="img-responsive" />
								<div class="layouts_work_grid_left_pos">
									<img src="<?= base_url(); ?>assets/images/c3.jpg" alt=" " class="img-responsive" />
								</div>
							</div>
							<div class="layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>Sed tempus vestibulum lacus blandit faucibus.
									Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula,
									at imperdiet urna. </p>
								<h5>Rosalind Cloer</h5>
								<p>Italy</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="layouts_work_grid_left">
								<img src="<?= base_url(); ?>assets/images/5.jpg" alt=" " class="img-responsive" />
								<div class="layouts_work_grid_left_pos">
									<img src="<?= base_url(); ?>assets/images/c4.jpg" alt=" " class="img-responsive" />
								</div>
							</div>
							<div class="layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>Sed tempus vestibulum lacus blandit faucibus.
									Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula,
									at imperdiet urna. </p>
								<h5>Amie Bublitz</h5>
								<p>Switzerland</p>
							</div>
							<div class="clearfix"> </div>
						</li>
					</ul>
				</div>
			</section>
		</div>
	</div>
  <!-- visitors -->
<!-- contact -->
<section class="contact-ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact--agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Contáctanos</h4>
				<p class="contact-agile2">Suscríbete para ofertas y promociones</p>
				<form action="#" method="post" name="sentMessage" id="contactForm" novalidate>
					<div class="control-group form-group">
	          <div class="controls">
	            <label class="contact-p1">Nombre Completo:</label>
	            <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
	            <p class="help-block"></p>
	          </div>
          </div>
          <div class="control-group form-group">
	          <div class="controls">
	            <label class="contact-p1">Número de teléfono:</label>
	            <input type="tel" class="form-control" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
							<p class="help-block"></p>
						</div>
          </div>
          <div class="control-group form-group">
	          <div class="controls">
              <label class="contact-p1">e-Mail:</label>
              <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
							<p class="help-block"></p>
						</div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact--agile1" data-aos="flip-right">
			<h4>Contacta con nosotros</h4>
			<p class="contact-agile1"><strong>Teléfono :</strong> +51 987654321</p>
			<p class="contact-agile1"><strong>e-Mail :</strong> <a href="mailto:name@example.com">name@example.com</a></p>
			<p class="contact-agile1"><strong>Dirección :</strong> Dirección del hotel</p>

			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
								<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
							</ul>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.297025136965!2d-76.37267137972!3d-6.4840178018149945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc6b7dbbe937b318e!2sDsitech+Solutions!5e0!3m2!1ses-419!2spe!4v1518805527744" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /contact -->
			<!-- <div class="copy">
		        <p>© 2017 Ver . All Rights Reserved | Design by <a href="http://layouts.com/">layouts</a> </p>
		    </div> -->
<!--/footer -->
<!-- js -->
<!-- contact form -->
  <script src="<?= base_url(); ?>assets/js/jqBootstrapValidation.js"></script>
  <script src="<?= base_url(); ?>assets/js/contact_me.js"></script>
  <!-- /contact form -->
  <!-- Calendar -->
  		<script src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>
  		<script>
  				$(function() {
  				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
  				});
  		</script>
  <!-- //Calendar -->
  <!-- gallery popup -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/swipebox.css">
  				<script src="<?= base_url(); ?>assets/js/jquery.swipebox.min.js"></script>
  					<script type="<?= base_url(); ?>assets/text/javascript">
  						jQuery(function($) {
  							$(".swipebox").swipebox();
  						});
  					</script>
  <!-- //gallery popup -->
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/move-top.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/easing.js"></script>
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
  				<script defer src="<?= base_url(); ?>assets/js/jquery.flexslider.js"></script>
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
  <script src="<?= base_url(); ?>assets/js/responsiveslides.min.js"></script>
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
  		<script src="<?= base_url(); ?>assets/js/main.js"></script>
  <!--//search-bar-->
  <!--tabs-->
  <script src="<?= base_url(); ?>assets/js/easy-responsive-tabs.js"></script>
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
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap-3.1.1.min.js"></script>
  </body>
  </html>
