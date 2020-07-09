<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <link  href="archivos/css/bootstrap.min.css" rel="stylesheet">
    <script src="extra/js/jquery-3.3.1.min.js">

  </script>
  <meta charset="utf-8">
    <title>Configuracion</title>
  </head>
  <body background="archivos/fondos/fondoconf31.jpg"><center><br><br><br><br><br>


<div style="height:450px; width:470px; background-color:#ffffff;">
  <br>
  <h1>Configuaracion BD</h1>
  <div >
    <form method="POST">
  <input type="text" name="hostname" placeholder="Hostname" class="form-control col-7"/>
  <br>
  <input type="text" name="usuario" placeholder="Usuario" class="form-control col-7"/>
  <br>
  <input type="password" name="clave"class="form-control col-7" placeholder="Contraseña"/>
<br>

  <input type="text" name="namedb" placeholder="Nombre DB" class="form-control col-7"/>
  <br>
  <input type="text" name="urlbase" placeholder="URL" class="form-control col-7"/>
  <br>
  <input type="submit"  class="btn btn-info" value="Guardar"/>

  </form>
</div>
</div>
  </center>

  </body>

  </html>
  <?php
if ($_POST){
  $contenido = array();
  foreach ($_POST as $campo => $valor) {
  $contenido[]="define('{$campo}','{$valor}');\n";
  }
  $link = mysql_connect($_POST['hostname'],$_POST['usuario'],$_POST['clave']);
  if ($link){
  $sql="create database {$_POST['namedb']}";
  $result=mysql_query($sql);
  $sql="use {$_POST['namedb']}";
  $result=mysql_query($sql);
  $sql="
    CREATE TABLE `cuentas` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `correo` varchar(100) NOT NULL,
      `clave` varchar(100) NOT NULL,
      `nombre` varchar(40) NOT NULL,
      PRIMARY KEY (`id`),
     UNIQUE KEY `UQCORREO` (`correo`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

  $result=mysql_query($sql);
  $sql="
  CREATE TABLE `reportes` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `id_usuario` int(11) NOT NULL,
    `titulo` varchar(100) NOT NULL,
    `resumen` text NOT NULL,
    `descripcion` text NOT NULL,
    `img` varchar(100) NOT NULL,
    `chek` int(1) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  ";
    $result=mysql_query($sql);
  mysql_select_db($_POST['namedb'], $link);}
  $campos=implode("\n",$contenido);
  $txt = "<?php $campos ?>";
  file_put_contents('vconfig.php',$txt);
 echo "<script type='text/javascript'>window.location='index.php'</script>";
}

   ?>
