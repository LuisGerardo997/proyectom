<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Selección de perfiles</title>
  <link rel="icon" href="<?=base_url() ?>images/icon/logo_material.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Jquery Core Js -->
  <script src="<?=base_url() ?>plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core Css -->
  <link href="<?=base_url() ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="<?=base_url() ?>plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="<?=base_url() ?>plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="<?=base_url() ?>css/style.css" rel="stylesheet">
  <link href="<?=base_url() ?>css/perfil.css" rel="stylesheet">
</head>
<script>
  var base_url = '<?= base_url() ?>';
</script>
<body class="bg-indigo">
  <div class="centrado">
    <div class="block-header">
      <!-- <div class="text-center"><img src="<?= base_url() ?>images/Rio1.png"> -->
      <h1 class="text-center">Bienvenido <?php echo $this->session->userdata('username'); ?></h1>
      <h4 class="text-center">Por favor, seleccione su perfil</h4>
    </div>
    <div class="container-fluid">
      <?php foreach ($perfiles as $fila): ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a id="<?= $fila['cod_perfil'] ?>">
          <div class="info-box-2 bg-light-green hover-zoom-effect">
            <div class="icon">
              <i class="material-icons">person</i>
            </div>
            <div class="content">
              <br>
              <h5 class="font-bold"><?= $fila['perfil']; ?></h5>
              <div class="number"></div>
            </div>
          </div>
        </a>
        </div>
      <?php endforeach; ?>
      <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box-3 bg-green hover-expand-effect">
      <div class="icon">
      <i class="material-icons">flight_takeoff</i>
    </div>
    <div class="content">
    <div class="text">FLIGHT</div>
    <div class="number">02:59 PM</div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box-3 bg-light-green hover-expand-effect">
<div class="icon">
<i class="material-icons">battery_charging_full</i>
</div>
<div class="content">
<div class="text">BATTERY</div>
<div class="number">Charging</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box-3 bg-light-green hover-expand-effect">
<div class="icon">
<i class="material-icons">battery_charging_full</i>
</div>
<div class="content">
<div class="text">BATTERY</div>
<div class="number">Charging</div>
</div>
</div>
</div>-->
</div>
</div>
<script>
$(document).ready(function(){
  $('a').mouseover(function(){
    document.body.style.cursor="pointer";
  });
  $('a').mouseout(function(){
    document.body.style.cursor = 'auto';
  });
  $('a').click(function(e){
    e.preventDefault();
    var cod = $(this).attr('id');
    $.post(base_url+'login/registro_perfil',
    {
      cod_perfil: cod,
    },
    function(data){
      window.location=base_url+'home';
    })
  })
})
</script>
