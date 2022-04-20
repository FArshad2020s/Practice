<?php
setcookie(
"name",
"arbab",
["expires" => time()+500,"domain" => "localhost","path" => "/","httponly" => true,
"secure"=>true]
);
var_dump($_COOKIE);
?>