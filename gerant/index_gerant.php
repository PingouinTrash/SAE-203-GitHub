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

        $length = count($shops);

        foreach($shops as $shop) {
            $shop_id = $shop['id'];
            $request_stocks = "SELECT * FROM stocks WHERE stocks.boutique_id = $shop_id";
            $stocks = query($request_stocks);

            foreach($stocks as $stock) {
                $stock_id = $stock['confiserie_id'];
                $request_candies = "SELECT * FROM confiseries WHERE confiseries.id = $stock_id";
                $candies = query($request_candies);

                print_r('<pre>');
                print_r($candies);
                print_r('</pre>');
    
                echo (
                    "<div class='card boutique'>
                        <img class='image' src='../media/bonbon.jpg' alt='Bonbon'>
                        <div class='boutique-desc'>
                            <h2 class='titre-boutique'>" . $candies[0]["nom"] . "</h2>
                            <h3>" . $candies[0]["description"] . "</h3>
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