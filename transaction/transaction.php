<?php
#people table has 5 fields.id,fullname,age,gender,isSingle
#فرض کنید این اطلاعات از جانب کاربر ارسال شده است
$users=[
	["farshad arbab",25,"mail",1],
	["ali karimi",29,"mail",0],
	["zahra",18,"femail",1],
	["said",102,"mail",0]
];


include "people-db-connection.php";
$sql="insert into people(fullname,age,gender,isSingle) values(?,?,?,?)";
$stmt=$connect->prepare($sql);
$connect->beginTransaction();
foreach($users as $user){
	if($user[0]=="zahra"){exit();}
	$stmt->execute($user);
}
$connect->commit();

#Discription:
#$connect->beginTransaction():start transaction mode
#$connect->commit():stop transaction mode 
?>