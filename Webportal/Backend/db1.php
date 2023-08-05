<?php
$mysql_host = "mysql16.000webhost.com";
$mysql_database = "a7784214_ddns";
$mysql_user = "a7784214_ddns";
$mysql_password = "R@Hul777";
$con = mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database, $con);
if($_POST["bus"]&&$_POST["lattitude"]&&$_POST["longitude"]&&$_POST["address"]&&$_POST["flag"]&&$_POST["time"]){
	$long = 1;
	$lat = 1;
	//$sql = "INSERT INTO `a7784214_ddns`.`bustrack` (`long`, `lat`, `bus`, `address`, `flag`, `time`) VALUES ('".$_POST["longitude"]."','".$_POST["lattitude"]."','".$_POST["bus"]."','".$_POST["address"]."','".$_POST["flag"]."','".$_POST["time"]."')";
	//$sql = 'UPDATE `a7784214_ddns`.`bustrack` SET `long` = \'77\', `lat` = \'19\', `address` = \'NED\', `time` = \'10\', `flag` = \'0\' WHERE `bus` = \'RN\'';
// working	$sql = "UPDATE `a7784214_ddns`.`bustrack` SET `long` = '".$_POST["longitude"]."', `lat` = '".$_POST["lattitude"]."', `address` = '".$_POST["address"]."', `time` = '".$_POST["time"]."', `flag` = '".$_POST["flag"]."' WHERE `bus` = '".$_POST["bus"]."'";
$sql = "UPDATE `a7784214_ddns`.`bustrack` SET `long` = '".$_POST["longitude"]."', `lat` = '".$_POST["lattitude"]."', `address` = '".$_POST["address"]."', `time` = '".$_POST["time"]."' WHERE `bus` = '".$_POST["bus"]."' AND `flag` = '".$_POST["flag"]."'";
	$query = mysql_query($sql, $con) or die ('Query is invalid: ' . mysql_error());
	echo "Rahul Your too smart";
}
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
/*

 UPDATE `a7784214_ddns`.`bustrack` SET `long` = '77',
`lat` = '19',
`address` = 'NED',
`time` = '10',
`flag` = '0' WHERE `bus` = 'RN' 
*/
?>