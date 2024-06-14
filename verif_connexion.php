<?php

include_once("header.php");
include_once("bdd.php");
include_once("constantes.php");

$username = $_POST["identifiant"];
$password = $_POST["mot de passe"];

$result = verif_connexion($username, $password);

if ($result == true){
    $_SESSION["utilisateur"] = $id;
    $_SESSION["loggedin"] = true;
    
    $sql = "SELECT role FROM utilisateurs";
    $result_sql = query($sql);

    if ($result_sql == $result_sql["admin"]){
        header("Location: http://localhost/sae-203-github/client/index_admin.php");
        exit();
    }
    elseif($result_sql == $result_sql["gerant"]){
        header("Location: http://localhost/sae-203-github/gerant/index_gerant.php");
        exit();
    }
    elseif($result_sql == $result_sql["client"]){
        header("Location: http://localhost/sae-203-github/index.php");
        exit();
    }
}

else{
    $_SESSION["error"] = "Mauvais identifiant ou mot de passe";
    header("Location: http://localhost/sae-203-github/connexion.php");
    exit();
}

function verif_connexion($username, $password){
    $login = query("SELECT username, password FROM utilisateurs");
    foreach ($login as $value){
        $password = md5($password);
        if (($login["username"] == $username) && ($login["password"] == $password)) {
            return true;
        }
        else {
            return false;
        }
    }
}

?>