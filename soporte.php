<?php

require_once("Clases/auth.php");
require_once("Clases/validator.php");
require_once("Clases/dbMySQL.php");

$auth = new Auth();
$validator = new Validator();
$db = new dbMySQL();

if ($_SERVER['QUERY_STRING'] == "logout") {
  $auth->logout();
}


?>
