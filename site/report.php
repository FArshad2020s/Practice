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
	echo $activity['name'];?>
	<br>normaly&nbsp;&nbsp;&nbsp;&nbsp;
	hour: <select name="normally_hours[<?= $id ?>]">
		<?php for($i=0;$i<=9;$i++){ ?>
			      <option value = "<?= "0".$i ?>"><?= "0".$i?></option>
		<?php } ?>
		  </select>
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	minute: <select name="normally_minutes[<?= $id ?>]">
	  <?php for($i = 10;$i <= 50;$i = $i+10){ ?>
				<option value="<?= $i ?>"><?= $i ?></option>
	  <?php } ?>
			</select><br>
			
	overtime&nbsp;&nbsp;&nbsp;&nbsp;
	hour: <select name="overtime_hours[<?= $id ?>]">
		<?php for($i=0;$i<=9;$i++){?> 
			      <option value = "<?= "0".$i ?>"><?= "0".$i?></option>
		<?php } ?>
		  </select>
		  &nbsp;&nbsp;&nbsp;&nbsp;
	minute: 
	<select name="overtime_minutes[<?= $id ?>]">
		<?php for($i=10;$i<=50;$i = $i+10){?>
			      <option value = "<?= $i ?>"><?= $i ?></option>
		<?php } ?>
	</select>
	<br><br>
<?php
}
?>
<input type="submit" value="مرحله بعد">
</form>

</body>
</html>