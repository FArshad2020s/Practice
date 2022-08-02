<?PHP
require "_load.php";
isLogin();
#=======================================================
$projects = getProjects();
#=======================================================
?>
<form action = "products.php" method = "post">
<?php foreach($projects as $project){
	echo $project['name'];?>
	<input type = "radio" name = "project_id" 
	value = "<?= $project['id'] ?>"><br>
<?php } ?>
<input type = "submit">
</form>