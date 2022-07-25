<html>
<head>
	<meta charset="utf8">
</head>
<body>


<?php
#farshad arbab-------------------------------------------
require "_load.php";
#--------------------------------------------------------
isLogin();
#--------------------------------------------------------
$sql="SELECT fullname FROM `login` WHERE `id`=:id";
$stmt=$db->prepare($sql);
$stmt->bindParam("id",$_SESSION['id']);
$stmt->execute();
$fullname=$stmt->fetch(PDO::FETCH_ASSOC)['fullname'];
#--------------------------------------------------------site structure
?><a href="logout.php">خروج</a>&nbsp;&nbsp;&nbsp;
welcome to your website!&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fullname;
#-------------------------------------------------------- projects list
?><form action="products.php"><?php
$projects=getProjects();
?><ul><?php
foreach($projects as $project){	
	?><li>   <?= $project['name']." ".$project['code']?> 
	<input type="radio" name="projectId" value=<?= $project['id']?>></li>
	<?php
}
?></ul>
<input type="submit" value="محصولات پروژه رو ببینیم">
</form>


</body>
</html>