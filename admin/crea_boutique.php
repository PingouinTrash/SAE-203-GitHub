<?php
include_once('../acces_bdd.php');
include_once('index_admin.php');

if(isset($_POST['Boutique-créé'])){
    $nomBoutique = $_POST['nom-boutique'];
    $gerant = $_POST['gerant'];
    $numRue = $_POST['num-rue'];
    $nomRue = $_POST['nom-adresse'];
    $codePostal = $_POST['code-postal'];
    $ville = $_POST['ville'];
    $Pays = $_POST['pays'];


        $requete = $bdd->prepare("INSERT INTO boutiques (id, nom, utilisateur_id, numero_rue, nom_adresse, code_postal, ville, pays) VALUES (0, :nom, :utilisateur_id, :numero_rue, :nom_adresse, :code_postal, :ville, :pays)");
        $requete->execute(
            array(
                "nom" => $nomBoutique,
                "utilisateur_id" => $gerant,
                "numero_rue" => $numRue,
                "nom_adresse" => $nomRue,
                "code_postal" => $codePostal,
                "ville" => $ville,
                "pays" => $Pays
            )
        );
        header("Location: " . $_SERVER["index_admin.php"]);

}
?>