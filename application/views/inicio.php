<?php
$CI=& get_instance();
$rs=$CI->db->get('reportes')->result_array();

 ?>
<body >
  <div style="background-color:#ffffff;"class="container min-height">

 <div class="" style="padding-right:800px;">
   <label style="background-color:#62416F;color:#ffffff; " class="form-control col-form-label"><h2>Todos los reportes</h2></label>
 </div><br>
  <center>

    <div class="form-control" >
        <div id="map"></div>
    </div>

    </center>
    <script>

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:18.9065712, lng:-71.2514931 },
          zoom: 8
        });
var myLatLng = {lat:18.261956, lng:-70.353342 };
        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        service.getDetails({
          placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'
        }, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            <?php
            $t= array();
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


            }


              for ($i=0; $i < count($rs); $i++) {

                $link=base_url("index.php/reportes/detalles/{$rs[$i]['id']}");
                $myLatLng ="{lat:{$rs[$i]['lat']}, lng:{$rs[$i]['lng']} }";
            echo "   marker = new google.maps.Marker({
                  map: map,
                  position: {$myLatLng},
                  title: 'Problema {$rs[$i]['id']}'
                });
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent('<strong>'+'{$rs[$i]['id']}.'+'{$t[$i]}' + '</strong><br><strong><a tareget_blank href={$link}>'+'Detalles' + '</a></strong>');
              infowindow.open(map, this);
            });";  }

            ?>


          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YourApiKey&libraries=places&callback=initMap">
    </script>
  </div>
</body>
