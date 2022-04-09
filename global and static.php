<?php
$b=10;
function func(){
	global $b;
	echo "resulte1: $b <br><br>";
}
func();

#---------------- static
echo "resulte2: ";
function func2(){
	static $a =0;
	echo $a ;
	$a++;

}
func2();
func2();
func2();
func2();
func2();
?>