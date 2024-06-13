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
        $result = query($sql);

        if ($result && $result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<a href='produit.php'>";
                echo "<div class='card boutique'>";
                echo "<img class='image' src='media/Boutique.jpg' alt='Boutique de " . $row["nom"] . "'>";
                echo "<div class='boutique-desc'>";
                echo "<h2 class='titre-boutique'>" . $row["nom"] . "</h2>";
                echo "<h3>" . $row["numero_rue"] . " " . $row["nom_adresse"] . "</h3>";
                echo "</div></div></a>";
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