<?php
include_once("../constantes.php");
include_once("../menu.php");
include_once("../acces_bdd.php");

if($_SESSION["role"] != "admin"){
    session_destroy();
    header("location: ".ROOT."index.php");
    exit();
}
else {}
?>

<section>
    <div class="nom-de-page">
        <h2>Gestion des boutiques</h2>
    </div>
</section>

<form method="POST" action="crea-boutique.php">
    <label for="nom-boutique">Nom de la boutique :</label>
    <input type="text" id="nom-boutique" name="nom-boutique" placeholder="Nom Boutique ..." require><br>

    <label for="gerant">id du gérant : </label>
    <input type="number" id="gerant" name="gerant" placeholder="gérant id ..." require><br>

    <label for="num-rue">Numéro de la rue : </label>
    <input type="number" id="num-rue" name="num-rue" placeholder="Numéro rue ..." require><br>

    <label for="nom-adresse">Nom de l'adresse :</label>
    <input type="text" id="nom-adresse" name="nom-adresse" placeholder="Nom adresse ..." require><br>

    <label for="code-postal">code postal :</label>
    <input type="number" id="code-postal" name="code-postal" placeholder="code postal ..." require><br>

    <label for="ville">ville :</label>
    <input type="text" id="ville" name="ville" placeholder="ville ..." require><br>

    <label for="pays">Pays</label>
    <input type="text" id="pays" name="pays" placeholder="Pays ..." require><br>

    <input type="submit" value='Créé la boutique' name='Boutique-créé'>
</form>

<section id="liste-boutiques" class="liste">
    <div>
        <?php
        // Requête pour récupérer les boutiques existantes
        $resultat = $bdd->query("SELECT * FROM boutiques");

        if ($resultat && $resultat->rowCount() > 0) {
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo (
                    "<a href='produit.php?param_id=" . $row["id"] . "'>
                        <div class='card boutique'>
                            <img class='image' src='media/Boutique.jpg' alt='Boutique de " . $row["nom"] . "'>
                            <div class='boutique-desc'>
                                <h2 class='titre-boutique'>" . $row["nom"] . "</h2>
                                <h3>" . $row["numero_rue"] . " " . $row["nom_adresse"] . ", " . $row["code_postal"] . " " . $row["ville"] . ", " . $row["pays"] . "</h3>
                            </div>
                            <form action='' method='post'>
                                <button type='button'>Supprimer la boutique</button>
                            </form>
                        </div>
                    </a>"
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
