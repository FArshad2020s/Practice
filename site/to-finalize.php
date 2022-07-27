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
$normally_hours=$_GET['normally_hours'];
$normally_minutes=$_GET['normally_minutes'];
$overtime_hours=$_GET['overtime_hours'];
$overtime_minutes=$_GET['overtime_minutes'];
#---------------------------------------------------------------- write selected info
echo findProject($productId);?><br><?php
echo getProduct($productId);?><br><br><br><?php

$activity_ids = getActivityIds();
foreach($activity_ids as $activity_id){
	echo getActivity($activity_id);?><br>
	normally time: <?php
	echo $normally_hours[$activity_id];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php
	echo $normally_minutes[$activity_id];?><br> overtime: <?php
	echo $overtime_hours[$activity_id];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php
	echo $overtime_minutes[$activity_id];?><br><br><?php
}

?>

</body>
</html>