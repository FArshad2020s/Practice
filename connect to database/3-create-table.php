<html dir="ltr">
<head>
	<title>ساخت جدول در پایگاه داده</title>
</head>
<body>
<?php
include_once "connection.php";
$sql1="create table *table*(
	id int primary key auto_increment,
	fullname varchar(256),
	age int unsigned,
	gender ENUM('femail','mail'),
	isSingle boolean default 1  );";
for($i=1;$i<=40;$i++){
	$sql=str_replace("*table*","table$i",$sql1);
	if($mysqli->query($sql)){echo "created table$i<br>";}
	else{echo "we could not create table$i<br>";}
}
#now we want to clear all of the tables!
for($i=1;$i<=40;$i++){
	$mysqli->query("drop table table$i");
	echo "deleted table$i<br>";
}
?>
</body>
</html>