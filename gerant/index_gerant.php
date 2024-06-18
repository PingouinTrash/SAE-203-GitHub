<?php
include_once("../menu.php");

if($_SESSION["role"] != "gerant"){
    session_destroy();
    header("location: ".ROOT."index.php");
    exit();
}
else {}
?>

<section>
    <div class="nom-de-page">
        <h2>Gestion des stocks</h2>
    </div>
</section>

<section id="liste-boutiques" class="liste">
    <div>
        <?php

        $manager_id = 2;
        
        $request_shops = "SELECT boutiques.id FROM boutiques JOIN utilisateurs ON boutiques.utilisateur_id = utilisateurs.id WHERE boutiques.utilisateur_id = $manager_id";
        $shops = query($request_shops);

        foreach($shops as $shop) {
            $shop_id = $shop['id'];
            $request_stocks = "SELECT * FROM stocks JOIN confiseries ON stocks.confiserie_id = confiseries.id WHERE stocks.boutique_id = $shop_id";
            $stocks = query($request_stocks);
    
            foreach($stocks as $stock){
                echo (
                    "<div class='card boutique'>
                        <img class='image' src='../media/bonbon.jpg' alt='Bonbon'>
                        <div class='boutique-desc'>
                            <h2 class='titre-boutique'>" . $stock["nom"] . "</h2>
                            <h3>" . $stock["quantite"] . "</h3>
                        </div>
                    </div>"
                );
            }
            
        }

        ?>
    </div>
</section>

<?php
include_once(ROOT . "footer.php");
?>