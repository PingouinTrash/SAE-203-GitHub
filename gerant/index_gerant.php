<?php
include_once("../menu.php");

if($_SESSION["role"] != "gerant"){
    session_destroy();
    header("location: ".ROOT."index.php");
    exit();
}
?>

<section>
    <div class="nom-de-page">
        <h2>Gestion des stocks</h2>
    </div>
</section>

<section id="liste-boutiques" class="liste">
    <div>
        <?php

        $manager_id = $_SESSION["id"];

        $request_shops = "SELECT * FROM boutiques JOIN utilisateurs ON boutiques.utilisateur_id = utilisateurs.id WHERE boutiques.utilisateur_id = $manager_id";
        $shops = query($request_shops);

        foreach($shops as $shop) {
            echo(
                "<a href='produit_gerant.php?boutique_id=" . $shop["boutique_id"] . "'>
                    <div class='card hover horizontal'>
                        <img class='image' src='../media/Boutique.jpg' alt='Boutique de " . $shop["nom"] . "'>
                        <div class='desc'>
                            <h2 class='titre-boutique'>" . $shop["nom"] . "</h2>
                            <h3>" . $shop["numero_rue"] . " " . $shop["nom_adresse"] . ", " . $shop["code_postal"] . " " . $shop["ville"] . ", " . $shop["pays"] . "</h3>
                        </div>
                    </div>
                </a>"
            );
        }

        ?>
    </div>
</section>

<?php
include_once(ROOT . "footer.php");
?>