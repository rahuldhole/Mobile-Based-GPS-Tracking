 <?php 
 include('db.php');
 if($_GET['BUS']){
	$sql = "SELECT * FROM bustrack WHERE bus='". $_GET['BUS']."'";
			$res = mysql_query($sql, $con);
			$row = mysql_fetch_array($res);
			//echo "<h1>Location of ".$row['address']."</h1>";
			//echo "Lattitude: ".$row['lat']." Longitude: ".$row['long'];
/*
			$myfile = fopen("ca1.txt", "r") or die("Unable to open file!");
			$loc = fread($myfile,filesize("ca1.txt"));
			echo "".$loc;
			$str =  split("RN",$loc);
			fclose($myfile);*/
 ?>
<head onLoad = "show()"><p id = "address"></p></head>
<button onClick = "show()">Update Address</button>
<script>

function show(){
	//var element2 = "Started Task";
	<?php 	$sql = "SELECT * FROM bustrack WHERE bus='". $_GET['BUS']."'";
			$res = mysql_query($sql, $con);
			$row = mysql_fetch_array($res); ?>
	var element2 = document.getElementById('address');
	//alert("Ok");
element2.innerHTML = 	"Started Task";
element2.innerHTML = "<b><?php echo "".$row['address'];/* echo "".$str[1];*/ ?></b>";
}
</script>
<?php

 }
 else{
	 
	 echo "Server Busy...";
 }


?>