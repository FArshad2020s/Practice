<?php
$mysqli=new mysqli("localhost","root","","learn");
if($mysqli->connect_errno){
	echo "error in connect to database. Error: ".$mysqli->connect_error;
	exit();
}
$mysqli->set_charset("utf8");
echo "affected rows: ".$mysqli->affected_rows."<br>";
echo "client info: ".$mysqli->client_info."<br><br><br>";
#connect_errno -> return code of error
print_r($mysqli);


?>