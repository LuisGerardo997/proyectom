
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
						<li class="menu__item menu__item--current"><a href="<?= base_url(); ?>" class="menu__link">Inicio</a></li>
						<li class="menu__item"><a href="#services" class="menu__link scroll">Servicios</a></li>
						<li class="menu__item"><a href="#rooms" class="menu__link scroll">Habitaciones</a></li>
						<li class="menu__item"><a href="<?= base_url(); ?>reservaciones" class="menu__link">Reservaciones</a></li>
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
								<option>Seleccione el tipo de habitación</option>
							<?php foreach($tipos_habitacion as $th){ ?>
								<option><?= $th->tipo_habitacion;?></option>
							<?php };?>
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
				<h3><span>La experiencia de un buen estar.</span> Disfruta de nuestros beneficios:</h3>
			</div>
			<div class="ls_banner_bottom_grids">
				<ul class="cbp-ig-grid">
					<li>
						<div class="_grid_effect">
							<span class="cbp-ig-icon _road"></span>
							<h4 class="cbp-ig-title">CÓMODAS HABITACIONES</h4>
							<!-- <span class="cbp-ig-category">Ver</span> -->
						</div>
					</li>
					<li>
						<div class="_grid_effect">
							<span class="cbp-ig-icon fas fa-car"></span>
							<h4 class="cbp-ig-title">AMPLIA COCHERA</h4>
							<!-- <span class="cbp-ig-category">Ver</span> -->
						</div>
					</li>
					<li>
						<div class="_grid_effect">
							<span class="cbp-ig-icon fas fa-life-ring"></span>
							<h4 class="cbp-ig-title">PISCINA</h4>
							<!-- <span class="cbp-ig-category">Ver</span> -->
						</div>
					</li>
					<li>
						<div class="_grid_effect">
							<span class="cbp-ig-icon _ticket"></span>
							<h4 class="cbp-ig-title">COVERTURA WIFI</h4>
							<!-- <span class="cbp-ig-category">Ver</span> -->
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
			    	<img class="img-responsive" src="<?= base_url(); ?>images/suite.jpg" alt="">
					</div>
    	</div>
		   	<!-- <div class="clearfix"> </div> -->
    </div>
	</div>
 	<!-- //about -->
<!--sevices-->
<div class="advantages" id="services">
	<div class="container">
		<div class="advantages-main">
				<h3 class="title--agileits">Nuestros Servicios</h3>
		   <div class="advantage-bottom">
			 <div class="col-md-6 advantage-grid left-ls wow bounceInLeft" data-wow-delay="0.3s">
			 	<div class="advantage-block">
					<i class="fa fa-credit-card" aria-hidden="true"></i>
			 		<h4>Amplia piscina</h4>
			 		<p>Disfruta de la frescura de nuestra piscina las 24 horas del día.</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Mantenimiento constante.</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Cómodos espacios de relajación.</p>

			 	</div>
			 </div>
			 <div class="col-md-6 advantage-grid right-ls wow zoomIn" data-wow-delay="0.3s">
			 	<div class="advantage-block">
					<i class="fa fa-clock-o" aria-hidden="true"></i>
			 		<h4>Atención las 24 horas</h4>
			 		<p>Atención amable y personalizada.</p>
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
<!-- rooms & rates -->
<div class="plans-section" id="rooms">
	<div class="container">
		<h3 class="title--agileits title-black-wthree">Habitaciones y precios</h3>
		<div class="priceing-table-main">

			<?php foreach($tipos_habitacion as $th){ ?>
				<div class="col-md-3 price-grid lost">
				<div class="price-block agile">
					<div class="price-gd-top">
					<img src="<?= base_url(); ?>images/habitaciones/<?= strtolower($th->tipo_habitacion);?>.jpg" alt=" " class="img-responsive" />
						<a href="#more">
						<h4><?= $th->tipo_habitacion;?></h4>
						</a>
					</div>
					<div class="price-gd-bottom">
						<div class="price-selet">
							<h3><span>s/.</span><?= $th->precio_tipo_habitacion;?></h3>
							<a href="#availability-agileits" class="scroll" >Reservar</a>
						</div>
					</div>
				</div>
				</div>
		<?php };?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
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
	 <!--// rooms & rates -->
  <!-- visitors -->
	<!-- <div class="l-visitors-agile" >
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
	</div> -->
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
			<p class="contact-agile1"><strong>Teléfono :</strong> (+51)939 434 422 / (+51)995 286 535</p>
			<p class="contact-agile1"><strong>e-Mail :</strong> <a href="mailto:costaazultarapoto@gmail.com" target="_blank" >costaazultarapoto@gmail.com</a></p>
			<p class="contact-agile1"><strong>Dirección :</strong> Jr. Ahuashiyacu 491 - Banda de Shilcayo</p>

			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="https://www.facebook.com/costaazultarapoto/" class="fa fa-facebook icon-border facebook" target="_blank"> </a></li>
								<!-- <li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
								<li><a href="#" class="fa fa-rss icon-border rss"> </a></li> -->
							</ul>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.084583262587!2d-76.35085282139195!3d-6.5002569835578825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ba0c6d06635043%3A0xd868e6dfb5831d0d!2sCosta+Azul!5e0!3m2!1ses-419!2spe!4v1523987951389" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
