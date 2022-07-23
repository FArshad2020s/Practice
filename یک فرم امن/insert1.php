<?php
#people table has 5 fields.id,fullname,age,gender,isSingle
#فرض کنید این اطلاعات از طرف کاربر گرفته شده است
list($fullname,$age,$gender,$isSingle)=["farshad",18,"mail",1];


include "people-db-connection.php";
$sql="insert into people(fullname,age,gender,isSingle) values(?,?,?,?)";
$stmt=$connect->prepare($sql);
$stmt->execute([$fullname,$age,$gender,$isSingle]);
?>