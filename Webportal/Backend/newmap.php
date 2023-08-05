 <?php 
 include('db.php');
 if($_GET['BUS']){
	$sql = "SELECT * FROM bustrack WHERE bus='". $_GET['BUS']."'";
			$res = mysql_query($sql, $con);
			$row = mysql_fetch_array($res);
			echo "<h1>Location of ".$row['bus']."</h1>";
			echo "Lattitude: ".$row['lat']." Longitude: ".$row['long'];
/*
			$myfile = fopen("ca1.txt", "r") or die("Unable to open file!");
			$loc = fread($myfile,filesize("ca1.txt"));
			echo "".$loc;
			$str =  split("RN",$loc);
			fclose($myfile);*/
 ?>
 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript">
    var markers = [
        {
            "title": '<?php echo "".$_GET['BUS']; /* echo "RN";*/ ?>',
            "lat": '<?php echo "".$row['long'];/* echo "".$str[1];*/ ?>', 
            "lng": '<?php echo "".$row['lat'];/* echo "".$str[0];*/ ?>',
            "description": 'SGGS BUS TRACKING BY GrBotA Team'
        }
];
    window.onload = function () {
		var amsterdam = new google.maps.LatLng(markers[0].lat, markers[0].lng)
        var mapOptions = {
            center: amsterdam,
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var lat_lng = new Array();
        var latlngbounds = new google.maps.LatLngBounds();
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            lat_lng.push(myLatlng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
            latlngbounds.extend(marker.position);
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);

        //***********ROUTING****************//
		/////circle start
		var myCity = new google.maps.Circle({
  center:amsterdam,
  radius:1000,
  strokeColor:"#0000FF",
  strokeOpacity:0.3,
  strokeWeight:5,
  fillColor:"#0000FF",
  fillOpacity:0.1
  });
myCity.setMap(map);
		/////circle end

        //Intialize the Path Array
        var path = new google.maps.MVCArray();

        //Intialize the Direction Service
        var service = new google.maps.DirectionsService();

        //Set the Path Stroke Color
        var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });

        //Loop and Draw Path Route between the Points on MAP
        for (var i = 0; i < lat_lng.length; i++) {
            if ((i + 1) < lat_lng.length) {
                var src = lat_lng[i];
                var des = lat_lng[i + 1];
                path.push(src);
                poly.setPath(path);
                service.route({
                    origin: src,
                    destination: des,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                }, function (result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            path.push(result.routes[0].overview_path[i]);
                        }
                    }
                });
            }
        }
    }
</script>
<div id="dvMap" style="width: 800px; height: 800px; align: center">
</div>
<!------------New------------>
<script>

</script>
<!------------------------>
<?php

 }
 else{
	 
	 echo "Server Busy...";
 }


?>