<?php

session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['id']);
unset($_SESSION['username']);

session_destroy();

include_once("constants.php");

header("location: ".ROOT."/index.php");
exit();

?>