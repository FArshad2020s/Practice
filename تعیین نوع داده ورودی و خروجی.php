<?php
#this function takes 0 and 1 values
declare(strict_types=1);
#this function get string, integer and float variables and returns integer resulte
function sum(string $a,int $b,float $c):int{
	echo $a."<br>";
	echo $b."<br>";
	echo $c."<br>" ;
	return(3);
}
$resulte=sum("hello",1,2);
echo $resulte ;
?>