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

function verif_connexion($_username, $_password){

    $_password = md5($_password);
    $request = "SELECT * FROM utilisateurs WHERE utilisateurs.username LIKE '$_username' AND password LIKE '$_password'";
    $logins = query($request);
    $login = $logins[0];

    if (($login["username"] == $_username) && ($login["password"] == $_password)) {
        return $login;
    }
    else {
        return false;
    }

}

?>