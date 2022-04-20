<?php
$info = [
["first_name" => "farshad",
"last_name" => "arbab",
"age" => 17,
["last_name" => "sahebi"]
],
["first_name" => "reza",
"last_name" => "karimi",
"age" => 47],
["first_name" => "ali",
"last_name" => "kalami",
"age" => 25]
];
$list = ["first_name" => "abas", "last_name" => "karimi" , "age" => 50];
var_dump(array_column($info,"last_name"));
?>