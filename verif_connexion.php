<?php
include_once("header.php");
include_once("acces_bdd.php");
include_once("constantes.php");

$username = $_POST["identifiant"];
$password = $_POST["mot_de_passe"];

$result = verif_connexion($username, $password);

if ($result == true){
    $_SESSION["utilisateur"] = $username;
    $_SESSION["loggedin"] = true;
    $_SESSION["role"] = $result["role"];
    $_SESSION["id"] = $result["id"];

    if ("admin" == $_SESSION["role"]){
        header("Location: " . ROOT . "admin/index_admin.php");
        exit();
    }

    elseif("gerant" == $_SESSION["role"]){
        header("Location: " . ROOT . "gerant/index_gerant.php");
        exit();
    }
}

else{
    $_SESSION["error"] = "Mauvais identifiant ou mot de passe !";
    header("Location: " . ROOT . "connexion.php");
    exit();
}

?>