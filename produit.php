<?php
include_once("header.php");
include_once("menu.php");
?>

<section>
    <div class="retour">
        <a href="boutique.php">< Retour aux boutiques</a>
    </div>

    <div class="nom-de-page">
        <h2>Catalogue des confiseries</h2>
    </div>
</section>

<section class="liste-produits">
    <?php

    $boutique_id = $_GET["param_id"];
    $sql = "SELECT * FROM confiseries JOIN stocks ON confiseries.id = stocks.confiserie_id WHERE stocks.boutique_id = $boutique_id";
    $resultat = query($sql);

    if ($resultat && $resultat->rowCount() > 0) {
        while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo ("
                <button type='submit' class='card produit'>
                    <img class='image' src='media/Bonbon.jpg' alt='Boutique de ...'>
                    <h3>" . $row["nom"] . "</h3>
                </button>"
            );
        }
    }
    else {
        echo "0 résultats";
    }

    ?>
</section>

<?php
include_once("footer.php");
?>