<?php
function func1($a){
	return $a*2;
}
function func2($a,$function){
	return $function($a);
}

echo func2(5,"func1");?><br><?php

#------------------------------------

function func3($b,$function){
	return $function($b);
}
echo func3(4,function($b){return $b**2 ;});
?>