<html>
<head>
	<meta charset="utf8">
</head>
<body>
	<?php
	include "connection.php";
	if(isset($_POST['fullname'],$_POST['age'],$_POST['gender'],$_POST['isSingle'])){
		$fullname=$_POST['fullname'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		if($_POST['isSingle']=="Yes"){$isSingle=1;}
		if($_POST['isSingle']=="No"){$isSingle=0;}	 
		}
	else{echo "اطلاعات دریافتی سرور ناقص است.";}
	function saveUser(){
		global $fullname;
		global $age ;
		global $gender;
		global $isSingle;
		global $mysqli ;
		$sql="insert into people (fullname,age,gender,isSingle) values(?,?,?,?)";
		$stmt=$mysqli->prepare($sql);
		$stmt->bind_param("sisb",$fullname,$age,$gender,$isSingle);
		$stmt->execute();
		$stmt->close();
	}
	saveUser();
	?>
</body>
</html>
