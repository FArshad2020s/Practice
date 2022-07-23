<?php
try{
list($host,$dbname,$username,$password)=["localhost","learn","root",""];
$dsn="mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$connect=new PDO($dsn,$username,$password);
return $connect;	
}catch(PDOException $error){
	echo "خطا در برقراری ارتباط با دیتابیس";
	exit();
}
#Discription:
#$error->getMessage():getMessage function in $error, gives us title of error.(no important)
#$error->getline(): returns line of error in your code
?>