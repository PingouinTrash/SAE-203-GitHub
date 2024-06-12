<?php

include_once("header.php");
include_once("bdd.php");
include_once("constantes.php");

$utilisateur = $_POST["utilisateur"];
$mdp = $_POST["mdp"];

$resultat = check_login($utilisateur, $mdp);

if ($resultat == true){
    $_SESSION["utilisateur"] = $utilisateur;
    $_SESSION["loggedin"] = true;
    header("Location: ".ROOT."admin/index_admin.php");
    exit();
}
else{
    $_SESSION["error"] = "Mauvais login / mot de passe";
    header("Location: ".ROOT."login.php");
    exit();
}

function check_login($utilisateur, $mdp){

    $mdp = md5($mdp);
    $resultat = query("SELECT * FROM utilisateurs WHERE utilisateur LIKE '$utilisateur' AND password LIKE '$mdp'");

    if (count($resultat) > 0){
        return true;
    }
    else{
        return false;
    }

}

?>