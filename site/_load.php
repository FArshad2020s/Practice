<?php
require "_security.php";
#------------------------------------------------------
session_start();
#------------------------------------------------------ connect to database
$dsn = "mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8mb4";
try{
	$db=new PDO($dsn,USERNAME,PASSWORD);
}catch(PDOException $error){
	echo "خطا در برقراری ارتباط با دیتابیس";
	exit();
}
#functions-------------------------------------------
function isLogin(){
	if(!isset($_SESSION['id'])){
		header("Location: login.php");
		exit();
	}
}

function getProjects(){
	global $db;
	$sql="SELECT * FROM `projects`;";
	$stmt=$db->prepare($sql);
	$stmt->execute();
	$projects=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $projects;
}

function getProducts_of_project(int $projectId):array{
	global $db;
	$sql="SELECT `id`,`name`,`code` FROM products WHERE project_id=:projectId";
	$stmt=$db->prepare($sql);
	$stmt->bindparam("projectId",$projectId);
	$stmt->execute();
	$products=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $products;
}

function logout(){
	unset($_SESSION['id']);
	header("Location: login.php");
	exit();
}