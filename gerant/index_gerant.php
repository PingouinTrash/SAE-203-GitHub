<?php
include_once("../header.php");
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

        $manager_id = $_POST["identifiant"];
        
        $request_shops = "SELECT * FROM boutiques JOIN utilisateurs ON boutiques.utilisateurs_id = utilisateurs.id WHERE boutiques.utilisateurs_id = $manager_id";
        $shops = query($request_shops);

        print_r('<pre>');
        print_r($shops);
        print_r('</pre>');

        $request_stocks = "SELECT * FROM confiseries JOIN stocks ON confiseries.id = stocks.confiserie_id WHERE stocks.boutique_id = $boutique_id";
        $stocks = query($request_stocks);

        print_r('<pre>');
        print_r($stocks);
        print_r('</pre>');

        ?>
    </div>
</section>

<?php
include_once(ROOT . "footer.php");
?>