<body>

<div style="background-color:#ffffff;"class="container min-height">


<?php
$CI=& get_instance();
$CI->db->where('id_usuario',$_SESSION['usuario']['id']);
$rs=$CI->db->get('reportes')->result_array();
$t= array();


$c=0;
if(count($rs)>0){
  echo "<div class='' style='padding-right:800px;'>
    <label style='background-color:#62416F;color:#ffffff;' class='form-control col-form-label'><h2>Todos mis reportes</h2></label>
  </div>";
echo "<br><br><table class='table' width='50%' style='text-align: left; margin-left: auto; margin-right: auto;'>";
for ($o=0; $o < count($rs); $o++) {
  switch ($rs[$o]['tipo']) {
    case '1':$t[$o]='Hoyos';
      # code...
      break;
      case '2':$t[$o]='Falta de tapa de alcantarilla';
        # code...
        break;
        case '3':$t[$o]='Aguas estancadas';
          # code...
          break;
  }
  $c=$c+1;
  echo "<tr><td><h2><a href='".base_url("index.php/reportes/detalles/{$rs[$o]['id']}")."'>{$c}.{$t[$o]}<a></h2></td><tr>";
}
echo "</table>";}else {
  echo "<h2>No se encontro ningun archivo</h2>";
}
 ?>
</div>
</body>
