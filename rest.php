<?php
function average(int $number,...$numbers_array){
	$sum=0 ;
	foreach($numbers_array as $number){
		$sum+=$number ;
	}
	return $sum/$number ;
}
$resulte=average(8,1,2,3,4,5,6,7,8);
echo "test1: ".$resulte;?><br><?php
#----------------------------------------

$array=[5,1,2,3,4,5];
$resulte2=average(...$array);
echo "test2: ".$resulte2 ;
?>