<?php
require "_security.php";

session_start();

$dsn = "mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8mb4";
try{
	$db=new PDO($dsn,USERNAME,PASSWORD);
	return $db;
}catch(PDOException $error){
	echo "خطا در برقراری ارتباط با دیتابیس";
	exit();
}

function isLogin(){
	if(!isset($_SESSION['id'])){
		header("Location: login.php");
		exit();
	}
}
