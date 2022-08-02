<?PHP
require "_load.php";
isLogin();
#=====================================================
if(!isset($_POST['product_id'])){
	replace("products.php");
}
$product_id = (int)$_POST['product_id'];
#================================================================ save report
if(isset($_POST['save'])){
#-----------------------------get normally_hours,normally_minutes,overtime_hours and overtime_minutes
	if(!isset($_POST['normally_hours'],$_POST['normally_minutes'],$_POST['overtime_hours'],
			  $_POST['overtime_minutes'])){
		exit("time is not set");
	}
	$normally_hours = $_POST['normally_hours'];		
	$normally_minutes = $_POST['normally_minutes'];		
	$overtime_hours = $_POST['overtime_hours'];		
	$overtime_minutes = $_POST['overtime_minutes'];	
#-----------------------------------------------------
	$project_id = getProjectId($product_id);
	$report_time = time();
	$user_id = $_SESSION['user_id'];
#-----------------------------------------------------
	$activity_ids = getActivityIds();
#-----------------------------------------------------
	foreach($activity_ids as $activity_id){

		$normally_time = $normally_hours[$activity_id].":".
		$normally_minutes[$activity_id];
		
		$overtime = $overtime_hours[$activity_id].":".
		$overtime_minutes[$activity_id];
#-----------------------------------------------------
		saveReport($user_id,$activity_id,$project_id,$product_id,$normally_time,$overtime,$report_time);
	}
}

#=====================================================
$activities = getActivities();
?>

<html>
<head>
</head>
<body>

<form action = "" method = "post">
<input type = "hidden" name = "product_id" value = "<?=$product_id?>">
<?php foreach($activities as $activity){
	echo $activity['name'];?><br>
	normally time:
	<select name = "normally_hours[<?= $activity['id'] ?>]">
		<option value = "0">0</option>
		<option value = "1">1</option>
		<option value = "2">2</option>
		<option value = "3">3</option>
		<option value = "4">4</option>
		<option value = "5">5</option>
		<option value = "6">6</option>
		<option value = "7">7</option>
		<option value = "8">8</option>
		<option value = "9">9</option>
	</select>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<select name = "normally_minutes[<?= $activity['id'] ?>]">
		<option value = "0">0</option>
		<option value = "5">5</option>
		<option value = "10">10</option>
		<option value = "15">15</option>
		<option value = "20">20</option>
		<option value = "25">25</option>
		<option value = "30">30</option>
		<option value = "35">35</option>
		<option value = "40">40</option>
		<option value = "45">45</option>
		<option value = "50">50</option>
		<option value = "55">55</option>
	</select>
	
	<br>
	
	overtime:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select name = "overtime_hours[<?= $activity['id'] ?>]">
		<option value = "0">0</option>
		<option value = "1">1</option>
		<option value = "2">2</option>
		<option value = "3">3</option>
		<option value = "4">4</option>
		<option value = "5">5</option>
		<option value = "6">6</option>
		<option value = "7">7</option>
		<option value = "8">8</option>
		<option value = "9">9</option>
	</select>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<select name = "overtime_minutes[<?= $activity['id'] ?>]">
		<option value = "0">0</option>
		<option value = "5">5</option>
		<option value = "10">10</option>
		<option value = "15">15</option>
		<option value = "20">20</option>
		<option value = "25">25</option>
		<option value = "30">30</option>
		<option value = "35">35</option>
		<option value = "40">40</option>
		<option value = "45">45</option>
		<option value = "50">50</option>
		<option value = "55">55</option>
	</select><br><br><br><br>
<?php } ?>
<input name = "save" type = "submit" value = "save">
</form>

</head>
</html>