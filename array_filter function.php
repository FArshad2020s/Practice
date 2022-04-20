<?php
$array = [1,2,3,4,5,6,7,8,9,10];
$new_array=array_filter($array,fn($number)=>$number%2==0);
var_dump($new_array);
?>