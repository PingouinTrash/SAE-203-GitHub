<?php

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