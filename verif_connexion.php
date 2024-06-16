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

function verif_connexion($username, $password){

    // $test = query("SELECT username, password, role, id FROM utilisateurs");
    
    // print_r('<pre>');
    // print_r($test);
    // print_r('</pre>');

    // $login = query("SELECT * FROM utilisateurs WHERE username LIKE $username AND password LIKE $password");

    // if (($login["username"] == $username) && ($login["password"] == $password)) {
    //     return $login[0];
    // }
    // else {
    //     return false;
    // }

    $login = query("SELECT username, password, role, id FROM utilisateurs");
    $password = md5($password);

    foreach ($login as $value){
        if (($value["username"] == $username) && ($value["password"] == $password)) {
            return $login[0];
        }
    }
    return false;

}

?>