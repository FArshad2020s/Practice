<?php
#people table has 5 fields.id,fullname,age,gender,isSingle
#فرض کنید این اطلاعات از طرف کاربر گرفته شده است
list($fullname,$age,$gender,$siSingle)=["ahmad","64","mail","0"];


include "people-db-connection.php";
$sql="insert into people(fullname,age,gender,isSingle) 
values(:fullname,:age,:gender,:isSingle)";
$stmt=$connect->prepare($sql);
$stmt->execute(["fullname" => "mohammad","age"=>24,"gender"=>"mail","isSingle"=>1]);
?>