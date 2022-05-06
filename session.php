<?php
session_start([
"save_path" => __DIR__ ."/sessions",
"name" => "id_for_session"
]);
$_SESSION=["name" => "farshad","auth" => true,"last_name" => "arbab"];
#delete a item from $_SESSION
unset($_SESSION["name"]);
?>