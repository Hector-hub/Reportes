<?php

$urleliminar=base_url();
  $CI=&get_instance();
  $CI->db->where('id',$id);
  $filas=$CI->db->get('reportes')->result_array();
  if(count($filas)>0){
    $fila=$filas[0];
    $url= base_url('')."{$fila['img']}";
  }
  $t='';
    switch ($filas[0]['tipo']) {
      case '1':$t='Hoyos';
        # code...
        break;
        case '2':$t='Falta de tapa de alcantarilla';
          # code...
          break;
          case '3':$t='Aguas estancadas';
            # code...
            break;

  }

?>

<div class="container min-height" style="background-color:#ffffff;">
<form method="post" action="" id='formulario' enctype="multipart/form-data">
<center>
  <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>">
  <br>
<img src="<?php echo $url?>" class="col-md-6"/>

<br>
  <label  class=" "><h2><?php echo $t; ?></h2> </label>
<br>
  <label  class="" style="text-align:left;"><p><?php echo $fila['fecha']; ?></p></label>
<br>
<label  class="" style="text-align:left;"><p><?php echo $fila['descripcion']; ?></p></label>
<br>




<div >
  <?php

  if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['id']==$fila['id_usuario']){
  echo "<center><a href='".base_url("index.php/reportes/agregar/{$id}")."'><input  style='margin-right:5px;' type='button'  name='editar' value='Editar' class='btn btn-success'></a>";
echo "<input  type='button' style='margin-left:5px;' name='editar' value='Eliminar' onclick='eliminar()' class='btn btn-danger'></center>";
}}
    ?>

</div>
</center>
</form>
</div>
</div>
<script type="text/javascript">
  filas = <?= json_encode($filas) ?>;
  var  url = <?= json_encode($urleliminar) ?>;
    var  id = <?= json_encode($id) ?>;
  if(filas==0){
    document.getElementById('id').value=1;
  }
  function eliminar(){
if(confirm('Seguro que deseas eliminar?')){
  window.location=url+"index.php/reportes/eliminar/"+id+"";
}

  }
</script>
