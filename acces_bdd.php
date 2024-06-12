<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const DB_DRIVER = 'mysql';
const DB_HOST = 'localhost';
const DB_PORT = 3306;
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_DATABASE = 'serveur_la_confiserie_sae202';

try {
    $bdd = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';port=' . DB_PORT,
        DB_USERNAME,
        DB_PASSWORD
    );
} catch (Exception $ex) {
    echo ($ex->getMessage());
    die;
}

function query($sql){
    global $bdd;
    $stmt = $bdd->query($sql);
    return $stmt->fetchAll();
}

?>