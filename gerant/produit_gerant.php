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
    <div class="retour">
        <a href="<?php echo(ROOT);?>gerant/index_gerant.php">< Retour aux boutiques</a>
    </div>

    <div class="nom-de-page">
        <h2>Stocks de la confiserie</h2>
    </div>
</section>

<section id="liste-boutiques" class="liste">
    <div>
        <?php

        $manager_id = $_SESSION["id"];

        if(isset($_POST['candy_id'])){
            $confiserie_id = $_POST['candy_id'];
            $boutique_id = $_POST['shop_id'];
            $quantite_modif = $_POST['quantite_modif'];

            $request_update = "UPDATE stocks SET quantite = $quantite_modif WHERE confiserie_id = $confiserie_id AND boutique_id = $boutique_id";
            $update = query($request_update);
        }
        elseif(!isset($_POST['candy_id'])){}

        $request_shops = "SELECT boutiques.id, boutiques.nom FROM boutiques JOIN utilisateurs ON boutiques.utilisateur_id = utilisateurs.id WHERE boutiques.utilisateur_id = $manager_id";
        $shops = query($request_shops);

        foreach($shops as $shop) {

            $shop_id = $shop['id'];
            $request_stocks = "SELECT * FROM stocks JOIN confiseries ON stocks.confiserie_id = confiseries.id WHERE stocks.boutique_id = $shop_id";
            $stocks = query($request_stocks);
          
            foreach($stocks as $stock){
                echo (
                    "<form method='POST' type='action'>
                        <input type='hidden' name='shop_id' value='$shop_id'>
                        <input type='hidden' name='candy_id' value=" . $stock["confiserie_id"] . ">
                        <div class='card no-hver horizontal'>
                            <img class='image' src='../media/bonbon.jpg' alt='Bonbon'>
                            <div class='vertical desc'>
                                <h2>" . $stock["nom"] . "</h2>
                                <h4 class='info-title'>Prix actuel : " . $stock["prix"] . " €/unité</h4>
                                <h4 class='info-title'>Quantité actuelle : " . $stock["quantite"] . "</h4>
                            </div>
                            <div class='vertical desc modif'>
                                <div class='modif-quantites'>
                                    <label for='modif-quantite'>Modifier quantité :</label>
                                    <input type='number' name='quantite_modif' value=" . $stock["quantite"] . " min='0'>
                                </div>
                                <button type='submit' class='bouton fond-sombre'><h4>Mettre à jour les quantités</h4></button>
                            </div>
                        </div>
                    </form>"
                );
            }
        }

        ?>
    </div>
</section>

<?php
include_once(ROOT . "footer.php");
?>