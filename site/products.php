<html>
<head>
</head>
<body>


<?php
#farshad arbab---------------------------------------------------------
require "_load.php";
#----------------------------------------------------------------------
isLogin();
#----------------------------------------------------------------------
if(isset($_GET['projectId'])){
	$projectId=$_GET['projectId'];
}
else{exit("Error: select a project please");}
$products = getProducts_of_project($projectId);
if($products===[]){
	exit("no any product for this project");
}
echo "products: <br><br>"; 
?><form action="report.php"><?php
foreach($products as $product){
	echo "name: ".$product['name']." --- "."code: ".$product['code'];
	?><input type="radio" name="productId" value=<?= $product['id']?>><br><?php
}
?><input type="submit" value="مرحله بعد"></form><?php
?>

</body>
</html>