<?php
include_once("header.php");
include_once("menu.php");
?>
<script src="js/app.js"></script>

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
    $stock_id = "SELECT confiserie_id FROM stocks WHERE boutique_id LIKE %$boutique_id%";
    $sql = "SELECT * FROM confiseries WHERE id LIKE %$stock_id%";
    $resultat = query($sql);

    if ($resultat && $resultat->rowCount() > 0) {
        while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo ("<button type='submit' class='card produit'>
                <img class='image' src='media/Bonbon.jpg' alt='Boutique de ...'>
                <h3>Nom friandise</h3>
            </button>");
        }
    }
    else {
        echo "0 résultats";
    }

    ?>
</section>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Détails du produit</h2>
        <img src="media/Bonbon.jpg" alt="Produit image" id="modalImage">
        <p id="modalName">Nom du produit</p>
        <p id="modalDescription">Description du produit</p>
    </div>
</div>