<!DOCTYPE html>
<?php
$CI=get_instance();
$inicio_u = new stdClass;
$inicio_u->correo ="";
$inicio_u->clave ="";
$msg="";
if ($_POST){
  $inicio_u->correo =$_POST['correo'];
  $inicio_u->clave =$_POST['clave'];
if (iniciarSesion($inicio_u)){
    redirect('');
}else{
  $msg="El usuario y contraseña son invalidos";
}
}
 ?>
 <html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="<?php echo base_url('archivos/css/bootstrap.min.css')?>">
  <script type="text/javascript"src="<?php echo base_url('archivos/js/jquery-3.3.1.min.js')?>">

  </script>
  </head>

  <body background="<?php echo base_url('archivos/fondos/fondo1.jpg')?>"><center><br><br><br><br><br><br><br>


  <div style="height:400px; width:450px; background-color:#ffffff;border-radius:10px">
  <br><br><br><br>
  <h1>Iniciar sesión</h1>
  <div >
    <form  method="POST">


  <input required type="email" name="correo" value='<?php echo $inicio_u->correo;?>' placeholder="correo" class="form-control col-7"/>
  <br>

  <input required type="password" name="clave"class="form-control col-7" placeholder="Contraseña"/>
  <br>
  <a href="<?php echo base_url('/index.php/reportes/registro')  ?>"><button type="button" class="btn btn-warning">Registrarse</button></a>
  <input type="submit"  class="btn btn-info" value="Iniciar sesión"/>

  </form>
  <div >
    <h5 style="color:red;"><?php echo $msg; ?></h5>

  </div>
  </div>
  </div>
  </center>

  </body>
</html>
