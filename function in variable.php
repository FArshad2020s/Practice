<?php
$c = 44 ;
$fun=function($a,$b) use($c){
	return $a + $b + $c ;
};
echo $fun(4,9);
?>