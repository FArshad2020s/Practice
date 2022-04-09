<?php $text="hello this is a string data for test  HELLO HELLO HELLO!";?>
<b>$text:</b><?=$text?>
<br><br>$text variable lengthes is <?= strlen($text);?>
<br>$text variable number of words is <?= str_word_count($text);?>
<br>'data' word position in $text variable is <?= strpos($text,"data");?>
<br><?php echo str_replace("hello","salam",$text) ;?>
<br><?= strtoupper($text);?>
<br><?= strtolower($text);?>
<br><br><b>$text:</b> <?=$text; ?>