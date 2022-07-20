<?php
$mysqli=new mysqli("localhost","root","","learn");
$mysqli->set_charset("utf8");
if($mysqli->connect_errno){
	echo "you are have an error <br>Error: ".$mysqli->connect_error ;
}

?>