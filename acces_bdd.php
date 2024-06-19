<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const DB_DRIVER = 'mysql';
const DB_HOST = 'localhost';
const DB_PORT = 3306;
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_DATABASE = 'serveur_la_confiserie_sae203';

try {
    $bdd = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';port=' . DB_PORT,
        DB_USERNAME,
        DB_PASSWORD
    );
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 

catch (Exception $ex) {
    echo ($ex->getMessage());
    die;
}

function query($sql){
    global $bdd;
    $stmt = $bdd->query($sql);
    return $stmt->fetchAll();
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
