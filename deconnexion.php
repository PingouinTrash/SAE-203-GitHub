<?php

session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['utilisateur']);
unset($_SESSION['role']);

session_destroy();

include_once("constantes.php");

header("location: ".ROOT."/index.php");
exit();

?>