<?php
require "_load.php";
if(isset($_POST['username'],$_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT `id` FROM login WHERE `username`=:username and `password`=:password;";
	$stmt=$db->prepare($sql);
	$stmt->bindParam("username",$username);
	$stmt->bindParam("password",$password);
	$stmt->execute();
	$user=$stmt->fetch();
	if($user===false){
		?>no such user with this username and password <?php
	}
	else{
		$_SESSION['id']=$user['id'];
		header("Location: index.php");
		exit();
	}
}
?>
<html dir="rtl">
<head>
	<title>ورود</title>
	<meta charset="utf8">
</head>
<body>
	<form method="post" action="login.php">
		نام کاربری<br><input type="text" name="username"><br><br>
		پسوورد <br><input type="text" name="password"><br><br>
		<input type="submit" value="ورود"><br><br>
	</form><br>
	username: farshad    <br>
	password: 1234
</body>
</html>
