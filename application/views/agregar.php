<?php
//-----------------------------
$fecha= date("m/d/Y");
  $CI=&get_instance();
  $CI->db->where('id',$id);
  $filas=$CI->db->get('reportes')->result_array();
  if(count($filas)>0){
    $fila=$filas[0];
  $input =" <input  type='file' class='form-control' accept='.jpg, .jpeg, .png' name='foto'/>";
  $selec="<select  class='form-control' name='tipo'>
      <option value='' >Seleccionar...</option>
    <option value='1' >Hoyos</option>
    <option value='2' >Tapa de alcantarilla no presente</option>
      <option value='3' >Aguas estancadas</option>

  </select>";
  }else{
  $fila=array('id'=>'','id_usuario'=>'','fecha'=>$fecha,'tipo'=>'','descripcion'=>'','img'=>'','lat'=>'','lng'=>'');
  $input =" <input required type='file' class='form-control' accept='.jpg, .jpeg, .png' name='foto'/>";
  $selec="<select required class='form-control' name='tipo'>
      <option value='' >Seleccionar...</option>
    <option value='1' >Hoyos</option>
    <option value='2' >Tapa de alcantarilla no presente</option>
      <option value='3' >Aguas estancadas</option>

  </select>";
  $CI=get_instance();
  $datos=$CI->db->get('reportes')->result_array();
  foreach($datos as $filas) {
$fila['id']=$filas['id']+1;
}
  }
?>
<body>


<div style="background-color:#ffffff " class="container">


<div class="" style="padding-right:850px;">
  <label style="background-color:#62416F;color:#ffffff; " class="form-control col-form-label"><h2>Hacer Reporte</h2></label>
</div>
      <br>
      <form method="post" action=""class="form-control form-horizontal" enctype="multipart/form-data">
        <input type="hidden" id="lat" required name="lat" value="<?php echo $fila['lat']; ?>">
        <input type="hidden" id="lng" required name="lng" value="<?php echo $fila['lng']; ?>">
<input type="hidden" name="id_usuario" value="<?php echo @$_SESSION['usuario']['id']?>">
        <input type="hidden"  id="id" name="id" value="<?php echo $fila['id']; ?>">
<div class="form-group col-2">
  <label  class="  col-form-label"><h5 >Fecha</h5></label>
    <input required readonly="readonly"class="form-control" value="<?php echo $fila['fecha'];?>"type="datetime" name="fecha">
</div>

<br>
<div class="form-group col-5">
  <label  class="  col-form-label"><h5 >Tipo</h5></label>

    <?php
        echo $selec;
      ?>
  </div>
<br>


<div class="col-10 form-group">
  <label  class="col-form-label "  ><h5>Descripcion</h5></label>
   <textarea   class="form-control ckeditor" name="descripcion" id="descripcion" rows="5" cols="100"><?php echo $fila['descripcion']; ?></textarea>
  </div>
<br>
<div class="form-group col-5">
<label class=" col-form-label"><h5>Foto</h5></label>



  <?php echo $input;

  ?>
</div> <br>
<div class="form-control">
  <h5>Pulse el lugar del mapa donde esta el problema</h5>
  <div  id="map" ></div>

</div>
<br>
<div >
<input  type="submit" style="float:right" name="guardar" value="Guardar" class="col-2 btn btn-success">
</div>


<br>
<br>
</form>
</div>
<script type="text/javascript">

  filas = <?= json_encode($filas) ?>;
  if(filas==0){
    document.getElementById('id').value=1;
  }

  function conteo(cont){
var conteo=$(cont).val().length;
alert('conteo');
$('#contador').html(conteo+"/300");

}
</script>



<script>


  var map;
  var markers = [];

  function initMap() {
    var haightAshbury = {lat:18.9065712, lng:-71.2514931};

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: haightAshbury,
      mapTypeId: 'roadmap'
    });

    map.addListener('click', function(event) {
if(markers.length<1){
addMarker(event.latLng);
}else{
clearMarkers();
    markers = [];
addMarker(event.latLng);
}
    });

  }
  function addMarker(location) {
    var marker = new google.maps.Marker({
      position: location,

      map: map
    });
    markers.push(marker);
    document.getElementById('lat').value=location.lat();
    document.getElementById('lng').value=location.lng();
  }

  function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

  function clearMarkers() {
    setMapOnAll(null);
  }


</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxPxCHnZDfIQLz6c_LZtnSlIl0bqU_4YA&callback=initMap">
</script>
</body>
