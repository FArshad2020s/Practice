<?php
function isLogin(){
	if(!isset($_SESSION['id'])){
	header("Location: login.php");
	exit();
	}
}

require "_security.php";
session_start();
$dsn="mysql:host=".host.";dbname=".dbname.";charset=utf8mb4";
try{
	$db=new PDO($dsn,username,password);
	return $db ;
}catch(PDOException $error){
	echo "خطا در برقراری ارتباط با دیتابیس";
	exit();
}

?>