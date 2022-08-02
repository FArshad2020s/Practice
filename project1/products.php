<?php
require "_load.php";
isLogin();
#====================================================get project_id
if(!isset($_POST['project_id'])){
	replace("panel.php");
}
$project_id = (int)$_POST['project_id'];
#====================================================get products
$products = getProducts($project_id);
?>
<form action = "activity.php" method = "post">
<?php foreach($products as $product){
	echo $product['name'];?>
	<input type = "radio" name = "product_id" 
	value = "<?= $product['id']?>">
	<br>
<?php } ?>
<input type = "submit">
</form>