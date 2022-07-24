<?php
require "_load.php";
isLogin();
$sql="SELECT fullname FROM `login` WHERE `id`=:id";
$stmt=$db->prepare($sql);
$stmt->bindParam("id",$_SESSION['id']);
$stmt->execute();
$fullname=$stmt->fetch(PDO::FETCH_ASSOC)['fullname'];
echo $fullname; ?> &nbsp; <a href="logout.php">خروج</a><br><br><br>
welcome to your website!