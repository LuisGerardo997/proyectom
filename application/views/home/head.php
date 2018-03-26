<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Costa Azul</title>
  <script>
    var base_url = '<?php echo base_url() ?>';
  </script>

  <!-- Jquery Core Js -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>js/idioma.js"></script>
  <!-- Favicon-->
  <link rel="icon" href="<?= base_url() ?>images/icon/logo_material.ico">

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
   -->
   <link href="<?= base_url() ?>css/roboto-font.css" rel="stylesheet" type="text/css">
   <link href="<?= base_url() ?>css/poppins.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>css/material-icons.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>css/materialize.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap Material Datetime Picker Css -->
  <link href="<?= base_url() ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />


  <!-- Bootstrap Select Css
  <link href="<?= base_url() ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
-->
    <!-- Bootstrap Spinner Css -->
    <link href="<?= base_url() ?>plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
<!-- Bootstrap Core Css -->
<link href="<?= base_url() ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="<?= base_url() ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Bootstrap Tagsinput Css -->
<link href="<?= base_url() ?>plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

<!-- Animation Css -->
<link href="<?= base_url() ?>plugins/animate-css/animate.css" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="<?= base_url() ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

<!-- Morris Chart Css-->
<link href="<?= base_url() ?>plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Sweetalert Css -->
<link href="<?= base_url() ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="<?= base_url() ?>css/style.css" rel="stylesheet">
<link href="<?= base_url() ?>plugins/multi-select/css/multi-select.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?= base_url() ?>css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-indigo">
  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer pl-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Espere por favor...</p>
    </div>
  </div>
  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- #END# Overlay For Sidebars -->
  <!-- Search Bar -->
  <div class="search-bar">
    <div class="search-icon">
      <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
      <i class="material-icons">close</i>
    </div>
  </div>
  <!-- #END# Search Bar -->
  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="<?= base_url() ?>home">Costa Azul</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!-- Call Search -->
          <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
          <!-- #END# Call Search -->
          <!-- Notifications -->
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <i class="material-icons">notifications</i>
              <span class="label-count">7</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">NOTIFICATIONS</li>
              <li class="body">
                <ul class="menu">
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-light-green">
                        <i class="material-icons">person_add</i>
                      </div>
                      <div class="menu-info">
                        <h4>12 new members joined</h4>
                        <p>
                          <i class="material-icons">access_time</i> 14 mins ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-cyan">
                        <i class="material-icons">add_shopping_cart</i>
                      </div>
                      <div class="menu-info">
                        <h4>4 sales made</h4>
                        <p>
                          <i class="material-icons">access_time</i> 22 mins ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-red">
                        <i class="material-icons">delete_forever</i>
                      </div>
                      <div class="menu-info">
                        <h4><b>Nancy Doe</b></h4>
                        <p>
                          <i class="material-icons">access_time</i> 3 hours ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-orange">
                        <i class="material-icons">mode_edit</i>
                      </div>
                      <div class="menu-info">
                        <h4><b>Nancy</b> changed name</h4>
                        <p>
                          <i class="material-icons">access_time</i> 2 hours ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-blue-grey">
                        <i class="material-icons">comment</i>
                      </div>
                      <div class="menu-info">
                        <h4><b>John</b> commented your post</h4>
                        <p>
                          <i class="material-icons">access_time</i> 4 hours ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-light-green">
                        <i class="material-icons">cached</i>
                      </div>
                      <div class="menu-info">
                        <h4><b>John</b> updated status</h4>
                        <p>
                          <i class="material-icons">access_time</i> 3 hours ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-purple">
                        <i class="material-icons">settings</i>
                      </div>
                      <div class="menu-info">
                        <h4>Settings updated</h4>
                        <p>
                          <i class="material-icons">access_time</i> Yesterday
                        </p>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="javascript:void(0);">View All Notifications</a>
              </li>
            </ul>
          </li>
          <!-- #END# Notifications -->
          <!-- Tasks -->
          <!-- <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <i class="material-icons">flag</i>
              <span class="label-count">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">TASKS</li>
              <li class="body">
                <ul class="menu tasks">
                  <li>
                    <a href="javascript:void(0);">
                      <h4>
                        Footer display issue
                        <small>32%</small>
                      </h4>
                      <div class="progress">
                        <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <h4>
                        Make new buttons
                        <small>45%</small>
                      </h4>
                      <div class="progress">
                        <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <h4>
                        Create new dashboard
                        <small>54%</small>
                      </h4>
                      <div class="progress">
                        <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <h4>
                        Solve transition issue
                        <small>65%</small>
                      </h4>
                      <div class="progress">
                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <h4>
                        Answer GitHub questions
                        <small>92%</small>
                      </h4>
                      <div class="progress">
                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="javascript:void(0);">View All Tasks</a>
              </li>
            </ul>
          </li> -->
          <!-- #END# Tasks -->
          <!-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
        <div class="image">
          <img src="<?= base_url() ?><?php echo $this->session->userdata('foto_p'); ?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ($this->session->userdata['nombres'].' '.$this->session->userdata['apellido_p'].' '.$this->session->userdata['apellido_m']); ?></div>
          <div class="email"><?php echo $this->session->userdata['nom_perfil'] ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="javascript:void(0);"><i class="material-icons">person</i>Perfil</a></li>
              <li role="seperator" class="divider"></li>
              <!-- <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
              <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
              <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li> -->
              <!-- <li role="seperator" class="divider"></li> -->
              <li><a href="<?= base_url() ?>login/cerrar_sesion"><i class="material-icons">input</i>Cerrar sesión</a></li>
              <li><a href="<?= base_url() ?>login/select_perfil"><i class="material-icons">group</i>Cambiar perfil</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- #User Info --><!-- Menu -->
      <div class="menu">
          <ul class="list">
              <li class="header">Navegación Principal</li>
              <li class="active">
                  <a class="toggled waves-effect waves-block" href="<?= base_url() ?>home">
                      <i class="material-icons">home</i>
                      <span>Home</span>
                  </a>
              </li>
              <li>
                  <a class="menu-toggle" href="javascript:void(0);">
                      <i class="material-icons">build</i>
                      <span>Mantenimientos</span>
                  </a>
                  <ul class="ml-menu">
                    <li>
                      <a href="javascript:void(0);" class="menu-toggle">
                        <span>Personas</span>
                      </a>
                        <ul class="ml-menu">
                          <li id='clientes'>
                            <a href="<?= base_url(); ?>clientes"> Clientes</a>
                          </li>
                          <li id='empleados'>
                            <a href="<?= base_url(); ?>empleados">Empleados</a>
                          </li>
                          <li id='tipo_persona'>
                            <a href="<?= base_url(); ?>tipo_persona"> Tipos de personas</a>
                          </li>
                        </ul>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="menu-toggle">
                        <span>Habitaciones</span>
                      </a>
                      <ul class="ml-menu">
                        <li id='tipo_habitacion'>
                          <a href="<?= base_url(); ?>tipo_habitacion">Tipos de habitación</a>
                        </li>
                        <li id='habitacion'>
                          <a href="<?= base_url(); ?>habitacion">Habitaciones</a>
                        </li>
                      </ul>
                    </li>
                    <li id='ubigeo'>
                      <a href="<?= base_url(); ?>ubigeo" class="toggled waves-effect waves-block">
                        <span>Ubigeo</span>
                      </a>
                    </li>
                    <li id='servicios'>
                      <a href="<?= base_url(); ?>servicios" class="toggled waves-effect waves-block">
                        <span>Servicios</span>
                      </a>
                    </li>
                    <li id='ofertas'>
                      <a href="<?= base_url(); ?>ofertas" class="toggled waves-effect waves-block">
                        <span>Ofertas</span>
                      </a>
                    </li>
                    <li><!--
                      <a href="<?= base_url(); ?>area" class="toggled waves-effect waves-block">
                        <span>Áreas</span>
                      </a>
                    </li> -->
                    <li id='cargo'>
                      <a href="<?= base_url(); ?>cargo" class="toggled waves-effect waves-block">
                        <span>Cargo</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url(); ?>proveedores" class="toggled waves-effect waves-block">
                        <span>Proveedor</span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="menu-toggle">
                        <span>Productos</span>
                      </a>
                      <ul class="ml-menu">
                        <li>
                          <a href="<?= base_url(); ?>tipo_producto">Tipos de producto</a>
                        </li>
                        <li>
                          <a href="<?= base_url(); ?>marca">Marcas</a>
                        </li>
                        <li>
                          <a href="<?= base_url(); ?>productos">Productos</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="forma_pago" class="toggled waves-effect waves-block">
                        <span>Tipos de pago</span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="menu-toggle">
                        <span>Movimientos</span>
                      </a>
                      <ul class="ml-menu">
                        <li>
                          <a href="<?= base_url(); ?>tipo_movimiento">Tipos de movimiento</a>
                        </li>
                        <li>
                          <a href="<?= base_url(); ?>concepto_movimiento">Conceptos de movimiento</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="tipo_documento" class="toggled waves-effect waves-block">
                        <span>Tipos de documento</span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="menu-toggle">
                        <span>Caja</span>
                      </a>
                      <ul class="ml-menu">
                        <li>
                          <a href="<?= base_url(); ?>caja">Caja</a>
                        </li>
                        <li>
                          <a href="<?= base_url(); ?>caja_persona">Encargado</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="<?= base_url(); ?>tipo_transaccion" class="toggled waves-effect waves-block">
                        <span>Tipos de transacción</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url(); ?>parametro" class="toggled waves-effect waves-block">
                        <span>Parámetros</span>
                      </a>
                    </li>
                  </ul>
              </li>
              <li>
                  <a class="toggled waves-effect waves-block" href="<?= base_url() ?>ventas">
                      <i class="material-icons">attach_money</i>
                      <span>Ventas</span>
                  </a>
              </li>
              <li>
                  <a class="toggled waves-effect waves-block" href="<?= base_url() ?>reservaciones">
                      <i class="material-icons">hotel</i>
                      <span>Reservaciones</span>
                  </a>
              </li>
              <li>
                  <a class="toggled waves-effect waves-block" href="<?= base_url() ?>compras">
                      <i class="material-icons">shopping_cart</i>
                      <span>Compras</span>
                  </a>
              </li>
              <li>
                  <a class="toggled waves-effect waves-block" href="<?= base_url() ?>pagos">
                      <i class="material-icons">timer</i>
                      <span>Cobros</span>
                  </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">security</i>
                  <span>Seguridad</span>
                </a>
                <ul class="ml-menu">
                  <li>
                    <a href="<?= base_url(); ?>modulo">Módulos</a>
                  </li>
                  <li>
                    <a href="<?= base_url(); ?>perfil">Perfiles</a>
                  </li>
                  <li>
                    <a href="<?= base_url(); ?>acceso">Accesos</a>
                  </li>
                  <li>
                    <a href="<?= base_url(); ?>detalle_persona_perfil">Privilegios</a>
                  </li>
                  <li>
                    <a href="<?= base_url(); ?>usuarios">Usuarios</a>
                  </li>
                </ul>
              </li>
              <!-- <?php $modulos = $this->Modulo_model->consultar_padres(); ?>
              <?php foreach($modulos as $key): ?>
                <?php $modulos1 = $this->Modulo_model->consultar_hijos($key['cod_modulo']); ?>
                <?php if($modulos1 != null){ ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons"><?= $key['icono'] ?></i>
                            <span><?= $key['modulo'] ?></span>
                        </a>
                        <ul class="ml-menu">
                          <?php foreach($modulos1 as $key1): ?>
                            <?php $modulos2 = $this->Modulo_model->consultar_hijos($key1['cod_modulo']); ?>
                            <?php if($modulos2 != null){ ?>
                                <li>
                                  <a href="javascript:void(0);" class="menu-toggle">
                                      <span><?= $key1['modulo'] ?></span>
                                  </a>
                                  <ul class="ml-menu">
                                      <?php foreach($modulos2 as $key2): ?>
                                        <li>
                                            <a href="<?= base_url(); ?><?= $key2['ruta'] ?>"><?= $key2['modulo'] ?></a>
                                        </li>
                                      <?php endforeach; ?>
                                  </ul>
                                </li>
                            <?php }else{ ?>
                              <li>
                                  <a href="<?= base_url(); ?><?= $key1['ruta'] ?>"><?= $key1['modulo'] ?></a>
                              </li>
                            <?php }; ?>
                          <?php endforeach; ?>
                        </ul>
                <?php }else{ ?>
                  <li>
                      <a href="<?= base_url(); ?><?= $key['ruta']; ?>">
                          <i class="material-icons"><?= $key['icono'] ?></i>
                          <span><?= $key['modulo'] ?></span>
                      </a>
                  </li>
                <?php }; ?>
                  </li>
              <?php endforeach; ?> -->
