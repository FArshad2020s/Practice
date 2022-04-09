<?php 
$text = "hello how are you?";
$text2=str_repeat("salam",23);?>
<b>str_repeat: </b><?php echo $text2 ;
$text3="Iran-Germany-USA-France";
$countries=explode("-",$text3);?>
<br><b>explode: </b> <?php foreach($countries as $country){echo $country?>&nbsp;&nbsp;&nbsp;<?php ;}?> 
<br><b>implode: </b>: <?php echo implode("---",$countries);
?>
<br><b>substr: </b><?php echo substr($text,4,6);
trim($text);  #the trim function deletes the spaces in left and right of $text
rtrim($text); #the rtrim function deletes the spaces in right of $text
ltrim($text); #the ltrim function deletes the spaces in left of $text ?>
