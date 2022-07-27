<html>
<head>
	<meta charset="utf8">
</head>
<body>


<?php
#farshad arbab-------------------------------------------------
require "_load.php";
#--------------------------------------------------------------
isLogin();
#--------------------------------------------------------------
if(!isset($_GET['productId'])){
	exit("please select a product");
}
$productId=$_GET['productId'];
?><form action="to-finalize.php"><?php
$sql = "SELECT id,name FROM `activities`";
$activities= $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?><input type="hidden" name="productId" value=<?= $productId ?>><?php
foreach($activities as $activity){
	$id = $activity['id'];
	echo $activity['name'];?><br>normaly&nbsp;&nbsp;&nbsp;&nbsp;
	hour: <input type="number" name="normally_hours[<?= $id ?>]" min=0 max=15 value=0>
	&nbsp;&nbsp;&nbsp;&nbsp;
	minute: <input type="number" name="normally_minutes[<?= $id ?>]" min=0 max=59 value=0>
	
	<br>
	overtime&nbsp;&nbsp;&nbsp;&nbsp;
	hour: <input type="number" name="overtime_hours[<?= $id ?>]" min=0 max=15 value=0>
	&nbsp;&nbsp;&nbsp;&nbsp;
	minute: <input type="number" name="overtime_minutes[<?= $id ?>]" min=0 max=59 value=0><br><br>
<?php
}
?>
<input type="submit" value="مرحله بعد">
</form>

</body>
</html>