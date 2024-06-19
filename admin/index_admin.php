<?php
include_once("../constantes.php");
include_once("../menu.php");
include_once("../acces_bdd.php");

if ($_SESSION["role"] != "admin") {
    session_destroy();
    header("location: " . ROOT . "index.php");
    exit();
}

if (isset($_POST["actiontype"])) {

    if($_POST["actiontype"] == "ajout_boutique"){
        $nomBoutique = $_POST['nom-boutique'];
        $gerant = $_POST['gerant'];
        $numRue = $_POST['num-rue'];
        $nomRue = $_POST['nom-adresse'];
        $codePostal = $_POST['code-postal'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];

        $stmt = $bdd->prepare("INSERT INTO boutiques (id, nom, utilisateur_id, numero_rue, nom_adresse, code_postal, ville, pays) VALUES (NULL, :nom, :utilisateur_id, :numero_rue, :nom_adresse, :code_postal, :ville, :pays)");
        $stmt->execute([
            "nom" => $nomBoutique,
            "utilisateur_id" => $gerant,
            "numero_rue" => $numRue,
            "nom_adresse" => $nomRue,
            "code_postal" => $codePostal,
            "ville" => $ville,
            "pays" => $pays
        ]);

        header("Location: index_admin.php");
        exit();
    }

    elseif($_POST["actiontype"] == "suppression_boutique"){
        header("Location: index_admin.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gestion des boutiques</title>
</head>
<body>
  <section>
    <div class="nom-de-page">
        <h2>Gestion des boutiques</h2>
    </div>
  </section>

  <form method="post">
    <input type="hidden" name="actiontype" value="ajout_boutique">

    <label for="nom-boutique">Nom de la boutique :</label>
    <input type="text" id="nom-boutique" name="nom-boutique" placeholder="Nom Boutique ..." required><br>

    <label for="gerant">id du gérant :</label>
    <input type="number" id="gerant" name="gerant" placeholder="gérant id ..." required><br>

    <label for="num-rue">Numéro de la rue :</label>
    <input type="number" id="num-rue" name="num-rue" placeholder="Numéro rue ..." required><br>

    <label for="nom-adresse">Nom de l'adresse :</label>
    <input type="text" id="nom-adresse" name="nom-adresse" placeholder="Nom adresse ..." required><br>

    <label for="code-postal">code postal :</label>
    <input type="number" id="code-postal" name="code-postal" placeholder="code postal ..." required><br>

    <label for="ville">ville :</label>
    <input type="text" id="ville" name="ville" placeholder="ville ..." required><br>

    <label for="pays">Pays :</label>
    <input type="text" id="pays" name="pays" placeholder="Pays ..." required><br>

    <input type="submit" value="Créer la boutique" name="Boutique-créé">
  </form>

  <section id="liste-boutiques" class="liste">
    <div>
        <?php
        $resultat = $bdd->query("SELECT * FROM boutiques");

        if ($resultat && $resultat->rowCount() > 0) {
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo (
                    "
                        <div class='card horizontal'>
                            <img class='image' src='../media/Boutique.jpg' alt='Boutique de " . $row["nom"] . "'>
                            <div class='desc'>
                                <h2 class='titre-boutique'>" . $row["nom"] . "</h2>
                                <h3>" . $row["numero_rue"] . " " . $row["nom_adresse"] . ", " . $row["code_postal"] . " " . $row["ville"] . ", " . $row["pays"] . "</h3>
                            </div>
                            <form method='post'>
                                <input type='hidden' name='actiontype' value='suppression_boutique'>
                                <button type='button'>Supprimer la boutique</button>
                            </form>
                        </div>"
                );
            }
        } else {
            echo "0 résultats";
        }
        ?>
    </div>
  </section>

  <?php
  include_once(ROOT . "footer.php");
  ?>