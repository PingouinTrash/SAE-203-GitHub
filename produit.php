<?php
include_once("header.php");
include_once("menu.php");
?>

<section>
    <div class="retour">
        <a href="<?php echo(ROOT);?>boutique.php">< Retour aux boutiques</a>
    </div>

    <div class="nom-de-page">
        <h2>Catalogue des confiseries</h2>
    </div>
</section>

<section id="liste-produits" class="liste">
    <?php

    $boutique_id = $_GET["param_id"];
    $sql = "SELECT * FROM confiseries JOIN stocks ON confiseries.id = stocks.confiserie_id WHERE stocks.boutique_id = $boutique_id";
    $resultat = query($sql);

    if ($resultat && $resultat->rowCount() > 0) {
        while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo (
            "<button type='button' class='card produit openModalBtn' 
                data-nom='" . htmlspecialchars($row["nom"], ENT_QUOTES, 'UTF-8') . "'
                data-description='" . htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8') . "'
                data-prix='" . htmlspecialchars($row["prix"], ENT_QUOTES, 'UTF-8') . "'
                data-image='media/bonbon.jpg'>
                <img class='image' src='media/bonbon.jpg' alt='bonbon'>
                <h3>" . htmlspecialchars($row["nom"], ENT_QUOTES, 'UTF-8') . "</h3>
            </button>"
            );
        }
    } else {
        echo "0 résultats";
    }

    ?>
</section>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-image">
            <img src="media/bonbon.jpg" alt="Bonbon acide">
        </div>
        <div class="modal-text">
            <h5>Bonbon acide</h5>
            <p class="description">Bonbon acide délicieux</p>
            <p class="prix">0,15 €/pièce</p>
            <!-- <div class="modal-actions">
                <button class="add-to-cart">Ajouter au panier</button>
                <div class="quantity-control">
                    <button class="decrease">-</button>
                    <input type="number" value="1" min="1">
                    <button class="increase">+</button>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>
