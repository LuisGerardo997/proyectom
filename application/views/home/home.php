<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Residencial Río</title>
  <link rel="icon" href="<?=base_url() ?>images/logo1.ico">
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="<?=base_url() ?>css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>css/custom.css" rel="stylesheet/css/custom.css">
  <link href="<?= base_url() ?>css/material-icons.css" rel="stylesheet">
</head>

<body>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar" style="overflow:auto;">
      <div class="sidebar-header">
        <p class="text-center"><?php echo $this->session->userdata['cargo']; ?></p>
        <div style="text-align:center;"><img class="img-circle" style="border: solid white 1px;" src="<?= base_url() ?>images/prrito.jpg">
          <figcaption>
            <a href="#">
              <p style="color:white;"><?php echo $this->session->userdata['nombres'].' '.$this->session->userdata['apellido_p']; ?></p>
            </a>
          </figcaption>
        </div>
      </div>
      <ul class="list-unstyled components">
        <p style="text-align:center;"> Módulos de Control</p>
        <li> <a href="<?= base_url() ?>home">Inicio</a></li>
        <li> <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Mantenimiento</a><ul class="collapse list-unstyled" id="homeSubmenu">
