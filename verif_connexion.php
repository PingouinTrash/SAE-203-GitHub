<?php

include_once("header.php");
include_once("bdd.php");
include_once("constantes.php");

$id = $_POST["identifiant"];
$mdp = $_POST["mot de passe"];

$resultat = check_login($id, $mdp);

if ($resultat == true){
    $_SESSION["utilisateur"] = $id;
    $_SESSION["loggedin"] = true;
    header("Location: ".ROOT."admin/index_admin.php");
    exit();
}
elseif($resultat == true){
    $_SESSION["username"] = $id;
    $_SESSION["loggedin"] = true;
    header("Location: ".ROOT."gerant/index_gerant.php");
    exit();
}
else{
    $_SESSION["error"] = "Mauvais identifiant ou mot de passe";
    header("Location: ".ROOT."connexion.php");
    exit();
}

// function verif_connexion($id, $mdp){
//     $identifiants = query("SELECT username, password FROM utilisateurs");
//     foreach ($identifiants as $value){
//         $mdp = md5($mdp);
//         if(($identifiants["username"] == $id) && ($identifiants["password" == $mdp])){
//             return true;
//         }
//         else{
//             return false;
//         }
//     }
// }

function check_login($id, $mdp){

    $mdp = md5($mdp);
    $resultat = query("SELECT * FROM utilisateurs WHERE username LIKE '$id' AND password LIKE '$mdp'");

    if (count($resultat) > 0){
        return true;
    }
    else{
        return false;
    }

}

?>