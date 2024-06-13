<?php
include_once("header.php");
include_once("menu.php");
include_once("acces_bdd.php");
?>

<section>
    <div class="nom-de-page">
        <h2>Nos Boutiques</h2>
    </div>
</section>

<section class="liste-boutiques">
    
    <div class="liste-boutiques">
        <?php

        $sql = "SELECT * FROM boutiques";
        $resultat = query($sql);

        if ($resultat && $resultat->rowCount() > 0) {
            while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo (
                    "<a href='produit.php?param_id=".$row["id"]."'>
                        <div class='card boutique'>
                            <img class='image' src='media/Boutique.jpg' alt='Boutique de " . $row["nom"] . "'>
                            <div class='boutique-desc'>
                                <h2 class='titre-boutique'>" . $row["nom"] . "</h2>
                                <h3>" . $row["numero_rue"] . " " . $row["nom_adresse"] . "</h3>
                            </div>
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
include_once("footer.php");
?>