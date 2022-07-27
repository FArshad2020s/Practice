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

function findProject(int $productId){
	global $db;
	$sql="SELECT `project_id` FROM `products` WHERE `id` = :productId";
	$stmt = $db->prepare($sql);
	$stmt->bindParam("productId",$productId);
	$stmt->execute();
	$project_id=$stmt->fetch(PDO::FETCH_ASSOC)['project_id'];
	$sql2="SELECT `name` FROM `projects` WHERE `id` = :project_id";
	$stmt = $db->prepare($sql2);
	$stmt->bindParam("project_id",$project_id);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
}


function getProduct($productId){
	global $db;
	$sql="SELECT `name` FROM `products` WHERE `id`=:productId";
	$stmt=$db->prepare($sql);
	$stmt->bindParam("productId",$productId);;
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
}

function getActivity($activity_id){
	global $db ;
	$sql="SELECT `name` FROM `activities` WHERE `id`=:activity_id";
	$stmt=$db->prepare($sql);
	$stmt->bindParam("activity_id",$activity_id);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
}

function getActivityIds():array{
	global $db;
	$sql = "SELECT id FROM activities";
	$ids = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
	return $ids;
}