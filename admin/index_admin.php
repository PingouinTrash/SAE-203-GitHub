<?php
include_once("../constantes.php");
include_once("../menu.php");
?>

<section>
    <div class="nom-de-page">
        <h2>Gestion des boutiques</h2>
    </div>
</section>

<section>
    <div id="ajout-boutique-admin">
        <div>
            <h3>Ajouter une boutique</h3>
        </div>
        <form action="" method="post">
            <div id="labels-ajout">
                <div>
                    <label for="nom">Nom de la boutique : </label>
                    </br>
                    <label for="numero_rue">Numéro de rue : </label>
                    </br>
                    <label for="nom_adresse">Nom de l'adresse : </label>
                    </br>
                    <label for="code_postal">Code postal : </label>
                    </br>
                    <label for="ville">Ville : </label>
                    </br>
                    <label for="pays">Pays : </label>
                </div>
                <div>
                    <input type="text" id="nom" name="nom">
                    </br>
                    <input type="text" id="numero_rue" name="numero_rue">
                    </br>
                    <input type="text" id="nom_adresse" name="nom_adresse">
                    </br>
                    <input type="text" id="code_postal" name="code_postal">
                    </br>
                    <input type="text" id="ville" name="ville">
                    </br>
                    <input type="text" id="pays" name="pays">
                </div>
            </div>
            <button type="button">Ajouter une boutique</button>
        </form>
    </div>
</section>

<section id="liste-boutiques" class="liste">
    <div>
        <?php

        if ($resultat && $resultat->rowCount() > 0) {
            while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
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
        } 

        else {
            echo "0 résultats";
        }

        ?>
    </div>
</section>

<?php
include_once(ROOT. "footer.php");
?>