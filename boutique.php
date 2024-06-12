<?php
include_once("header.php");
include_once("menu.php");
include_once("acces_bdd.php");
?>

<section class="liste-boutiques">

<h2>Nos Boutiques</h2>
    
<div class="liste-boutiques">
    <?php

    $sql = "SELECT * FROM boutiques";
    $result = query($sql);

    if ($result && $result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<a href='produit.php'>";
            echo "<div class='card boutique'>";
            echo "<img class='image' src='media/Boutique.jpg' alt='Boutique de " . $row["nom"] . "'>";
            echo "<div>";
            echo "<h2>" . $row["nom"] . "</h2>";
            echo "<h3>" . $row["numero_rue"] . " " . $row["nom_adresse"] . "</h3>";
            echo "</div></div></a>";
        }
    } else {
        echo "0 résultats";
    }
    ?>
</div>

</section>
