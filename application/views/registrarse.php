<?php
$CI=&get_instance();
//['contrasena']== $_POST['confirmacion']
if ($_POST){
if ($_POST['clave']==$_POST['confirmacion']){
echo "<script> alert('Registrando sus datos') </script>";
$nuevo_u = new stdClass;
$nuevo_u->clave= base64_encode($_POST['clave']);
$nuevo_u->correo= $_POST['correo'];
$nuevo_u->nombre= $_POST['nombre'];
$CI->db->insert('cuentas',$nuevo_u);
$url=base_url('/index.php/reportes/login');
echo "<script> window.location='$url' </script>";
}
}
 ?>
<html>
<head>
  <meta charset="utf-8">
    <title>Registrate</title>
    <link rel="stylesheet" href="<?php echo base_url('archivos/css/bootstrap.min.css')?>">
    <script type="text/javascript"src="<?php echo base_url('archivos/js/jquery-3.3.1.min.js')?>">
    </script>
</head>
<body background="<?php echo base_url('archivos/fondos/fondo1.jpg')?>"><center><br><br><br><br><br><br>


<div style="height:430px;  width:450px; background-color:#ffffff;border-radius:10px">
<br>
<h1>Registrarse</h1>
<br>
<div >
  <form  method="POST">


<input required type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control col-7"/>
<br>
<input  required type="email" name="correo" id="correo" placeholder="Correo" class="form-control col-7"/>
<br>
<input required type="password" name="clave" id="clave" placeholder="Contraseña" onkeyup="comprobar()" class="form-control col-7"/>
<label  id="c"style="display:none;">Las contraseñas no coinsiden</label>
<br>
<input required type="password" name="confirmacion" id="confimacion" onkeyup="comprobar()" placeholder="Confimacion de contraseña" class="form-control col-7"/>
<br>
<a href="<?php echo base_url('/index.php/reportes/login')  ?>" ><button type="button" class="btn btn-warning">Cancelar </button></a>
<button type="submit"   class="btn btn-success">Registrarse</button>
</form>
</div>
</div>
</center>
</body>
<script type="text/javascript">


function comprobar() {
    contra=$("#clave").val();
    confirm=$("#confimacion").val();
  cont=$("#clave").length;
conf=$("#confimacion").length;
if(cont==conf){
  if (contra!=confirm){
    $("#c").attr("style","display");
      $("#c").attr("style","color:#ff0000");
  }else {
    $("#c").attr("style","display:none");
  }
}
}




</script>
</html>
