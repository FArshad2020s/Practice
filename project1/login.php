<?PHP
require "_load.php";
if(isset($_POST['login'])){
	if(isset($_POST['username'],$_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(sessionSet($username,$password)){
			replace("panel.php");
			}
		else{exit("مشخصات وارد شده صحیح نیست");}
	}
	
}
?>
<form action = "" method = "post">
	<input type = "text" name = "username" placeholder = "username">
	<br>
	<input type = "text" name = "password" placeholder = "password">
	<input type = "submit" name = "login" value = "login">
</form>