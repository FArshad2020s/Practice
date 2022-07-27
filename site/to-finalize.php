<html dir="rtl">
<head>
</head>
<body>


<?php
#farshad arbab-------------------------------------------------
require "_load.php";
#--------------------------------------------------------------
isLogin();
#---------------------------------------------------Get inforamtion from reprot.php
if(!isset($_GET['productId'])){
	exit("no productId");
}
$productId=$_GET['productId'];
if(!isset($_GET['normally_hours'],$_GET['normally_minutes'],$_GET['overtime_hours']
,$_GET['overtime_minutes'])){
	echo "not isset" ;
}

$normally_hours = $_GET['normally_hours'];
$overtime_hours = $_GET['overtime_hours'];
$normally_minutes=$_GET['normally_minutes'];
$overtime_minutes=$_GET['overtime_minutes'];
#---------------------------------------------------------------- write selected info
#and insert information to database
echo getProjectName(getProjectId($productId));?><br><?php
echo getProduct($productId);?><br><br><br><?php

$overtimes = [];
$normally_times = [];

$activity_ids = getActivityIds();
foreach($activity_ids as $activity_id){
	$normally_times[$activity_id]=$normally_hours[$activity_id].":".
	$normally_minutes[$activity_id];
	
	$overtimes[$activity_id] = $overtime_hours[$activity_id].":".
	$overtime_minutes[$activity_id];
}

$project_id = getProjectId($productId);
foreach($activity_ids as $activity_id){
#-------------------------------------------------------------------
	if( $normally_hours[$activity_id]==0 and
		$normally_minutes[$activity_id] == 0 and 
		$overtime_hours[$activity_id] == 0 and
		$overtime_minutes[$activity_id] ==0){
		continue;
	}
	
	
	$sql = "INSERT INTO `user_report`(activity_id,project_id,product_id,
	normally_time,overtime) VALUES(:activity_id,:project_id,:product_id,
	:normally_time,:overtime)";
	echo $sql."\n" ;
	$stmt = $db->prepare($sql);
	$test = 1;
	$stmt->bindParam("activity_id",$activity_id);
	$stmt->bindParam("project_id",$project_id);
	$stmt->bindParam("product_id",$productId);
	$stmt->bindParam("normally_time",$normally_times[$activity_id]);
	$stmt->bindParam("overtime",$overtimes[$activity_id]);
	$stmt->execute();
	
	
	$check="set" ;
	echo getActivity($activity_id);?><br>
	normally time: <?php
	echo $normally_hours[$activity_id];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php
	echo $normally_minutes[$activity_id];?><br> overtime: <?php
	echo $overtime_hours[$activity_id];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php
	echo $overtime_minutes[$activity_id];?><br><br><?php
}
if(!isset($check)){
	echo("حداقل یکی از فعالیت ها را زبان بندی کنید");
}
?>

</body>
</html>