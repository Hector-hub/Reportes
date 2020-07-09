<!DOCTYPE html>
<?php
$user="";
$label="Iniciar Session";
$label2="";
if(isset($_SESSION['usuario'])){
$user=$_SESSION['usuario']['nombre']." |";
$label="Cerrar Session";
$label2="Mis reportes |";
}

 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reportes</title>
      <link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css">
      <link rel="icon" type="image/png" href="<?php echo base_url('archivos/fondos/r.png')?>">
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="<?php echo base_url('archivos/css/bootstrap.min.css')?>" >
<script type="text/javascript" src="<?php echo base_url('archivos/ckeditor/ckeditor.js') ?>">
</script>
<script type="text/javascript" src="<?php echo base_url('archivos/js/jquery-3.3.1.js') ?>">
</script>
    <style >
      .min-height{
min-height: 680px;

      }
      p {

    margin-left: 270px;
    margin-right: 270px;
}

  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 480px;
    width:1060px;

  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  #floating-panel {
    position: absolute;
    top: 10px;
    left: 25%;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
    text-align: center;
    font-family: 'Roboto','sans-serif';
    line-height: 30px;
    padding-left: 10px;
  }

    </style>
  </head>
  <body background="<?php echo base_url('archivos/fondos')?>/fondo2.png">
    <div class="container"  style="background-color:#ffffff ">
      <div class="page-header" style="background-color:#62416F">
      	<div class="container">
          <table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto;" >
              <td >
              <a href="<?php echo base_url('index.php/reportes')?>"><h1 style="color:#ffffff">Reportes</h1></a>
              </td>
              <td style="vertical-align: center; text-align: right;">
                <a href="<?php echo base_url('index.php/reportes')?>">  <button type="button"  class="btn btn-info" name="button">Inicio</button></a>
              <a href="<?php echo base_url('index.php/reportes/agregar')?>">  <button type="button"  class="btn btn-warning" name="button">Agregar reportes</button></a>

              </td>
</table>

      </div>
    </div>
    <div class=""style="text-align: right;">

      <label style=""><?php echo $user?></label>
      <a class="offset-xs-1" style="color:#0000ff; " href="<?php echo base_url('index.php/reportes/mostrartodos')?>"><?php echo $label2; ?> </a>

      <a class="offset-xs-1" style="color:#0000ff; " href="<?php echo base_url('index.php/reportes/salir')?>"><?php echo $label; ?></a>

      </div>


      </div>
