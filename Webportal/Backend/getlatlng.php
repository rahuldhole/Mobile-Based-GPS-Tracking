 <?php
 include('db.php');
 if($_GET['BUS']){
	$sql = "SELECT * FROM bustrack WHERE bus='". $_GET['BUS']."'";
			$res = mysql_query($sql, $con);
			$row = mysql_fetch_array($res);
			echo "".$row['long']."".$_GET['BUS']."".$row['lat'];
 }
 else{
	 
	 echo "Don't try to hack baby...";
 }
 ?>