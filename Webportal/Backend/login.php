<?php
session_start();
$mysql_host = "mysql16.000webhost.com";
$mysql_database = "a7784214_ddns";
$mysql_user = "a7784214_ddns";
$mysql_password = "R@Hul777";
$con = mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database, $con);
if($_POST["bus"]&&$_POST["username"]&&$_POST["password"]){
	$sql = "SELECT * FROM `a7784214_ddns`.`login` WHERE `user`='".$_POST["username"]."' and `password` = '".$_POST["password"]."' and `bus` = '".$_POST["bus"]."'";
	$query = mysql_query($sql, $con) or die ('Query is invalid: ' . mysql_error());
	$row  = mysql_fetch_array($query);
	if(is_array($row)) {
		//$_SESSION["username"] = $row[user];
		//$_SESSION["password"] = $row[password];
		//echo "".$row[user]." ".$row[password].parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH);
		
		echo "1";
		} else {
			echo "0";
		//$message = "Invalid Username or Password!";
		}
}
/*if(isset($_SESSION["username"]&&$_SESSION["password"])) {
echo "0";
}
else{
	
	echo "1";
}*/
/*
if($_POST["name"]){
$onoroff = $_POST["name"]; // Declares the request from index.html as a variable
$textfile = "ca1.txt"; // Declares the name and location of the .txt file
$fileLocation = "$textfile";
$fh = fopen($fileLocation, 'a   ') or die("Something went wrong!"); // Opens up the .txt file for writing and replaces any previous content
$stringToWrite = "\nCA1: $onoroff ".date ("y/m/d h:i:sa"); // Write either 1 or 0 depending on request from index.html
fwrite($fh, $stringToWrite); // Writes it to the .txt file
fclose($fh); 
echo "ok";
}*/
?>