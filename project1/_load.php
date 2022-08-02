<?PHP
#===============================================connect to database
require "_security.php";
session_start();
$dsn = "mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8mb4";
try{
	$db = new pdo($dsn,USERNAME,PASSWORD);
}
catch(PDOException $error){
	echo "خطا در برقراری ارتباط با دیتابیس";
}
#==========================================================functions
function replace($file_name){
	header("Location: $file_name");
	exit();
}
#-----------------------------------------------------
function sessionSet($username,$password){
	global $db ;
	
	$sql = "select id from user where username=:username and 
	password = :password" ;
	
	$stmt = $db->prepare($sql);
	$stmt->bindParam("username",$username);
	$stmt->bindParam("password",$password);
	$stmt->execute();
	
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($user === false){return false;}
	else{
		$_SESSION['user_id'] = $user['id'];
		return true;
	}
	
}
#------------------------------------------------
function isSetUserId($user_id){
	global $db ;
	
	$sql = "select id from user where id = :user_id";
	
	$stmt = $db->prepare($sql);
	$stmt->bindParam("user_id",$user_id);
	$stmt->execute();
	$resulte = $stmt->fetch(PDO::FETCH_ASSOC);
	if($resulte === false){return false;}
	else{return true ;}
}
#-----------------------------------------------
function isLogin(){
	if(!isset($_SESSION['user_id'])){
		replace("login.php");
	}
	if(isSetUserId($_SESSION['user_id']) === false){
		replace("login.php");
	}
}
#------------------------------------------------
function getProjects(){
	global $db ;
	
	$sql = "select * from projects";
	$projects = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	return $projects ;
}
#-------------------------------------------------
function getProducts($project_id){
	global $db ;
	$sql = "select * from products where project_id = :project_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam("project_id",$project_id);
	$stmt->execute();
	$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $products ;
	
}
#-------------------------------------------------
function getActivities(){
	global $db; 
	$sql = "select * from activities";
	$activities = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	return $activities ;
}
#-------------------------------------------------
function getProjectId($product_id){
	global $db ;
	$sql = "select project_id from products where
			id = :product_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam("product_id",$product_id);
	$stmt->execute();
	$project_id = $stmt->fetch(PDO::FETCH_ASSOC)['project_id'];
	return $project_id ;
}
#-------------------------------------------------
function getActivityIds(){
	global $db ;
	
	$sql = "select id from activities";
	$activity_ids = array_column($db->query($sql)
	->fetchAll(PDO::FETCH_ASSOC),"id");
	return $activity_ids ;
}
#-------------------------------------------------
function saveReport($user_id,$activity_id,$project_id,$product_id,
					$normally_time,$overtime,$report_time){
	global $db ;
	$sql = "insert into report (user_id,activity_id,project_id,
	product_id,normally_time,overtime,report_time)
	values(:user_id,:activity_id,:project_id,:product_id,
	:normally_time,:overtime,:report_time)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam("user_id",$user_id);
	$stmt->bindParam("activity_id",$activity_id);
	$stmt->bindParam("project_id",$project_id);
	$stmt->bindParam("product_id",$product_id);
	$stmt->bindParam("normally_time",$normally_time);
	$stmt->bindParam("overtime",$overtime);
	$stmt->bindParam("report_time",$report_time);
	if($stmt->execute()){
		return true;
	}
	else{return false;}
	
	
}
?>